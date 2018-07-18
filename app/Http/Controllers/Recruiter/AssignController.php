<?php
namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;
use Auth;
use Session;
use Mail;
use App\AssignRole;
use App\AssignRoleDetail;
use App\Events\UserProfile;
use App\Events\UserCompanyProfile;
use App\CompanyProfile;
use App\Profile;
use App\User;
class AssignController  extends Controller
{
    public function __construct()
    {     
    }
    public function assigning_user_access_account(Request $request)
    {
      // dd($request);
      if (User::where('email', '=', $request->email)->exists()) {
        $selected_user = User::where('email', '=', $request->email)->first();
          if ($selected_user['role_id'] == 3) {

          }else{
            dd('you cannot process the request as the selected user is not recruiter');
          }
        dd('stop');
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
            $user->role_id = 2;
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

                Mail::send('emails.assign_user',['user_data'=>$user,'authorizer'=>$authorizer] , function ($message) use($user){
                    $message->from([$user->email], 'Assigned Role Email - Online Recruitment');
                    $message->to(env('MAIL_USERNAME'))->subject('Online Recruitment - Assigned Role Email Email');
                });
                $store = new AssignRole;
                $store->assign_role_details = $request->role_name;
                $store->assigned_user_id = $user->id;
                $store->assigner_id = $request->authorizer_id;
                $store->save();
                $this->set_session('User Successfully Registered.', true);
            }
            else{
                $this->set_session('User Couldnot be Registered.', false);
            }
            return redirect()->back();
        }catch(\Exception $e){
            $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
            return redirect()->back();
        }
          dd($request);
      }
    }
}