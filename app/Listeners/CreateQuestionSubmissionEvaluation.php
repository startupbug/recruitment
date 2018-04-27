<?php
namespace App\Listeners;
use App\User;
use App\Question_submission_evaluation;
use App\Question;
use DB;
use App\Events\QuestionSubmissionEvaluation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionSubmissionEvaluation
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
    public function handle(QuestionSubmissionEvaluation $event)
    {   
        foreach ($event->question_data['request']['submission_evaluation_title'] as $key => $value){ 
            if (isset($value) && !empty($value)) {
            $section = new  Question_submission_evaluation;           
            $section->question_id = $event->question_data['store']->id;
            $section->weightage = $event->question_data['request']['weightage'][$key];
            $section->submission_evaluation_title = $value;                
            $section->save();
            }
        }         
    }
}
