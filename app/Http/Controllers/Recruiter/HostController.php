<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Events\TemplateSection;
use App\Test_template_types;
use App\Test_template;
use App\Section;
use App\Question;
use App\Hosted_test;
use App\User_question;
use App\User_format_detail;
use App\Teststatus;
use App\Templates_test_setting;
use App\Templates_contact_setting;
use App\Question_detail;
use App\Question_solution;
use App\Webcam;
use App\Mulitple_choice;
use App\Coding_question_language;
use App\Question_submission_evaluation;
use App\Templates_mail_setting;
use App\Template_setting_message;
use App\Questions_submission_resource;
use App\Coding_entry;
use App\Public_view_page;

class HostController extends Controller
{
    public function host_test_page($id){

        $args['tags'] = DB::table('question_tags')->get();

        $args['edit'] = Test_template::find($id);

      	$args['sections'] = Section::join('questions','questions.section_id','=','sections.id','left outer')->select('sections.*',DB::raw('count(questions.id) as section_questions'))->where('template_id',$id)->groupBy('sections.id')->orderBy('order_number','ASC')->get();

        foreach ($args['sections'] as $key => $value) {
             $args['sections_tabs'][$value->id]['ques'] = Question::where('question_type_id',1)->where('section_id', $value->id)->get();
             $args['sections_tabs'][$value->id]['count'] = $value->section_questions;


             $args['sections_tabs'][$value->id]['ques1'] = Question::where('question_type_id',1)->where('section_id', $value->id)->get();

             //$args['sections_tabs'][$value->id]['count'] = count($args['sections_tabs'][$value->id]['ques1']); //$value->section_questions;

            $args['sections_tabs'][$value->id]['ques2'] = Question::where('question_type_id',2)->where('section_id', $value->id)->get();

             $args['sections_tabs'][$value->id]['count2'] = count($args['sections_tabs'][$value->id]['ques2']);

             $args['sections_tabs'][$value->id]['ques3'] = Question::where('question_type_id',3)->where('section_id', $value->id)->get();

             $args['sections_tabs'][$value->id]['count3'] = count($args['sections_tabs'][$value->id]['ques3']);

 //counting easy questions from each section
              $args['sections_tabs'][$value->id]['easy_question_count'] = Section::leftJoin('questions','questions.section_id','=','sections.id')
               ->where('sections.id',$value->id)
               ->where('questions.question_level_id',1)
               ->count();
              // dd($args['sections_tabs']);

               //counting medium questions from each section
              $args['sections_tabs'][$value->id]['medium_question_count'] = Section::leftJoin('questions','questions.section_id','=','sections.id')
               ->where('sections.id',$value->id)
               ->where('questions.question_level_id',2)
               ->count();

              //counting hard questions from each section
               $args['sections_tabs'][$value->id]['hard_question_count'] = Section::leftJoin('questions','questions.section_id','=','sections.id')
               ->where('sections.id',$value->id)
               ->where('questions.question_level_id',3)
               ->count();

              //counting total marks questions from each section
               $args['sections_tabs'][$value->id]['marks_question_count'] = Section::leftJoin('questions','questions.section_id','=','sections.id')
               ->leftJoin('question_details','question_details.question_id','=','questions.id')
               ->select('question_details.marks')
               ->where('sections.id',$value->id)               
               ->sum('marks');

        }

  $args['test_setting_types'] = Test_template_types::get();
        $args['test_setting_webcam'] = Webcam::get();
        $args['edit_test_settings'] = Templates_test_setting::where('test_templates_id',$id)->first();
        $args['edit_test_settings_message'] = Template_setting_message::where('test_templates_id',$id)->first();
        $args['edit_mail_settings'] = Templates_mail_setting::where('test_templates_id',$id)->first();
        $args['edit_test_contact_settings'] = Templates_contact_setting::where('test_templates_id',$id)->first();
        $args['template_id'] = $id;

          $args['template_question_setting'] = User_question::join('format_settings','format_settings.id','=','user_setting_questions.format_setting_id','left outer')
         ->select('user_setting_questions.*','format_settings.name as format_settings_name')
         ->where('template_id',$id)->orderBy('user_setting_questions.order_number','ASC')->get();

      //Public_view_page index method query 
      $args['Public_view_page'] = Public_view_page::get();
      

    $args['public_page_view_details'] = Test_template::where('id',$id)
      ->orderBy('image','Desc')
      ->first();

             //$args['template_question_setting'][0]['arr'] = array(123);
             //dd($args['template_question_setting']);
             //$user_setting_question_details = array();
         foreach ($args['template_question_setting'] as $key => $value) {
          $args['template_question_setting'][$key]['detail'] = User_format_detail::where('question_id',$value->id)->get();
      }

        //Assinging Host Flag for Model
        $args['hostFlag'] = true;


        return view('recruiter_dashboard.edit_template')->with($args);
    }

    public function host_test_post(Request $request){
      ini_set('max_execution_time', 300);
    	// return $request->input();
      
      // $test_template_data->description
      // $test_template_data->instruction
      // return  $test_template_data;
    	try{
	    	/* Validation and Checks */
	    	// section mcq questions vali
	    	// input fields, date.

          $template_id = $request->input('template_id');

          $test_template_data = Test_template::where('id','=',$template_id)->first();
          // return $test_template_data;
	      	$hosted_test = new Hosted_test();
	      	$hosted_test->host_name = $request->input('host_name');
	      	$hosted_test->cut_off_marks = $request->input('cut_off_marks');

	      	$temp1 =  $request->input('op_t_y').'-'.$request->input('op_t_m').'-'.$request->input('op_t_d');
	      	$temp2 = $request->input('op_time_hrs').':'.$request->input('op_time_min').':'.'00';
	      	$my_date = date($temp1. " ".$temp2);
	        $hosted_test->test_open_date = $my_date;
	        $hosted_test->test_open_time = $request->input('cl_time_format');

	      	$temp1 =  $request->input('cl_t_y').'-'.$request->input('cl_t_m').'-'.$request->input('cl_t_d');
	      	$temp2 = $request->input('cl_time_hrs').':'.$request->input('cl_time_min').':'.'00';
	      	$my_date = date($temp1. " ".$temp2);
	        $hosted_test->test_close_date = $my_date;
	        $hosted_test->test_close_time = $request->input('cl_time_format');

	        $hosted_test->time_zone = $request->input('time_zone');

	        $hosted_test->test_template_id = $request->input('template_id');
	        $hosted_test->time_zone = $request->input('time_zone');
          $hosted_test->description = $test_template_data->description;
          $hosted_test->instruction = $test_template_data->instruction;
          $hosted_test->save();
          

          $get_new_host = Hosted_test::where('id',$hosted_test->id)->first();
          // return $get_new_host->id;

          // $insert_host_id = new Test_template;
          // $insert_host_id->user_id = Auth::user()->id;
          // $insert_host_id->title = $request->input('host_name');
          // $insert_host_id->template_type_id = $test_template_data->template_type_id; 
          // $insert_host_id->description = $test_template_data->description;
          // $insert_host_id->instruction = $test_template_data->instruction;
          // $insert_host_id->image = $test_template_data->image;
          // $insert_host_id->duration = $test_template_data->duration;
          // $insert_host_id->host_id = $get_new_host->id;
          // $insert_host_id->hosted = 1;
          // $insert_host_id->save();

          $previous_template = Test_template::find($template_id);
          $section_of_templates = Section::where('template_id',$template_id)->get();
          // return $section_of_templates;

      if (Auth::check())
       {
                //Templates ka data copy horha hai yahan
          if (isset($previous_template)) {
              $store = $previous_template->replicate();
             
              $store->title = $request->input('host_name');

              $store->host_id = $get_new_host->id;
              $store->hosted = 1;

              if ($store->save()) { 

               //     
                  $user_questions_by_host = User_question::where('template_id', $template_id)->get();
                            // dd();
                  foreach($user_questions_by_host as $Key => $host_user_question)
                            // return ;
                  {
                    $previous_user_question_for_host = User_question::where('id', $host_user_question->id)->first();
                    if(isset($previous_user_question_for_host))
                    {
                      $user_question_for_host = $previous_user_question_for_host->replicate();
                      $user_question_for_host->template_id = $store->id;
                      $user_question_for_host->save(); 
                    }
                  }                                     
                  foreach ($section_of_templates as $key => $value) {
                      $previous_section = Section::find($value->id);
                      //Sections ka data copy horha hai yahan
                      if (isset($previous_section)){
                          $section_store = $previous_section->replicate();
                          $section_store->template_id =$store->id;
                          $section_store->save();
                          
                      }
                        $questions_of_section = Question::where('section_id',$value->id)->get();
                        foreach ($questions_of_section as $key => $one_question)
                        {

                          $previous_question = Question::find($one_question->id);

                          //Questions ka data copy horha hai yahan
                          if (isset($previous_question))
                          {
                              $question_store = $previous_question->replicate();
                              $question_store->section_id =$section_store->id;
                              $question_store->save();
                          }
                              $questions_details_of_question = Question_detail::where('question_id',$one_question->id)->get();
                              foreach ($questions_details_of_question as $key => $question_detail) {
                              $previous_question_detail =  Question::with('question_detail')->find($question_detail->question_id)->question_detail;

                              //Question Detail ka data copy horha hai yahan
                              if (isset($previous_question_detail)){
                                  $question_detail_store = $previous_question_detail->replicate();
                                  $question_detail_store->question_id =$question_store->id;
                                  $question_detail_store->save();
                              }
                          }

                          $questions_multiple_choice_of_question = Mulitple_choice::where('question_id',$one_question->id)->get();
                          foreach ($questions_multiple_choice_of_question as $key => $multiple_choice) {
                              $previous_multiple_choice = Mulitple_choice::where('question_id', $multiple_choice->question_id)->first();
                              //Question Multiple Choice ka data copy horha hai yahan
                              if (isset($previous_multiple_choice)){
                                  $question_mulitple_choice_store = $previous_multiple_choice->replicate();
                                  $question_mulitple_choice_store['question_id']=$question_store->id;
                                  $question_mulitple_choice_store->save();
                              }
                          }

                          $questions_solution_of_question = Question_solution::where('question_id',$one_question->id)->get();

                          foreach ($questions_solution_of_question as $key => $question_solution) {
                              $previous_question_solution =  Question::with('question_solution')->find($question_solution->question_id)->question_solution;
                              //Question Solution ka data copy horha hai yahan
                              if (isset($previous_question_solution)){
                                  $question_solution_store = $previous_question_solution->replicate();
                                  $question_solution_store->question_id =$question_store->id;
                                  $question_solution_store->save();
                              }
                          }

                          $questions_coding_entry_of_question = Coding_entry::where('question_id',$one_question->id)->get();

                          foreach ($questions_coding_entry_of_question as $key => $coding_entry) {
                              $previous_coding_entry = Coding_entry::where('question_id',$coding_entry->question_id)->first();
                              //Question Coding Entry ka data copy horha hai yahan
                              if (isset($previous_coding_entry)){
                                  $question_coding_entry_store = $previous_coding_entry->replicate();
                                  $question_coding_entry_store['question_id']=$question_store->id;
                                  $question_coding_entry_store->save();
                              }
                          }

                          $questions_coding_language_of_question = Coding_question_language::where('question_id',$one_question->id)->get();

                          foreach ($questions_coding_language_of_question as $key => $coding_language) {
                              $previous_coding_language = Coding_question_language::where('question_id',$coding_language->question_id)->first();
                              //Question Coding Languages ka data copy horha hai yahan
                              if (isset($previous_coding_language)){
                                  $question_coding_language_store = $previous_coding_language->replicate();
                                  $question_coding_language_store['question_id']=$question_store->id;
                                  $question_coding_language_store->save();
                              }
                          }

                          $questions_submission_evaluation_of_question = Question_submission_evaluation::where('question_id',$one_question->id)->get();

                          foreach ($questions_submission_evaluation_of_question as $key => $submission_evaluation) {
                              $previous_submission_evaluation = Question_submission_evaluation::where('question_id',$submission_evaluation->question_id)->first();
                              //Question Submission Evaluation ka data copy horha hai yahan
                              if (isset($previous_submission_evaluation)){
                                  $question_submission_evaluation_store = $previous_submission_evaluation->replicate();
                                  $question_submission_evaluation_store['question_id']=$question_store->id;
                                  $question_submission_evaluation_store->save();
                              }
                          }

                          $questions_submission_resource_of_question = Questions_submission_resource::where('question_id',$one_question->id)->get();
                          foreach ($questions_submission_resource_of_question as $key => $submission_resource) {
                              $previous_submission_resource = Questions_submission_resource::where('question_id',$submission_resource->question_id)->first();
                              //Question Submission Resources ka data copy horha hai yahan
                              if (isset($previous_submission_resource)){
                                  $question_submission_resource_store = $previous_submission_resource->replicate();
                                  $question_submission_resource_store['question_id']=$question_store->id;
                                  $question_submission_resource_store->save();
                              }
                          }
                         
                      }
                  }
                  
                  return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Duplicated The Test Template']);
              }else{
                  return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong']);
                      //return redirect()->back();
              }
          }
        }
      }

        catch(\Exception $e){
            $this->set_session('Profile Couldnot be updated.'.$e->getMessage(), false);
            // return redirect()->route('profile');
        }

    }

    //delete host
    public function host_test_del(Request $request){

    	try{
    		if($request->has('id')){

    			//Can you Delete this Host?
		    	$hosted_test_del = Hosted_test::find($request->input('id'));

		    	$test_temp = Test_template::where('id', $hosted_test_del->test_template_id)->first(['user_id']);

		    	if($test_temp->user_id != Auth::user()->id){
		    		return \Response()->Json([ 'status' => 202,'msg'=>'You cannot delete this Host']);
		    	}

		    	$hosted_test_del = $hosted_test_del->delete();

		    	if($hosted_test_del){
		    		return \Response()->Json([ 'status' => 200, 'msg'=>'Host Successfully deleted']);
		    	}else{
		    		return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be deleted']);
		    	}

    		}else{
    			return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be deleted']);
    		}

    	}catch(\Exception $e){
    		return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be deleted'.$e->getMessage()]);
        }
    }

    //terminate host
    public function host_terminate(Request $request){

    	try{
    		if($request->has('id')){

    			//Can you Delete this Host?
		    	$hosted_test_del = Hosted_test::find($request->input('id'));

		    	$test_temp = Test_template::where('id', $hosted_test_del->test_template_id)->first(['user_id']);

		    	if($test_temp->user_id != Auth::user()->id){
		    		return \Response()->Json([ 'status' => 202,'msg'=>'You cannot delete this Host']);
		    	}

		    	$hosted_test_del->status = 2;

		    	if($hosted_test_del->save()){
		    		return \Response()->Json([ 'status' => 200, 'msg'=>'Host Successfully Terminated']);
		    	}else{
		    		return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be Terminated']);
		    	}

    		}else{
    			return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be Terminated']);
    		}

    	}catch(\Exception $e){
    		return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be Terminated'.$e->getMessage()]);
        }
    }

    public function host_public_preview($id, $flag){
// dd($id);
      if($flag == "host")
      {
        $args['hosted_test'] = Hosted_test::leftjoin('test_templates', 'test_templates.id', '=', 'hosted_tests.test_template_id')
            ->leftjoin('users', 'test_templates.user_id', '=', 'users.id')
                ->select('hosted_tests.id as host_id', 'hosted_tests.test_template_id', 'hosted_tests.host_name','hosted_tests.cut_off_marks', 'hosted_tests.test_open_date','hosted_tests.test_open_time','hosted_tests.test_close_date','hosted_tests.test_close_time', 'hosted_tests.time_zone', 'hosted_tests.status', 'users.name as username', 'test_templates.instruction', 'test_templates.description')->where('hosted_tests.id', $id)->first();
      }

      else
      {
        $args['hosted_test'] = Hosted_test::leftjoin('test_templates', 'test_templates.id', '=', 'hosted_tests.test_template_id')
        ->leftjoin('users', 'test_templates.user_id', '=', 'users.id')->select('hosted_tests.id as host_id', 'hosted_tests.test_template_id','users.name as username', 'test_templates.title' ,'test_templates.instruction', 'test_templates.description','test_templates.duration')->where('test_templates.id', $id)->first();
      }

       // dd($args);
      $args['Public_view_page'] = Public_view_page::where('template_id',$id)->get();
    	return view('recruiter_dashboard.public_preview')->with($args);
    }

    public function can_report($id){
        dd($id);
        return view('recruiter_dashboard.canreport');
    }
}
