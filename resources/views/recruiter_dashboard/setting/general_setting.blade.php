@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="general">
   @include('general_partials.error_section')
   <div class="container-fluid padding-15-fluit">
      <h3 class="general_main">Settings</h3>
      <div class="row border-row display-table">
         <div class="col-md-3 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
            <ul class="nav nav-tabs nav-sidebar">
               <li><a href="#general1"><i class="fa fa-cog"></i>General Settings<i class=""></i></a></li>
               <li><a href="#contact2"><i class="fa fa-hand-pointer-o"></i>Contact Details <i class=""></i></a></li>
               <li><a href="#completion3"><i class="fa fa-envelope" aria-hidden="true"></i>Test Completion Mail<i class=""></i></a></li>
               <!-- <li><a data-toggle="pill" href="#trial"><i class="fa fa-list"></i>Trial Run<i class=""></i></a></li> -->
               <li><a href="#management4"><i class="fa fa-users" aria-hidden="true"></i>User Management<i class=""></i></a></li>
               <li><a href="#question5"><i class="fa fa-question-circle" aria-hidden="true"></i>Question Tags<i class=""></i></a></li>
            </ul>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 s-over-flow">
            <a name="general1"></a>
            <div class="s_link">
               <div class="panel panel-default">
                  <div class="panel-heading setting_gen">
                     General Setting
                  </div>
                  <div class="panel-body">
                     <form action="{{route('post_general_setting')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="name">
                              Full Name
                              <div class="s_popup">
                                 <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="This is the Account holders name. <br>
                                    Good to Know: <br>
                                    This will be the showcased on the top right corner of the titlebar."> <i class="fa fa-info-circle"> </i></a>
                                 <!--<i class="fa fa-info-circle"> </i>
                                    <span class="s_popuptext">
                                    	This is the Account holders name. <br>
                                    	Good to Know: <br>
                                    	This will be the showcased on the top right corner of the titlebar.
                                    </span>-->
                              </div>
                           </label>
                           <div class="col-md-9">
                              <input id="name" name="company_name" value="{{Auth::user()->company_profile->company_name}}" type="text" placeholder="Full Name" class="form-control general">
                           </div>
                        </div>
                        <!-- Email input-->
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="email">
                              Company Logo Url
                              <div class="s_popup">
                                 <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Insert the link to the company's logo. <br>
                                    Good to Know: <br>
                                    This logo will be the shown on the upper left corner of the titlebar. and the candidate registration page. <br>
                                    Logo size will be fit to 75px x 50px."> </i></a>
                                 <!--<i class="fa fa-info-circle"> </i>
                                    <span class="s_popuptext">
                                    	Insert the link to the company's logo. <br>
                                    	Good to Know: <br>
                                    	This logo will be the shown on the upper left corner of the titlebar. and the candidate registration page. <br>
                                    	Logo size will be fit to 75px x 50px.
                                    </span>-->
                              </div>
                           </label>
                           <div class="col-md-9">
                              <input id="email" name="company_logo" value="{{Auth::user()->company_profile->company_logo}}" type="text" placeholder="image (url http://www.url)" class="form-control general">
                           </div>
                        </div>
                        <div class="button_general">
                           <button type="submit" class="btn">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <a name="contact2"></a>
            <div class="s_link">
               <div class="panel panel-default">
                  <div class="panel-heading setting_gen">
                     Contact Details
                  </div>
                  <div class="panel-body">
                     <p class="contact_content">These are the contact details for the candidate's reference incase of any query.  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                        This is a markdown editor <br>
                        Learning refrence:<br>
                        http://www.markdowntutorial.com/"> <i class="fa fa-info-circle f_circle"> </i></a></p>
                     <form action="{{route('post_contact_details')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="email">Email ID </label>
                           <div class="col-md-9">
                              @php $contact_email = json_decode( Auth::user()->company_profile->company_email) @endphp
                              <input id="email" name="company_email[]" value="{{$contact_email[0]}}"  type="text" placeholder="support@codeground.in" class="form-control general color">
                              <div class="checkbox">
                                 <input type="checkbox" name="email_status" value="1" @if(!empty($contact_email[1])) checked="checked" @endif>Make visible to candidate<br>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="contact">Contact Number</label>
                           <div class="col-md-9">
                              @php $contact_phone = json_decode( Auth::user()->company_profile->company_phone) @endphp
                              <input id="contact" name="company_phone[]" value="{{$contact_phone[0]}}" type="text" placeholder="080-65555814" class="form-control general color">
                              <div class="checkbox">
                                 <input type="checkbox" name="contact_status" value="1" @if(!empty($contact_email[1])) checked="checked" @endif>Make visible to candidate<br>
                              </div>
                           </div>
                        </div>
                        <div class="button_general">
                           <button type="submit" class="btn">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <a name="completion3"></a>
            <div class="s_link">
               <div class="panel panel-default" id="test">
                  <div class="panel-heading setting_gen">
                     Test Completion Mail
                  </div>
                  <div class="panel-body">
                     <p class="contact_content">An email will be sent to the candidates after completing the test.</p>
                     <form action="{{route('test_completion_mail')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="name">Message </label>
                           <div class="col-md-9 test_completion">
                              <textarea name="company_message" rows="6" cols="60" placeholder="Your Message">@if(!empty(Auth::user()->company_profile->company_message)) {{Auth::user()->company_profile->company_message}} @endif</textarea>
                              <br>
                              <p class="candididate_user">You can use tags such as candidateName and testTitle to represent candidate name and test title respectively.</p>
                              <p class="candididate_user">For example:Hi candidateName,Your test - testTitle has been submitted successfully.</p>
                           </div>
                        </div>
                        <div class="button_general">
                           <button type="submit" class="btn">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <a name="management4"></a>
            <div class="s_link">
               <div class="panel panel-default">
                  <div class="panel-heading setting_gen">
                     User Management
                  </div>
                  <div class="panel-body">
                     <p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Users</label>
                        <div class="col-md-9">
                           <div class="role">
                              <ul>
                                 <li>Role</li>
                                 <li>User Id</li>
                              </ul>
                           </div>
                           <p class="yet">No Roles added yet</p>
                           <br>
                           <div class="button_general"><button type="button" class="btn"  data-toggle="modal" data-target="#usermanagement"><span class="glyphicon glyphicon-plus"></span>
                              Add Role</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a name="question5"></a>
            <div class="s_link">
               <div class="panel panel-default">
                  <div class="panel-heading setting_gen">
                     Question Tags
                  </div>
                  <div class="panel-body">
                     <p class="contact_content">Repository of tags that are used to tag questions in the library
                        <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                           This is a markdown editor <br>
                           Learning refrence:<br>
                           http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                     </p>
                     <!--<i class="fa fa-info-circle"> </i>
                        <span class="s_popuptext">
                        	This is the Account holders name. <br>
                        	Good to Know: <br>
                        	This will be the showcased on the top right corner of the titlebar.
                        </span>-->
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="name">
                           Tags
                           <div class="s_popup">
                              <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                              <!--<i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 	This is the Account holders name. <br>
                                 	Good to Know: <br>
                                 	This will be the showcased on the top right corner of the titlebar.
                                 </span>-->
                           </div>
                        </label>
                        <div class="col-md-9 tag_update">
                           @foreach($question_tags as $value)
                           <div class="row form-group">
                              <div class="input-group addon">
                                 <input type="text" value="{{$value->tag_name}}" class="form-control" tag-id="{{$value->id}}" disabled>
                                 <span class="input-group-addon success edit_tag">
                                   <i class="fa fa-pencil" aria-hidden="true"></i>
                                 </span>
                                 <!-- <span class="input-group-addon success edit_delete hidden">
                                   <i class="fa fa-close"></i>
                                 </span> -->
                                 <span class="xyz input-group-addon success delete_tag">
                                   <button class="QuestionTagSetting" data-id="{{$value->id}}" data-url="{{route('delete_question_tag')}}">
                                     <i class="fa fa-times-circle-o"></i>
                                   </button>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <br>
                        <div class="col-md-9 col-md-offset-3 col-sm-12 col-sm-offset-0">
                           <div class="button_general_tag" id="s_button_general_tag">
                              <button type="button" class="btn " onclick="functionAddTag()">
                              <span class="glyphicon glyphicon-plus"></span>Add New Tag
                              </button>
                           </div>
                           <div class="hidden" id="s_add_tag_button">
                              <div class="col-md-8 cancel_add">
                                 <input id="name" name="newTagValue" type="text" placeholder="Add a tag" class="form-control general add_last" required>
                              </div>
                              <div class="col-md-4">
                                 <button type="button" class="btn add" onclick="functionAddNewTag()">add</button>
                                 <button type="button" class="btn cancel_btn_fa" onclick="functionCancelTag()">cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@endsection
