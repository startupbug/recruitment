<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Events\TemplateSection;
use App\Test_template_types;
use App\Test_template;
use App\Section;
use Auth;
use DB;

class TemplatesController extends Controller
{
	// Manage Test View Index
	public function manage_test_view(){
    	$args['count'] = Test_template::count();
        $args['listing'] = Test_template::where('user_id',Auth::user()->id)->get();
        foreach ($args['listing'] as $value) {
            $args['sections'][$value->id] = Section::where('template_id',$value->id)->get();            
        }
        return view('recruiter_dashboard.view')->with($args);
    }
	// Manage Test View Index

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
					event(new  TemplateSection($store)); 
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

	// Editing Test Template
	public function edit_template($id){        
        $args['tags'] = DB::table('question_tags')->get();
      	$args['edit'] = Test_template::find($id);  
      	$args['sections'] = Section::where('template_id',$id)->orderBy('order_number','ASC')->get();        
        return view('recruiter_dashboard.edit_template')->with($args);
    }
	// Editing Test Template

    //Deleting Test Template
    public function delete_test_template($id){        
        $delete = Test_template::find($id);                
        $delete->delete();
        $this->set_session('Test Template Is Deleted', true); 
        return redirect()->back();    
    }
    //Deleting Test Template
    
    //Updating Test Template
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
    //Updating Test Template
    
    //Duplicating Test Template
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
    //Duplicating Test Template

    //Adding Section To Template
    public function add_section(Request $request){
    	$template_id = $request->template_id;
    	$order_number = $request->order_value+1;
    	try {
    	if (Auth::check()) {
				if (isset($template_id)) {
		    	$store = new Section;				
				$store->template_id =$request->template_id;
				$store->section_name = 'Section-';
				$store->order_number = $order_number;
				if ($store->save()){
					return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Added The Section']);					
				}else{
					return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);					
				}
			}
		}
		} catch (QueryException $e) {
    		return \Response()->Json([ 'array' => $e]);
    	}	
    }
    //Adding Section To Template

    //Deleting Section From Template
    public function delete_section($id){
    	$delete = Section::find($id);    	
    	$template_id = $delete['template_id'];
    	$delete->delete();    	
    	$template_id = Section::where('template_id',$template_id)->orderBy('order_number','ASC')->get();
    	foreach ($template_id as $key => $value) {
    		DB::table('sections')->where('id',$value->id)->update(['order_number'=> ++$key]);	
    	}
    	$this->set_session('Section Is Deleted', true); 
        return redirect()->back();
    }
    //Deleting Section From Template

    public function move_up(Request $request,$id){    	
    	$move_up = Section::find($id);
    	$order_number = $move_up->order_number;
    	$replacement = $order_number-1;
    	$template_id = Section::select('template_id')->where('id',$id)->first();
    	$first_section_id = Section::where('template_id','=',$template_id['template_id'])->where('order_number','=',$order_number)->first();
    	$second_section_id = Section::where('template_id','=',$template_id['template_id'])->where('order_number','=',$replacement)->first();    
    	DB::table('sections')->where('id',$first_section_id['id'])->where('template_id',$template_id['template_id'])->update([    		
    		'order_number' => $replacement,
    	]);    
    	DB::table('sections')->where('id',$second_section_id['id'])->where('template_id',$template_id['template_id'])->update([
    		'order_number'=> $order_number 		
    	]);
    	$this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true); 
        return redirect()->back();
    }
    public function move_down(Request $request,$id){    	
    	$move_down = Section::find($id);
    	$order_number = $move_down->order_number;
    	$replacement = $order_number+1;
    	$template_id = Section::select('template_id')->where('id',$id)->first();
    	$first_section_id = Section::where('template_id','=',$template_id['template_id'])->where('order_number','=',$order_number)->first();
    	$second_section_id = Section::where('template_id','=',$template_id['template_id'])->where('order_number','=',$replacement)->first();    
    	DB::table('sections')->where('id',$first_section_id['id'])->where('template_id',$template_id['template_id'])->update([    		
    		'order_number' => $replacement,
    	]);    
    	DB::table('sections')->where('id',$second_section_id['id'])->where('template_id',$template_id['template_id'])->update([
    		'order_number'=> $order_number 		
    	]);
    	$this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true); 
        return redirect()->back();
    }
    public function preview_test(){
        return view('recruiter_dashboard.preview_test');
    }
    
    public function template_public_preview(){
        return view('recruiter_dashboard.public_preview');
    }
}