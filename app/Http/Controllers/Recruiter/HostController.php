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

class HostController extends Controller
{
    public function host_test_page($id){

        $args['tags'] = DB::table('question_tags')->get();
      	$args['edit'] = Test_template::find($id);  
      	$args['sections'] = Section::join('questions','questions.section_id','=','sections.id','left outer')->select('sections.*',DB::raw('count(questions.id) as section_questions'))->where('template_id',$id)->groupBy('sections.id')->orderBy('order_number','ASC')->get();
        foreach ($args['sections'] as $key => $value) {
             $args['sections_tabs'][$value->id]['ques'] = Question::where('question_type_id',1)->where('section_id', $value->id)->get();
             $args['sections_tabs'][$value->id]['count'] = $value->section_questions;
        }

        //Assinging Host Flag for Model
        $args['hostFlag'] = true;
        $args['template_id'] = $id;

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
}
