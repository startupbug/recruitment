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

	public function delete_question($id){
		   // dd($id);   	
		$delete = Question::find($id);
		if ($delete->delete()){
			return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted The Question']);					
		}else{
			return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);					
		}
	}
}