<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyProfile;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Session;
use App\Support;
use Validator;
use App\Mail\EmailVerification;
use Mail;
use App\User;
class SupportController extends Controller
{
    public function send_query()
    {

    	$this->validate(request(),[
            'title' => 'required|string|max:255',
            'description' => 'required|string|',
        ]);

    	$query = new Support;
    	$query->title = Input::get('title');
    	$query->description = Input::get('description');
    	$query->user_id = Auth::user()->id;
    	$query->save();
    	$user = DB::table('users')->where('id','=',Auth::user()->id)->first();
    	// ->join('users','supports.user_id','=','users.id')
    	// ->select( 'users.id as user_id' ,'users.name as username', 'users.email as email', 'supports.id as support_id' ,'supports.title','supports.description')
    	// ->where('user_id','=',Auth::user()->id)
    	// ->orderby('support_id', 'DESC')
    	// ->first();
    	 
    	

    	$email = new EmailVerification(new Support([ 'title' => $query->title, 'description'=> $query->description]));
    	
            Mail::to($user->email)->send($email);
            
            DB::commit();
            Session::flash('query','your query has been emailed');
      	return redirect()->back(); 
    }

    
}
