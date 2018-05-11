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
    	//return $request->input();

    	try{
	    	/* Validation and Checks */
	    	// section mcq questions vali
	    	// input fields, date.

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

	    	if($hosted_test->save()){;
            	return \Response()->Json([ 'status' => 200,'msg'=>'Host Successfully Added']);
	    	}else{
	    		return "not inserted";
	    		return \Response()->Json([ 'status' => 202,'msg'=>'Host couldnot be Added']);
	    	}
	    	
	    	return redirect()->route('profile');  

        }catch(\Exception $e){
            $this->set_session('Profile Couldnot be updated.'.$e->getMessage(), false);
            return redirect()->route('profile');                
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

    public function host_public_preview($id){
// dd($id);
        $args['hosted_test'] = Hosted_test::leftjoin('test_templates', 'test_templates.id', '=', 'hosted_tests.test_template_id')
        		->leftjoin('users', 'test_templates.user_id', '=', 'users.id')
                ->select('hosted_tests.id as host_id', 'hosted_tests.test_template_id', 'hosted_tests.host_name','hosted_tests.cut_off_marks', 'hosted_tests.test_open_date','hosted_tests.test_open_time','hosted_tests.test_close_date','hosted_tests.test_close_time', 'hosted_tests.time_zone', 'hosted_tests.status', 'users.name as username', 'test_templates.instruction', 'test_templates.description')->where('hosted_tests.id', $id)->first();
       dd($args);
    	return view('recruiter_dashboard.public_preview')->with($args);
    }

    public function can_report($id){
        dd($id);
        return view('recruiter_dashboard.canreport');
    }
}
