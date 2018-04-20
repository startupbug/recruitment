<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Section;
use App\Question;
use App\Events\QuestionChoice;
use App\Events\QuestionDetail;
use App\Events\QuestionSolution;
use App\Mulitple_choice;
use Auth;
use DB;

class QuestionsController extends Controller
{
    public function create_question(Request $request){
		if (!empty($request->section_id)){
			$store = new Question;
			$store->user_id = Auth::user()->id;
			$store->section_id = $request->section_id;
			$store->question_state_id = $request->question_state_id;
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
		$myArray = explode(',', $request->section_mc_id[0]);		
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
}