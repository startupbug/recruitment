<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Format_setting;
use App\Admin_question;
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
    		
    	return view('admin.admin_questions.create',['items'=>$items]);
    }

    public function create(Request $request)
    {
    	$insert = new Admin_question;
    	$insert->user_id = Auth::user()->id;
    	$insert->format_setting_id = input::get('format');
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
    	return view('admin.admin_questions.edit',['edit_task'=>$edit_task, 'items'=>$items]);
    }

    public function question_update(Request $request, $id)
    {
    	$update = Admin_question::find($id);
    	$update->format_setting_id = $request->get('format');
        $update->question = $request->get('question');
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
