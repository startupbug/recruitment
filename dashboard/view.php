<?php require_once '../master/header.php';?>
<section class="view">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="button_view"><span class="glyphicon glyphicon-plus"></span>

               <button type="button" class="btn" data-toggle="modal" data-target="#create-test-template-Modal">Create a Test Template</button></div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="pill" href="#home">Test Hosted (1)<i class="fa fa-info-circle"></i></a></li>
      <li><a data-toggle="pill" href="#testemplate">Test Templates (6)<i class="fa fa-info-circle"></i></a></li>
   </ul>
   <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
         <div class="view_filter_right"><i class="fa fa-filter" data-toggle="modal" data-target="#filter_view"></i></div>
         <section class="tab_nav">
            <div class="row main_tab">
               <div class="col-md-6">
                  <div class="left_tab">
                     <ul>
                        <li>
                           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_livecode" aria-expanded="false">
                              <span class="fa fa-caret-right"></span>
                           </a>
                        </li>
                        <li>Live</li>
                        <li>Java Coding(Try)</li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="right_tab">
                     <ul>
                        <li><a href="#">Invite Candidates</a></li>
                        <li>Edit</li>
                        <li>Report</li>
                        <li>
                           <div class="dropdown">
                              <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                             More
                              <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                 <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                 <li><a href="#">Preview Test</a></li>
                                 <li><a href="#">Delete Test</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                    ">Setup Manual Evaluation</a></li>
                              </ul>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row border_view">
               <div id="collapse_livecode" class="panel-collapse collapse">
                  <div class="col-md-12">
                     <p class="view_content">Webcam : required</p>
                  </div>
                  <div class="col-md-3">
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
                  </div>
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
                                 Tue, Feb 6, 8:42 AM, CAST
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td><span>Ends at  </span>
                                 <span class="pull-right margin_25">
                                 <span class="margin_25">:</span>
                                 Tue, Feb 20, 8:39 AM, CAST</span>
                              </td>
                           </tr>
                           <tr>
                              <td><span>Duration</span>
                                 <span class="pull-right margin_22">
                                 <span class="margin_25">:</span>
                                 1 hour 30 minutes</span>
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
                                 106</span>
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
      </div>
      <div id="testemplate" class="tab-pane fade">
        <div class="col-md-12 s_testtemplate_border">

          <section class="tab_nav">
             <div class="row main_tab">
                <div class="col-md-6">
                   <div class="left_tab">
                      <ul>
                         <li>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template1" aria-expanded="false">
                               <span class="fa fa-caret-right"></span>
                            </a>
                         </li>
                         <li>Live</li>
                         <li>Java Coding(Try)</li>
                      </ul>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="right_tab">
                      <ul>
                         <li><a href="#">Invite Candidates</a></li>
                         <li>Edit</li>
                         <li>Report</li>
                         <li>
                            <div class="dropdown">
                               <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              More
                               <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                  <li><a href="#">Preview Test</a></li>
                                  <li><a href="#">Delete Test</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                     ">Setup Manual Evaluation</a></li>
                               </ul>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="row border_view">
                <div id="template1" class="panel-collapse collapse">
                   <div class="col-md-12">
                      <p class="view_content">Webcam : required</p>
                   </div>
                   <div class="col-md-3">
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
                   </div>
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
                                  Tue, Feb 6, 8:42 AM, CAST
                                  </span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Ends at  </span>
                                  <span class="pull-right margin_25">
                                  <span class="margin_25">:</span>
                                  Tue, Feb 20, 8:39 AM, CAST</span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Duration</span>
                                  <span class="pull-right margin_22">
                                  <span class="margin_25">:</span>
                                  1 hour 30 minutes</span>
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
                                  106</span>
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
          <section class="tab_nav">
             <div class="row main_tab">
                <div class="col-md-6">
                   <div class="left_tab">
                      <ul>
                         <li>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template2" aria-expanded="false">
                               <span class="fa fa-caret-right"></span>
                            </a>
                         </li>
                         <li>Live</li>
                         <li>Java Coding(Try)</li>
                      </ul>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="right_tab">
                      <ul>
                         <li><a href="#">Invite Candidates</a></li>
                         <li>Edit</li>
                         <li>Report</li>
                         <li>
                            <div class="dropdown">
                               <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              More
                               <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                  <li><a href="#">Preview Test</a></li>
                                  <li><a href="#">Delete Test</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                     ">Setup Manual Evaluation</a></li>
                               </ul>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="row border_view">
                <div id="template2" class="panel-collapse collapse">
                   <div class="col-md-12">
                      <p class="view_content">Webcam : required</p>
                   </div>
                   <div class="col-md-3">
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
                   </div>
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
                                  Tue, Feb 6, 8:42 AM, CAST
                                  </span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Ends at  </span>
                                  <span class="pull-right margin_25">
                                  <span class="margin_25">:</span>
                                  Tue, Feb 20, 8:39 AM, CAST</span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Duration</span>
                                  <span class="pull-right margin_22">
                                  <span class="margin_25">:</span>
                                  1 hour 30 minutes</span>
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
                                  106</span>
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
          <section class="tab_nav">
             <div class="row main_tab">
                <div class="col-md-6">
                   <div class="left_tab">
                      <ul>
                         <li>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template3" aria-expanded="false">
                               <span class="fa fa-caret-right"></span>
                            </a>
                         </li>
                         <li>Live</li>
                         <li>Java Coding(Try)</li>
                      </ul>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="right_tab">
                      <ul>
                         <li><a href="#">Invite Candidates</a></li>
                         <li>Edit</li>
                         <li>Report</li>
                         <li>
                            <div class="dropdown">
                               <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              More
                               <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                  <li><a href="#">Preview Test</a></li>
                                  <li><a href="#">Delete Test</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                     ">Setup Manual Evaluation</a></li>
                               </ul>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="row border_view">
                <div id="template3" class="panel-collapse collapse">
                   <div class="col-md-12">
                      <p class="view_content">Webcam : required</p>
                   </div>
                   <div class="col-md-3">
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
                   </div>
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
                                  Tue, Feb 6, 8:42 AM, CAST
                                  </span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Ends at  </span>
                                  <span class="pull-right margin_25">
                                  <span class="margin_25">:</span>
                                  Tue, Feb 20, 8:39 AM, CAST</span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Duration</span>
                                  <span class="pull-right margin_22">
                                  <span class="margin_25">:</span>
                                  1 hour 30 minutes</span>
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
                                  106</span>
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
          <section class="tab_nav">
             <div class="row main_tab">
                <div class="col-md-6">
                   <div class="left_tab">
                      <ul>
                         <li>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template4" aria-expanded="false">
                               <span class="fa fa-caret-right"></span>
                            </a>
                         </li>
                         <li>Live</li>
                         <li>Java Coding(Try)</li>
                      </ul>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="right_tab">
                      <ul>
                         <li><a href="#">Invite Candidates</a></li>
                         <li>Edit</li>
                         <li>Report</li>
                         <li>
                            <div class="dropdown">
                               <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              More
                               <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                  <li><a href="#">Preview Test</a></li>
                                  <li><a href="#">Delete Test</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a href="#" data-toggle="modal" data-target="#setup_manual
                                     ">Setup Manual Evaluation</a></li>
                               </ul>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="row border_view">
                <div id="template4" class="panel-collapse collapse">
                   <div class="col-md-12">
                      <p class="view_content">Webcam : required</p>
                   </div>
                   <div class="col-md-3">
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
                   </div>
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
                                  Tue, Feb 6, 8:42 AM, CAST
                                  </span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Ends at  </span>
                                  <span class="pull-right margin_25">
                                  <span class="margin_25">:</span>
                                  Tue, Feb 20, 8:39 AM, CAST</span>
                               </td>
                            </tr>
                            <tr>
                               <td><span>Duration</span>
                                  <span class="pull-right margin_22">
                                  <span class="margin_25">:</span>
                                  1 hour 30 minutes</span>
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
                                  106</span>
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

        </div>
      </div>
   </div>
</div>
<?php require_once '../master/footer.php';?>
