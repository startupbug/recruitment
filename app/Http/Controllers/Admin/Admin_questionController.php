<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Format_setting;
use App\Admin_question;
use App\Admin_question_type;
use Auth;
use Illuminate\Support\Facades\Input;
class Admin_questionController extends Controller
{
	public function index()
	{
		$questions = Admin_question::get();
		return view('admin.admin_questions.index',['questions'=>$questions]);
	}

    public function new()
    {
    	$items = Format_setting::all(['id', 'name']);
    	$question_type = Admin_question_type::all(['id','question_type']);	
    	return view('admin.admin_questions.create',['items'=>$items, 'question_type'=>$question_type]);
    }

    public function create(Request $request)
    {
    	$insert = new Admin_question;
    	$insert->user_id = Auth::user()->id;
    	$insert->format_setting_id = input::get('format');
        $insert->admin_question_type_id = input::get('question_type');
    	$insert->question = input::get('question');
    	$insert->support_text = input::get('Supporttext');
    	$insert->knock_out = 1;
    	$insert->mandatory = input::get('mandatory');
    	if ($insert->save())
    	{				
			$this->set_session('You Have Successfully Saved The Question Data', true);
		}else
		{
			$this->set_session('Something Went Wrong, Please Try Again', false);	
		}
		return redirect()->route('adminquestion_index');
    }

    public function question_edit($id)
    {
    	
    	$edit_task = Admin_question::where('id','=',$id)->first();
    	$items = Format_setting::all(['id', 'name']);
        $question_type = Admin_question_type::all(['id','question_type']);
    	return view('admin.admin_questions.edit',['edit_task'=>$edit_task, 'items'=>$items, 'question_type'=>$question_type]);
    }

    public function question_update(Request $request, $id)
    {
    	$update = Admin_question::find($id);
    	$update->format_setting_id = $request->get('format');
        $update->question = $request->get('question');
        $update->admin_question_type_id = $request->get('question_type');
        $update->support_text = $request->get('Supporttext');
        $update->knock_out = $request->get('Knockout');
        $update->mandatory = $request->get('mandatory');
        $update->save();
        return redirect()->route('adminquestion_index');
    }

    public function question_destroy($id)
    {
      $destroy = Admin_question::find($id);
      $destroy->delete();
      $this->set_session('User Is Deleted', true); 
      return redirect()->route('adminquestion_index');
    }
    
}
