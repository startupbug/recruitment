<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Test_template_types;
use App\Test_template;
use Auth;
use DB;

class TemplatesController extends Controller
{
	public function manage_test_view(){
    	$args['count'] = Test_template::count();    	
    	$args['listing'] = Test_template::where('user_id',Auth::user()->id)->get();
        return view('recruiter_dashboard.view')->with($args);
    }

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
					return redirect()->route('edit_template',['id' => $store->id]);
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

	 public function edit_template($id){
      	$args['edit'] = Test_template::find($id);  

        return view('recruiter_dashboard.edit_template')->with($args);
    }

    public function delete_test_template($id){        
        $delete = Test_template::find($id);                
        $delete->delete();
        $this->set_session('Test Template Is Deleted', true); 
        return redirect()->back();    
    }
    
    public function update_test_template(Request $request,$id){
    	try {
    		if (isset($id)){
	    		$array = DB::table('test_templates')
	            ->where('id',$id)
	            ->update([
	            	'user_id' => Auth::user()->id,
	            	'template_type_id' => $request->template_type_id,
	            	'title' => $request->title,
	            	'description' => $request->description,
	            	'instruction' =>  $request->instruction 
	        	]);
    		return \Response()->Json([ 'array' => $array]);
    		}    		
    	} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
    }

    public function create_duplicate_template_post(Request $request){
    	$test_template_id = $request->previous_template_id;
    	$previous_template = Test_template::find($test_template_id);
    	try {
    	if (Auth::check()) {
				if (isset($previous_template)) {
		    	$store = new Test_template;
				$store->user_id = Auth::user()->id;
				$store->title =$request->title;
				$store->template_type_id =$previous_template->template_type_id;
				$store->description =$previous_template->description;
				$store->instruction = $previous_template->instruction;
				if ($store->save()) {			
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Duplicated The Test Template']);
					//return redirect()->route('edit_template',['id' => $store->id]);
				}else{
					return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong']);
					//return redirect()->back();
				}
			}
		}
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}
    }
    public function template_public_preview(){
        return view('recruiter_dashboard.public_preview');
    }
}
