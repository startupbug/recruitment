@include('candidate.partials.header')
<div>
   <div class="user-profile page-header">
      <div class="personal-info" style="margin-top:10px">
         <div class="container">
            <div class="profile-pic">
               @if(!empty(Auth::user()->profile->profile_pic) && isset(Auth::user()->profile->profile_pic))
               <img class="img-circle" src="{{asset('public/storage/profile-pictures/' . Auth::user()->profile->profile_pic)}}">
               @else
               <img alt="" class="img-circle" src="{{asset('public/storage/profile-pictures/abc.jpg')}}">
               @endif
            </div>
            <div class="user-info">
               <div class="row">
                  <div class="col-xs-9">
                    <p>Candidate</p>
                    <p><span>Male</span>, <span>24</span></p>
                    <p>sample address</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="detailed-info container">
         <div class="panel panel-special">
            <a id="educationAnchor" style="display: block;position: relative;top: -100px;"></a>
            <div class="panel-heading panel-heading-no-hover">
               <i class="fa fa-graduation-cap"></i>
               Education
            </div>
            <div class="panel-body">
               <ul class="ul_add" id="ul_add_education">
                  <!-- foreach loop -->
                  @foreach($Candidate_education_info as $value)
                  <li class="panel-block">
                     <div class="row">
                       <div class="col-xs-8">
                          <span>
                             <h4><strong>{{$value->qualification}}</strong></h4>
                             {{$value->school}}
                          </span>
                          @if($value->current_status == 1)
                          <p>{{date('M-Y', strtotime($value->date_from))}} - Current</p>
                          @else
                          <p>{{date('M-Y', strtotime($value->date_from))}} - {{date('M-Y', strtotime($value->date_to))}} </p>
                          @endif
                          <p><strong>CGPA: </strong>{{$value->cgpa}} </p>
                          <p><strong>Percentage: </strong>{{$value->percentage}}%</p>
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
                     @foreach($Candidate_language_info as $value)
                     <span class="pad-right-10">
                       <span class="tags">{{$value->language_name}}</span>
                       <a href="" class="no-underline">x</a>                     
                     </span>
                     @endforeach()
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
                    @foreach($Candidate_framework_info as $value)
                      <span class="pad-right-10">
                          <span class="tags">{{$value->framework_name}}</span>
                         <a href="#" class="no-underline">×</a>
                      </span>
                    @endforeach()                    
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
                 @foreach($Candidate_work_info as $value)
                  <li class="panel-block">
                    <div class="row">
                       <div class="col-xs-8">
                          <h3>{{$value->job_title}}</h3>
                          <p>{{$value->company}}, {{$value->location}}</p>
                          @if($value->current_status == 1)
                          <p>{{date('M-Y', strtotime($value->date_from))}} - Current</p>
                          @else
                          <p>{{date('M-Y', strtotime($value->date_from))}} - {{date('M-Y', strtotime($value->date_to))}} </p>
                          @endif
                          <p>{{$value->description}}</p>
                          <p>
                            <strong>Skills:</strong>
                            <span>asd
                              <span>, </span>
                            </span>
                          </p>
                        </div>
                    </div>
                  </li>
                  @endforeach
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
                @foreach($Candidate_project_info as $value)
                  <li class="panel-block">
                    <div class="row">
                      <div class="col-xs-8">
                          <h3>{{$value->project_name}}</h3>
                          <p><a href="http://adsd" target="_blank">{{$value->project_url}}</a></p>
                          @if($value->current_status == 1)
                          <p>{{date('M-Y', strtotime($value->date_from))}} - Current</p>
                          @else
                          <p>{{date('M-Y', strtotime($value->date_from))}} - {{date('M-Y', strtotime($value->date_to))}} </p>
                          @endif
                          <p>
                            <strong>Skills:</strong>
                            <span>asd<span>, </span></span>
                            <span>asd<span></span></span>
                          </p>
                        </div>
                    </div>
                  </li>
                @endforeach
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
                 @foreach($Candidate_publication as $value)
                  <li class="panel-block">
                    <div class="row">
                      <div class="col-xs-8">
                        <h3>{{$value->title}}</h3>
                          <p><a href="{{$value->url}}" target="_blank">{{$value->url}}</a></p>
                      </div>
                    </div>
                  </li>
                  @endforeach()
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
                @foreach($Candidate_achievement as $value)
                  <li class="panel-block">
                    <div class="row">
                      <div class="col-xs-8">
                        <h3>{{$value->title}}</h3>
                        <p>{{$value->description}}</p>
                      </div>
                    </div>
                  </li>
                @endforeach
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
                     @if(isset($Candidate_connection['linkedin_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           LinkedIn
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-linkedin-square"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['linkedin_url']}}</a>
                        </div>
                     </div>
                     @endif
                     @if(isset($Candidate_connection['facebook_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           Facebook
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-facebook-official"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['facebook_url']}}</a>
                        </div>
                     </div>
                     @endif
                     @if(isset($Candidate_connection['github_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           Github
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-github"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['github_url']}}</a>
                        </div>
                     </div>
                     @endif
                     @if(isset($Candidate_connection['twitter_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           Twitter
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-twitter"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['twitter_url']}}</a>
                        </div>
                     </div>
                     @endif
                     @if(isset($Candidate_connection['website_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           Website URL
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-info-circle"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['website_url']}}</a>
                        </div>
                     </div>
                     @endif
                     @if(isset($Candidate_connection['website_url']))
                     <div class="row">
                        <div class="col-xs-2">
                           Blog URL
                        </div>
                        <div class="col-xs-1 text-align-right">
                           <i class="fa fa-info-circle"></i>
                        </div>
                        <div class="col-xs-9">
                           <a href="#" target="_blank">{{$Candidate_connection['website_url']}}</a>
                        </div>
                     </div>
                     @endif
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@include('candidate.partials.footer')
