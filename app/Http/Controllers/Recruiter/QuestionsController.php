<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Section;
use App\Question;
use App\Events\QuestionChoice;
use App\Events\CodingQuestionDetail;
use App\Events\QuestionSubmissionEvaluation;
use App\Events\QuestionSubmissionResource;
use App\Events\CodingQuestionLanguage;
use App\Events\CodingEntries;
use App\Events\CodingTestCases;
use App\Events\QuestionDetail;
use App\Events\QuestionSolution;
use App\Mulitple_choice;
use Auth;
use DB;
use App\Question_solution;
use App\Question_detail;
use App\Coding_entry;
use App\Admin_question;
use App\Admin_question_type;
class QuestionsController extends Controller
{
    public function create_question(Request $request){    	
		if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->question_statement = $request->question_statement;
			if ($store->save()){				
				$this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}
			$question_data =  array('store' => $store, 'request' =>$request->all());			
			event(new  QuestionDetail($question_data));
			event(new  QuestionChoice($question_data));
			event(new  QuestionSolution($question_data));
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}
	}
	public function create_question_coding(Request $request){		
		if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->question_statement = $request->question_statement;
			if ($store->save()){				
				$this->set_session('You Have Successfully Saved The Coding Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}
			$question_data =  array('store' => $store, 'request' =>$request->all());			
			event(new  CodingQuestionDetail($question_data));
			event(new  QuestionSolution($question_data));
			event(new  CodingEntries($question_data));
			event(new  CodingQuestionLanguage($question_data));
			event(new  CodingTestCases($question_data));
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}
	}	
	public function create_question_coding_debug(Request $request){		
		if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->question_statement = $request->question_statement;
			if ($store->save()){				
				$this->set_session('You Have Successfully Saved The Coding Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}
			$question_data =  array('store' => $store, 'request' =>$request->all());			
			event(new  CodingQuestionDetail($question_data));
			event(new  CodingTestCases($question_data));
			event(new  QuestionSolution($question_data));			
			// event(new  CodingEntries($question_data));
			// event(new  CodingQuestionLanguage($question_data));
			//dd($question_data);
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}
	}
	public function create_first_submission_question(Request $request){	

			if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->question_statement = $request->question_statement;
			if ($store->save()){				
				$this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}
			$question_data =  array('store' => $store, 'request' =>$request->all());			
			event(new  QuestionDetail($question_data));			
			event(new  QuestionSolution($question_data));
			event(new  QuestionSubmissionEvaluation($question_data));			
			event(new  QuestionSubmissionResource($question_data));			
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}		
	}
	public function create_second_submission_question(Request $request){
			if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->question_statement = $request->question_statement;
			if ($store->save()){				
				$this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}
			$question_data =  array('store' => $store, 'request' =>$request->all());	
			event(new  QuestionSubmissionEvaluation($question_data));
			event(new  QuestionDetail($question_data));			
			event(new  QuestionSolution($question_data));
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}		
	}
	public function question_modal_partial_data(Request $request){		
		$question_modal_partial_data = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
								->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
								->leftJoin('mulitple_choices','mulitple_choices.question_id','=','questions.id')
								->leftJoin('question_types','question_types.id','=','questions.question_type_id')
								->leftJoin('question_states','question_states.id','=','questions.question_state_id')
								->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
								->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
								->where('questions.id',$request->question_id)
								->first();
	 	$question_modal_choices = Mulitple_choice::where('question_id',$request->question_id)->get();

		if (isset($question_modal_partial_data)){			
			return \Response()->Json([ 'status' => 200, 'question_data'=>$question_modal_partial_data, 'question_choices' => $question_modal_choices]);		
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
			return redirect()->back();		
		}		
	}
	public function coding_question_modal_partial_data(Request $request){
		//HASAN MEHDI CODING QUESTIONS FROM JQUERY 

	 	$q_type_id = $request->input('quesType');
	 	$q_id = $request->input('id');

	 	$coding_question_data = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
								->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
								->leftJoin('coding_entries','questions.id','=','coding_entries.question_id')
								->leftJoin('question_types','question_types.id','=','questions.question_type_id')
								->leftJoin('question_states','question_states.id','=','questions.question_state_id')
								->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
								->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
								->select('questions.id', 'question_types.type_name', 'question_types.id as ques_type_id', 'question_details.coding_program_title', 'coding_entries.input', 'coding_entries.output', 'questions.question_statement', 'question_levels.level_name','question_details.provider','question_tags.tag_name','question_details.marks','question_details.provider','question_details.author')
								->where('questions.id','=',$q_id)
								->where('question_type_id','=',$q_type_id)
								->first();
								// return $coding_question_data;
		$coding_question_entries = Coding_entry::where('question_id','=',$q_id)->get();

		if (isset($coding_question_data)){			
			return \Response()->Json([ 'status' => 200, 'coding_question_data'=>$coding_question_data, 'coding_question_entries'=>$coding_question_entries]);		
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
			return redirect()->back();		
		}		
	}


	public function submission_question_modal_partial_data(Request $request){
		//HASAN MEHDI CODING QUESTIONS FROM JQUERY 

	 	$q_type_id = $request->input('quesType');
	 	$q_id = $request->input('id');

	 	$coding_question_data = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
								->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
								->leftJoin('question_types','question_types.id','=','questions.question_type_id')
								->leftJoin('questions_submission_resources','questions.id','=','questions_submission_resources.question_id')
								->leftJoin('question_submission_evaluations','questions.id','=','question_submission_evaluations.question_id')
								->leftJoin('question_states','question_states.id','=','questions.question_state_id')
								->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
								->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
								->select('questions.id', 'question_types.type_name', 'question_types.id as ques_type_id', 'question_details.coding_program_title', 'questions.question_statement', 'question_levels.level_name','question_details.provider','question_tags.tag_name','question_details.marks','question_details.provider','question_details.author','question_submission_evaluations.submission_evaluation_title','question_submission_evaluations.weightage','questions_submission_resources.candidate_help_material_tests_id')
								->where('questions.id','=',$q_id)
								->where('question_type_id','=',$q_type_id)
								->first();
								// return $coding_question_data;
		$coding_question_entries = DB::table('candidate_help_material_tests')
		->join('questions_submission_resources','candidate_help_material_tests.help_material_name','=','questions_submission_resources.candidate_help_material_tests_id')
		->where('questions_submission_resources.question_id','=','$q_id')
		->get();

		if (isset($coding_question_data)){			
			return \Response()->Json([ 'status' => 200, 'coding_question_data'=>$coding_question_data]);
			if(isset($coding_question_entries))
			{
				return \Response()->Json([ 'status' => 200, 'coding_question_data'=>$coding_question_data ,'coding_question_entries'=>$coding_question_entries]);
			}
			else
			{
				$this->set_session('Something Went Wrong, Please Try Again!', false);
				return redirect()->back();
			}		
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
			return redirect()->back();		
		}		
	}


	public function update_partial_question(Request $request){		
		if (!empty($request->question_id)){
			DB::table('question_details')
	        ->where('question_id', $request->question_id)
	        ->update([
	        	'marks' => $request->marks,
	        	'negative_marks' => $request->negative_marks
	        ]);							
				$this->set_session('You Have Successfully Updated The Question Data', true);
			}else{
				$this->set_session('Something Went Wrong, Please Try Again', false);	
			}			
			return redirect()->back();
	}
	public function delete_question($id){		  	
		$delete = Question::find($id);
		if ($delete->delete()){
			return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted The Question']);					
		}else{
			return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);					
		}
	}
	public function delete_all_mcqs_questions(Request $request){
		$myArray = explode(',',$request->section_mc_id[0]);
		if (isset($myArray)) {			
			foreach($myArray as $value) {				
				$delete = Question::find($value);
				$delete->delete();		
			}
			$this->set_session('You Have Successfully Deleted All The Selected Questions', true);
				return redirect()->back();
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
				return redirect()->back();
		}
	}
	public function delete_all_coding_questions(Request $request){
		$myArray = explode(',',$request->section_c_id[0]);
		if (isset($myArray)) {			
			foreach($myArray as $value) {				
				$delete = Question::find($value);
				$delete->delete();		
			}
			$this->set_session('You Have Successfully Deleted All The Selected Questions', true);
				return redirect()->back();
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
				return redirect()->back();
		}
	}
	public function delete_all_submission_questions(Request $request){
		$myArray = explode(',',$request->section_s_id[0]);
		if (isset($myArray)) {			
			foreach($myArray as $value) {				
				$delete = Question::find($value);
				$delete->delete();		
			}
			$this->set_session('You Have Successfully Deleted All The Selected Questions', true);
				return redirect()->back();
		}else{
			$this->set_session('Something Went Wrong, Please Try Again!', false);
				return redirect()->back();
		}
	}

	public function update_questions_modal(Request $request, $id)
    {    	
        $update_question =  Question::find($id);
        $update_question->question_state_id = $request->get('question_state_id');
        $update_question->question_level_id = $request->get('question_level');
        $update_question->question_statement = $request->get('question_statement');
        $update_question->save();
        $update_details = DB::table('question_details')
            ->where('question_id',$id)
            ->update([
                'marks' => $request->get('marks'),
                'tag_id' => $request->get('tag_name'),
                'provider' => $request->get('provider'),
                'author' => $request->get('author') 
        ]);
        $get_choice_id = DB::table('mulitple_choices')->where('question_id','=',$id)->get(['id']);
        $request_choice =$request->input('choice');
        foreach ($get_choice_id as $key => $value)
        {   
        	$abc = Mulitple_choice::updateOrCreate(
        		['id' => $value->id], 
        		['choice' => $request_choice[$key], 'partial_marks'=> $request->input('partial_marks')[$key]]
        	);
        	unset($request_choice[$key]);
        	//usnset is use to unset values that are not in key
        	//this unset function is taking that values that are not in db and then inserting them    
        }
        foreach ($request_choice as $key => $value) {
        	$insert = new Mulitple_choice;
        	$insert->question_id = $id;
        	$insert->choice = $request->input('choice')[$key];
        	$insert->partial_marks = $request->input('partial_marks')[$key];
        	$insert->save();
        }
        $abc = Question_solution::updateOrCreate(
        		['question_id' => $id], 
        		['text' => $request->solutiontext, 'code'=> $request->solutioncode, 'url'=>$request->solutionurl]
        	);
        return redirect()->back(); 
    }

    public function delete_choice($id)
    {
    	// $delete_choice = Mulitple_choice::where('id','=',$id)->get();
    	// return $delete_choice;
			
    	 $delete_choice = Mulitple_choice::findOrFail( $id );
    	 
 			$delete_choices = $delete_choice->delete();		
    if ($delete_choices ) {

       return 1234;
        return response(['msg' => 'Product deleted', 'status' => 'success']);
    }
    return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
    }

    public function show_setting_newquestion()
    {
    	//return '444444444';
    	$show_question = Admin_question::get();
    	$question_type = Admin_question_type::get();

    	if ($show_question && $question_type){

			return \Response()->Json([ 'status' => 200,'show_question'=>$show_question, 'question_type'=>$question_type]);					
		}else{
			return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);					
		}
    }

}