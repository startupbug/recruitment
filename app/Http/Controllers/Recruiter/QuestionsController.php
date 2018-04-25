<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Section;
use App\Question;
use App\Events\QuestionChoice;
use App\Events\CodingQuestionDetail;
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

				//dd($question_data);
			event(new  CodingTestCases($question_data));
			return redirect()->back();	
		}else{
			$this->set_session('Please Give The Required Data', false);
			return redirect()->back();
		}
	}
	
	public function create_question_coding_debug(Request $request){		
		//dd($request->input());


  // "section_id" => "32"
  // "question_type_id" => "2"
  // "question_sub_types_id" => "3"
  // "question_state_id" => "2"
  // "coding_program_title" => "asdad"
  // "question_statement" => "<p>asdasdad</p>"
  // "weightage_status" => "1"
  // "test_case_name" => array:2 [▶]
  // "test_case_input" => array:2 [▶]
  // "test_case_output" => array:2 [▶]
  // "weightage" => array:2 [▶]


  // "test_case_verify" => "1"
  // "marks" => "123"
  // "tag_id" => "4"
  // "question_level_id" => "2"
  // "provider" => "3123"
  // "author" => "123123"
  // "text" => "321312"
  // "code" => "31313"
  // "url" => "21321"




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

	public function update_questions_modal(Request $request, $id)
    {
    	// $id = 0;
    	
        $update_question =  Question::find($id);
        // dd($update_question);
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
        // now what i have to do is unset value that are not in request but are in db

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

}