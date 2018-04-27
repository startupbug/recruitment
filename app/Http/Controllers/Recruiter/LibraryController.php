<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Question_level;
use App\Question_tag;
use App\Mulitple_choice;
use App\Question_detail;
use App\Test_case;
use App\Coding_entry;

class LibraryController extends Controller
{	

	public function __construct()
	{ 
		//
	}

	//Getting Public and Private Questions
    public function lib_index(){
    	// $public_questions = Question::leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
    	// ->leftjoin('question_levels', 'question_levels.id', '=', 'questions.id')
    	// ->leftjoin('question_solutions', 'question_solutions.id', '=', 'questions.id')
    	// ->leftjoin('question_states', 'question_states.id', '=', 'questions.id')
    	// ->leftjoin('question_tags', 'question_tags.id', '=', 'questions.id')
    	// ->leftjoin('question_types', 'question_types.id', '=', 'questions.id')
    	// //->select()
    	// ->get();

    	  //levels
    	  $args['levels'] = Question_level::all();
    	  $args['tags'] = Question_tag::all();
    	  //dd($args['levels']);
    	 
    	 //Public Questions
 		 $args['public_questions_mcqs'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('test_template_types.id', 1) //public
	    	->where('questions.question_type_id', 1)
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->paginate(4);

 		 $args['public_questions_codings'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('test_template_types.id', 1) //public
	    	->where('questions.question_type_id', 2)
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->paginate(4);

 		 $args['private_questions_mcqs'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('test_template_types.id', 2) //private
	    	->where('questions.question_type_id', 1) //mcq
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->paginate(4);

	    	//dd($args['private_questions_mcqs']);

 		 $args['private_questions_codings'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('test_template_types.id', 2) //private
	    	->where('questions.question_type_id', 2) //coding
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->paginate(4);

 		 $args['private_questions_submissions'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('test_template_types.id', 2) //private
	    	->where('questions.question_type_id', 3) //submission
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->paginate(4);

	    	//$args['public_questions'] = Question::with('question_detail')->get();
	       //dd($args['public_questions']);

	     // $args['public_questions_mcqs'] = $args['public_questions']->reject(function ($user) {
						// 					    return ($user->question_type_id == 2 || $user->question_type_id == 3);
						// 					})->map(function ($user) {
						// 					    return $user; 
						// 					});

	     // $args['public_questions_coding'] = $args['public_questions']->reject(function ($user) {
						// 					    return ($user->question_type_id == 1 || $user->question_type_id == 3);
						// 					})->map(function ($user) {
						// 					    return $user; 
						// 					});


	     // $args['public_questions_submission'] = $args['public_questions']->reject(function ($user) {
						// 					      return ($user->question_type_id == 1 || $user->question_type_id == 2);
						// 						})->map(function ($user) {
						// 						    return $user; 
						// 						});
																																	
	   //dd($args);											
		//$args['public_questions_coding'] = ;
	   //$args['public_questions_submission'] = ;

    	//dd($args['public_questions']);

    	return view('recruiter_dashboard.library_public_questions')->with($args);
    }

    public function libFilter(Request $request){
    		//dd($request->input());
    	 $args['levels'] = Question_level::all();
    	 $args['tags'] = Question_tag::all();
    	 $args['templateType_fil'] = $request->input('templateType');
    	 $args['questionType_fil'] = $request->input('questionType');

		 $temp = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

		 $temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    	//Applying filters
	    	if(!is_null($request->input('level'))){
	    		$temp->where('questions.question_level_id', $request->input('level'));
	    	}

	    	if(!is_null($request->input('tag'))){
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    	}

	    	//Filtering according to data
	    	//On Public
	    	if($request->input('templateType') == 1){

 	    		$temp->where('test_template_types.id', 1);

	    		if($request->input('questionType') == 1){
	    			
	    			//on public mcq
	    			$temp = $temp->where('questions.question_type_id', 1);
	    			$args['public_questions_mcqs'] = $temp->paginate(4);

	    			//Get unfiltered Table data --public
	    			 $temp3 = $temp2;
			 		 $args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->paginate(4);

			 		

	    		}else if($request->input('questionType') == 2){

	    			//on public coding
	    			$temp = $temp->where('questions.question_type_id', 2);

	    			$args['public_questions_codings']  = $temp->paginate(4);
	    			$temp3 = $temp2;
			 		 $args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->paginate(4);

	    			//Get mcq unfiltered Table data..	    			    
	    		}

	    			$temp3 = $temp2;
					//Get unfiltered Table data --private
	    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 2)->paginate(4);
	    			$temp3 = $temp2;

	    			$args['private_questions_mcqs'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 1)->paginate(4);
	    			$temp3 = $temp2;										
	    			$args['private_questions_submissions'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 3)->paginate(4);	    		

	    		// $args['public_questions_mcqs']->paginate(4);
	    	}else if($request->input('templateType') == 2){

	    		$temp->where('test_template_types.id', 2);
	    		$temp = $temp->where('questions.question_type_id', $request->input('questionType'));

	    		if($request->input('questionType') == 1){
	    			
	    			$args['private_questions_mcqs'] = $temp->paginate(4);

	    			$temp3 = $temp2;
					//Get unfiltered Table data -private..
	    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 2)->paginate(4);
	    			$temp3 = $temp2;										
	    			$args['private_questions_submissions'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 3)->paginate(4);

	    			//Get unfiltered Table data - public..
	    						
	    												//dd($temp2);
	    			 $temp3 = $temp2;									
			 		 $args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->paginate(4);
			 		 
			 		 //dd($args['public_questions_mcqs']);
			 		 $temp3 = $temp2;
			 		 $args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->paginate(4);
			 		 dd($args);
	    		}else if($request->input('questionType') == 2){

	    			$args['private_questions_codings'] = $temp->paginate(4);

	    			$temp3 = $temp2;
					//Get unfiltered Table data -private..
	    			$args['private_questions_mcqs'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 1)->paginate(4);

	    			$args['private_questions_submissions'] = $temp2->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 3)->paginate(4);

	    			//Get unfiltered Table data - public..
	    			$temp3 = $temp2;											
			 		 $args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->paginate(4);
                     
                     $temp3 = $temp2;	
			 		 $args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->paginate(4);

	    		}else if($request->input('questionType') == 3){

	    			$args['private_questions_submissions'] = $temp->paginate(4);

	    			$temp3 = $temp2;	
					//Get unfiltered Table data -private..
	    			$args['private_questions_mcqs'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 1)->paginate(4);
	    			$temp3 = $temp2;										
	    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 2) //private
	    													->where('questions.question_type_id', 2)->paginate(4);
	    			$temp3 = $temp2;											
	    			//Get unfiltered Table data - public..
			 		 $args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->paginate(4);
                        $temp3 = $temp2;	
			 		 $args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->paginate(4); 
	    		}
	    	}

	    	//Filtering according to data
	    	//Private
	    	// if($request->input('templateType') == 2){
	    	// 	$args['public_questions_mcqs']->where('test_template_types.id', 2);

	    	// 	if($request->input('questionType') == 1){
	    	// 		//mcq
	    	// 		$args['public_questions_mcqs']->where('questions.question_type_id', 1);
	    	// 	}else if($request->input('questionType') == 2){
	    	// 		//coding
	    	// 		$args['public_questions_mcqs']->where('questions.question_type_id', 2);
	    	// 	}else if($request->input('questionType') == 3){
	    	// 		//submission
	    	// 		$args['public_questions_mcqs']->where('questions.question_type_id', 3);
	    	// 	}

	    	// 	$args['public_questions_mcqs']->paginate(4);
	    	// }
	    	//dd($args);
    	return view('recruiter_dashboard.library_public_questions')->with($args);      	
    }

    public function lib_ques_detail(Request $request){
    	//return $request->input();

    	if($request->input('quesType')==1){
	    	
	    	//Question
	    	$question_mcq = Question::leftjoin('question_types', 'questions.question_type_id', '=', 'question_types.id')
	    				->select('questions.id', 'question_types.type_name', 'question_types.id as ques_type_id', 'questions.question_statement')
	    				->where('questions.id', $request->input('id'))
	    				->first();

	    	//question choices
	    	$question_mcq['question_choices'] = Mulitple_choice::where('question_id', $request->input('id'))->get(['choice', 'partial_marks', 'status', 'shuffle_status']);
	    	
	    	//question tags
	    	$question_mcq['question_tag'] = Question_detail::join('question_tags', 'question_details.tag_id', '=', 'question_tags.id')->where('question_id', $request->input('id'))->get(['question_tags.tag_name']);

	    	//return $multiple_choices;
	    	return \Response()->Json([ 'status' => 200,'data' => $question_mcq]);

    	}else if($request->input('quesType')==2){

			$question_coding = Question::leftjoin('question_types', 'questions.question_type_id', '=', 'question_types.id')->leftjoin('question_details', 'questions.id', '=', 'question_details.question_id')
			    				->leftjoin('coding_entries', 'coding_entries.question_id', '=', 'questions.id')
			    				->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
			    				->leftjoin('users', 'users.id', '=', 'questions.user_id')
			    				->select('questions.id', 'question_types.type_name', 'question_types.id as ques_type_id', 'question_details.coding_program_title', 'coding_entries.input', 'coding_entries.output', 'questions.question_statement', 'question_levels.level_name', 'users.name as user_name', 'question_details.provider')
			    				->where('questions.id', $request->input('id'))
								->first();
								
			$question_coding['test_cases'] = Test_case::where('question_id', $request->input('id'))->get();
	    	
	    	$question_coding['sample_input_output'] = Coding_entry::where('question_id', $request->input('id'))->get(['input', 'output']);

	    	//question tags
	    	$question_coding['question_tag'] = Question_detail::join('question_tags', 'question_details.tag_id', '=', 'question_tags.id')->where('question_id', $request->input('id'))->get(['question_tags.tag_name']);

			return \Response()->Json([ 'status' => 200,'data' => $question_coding]);			
    	}


    }
}
