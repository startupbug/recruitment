<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyProfile;
use Auth;
use DB;
class CompanyController extends Controller
{
	// Updating Company General Settings
	public function post_general_setting(Request $request){		
		if (!empty($request->company_name) && !empty($request->company_logo)){
			$store = CompanyProfile::where('user_id',Auth::user()->id)->update([
				'company_name'=>$request->company_name,
				'company_logo'=>$request->company_logo
			]);
			if ($store){
				$this->set_session('You Have Successfully Saved The Company Name And Company Logo', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);
			}
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Company Name And Company Logo Url', false);
			return redirect()->back();
		}
	}
	// Updating Company General Settings

	// Updating Company Contact Details Settings
	public function post_contact_details(Request $request){	
		$company_email_arr = $request->company_email;
		array_push($company_email_arr, $request->email_status);
		$company_phone_arr = $request->company_phone;
		array_push($company_phone_arr, $request->contact_status);

		if (!empty($company_phone_arr) && !empty($company_email_arr)){
		$company_profile = CompanyProfile::where('user_id',Auth::user()->id)->update([
			'company_email'=> json_encode($company_email_arr),
			'company_phone'=> json_encode($company_phone_arr),								
		]);		
		if ($company_profile){				
				$this->set_session('You Have Successfully Saved The Company Email And Phone', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);					
			}
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Company Email And Company Phone', false);
			return redirect()->back();
		}
	}
	// Updating Company Contact Details Settings

	public function test_completion_mail(Request $request){
		if (!empty($request->company_message)){
			$store = CompanyProfile::where('user_id',Auth::user()->id)->update([				
				'company_message'=>$request->company_message
			]);
			if ($store){				
				$this->set_session('You Have Successfully Saved The Company Message', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);					
			}
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Company Message', false);
			return redirect()->back();
		}
	}

}
