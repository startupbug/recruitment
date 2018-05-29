<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invite_candidate;
use Auth;
use DB;
use App\Mail\Email_Invite_Candidate;
use Mail;
use Session;
class Invite_Candidate_Controller extends Controller
{
    //
    public function invitaion_to_candidate(Request $request, $id)
    {
    	// dd($request->input('host_id'));
    	$insert = new Invite_candidate();
    	$insert->email = $request->input('candidate_email');
    	$insert->recruiter_id = Auth::user()->id;
    	$insert->host_test_id = $request->input('host_id');
    	$insert->save();
    	// dd('data is save');
    	$user = DB::table('users')->where('email','=',$request->input('candidate_email'))->first();
    	// dd($user);
    	$email = new Email_Invite_Candidate(new Invite_candidate([ 'email' => $insert->email, 'host_test_id'=>$request->input('host_id'), 'recruiter_id' => $insert->recruiter_id]));
    	Mail::to($user->email)->send($email);
    	DB::commit();
        Session::flash('invitation','invitation sent to Candidate');
      	return redirect()->back(); 
    }

}
