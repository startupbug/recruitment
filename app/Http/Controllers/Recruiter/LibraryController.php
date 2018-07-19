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
use App\Question_state;

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
    	$args['question_states'] = Question_state::all();
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
	    	->get();


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
	    	->get();

 		$args['private_questions_mcqs'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	//->where('test_template_types.id', 2) //private
	    	->where('questions.question_type_id', 1) //mcq
	    	->where('questions.lib_private_question', 1) //mcq
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->get();

	    	//dd($args['private_questions_mcqs']);
	    	//

 		$args['private_questions_codings'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	//->where('questions.lib_private_question', 1)//private
	    	->where('questions.question_type_id', 2) //coding
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->get();



 		$args['private_questions_submissions'] = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->where('questions.lib_private_question', 1) //private
	    	->where('questions.question_type_id', 3) //submission
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id')
	    	->get();


    	return view('recruiter_dashboard.library_public_questions')->with($args);
    }

    public function libFilter(Request $request){

    		 // dd($request->input());
		$args['levels'] = Question_level::all();
		$args['tags'] = Question_tag::all();
		$args['question_states'] = Question_state::all();
		$args['templateType_fil'] = $request->input('templateType');
		$args['questionType_fil'] = $request->input('questionType');
		// dd($args);

    	 //dd($args);
		$temp = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id', 'questions.lib_private_question');

		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    	//Applying filters
	    	if(!is_null($request->input('level')))
	    	{
	    		$temp->where('questions.question_level_id', $request->input('level'));
	    	}

	    	if(!is_null($request->input('tag')))
	    	{
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    	}

	    	if($args['templateType_fil'] == 1)
	    	{
	    		$temp3 = $temp2;
					//Get unfiltered Table data --private
    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 1) //private
    												->where('questions.question_type_id', 2)->get();
    			$temp4 = $temp2;

    			$args['public_questions_codings'] = $temp4->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();

				$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
		    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
		    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
		    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
		    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
		    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
		    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
		    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

    			$temp5 = $temp2;

    			$args['private_questions_mcqs'] = $temp5->where('questions.lib_private_question', 1) //private
    													->where('questions.question_type_id', 1)
    			->get();

				$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
		    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
		    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
		    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
		    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
		    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
		    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
		    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

    			$temp6 = $temp2;

    			$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
    													->where('questions.question_type_id', 3)->get();
	    		//it must be public
 	    		$temp->where('test_template_types.id', 1);
	    		if($request->input('questionType') == 1)
	    		{
	    			//on public mcq
	    			$temp = $temp->where('questions.question_type_id', 1);
	    			$args['public_questions_mcqs'] = $temp->get();
	    		}
	    		else if($request->input('questionType') == 2)
	    		{
	    			//dd('asdasd');
	    			//on public coding
	    			$temp = $temp->where('questions.question_type_id', 2);

	    			$args['public_questions_codings']  = $temp->get();


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
			    	->get();  
	    		}
	    	}
	    	else if($request->input('templateType') == 2)
	    	{
	    		if(!is_null($request->input('level')))
	    		{
	    			$temp->where('questions.question_level_id', $request->input('level'));
	    		}

		    	if(!is_null($request->input('tag')))
		    	{
		    		$temp->where('question_details.tag_id', $request->input('tag'));
		    	}
		    	
    			$temp = $temp->where('questions.question_type_id', $request->input('questionType'));
    			//Private Mcqs Question
	    		if($request->input('questionType') == 1)
	    		{
	    			
	    			$args['private_questions_mcqs'] = $temp->where('questions.lib_private_question', 1)->get();
	    			// dd($args['private_questions_mcqs']);
	    			$temp3 = $temp2;
	    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 1) //private
	    													->where('questions.question_type_id', 2)->get();
	    			$temp4 = $temp2;

	    			$args['public_questions_codings'] = $temp4->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();

					$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
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

	    			$temp6 = $temp2;

	    			$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
	    													->where('questions.question_type_id', 3)->get();
			 		// dd($args);
	    		}
	    		else if($request->input('questionType') == 2)
	    		{

	    			$args['private_questions_codings'] = $temp->where('questions.lib_private_question', 1)->get();

	    			$temp4 = $temp2;

	    			$args['public_questions_codings'] = $temp4->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();

					$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
			    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
			    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
			    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
			    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
			    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
			    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
			    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    			$temp5 = $temp2;

	    			$args['private_questions_mcqs'] = $temp5->where('questions.lib_private_question', 1) //private
	    													->where('questions.question_type_id', 1)
	    			->get();

					$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
			    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
			    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
			    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
			    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
			    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
			    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
			    	//->where('test_template_types.id', 2) //private
			    	//->where('questions.question_type_id', 1) //mcq
			    	//->where('questions.lib_private_question', 1) //mcq
			    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    			$temp6 = $temp2;

	    			$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
	    													->where('questions.question_type_id', 3)->get();

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
			    	->get();
	    		}
				else if($request->input('questionType') == 3)
	    		{

	    			$args['private_questions_submissions'] = $temp->where('questions.lib_private_question', 1)->get();

	    			$temp4 = $temp2;

	    			$args['public_questions_codings'] = $temp4->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();

	    			$temp3 = $temp2;
	    			$args['private_questions_codings'] = $temp3->where('test_template_types.id', 1) //private
	    													->where('questions.question_type_id', 2)->get();

					$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
			    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
			    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
			    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
			    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
			    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
			    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
			    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    			$temp5 = $temp2;

	    			$args['private_questions_mcqs'] = $temp5->where('questions.lib_private_question', 1) //private
	    													->where('questions.question_type_id', 1)
	    			->get();

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
			    	->get();
	    		}
	    	}

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

    public function advance_filter(Request $request)
    {


    	if( is_null($request->input('id'))  && is_null($request->input('title')) && is_null($request->input('statement')) && is_null($request->input('tag')) && is_null($request->input('provider')) && is_null($request->input('author')) 
    		&& !$request->has('level') && !$request->has('state') ){

    		return redirect()->route('lib_index');			
    	}


    	$args['levels'] = Question_level::all();
    	$args['tags'] = Question_tag::all();
    	$args['question_states'] = Question_state::all();

    	$temp = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id', 'questions.lib_private_question');

		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');
	    	

    	if($request->input('templateType') == 1 && $request->input('questionType') == 1)
    	{
    		$temp->where('test_template_types.id', 1)
    					->where('questions.question_type_id',1);

    		if(!is_null($request->input('id')))
    		{
    			$temp->where('questions.id',$request->input('id'));
    			$args['public_questions_mcqs'] = $temp->get();
    			//Get unfiltered Table data --public
    			$temp3 = $temp2;
		 		$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		 }

    		if(!is_null($request->input('statement')))
    		{
    			$temp->where('questions.question_statement','LIKE','%'.$request->input('statement').'%');
    			$args['public_questions_mcqs'] = $temp->get();
    			//Get unfiltered Table data --public
    			$temp3 = $temp2;
		 		$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}
    		if(!is_null($request->input('tag')))
    		{
    			// dd($request->input('tag'));
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    		$args['public_questions_mcqs'] = $temp->get();
	    		//Get unfiltered Table data --public
    			$temp3 = $temp2;
    			$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}
    		if(!is_null($request->input('provider')))
    		{
    			$temp->where('question_details.provider','LIKE','%'.$request->input('provider').'%');
    			$args['public_questions_mcqs'] = $temp->get();
    			//Get unfiltered Table data --public
    			$temp3 = $temp2;
    			$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}
    		if(!is_null($request->input('author')))
    		{
    			$temp->where('question_details.author','LIKE','%'.$request->input('author').'%');
    			$args['public_questions_mcqs'] = $temp->get();
    			//Get unfiltered Table data --public
    			$temp3 = $temp2;
    			$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}
    		if(!is_null($request->input('state')))
    		{
	    			$temp->whereIn('questions.question_state_id',$request->input('state'));
	    			$args['public_questions_mcqs'] = $temp->get();
	    			//Get unfiltered Table data --public
    			 	$temp3 = $temp2;
	    			$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}
    		if(!is_null($request->input('level')))
    		{
	    			$temp->whereIn('questions.question_level_id', $request->input('level'));
	    			$args['public_questions_mcqs'] = $temp->get();
	    			//Get unfiltered Table data --public
    			 	$temp3 = $temp2;
	    			$args['public_questions_codings'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();
    		}


    	}
    	elseif($request->input('templateType') == 1 && $request->input('questionType') == 2)
    	{
    		$temp->where('questions.question_type_id',2);
    		if(!is_null($request->input('id')))
    		{
    			$temp->where('questions.id',$request->input('id'));
    			$args['public_questions_codings'] = $temp->get();	
    		}
    		if(!is_null($request->input('statement')))
    		{
    			// dd($request->input('statement'));
    			$temp->where('questions.question_statement','LIKE','%'.$request->input('statement').'%');
    			$args['public_questions_codings'] = $temp->get();
    			$temp3 = $temp2;
		 		$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();
    		}

    		if(!is_null($request->input('tag')))
    		{
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    		$args['public_questions_codings'] = $temp->get();
    			$temp3 = $temp2;
		 		$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();
    		}
    		if(!is_null($request->input('provider')))
    		{
    			$temp->where('question_details.provider','LIKE','%'.$request->input('provider').'%');
    			$args['public_questions_codings'] = $temp->get();
    			$temp3 = $temp2;
		 		$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();	
    		}
    		if(!is_null($request->input('author')))
    		{
    			$temp->where('question_details.author','LIKE','%'.$request->input('author').'%');
    			$args['public_questions_codings'] = $temp->get();
    			$temp3 = $temp2;
		 		$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();	
    		}
    		if(!is_null($request->input('state')))
    		{
	    			$temp->whereIn('questions.question_state_id',$request->input('state'));
	    			$args['public_questions_codings'] = $temp->get();
	    			$temp3 = $temp2;
		 			$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();
    		}
    		if(!is_null($request->input('level')))
    		{
	    			$temp->whereIn('questions.question_level_id', $request->input('level'));
	    			$args['public_questions_codings'] = $temp->get();
	    			$temp3 = $temp2;
		 			$args['public_questions_mcqs'] = $temp3->where('test_template_types.id', 1)->where('questions.question_type_id', 1)->get();
    		}

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
		    	->get();

	    }	
		//public coding questions
		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

		$args['private_questions_codings'] = $temp2->where('test_template_types.id', 1)
		//private
													->where('questions.question_type_id', 2)->get();

		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

		$temp5 = $temp2;

		$args['private_questions_mcqs'] = $temp5->where('questions.lib_private_question', 1)
		//private
												->where('questions.question_type_id', 1)
		->get();

		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

		$temp6 = $temp2;

		$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
												->where('questions.question_type_id', 3)->get();

	    		
	    	// PRIVATE QUESTIONS SECTION 
    	if($request->input('templateType') == 2 && $request->input('questionType') == 1)
    	{
    		// dd('private template 2 question 1');

    		$temp->where('questions.question_type_id',1);
    		// dd($temp->get());		
    		if(!is_null($request->input('id')))
    		{
    			$temp->where('questions.id',$request->input('id'));
    			$args['private_questions_mcqs'] = $temp->get();				
    		}

    		if(!is_null($request->input('statement')))
    		{
    			$temp->where('questions.question_statement','LIKE','%'.$request->input('statement').'%');
    			$args['private_questions_mcqs'] = $temp->get();
    		}

    		if(!is_null($request->input('tag')))
    		{
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    		$args['private_questions_mcqs'] = $temp->get();
    				
    		}

    		if(!is_null($request->input('provider')))
    		{
    			$temp->where('question_details.provider','LIKE','%'.$request->input('provider').'%');
    			$args['private_questions_mcqs'] = $temp->get();
    				
    		}

    		if(!is_null($request->input('author')))
    		{
    			$temp->where('question_details.author','LIKE','%'.$request->input('author').'%');
    			$args['private_questions_mcqs'] = $temp->get();
    				
    		}

    		if(!is_null($request->input('state')))
    		{
    			$temp->whereIn('questions.question_state_id',$request->input('state'));
    			$args['private_questions_mcqs'] = $temp->get();	
    				
    		}

    		if(!is_null($request->input('level')))
    		{
    			$temp->whereIn('questions.question_level_id', $request->input('level'));
    			$args['private_questions_mcqs'] = $temp->get();	
    		}

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
		    	->get();

    		$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
		    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
		    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
		    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
		    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
		    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
		    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
		    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$args['private_questions_codings'] = $temp2->where('test_template_types.id', 1) 
			//private
													->where('questions.question_type_id', 2)->get();

				
			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$args['public_questions_codings'] = $temp2->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();


			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$temp6 = $temp2;

			$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
													->where('questions.question_type_id', 3)->get();
    	}

	    elseif($request->input('templateType') == 2 && $request->input('questionType') == 2)
    	{
    		$temp->where('questions.question_type_id',2);
    		
    		if(!is_null($request->input('id')))
    		{
    			$temp->where('questions.id',$request->input('id'));
    			$args['private_questions_codings'] = $temp->get();
    		}
    		if(!is_null($request->input('statement')))
    		{
    			$temp->where('questions.question_statement','LIKE','%'.$request->input('statement').'%');
    			$args['private_questions_codings'] = $temp->get();	
    		}
    		if(!is_null($request->input('tag')))
    		{
	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    		$args['private_questions_codings'] = $temp->get();    			
    		}
    		if(!is_null($request->input('provider')))
    		{
    			$temp->where('question_details.provider','LIKE','%'.$request->input('provider').'%');
    			$args['private_questions_codings'] = $temp->get();
    		}
    		if(!is_null($request->input('author')))
    		{
    			$temp->where('question_details.author','LIKE','%'.$request->input('author').'%');
    			$args['private_questions_codings'] = $temp->get();		
    		}
    		if(!is_null($request->input('state')))
    		{
    			$temp->whereIn('questions.question_state_id',$request->input('state'));
    			$args['private_questions_codings'] = $temp->get();	
    		}
    		if(!is_null($request->input('level')))
    		{
    			$temp->whereIn('questions.question_level_id', $request->input('level'));
    			$args['private_questions_codings'] = $temp->get();	
    		}

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
		    	->get();
				
			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$args['public_questions_codings'] = $temp2->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();


			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$temp6 = $temp2;

			$args['private_questions_submissions'] = $temp6->where('questions.lib_private_question', 1) //private
													->where('questions.question_type_id', 3)->get();

	    }
	    elseif($request->input('templateType') == 2 && $request->input('questionType') == 3)
    	{
    		// dd('private template 2 question 3');
    		$temp->where('questions.question_type_id',3);
    		if(!is_null($request->input('id')))
    		{
    			$temp->where('questions.id',$request->input('id'));
    			$args['private_questions_submissions'] = $temp->get();			
    		}
    		if(!is_null($request->input('statement')))
    		{
    			$temp->where('questions.question_statement','LIKE','%'.$request->input('statement').'%');
    			$args['private_questions_submissions'] = $temp->get();
    		}
    		if(!is_null($request->input('tag')))
    		{

	    		$temp->where('question_details.tag_id', $request->input('tag'));
	    		$args['private_questions_submissions'] = $temp->get();	
    		}
    		if(!is_null($request->input('provider')))
    		{
    			$temp->where('question_details.provider','LIKE','%'.$request->input('provider').'%');
    			$args['private_questions_submissions'] = $temp->get();
    		}
    		if(!is_null($request->input('author')))
    		{
    			$temp->where('question_details.author','LIKE','%'.$request->input('author').'%');
    			$args['private_questions_submissions'] = $temp->get();
    		}
    		if(!is_null($request->input('state')))
    		{
    			$temp->whereIn('questions.question_state_id',$request->input('state'));
    			$args['private_questions_submissions'] = $temp->get();	
    		}
    		if(!is_null($request->input('level')))
    		{
    			$temp->whereIn('questions.question_level_id', $request->input('level'));
    			$args['private_questions_submissions'] = $temp->get();
    		}

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
		    	->get();
				
			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
	    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
	    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
	    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
	    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
	    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
	    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
	    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

			$args['public_questions_codings'] = $temp2->where('test_template_types.id', 1)->where('questions.question_type_id', 2)->get();

			$temp2 = Question::leftjoin('sections', 'sections.id', '=', 'questions.section_id')
			    	->leftjoin('test_templates', 'test_templates.id', '=', 'sections.template_id')
			    	->leftjoin('test_template_types', 'test_template_types.id', '=', 'test_templates.template_type_id')
			    	->leftjoin('question_details', 'question_details.question_id', '=', 'questions.id')
			    	->leftjoin('question_levels', 'question_levels.id', '=', 'questions.question_level_id')
			    	->leftjoin('question_states', 'question_states.id', '=', 'questions.question_state_id')
			    	->leftjoin('question_tags', 'question_tags.id', '=', 'question_details.tag_id')    	
			    	->select('questions.id','questions.question_statement', 'question_levels.level_name', 'question_states.state_name', 'question_tags.tag_name', 'questions.question_type_id');

	    			$temp5 = $temp2;

	    			$args['private_questions_mcqs'] = $temp5->where('questions.lib_private_question', 1) //private
	    													->where('questions.question_type_id', 1)
	    			->get();
	    }
	return view('recruiter_dashboard.library_public_questions')->with($args);   	
    }
}

