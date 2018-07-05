<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Help;
class HelpController extends Controller
{
    public function create_faq()
    {
    	return view('admin.faqs.create');
    }
    public function create_faq_questions(Request $request)
    {
    	$insert_question = new Help;
    	$insert_question->question = $request->input('question');
    	$insert_question->answer = $request->input('answer');
    	$insert_question->save();
    	$this->set_session('You created new FAQs question', true); 
    	return redirect()->back();
    }

    public function index()
    {
    	$show_all = Help::all();
    	return view("admin.faqs.index",['show_all' => $show_all]);
    }
    public function edit_faq($id)
    {
    	$edit = Help::where('id','=',$id)->first();
    	return view('admin.faqs.edit',['edit_que' => $edit]);
    }
    public function edit_faq_question(Request $request)
    {
    	// dd($request->input());
    	$edit_question = Help::find($request->input('id'));
    	$edit_question->question = $request->input('question');
    	$edit_question->answer = $request->input('answer');
    	$edit_question->save();
    	$this->set_session('Your question has been edit', true); 
    	return redirect()->back();
    }

    public function faq_question_destroy($id)
    {
      $destroy = Help::find($id);
      $destroy->delete();
      $this->set_session('Question Is Deleted', true); 
      return redirect()->back();
    }
}
