<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Question;
use App\Question_detail;
use App\Question_solution;
class RecruiterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('recruiter_dashboard.dashboard');
    }

    public function customer_support()
    {
    
         $search_item = Input::get('query');
          $data[] = "";
            $searching= DB::table('supports')
            ->where('description','LIKE','%'.$search_item.'%')->get();
            
            if (count($searching) == 0) {
                
                Session::flash('not_found','no query found with this text');
            }
     
        return view('recruiter_dashboard.customer_support', ['searching' => $searching]);
    }

    public function history()
    {
        return view('recruiter_dashboard.history');
    }

    public function invited_candidates()
    {
        return view('recruiter_dashboard.invited_candidates');
    }

    public function library_public_questions($id=NULL)
    {
        $args['get_data'] = Question::join('question_details','questions.id','=','question_details.question_id')
        ->join('question_states','questions.question_state_id','=','question_states.id')
        ->select('questions.id as  question_id','questions.section_id','questions.question_state_id','questions.question_type_id','questions.question_level_id','questions.question_statement','question_details.tag_id','question_details.media','question_details.test_case_file','question_details.test_case_verify','question_details.weightage_status','question_details.coding_program_title','question_details.marks','question_details.negative_marks','question_details.provider','question_details.author','question_states.state_name')
        ->where('question_id','=',$id)
        ->first();
        $args['choices'] = DB::table('mulitple_choices')->where('question_id','=',$id)->get();
        // dd($args['choices']);
        $args['items'] = DB::table('question_tags')->get();
        $args['solution'] = DB::table('question_solutions')->where('question_id','=',$id)->first();

        
        return view('recruiter_dashboard.library_public_questions')->with($args);
    }



    public function preview_test_questions()
    {
        return view('recruiter_dashboard.preview_test_questions');
    }


    public function change_password(){
         return view('recruiter_dashboard.setting.change_password');
    }

    public function general_setting(){
         return view('recruiter_dashboard.setting.general_setting');
    }

    public function setting_info(){
         return view('recruiter_dashboard.setting.info');
    }

}
