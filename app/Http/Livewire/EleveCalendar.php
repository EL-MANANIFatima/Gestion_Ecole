<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use Livewire\Component;
use App\Models\Event;

class EleveCalendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $student = Eleve::findOrFail(auth()->user()->id);
        $class = $student->Classe;
        $teachers = $class->derigePar;

        $adminEvents = Event::where('chkon_type', 'web')->get();

        $teacherEvents = Event::whereIn('chkon_id', $teachers->pluck('id'))->where('chkon_type', 'prof')->get();

        $events = $adminEvents->concat($teacherEvents);
        return json_encode($events);

    }

    public function render()
    {
        $events = Event::select('id','titre','deb','chkon')->get();
        $this->events = json_encode($events);
        return view('livewire.eleve-calendar');
    }

}
