@include('candidate.partials.header')
	  @include('general_partials.error_section')
<div class="col-md-6 col-md-offset-3">
   <form class="form-horizontal" action="{{route('can_update_password',['id'=>Auth::user()->id])}}" method="post" enctype="multipart/form-data">
           {{csrf_field()}}   
      <div class="panel panel-default f_panel">
         <div class="panel-heading panel-heading-no-hover">
            <h3 class="h3-old align-center">Change Password</h3>
         </div>
         <div class="panel-body">
            <div class="signup-form">
               <div class="form-group">
                  <label class="control-label">Existing Password<i>*</i></label>
                  <input type="password" class="form-control" placeholder="Password" name="old_password" autocomplete="off" required="">
               </div>
               <div class="form-group">
                  <label class="control-label">New Password</label>
                  <input type="password" class="form-control placeholder="Password" name="password" autocomplete="off" required="">
               </div>
               <div class="form-group">
                  <label class="control-label">Confirm New Password</label>
                  <i class="text-danger pull-right">passwords do not match</i>
                  <input type="password" class="form-control" placeholder="Password" name="confirmation_password" autocomplete="off" required="">
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-primary">
                  <input type="button" class="btn btn-default" value="Cancel">
               </div>
               <div class="form-group">
                  <div class="text-danger"></div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
@include('candidate.partials.footer')