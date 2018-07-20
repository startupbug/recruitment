<?php
namespace App\Http\Controllers\Recruiter;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Events\UserCompanyProfile;
use Illuminate\Http\Request;
use App\Events\UserProfile;
use App\AssignRoleDetail;
use App\CompanyProfile;
use App\AssignRole;
use App\Support;
use App\Profile;
use App\User;
use Session;
use Auth;
use Hash;
use Mail;
use DB;

class AssignController  extends Controller
{
  public function assigning_user_access_account(Request $request)
  {
    if (User::where('email', '=', $request->email)->exists()) {
      $selected_user = User::where('email', '=', $request->email)->first();
      if ($selected_user['role_id'] == 3) {              
        try{
          $user = User::where('email',$request->email)->first();
          $authorizer = User::where('id',$request->authorizer_id)->first();
          Mail::send('emails.assign_user',['user_data'=>$user,'authorizer'=>$authorizer] , function ($message) use($user){
            $message->from([$user->email], 'Assigned Role Email - Online Recruitment');
            $message->to(env('MAIL_USERNAME'))->subject('Online Recruitment - Assigned Role Email Email');
          });
          $store = new AssignRole;
          $store->assign_role_details = $request->role_name;
          $store->assigned_user_id = $user->id;
          $store->assigner_id = $request->authorizer_id;
          $store->save();
          $this->set_session('You Have Successfully Authenticated This User To Access Your Profile', true);            
          return redirect()->back();
        }catch(\Exception $e){
          $this->set_session('Neither User Registered Nor Authenticated..'.$e->getMessage(), false);
          return redirect()->back();
        }
      }else{
          $this->set_session('You Cannot Authenticate This User As This User is not a Recruiter, Please Provide Any Recruiter Email To Authenticate', false);
          return redirect()->back();
      }      
    }else{
     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
          $pass = array(); //remember to declare $pass as an array
          $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
          for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
          }
          $password = implode($pass);
          try{
            $user = new User();
            $user->password = bcrypt($password);
            $user->email = $request->email;
            $user->role_id = 3;
            if($user->save()) {
              $values['user'] = $user;
              $profile = CompanyProfile::create([
                'user_id' => $user->id,           
              ]); 
              $profile = Profile::create([
                'user_id' => $user->id,           
              ]);
              $user->attachRole($user->role_id);
              $authorizer = User::where('id',$request->authorizer_id)->first();
              Mail::send('emails.assign_user',['user_data'=>$user,'password'=>$password,'authorizer'=>$authorizer] , function ($message) use($user){
                $message->from([$user->email], 'Assigned Role Email - Online Recruitment');
                $message->to(env('MAIL_USERNAME'))->subject('Online Recruitment - Assigned Role Email Email');
              });
              $store = new AssignRole;
              $store->assign_role_details = $request->role_name;
              $store->assigned_user_id = $user->id;
              $store->assigner_id = $request->authorizer_id;
              $store->save();
              $this->set_session('You Have Successfully Authenticated This User To Access Your Profile And User Successfully Registered.', true);
              return redirect()->back();
            }
            else{
              $this->set_session('Neither User Registered Nor Authenticated.', false);
              return redirect()->back();
            }
            return redirect()->back();
          }catch(\Exception $e){
            $this->set_session('Something Went Wrong.'.$e->getMessage(), false);
            return redirect()->back();
          }
        }
      }
    }