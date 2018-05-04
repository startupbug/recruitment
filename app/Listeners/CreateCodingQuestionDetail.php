<?php
namespace App\Listeners;
use App\User;
use App\Question_detail;
use App\Mulitple_choice;
use App\Question_solution;
use App\Question;
use DB;
use App\Events\CodingQuestionDetail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCodingQuestionDetail
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
    public function handle(CodingQuestionDetail $event)
    { 
        $section =new  Question_detail;
        $section->question_id = $event->question_data['store']->id;
        $section->tag_id = $event->question_data['request']['tag_id'];
        $section->marks = $event->question_data['request']['marks'];
        $section->coding_program_title = $event->question_data['request']['coding_program_title'];
        $section->provider = $event->question_data['request']['provider'];
        $section->author = $event->question_data['request']['author'];
        if (isset($event->question_data['request']['weightage_status'])) {
            $section->weightage_status=$event->question_data['request']['weightage_status'];
        }
        $section->weightage_status=$event->question_data['request']['weightage_status'];
        if (isset($event->question_data['request']['test_case_verify'])) {
            $section->test_case_verify=$event->question_data['request']['test_case_verify'];
        }
        if(isset($event->question_data['request']['test_case_file']))
        {
            $section->test_case_file=$event->question_data['request']['test_case_file'];
        }
        $section->save();
        $section_id = $section->id;
        
        if(isset($event->question_data['request']['test_case_file'])){
            $image=$event->question_data['request']['test_case_file'];
            $filename=md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
            $location=public_path('public/storage/question-detail-test_case_file/'.$filename);
            Question_detail::where('id' ,'=', $section_id)->update([
            'test_case_file' => $filename
            ]); 
            $section->test_case_file = $this->UploadFile('test_case_file', $event->question_data['request']['test_case_file']);
        }
    }
    public function UploadFile($type, $file){
        if( $type == 'test_case_file'){
        $path = 'public/storage/question-detail-test_case_file/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
}
