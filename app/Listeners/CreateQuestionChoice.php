<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Question;
use DB;
use App\Events\QuestionChoice;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionChoice
{
    /**
     * Create the event listener.
     *
     * @return void
    */
    public function __construct()
    {    
    }
    /**
     * Handle the event.
     *
     * @param  CompanyProfile  $event
     * @return void
    */
    public function handle(QuestionChoice $event)
    {
        // dd($event->question_data['request']['partial_marks']);
        foreach ($event->question_data['request']['choice'] as $key => $value){            
            $section =new  Mulitple_choice;
            if(isset($event->question_data['request']['partial_marks'][$key])){                
                $section->partial_marks = $event->question_data['request']['partial_marks'][$key];
                $section->status = 1;
            }else{                    
                $section->status = 0;
            }
            $section->question_id = $event->question_data['store']->id;
            $section->choice = $value;      
            $section->save();
        }
    }
}
