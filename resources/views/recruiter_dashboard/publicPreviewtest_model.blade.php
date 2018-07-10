@extends('recruiter_dashboard.layouts.app')
@section('content')

<section class="test_question">

    <div class="container border_question bgImage">
      <div class="page-header ">
         <div class="instruction-page">
            <div class="instructionBox container">
               <div class="page-title">
                  <h3><strong>csmg667</strong></h3>
               </div>
               <div class="row">
                  <div class="col-sm-7" style="border-right: 1px solid #ddd">
                     <div class="row">
                        <span class="col-xs-2" style="font-weight:bold">Closes On</span>
                        <span class="col-xs-10">Tue, Jul 31, 4:40 PM, ADT</span>
                     </div>
                     <div class="row vertical-divider">
                        <span class="col-xs-2" style="font-weight:bold">Duration</span>
                        <span class="col-xs-10">  45 minutes  </span>
                     </div>
                     <hr>
                     <h4 style="font-weight:bold">Description : </h4>
                     <pagedown-viewer content="testDetails.description">
                        <p>This test is hosted via Codeground. Please read the instructions carefully before proceeding. </p>
                     </pagedown-viewer>
                     <hr>
                     <div class="row">
                        <div class="questions col-md-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 Sections
                              </div>
                              <div class="">
                                 <table class="table" style="margin-bottom : 0px">
                                    <tbody>
                                       <tr data-ng-repeat="timeBoxGroup in testDetails.timeBoxGroups" class="ng-scope">
                                          <td>
                                             <span>Section 1</span>
                                             (
                                             <span class="glyphicon glyphicon-modal-window abc_model" aria-hidden="true"></span>
                                             Window proctored
                                             |
                                             <span class="fa fa-forward" aria-hidden="true"></span>
                                             Attempt Once
                                             </span>
                                             )
                                             </span>
                                          </td>
                                          <td class="ng-binding">
                                            <span>1 Coding</span>
                                            <span>/ 1 MCQ</span>(15min)
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <h4 style="font-weight:bold">Instructions : </h4>
                     <pagedown-viewer content="testDetails.instructions">
                        <p>(1) Make sure you have a proper internet connection.</p>
                        <p>(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.</p>
                        <p>(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.</p>
                     </pagedown-viewer>
                  </div>
                  <div class="col-sm-5">
                     <div class="test-confirm">
                        <span>
                           <div>
                              <button class="btn btn-lg btn-block btn-primary"  data-toggle="modal" data-target="#createtemplate">
                                 <h2>Start Test</h2>
                              </button>
                           </div>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>

</section>


<div class="modal fade" id="createtemplate" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content filter">
         <div class="modal-header s_modal_form_header">
            <h3 class="modal-title s_font f_font"><i class="fa fa-laptop"></i> System Check</h3>
         </div>
         <div class="modal-body">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-4">
                  <div class="row" style="margin-bottom: 50px">
                      <div class="col-xs-6">
                          <div class="text-align-center" style="margin-top: 50px">
                              <h5>Browser</h5>
                              <h4 class="text-regular"><span class="fa fa-lg fa-chrome ng-scope"></span></h4>
                              <h5 class="text-regular">Chrome 67</h5>
                              <div class="text-success">
                                  <span class="fa fa-check"></span> Supported
                              </div>
                              <div class="text-danger">
                                  <span class="fa fa-times"></span> Not Supported
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="text-align-center" style="margin-top: 50px">
                              <h5>Camera</h5>
                              <h4 class="text-regular"><span class="fa fa-lg fa-video-camera"></span></h4>
                              <h5 class="text-regular">Required</h5>
                              <div>
                                  <div class="text-success">
                                      <span class="fa fa-check"></span> Found
                                  </div>
                                  <div class="text-danger">
                                      <span class="fa fa-times"></span> Not Found (<a href="">Retry</a>)
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

@endsection
