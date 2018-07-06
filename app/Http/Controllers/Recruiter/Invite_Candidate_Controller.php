<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invite_candidate;
use Auth;
use DB;
use App\Mail\Email_Invite_Candidate;
use App\Mail\Remainder_candidates;
use Mail;
use Session;
use App\Remainder_candidate;
use App\Hosted_test;
class Invite_Candidate_Controller extends Controller
{
    //
    public function invitaion_to_candidate(Request $request, $id)
    {
    	// dd($request->input('host_id'));
        $invited_candidates = Invite_candidate::where('host_test_id',$id)->get();
        $hosted_time = Hosted_test::where('id',$id)->first();
        $check_candidate = Invite_candidate::where('email','=',$request->input('candidate_email'))->get();
            if(count($check_candidate) < 1)
            {
                $user = DB::table('users')->where('email','=',$request->input('candidate_email'))->first();
                if(!empty($user))
                {
                    $insert = new Invite_candidate();
                    $insert->email = $request->input('candidate_email');
                    $insert->recruiter_id = Auth::user()->id;
                    $insert->host_test_id = $request->input('host_id');
                    $insert->save();
                    // dd('data is save');
                    
                    // dd($user);
                    
                    $email = new Email_Invite_Candidate(new Invite_candidate([ 'email' => $insert->email, 'host_test_id'=>$request->input('host_id'), 'recruiter_id' => $insert->recruiter_id]));
                    Mail::to($user->email)->send($email);
                    DB::commit();
                    Session::flash('invitation','invitation sent to Candidate');
                    $invited_candidates = Invite_candidate::where('host_test_id',$id)->get();
                    $hosted_time = Hosted_test::where('id',$id)->first();
                    session::flash('success_msg','Invitation to candidate has been sent');
                    return view('recruiter_dashboard.invited_candidates',['invited_candidates' => $invited_candidates, 'hosted_time'=>$hosted_time,'host_id'=>$id]);    
                }
                else
                {
                    $invited_candidates = Invite_candidate::where('host_test_id',$id)->get();
                    $hosted_time = Hosted_test::where('id',$id)->first();
                    session::flash('error_msg','no candidate present with this email');
                    return view('recruiter_dashboard.invited_candidates',['invited_candidates' => $invited_candidates, 'hosted_time'=>$hosted_time, 'host_id'=>$id]);
                }
        }
        else
        {   
            // dd(545455);
            session::flash('war_msg','invitation is already sent to this candidate');
            return view('recruiter_dashboard.invited_candidates',['invited_candidates' => $invited_candidates, 'hosted_time'=>$hosted_time, 'host_id'=>$id]);
        }
    	
    	 
    }

    public function send_remainder(Request $request)
    {
        // dd($request->input());
        $user = Invite_candidate::where('host_test_id',$request->input('host_id'))->pluck('email');
        // dd($user);
        $invited_candidates_emails = Invite_candidate::where('host_test_id',$request->input('host_id'))->select('email')->get();
         // dd($invited_candidates_emails);
        foreach ($invited_candidates_emails as $key => $value) {
        $insert = new Remainder_candidate();
            // dd($value->email);
            $insert->email = $value->email;
            $insert->subject = $request->input('subject');
            $insert->body = $request->input('email_body');
            $insert->recruiter_id = Auth::user()->id;
            $insert->host_test_id = $request->input('host_id');
            $insert->save();
            
        }
        $email = new Remainder_candidates(new Remainder_candidate([ 'email' => $insert->email, 'host_test_id'=>$request->input('host_id'), 'recruiter_id' => $insert->recruiter_id, 'subject'=>$insert->subject, 'body'=>$insert->body ]));
            Mail::to($user)->send($email);
            session::flash('success_msg','Remainder Email sent to all candidates');
        return redirect()->back();

        
    }

    public function delete_invitation($id)
    {
        Invite_candidate::where('id', $id)->delete();
        session::flash('success_msg','Invitation has been canceled');
        return redirect()->back();
    }

}
