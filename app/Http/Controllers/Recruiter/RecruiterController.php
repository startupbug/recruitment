<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
class RecruiterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('recruiter_dashboard.dashboard');
    }

    public function customer_support()
    {
    
         $search_item = Input::get('query');
          $data[] = "";
            $searching= DB::table('supports')
            ->where('description','LIKE','%'.$search_item.'%')->get();
            
            if (count($searching) == 0) {
                
                Session::flash('not_found','no query found with this text');
            }
     
        return view('recruiter_dashboard.customer_support', ['searching' => $searching]);
    }

    public function history()
    {
        return view('recruiter_dashboard.history');
    }

    public function invited_candidates()
    {
        return view('recruiter_dashboard.invited_candidates');
    }

    public function library_public_questions()
    {
        return view('recruiter_dashboard.library_public_questions');
    }

    public function preview_test_questions()
    {
        return view('recruiter_dashboard.preview_test_questions');
    }


    public function change_password(){
         return view('recruiter_dashboard.setting.change_password');
    }

    public function general_setting(){
         return view('recruiter_dashboard.setting.general_setting');
    }

    public function setting_info(){
         return view('recruiter_dashboard.setting.info');
    }

}
