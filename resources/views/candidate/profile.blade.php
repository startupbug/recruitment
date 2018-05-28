@include('candidate.partials.header')

<div>
   <div class="user-profile page-header">
      <div class="container">
         <div class="col-md-10 col-md-offset-1 row">
            <div class="col-md-3 col-md-offset-1">
               <div class="pull-right " style="padding-bottom:4px">Profile Completeness :</div>
            </div>
            <div class="col-md-7" style="margin-top:4px">
               <div class="progress" style="height:15px">
                  <div class="progress-bar ng-binding" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:8%;line-height:15px;font-size:13px;">
                     8%
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a id="basicDetailsAnchor" style="display: block;position: relative;top: -250px;"></a>
      <div class="personal-info" style="margin-top:10px">
         <div class="container">
            <div class="profile-pic">
                @if(!empty(Auth::user()->profile->profile_pic) && isset(Auth::user()->profile->profile_pic))
               <img class="img-circle" src="{{asset('public/storage/profile-pictures/' . Auth::user()->profile->profile_pic)}}">
               @else
               <img alt="" class="img-circle" src="{{asset('public/storage/profile-pictures/abc.jpg')}}">
                      @endif

               <div class="edit-profile-pic">
                  <form action="{{route('CanImageUpload')}}" method="post" enctype="multipart/form-data" id="change_can_profile_pic">
                     <input name="_token" value="{{csrf_token()}}" type="hidden">
                     <input name="user_id" value="{{Auth::user()->id}}" type="hidden">
                     <div class="camera_image">
                       <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                       <input name="profile_pic" id="change_can_profile_pic" type="file">
                     </div>
                  </form>
                  <!-- <input type="file" name=""> -->
               </div>
            </div>
            <div class="user-info">
               <div class="row">
                  <div class="col-xs-9">
                     <form id="UpdateCanInfo" name="profileBasic" class="form-horizontal" action="{{route('update_can_info')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group form-group-sm">
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Name" name="name" value="{{Auth::user()->name}}" required="">
                           </div>
                           <div class="col-sm-3">
                             <select name="gender" class="form-control">
                                <option selected disabled>Select a gender</option>
                                <option value="male" {{ Auth::user()->profile->gender == 'male' ? 'selected' : ''  }}>Male</option>
                                <option value="female" {{ Auth::user()->profile->gender == 'female' ? 'selected' : ''  }}>Female</option>
                            </select>
                           </div>
                           <div class="col-sm-2">
                              <input type="text" min="0" class="form-control" placeholder="Age" name="age" value="{{ Auth::user()->profile->age }}">
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <div class="col-sm-5">
                              <input type="text" class="form-control" placeholder="Location" value="{{ Auth::user()->profile->address }}" name="address" autocomplete="off" required="" uib-typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations" typeahead-no-results="noResults" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-5473-9005">
                              <ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-5473-9005" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate">
                              </ul>
                           </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button class="btn btn-sm btn-info" type="submit" disabled>Save</button>
                        <button class="btn btn-sm btn-danger" type="button" disabled="disabled">Cancel</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="profileMandatoryBox">
         Mandatory Fields :
         <ul style="padding-left:10px;text-align:initial">
            <li class="">
               <a style="color:#FFFFFF" onmouseover="this.style.color='#FFFFFF'" href="">Basic details </a>
            </li>
            <li class="">
               <a style="color:#FFFFFF" onmouseover="this.style.color='#FFFFFF'" href="">Degree details</a>
            </li>
         </ul>
      </div>
      <section>
         <div class="detailed-info container">
            <form id="CanResumeUpload" action="{{route('CanResumeUpload')}}" method="post" enctype="multipart/form-data">
               {{csrf_field()}}
               @if(!isset(Auth::user()->profile->candidate_resume))
               <div class="alert alert-danger" style="padding-top:10px;border-radius:5px;background-color:#f2dede;color:#a94442">
                  <strong>No resume!</strong> Recruiters will be interested in going through the resumes of candidates
                  <span style="padding:10px;">
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                     <div class="f_upload_btn">
                        Upload Media
                        <input type="file" name="candidate_resume">
                     </div>
                  </span>
                  <br>
                  <span style="font-size:13px">please fill the details below to improvise the search of your profile among recruiters</span>
               </div>
               @else
               <div class="alert alert-info" style="padding-top:10px;border-radius:5px;">
                  <strong>Resume : </strong> <span class="file_name">{{Auth::user()->profile->candidate_resume}}</span> updated on May 22, 2018
                  <span style="padding:10px;">
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                     <div class="f_upload_btn">
                        Upload resume
                        <input type="file" name="candidate_resume">
                     </div>
                  </span>
                  <a href="{{asset('public/storage/candidate-resumes\//'). Auth::user()->profile->candidate_resume}}" class="view_button" target="blank">View</a>
               </div>
               @endif
            </form>
         </div>
      </section>
      <div class="detailed-info container">
         <div class="">
            <div class="panel-heading panel-heading-no-hover">
            </div>
            <div class="panel-body">
            </div>
         </div>
         <div class="panel panel-special">
            <a id="educationAnchor" style="display: block;position: relative;top: -100px;"></a>
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-graduation-cap"></i>
               Education
            </div>
            <div class="panel-body">
               <ul class="ul_add" id="ul_add_education">
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_eduation')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add an Education
                     </a>
                  </li>
                  <li id="add_eduation" class="panel-block hidden">
                     <form id="profileEducationStore" class="form-horizontal" name="profileEducation" action="{{route('profileEducation')}}"  method="post">
                        {{csrf_field()}}
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">
                              <div>Qualification*</div>
                           </label>
                           <div class="col-sm-4">
                              <span class="">
                              <input type="text" class="form-control" placeholder="Degree" name="qualification">
                              </span>
                           </div>
                           <div class="control-label" style="text-align:initial">(Required)</div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">
                           <span class="">College*</span>
                           <span class="ng-hide">School*</span>
                           </label>
                           <div class="col-sm-4">
                             <!--  <span class="">
                                 <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" placeholder="College" name="college" data-ng-model="newEdu.college" ng-trim="true" data-ng-required="showNewEduInput &amp;&amp; academic==='other'" ng-model-options="modelOptions" uib-typeahead="college for college in colleges | filter:$viewValue | limitTo:8" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-5474-8065">
                                 <ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-5474-8065" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate">
                                 </ul>
                              </span> -->
                              <span>
                              <input type="text" class="form-control" placeholder="School" name="school">
                              </span>
                           </div>
                           <div class="control-label" style="text-align:initial">(Required)</div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Duration*</label>
                           <div class="col-sm-8">
                              <div class="select-range-group">
                                 <div>
                                    <div class="input-group input-group-select">
                                       <select class="form-control" name="month_from">
                                          <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" name="year_from">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1974">1974</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <h5 class="text-align-center to_value">to</h5>
                                 <div class="to_date_value">
                                    <div class="input-group input-group-select">
                                       <select class="form-control" name="month_to" name="month_to">
                                          <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" name="year_to" name="year_to">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option  value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option data-ng-repeat="year in years"  value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1974">1974</option>
                                          <!-- endngRepeat: year in years -->
                                          <option  value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" class="currently_working" name="current_status"> Currently studying
                                    <label class="control-label">(Required)</label>
                                    </label>
                                 </div>
                              </div>
                              <div class="control-label col-sm-3" style="text-align:initial">Start date</div>
                              <div class="control-label col-sm-3" style="text-align:initial">End date</div>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Percentage</label>
                           <div class="col-sm-4">
                              <input type="number" class="form-control" placeholder="Percentage" name="percentage">
                              <!-- ngIf: interacted(profileEducation.percentage) -->
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">CGPA</label>
                           <div class="col-sm-2">
                              <input type="decimal" class="form-control" placeholder="CGPA" name="cgpa">
                              <!-- ngIf: interacted(profileEducation.cgpa) -->
                           </div>
                           <div class="col-sm-2">
                              <input type="decimal" class="form-control" placeholder="Max CGPA" name="max_cgpa">
                              <!-- ngIf: interacted(profileEducation.cgpa) -->
                           </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group form-group-sm">
                           <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Add</button>
                              <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_eduation')">Cancel</button>
                           </div>
                        </div>
                     </form>
                  </li>
                  <!-- foreach loop -->
                  @foreach($Candidate_education_info as $value)
                  <li class="panel-block">
                     <div class="row">
                        <div class="education_list_data">
                           <div class="col-xs-8">
                              <span>
                                 <h4><strong>{{$value->qualification}}</strong></h4>
                                 {{$value->school}}
                              </span>
                              <p>{{date('M-Y', strtotime($value->date_from))}} - {{date('M-Y', strtotime($value->date_to))}} </p>
                              <p><strong>CGPA: </strong>{{$value->cgpa}} </p>
                              <p><strong>Percentage: </strong>{{$value->percentage}}%</p>
                           </div>
                           <div class="col-xs-4">
                              <ul class="nav-links navbar-nav navbar-right">
                                 @if(!$loop->first)
                                 <li>
                                    <a href="">Move up</a>
                                 </li>
                                 @endif
                                 @if(!$loop->last)
                                 <li>
                                    <a href="">Move down</a>
                                 </li>
                                 @endif
                                 <li>
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                       Options<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                       <li>
                                          <a class="edit_education_list">Edit</a>
                                       </li>
                                       <li>
                                          <form class="delete_candidate_education" action="{{route('delete_candidate_education',['id'=>$value->id])}}" method="get">
                                             <button type="submit">Delete</button>
                                          </form>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-xs-12 education_list_form hidden">
                           <form class="form-horizontal add_eduation_form" id="editprofileEducationStore" action="{{route('editprofileEducationStore',['id'=>$value->id])}}"  method="post">
                              {{csrf_field()}}
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">
                                    <div>Qualification*</div>
                                 </label>
                                 <div class="col-sm-4">
                                    <span class="">
                                    <input type="text" class="form-control" placeholder="Degree" name="qualification" value="{{$value->qualification}}">
                                    </span>
                                 </div>
                                 <div class="control-label" style="text-align:initial">(Required)</div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">
                                 <span class="">College*</span>
                                 <span class="ng-hide">School*</span>
                                 </label>
                                 <div class="col-sm-4">
                                    <span>
                                    <input type="text" class="form-control placeholder="School" name="school" value="{{$value->school}}">
                                    </span>
                                 </div>
                                 <div class="control-label" style="text-align:initial">(Required)</div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">Duration*</label>
                                 <div class="col-sm-8">
                                    <div class="select-range-group">
                                       <div>
                                          <div class="input-group input-group-select">
                                             <select class="form-control" name="month_from">
                                                <option value="" disabled="" selected="">Month</option>
                                                <!-- ngRepeat: month in months -->
                                                <option @if(date('m', strtotime($value->date_from)) == "01") selected @endif  value="01">Jan</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "02") selected @endif  value="02">Feb</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "03") selected @endif  value="03">Mar</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "04") selected @endif  value="04">Apr</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "05") selected @endif  value="05">May</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "06") selected @endif  value="06">Jun</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "07") selected @endif  value="07">Jul</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "08") selected @endif  value="08">Aug</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "09") selected @endif  value="09">Sep</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "10") selected @endif  value="10">Oct</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "11") selected @endif  value="11">Nov</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_from)) == "12") selected @endif  value="12">Dec</option>
                                                <!-- end ngRepeat: month in months -->
                                             </select>
                                             <select class="form-control" name="year_from">
                                                <option value="" disabled="" selected="">Year</option>
                                                <!-- ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2020") selected @endif value="2020">2020</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2019") selected @endif value="2019">2019</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2018") selected @endif value="2018">2018</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2017") selected @endif value="2017">2017</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2016") selected @endif value="2016">2016</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2015") selected @endif value="2015">2015</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2014") selected @endif value="2014">2014</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2013") selected @endif value="2013">2013</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2012") selected @endif value="2012">2012</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2011") selected @endif value="2011">2011</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2010") selected @endif value="2010">2010</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2009") selected @endif value="2009">2009</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2008") selected @endif value="2008">2008</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2007") selected @endif value="2007">2007</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2006") selected @endif value="2006">2006</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2005") selected @endif value="2005">2005</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2004") selected @endif value="2004">2004</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2003") selected @endif value="2003">2003</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2002") selected @endif value="2002">2002</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2001") selected @endif value="2001">2001</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "2000") selected @endif value="2000">2000</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1999") selected @endif value="1999">1999</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1998") selected @endif value="1998">1998</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1997") selected @endif value="1997">1997</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1996") selected @endif value="1996">1996</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1995") selected @endif value="1995">1995</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1994") selected @endif value="1994">1994</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1993") selected @endif value="1993">1993</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1992") selected @endif value="1992">1992</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1991") selected @endif value="1991">1991</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1990") selected @endif value="1990">1990</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1989") selected @endif value="1989">1989</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1988") selected @endif value="1988">1988</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1987") selected @endif value="1987">1987</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1986") selected @endif value="1986">1986</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1985") selected @endif value="1985">1985</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1984") selected @endif value="1984">1984</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1983") selected @endif value="1983">1983</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1982") selected @endif value="1982">1982</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1981") selected @endif value="1981">1981</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1980") selected @endif value="1980">1980</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1979") selected @endif value="1979">1979</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1978") selected @endif value="1978">1978</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1977") selected @endif value="1977">1977</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1976") selected @endif value="1976">1976</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1975") selected @endif value="1975">1975</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1974") selected @endif value="1974">1974</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1973") selected @endif value="1973">1973</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1972") selected @endif value="1972">1972</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "01") selected @endif value="1971">1971</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1970") selected @endif value="1970">1970</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1969") selected @endif value="1969">1969</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1968") selected @endif value="1968">1968</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1967") selected @endif value="1967">1967</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1966") selected @endif value="1966">1966</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1965") selected @endif value="1965">1965</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1964") selected @endif value="1964">1964</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1963") selected @endif value="1963">1963</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1962") selected @endif value="1962">1962</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1961") selected @endif value="1961">1961</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1960") selected @endif value="1960">1960</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1959") selected @endif value="1959">1959</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1958") selected @endif value="1958">1958</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1957") selected @endif value="1957">1957</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1956") selected @endif value="1956">1956</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1955") selected @endif value="1955">1955</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1954") selected @endif value="1954">1954</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1953") selected @endif value="1953">1953</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1952") selected @endif value="1952">1952</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_from)) == "1951") selected @endif value="1951">1951</option>
                                                <!-- end ngRepeat: year in years -->
                                             </select>
                                          </div>
                                       </div>
                                       <h5 class="text-align-center to_value">to</h5>
                                       <div class="to_date_value">
                                          <div class="input-group input-group-select">
                                             <select class="form-control" name="month_to" name="month_to">
                                                <option value="" disabled="" selected="">Month</option>
                                                <!-- ngRepeat: month in months -->
                                                <option @if(date('m', strtotime($value->date_to)) == "01") selected @endif  value="01">Jan</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "02") selected @endif  value="02">Feb</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "03") selected @endif  value="03">Mar</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "04") selected @endif  value="04">Apr</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "05") selected @endif  value="05">May</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "06") selected @endif  value="06">Jun</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "07") selected @endif  value="07">Jul</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "08") selected @endif  value="08">Aug</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "09") selected @endif  value="09">Sep</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "10") selected @endif  value="10">Oct</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "11") selected @endif  value="11">Nov</option>
                                                <!-- end ngRepeat: month in months -->
                                                <option  @if(date('m', strtotime($value->date_to)) == "12") selected @endif  value="12">Dec</option>
                                                <!-- end ngRepeat: month in months -->
                                             </select>
                                             <select class="form-control" name="year_to" name="year_to">
                                               <option value="" disabled="" selected="">Year</option>
                                                <!-- ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2020") selected @endif value="2020">2020</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2019") selected @endif value="2019">2019</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2018") selected @endif value="2018">2018</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2017") selected @endif value="2017">2017</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2016") selected @endif value="2016">2016</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2015") selected @endif value="2015">2015</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2014") selected @endif value="2014">2014</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2013") selected @endif value="2013">2013</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2012") selected @endif value="2012">2012</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2011") selected @endif value="2011">2011</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2010") selected @endif value="2010">2010</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2009") selected @endif value="2009">2009</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2008") selected @endif value="2008">2008</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2007") selected @endif value="2007">2007</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2006") selected @endif value="2006">2006</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2005") selected @endif value="2005">2005</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2004") selected @endif value="2004">2004</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2003") selected @endif value="2003">2003</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2002") selected @endif value="2002">2002</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2001") selected @endif value="2001">2001</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "2000") selected @endif value="2000">2000</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1999") selected @endif value="1999">1999</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1998") selected @endif value="1998">1998</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1997") selected @endif value="1997">1997</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1996") selected @endif value="1996">1996</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1995") selected @endif value="1995">1995</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1994") selected @endif value="1994">1994</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1993") selected @endif value="1993">1993</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1992") selected @endif value="1992">1992</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1991") selected @endif value="1991">1991</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1990") selected @endif value="1990">1990</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1989") selected @endif value="1989">1989</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1988") selected @endif value="1988">1988</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1987") selected @endif value="1987">1987</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1986") selected @endif value="1986">1986</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1985") selected @endif value="1985">1985</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1984") selected @endif value="1984">1984</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1983") selected @endif value="1983">1983</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1982") selected @endif value="1982">1982</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1981") selected @endif value="1981">1981</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1980") selected @endif value="1980">1980</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1979") selected @endif value="1979">1979</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1978") selected @endif value="1978">1978</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1977") selected @endif value="1977">1977</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1976") selected @endif value="1976">1976</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1975") selected @endif value="1975">1975</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1974") selected @endif value="1974">1974</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1973") selected @endif value="1973">1973</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1972") selected @endif value="1972">1972</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "01") selected @endif value="1971">1971</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1970") selected @endif value="1970">1970</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1969") selected @endif value="1969">1969</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1968") selected @endif value="1968">1968</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1967") selected @endif value="1967">1967</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1966") selected @endif value="1966">1966</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1965") selected @endif value="1965">1965</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1964") selected @endif value="1964">1964</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1963") selected @endif value="1963">1963</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1962") selected @endif value="1962">1962</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1961") selected @endif value="1961">1961</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1960") selected @endif value="1960">1960</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1959") selected @endif value="1959">1959</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1958") selected @endif value="1958">1958</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1957") selected @endif value="1957">1957</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1956") selected @endif value="1956">1956</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1955") selected @endif value="1955">1955</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1954") selected @endif value="1954">1954</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1953") selected @endif value="1953">1953</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1952") selected @endif value="1952">1952</option>
                                                <!-- end ngRepeat: year in years -->
                                                <option @if(date('Y', strtotime($value->date_to)) == "1951") selected @endif value="1951">1951</option>
                                                <!-- end ngRepeat: year in years -->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="checkbox">
                                          <label>
                                          <input type="checkbox" class="currently_working" name="current_status" @if($value->current_status == "1") checked @endif value="1"> Currently studying
                                          <label class="control-label">(Required)</label>
                                          </label>
                                       </div>
                                    </div>
                                    <div class="control-label col-sm-3" style="text-align:initial">Start date</div>
                                    <div class="control-label col-sm-3" style="text-align:initial">End date</div>
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">Percentage</label>
                                 <div class="col-sm-4">
                                    <input type="number" class="form-control" placeholder="Percentage" name="percentage" value="{{$value->percentage}}">
                                    <!-- ngIf: interacted(profileEducation.percentage) -->
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">CGPA</label>
                                 <div class="col-sm-2">
                                    <input type="decimal" class="form-control" placeholder="CGPA" name="cgpa" value="{{$value->cgpa}}">
                                    <!-- ngIf: interacted(profileEducation.cgpa) -->
                                 </div>
                                 <div class="col-sm-2">
                                    <input type="decimal" class="form-control" placeholder="Max CGPA" name="max_cgpa" value="{{$value->max_cgpa}}">
                                    <!-- ngIf: interacted(profileEducation.cgpa) -->
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">Description</label>
                                 <div class="col-sm-4">
                                    <textarea placeholder="Description" name="description" class="form-control"></textarea>
                                 </div>
                              </div>
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              <div class="form-group form-group-sm">
                                 <div class="col-sm-8 col-sm-offset-4">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                                    <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </li>
                  @endforeach
                  <!-- foreach loop -->

               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-code"></i>
               Programming Languages
            </div>
            <div class="panel-body">
               <ul>
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_language')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add Languages
                     </a>
                  </li>
                  <li class="panel-block">
                     <!-- foreach start -->
                     <span class="pad-right-10">
                       <span class="tags">fgg</span>
                       <a href="#" class="no-underline">×</a>
                     </span>
                     <!-- foreach end -->
                  </li>
                  <li class="panel-block hidden" id="add_language">
                     <div class="form-inline">
                        <form name="profileLanguages" id="storeprofileLanguages" action="{{route('storeprofileLanguages')}}" method="post" style="display:inline">
                           {{csrf_field()}}
                           <input type="text" class="form-control" placeholder="add language" name="language_name" required="">
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           <button class="btn btn-sm btn-info" type="submit" disabled>Add</button>
                           <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_language')">Cancel</button>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-cubes"></i>
               Frameworks
            </div>
            <div class="panel-body">
               <ul>
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_framework')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add Frameworks
                     </a>
                  </li>

                  <li class="panel-block">
                    <!-- foreach start -->
                     <span class="pad-right-10">
                       <span class="tags">fgg</span>
                       <a href="#" class="no-underline">×</a>
                     </span>
                     <!-- foreach end -->
                  </li>

                  <li class="panel-block hidden" id="add_framework">
                     <div class="form-inline">
                        <form id="storeprofileFrameworks" action="{{route('storeprofileFrameworks')}}" name="profileFramework" style="display:inline" method="post">
                           {{csrf_field()}}
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           <input type="text" class="form-control" placeholder="Add Framework" name="framework_name" required="">
                          <button class="btn btn-sm btn-info" type="submit" disabled>Add</button>
                          <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_framework')">Cancel</button>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-suitcase"></i>
               Work Experience
            </div>
            <div class="panel-body">
               <ul class="ul_add">
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_work')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add a Work Experience
                     </a>
                  </li>
                  <li class="panel-block hidden" id="add_work">
                    <form class="form-horizontal" id="storeprofileWorkExperience" action="{{route('storeprofileWorkExperience')}}" method="post" name="profileWorkExperience">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Job Title*</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Job Title" name="job_title" required>
                           </div>
                           <div class="control-label" style="text-align:initial">(Required)</div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Company*</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Company" name="company" required>
                           </div>
                           <div class="control-label" style="text-align:initial">(Required)</div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Location</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Location" name="location">
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Duration*</label>
                           <div class="col-sm-8">
                              <div class="select-range-group">
                                 <div>
                                    <div class="input-group input-group-select">
                                       <select class="form-control" name="month_from">
                                          <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" name="year_from">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1974">1974</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <h5 class="text-align-center to_value">to</h5>
                                 <div class="to_date_value">
                                    <div class="input-group input-group-select">
                                       <select class="form-control" class="month_to" name="month_to">    <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" class="year_to" name="year_to">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option  value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option data-ng-repeat="year in years"  value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1974">1974</option>
                                          <!-- endngRepeat: year in years -->
                                          <option  value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option  value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <div class="checkbox">
                                    <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Description</label>
                           <div class="col-sm-4">
                              <textarea name="description" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Related Skills</label>
                           <div class="col-sm-8">
                              <div class="skill_info">

                              </div>
                              <div class="form-inline">
                                <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Add</button>
                              <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_work')">Cancel</button>
                           </div>
                        </div>
                     </form>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p>asd, as</p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>asd</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd
                              <span>, </span>
                            </span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="profileWorkExperience">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Job Title*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Job Title" name="job_title" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Company*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Company" name="company" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Location</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Location" name="location">
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Duration*</label>
                            <div class="col-sm-8">
                              <div class="select-range-group">
                                <div>
                                  <div class="input-group input-group-select">
                                    <select class="form-control" name="month_from">
                                      <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" name="year_from">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1974">1974</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <h5 class="text-align-center to_value">to</h5>
                                <div class="to_date_value">
                                  <div class="input-group input-group-select">
                                    <select class="form-control" class="month_to" name="month_to">    <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" class="year_to" name="year_to">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option  value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option data-ng-repeat="year in years"  value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1974">1974</option>
                                      <!-- endngRepeat: year in years -->
                                      <option  value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-4">
                              <textarea name="description" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Related Skills</label>
                            <div class="col-sm-8">
                              <div class="skill_info">

                              </div>
                              <div class="form-inline">
                                <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p>asd, as</p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>asd</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd
                              <span>, </span>
                            </span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="profileWorkExperience">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Job Title*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Job Title" name="job_title" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Company*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Company" name="company" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Location</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Location" name="location">
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Duration*</label>
                            <div class="col-sm-8">
                              <div class="select-range-group">
                                <div>
                                  <div class="input-group input-group-select">
                                    <select class="form-control" name="month_from">
                                      <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" name="year_from">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1974">1974</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <h5 class="text-align-center to_value">to</h5>
                                <div class="to_date_value">
                                  <div class="input-group input-group-select">
                                    <select class="form-control" class="month_to" name="month_to">    <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" class="year_to" name="year_to">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option  value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option data-ng-repeat="year in years"  value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1974">1974</option>
                                      <!-- endngRepeat: year in years -->
                                      <option  value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-4">
                              <textarea name="description" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Related Skills</label>
                            <div class="col-sm-8">
                              <div class="skill_info">

                              </div>
                              <div class="form-inline">
                                <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p>asd, as</p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>asd</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd
                              <span>, </span>
                            </span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="profileWorkExperience">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Job Title*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Job Title" name="job_title" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Company*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Company" name="company" required>
                            </div>
                            <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Location</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Location" name="location">
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Duration*</label>
                            <div class="col-sm-8">
                              <div class="select-range-group">
                                <div>
                                  <div class="input-group input-group-select">
                                    <select class="form-control" name="month_from">
                                      <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" name="year_from">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1974">1974</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <h5 class="text-align-center to_value">to</h5>
                                <div class="to_date_value">
                                  <div class="input-group input-group-select">
                                    <select class="form-control" class="month_to" name="month_to">    <option value="" disabled="" selected="">Month</option>
                                      <!-- ngRepeat: month in months -->
                                      <option value="01">Jan</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="02">Feb</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="03">Mar</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="04">Apr</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="05">May</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="06">Jun</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="07">Jul</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="08">Aug</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="09">Sep</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="10">Oct</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="11">Nov</option>
                                      <!-- end ngRepeat: month in months -->
                                      <option value="12">Dec</option>
                                      <!-- end ngRepeat: month in months -->
                                    </select>
                                    <select class="form-control" class="year_to" name="year_to">
                                      <option value="" disabled="" selected="">Year</option>
                                      <!-- ngRepeat: year in years -->
                                      <option  value="2020">2020</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2019">2019</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2018">2018</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2017">2017</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2016">2016</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2015">2015</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2014">2014</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2013">2013</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2012">2012</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2011">2011</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2010">2010</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2009">2009</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2008">2008</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2007">2007</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2006">2006</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2005">2005</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2004">2004</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2003">2003</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2002">2002</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2001">2001</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="2000">2000</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1999">1999</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1998">1998</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1997">1997</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1996">1996</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1995">1995</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1994">1994</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option data-ng-repeat="year in years"  value="1993">1993</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1992">1992</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1991">1991</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1990">1990</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1989">1989</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1988">1988</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1987">1987</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1986">1986</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1985">1985</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1984">1984</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1983">1983</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1982">1982</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1981">1981</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1980">1980</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1979">1979</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1978">1978</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1977">1977</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1976">1976</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1975">1975</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1974">1974</option>
                                      <!-- endngRepeat: year in years -->
                                      <option  value="1973">1973</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1972">1972</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1971">1971</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1970">1970</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1969">1969</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1968">1968</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1967">1967</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1966">1966</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1965">1965</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1964">1964</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1963">1963</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1962">1962</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1961">1961</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1960">1960</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1959">1959</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1958">1958</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1957">1957</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1956">1956</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1955">1955</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1954">1954</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1953">1953</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1952">1952</option>
                                      <!-- end ngRepeat: year in years -->
                                      <option  value="1951">1951</option>
                                      <!-- end ngRepeat: year in years -->
                                    </select>
                                  </div>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-4">
                              <textarea name="description" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="col-sm-4 control-label">Related Skills</label>
                            <div class="col-sm-8">
                              <div class="skill_info">

                              </div>
                              <div class="form-inline">
                                <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-pencil-square-o"></i>
               Projects
            </div>
            <div class="panel-body">
               <ul class="ul_add">
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_project')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add a Project
                     </a>
                  </li>
                  <li class="panel-block hidden" id="add_project">
                     <form class="form-horizontal" id="storeprofileProjectInfo" action="{{route('storeprofileProjectInfo')}}" method="post" name="profileProject">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Project Name*</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Project Name" name="project_name">
                           </div>
                           <div class="control-label" style="text-align:initial">(Required)</div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Project URL</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Project/related URL If any" name="project_url">
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Duration*</label>
                           <div class="col-sm-8">
                              <div class="select-range-group">
                                 <div>
                                    <div class="input-group input-group-select">
                                       <select class="form-control" name="month_from">
                                           <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" name="year_from">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1974">1974</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <h5 class="text-align-center to_value">to</h5>
                                 <div class="to_date_value">
                                    <div class="input-group input-group-select">
                                       <select class="form-control" class="month_to" name="month_to">
                                          <option value="" disabled="" selected="">Month</option>
                                          <!-- ngRepeat: month in months -->
                                          <option value="01">Jan</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="02">Feb</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="03">Mar</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="04">Apr</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="05">May</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="06">Jun</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="07">Jul</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="08">Aug</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="09">Sep</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="10">Oct</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="11">Nov</option>
                                          <!-- end ngRepeat: month in months -->
                                          <option value="12">Dec</option>
                                          <!-- end ngRepeat: month in months -->
                                       </select>
                                       <select class="form-control" class="year_to" name="year_to">
                                          <option value="" disabled="" selected="">Year</option>
                                          <!-- ngRepeat: year in years -->
                                          <option value="2020">2020</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2019">2019</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2018">2018</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2017">2017</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2016">2016</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2015">2015</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2014">2014</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2013">2013</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2012">2012</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2011">2011</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2010">2010</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2009">2009</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2008">2008</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2007">2007</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2006">2006</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2005">2005</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2004">2004</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2003">2003</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2002">2002</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2001">2001</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="2000">2000</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1999">1999</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1998">1998</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1997">1997</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1996">1996</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1995">1995</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1994">1994</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1993">1993</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1992">1992</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1991">1991</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1990">1990</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1989">1989</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1988">1988</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1987">1987</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1986">1986</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1985">1985</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1984">1984</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1983">1983</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1982">1982</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1981">1981</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1980">1980</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1979">1979</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1978">1978</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1977">1977</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1976">1976</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1975">1975</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1974">1974</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1973">1973</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1972">1972</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1971">1971</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1970">1970</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1969">1969</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1968">1968</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1967">1967</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1966">1966</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1965">1965</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1964">1964</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1963">1963</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1962">1962</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1961">1961</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1960">1960</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1959">1959</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1958">1958</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1957">1957</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1956">1956</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1955">1955</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1954">1954</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1953">1953</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1952">1952</option>
                                          <!-- end ngRepeat: year in years -->
                                          <option value="1951">1951</option>
                                          <!-- end ngRepeat: year in years -->
                                       </select>
                                    </div>
                                 </div>
                                 <div class="checkbox">
                                    <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Description</label>
                           <div class="col-sm-4">
                              <textarea name="description" class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <label class="col-sm-4 control-label">Related Skills</label>
                           <div class="col-sm-8">
                             <div class="skill_info">

                             </div>
                             <div class="form-inline">
                               <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                               <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                             </div>
                           </div>
                        </div>
                        <div class="form-group form-group-sm">
                           <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Add</button>
                              <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_project')">Cancel</button>
                           </div>
                        </div>
                     </form>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p><a href="http://adsd" target="_blank">http://adsd</a></p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd<span>, </span></span>
                            <span>asd<span></span></span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project Name*</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project Name" name="project_name">
                             </div>
                             <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project URL</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project/related URL If any" name="project_url">
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Duration*</label>
                             <div class="col-sm-8">
                                <div class="select-range-group">
                                   <div>
                                      <div class="input-group input-group-select">
                                         <select class="form-control" name="month_from">
                                             <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" name="year_from">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <h5 class="text-align-center to_value">to</h5>
                                   <div class="to_date_value">
                                      <div class="input-group input-group-select">
                                         <select class="form-control" class="month_to" name="month_to">
                                            <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" class="year_to" name="year_to">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <div class="checkbox">
                                      <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Description</label>
                             <div class="col-sm-4">
                                <textarea name="description" class="form-control"></textarea>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Related Skills</label>
                             <div class="col-sm-8">
                               <div class="skill_info">

                               </div>
                               <div class="form-inline">
                                 <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                 <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                               </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p><a href="http://adsd" target="_blank">http://adsd</a></p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd<span>, </span></span>
                            <span>asd<span></span></span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project Name*</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project Name" name="project_name">
                             </div>
                             <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project URL</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project/related URL If any" name="project_url">
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Duration*</label>
                             <div class="col-sm-8">
                                <div class="select-range-group">
                                   <div>
                                      <div class="input-group input-group-select">
                                         <select class="form-control" name="month_from">
                                             <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" name="year_from">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <h5 class="text-align-center to_value">to</h5>
                                   <div class="to_date_value">
                                      <div class="input-group input-group-select">
                                         <select class="form-control" class="month_to" name="month_to">
                                            <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" class="year_to" name="year_to">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <div class="checkbox">
                                      <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Description</label>
                             <div class="col-sm-4">
                                <textarea name="description" class="form-control"></textarea>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Related Skills</label>
                             <div class="col-sm-8">
                               <div class="skill_info">

                               </div>
                               <div class="form-inline">
                                 <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                 <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                               </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p><a href="http://adsd" target="_blank">http://adsd</a></p>
                          <p>Feb 2020 - Feb 2017</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd<span>, </span></span>
                            <span>asd<span></span></span>
                          </p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project Name*</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project Name" name="project_name">
                             </div>
                             <div class="control-label" style="text-align:initial">(Required)</div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Project URL</label>
                             <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Project/related URL If any" name="project_url">
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Duration*</label>
                             <div class="col-sm-8">
                                <div class="select-range-group">
                                   <div>
                                      <div class="input-group input-group-select">
                                         <select class="form-control" name="month_from">
                                             <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" name="year_from">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <h5 class="text-align-center to_value">to</h5>
                                   <div class="to_date_value">
                                      <div class="input-group input-group-select">
                                         <select class="form-control" class="month_to" name="month_to">
                                            <option value="" disabled="" selected="">Month</option>
                                            <!-- ngRepeat: month in months -->
                                            <option value="01">Jan</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="02">Feb</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="03">Mar</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="04">Apr</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="05">May</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="06">Jun</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="07">Jul</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="08">Aug</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="09">Sep</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="10">Oct</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="11">Nov</option>
                                            <!-- end ngRepeat: month in months -->
                                            <option value="12">Dec</option>
                                            <!-- end ngRepeat: month in months -->
                                         </select>
                                         <select class="form-control" class="year_to" name="year_to">
                                            <option value="" disabled="" selected="">Year</option>
                                            <!-- ngRepeat: year in years -->
                                            <option value="2020">2020</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2019">2019</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2018">2018</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2017">2017</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2016">2016</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2015">2015</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2014">2014</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2013">2013</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2012">2012</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2011">2011</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2010">2010</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2009">2009</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2008">2008</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2007">2007</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2006">2006</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2005">2005</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2004">2004</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2003">2003</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2002">2002</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2001">2001</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="2000">2000</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1999">1999</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1998">1998</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1997">1997</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1996">1996</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1995">1995</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1994">1994</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1993">1993</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1992">1992</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1991">1991</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1990">1990</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1989">1989</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1988">1988</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1987">1987</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1986">1986</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1985">1985</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1984">1984</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1983">1983</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1982">1982</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1981">1981</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1980">1980</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1979">1979</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1978">1978</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1977">1977</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1976">1976</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1975">1975</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1974">1974</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1973">1973</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1972">1972</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1971">1971</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1970">1970</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1969">1969</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1968">1968</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1967">1967</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1966">1966</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1965">1965</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1964">1964</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1963">1963</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1962">1962</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1961">1961</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1960">1960</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1959">1959</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1958">1958</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1957">1957</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1956">1956</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1955">1955</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1954">1954</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1953">1953</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1952">1952</option>
                                            <!-- end ngRepeat: year in years -->
                                            <option value="1951">1951</option>
                                            <!-- end ngRepeat: year in years -->
                                         </select>
                                      </div>
                                   </div>
                                   <div class="checkbox">
                                      <label><input type="checkbox" class="currently_working" name="current_status"> Currently working</label>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Description</label>
                             <div class="col-sm-4">
                                <textarea name="description" class="form-control"></textarea>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                             <label class="col-sm-4 control-label">Related Skills</label>
                             <div class="col-sm-8">
                               <div class="skill_info">

                               </div>
                               <div class="form-inline">
                                 <input type="text" class="form-control" placeholder="add related skills" name="newRelatedSkill">
                                 <button type="button" class="btn btn-sm btn-info add_skill" disabled="disabled">Add skills</button>
                               </div>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                              <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-file-text"></i>
               Publications
            </div>
            <div class="panel-body">
               <ul class="ul_add">
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_public')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add a Publication
                     </a>
                  </li>
                  <li class="panel-block hidden" id="add_public">
                     <form name="profilePublication" id="storeprofilePublications" action="{{route('storeprofilePublications')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div>
                           <div class="form-horizontal">
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">Title*</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Title" name="title">
                                 </div>
                                 <div class="control-label" style="text-align:initial">(Required)</div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="col-sm-4 control-label">URL*</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="URL" name="url">
                                 </div>
                                 <div class="control-label" style="text-align:initial">(Required)</div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <div class="col-sm-offset-4 col-sm-8">
                                    <button class="btn btn-sm btn-primary" type="submit">Add</button>
                                    <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_public')">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p><a href="http://adsd" target="_blank">http://adsd</a></p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-horizontal">
                                <div class="form-group form-group-sm">
                                   <label class="col-sm-4 control-label">Title*</label>
                                   <div class="col-sm-4">
                                      <input type="text" class="form-control" placeholder="Title" name="title">
                                   </div>
                                   <div class="control-label" style="text-align:initial">(Required)</div>
                                </div>
                                <div class="form-group form-group-sm">
                                   <label class="col-sm-4 control-label">URL*</label>
                                   <div class="col-sm-4">
                                      <input type="text" class="form-control" placeholder="URL" name="url">
                                   </div>
                                   <div class="control-label" style="text-align:initial">(Required)</div>
                                </div>
                                <div class="form-group form-group-sm">
                                   <div class="col-sm-offset-4 col-sm-8">
                                      <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                                      <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                                   </div>
                                </div>
                             </div>
                        </form>
                      </div>
                    </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-certificate"></i>
               Achievements
            </div>
            <div class="panel-body">
               <ul class="">
                  <li class="panel-block">
                     <a class="add-entry-link" onclick="functionAddTag('add_acheive')">
                     <span class="wrap-plus"><i class="fa fa-plus"></i></span>
                     Add an Achievement
                     </a>
                  </li>
                  <li class="panel-block hidden" id="add_acheive">
                     <form name="profileAchievements" id="storeprofileAchievements" action="{{route('storeprofileAchievements')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-horizontal">
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Title*</label>
                              <div class="col-sm-4">
                                 <input type="text" placeholder="Title" class="form-control" name="title">
                                 <!-- ngIf: interacted(profileAchievements.title) -->
                              </div>
                              <div class="control-label" style="text-align:initial">(Required)</div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Description*</label>
                              <div class="col-sm-4">
                                 <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                 <!-- ngIf: interacted(profileAchievements.description) -->
                              </div>
                              <div class="control-label" style="text-align:initial">(Required)</div>
                           </div>
                           <div class="form-group form-group-sm">
                              <div class="col-sm-offset-4 col-sm-8">
                                 <button class="btn btn-sm btn-primary" type="submit">Add</button>
                                 <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_acheive')">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </li>
                  <li class="panel-block">
                    <div class="row">
                      <div class="education_list_data">
                        <div class="col-xs-8">
                          <h3>asd</h3>
                          <p>asdghasd</p>
                        </div>
                        <div class="col-xs-4">
                          <ul class="nav-links navbar-nav navbar-right">
                            <li><a href="">Move up</a></li>
                            <li><a href="">Move down</a></li>
                            <li>
                              <a href="javascript://" class="dropdown-toggle" data-toggle="dropdown">
                                Options
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="edit_education_list">Edit</a></li>
                                <li><a href="">Delete</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12 education_list_form hidden">
                        <form class="form-horizontal" action="" method="post" name="">
                          {{csrf_field()}}
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="form-horizontal">
                             <div class="form-group form-group-sm">
                                <label class="col-sm-4 control-label">Title*</label>
                                <div class="col-sm-4">
                                   <input type="text" placeholder="Title" class="form-control" name="title">
                                </div>
                                <div class="control-label" style="text-align:initial">(Required)</div>
                             </div>
                             <div class="form-group form-group-sm">
                                <label class="col-sm-4 control-label">Description*</label>
                                <div class="col-sm-4">
                                   <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="control-label" style="text-align:initial">(Required)</div>
                             </div>
                             <div class="form-group form-group-sm">
                                <div class="col-sm-offset-4 col-sm-8">
                                   <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                                   <button type="button" class="btn btn-sm btn-default cancel_education_list_form">Cancel</button>
                                </div>
                             </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="panel panel-special">
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-link"></i>
               My Connections
            </div>
            <div class="panel-body">
               <ul class="">
                  <li class="panel-block">
                     <span class="link_url_edit" onclick="functionAddTag('add_connect')">
                     <i class="fa fa-pencil-square-o"></i> Edit Connections
                   </span>
                  </li>
                  <li class="panel-block hidden" id="add_connect">
                     <div>
                        <form class="form-horizontal" name="profileLinks" id="storeprofileConnections" action="{{route('storeprofileConnections')}}" method="post">
                           {{csrf_field()}}
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">LinkedIn URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-linkedin-square"></i></div>
                                    <input type="text" class="form-control" name="linkedin_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Facebook URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-facebook-official"></i></div>
                                    <input type="text" class="form-control" name="facebook_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Github URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-github"></i></div>
                                    <input type="text" class="form-control" name="github_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Twitter URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                                    <input type="text" class="form-control" name="twitter_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Blog URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input type="text" class="form-control" name="blog_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="col-sm-4 control-label">Website URL</label>
                              <div class="col-sm-4">
                                 <div class="input-group input-group-sm f_group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input type="text" class="form-control" name="website_url">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm f_group">
                              <div class="col-sm-offset-4 col-sm-8 f_save">
                                 <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                                 <button type="button" class="btn btn-sm btn-default" onclick="functionCloseTag('add_connect')">Cancel</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </li>
                  <li class="panel-block">
                     <div class="row">
                        <div class="col-xs-2">
                           LinkedIn
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-linkedin-square"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-2">
                           Facebook
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-facebook-official"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-2">
                           Github
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-github"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-2">
                           Twitter
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-twitter"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-2">
                           Website URL
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-info-circle"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-2">
                           Blog URL
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-info-circle"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">https://codeground.in//code4/#/profile</a>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@include('candidate.partials.footer')
