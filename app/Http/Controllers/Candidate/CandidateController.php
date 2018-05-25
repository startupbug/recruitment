<?php
namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;
use Auth;
use Session;
use Mail;

class CandidateController extends Controller
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
    
     public function my_test()
    {
        return view('candidate.my_test');
    }   
    
    public function candidate_logout(){
        Auth::logout();
        return redirect()->route('login_index');
    }
}
