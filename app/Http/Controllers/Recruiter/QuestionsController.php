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
use App\Test_case;
use App\Coding_question_language;

class QuestionsController extends Controller
{

	public function add_library_questions(Request $request){
		$q_id = explode(",", $request->public_mcq_id);
		foreach ($q_id as $key => $value) {
			DB::table('question_pivot')->insert([
				'sec_id' => $request->secion_id,
				'ques_id' => $value,
			]);
		}
		$this->set_session('You Have Successfully Saved The Question Data', true);
		return redirect()->back();
	}
	public function create_question(Request $request){
		// dd($request->input());
		if (!empty($request->lib_private_question) || isset($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			if ($request->lib_private_question != 0) {
				$store->section_id = $request->section_id;
			}else{
				$store->section_id = NULL;
			}
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->lib_private_question = $request->lib_private_question;
			$store->question_statement = $request->question_statement;
			if ($store->save()){
				DB::table('question_pivot')->insert([
					'sec_id' => $request->section_id,
					'ques_id' => $store->id,
				]);
				$question_data =  array('store' => $store, 'request' =>$request->all());
				event(new  QuestionDetail($question_data));
				event(new  QuestionChoice($question_data));
				event(new  QuestionSolution($question_data));

			//Updating MCQ Tableview

				$args['ques1'] = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
				->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
				->leftJoin('mulitple_choices','mulitple_choices.question_id','=','questions.id')
				->leftJoin('question_types','question_types.id','=','questions.question_type_id')
				->leftJoin('question_states','question_states.id','=','questions.question_state_id')
				->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
				->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
				->where('questions.question_type_id',1)
				->where('questions.question_sub_types_id',1)
				->where('questions.user_id',Auth::user()->id)
				->where('questions.section_id', $request->section_id)
				->groupBy('questions.id')
				->get();

				$quescount = count($args['ques1']);
			//return $args['ques1'];
				$li_html = view('recruiter_dashboard.ajax_views.ajax_mcq_table')->with($args)->render();
				if ($request->section_id != NULL) {
					return \Response()->Json([ 'status' => 200, 'msg'=> 'You Have Successfully Saved The Question Data', 'li_html' => $li_html, 'section_id' =>  $request->section_id,
					'quescount' => $quescount]);
				}else{
				return \Response()->Json([ 'status' => 300, 'msg'=> 'You Have Successfully Saved The Question Data']);
				}

				// $this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				return \Response()->Json([ 'status' => 200, 'msg'=> 'Something Went Wrong, Please Try Again']);
				//$this->set_session('Something Went Wrong, Please Try Again', false);
			}

			return redirect()->back();
		}else{
			return \Response()->Json([ 'status' => 200, 'msg'=> 'Please Give The Required Data']);

			// $this->set_session('Please Give The Required Data', false);
			// return redirect()->back();
		}
	}
	public function create_question_coding(Request $request){
		if (!empty($request->lib_private_question) || isset($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			if ($request->lib_private_question != 0) {
				$store->section_id = $request->section_id;
			}else{
				$store->section_id = NULL;
			}
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->lib_private_question = $request->lib_private_question;
			$store->question_statement = $request->question_statement;
			if ($store->save()){
				DB::table('question_pivot')->insert([
					'sec_id' => $request->section_id,
					'ques_id' => $store->id,
				]);
				$question_data =  array('store' => $store, 'request' =>$request->all());
				event(new  CodingQuestionDetail($question_data));
				event(new  QuestionSolution($question_data));
				event(new  CodingEntries($question_data));
				event(new  CodingQuestionLanguage($question_data));
				event(new  CodingTestCases($question_data));

			//Updating MCQ Tableview

				$args['ques2'] = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
				->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
				->leftJoin('coding_entries','questions.id','=','coding_entries.question_id')
				->leftJoin('question_types','question_types.id','=','questions.question_type_id')
				->leftJoin('question_states','question_states.id','=','questions.question_state_id')
				->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
				->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
				->where('questions.question_type_id',2)
				->where('questions.user_id',Auth::user()->id)
				->where('questions.section_id', $request->section_id)
				->groupBy('questions.id')
				->get();

				$quescount = count($args['ques2']);
			//return $args['ques1'];
				$li_html = view('recruiter_dashboard.ajax_views.ajax_first_coding_table')->with($args)->render();
					if ($request->section_id != NULL) {
						return \Response()->Json([ 'status' => 200, 'msg'=> 'You Have Successfully Saved The Question Data', 'li_html' => $li_html, 'section_id' =>  $request->section_id,
					'quescount' => $quescount]);
				}else{
				return \Response()->Json([ 'status' => 300, 'msg'=> 'You Have Successfully Saved The Question Data']);
				}

				// $this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				return \Response()->Json([ 'status' => 200, 'msg'=> 'Something Went Wrong, Please Try Again']);
				//$this->set_session('Something Went Wrong, Please Try Again', false);
			}

			return redirect()->back();
		}else{
			return \Response()->Json([ 'status' => 200, 'msg'=> 'Please Give The Required Data']);

			// $this->set_session('Please Give The Required Data', false);
			// return redirect()->back();
		}
	}
	public function create_question_coding_debug(Request $request){
		if (!empty($request->lib_private_question) || isset($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			if ($request->lib_private_question != 0) {
				$store->section_id = $request->section_id;
			}else{
				$store->section_id = NULL;
			}
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->lib_private_question = $request->lib_private_question;
			$store->question_statement = $request->question_statement;
			if ($store->save()){
				DB::table('question_pivot')->insert([
					'sec_id' => $request->section_id,
					'ques_id' => $store->id,
				]);
				$question_data =  array('store' => $store, 'request' =>$request->all());
				event(new  CodingQuestionDetail($question_data));
				event(new  CodingTestCases($question_data));
				event(new  QuestionSolution($question_data));
				$args['ques2'] = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
				->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
				->leftJoin('coding_entries','questions.id','=','coding_entries.question_id')
				->leftJoin('question_types','question_types.id','=','questions.question_type_id')
				->leftJoin('question_states','question_states.id','=','questions.question_state_id')
				->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
				->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
				->where('questions.question_type_id',2)
				->where('questions.user_id',Auth::user()->id)
				->where('questions.section_id', $request->section_id)
				->groupBy('questions.id')
				->get();

				$quescount = count($args['ques2']);
			//return $args['ques1'];
				$li_html = view('recruiter_dashboard.ajax_views.ajax_second_coding_table')->with($args)->render();
				if ($request->section_id != NULL) {
						return \Response()->Json([ 'status' => 200, 'msg'=> 'You Have Successfully Saved The Question Data', 'li_html' => $li_html, 'section_id' =>  $request->section_id,
					'quescount' => $quescount]);
				}else{
				return \Response()->Json([ 'status' => 300, 'msg'=> 'You Have Successfully Saved The Question Data']);
				}
				// $this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				return \Response()->Json([ 'status' => 200, 'msg'=> 'Something Went Wrong, Please Try Again']);
				//$this->set_session('Something Went Wrong, Please Try Again', false);
			}

			return redirect()->back();
		}else{
			return \Response()->Json([ 'status' => 200, 'msg'=> 'Please Give The Required Data']);

			// $this->set_session('Please Give The Required Data', false);
			// return redirect()->back();
		}
	}
	public function create_first_submission_question(Request $request){

		if (!empty($request->lib_private_question) || isset($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			if ($request->lib_private_question != 0) {
				$store->section_id = $request->section_id;
			}else{
				$store->section_id = NULL;
			}
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->lib_private_question = $request->lib_private_question;
			$store->question_statement = $request->question_statement;
			if ($store->save()){
				DB::table('question_pivot')->insert([
					'sec_id' => $request->section_id,
					'ques_id' => $store->id,
				]);
				$question_data =  array('store' => $store, 'request' =>$request->all());
				event(new  QuestionDetail($question_data));
				event(new  QuestionSolution($question_data));
				event(new  QuestionSubmissionEvaluation($question_data));
				event(new  QuestionSubmissionResource($question_data));
				$args['ques3'] = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
				->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
				->leftJoin('question_types','question_types.id','=','questions.question_type_id')
				->leftJoin('questions_submission_resources','questions.id','=','questions_submission_resources.question_id')
				->leftJoin('question_submission_evaluations','questions.id','=','question_submission_evaluations.question_id')
				->leftJoin('question_states','question_states.id','=','questions.question_state_id')
				->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
				->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
				->where('questions.question_type_id',3)
				->where('questions.user_id',Auth::user()->id)
				->where('questions.section_id', $request->section_id)
				->groupBy('questions.id')
				->get();
				$quescount = count($args['ques3']);
			//return $args['ques1'];
				$li_html = view('recruiter_dashboard.ajax_views.ajax_first_submission_table')->with($args)->render();
				if ($request->section_id != NULL) {
						return \Response()->Json([ 'status' => 200, 'msg'=> 'You Have Successfully Saved The Question Data', 'li_html' => $li_html, 'section_id' =>  $request->section_id,
					'quescount' => $quescount]);
				}else{
				return \Response()->Json([ 'status' => 300, 'msg'=> 'You Have Successfully Saved The Question Data']);
				}

				// $this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				return \Response()->Json([ 'status' => 200, 'msg'=> 'Something Went Wrong, Please Try Again']);
				//$this->set_session('Something Went Wrong, Please Try Again', false);
			}

			return redirect()->back();
		}else{
			return \Response()->Json([ 'status' => 200, 'msg'=> 'Please Give The Required Data']);

			// $this->set_session('Please Give The Required Data', false);
			// return redirect()->back();
		}
	}
	public function create_second_submission_question(Request $request){
		if (!empty($request->lib_private_question) || isset($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			if ($request->lib_private_question != 0) {
				$store->section_id = $request->section_id;
			}else{
				$store->section_id = NULL;
			}
			$store->question_state_id = $request->question_state_id;
			$store->question_sub_types_id = $request->question_sub_types_id;
			$store->question_type_id = $request->question_type_id;
			$store->question_level_id = $request->question_level_id;
			$store->lib_private_question = $request->lib_private_question;
			$store->question_statement = $request->question_statement;
			if ($store->save()){
				DB::table('question_pivot')->insert([
					'sec_id' => $request->section_id,
					'ques_id' => $store->id,
				]);
				$question_data =  array('store' => $store, 'request' =>$request->all());
				event(new  QuestionSubmissionEvaluation($question_data));
				event(new  QuestionDetail($question_data));
				event(new  QuestionSolution($question_data));
				$args['ques3'] = Question::leftJoin('question_details','question_details.question_id','=','questions.id')
				->leftJoin('question_solutions','question_solutions.question_id','=','questions.id')
				->leftJoin('question_types','question_types.id','=','questions.question_type_id')
				->leftJoin('questions_submission_resources','questions.id','=','questions_submission_resources.question_id')
				->leftJoin('question_submission_evaluations','questions.id','=','question_submission_evaluations.question_id')
				->leftJoin('question_states','question_states.id','=','questions.question_state_id')
				->leftJoin('question_levels','question_levels.id','=','questions.question_level_id')
				->leftJoin('question_tags','question_tags.id','=','question_details.tag_id')
				->where('questions.question_type_id',3)
				->where('questions.user_id',Auth::user()->id)
				->where('questions.section_id', $request->section_id)
				->groupBy('questions.id')
				->get();
				$quescount = count($args['ques3']);
			//return $args['ques1'];
				$li_html = view('recruiter_dashboard.ajax_views.ajax_first_submission_table')->with($args)->render();
				if ($request->section_id != NULL) {
						return \Response()->Json([ 'status' => 200, 'msg'=> 'You Have Successfully Saved The Question Data', 'li_html' => $li_html, 'section_id' =>  $request->section_id,
					'quescount' => $quescount]);
				}else{
				return \Response()->Json([ 'status' => 300, 'msg'=> 'You Have Successfully Saved The Question Data']);
				}

				// $this->set_session('You Have Successfully Saved The Question Data', true);
			}else{
				return \Response()->Json([ 'status' => 200, 'msg'=> 'Something Went Wrong, Please Try Again']);
				//$this->set_session('Something Went Wrong, Please Try Again', false);
			}

			return redirect()->back();
		}else{
			return \Response()->Json([ 'status' => 200, 'msg'=> 'Please Give The Required Data']);

			// $this->set_session('Please Give The Required Data', false);
			// return redirect()->back();
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
			$this->set_session('You Have Successfully Deleted The Question', true);
			return redirect()->back();
			// return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted The Question']);
		}else{
			$this->set_session('Question Not Deleted, Something Went Wrong!', false);
			return redirect()->back();
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

		// dd($request->input());
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
		//dd($get_choice_id);
		$request_choice =$request->input('choice');
		$request_answer = $request->input('answer');
		 // dd($request->input());
		//dd(in_array("dsfs", $request_answer));

		// foreach ($request_choice as $key => $value) {
		// 		Mulitple_choice::find();
		// }

		  $answer=0;
		foreach ($get_choice_id as $key => $value)
		{
			if(in_array($request_choice[$key], $request_answer)){
				$answer = 1;
			}

			$abc = Mulitple_choice::updateOrCreate(
				['id' => $value->id],
				['choice' => $request_choice[$key],
				'partial_marks'=> $request->input('partial_marks')[$key],
				'status' => 1,  'answer' => $answer, 'shuffle_status' => 0, ]
			);

			$answer = 0;

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

			return response(['msg' => 'Product deleted', 'status' => 'success']);
		}
		return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
	}

    public function coding_update_questions_modal(Request $request, $id)
    {
    	$update_question =  Question::find($id);
    	$update_question->question_statement = $request->get('question_statement');
    	$update_question->save();

    	$update_details = DB::table('question_details')
            ->where('question_id',$id)
            ->update([
            	'coding_program_title' => $request->get('coding_program_title'),
                'marks' => $request->get('marks'),
                'provider' => $request->get('provider'),
                'author' => $request->get('author')
        ]);


    	$get_coding_entrys = DB::table('coding_entries')->where('question_id','=',$id)->get(['id']);
    	$request_coding_input = $request->input('coding_input');
    	$request_coding_output = $request->input('coding_output');
    	 //dd($request->input());
    	 $count_coding_inputs = count($request_coding_input);
    	 $i=0;
    	foreach ($get_coding_entrys as $get_coding_entry) {
    		$coding_entry = Coding_entry::where('id', '=', $get_coding_entry->id)
			->update( ['input' => $request_coding_input[$i], 'output' => $request_coding_output[$i]] );
    		unset($request_coding_input[$i]);
    		unset($request_coding_output[$i]);
    		 $i = $i + 1;
    	}
    			//dd($request_coding_output);
    	foreach ($request_coding_input as $key => $value) {
        	$insert = new Coding_entry;
        	$insert->question_id = $id;
        	$insert->input = $request->input('coding_input')[$key];
        	$insert->output = $request->input('coding_output')[$key];
        	$insert->save();
        }

        $test_cases = Test_case::where('question_id','=',$id)->get(['id']);
        $test_cases_name = $request->input('test_case_name');
        $test_cases_input = $request->input('test_case_input');
        $test_cases_output = $request->input('test_case_output');
        $test_cases_weightage = $request->input('weightage');

        $count_test_cases = count($test_cases_name);
        $i=0;
        foreach ($test_cases as $test_case) {
        	$test_case_data = Test_case::where('id','=',$test_case->id)
        	->update([ 'test_case_name' => $test_cases_name[$i], 'test_case_input' => $test_cases_input[$i], 'test_case_output' => $test_cases_output[$i], 'weightage' => $test_cases_weightage[$i] ]);
        	unset($test_cases_name[$i]);
    		unset($test_cases_input[$i]);
    		unset($test_cases_output[$i]);
    		unset($test_cases_weightage[$i]);

    		$i = $i + 1;
        }

        foreach ($test_cases_name as $key => $value) {
        	$insert = new Test_case;
        	$insert->question_id = $id;
        	$insert->test_case_name = $request->input('test_case_name')[$key];
        	$insert->test_case_input = $request->input('test_case_input')[$key];
        	$insert->test_case_output = $request->input('test_case_output')[$key];
        	$insert->weightage = $request->input('weightage')[$key];
        	$insert->save();
        }


        $allowed_languages = DB::table('coding_question_languages')->where('question_id','=',$id)->get();
          // dd($allowed_languages);
        $delete_query_new = DB::table('coding_question_languages')->where('question_id',$id)->get();
        if (isset($delete_query_new)) {
	        foreach ($delete_query_new as $key => $value) {
	        	$delete = DB::table('coding_question_languages')->where('id',$value->id)->delete();
	        }
        }


        $allowed_languages_id = $request->input('allowed_languages_id');

        $count_allowed_languages_id = count($allowed_languages_id);
        // dd($count_allowed_languages_id);



        $i = 0;
        foreach ($allowed_languages as $allowed_language ) {
        	$allowed_languages_data = Coding_question_language::where('id','=',$allowed_language->id)
        	->update([ 'allowed_languages_id' => $allowed_languages_id[$i]]);
        	// dd($allowed_languages_data);
        	unset($allowed_languages_id[$i]);
        	$i = $i + 1;
        }

        foreach ($allowed_languages_id as $key => $value) {
        	$insert = new Coding_question_language;
        	$insert->question_id = $id;
        	$insert->allowed_languages_id = $request->input('allowed_languages_id')[$key];
        	$insert->save();
        }


    	$abc = Question_solution::updateOrCreate(
        		['question_id' => $id],
        		[
					'text' => $request->text,
					'code'=> $request->code,
					'url'=>$request->url
        		]);
		    	 if(isset($request->solution_media)){
		            $image=$request->solution_media;
		            $filename = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
		            $location=public_path('public/storage/question-solution-media/'.$filename);
		            Question_solution::where('question_id' ,'=', $id)->update([
		            'solution_media' => $filename
		            ]);
		            $abc->solution_media = $this->UploadFile('solution_media', $request->solution_media);
		        }

        return redirect()->back();




    }
    public function submission_update_questions_modal(Request $request,$id){

		$update_question =  Question::find($id);
    	$update_question->question_statement = $request->get('question_statement');
    	$update_question->question_state_id = $request->get('question_state_id');
    	$update_question->question_level_id = $request->get('question_level_id');
    	$update_question->save();




    	$update_help = DB::table('questions_submission_resources')->where('question_id',$id)->get();
    	foreach ($update_help as $key => $value_new) {
    		// dd($value_new->id);
    		DB::table('questions_submission_resources')->where('id',$value_new->id)->delete();
    	}
    	// dd($request->input());
    	$help_material = $request->input('help_material_name');
    	if(!empty($help_material))
    	{
    		foreach ($request->help_material_name as $key => $value) {
	    		DB::table('questions_submission_resources')
	            ->insert([
	            	'question_id'=>$id,
	                'candidate_help_material_tests_id' => $value

	   			]);
    		}
    	}


    	$update_evaluation_title = DB::table('question_submission_evaluations')->where('question_id',$id)->get();
    	foreach ($request->submission_evaluation_title as $key => $value) {
    		DB::table('question_submission_evaluations')
            ->where('question_id',$id)
            ->update([
                'submission_evaluation_title' => $value
   			]);
    	}

    	$update_evaluation_weightage= DB::table('question_submission_evaluations')->where('question_id',$id)->get();
    	foreach ($request->weightage  as $key => $value) {
    		DB::table('question_submission_evaluations')
            ->where('question_id',$id)
            ->update([
                'weightage' =>$value
   			]);
    	}

    	//dd($update_help);



    	$update_details = DB::table('question_details')
            ->where('question_id',$id)
            ->update([
                'marks' => $request->get('marks'),
                'provider' => $request->get('provider'),
                'author' => $request->get('author'),
                'tag_id' => $request->get('tag_id')
        ]);

    	$abc = Question_solution::updateOrCreate(
        		['question_id' => $id],
        		[
					'text' => $request->text,
					'code'=> $request->code,
					'url'=>$request->url
        		]);
		    	 if(isset($request->solution_media)){
		            $image=$request->solution_media;
		            $filename = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
		            $location=public_path('public/storage/question-solution-media/'.$filename);
		            Question_solution::where('question_id' ,'=', $id)->update([
		            'solution_media' => $filename
		            ]);
		            $abc->solution_media = $this->UploadFile('solution_media', $request->solution_media);
		        }

        return redirect()->back();


    }
    public function UploadFile($type, $file){

        if( $type == 'solution_media'){
        $path = 'public/storage/question-solution-media/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        // dd($filename);
        return $filename;
    }

    public function delete_test_case($id)
    {
    	$delete_test_case = Test_case::findOrFail( $id );
    	$delete_test_cases = $delete_test_case->delete();
    	if ($delete_test_case ) {
    		return response(['msg' => 'Product deleted', 'status' => 'success']);
    	}
    	return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
    }

    public function show_setting_newquestion()
    {
			$show_question = Admin_question::get();
			$question_type = Admin_question_type::get();

			if ($show_question && $question_type){

				return \Response()->Json([ 'status' => 200,'show_question'=>$show_question, 'question_type'=>$question_type]);
			}else{
				return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);
			}
		}

}
