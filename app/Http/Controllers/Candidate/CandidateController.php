<?php
namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\User;
use App\Profile;
use App\Candidate_setting_info;
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
     
    public function can_info()
    {
        return view('candidate.can_info');
    }    
    public function candidate_logout(){
        Auth::logout();
        return redirect()->route('login_index');
    }
    public function post_can_info(Request $request){  
      try {
       if (Auth::check()) {        
         $store = new Candidate_setting_info;
         $store->user_id =Auth::user()->id;
         $store->title =$request->title;
         $store->title =$request->title;
         $store->info_description =$request->info_description;                 
         if ($store->save()){
          $user = User::where('id',Auth::user()->id)->first(); 
          Mail::send('emails.info_email',['user_data'=>$user,'stored_info'=>$store] , function ($message) use($user){
              $message->from($user['email'], 'Info Email - Recruitment');
              $message->to(env('MAIL_USERNAME'))->subject('Recruitment - Info Email');
          });
          return \Response()->Json([ 'status' => 200,'msg'=>'Thank you for your valuable time. we will get back to you as soon as possible.']);
         }else{
           return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);
         }       
        }
      } catch (QueryException $e) {
        return \Response()->Json([ 'array' => $e]);
      }
    }
}
