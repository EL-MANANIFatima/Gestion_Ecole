<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::select('id','titre','deb','chkon_id','chkon_type')->get();

        return  json_encode($events);
    }

    /**
     * Write code on Method
     *
     * 
     */
    public function addevent($event)
    {
        
        $validatedData = $this->validate([
            'event.title' => 'required',
            'event.start' => 'required|date',
            'event.creator_id' => 'required',
            'event.creator_type' => 'required',
        ]);
        
    
        $input = [
            'titre' => $validatedData['event']['title'],
            'deb' => $validatedData['event']['start'],
            'chkon_id' => $validatedData['event']['creator_id'],
            'chkon_type' => $validatedData['event']['creator_type'],
        ];
        dd($input);
        Event::create($input);
    }



    /**
     * Write code on Method
     *
     *
     */
    public function eventDrop($event, $oldEvent)
    {
        $eventdata = Event::find($event['id']);
        $eventdata->deb = $event['start'];
        $eventdata->save();
    }

    /**
     * Write code on Method
     *
     *
     */
    public function render()
    {
        $events = Event::select('id','titre','deb','chkon')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
