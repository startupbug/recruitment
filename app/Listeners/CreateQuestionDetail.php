<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Question;
use DB;
use App\Events\QuestionDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateQuestionDetail
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
    public function handle(QuestionDetail $event)
    { 
        $section =new  Question_detail;
        $section->question_id = $event->question_data['store']->id;
        $section->tag_id = $event->question_data['request']['tag_id'];
        $section->marks = $event->question_data['request']['marks'];
        $section->negative_marks = $event->question_data['request']['negative_marks'];
        $section->provider = $event->question_data['request']['provider'];
        $section->author = $event->question_data['request']['author'];
        if(isset($event->question_data['request']['media'])){
            $image=$event->question_data['request']['media'];
            $filename=time() . '.' . $image->getClientOriginalExtension();
            $location=public_path('public/storage/question-detail-media/'.$filename);
            $section->media=$filename;
        }
        $section->media = $this->UploadFile('media', $event->question_data['request']['media']);
        $section->save();
    }
    public function UploadFile($type, $file){
        if( $type == 'media'){
        $path = 'public/storage/question-detail-media/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
}
