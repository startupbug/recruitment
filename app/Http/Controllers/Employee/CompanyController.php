<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyProfile;
use Auth;
use DB;
class CompanyController extends Controller
{
	public function post_general_setting(Request $request){		
		if (!empty($request->company_name) && !empty($request->company_logo)){
			$store = CompanyProfile::where('employee_id',Auth::user()->id)->update([
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

}
