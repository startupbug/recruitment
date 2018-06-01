@include('candidate.partials.header')
<div class="container">
   <div class="my-test-doc">
      <div class="text-center">Must read before starting test <i class="fa fa-long-arrow-right"></i>
         <a target="_blank" href="https://helpcenter.codeground.in/?ht_kb=things-to-know-before-attempting-the-test">Learn
         how your code will be evaluated</a> and
         <a href="https://helpcenter.codeground.in/?page_id=871" target="_blank">
         Utility codes for quick start during test</a>
      </div>
   </div>
   <div class="text-info">You are not assigned to any test.</div>
   <div class="row">
      <div class="pageTitle">My Tests
         <a href="" style="float:right;" data-toggle="modal" data-target="#create-test-template-Modal">
         <span uib-tooltip="Click to check your system health" class="img-icon img-icon-sysHealth" ></span>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid padding-15-fluid">
         <ul class="nav nav-tabs">
            <li class="active">
               <a data-toggle="pill" href="#home">
                  Invitations ({{$count}})
                  <div class="s_click_popup">
                     <i class="fa fa-info-circle" data-toggle="tooltip" title="Click Me" tooltip-trigger="outsideClick"> </i>
                     <span class="s_click_popuptext f_popup">
                     <b>This tab-view lists the created tests.</b> <br><br>
                     <b>Good to know: </b>
                     All tests are accompanied with test opening and closing time and hence, they can be pre-scheduled.
                     </span>
                  </div>
               </a>
            </li>
         </ul>
         <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
               <div class="view_filter_right">
                  <!-- <i class="fa fa-filter" data-toggle="modal" name="hosted_test" data-target="#filter_view123"></i> -->
               </div>
               <!-- start foreach loop -->
               @foreach($info as $key => $value)
               <section class="tab_nav accordion-toggle" data-toggle="collapse"
                  data-parent="#accordion" data-target="#collapse_livecode{{$key}}" aria-expanded="false">
                  <div class="row main_tab">
                     <div class="col-md-6">
                        <div class="left_tab">
                           <ul>
                              <li>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#collapse_livecode{{$key}}" aria-expanded="false">
                                 <span class="fa fa-caret-right"></span>
                                 </a>
                              </li>                           
                           <?php
                           $todaydate = new DateTime();
                           $todaydate = $todaydate->format('Y-m-d');
                           $expired_status=false;
                           $live_status=false;
                           ?>
                           <!-- expire
                           agr status 2 hai toh expire
                           test opening date  and closing date end hoschuki hai
                           
                           live
                           agr open hai r close nh toh -->
                           @if($value->status == 2)
                           <li>Expired (terminated)</li>
                           <?php $expired_status=true;  ?>
                           @elseif(strtotime($todaydate) > strtotime(date('Y-m-d',strtotime($value->test_close_date))))
                           <li>Expired</li>
                           <?php $expired_status=true;   ?>
                           @elseif(strtotime($todaydate) >= strtotime(date('Y-m-d',strtotime($value->test_open_date))) && strtotime($todaydate) < strtotime(date('Y-m-d',strtotime($value->test_close_date))))
                           <li>Live</li>
                           <?php $live_status=true;  ?>
                           @endif
                           <li>{{$value->host_name}}</li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="right_tab">
                           <ul>
                              <!-- <li><a href="#">Invite Candidates</a></li> -->
                              <li><a href="#">Start Test</a></li>
                              <!--  <li>Report</li> -->
                              <!-- <li> -->
                                 <!-- <div class="dropdown"> -->
                                    <!-- <button type="button" id="dropdownMenu2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> -->
                                    <!-- More -->
                                    <!-- <span class="caret"></span> -->
                                    <!-- </button> -->
                                    <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> -->
                                       <!-- <li><a href="#">View Invited Candidates</a></li> -->
                                       <!-- <li><a href="#" target="blank">Preview Public Test Page</a></li> -->
                                       <!-- <li><a href="#" target="blank">View subscribed candidates</a></li> -->
                                       <!-- <li><a href="#"  class="preview_test_page_btn">Preview Test</a></li> -->
                                       <!-- <li><a class="deleteConfirm" >Delete Test</a></li> -->
                                       <!-- <li><a class="deleteConfirm" >Terminate</a></li> -->
                                       <!-- <li role="separator" class="divider"></li> -->
                                       <!-- <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                          ">Setup Manual Evaluation</a></li> -->
                                    <!-- </ul> -->
                                 <!-- </div> -->
                              <!-- </li> -->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="row border_view">
               <div id="collapse_livecode{{$key}}" class="panel-collapse collapse">
                  <div class="col-md-12">
                     <p class="view_content">Webcam : required</p>
                  </div>
                 <!--  <div class="col-md-3">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Candidate attempts <i class="fa fa-sync"></i></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <span>Candidates attempted</span>
                                 <span class="pull-right margin_25">
                                 <span class="margin_25">:</span>
                                 1
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <span>Candidates attempting</span>
                                 <span class="pull-right margin_25">
                                 <span class="margin_25">:</span>
                                 0
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <span>Candidates passed</span>
                                 <span class="pull-right margin_25">
                                 <span class="margin_25">:</span>
                                 0
                                 </span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div> -->
                  <div class="col-md-4">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Timings</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <span>Starts at</span>
                                 <span class="pull-right margin_23">
                                    <span class="margin_25">:</span>
                                    <!--  Tue, Feb 6, 8:42 AM, CAST -->
                                    {{ date("F jS, Y H:i", strtotime($value->test_open_date)) }}
                                    {{ $value->test_open_time }}
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td><span>Ends at  </span>
                                 <span class="pull-right margin_25">
                                 <span class="margin_25">:</span>
                                 {{ date("F jS, Y H:i", strtotime($value->test_close_date)) }}
                                 {{ $value->test_close_time }} </span>
                              </td>
                           </tr>
                           <tr>
                              <td><span>Duration</span>
                                 <!-- <?php
                                    $to_time = date("H:i:s",strtotime($value->test_open_date));
                                    $from_time = date("H:i:s",strtotime($value->test_close_date) );
                                    
                                    $datetime1 = new DateTime($to_time." ".$value->test_open_time);
                                    $datetime2 = new DateTime($from_time." ".$value->test_close_time);
                                    $interval = $datetime1->diff($datetime2);
                                    
                                    ?> -->
                                 <span class="pull-right margin_22">
                                 <span class="margin_29">:</span>
                                 <!-- <?php echo $interval->format('%hh %im');?></span> -->
                                 {{$value->duration}}
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-2">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Scoring</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><span>Total Score</span>
                                 <span class="pull-right margin_20">
                                 <span class="margin_25">:</span>
                                 132</span>
                              </td>
                           </tr>
                           <tr>
                              <td><span>Cut-off Score</span>
                                 <span class="pull-right margin_20">
                                 <span class="margin_25">:</span>
                                 {{$value->cut_off_marks}}</span>
                              </td>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-3">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Sections</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Section1   2 Coding / 8 MCQ (90min)</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
               </section>
               @endforeach()
               <!-- end foreach loop -->
            </div>
         </div>
      </div>
   </div>
</div>
@include('candidate.partials.footer')