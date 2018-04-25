<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Coding_question_language;
use App\Question;
use DB;
use App\Events\CodingQuestionLanguage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCodingQuestionLanguage
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
    public function handle(CodingQuestionLanguage $event)
    { 
        foreach ($event->question_data['request']['allowed_languages_id'] as $key => $value){
            $section =new  Coding_question_language;
            $section->question_id = $event->question_data['store']->id;
            $section->allowed_languages_id = $value;
            $section->save();
        }        
    }    
}
