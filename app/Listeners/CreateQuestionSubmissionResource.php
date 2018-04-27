<?php
namespace App\Listeners;
use App\User;
use App\Questions_submission_resource;
use App\Question;
use DB;
use App\Events\QuestionSubmissionResource;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionSubmissionResource
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
    public function handle(QuestionSubmissionResource $event)
    {
        foreach ($event->question_data['request']['help_material_name'] as $key => $value){          
            $section = new  Questions_submission_resource;           
            $section->question_id = $event->question_data['store']->id;            
            $section->candidate_help_material_tests_id = $value;                
            $section->save();
        } 
    }
}
