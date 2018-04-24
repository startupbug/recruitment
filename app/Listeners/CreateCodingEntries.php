<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Coding_entry;
use App\Question;
use DB;
use App\Events\CodingEntries;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCodingEntries
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
    public function handle(CodingEntries $event)
    {
        foreach ($event->question_data['request']['coding_input'] as $key => $value){          
            $section =new  Coding_entry;           
            $section->question_id = $event->question_data['store']->id;
            $section->input = $value;      
            $section->output =$event->question_data['request']['coding_output'][$key];      
            $section->save();
        }
    }
}
