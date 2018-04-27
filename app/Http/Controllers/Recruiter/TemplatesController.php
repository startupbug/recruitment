<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events\TemplateSection;
use App\Test_template_types;
use App\Templates_test_setting;
use App\Templates_contact_setting;
use App\Test_template;
use App\Section;
use App\Question_detail;
use App\Question_solution;
use App\Webcam;
use App\Question;
use Auth;
use DB;
use App\Hosted_test;
use App\Mulitple_choice;
use App\Coding_question_language;
use App\Question_submission_evaluation;
use App\Templates_mail_setting;
use App\Template_setting_message;
use App\Questions_submission_resource;
use App\Coding_entry;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class TemplatesController extends Controller
{
	// Manage Test View Index
	public function manage_test_view(){

        $value = Input::get('filter_hidden');
        //dd($value);
        $name = Input::get('name');

        $check_box = Input::get('search');
        //dd($check_box);

        if(isset($name))
        {
            if(in_array(1 , $check_box))
            {
                $args['listing'] = Test_template::where('user_id',Auth::user()->id)
                ->where('template_type_id',1)
                ->where('title','LIKE','%'.$name.'%')
                ->get();
                $args['count'] = Test_template::where('template_type_id',1)
                ->where('title','LIKE','%'.$name.'%')
                ->count();
                foreach ($args['listing'] as $value) {
                $args['sections'][$value->id] = Section::where('template_id',$value->id)->get();            
                }
                //return view('recruiter_dashboard.view')->with($args);
                // dd($args['listing']);
            }
            elseif (in_array(2, $check_box)) {
                $args['listing'] = Test_template::where('user_id',Auth::user()->id)
                ->where('template_type_id',2)
                ->where('title','LIKE','%'.$name.'%')
                ->get();
                $args['count'] = Test_template::where('template_type_id',2)->count();
                foreach ($args['listing'] as $value) {
                $args['sections'][$value->id] = Section::where('template_id',$value->id)->get();            
                }
                //return view('recruiter_dashboard.view')->with($args);
                // dd($args['listing']);
            }
            else
            {
                $args['listing'] = Test_template::where('user_id',Auth::user()->id)
                ->where('title','LIKE','%'.$name.'%')
                ->get();
                $args['count'] = Test_template::where('title','LIKE','%'.$name.'%')->count();
                foreach ($args['listing'] as $value) {
                $args['sections'][$value->id] = Section::where('template_id',$value->id)->get();            
                }
                //return view('recruiter_dashboard.view')->with($args);
                // dd($args['listing']);
            }
            
        }


        if(is_null(Input::get('filter_hidden')) ){

        	$args['count'] = Test_template::count();
            $args['listing'] = Test_template::where('user_id',Auth::user()->id)->get();
            
            foreach ($args['listing'] as $value) {
                $args['sections'][$value->id] = Section::leftJoin('questions','sections.id','=','questions.section_id')
                        ->select('sections.*','questions.question_type_id'
                            ,DB::raw('(SELECT count(questions.id) FROM `questions` WHERE `question_type_id` = 1) as mulitple_questions')
                            ,DB::raw('(SELECT count(questions.id) FROM `questions` WHERE `question_type_id` = 2) as coding_questions')
                            ,DB::raw('(SELECT count(questions.id) FROM `questions` WHERE `question_type_id` = 3) as submission_questions'))
                        ->where('sections.template_id','=',$value->id)
                        ->groupBy('sections.id')
                        ->get();            
            }

        }

        // dd($args['sections']);
        $args['hosted_tests'] = Hosted_test::join('test_templates', 'test_templates.id', '=', 'hosted_tests.test_template_id')
                        ->where('test_templates.user_id', Auth::user()->id)->get();
                        // dd(count($args['hosted_tests']));
        // dd($args);
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


      	$args['sections'] = Section::join('questions','questions.section_id','=','sections.id','left outer')
        ->select('sections.*','questions.id as question_id',DB::raw('count(questions.id) as section_questions'))
        ->where('template_id',$id)
        ->groupBy('sections.id')
        ->orderBy('order_number','ASC')
        ->get();

        foreach ($args['sections'] as $key => $value) {
             $args['sections_tabs'][$value->id]['ques1'] = Question::where('question_type_id',1)->where('section_id', $value->id)->get();

             $args['sections_tabs'][$value->id]['count'] = count($args['sections_tabs'][$value->id]['ques1']); //$value->section_questions;

            $args['sections_tabs'][$value->id]['ques2'] = Question::where('question_type_id',2)->where('section_id', $value->id)->get();

             $args['sections_tabs'][$value->id]['count2'] = count($args['sections_tabs'][$value->id]['ques2']); 

             $args['sections_tabs'][$value->id]['ques3'] = Question::where('question_type_id',3)->where('section_id', $value->id)->get();

             $args['sections_tabs'][$value->id]['count3'] = count($args['sections_tabs'][$value->id]['ques3']); 


             // $args['sections_tabs2'][$value->id]['ques'] = Question::where('question_type_id',1)->where('section_id', $value->id)->get();
             // $args['sections_tabs'][$value->id]['count2'] = $value->section_questions;
        }
        //dd($args['sections_tabs']);

        $args['test_setting_types'] = Test_template_types::get();
        $args['test_setting_webcam'] = Webcam::get();
        $args['edit_test_settings'] = Templates_test_setting::where('test_templates_id',$id)->first();
        $args['edit_test_settings_message'] = Template_setting_message::where('test_templates_id',$id)->first();
        $args['edit_mail_settings'] = Templates_mail_setting::where('test_templates_id',$id)->first();
        $args['edit_test_contact_settings'] = Templates_contact_setting::where('test_templates_id',$id)->first();
        $args['template_id'] = $id;        
       // dd($args);
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
        $section_of_templates = Section::where('template_id',$test_template_id)->get();     
        //$questions_of_sections = Question::where('template_id',$test_template_id)->get();
        try {
        if (Auth::check()) {
                //Templates ka data copy horha hai yahan
                if (isset($previous_template)) {                
                $store = $previous_template->replicate();
                $store->title = $request->title;
                if ($store->save()) {                
                foreach ($section_of_templates as $key => $value) {
                    $previous_section = Section::find($value->id);
                    //Sections ka data copy horha hai yahan
                    if (isset($previous_section)){
                        $section_store = $previous_section->replicate();
                        $section_store->template_id =$store->id;
                        $section_store->save();
                    }
                    $questions_of_section = Question::where('section_id',$value->id)->get();
                        foreach ($questions_of_section as $key => $one_question) {
                        $previous_question = Question::find($one_question->id);
                        //Questions ka data copy horha hai yahan
                        if (isset($previous_question)){
                            $question_store = $previous_question->replicate();
                            $question_store->section_id =$section_store->id;
                            $question_store->save();
                        }                        
                        $questions_details_of_question = Question_detail::where('question_id',$one_question->id)->get();
                        foreach ($questions_details_of_question as $key => $question_detail) {
                            $previous_question_detail =  Question::with('question_detail')->find($question_detail->question_id)->question_detail;
                            //Question Detail ka data copy horha hai yahan
                            if (isset($previous_question_detail)){
                                $question_detail_store = $previous_question_detail->replicate();
                                $question_detail_store->question_id =$question_store->id;
                                $question_detail_store->save();
                            }
                        }

                        $questions_multiple_choice_of_question = Mulitple_choice::where('question_id',$one_question->id)->get();
                        foreach ($questions_multiple_choice_of_question as $key => $multiple_choice) {
                            $previous_multiple_choice = Mulitple_choice::where('question_id',$multiple_choice->question_id)->first();
                            //Question Multiple Choice ka data copy horha hai yahan
                            if (isset($previous_multiple_choice)){
                            $question_mulitple_choice_store = $previous_multiple_choice->replicate();
                                $question_mulitple_choice_store['question_id']=$question_store->id;
                                $question_mulitple_choice_store->save();
                            }
                        }

                        $questions_solution_of_question = Question_solution::where('question_id',$one_question->id)->get();
                        foreach ($questions_solution_of_question as $key => $question_solution) {
                            $previous_question_solution =  Question::with('question_solution')->find($question_solution->question_id)->question_solution;
                            //Question Solution ka data copy horha hai yahan
                            if (isset($previous_question_solution)){
                                $question_solution_store = $previous_question_solution->replicate();
                                $question_solution_store->question_id =$question_store->id;
                                $question_solution_store->save();
                            }
                        }

                        $questions_coding_entry_of_question = Coding_entry::where('question_id',$one_question->id)->get();
                        foreach ($questions_coding_entry_of_question as $key => $coding_entry) {
                            $previous_coding_entry = Coding_entry::where('question_id',$coding_entry->question_id)->first();
                            //Question Coding Entry ka data copy horha hai yahan
                            if (isset($previous_coding_entry)){
                            $question_coding_entry_store = $previous_coding_entry->replicate();
                                $question_coding_entry_store['question_id']=$question_store->id;
                                $question_coding_entry_store->save();
                            }
                        }

                        $questions_coding_language_of_question = Coding_question_language::where('question_id',$one_question->id)->get();
                        foreach ($questions_coding_language_of_question as $key => $coding_language) {
                            $previous_coding_language = Coding_question_language::where('question_id',$coding_language->question_id)->first();
                            //Question Coding Languages ka data copy horha hai yahan
                            if (isset($previous_coding_language)){
                            $question_coding_language_store = $previous_coding_language->replicate();
                                $question_coding_language_store['question_id']=$question_store->id;
                                $question_coding_language_store->save();
                            }
                        }
                        $questions_submission_evaluation_of_question = Question_submission_evaluation::where('question_id',$one_question->id)->get();
                        foreach ($questions_submission_evaluation_of_question as $key => $submission_evaluation) {
                            $previous_submission_evaluation = Question_submission_evaluation::where('question_id',$submission_evaluation->question_id)->first();
                            //Question Submission Evaluation ka data copy horha hai yahan
                            if (isset($previous_submission_evaluation)){
                                $question_submission_evaluation_store = $previous_submission_evaluation->replicate();
                                $question_submission_evaluation_store['question_id']=$question_store->id;
                                $question_submission_evaluation_store->save();
                            }
                        }
                        $questions_submission_resource_of_question = Questions_submission_resource::where('question_id',$one_question->id)->get();
                        foreach ($questions_submission_resource_of_question as $key => $submission_resource) {
                            $previous_submission_resource = Questions_submission_resource::where('question_id',$submission_resource->question_id)->first();
                            //Question Submission Resources ka data copy horha hai yahan
                            if (isset($previous_submission_resource)){
                            $question_submission_resource_store = $previous_submission_resource->replicate();
                                $question_submission_resource_store['question_id']=$question_store->id;
                                $question_submission_resource_store->save();
                            }
                        }


                    }
                }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Duplicated The Test Template']);                    
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
    public function preview_test($id){
        //dd($id);
//        $s =  DB::table('mulitple_choices')->get();
// dd($s);
        // $sections = DB::table('sections')->where('template_id','=',$id)->get();
        //$sections = Section::where('template_id','=',$id)->with('template')->get();
        $test_template = Test_template::find($id);        
        $sections = $test_template->template_section()->paginate(1);
                

        // $section_question  = $sections[0]->questions()->paginate(1);
       
        // $choices = $section_question[0]->multiple_choice()->paginate(1);
       
       // dd($choices);
        //$choice_count = count($choices);
        //dd($sections[0]->questions()->get());

        // dd($sections);

            // $section_question = array();

            // foreach ($sections as $key => $value)
            // {
            //     // dd($value);
            //     $section_question[$value->id] = Question::Join('mulitple_choices','questions.id','=','mulitple_choices.question_id')
            //     ->select('mulitple_choices.id as mulitple_choices_id','mulitple_choices.question_id as m_q_id','mulitple_choices.choice','mulitple_choices.partial_marks','mulitple_choices.status','mulitple_choices.shuffle_status','questions.id as q_id','questions.question_statement')
            //     ->with('section')
            //     ->where('section_id','=',$value->id)
                
            //     ->get();
            //      dd($section_question);
            // }
 

        return view('recruiter_dashboard.preview_test',['sections'=>$sections]);
    }
    
    // public function template_public_preview(){
        
    //     return view('recruiter_dashboard.public_preview');
    // }
}