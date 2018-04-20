<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Templates_test_setting;
use App\Templates_contact_setting;
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
}