<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Role;
use App\Profile;
use Auth;
use Hash;
use Session;
use DB;
use Carbon\Carbon;
use Datetime;
use File;
class AdminController extends Controller
{
    public function index(){                
        return view('admin.index');
    }
    public function users(){
    	$users = User::all();        
    	return view('admin.users.index', compact('users'));
    }

    public function remove_picture_admin($user_id){
            DB::table('profiles')
            ->where('user_id',$user_id)
            ->update(['profile_pic' => '']);
            return redirect()->back();
    }
    public function user_view($id){
    	$user = User::find($id);
    	if($user){    		
    		return view('admin.users.view', compact('user'));
    	}
    	else{
    		dd('no result found');
    	}
    }

    public function create(){
        $roles = Role::select('id','name')->get();
        return view('admin.users.create',['roles'=>$roles]);
    }

    public function store(Request $request){
    $store_user = new User;
    $store_user->name = $request->name;
    $store_user->email = $request->email;
    $store_user->role_id = $request->role_id;
    $store_user->password = Hash::make($request->password);
    $store_user->verified = $request->verified;
    $store_user->save();
    $store_user->attachRole($store_user->role_id);   
    $user_id = $store_user->id;

    $store_profile = new Profile;
    $store_profile->username = $request->username;
    $store_profile->user_id = $user_id;
    $store_profile->phone = $request->phone;
    $store_profile->d_o_b = $request->d_o_b;
    $store_profile->gender = $request->gender;
    if ($request->hasFile('profile_pic')) {
          $image=$request->file('profile_pic');
          $filename=time() . '.' . $image->getClientOriginalExtension();          
          $location=public_path('public/storage/profile-pictures/'.$filename);
          $store_profile->profile_pic=$filename;         
    }
    $store_profile->profile_pic = $this->UploadImage('profile_pic', Input::file('profile_pic'));         
    if ($store_profile->save()) {
    $this->set_session('User Created successfully.', true);        
    }else{
    $this->set_session('User is Not Created.', false);        
    }
    return redirect()->route('users');

    }

    public function user_edit($id){
        $user = User::find($id);
        if($user){            
            return view('admin.users.edit', compact('user'));
        }
        else{
            dd('no result found');
        }
    }
   
    public function ImageUpload(Request $request){

        $img_name = '';
        if(Input::file('profile_pic')){
        $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));

        Profile::where('user_id' ,'=', $request->user_id)->update([
        'profile_pic' => $img_name
        ]);  
        $path = asset('public/storage/profile-pictures/').'/'.$img_name; 
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        $this->set_session('Image Uploaded successfully', true); 
        }else{      
            $this->set_session('Image is Not Uploaded. Please Try Again', false); 
        return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
    }

    public function update(Request $request,$id){
       //updating users table data
       $update_user = User::find($id);
       $update_user->name = $request->name;       
       $update_user->email =$request->email;
       $update_user->verified =$request->verified; 
       $update_user->save();
       //updating user picture
       if (!empty($request->profile_pic)) {
            $img_name = '';                 
            $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));
            Profile::where('user_id' ,'=', $id)->update([
            'profile_pic' => $img_name
            ]);  
            $path = asset('public/storage/profile-pictures/').'/'.$img_name;                     
        }
        // Updating Profile Data
        DB::table('profiles')
            ->where('user_id', $id)
            ->update([
                'phone' => $request->phone,
                'gender' => $request->gender,
                'username' => $request->username,
                'd_o_b' => $request->d_o_b
            ]);
        $this->set_session('User Updated Successfully', true);
        return redirect()->route('users');
    }
    public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/storage/profile-pictures/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function activate_user($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['verified' => 1]);        
        $this->set_session('User Is Activated', true); 
        return redirect()->back();
    }
    
    public function deactivate_user($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['verified' => 0]);         
        $this->set_session('User Is Deactivated', false); 
        return redirect()->back();
    }  
    public function update_password(Request $request,$id){
        $user_info = User::select('password')->where('id',$id)->first();       
        if (Hash::check($request->old_password, $user_info['password'])) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id',$id)->update([
                'password' => bcrypt($request->password)
                ]);
                if($user){
                session::flash('success_msg','Your Password Is Updated Succesfully');
                return redirect()->back();
                }
                else{
                // return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
                session::flash('err_message','Your Password Is Not Updated Succesfully');
                return redirect()->back();
                }
            }
            else{
            // return \Response()->json(['error' => 'Password does not match with confirmation password', 'code' => 202]);
            session::flash('err_message','Password And Confirmation Password Do Not Matched');
                return redirect()->back();
            }
        }
        else{
            session::flash('err_message','Pl');
                return redirect()->back();
        }
    }

    // public function update_password(Request $request,$id)
    // {

    //     if (Hash::check($request->old_password, Auth::user()->password)) {

    //         if($request->password === $request->password_confirmation){
    //             $user = User::where('id', $id)->update([
    //                 'password' => bcrypt($request->password)
    //             ]);
    //             if($user){
    //                 Session::flash('password_status','you password is update');
    //                return redirect()->route('users'); 
    //             }
    //             else{
    //                 return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
    //             }
    //         }
    //         else{
    //             return \Response()->json(['error' => 'Password does not match with confirmation password', 'code' => 202]);
    //         }
    //     }
    //     else{
    //         Session::flash('old_password','Old password is incorrect, please enter valid password');
    //         return redirect()->route('users');
    //     }                   
    // } 

    public function destroy($id){
        $profile = Profile::where('user_id',$id)->delete();
        $delete = User::find($id);                
        $delete->delete();
        $this->set_session('User Is Deleted', true); 
        return redirect()->route('users');
    }

    public function admin_logout(){
        Auth::logout();
        return redirect()->route('login_index');
    }
}