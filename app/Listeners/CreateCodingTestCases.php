<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Test_case;
use App\Question;
use DB;
use App\Events\CodingTestCases;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCodingTestCases
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
    public function handle(CodingTestCases $event)
    {     
        foreach ($event->question_data['request']['test_case_name'] as $key => $value){ 
            $section = new Test_case;           
            $section->question_id = $event->question_data['store']->id;
            $section->test_case_name = $value;      
            $section->test_case_input =$event->question_data['request']['test_case_input'][$key];
            $section->weightage =$event->question_data['request']['weightage'][$key];      
            $section->test_case_output=$event->question_data['request']['test_case_output'][$key];
            $section->save();
        }
            
    }
}
