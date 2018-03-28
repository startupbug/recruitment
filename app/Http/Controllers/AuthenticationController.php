<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AuthenticationController extends Controller
{
    public function register_index(){
    	return view('auth.register');
    }

    public function register_post(Request $request){
    	//dd($request->input());

        /* Validating User */
        $this->validate($request, [
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3|max:18',
            'role_id' => 'required',       
        ]);

        try{
            $user = new User();
            $user->password = bcrypt($request->password);
            //$user->email_token = base64_encode($user->email);

            foreach($request->input() as $key => $value) {
                if($key != '_token' && $key != 'password_confirmation' && $key != 'password'){
                    $user->$key = $value;
                }
            }         

            if($user->save()){

                /*Attaching User Role to the New User */ 
	            // - 1- Admin
	            // - 2- Student 
                $user->attachRole($request->input('role_id'));   

	             //Creating Profile for this new User.
                //event(new UserEvent($user));
               
                //dispatch(new SendVerificationEmail($user));
                $this->set_session('User Successfully Registered.', true);
            }
            else{
                $this->set_session('User Couldnot be Registered.', false);
            }

            return redirect()->route('register_index');

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
            return redirect()->route('register_index');                
        }

    }

    public function login_index(){
        return view('auth.login');
    }

      public function login_post(Request $request){
       // dd($request->input());
       /* Validation */
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',   
        // ]);
        //Checking if Account is Verified or not
        // $account_status = User::where('email', $request->email)->first(['verified']);


        // if(isset($account_status->verified) && $account_status->verified != 1){
        //     $this->set_session('Please verify your Account to Log in.', false);
        //     return redirect()->route('login_view');              
        // }

        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {
            
                if (Auth::user()->role_id == '1') {
                    return redirect()->route('admin_index');
                }else{
                return redirect()->route('dashboard');  
                }
            
            }else{
                $this->set_session('Invalid Username/Password', false);
                return redirect()->route('login_index');             
            }

        }
        catch(\Exception $e){
            $this->set_session('Something went wrong. Please try again'.$e->getMessage(), false);    
            return redirect()->route('login_index');                       
        }         
    }
}