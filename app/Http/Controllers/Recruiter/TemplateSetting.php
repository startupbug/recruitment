<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Templates_test_setting;
use App\Templates_contact_setting;
use App\Template_setting_message;
use App\Templates_mail_setting;
use App\Question_tag;
use Auth;
use DB;
use App\Host_Templates_Test_Settings;
use App\Advanced_setting;
use App\Section;

class TemplateSetting extends Controller
{
	//Creating Test Template Settings
    public function templatetestSetting(Request $request){

    	try {
			if (isset($request->template_id)){				
				$store = Templates_test_setting::firstOrNew(array('test_templates_id' => $request->template_id));
				$store->test_templates_id = $request->template_id;
				$store->test_template_types_id = $request->test_template_types_id;
				$store->webcam_id = $request->webcam_id;
				if ($request->mandatory_resume == 1) {
				$store->mandatory_resume = 1;
				$store->request_resume = 1;				
				}elseif($store->request_resume == 1 && $request->mandatory_resume != 1){
				$store->mandatory_resume = 0;
				$store->request_resume = 1;
				}elseif($store->request_resume != 1){
					$store->mandatory_resume = 0;					
					$store->request_resume = 0;					
				}
				if ($request->email_verification == 1) {
				$store->email_verification = 1;			
				}else{
				$store->email_verification = 0;
				}			
				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'Setting has been saved successfully.']);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}			
			}
			elseif ($request->host_id)
			{
				$store = Host_Templates_Test_Settings::firstOrNew(array('host_id' => $request->host_id));
				$store->host_id = $request->host_id;
				$store->webcam_id = $request->webcam_id;
				if ($request->mandatory_resume == 1) {
				$store->mandatory_resume = 1;
				$store->request_resume = 1;				
				}elseif($store->request_resume == 1 && $request->mandatory_resume != 1){
				$store->mandatory_resume = 0;
				$store->request_resume = 1;
				}elseif($store->request_resume != 1){
					$store->mandatory_resume = 0;					
					$store->request_resume = 0;					
				}
				if ($request->email_verification == 1) {
				$store->email_verification = 1;			
				}else{
				$store->email_verification = 0;
				}

				// date and time update function
				// $hosted_test = new Hosted_test();
				$temp1 =  $request->input('op_t_y').'-'.$request->input('op_t_m').'-'.$request->input('op_t_d');
		      	$temp2 = $request->input('op_time_hrs').':'.$request->input('op_time_min').':'.'00';
		      	$my_date1 = date($temp1. " ".$temp2);
		        // $hosted_test->test_open_date = $my_date1;
		        // $hosted_test->test_open_time = $request->input('cl_time_format');

		      	$temp1 =  $request->input('cl_t_y').'-'.$request->input('cl_t_m').'-'.$request->input('cl_t_d');
		      	$temp2 = $request->input('cl_time_hrs').':'.$request->input('cl_time_min').':'.'00';
		      	$my_date2 = date($temp1. " ".$temp2);
		        // $hosted_test->test_close_date = $my_date2;
		        // $hosted_test->test_close_time = $request->input('cl_time_format');

		        // $hosted_test->time_zone = $request->input('time_zone');

		        // $hosted_test->test_template_id = $request->input('template_id');
		        // $hosted_test->time_zone = $request->input('time_zone');

		        $array = DB::table('hosted_tests')
		           ->where('id',$request->host_id)
		           ->update([
		            'test_open_date' => $my_date1,
		            'test_open_time' => $request->input('cl_time_format'),
		            'test_close_date' => $my_date2,
		            'test_close_time' => $request->input('cl_time_format'),
		            'time_zone' =>  $request->input('time_zone') 
		          ]);

		           
		           return $array;
				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created Test Template Settings', 'array' => $array]);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}		
			}

		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
	}
	//Creating Test Template Settings

	//Creating Test Template Contact Settings
	public function templatetestContactSetting(Request $request){	    	
    	try {
			if (isset($request->template_id)){				
				$store = Templates_contact_setting::firstOrNew(array('test_templates_id' => $request->template_id));
				$store->test_templates_id = $request->template_id;

				if($request->email_visible == 1){
					$store->email_visible = 1;								
				}else{
					$store->email_visible = 0;					
				}

				if($request->contact_visible == 1){
					$store->contact_visible = 1;				
				}else{
					$store->contact_visible = 0;
				}	

				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created Test Template Contact Settings']);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}			
			}else{
				$this->set_session('Please Give The Required Data', false);
				return redirect()->back();
			}
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
	}
	//Creating Test Template Contact Settings

	//Creating Test Template Message Settings
	public function template_setting_message_post(Request $request){
    	
    	try {
			if (isset($request->template_id)){				
				$store = Template_setting_message::firstOrNew(array('test_templates_id' => $request->template_id));
				$store->test_templates_id = $request->template_id;
				if(isset($request->setting_message)){
					$store->setting_message = $request->setting_message;			
				}
				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created Test Template Message Settings']);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}			
			}else{
				$this->set_session('Please Give The Required Data', false);
				return redirect()->back();
			}
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
	}
	//Creating Test Template Message Settings


	//Creating Test Template Message Settings
	public function templatetestMailSetting(Request $request){	
	
    	try {
			if (isset($request->template_id)){				
				$store = Templates_mail_setting::firstOrNew(array('test_templates_id' => $request->template_id));
				$store->test_templates_id = $request->template_id;
				$store->percentage_required = $request->percentage_required;
				$store->receiver_email = $request->receiver_email;

				if($request->include_questionnaire == 1){
					$store->include_questionnaire = 1;								
				}else{
					$store->include_questionnaire = 0;	
				}

				if($request->candidate_mail_setting == 1){
					$store->candidate_mail_setting = 1;				
				}else{
					$store->candidate_mail_setting = 0;
				}

				if($request->email_report_status == 1){
					$store->email_report_status = 1;				
				}else{
					$store->email_report_status = 0;
				}	

				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created Test Template Mail Settings']);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}			
			}else{
				$this->set_session('Please Give The Required Data', false);
				return redirect()->back();
			}
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
	}
	//Creating Test Template Message Settings


	public function ajax_tag_post(Request $request){

		try {
			if (isset($request->id)) {
				DB::table('question_tags')
		            ->where('id', $request->id)
		            ->update(['tag_name' => $request->value]);
		            return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated The Tag Name']);
			}else{
				$store = new Question_tag;
				$store->tag_name = $request->value;
				if ($store->save()){				
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created The Tag Name']);
				}else{
					return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
				}
			}			
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
	}

	public function delete_question_tag(Request $request){
		// return $request->input();
		$delete = Question_tag::find($request->id);
		if ($delete->delete()){				
		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Successfully Deleted The Question Tag']);
		}else{
			return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
		}	
	}

	//Advance Setting Post request
	public function advance_setting_form(Request $request){
		//return $request->input();
		try {

			//Updating Section name
			$section = Section::find($request->input('section_id'));
			$section->section_name = $request->input('section_name');		
			$section_save = $section->save();

			$section_id = $request->input('section_id'); 
			$template_id = $request->input('test_id');

			$adv_exists = Advanced_setting::where('section_id', $section_id)->where('test_id', $template_id)->first();
			
			if(is_null($adv_exists)){
				//Create new settings for this section
				$advanced_setting = new Advanced_setting();				

			}else{
				//Update settings for this Section
				$advanced_setting = Advanced_setting::find($adv_exists->id);

			}

			if($request->has('win_proc')){
				$advanced_setting->win_proc = 1;
			}else{
				$advanced_setting->win_proc = 0;
			}

			if($request->has('ques_shuff')){
				$advanced_setting->ques_shuff = 1;
			}else{
				$advanced_setting->ques_shuff = 0;
			}

			if($request->has('atempt_once')){
				$advanced_setting->atempt_once = 1;
			}else{
				$advanced_setting->atempt_once = 0;
			}

			if($request->has('mov_next')){
				$advanced_setting->mov_next = 1;
			}else{
				$advanced_setting->mov_next = 0;
			}

			if($request->has('show_cal')){
				$advanced_setting->show_cal = 1;
			}else{
				$advanced_setting->show_cal = 0;
			}

			if($request->has('dura_min')){
				$advanced_setting->dura_min = 1;
			}else{
				$advanced_setting->dura_min = 0;
			}															

			if($request->has('en_ques_pool')){
				$advanced_setting->en_ques_pool = 1;
			}else{
				$advanced_setting->en_ques_pool = 0;
			}	

			if($request->has('adv_ques_pool')){
				$advanced_setting->adv_ques_pool = 1;
			}else{
				$advanced_setting->adv_ques_pool = 0;
			}

			//Text fields 
			if($request->has('dura_min') ){
				$advanced_setting->dura_min = $request->input('dura_min');
			}

			//---------------
			if($request->has('easy_num_ques')){ // 
				$advanced_setting->easy_num_ques = $request->input('easy_num_ques');
				$advanced_setting->easy_marks_plus = $request->input('easy_marks_plus');
				$advanced_setting->easy_marks_minus = $request->input('easy_marks_minus');				
			}

			if($request->has('inter_num_ques')){ //
				$advanced_setting->inter_num_ques = $request->input('inter_num_ques');
				$advanced_setting->inter_marks_plus = $request->input('inter_marks_plus');
				$advanced_setting->inter_marks_minus = $request->input('inter_marks_minus');	
			}

			if($request->has('hard_num_ques')){ //
				$advanced_setting->hard_num_ques = $request->input('hard_num_ques');
				$advanced_setting->hard_marks_plus = $request->input('hard_marks_plus');
				$advanced_setting->hard_marks_minus = $request->input('hard_marks_minus');	
			}									


			//text fields	
			// foreach ($request->input() as $key => $value) {
			// 	if($key != 'section_name' && $key != '_token'){
			// 		$advanced_setting->$key = $request->input($key);
			// 	}
			// }

			if ($advanced_setting->save() && $section_save){				
				return \Response()->Json([ 'status' => 200, 'msg'=>'Advance Setting Successfully Updated']);
			}else{
				return \Response()->Json([ 'status' => 202, 'msg'=>'Advance Setting couldnot be Updated']);	
			}

		} catch (QueryException $e) {
	    		return \Response()->Json(['array' => $e]);
	    }

	}

	public function advance_setting_form_1(Request $request){
		//return $request->input();
		try {

			$section_id = $request->input('section_id'); 
			$template_id = $request->input('test_id');

			$adv_exists = Advanced_setting::where('section_id', $section_id)->where('test_id', $template_id)->first();
			
			if(is_null($adv_exists)){
				//return 123;
				//Create new settings for this section
				$advanced_setting = new Advanced_setting();
				$advanced_setting->section_id = $request->input('section_id');
				$advanced_setting->test_id = $request->input('test_id');			

			}else{
				//return 456;
				//Update settings for this Section
				$advanced_setting = Advanced_setting::find($adv_exists->id);

			}
			

			if($request->has('win_proc')){
				$advanced_setting->win_proc = 1;
			}else{
				$advanced_setting->win_proc = 0;
			}

			if($request->has('ques_shuff')){
				$advanced_setting->ques_shuff = 1;
			}else{
				$advanced_setting->ques_shuff = 0;
			}

			if($request->has('dura_min')){
				$advanced_setting->dura_min = $request->input('dura_min');
			}else{
				$advanced_setting->dura_min = $request->input('dura_min');
			}	
			

			if ($advanced_setting->save()){				
				return \Response()->Json([ 'status' => 200, 'msg'=>'Advance Setting Successfully Updated']);
			}else{
				return \Response()->Json([ 'status' => 202, 'msg'=>'Advance Setting couldnot be Updated']);	
			}

		} catch (QueryException $e) {
	    		return \Response()->Json(['array' => $e->getMessage()]);
	    }

	}

	public function advance_settings_data(Request $request){
		//return $request->input();
		$section_id = $request->input('sectionId');
		$template_id = $request->input('testId');

		$adv_data = Advanced_setting::where('section_id', $section_id)->where('test_id', $template_id)->first();
		return $adv_data;
	}
}