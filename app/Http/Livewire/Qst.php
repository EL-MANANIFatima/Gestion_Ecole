<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Controle;
use App\Models\Question;
use Livewire\Component;

class Qst extends Component
{
    public $exam_id,
           $Eleve_id,
           $qst,
           $i=0,$cpt=0,
           $note=0,
           $selectedChoice;
    public function render()
    {
        $this->qst =  Question::where('Controle_id',$this->exam_id)->get();
        $this->cpt = $this->qst->count(); 
        return view('exams.questions', ['qst' => $this->qst]);
    }
    public function nextQuestion($question_id)
    {
        $Question = Question::findOrFail($question_id);
        $score = $Question->score;
        $rep = $Question->rep;
        //dd($this->selectedChoice,$rep,$question_id,$this->i);
        if (strcasecmp(trim($this->selectedChoice), trim($rep)) === 0) {
            $this->note += $score;
        }
        
        if ($this->i < $this->cpt - 1) {
            $this->i++;
        } else {
            $Note = new Note();
            $Note->exam_id = $this->exam_id;
            $Note->Eleve_id = $this->Eleve_id;
            $Note->score = $this->note;
            $Note->date = date('Y-m-d');
            $Exam = Controle::findOrFail($this->exam_id);
            $Note->Mat_id = $Exam->prof->enseigne->id;
            $Note->save();
            toastr()->success('Done');
            return redirect()->route('Exam.index');
        }
    }
}
