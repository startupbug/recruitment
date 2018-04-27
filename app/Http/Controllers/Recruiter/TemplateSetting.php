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

class TemplateSetting extends Controller
{
	//Creating Test Template Settings
    public function templatetestSetting(Request $request){
    	//dd($request->input());
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
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Created Test Template Settings']);
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
		$delete = Question_tag::find($request->id);
		if ($delete->delete()){				
		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Successfully Deleted The Question Tag']);
		}else{
			return \Response()->Json([ 'status' => 200,'msg'=>'Something Went Wrong Please Try Again!']);	
		}	
	}
}