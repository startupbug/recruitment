@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="change_password">
   <div class="container">
   	   @include('general_partials.error_section')
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               <div class="panel-heading">Change Password</div>
               <div class="panel-body">
                  <form action="{{route('update_password_recruiter')}}" method="post">
                  		{{csrf_field()}}
                  		<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Existing Password *</label>
                        <div class="col-md-9">
                           <input id="password" name="old_password" value="" type="password" class="form-control general">
                        </div>
                     </div>
                     <!-- Email input-->
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="email">New Password</label>
                        <div class="col-md-9">
                           <input id="password" name="password" type="password" class="form-control general">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Confirm New Password</label>
                        <div class="col-md-9">
                           <input id="password" name="password_confirmation" type="password" class="form-control general">
                           <div class="button_general"><button type="submit" class="btn">Update</button></div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection