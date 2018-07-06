<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;
use Auth;
use Session;
use Mail;
use App\Question;
use App\Question_detail;
use App\Question_solution;
use App\User;
use App\Question_level;
use App\Question_tag;
use App\Coding_entry;
use App\Setting_info;
use App\Test_case;
use App\Coding_question_language;
use App\Questions_submission_resource;
use App\Allowed_language;
use App\Question_state;
use App\Invite_candidate;
use App\Hosted_test;
use App\Help;

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

   public function customer_support_view()
   {
      return view('recruiter_dashboard.customer_support'); 
   }

    public function customer_support(Request $request)
    { 
         $search_item =  $request->input('str');
         //$search_item = Input::get('query');
          $data[] = "";
            $searching= DB::table('supports')
            ->where('description','LIKE','%'.$search_item.'%')->get();
            
            if (count($searching) > 0) {
                 //$this->set_session('No query found with this text. Please try again.', false); 
                // Session::flash('not_found','no query found with this text');
              return \Response()->Json([ 'status' => 200,'searching'=>$searching]);

            }
            else
            {
              return \Response()->Json([ 'status' => 202,'searching'=> 'no result found']);
            }
     
        // return view('recruiter_dashboard.customer_support', ['searching' => $searching , 'request' => Input::get('query')]);
    }

    public function history()
    {
        return view('recruiter_dashboard.history');
    }

    public function invited_candidates($id)
    {
        $host_id = $id;
        $invited_candidates = Invite_candidate::where('host_test_id',$id)->get();
        $hosted_time = Hosted_test::where('id',$id)->first();
        return view('recruiter_dashboard.invited_candidates',['host_id'=>$host_id, 'invited_candidates'=>$invited_candidates, 'hosted_time'=>$hosted_time]);
    }

    public function library_public_questions(Request $request, $id=NULL)
    {

        // return $request->input('modal');
      if($request->input('modal') == "modal_pencil")
      {
        $args['get_data'] = Question::join('question_details','questions.id','=','question_details.question_id')
        ->join('question_states','questions.question_state_id','=','question_states.id')
        ->select('questions.id as  question_id','questions.section_id','questions.question_state_id','questions.question_type_id','questions.question_level_id','questions.question_statement','question_details.tag_id','question_details.media','question_details.test_case_file','question_details.test_case_verify','question_details.weightage_status','question_details.coding_program_title','question_details.marks','question_details.negative_marks','question_details.provider','question_details.author','question_states.state_name')
        ->where('question_id','=',$id)
        ->first();
        $args['choices'] = DB::table('mulitple_choices')->where('question_id','=',$id)->get();
        $args['items'] = DB::table('question_tags')->get();
        $args['solution'] = DB::table('question_solutions')->where('question_id','=',$id)->first();
        $args['levels'] = Question_level::all();
        $args['tags'] = Question_tag::all();
      }

      if($request->input('modal') == "modal_coding")
      {
        $args['coding_data'] = Question::join('question_details','questions.id','=','question_details.question_id')
        ->join('question_states','questions.question_state_id','=','question_states.id')
        ->join('question_solutions','questions.id','=','question_solutions.question_id')
        ->select('questions.id as  question_id','questions.section_id','questions.question_state_id','questions.question_type_id', 'questions.question_sub_types_id' ,'questions.question_level_id','questions.question_statement','question_details.tag_id','question_details.media','question_details.test_case_file','question_details.test_case_verify','question_details.weightage_status','question_details.coding_program_title','question_details.marks','question_details.negative_marks','question_details.provider','question_details.author','question_states.state_name','question_solutions.text','question_solutions.code','question_solutions.url','question_details.coding_program_title')
        ->where('questions.id','=',$id)
        ->first();
        $args['coding_entries'] = Coding_entry::where('question_id','=',$id)->get();
        $args['test_cases'] = Test_case::where('question_id','=',$id)->get();
        $args['allowed_languages'] = Allowed_language::get(); 
        $args['coding_question_languages'] = Coding_question_language::where('question_id','=',$id)->get();
        $temp_array = array();
        foreach ($args['coding_question_languages'] as $args['question_language']) {
          $temp_array[] = $args['question_language']->allowed_languages_id;
        }
        $args['coding_question_languages'] = $temp_array;
        $args['tags'] = Question_tag::all();
      }

      if($request->input('modal') == "submission_modal1")
      {
        // dd($id);
        // $args['q'] = Question::join('question_details','questions.id','=','question_details.question_id')
        // ->where('questions.id','=',$id)->first();
        $args['submission_data'] = Question::join('question_details','questions.id','=','question_details.question_id')
        ->join('question_states','questions.question_state_id','=','question_states.id')
        ->join('question_solutions','questions.id','=','question_solutions.question_id')
        ->leftjoin('question_submission_evaluations','questions.id','=','question_submission_evaluations.question_id')
        ->select('questions.id as  question_id','questions.section_id','questions.question_state_id','questions.question_type_id', 'questions.question_sub_types_id' ,'questions.question_level_id','questions.question_statement','question_details.tag_id','question_details.media','question_details.test_case_file','question_details.test_case_verify','question_details.weightage_status','question_details.coding_program_title','question_details.marks','question_details.negative_marks','question_details.provider','question_details.author','question_states.state_name','question_solutions.text','question_solutions.code','question_solutions.url','question_submission_evaluations.submission_evaluation_title','question_submission_evaluations.weightage')
        ->where('questions.id','=',$id)
        ->first();

        //dd($args['submission_data']);

        if(isset($args['submission_data']))
        {
          $args['questions_submission_resources'] = Questions_submission_resource::where('question_id','=',$id)->get();  

        }
        $temp_array = array();
        foreach ($args['questions_submission_resources'] as $args['submission_resources']) {
          $temp_array[] = $args['submission_resources']->candidate_help_material_tests_id;
        }
        $args['questions_submission_resources'] = $temp_array;
        $args['tags'] = Question_tag::all();
          
        
      }




       $args['levels'] = Question_level::all();
        $args['tags'] = Question_tag::all();
        $args['question_states'] = Question_state::all();
        //dd($args['levels']);
       
       //Public Questions
     $args['public_questions_mcqs'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
        ->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
        ->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
        ->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
        ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
        ->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
        ->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')     
        ->where('test_template_types.id', 1) //public
        ->where('questions.question_type_id', 1)
        ->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
        ->get();

     $args['public_questions_codings'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
        ->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
        ->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
        ->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
        ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
        ->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
        ->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')     
        ->where('test_template_types.id', 1) //public
        ->where('questions.question_type_id', 2)
        ->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
        ->get();

     $args['private_questions_mcqs'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
        ->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
        ->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
        ->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
        ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
        ->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
        ->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')     
        //->where('test_template_types.id', 2) //private
        ->where('questions.question_type_id', 1) //mcq
        ->where('questions.lib_private_question', 1) //mcq
        ->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
        ->get();

        //

     $args['private_questions_codings'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
        ->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
        ->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
        ->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
        ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
        ->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
        ->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')     
        //->where('test_template_types.id', 2) //private
        ->where('questions.question_type_id', 2) //coding
        ->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
        ->get();

     $args['private_questions_submissions'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
        ->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
        ->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
        ->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
        ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
        ->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
        ->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')     
        //->where('test_template_types.id', 2) //private
        ->where('questions.question_type_id', 3) //submission
        ->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
        ->get();




      if(isset($args))
      {
        
        return view('recruiter_dashboard.library_public_questions')->with($args);
      }

    }



    public function preview_test_questions()
    {
        return view('recruiter_dashboard.preview_test_questions');
    }


    public function change_password(){
     
        return view('recruiter_dashboard.setting.change_password');
    }

    public function update_password_recruiter(Request $request){
      try{
        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
          // The passwords match...
          $this->validate($request, [
            'password' => 'required|confirmed|min:2|max:18',
          ]);
            //Updating Password
            $newpassword1 = bcrypt($request->input('password'));
            $user = User::find(Auth::user()->id);
            $user->password = $newpassword1;
            $password_updated = $user->save();
          if($password_updated){
             $this->set_session('Password Updated', true);
          }else{
            $this->set_session('Password couldnot be Updated. Please try again.', false); 
        }
      }else{
        //old password doesn't match
        $this->set_session('Please enter Correct Previous Password to change your Password.', false);  
      }
      return redirect()->route('change_password');  

      }catch(\Exception $e){
        $this->set_session('Password couldnot be Updated. '.$e->getMessage(), false);
        return redirect()->route('change_password');                
      }
    }
    public function general_setting(){
        $args['question_tags'] = Question_tag::all();
         return view('recruiter_dashboard.setting.general_setting')->with($args);
    }

    public function setting_info(){      
         return view('recruiter_dashboard.setting.info');
    }
    public function post_setting_info(Request $request){  
      try {
       if (Auth::check()) {        
         $store = new Setting_info;
         $store->user_id =Auth::user()->id;
         $store->title =$request->title;
         $store->info_description =$request->info_description;                 
         if ($store->save()){          
          $user = User::where('id',Auth::user()->id)->first(); 
          Mail::send('emails.info_email',['user_data'=>$user,'stored_info'=>$store] , function ($message) use($user){
              $message->from($user['email'], 'Info Email - Recruitment');
              $message->to(env('MAIL_USERNAME'))->subject('Recruitment - Info Email');
          });
          return \Response()->Json([ 'status' => 200,'msg'=>'Thank you for your valuable time. we will get back to you as soon as possible.']);
         }else{
           return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);
         }       
        }
      } catch (QueryException $e) {
        return \Response()->Json([ 'array' => $e]);
      }
    }

    public function dashboard_search(Request $request)
    {
      //return 123;
      $word = $request->input('search_text');
      // return ($request->input());
      // recruiter_dashboard
      // question_result
      // search_reasult
      $results = Help::where('question', 'LIKE', "%{$word}%")->get();
      //return $result;
      $options = view("recruiter_dashboard.question_result.search_reasult")->with('results', $results)->render();
      return \Response()->Json([ 'status' => 200, 'html' => $options]);
      //return $options;
    }
}
