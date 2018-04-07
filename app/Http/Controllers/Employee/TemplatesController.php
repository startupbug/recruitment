<?php
namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Test_template_types;
use App\Test_template;
use Auth;
use DB;
class TemplatesController extends Controller
{
	// Creating Test Templates
	public function create_test_template(Request $request){	
		if (Auth::check()) {
			if (isset($request->template_type_id) && isset($request->title)) {
				$store = new Test_template;
				$store->user_id = Auth::user()->id;
				$store->template_type_id =$request->template_type_id;
				$store->title =$request->title;
				$store->description ='This test is hosted via Codeground. Please read the instructions carefully before proceeding.';
				$store->instruction ='(1) Make sure you have a proper internet connection.

				(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.

				(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.';
				if ($store->save()) {
					$this->set_session('You Have Successfully Create Test Template',true);
					return redirect()->route('host_text',['id' => $store->id]);
				}else{
					$this->set_session('Test Template Not Created, Please Try Again', false);
					return redirect()->back();
				}
			}else{
				$this->set_session('Please First Select Template Type And Title To Create Test Template', false);
				return redirect()->back();
			}		
		}else{
			$this->set_session('Please First Log In To Create Test Template', false);
			return redirect()->back();
		}	
		return redirect()->back();	
	}
	// Creating Test Templates

	 public function host_text($id)
    {
      	$args['edit'] = Test_template::find($id);      	
        return view('employee_dashboard.host_text')->with($args);
    }
}
