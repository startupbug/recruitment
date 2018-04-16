<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Question;
use DB;
use App\Events\QuestionSolution;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionSolution
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
    public function handle(QuestionSolution $event)
    {        
        $section =new  Question_solution;
        $section->question_id = $event->question_data['store']->id;
        $section->text = $event->question_data['request']['text'];
        $section->code = $event->question_data['request']['code'];
        $section->url = $event->question_data['request']['url'];       
        if(isset($event->question_data['request']['solution_media'])){
            $image=$event->question_data['request']['solution_media'];
            $filename=time() . '.' . $image->getClientOriginalExtension();
            $location=public_path('public/storage/question-solution-media/'.$filename);
            $section->solution_media=$filename;
        }
        $section->solution_media = $this->UploadFile('solution_media', $event->question_data['request']['solution_media']);
        $section->save();
    }
    public function UploadFile($type, $file){
        if( $type == 'solution_media'){
        $path = 'public/storage/question-solution-media/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
}
