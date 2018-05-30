<?php
namespace App\Http\Controllers\Candidate;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidate_education_info;
use App\Candidate_project_info;
use App\Candidate_publication;
use App\Candidate_achievement;
use App\Candidate_connection;
use App\Candidate_framework;
use App\Candidate_work_info;
use App\Candidate_language;
use App\Support;
use App\Profile;
use App\User;
use Session;
use Hash;
use Auth;
use Mail;
use DB;

class CandidateProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function candidate_index()
    {
      $table = ['candidate_education_infos', 'candidate_languages', 'candidate_frameworks', 'candidate_achievements', 'candidate_connections', 'candidate_publications', 'candidate_work_infos','candidate_project_infos'];
      $args['progress_bar'] = 0;
      foreach ($table as $name) {
        $exists = DB::table($name)->where('user_id', '=',Auth::user()->id)->exists();
        $args['progress_bar'] += $exists ? 12.5 : 0;
      }
      $args['total_progress'] = (int)round($args['progress_bar'],0);


      $args['Candidate_education_info'] = Candidate_education_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_project_info'] = Candidate_project_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      foreach ($args['Candidate_project_info'] as $value) {
        $args['Candidate_project_skill_info'][$value->id] = DB::table('candidate_projects_new_skills')->where('candidate_project_infos_id',$value->id)->orderBy('id','ASC')->get();
      }

      $args['Candidate_language_info']  =  Candidate_language::where('user_id',Auth::user()->id)
                                                                    ->get();
      $args['Candidate_framework_info'] = Candidate_framework::where('user_id',Auth::user()->id)->get();

      $args['Candidate_work_info'] = Candidate_work_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      foreach ($args['Candidate_work_info'] as $value) {
        $args['Candidate_work_skill_info'][$value->id] = DB::table('candidate_work_skills')->where('candidate_work_infos_id',$value->id)->orderBy('id','ASC')->get();
      }

      $args['Candidate_publication'] = Candidate_publication::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_achievement'] = Candidate_achievement::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_connection'] = Candidate_connection::where('user_id',Auth::user()->id)->first();

      return view('candidate.profile')->with($args);
    }

    public function can_profile_view()
    {
      $args['Candidate_education_info'] = Candidate_education_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_project_info'] = Candidate_project_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_language_info']  =  Candidate_language::where('user_id',Auth::user()->id)
                                                                    ->get();
      $args['Candidate_framework_info'] = Candidate_framework::where('user_id',Auth::user()->id)->get();

      $args['Candidate_work_info'] = Candidate_work_info::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_publication'] = Candidate_publication::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_achievement'] = Candidate_achievement::where('user_id',Auth::user()->id)->orderBy('order_number','ASC')->get();

      $args['Candidate_connection'] = Candidate_connection::where('user_id',Auth::user()->id)->first();

      return view('candidate.can_profile_view')->with($args);
    }

    public function can_update_password(Request $request,$id){
        $user_info = User::select('password')->where('id',$id)->first();
        if (Hash::check($request->old_password, $user_info['password'])) {
            if($request->password === $request->confirmation_password){
                $user = User::where('id',$id)->update([
                'password' => bcrypt($request->password)
                ]);
                if($user){
                $this->set_session('Your Password Is Updated Succesfully', true);
                return redirect()->back();
                }
                else{
                $this->set_session('Your Password Is Not Updated Succesfully', false);
                return redirect()->back();
                }
            }
            else{
                $this->set_session('Password And Confirmation Password Do Not Matched', false);
                return redirect()->back();
            }
        }
        else{
            session::flash('err_message','Pl');
                return redirect()->back();
        }
    }

    public function change_password(){

        return view('candidate.change_password');
    }

    public function CanResumeUpload(Request $request){
        $candidate_resume = '';
        if(Input::file('candidate_resume')){
        $candidate_resume = $this->UploadResume('candidate_resume', Input::file('candidate_resume'));
        Profile::where('user_id' ,'=', $request->user_id)->update([
        'candidate_resume' => $candidate_resume
        ]);
        $path = asset('public/storage/profile-pictures/').'/'.$candidate_resume;
        return \Response()->json(['success' => "Resume update successfully", 'code' => 200, 'img' => $path]);
        $this->set_session('Resume Uploaded successfully', true);
        }else{
            $this->set_session('Resume is Not Uploaded. Please Try Again', false);
        return \Response()->json(['error' => "Resume uploading failed", 'code' => 202]);
        }
    }

    public function profileEducation(Request $request){
      try {
            if (isset($request->user_id) && isset($request->qualification) && isset($request->year_from) && isset($request->month_from) && isset($request->school)) {
                $last_highest_order_number = DB::table('candidate_education_infos')->where('order_number', DB::raw("(select max(`order_number`) from candidate_education_infos)"))->first();
                    $store = new Candidate_education_info;
                    $store->user_id = $request->user_id;
                    $store->qualification = $request->qualification;
                    if (isset($last_highest_order_number->order_number)) {
                    $store->order_number = $last_highest_order_number->order_number+1;
                    }else{
                    $store->order_number = 1;
                    }
                    $store->school = $request->school;
                    if (isset($request->current_status)) {
                      $store->current_status = 1;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
                      $store->date_from = $date_from;
                      $store->date_to = 'NULL';
                    }else{
                      $store->current_status = 0;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
                      $store->date_from = $date_from;
                      $store->date_to = $date_to;
                    }
                    $store->cgpa = $request->cgpa;
                    $store->max_cgpa = $request->max_cgpa;
                    $store->percentage = $request->percentage;
                    if ($store->save()) {
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Education Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function editprofileEducationStore(Request $request ,$id){
      try {
            if (isset($request->user_id) && isset($request->qualification) && isset($request->year_from) && isset($request->month_from) && isset($request->school)) {
                    $store = Candidate_education_info::find($id);
                    $store->user_id = $request->user_id;
                    $store->qualification = $request->qualification;
                    $store->school = $request->school;
                    if (isset($request->current_status)) {
                      $store->current_status = 1;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
                      $store->date_from = $date_from;
                      $store->date_to = NULL;
                    }else{
                      $store->current_status = 0;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
                      $store->date_from = $date_from;
                      $store->date_to = $date_to;
                    }
                    $store->cgpa = $request->cgpa;
                    $store->max_cgpa = $request->max_cgpa;
                    $store->percentage = $request->percentage;
                    if ($store->save()) {
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Education Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function editcandidateWorkStore(Request $request ,$id){
      try {
        if (isset($request->user_id) && isset($request->job_title) && isset($request->year_from) && isset($request->month_from) && isset($request->company) ) {
                    $store =  Candidate_work_info::find($id);
                    $store->user_id = $request->user_id;
                    $store->job_title = $request->job_title;
                    $store->company = $request->company;
                    if (isset($request->current_status)) {
                      $store->current_status = 1;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
                      $store->date_from = $date_from;
                      $store->date_to = NULL;
                    }else{
                      $store->current_status = 0;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
                      $store->date_from = $date_from;
                      $store->date_to = $date_to;
                    }
                    $store->location = $request->location;
                    $store->description = $request->description;
                    if ($store->save()) {
                      $delete_skills = DB::table('candidate_work_skills')->where('candidate_work_infos_id', '=' , $id)->delete();
                     foreach ($request->skills as $value) {
                      DB::table('candidate_work_skills')->insert([
                              'candidate_work_infos_id' => $store->id,
                              'skill' =>$value
                             ]);
                      }
                      return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Work Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function editprofilePublicationStore(Request $request ,$id){
      try {
          if (isset($request->user_id) && isset($request->title) && isset($request->url)) {
                  $store = Candidate_publication::find($id);
                  $store->user_id = $request->user_id;
                  $store->title = $request->title;
                  $store->url = $request->url;
                  if ($store->save()) {
                  return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Publication Information']);
                  }else{
                    return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                  }
          }else{
          return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
          }
      } catch (Exception $e) {
          return \Response()->Json([ 'array' => $e]);
      }
    }

    public function editprofileAchievementStore(Request $request ,$id){
       try {
            if (isset($request->user_id) && isset($request->title) && isset($request->description)) {
                    $store = Candidate_achievement::find($id);
                    $store->user_id = $request->user_id;
                    $store->title = $request->title;
                    $store->description = $request->description;
                    if ($store->save()) {
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Achievement Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileWorkExperience(Request $request){
    	try {
            if (isset($request->user_id) && isset($request->job_title) && isset($request->year_from) && isset($request->month_from) && isset($request->company) ) {
                   	$store = new Candidate_work_info;
                   	$store->user_id = $request->user_id;
                   	$store->job_title = $request->job_title;
                   	$store->company = $request->company;
                   	if (isset($request->current_status)) {
                   		$store->current_status = 1;
          						$date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
          						$date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
	                   	$store->date_from = $date_from;
	                   	$store->date_to = NULL;
                   	}else{
                   		$store->current_status = 0;
                   		$date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
						          $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
	                   	$store->date_from = $date_from;
	                   	$store->date_to = $date_to;
                   	}
                   	$store->location = $request->location;
                   	$store->description = $request->description;
                    // print_r($request->skills);exit();
                   	if ($store->save()) {
                    foreach ($request->skills as $value) {
                     DB::table('candidate_work_skills')->insert([
                              'candidate_work_infos_id' => $store->id,
                              'skill' =>$value
                             ]);
                    }
                 		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Work Information']);
                   	}else{
                   		return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                   	}
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function editprofileProjectsStore(Request $request ,$id){
      try {
            if (isset($request->user_id) && isset($request->project_url) && isset($request->year_from) && isset($request->month_from) && isset($request->project_name) ) {
                    $store = Candidate_project_info::find($id);
                    $store->user_id = $request->user_id;
                    $store->project_url = $request->project_url;
                    $store->project_name = $request->project_name;
                    if (isset($request->current_status)) {
                      $store->current_status = 1;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
                      $store->date_from = $date_from;
                      $store->date_to = NULL;
                    }else{
                      $store->current_status = 0;
                      $date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
                      $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
                      $store->date_from = $date_from;
                      $store->date_to = $date_to;
                    }
                    $store->description = $request->description;
                    if ($store->save()) {
                      $delete_skills = DB::table('candidate_projects_new_skills')->where('candidate_project_infos_id', '=' , $id)->delete();
                    foreach ($request->skills as $value) {
                     DB::table('candidate_projects_new_skills')->insert([
                              'candidate_project_infos_id' => $store->id,
                              'skill' =>$value
                             ]);
                    }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Project Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileProjectInfo(Request $request){
    	try {
            if (isset($request->user_id) && isset($request->project_url) && isset($request->year_from) && isset($request->month_from) && isset($request->project_name) ) {
                   	$store = new Candidate_project_info;
                   	$store->user_id = $request->user_id;
                   	$store->project_url = $request->project_url;
                   	$store->project_name = $request->project_name;
                   	if (isset($request->current_status)) {
                   		$store->current_status = 1;
          						$date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
          						$date_to =  date('Y') . '-' . $request->month_to . '-' . date('d');
	                   	$store->date_from = $date_from;
	                   	$store->date_to = NULL;
                   	}else{
                   		$store->current_status = 0;
                   		$date_from = $request->year_from . '-' . $request->month_from . '-' . '01';
						          $date_to = $request->year_to . '-' . $request->month_to . '-' . '01';
	                   	$store->date_from = $date_from;
	                   	$store->date_to = $date_to;
                   	}
                   	$store->description = $request->description;
                   	if ($store->save()) {
                    foreach ($request->skills as $value) {
                     DB::table('candidate_projects_new_skills')->insert([
                              'candidate_project_infos_id' => $store->id,
                              'skill' =>$value
                             ]);
                    }
                 		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Project Information']);
                   	}else{
                   		return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                   	}
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileLanguages(Request $request){
    	try {
            if (isset($request->user_id) && isset($request->language_name)) {
              if (Candidate_language::where('language_name', '=', $request->language_name)->where('user_id', '=', $request->user_id)->exists()) {
                 return \Response()->Json([ 'status' => 204,'msg'=>'This Language Already Exist']);
              }else{
                  $store = new Candidate_language;
                  $store->user_id = $request->user_id;
                  $store->language_name = $request->language_name;
                  if ($store->save()) {
                  return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Language Information']);
                  }else{
                    return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                  }
              }

            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileFrameworks(Request $request){
      	try {
          if (isset($request->user_id) && isset($request->framework_name)) {
            if (Candidate_framework::where('framework_name', '=', $request->framework_name)->where('user_id', '=', $request->user_id)->exists()) {
                 return \Response()->Json([ 'status' => 204,'msg'=>'This Framework Already Exist']);
              }else{
                  $store = new Candidate_framework;
                  $store->user_id = $request->user_id;
                  $store->framework_name = $request->framework_name;
                  if ($store->save()) {
                   return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Frameworks Information']);
                   }else{
                     return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                   }
              }
             }else{
              return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
            } catch (Exception $e) {
              return \Response()->Json([ 'array' => $e]);
            }
    }

    public function storeprofilePublications(Request $request){
    	try {
            if (isset($request->user_id) && isset($request->title) && isset($request->url)) {
                   	$store = new Candidate_publication;
                   	$store->user_id = $request->user_id;
                   	$store->title = $request->title;
                   	$store->url = $request->url;
                   	if ($store->save()) {
                 		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Publication Information']);
                   	}else{
                   		return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                   	}
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileAchievements(Request $request){
      try {
            if (isset($request->user_id) && isset($request->title) && isset($request->description)) {
                    $store = new Candidate_achievement;
                    $store->user_id = $request->user_id;
                    $store->title = $request->title;
                    $store->description = $request->description;
                    if ($store->save()) {
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Achievement Information']);
                    }else{
                      return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                    }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function storeprofileConnections(Request $request){
    	try {
            if (isset($request->user_id)) {
                   	$store =  Candidate_connection::firstOrNew(array('user_id' => $request->user_id));
                    $store->user_id = $request->user_id;
                    $store->linkedin_url = $request->linkedin_url;
                    $store->facebook_url = $request->facebook_url;
                    $store->twitter_url = $request->twitter_url;
                    $store->blog_url = $request->blog_url;
                    $store->github_url = $request->github_url;
                    $store->website_url = $request->website_url;
                   	if ($store->save()) {
                 		return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Connections Information']);
                   	}else{
                   		return \Response()->Json([ 'status' => 203,'msg'=>'Something Went Wrong Please Try Again']);
                   	}
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Required Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function UploadResume($type, $file){
        $var = '';
        if( $type == 'candidate_resume'){
        $path = 'public/storage/candidate-resumes/';
        }
        $filename = $file->getClientOriginalName();
        $var = str_replace(' ', '', $filename);
        $file->move( $path , $var);
        return $var;
    }

    public function CanImageUpload(Request $request){
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

    public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/storage/profile-pictures/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function update_can_info(Request $request){

        try {
            if (isset($request->user_id)) {
                User::where('id' ,'=', $request->user_id)->update([
                    'name' => $request->name
                    ]);
                Profile::where('user_id' ,'=', $request->user_id)->update([
                    'age' => $request->age,
                    'address' => $request->address,
                    'gender' => $request->gender
                ]);

                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Updated Candidate Information']);
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function delete_candidate_education($id){
        try {
            if (isset($id)) {
                $delete = Candidate_education_info::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                  $user_id = Candidate_education_info::where('user_id',Auth::user()->id)->get();
                  foreach ($user_id as $key => $value) {
                    DB::table('candidate_education_infos')->where('id',$value->id)->update([
                      'order_number' => ++$key
                    ]);
                  }
                   return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Education Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Education Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }

            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function delete_candidate_work_info($id){
        try {
            if (isset($id)) {
                $delete = Candidate_work_info::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                    $user_id = Candidate_work_info::where('user_id',Auth::user()->id)->get();
                    foreach ($user_id as $key => $value) {
                      DB::table('candidate_work_infos')->where('id',$value->id)->update([
                        'order_number' => ++$key
                      ]);
                  }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Work Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Work Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }

            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function delete_candidate_language($id){
        try {
            if (isset($id)) {
                $delete = Candidate_language::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                   return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Language Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Language Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }

            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function delete_candidate_framework($id){
        try {
            if (isset($id)) {
                $delete = Candidate_framework::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                   return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Framework Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Framework Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }

            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function candidate_education_move_up(Request $request,$id){
      $move_up = Candidate_education_info::find($id);
      $order_number = $move_up->order_number;
      $replacement = $order_number-1;
      $education_info_id = Candidate_education_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_education_info::where('user_id','=',$education_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_education_info::where('user_id','=',$education_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_education_infos')->where('id',$first_section_id['id'])->where('user_id',$education_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_education_infos')->where('id',$second_section_id['id'])->where('user_id',$education_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true);
      return redirect()->back();
    }

    public function candidate_education_move_down(Request $request,$id){
      $move_down = Candidate_education_info::find($id);
      $order_number = $move_down->order_number;
      $replacement = $order_number+1;
      $education_info_id = Candidate_education_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_education_info::where('user_id','=',$education_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_education_info::where('user_id','=',$education_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_education_infos')->where('id',$first_section_id['id'])->where('user_id',$education_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_education_infos')->where('id',$second_section_id['id'])->where('user_id',$education_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true);
      return redirect()->back();
    }

    public function candidate_work_move_up(Request $request,$id){
      $move_up = Candidate_work_info::find($id);
      $order_number = $move_up->order_number;
      $replacement = $order_number-1;
      $work_info_id = Candidate_work_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_work_info::where('user_id','=',$work_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_work_info::where('user_id','=',$work_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_work_infos')->where('id',$first_section_id['id'])->where('user_id',$work_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_work_infos')->where('id',$second_section_id['id'])->where('user_id',$work_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true);
      return redirect()->back();
    }

    public function candidate_work_move_down(Request $request,$id){
      $move_down = Candidate_work_info::find($id);
      $order_number = $move_down->order_number;
      $replacement = $order_number+1;
      $work_info_id = Candidate_work_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_work_info::where('user_id','=',$work_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_work_info::where('user_id','=',$work_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_work_infos')->where('id',$first_section_id['id'])->where('user_id',$work_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_work_infos')->where('id',$second_section_id['id'])->where('user_id',$work_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true);
      return redirect()->back();
    }

    public function candidate_project_move_up(Request $request,$id){
      $move_up = Candidate_project_info::find($id);
      $order_number = $move_up->order_number;
      $replacement = $order_number-1;
      $project_info_id = Candidate_project_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_project_info::where('user_id','=',$project_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_project_info::where('user_id','=',$project_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_project_infos')->where('id',$first_section_id['id'])->where('user_id',$project_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_project_infos')->where('id',$second_section_id['id'])->where('user_id',$project_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true);
      return redirect()->back();
    }

    public function candidate_project_move_down(Request $request,$id){
      $move_down = Candidate_project_info::find($id);
      $order_number = $move_down->order_number;
      $replacement = $order_number+1;
      $project_info_id = Candidate_project_info::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_project_info::where('user_id','=',$project_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_project_info::where('user_id','=',$project_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_project_infos')->where('id',$first_section_id['id'])->where('user_id',$project_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_project_infos')->where('id',$second_section_id['id'])->where('user_id',$project_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true);
      return redirect()->back();
    }

    public function delete_candidate_project($id){
        try {
            if (isset($id)) {
                $delete = Candidate_project_info::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                    $user_id = Candidate_project_info::where('user_id',Auth::user()->id)->get();
                    foreach ($user_id as $key => $value) {
                      DB::table('candidate_project_infos')->where('id',$value->id)->update([
                        'order_number' => ++$key
                      ]);
                  }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Project Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Project Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function candidate_publication_move_up(Request $request,$id){
      $move_up = Candidate_publication::find($id);
      $order_number = $move_up->order_number;
      $replacement = $order_number-1;
      $publication_info_id = Candidate_publication::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_publication::where('user_id','=',$publication_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_publication::where('user_id','=',$publication_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_publications')->where('id',$first_section_id['id'])->where('user_id',$publication_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_publications')->where('id',$second_section_id['id'])->where('user_id',$publication_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true);
      return redirect()->back();
    }

    public function candidate_publication_move_down(Request $request,$id){
      $move_down = Candidate_publication::find($id);
      $order_number = $move_down->order_number;
      $replacement = $order_number+1;
      $publication_info_id = Candidate_publication::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_publication::where('user_id','=',$publication_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_publication::where('user_id','=',$publication_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_publications')->where('id',$first_section_id['id'])->where('user_id',$publication_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_publications')->where('id',$second_section_id['id'])->where('user_id',$publication_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true);
      return redirect()->back();
    }

    public function delete_candidate_publication($id){
        try {
            if (isset($id)) {
                $delete = Candidate_publication::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                    $user_id = Candidate_publication::where('user_id',Auth::user()->id)->get();
                    foreach ($user_id as $key => $value) {
                      DB::table('candidate_publications')->where('id',$value->id)->update([
                        'order_number' => ++$key
                      ]);
                  }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Publication Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Publication Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }

    public function candidate_achievement_move_up(Request $request,$id){
      $move_up = Candidate_achievement::find($id);
      $order_number = $move_up->order_number;
      $replacement = $order_number-1;
      $achievement_info_id = Candidate_achievement::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_achievement::where('user_id','=',$achievement_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_achievement::where('user_id','=',$achievement_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_achievements')->where('id',$first_section_id['id'])->where('user_id',$achievement_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_achievements')->where('id',$second_section_id['id'])->where('user_id',$achievement_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Upper One', true);
      return redirect()->back();
    }

    public function candidate_achievement_move_down(Request $request,$id){
      $move_down = Candidate_achievement::find($id);
      $order_number = $move_down->order_number;
      $replacement = $order_number+1;
      $achievement_info_id = Candidate_achievement::select('user_id')->where('id',$id)->first();
      $first_section_id = Candidate_achievement::where('user_id','=',$achievement_info_id['user_id'])->where('order_number','=',$order_number)->first();
      $second_section_id = Candidate_achievement::where('user_id','=',$achievement_info_id['user_id'])->where('order_number','=',$replacement)->first();
      DB::table('candidate_achievements')->where('id',$first_section_id['id'])->where('user_id',$achievement_info_id['user_id'])->update([
      'order_number' => $replacement,
      ]);
      DB::table('candidate_achievements')->where('id',$second_section_id['id'])->where('user_id',$achievement_info_id['user_id'])->update([
      'order_number'=> $order_number
      ]);
      $this->set_session('Order Number Of This Section Has Been Successfully Swapped With The Lower One', true);
      return redirect()->back();
    }

    public function delete_candidate_achievement($id){
        try {
            if (isset($id)) {
                $delete = Candidate_achievement::find($id);
                if ($delete->user_id == Auth::user()->id) {
                  if ($delete->delete()) {
                    $user_id = Candidate_achievement::where('user_id',Auth::user()->id)->get();
                    foreach ($user_id as $key => $value) {
                      DB::table('candidate_achievements')->where('id',$value->id)->update([
                        'order_number' => ++$key
                      ]);
                  }
                    return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Deleted  Candidate Publication Information']);
                 }
                 else{
                   return \Response()->Json([ 'status' => 200,'msg'=>'Candidate Publication Information Was Not Deleted']);
                 }
                }else{
                   return \Response()->Json([ 'status' => 204,'msg'=>'You Can Not Delete This Information Because It Does Not Belongs To You']);
                }
            }else{
            return \Response()->Json([ 'status' => 202,'msg'=>'Please Give Complete Data']);
            }
        } catch (Exception $e) {
            return \Response()->Json([ 'array' => $e]);
        }
    }
}
