@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="view">
   @include('general_partials.error_section')
   <br>
   <div class="container-fluit padding-15-fluit">
      <div class="row s_margin_bottom">
         <div class="col-xs-8">
            <a href="{{route('manage_test_view')}}">
            <button type="submit" class="btn">Back</button>
            </a>
            <strong>Template: BPO Test - Recruitment</strong>
         </div>
         <div class="col-xs-2 col-xs-offset-2">
            <h4>
               <button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#_first_model">
               <i class="fa fa-check" aria-hidden="true"></i> Host this Test
               </button>
            </h4>
         </div>
      </div>
      <div class="row border-row display-table">
         <div class="col-md-2 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
            <ul class="nav nav-tabs nav-sidebar s_font_size">
               <li class="active"><a data-toggle="pill" href="#basic_detail"><i class="fa fa-th-list nav-icon" aria-hidden="true"></i> Basic Details </a></li>
               <li>
                  <a data-toggle="pill" href="#section_subject"><i class="fa fa-question-circle nav-icon" aria-hidden="true"></i> Sections</a>
                  <ul class="subtitle_subject">
                     @foreach($sections as $key => $value)
                     @php
                     $order = $value->order_number;
                     @endphp
                     <li>
                        <a data-toggle="pill" href="#section_subject-{{$value->id}}" >
                        <i class="fa fa-caret-right"></i>{{$value->section_name}}{{ ++$key }}
                        </a>
                        <div class="pull-right">
                           @if(!$loop->first)
                           <a href="{{route('move_up',['id'=>$value->id])}}">
                           <i class="fa fa-arrow-up" aria-hidden="true"></i>
                           </a>
                           @endif
                           @if(!$loop->last)
                           <a href="{{route('move_down',['id'=>$value->id])}}">
                           <i class="fa fa-arrow-down" aria-hidden="true"></i>
                           </a>
                           @endif
                           <a href="{{route('delete_section',['id'=>$value->id])}}" class="deleteConfirm" onclick="return confirm('Are You Sure To Delete This Section?')">
                           <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                           </a>
                        </div>
                     </li>
                     @endforeach
                     <form action="{{route('add_section')}}" id="add_section" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="order_value" value="
                        @if(isset($order))
                        {{ $order  }}
                        @endif
                        ">
                        <input type="hidden" name="template_id" value="{{$edit->id}}">
                        <button type="submit" class="btn btn-default" name="button"> + Add   Section
                        </button>
                     </form>
                  </ul>
               </li>
               <li><a data-toggle="pill" href="#section_setting"><i class="fa fa-cog nav-icon" aria-hidden="true"></i> Settings</a></li>
               <li><a data-toggle="pill" href="#section_public_page"><i class="fa fa-th nav-icon" aria-hidden="true"></i> Public Page View</a></li>
            </ul>
         </div>
         <div class="col-md-10 col-sm-12 col-xs-12 display-table-cell" style="padding-right:0px">
            <div class="tab-content sidebar-content s-over-flow">
               <!-- Start basic_detail -->
               <div id="basic_detail" class="tab-pane fade in active">
                  <div class="col-md-6 col-sm-12 col-xs-12 padding-0">
                     <form class="form-vertical" id="update_test_template" action="{{route('update_test_template',['id'=>$edit->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="template_type_id" value="{{$edit->template_type_id}}">
                        <div class="form-group">
                           <label class="control-label" for="title">
                              Title
                              <div class="s_popup">


                                 <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                                 <!--<span class="s_popuptext host_popup">
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 "http://www.markdowntutorial.com/
                                 </span>-->
                              </div>
                           </label>
                           <div>
                              <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$edit->title}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="description">
                              Description
                              <div class="s_popup">

                                   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                  This is the description of the test.<br>
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                                 <!--<i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext host_popup">
                                 This is the description of the test.<br>
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/
                                 </span>-->
                              </div>
                           </label>
                           <div id="edit_template_text_editor_description">
                              <textarea name="description" class='edit' style="margin-top: 30px;"placeholder="Type some text">
                                 @if(isset($edit->description)) {{$edit->description}} @endif
                              </textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="instructions">
                              Instructions
                              <div class="s_popup">

                                  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" type below the instructions for the test.<br>
                                 Good to know: the candidate can view this in the
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                                <!-- <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext host_popup">
                                 type below the instructions for the test.<br>
                                 Good to know: the candidate can view this in the
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/
                                 </span>-->
                              </div>
                           </label>
                           <div id="edit_template_text_editor_instruction">
                              <textarea class='edit' rows="8" cols="80" name="instruction">
                              @if(isset($edit->instruction)) {{$edit->instruction}}@endif
                              </textarea>
                           </div>
                        </div>
                        <button type="submit" class="btn f_btn" name="save_button">Save</button>
                     </form>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">Preview</div>
                        <div class="panel-body">
                          <h3 id="title_video"></h3>

                          <h4>Description</h4>
                          <div id="edit_template_text_editor_description_data"></div>

                          <h4>Instructions</h4>
                          <div id="edit_template_text_editor_instruction_data"></div>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- End basic_detail -->
               <!-- Start section_subject -->
               @foreach($sections_tabs as $key => $sec)
               <div id="section_subject-{{$key}}" class="tab-pane fade">
                  <div class="col-md-9 col-sm-12 col-xs-12 padding-0">
                     <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="pill" href="#sections-multiplechoice-{{$key}}">Multiple Choice ({{ $sec['count'] }})</a></li>
                        <li><a data-toggle="pill" href="#sections-coding-{{$key}}">
                        Coding ({{ $sec['count2'] }})

                        </a></li>
                        <li><a data-toggle="pill" href="#sections-submission-{{$key}}">Submission ({{ $sec['count3'] }})</a></li>
                        <li class="pull-right"></li>
                     </ul>
                     <div class="tab-content">
                        <div id="sections-multiplechoice-{{$key}}" class="tab-pane fade in active">
                           <form action="{{route('delete_all_mcqs_questions')}}" method="get">
                              <input type="hidden" name="section_mc_id[]" class="input_c_id"  id="section_mc_id">
                              <button type="submit" class="btn delete_section_mc hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" class="codeQuesCheck_prog_mc"></th>
                                       <th>#</th>
                                       <th>Statement</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($sec['ques1'] as $serial_number => $q)

                                    <!-- q is question type id=1   -->
                                     <tr>
                                          <td><input type="checkbox" name="prog" class="prog_mc" value="{{$q->id}}"></td>
                                          <td>{{++$serial_number}}</td>
                                          <td class="col-md-10 col-sm-12 col-xs-12">
                                             <div class="statement">
                                                <div class="row">
                                                   <!-- pass question id in modal -->
                                                   <div class="single-line-ellipsis">
                                                      <a href="#" onclick="modal_data({{$q->id}})" data-toggle="modal" data-target="#question_modal" class="no-underline">{{$q->question_statement}}</a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="description text-muted">
                                                <div class="row">
                                                   <div class="col-md-4 col-sm-12 col-xs-12">
                                                      <div class="row">
                                                         <div class="col-xs-6">
                                                            <span style="text-transform:capitalize;">
                                                            <i>{{$q->question_level['level_name']}}</i>
                                                            </span>
                                                         </div>
                                                         <div class="col-xs-6 no-padding-left">
                                                            <span class="text-muted">Marks</span>
                                                            <span class="conjunction">:</span>{{$q->question_detail['marks']}}
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                      <span class="text-muted">Tags : </span>
                                                      <span class="question-tags">{{$q->question_detail->question_tag['tag_name']}}</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <a id="delete_question" href="{{route('delete_question',['id'=>$q->id])}}" id="delete_question" >
                                             <i class="fa fa-times-circle text-danger"></i>
                                             </a>
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="4">
                                          <button type="button" class="btn" data-toggle="modal" data-target="#section-mcqs-Modal" onclick="edittesttemplate_Expand({{$key}}); ">
                                          <i class="fa fa-plus"></i> Add MCQ
                                          </button>
                                          <button type="button" class="btn" data-toggle="modal" data-target="#section-choice-mcqs-Modal">
                                          <i class="fa fa-book"></i> Choose MCQ From Library
                                          </button>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                        <div id="sections-coding-{{$key}}" class="tab-pane fade">
                           <form action="{{route('delete_all_coding_questions')}}" method="get">
                              <input type="hidden" name="section_c_id[]" class="input_c_id"  id="section_c_id">
                              <button type="submit" class="btn delete_section_c hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" name="" class="codeQuesCheck_prog_c"></th>
                                       <th>#</th>
                                       <th>Statementp</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($sec['ques2'] as $serial_number => $q)
                                    <!-- question type id = 2 -->
                                       <tr>
                                             <td><input type="checkbox"  class="prog_c" value="{{$q->id}}"></td>
                                             <td>{{++$serial_number}}</td>
                                             <td class="col-md-10 col-sm-12 col-xs-12">
                                                <div class="statement">
                                                   <div class="row">
                                                      <div class="single-line-ellipsis">
                                                          <a href="#" data-id="{{$q->id}}" data-url="{{route('coding_question_modal_partial_data')}}" data-toggle="modal" data-target="#coding_modal" class="no-underline coding_question_id" >{{$q->question_statement}}</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="description text-muted">
                                                   <div class="row">
                                                      <div class="col-md-4 col-sm-12 col-xs-12">
                                                         <div class="row">
                                                            <div class="col-xs-6">
                                                               <span style="text-transform:capitalize;">
                                                               <i>{{$q->question_level['level_name']}}</i>
                                                               </span>
                                                            </div>
                                                            <div class="col-xs-6 no-padding-left">
                                                               <span class="text-muted">Marks</span>
                                                               <span class="conjunction">:</span>{{$q->question_detail['marks']}}
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                         <span class="text-muted">Tags : </span>
                                                         <span class="question-tags">
                                                            @if(isset($q->question_detail->question_tag['tag_name']))
                                                               {{$q->question_detail->question_tag['tag_name']}}
                                                            @endif

                           </span>
                                                      </div>
                                                      </div>
                                                </div>
                                             </td>
                                             <td>
                                                <a id="delete_question" href="{{route('delete_question',['id'=>$q->id])}}" id="delete_question" >
                                                <i class="fa fa-times-circle text-danger"></i>
                                                </a>
                                             </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="4">
                                          <span class="select_combobox">
                                             <span class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                             <button class="btn s_dropdown_left_button">
                                             <span class="fa fa-plus"></span>
                                             Add Coding Question
                                             </button>
                                             <button class="btn s_dropdown_right_button">
                                             <span class="caret"></span>
                                             </button>
                                             </span>
                                             <ul class="dropdown-menu s_addquestion_dropdown_menu">
                                                <li>
                                                <a data-toggle="modal" onclick="section_id({{$key}}); code_edittesttemplate_Expand()" data-target="#section-coding-add-compilable-question-Modal">Add Compilable Question</a>
                                             </li>
                                                <li><a data-toggle="modal" onclick="section_id({{$key}}); code_debug_Expand()" data-target="#section-coding-debug-Modal">Add Debug Question</a></li>
                                             </ul>
                                          </span>
                                          <button type="button" class="btn" data-toggle="modal" data-target="#section-choice-debug-Modal">
                                          <i class="fa fa-book"></i> Choose Coding From Library
                                          </button>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                        <div id="sections-submission-{{$key}}" class="tab-pane fade">
                           <form action="{{route('delete_all_submission_questions')}}" method="get">
                              <input type="hidden" name="section_s_id[]" class="input_c_id" id="section_s_id">
                              <button type="submit" class="btn delete_section_s hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" class="codeQuesCheck_prog_s"></th>
                                       <th>#</th>
                                       <th>Statement</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($sec['ques3'] as $serial_number => $q)
                                    <tr>
                                       <td><input type="checkbox" class="prog_s" value="{{$q->id}}"></td>
                                       <td>{{++$serial_number}}</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" data-id="{{$q->id}}" data-url="{{route('submission_question_modal_partial_data')}}" data-toggle="modal" data-target="#submission_modal" class="no-underline submission_question_id">{{$q->question_statement}}</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>{{$q->question_level['level_name']}}</i></i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>{{$q->question_detail['marks']}}
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tagsvvvv : </span>
                                                   <span class="question-tags">
                                                      @if(isset($q->question_detail->question_tag['tag_name']))
                                                         {{$q->question_detail->question_tag['tag_name']}}
                                                      @endif
                                                   </span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                            <a id="delete_question" href="{{route('delete_question',['id'=>$q->id])}}" id="delete_question" >
                                                <i class="fa fa-times-circle text-danger"></i>
                                                </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="4">
                                          <span class="select_combobox">
                                             <span class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                             <button class="btn s_dropdown_left_button">
                                             <span class="fa fa-plus"></span>
                                             Add Submission Question
                                             </button>
                                             <button class="btn s_dropdown_right_button">
                                             <span class="caret"></span>
                                             </button>
                                             </span>
                                             <ul class="dropdown-menu s_addquestion_dropdown_menu">

                                                <li><a data-toggle="modal" onclick="section_id({{$key}}); submission_edittesttemplate_Expand();" data-target="#section-submission-question-Modal">Add Submission Question</a></li>
                                                <li><a data-toggle="modal" onclick="section_id({{$key}}); submission_fill_edittesttemplate_Expand();" data-target="#section-submission-fill-blanks-question-Modal">Add Fill In The Blanks Question</a></li>

                                             </ul>
                                          </span>
                                          <button type="button" class="btn" data-toggle="modal" data-target="#section-submission-fill-blanks-choice-Modal">
                                          <i class="fa fa-book"></i> Choose Submission From Library
                                          </button>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 ">
                     <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-th-large"></i> Section Summary</div>
                        <div class="panel-body">
                           <div class="clearfix">
                              <div class="row text-center s_small">
                                 <div class="col-xs-3">
                                    <small>Easy</small>
                                    <h4 class="no-margin strong ">6</h4>
                                 </div>
                                 <div class="col-xs-3 no-padding">
                                    <small>Medium</small>
                                    <h4 class="no-margin strong">5</h4>
                                 </div>
                                 <div class="col-xs-3">
                                    <small>Hard</small>
                                    <h4 class="no-margin strong">2</h4>
                                 </div>
                                 <div class="col-md-3 no-padding" style="border-left: 1px solid #ddd;">
                                    <small>Total Marks</small>
                                    <h4 class="no-margin strong">89</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-cog"></i> Section Settings</div>
                        <div class="panel-body">
                           <form class="form-horizontal text-left">
                              <div class="form-group form-group-sm">
                                 <label class="control-label f_label1 col-md-8 col-sm-8 col-xs-8">
                                    Window Proctoring


                                         <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="left" title=" This is a cheating prevention mechanism which<br>
                                       mandates the candidate to stay<br>
                                       Good to know: the candidate can view this in the
                                       instructions page before the test. <br>
                                       This is a markdown editor <br>
                                       Learning refrence:<br>
                                       http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a>
                                      <!-- <i class="fa fa-info-circle"> </i>
                                       <span class="s_popuptext">
                                       This is a cheating prevention mechanism which<br>
                                       mandates the candidate to stay<br>
                                       Good to know: the candidate can view this in the
                                       instructions page before the test. <br>
                                       This is a markdown editor <br>
                                       Learning refrence:<br>
                                       http://www.markdowntutorial.com/
                                       </span>-->

                                 </label>
                                 <div class="checkbox no-margin col-md-2 col-sm-2 col-xs-2">
                                    <input type="checkbox">
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="control-label col-md-8 col-sm-8 col-xs-8">
                                 Question Shuffling
                                 </label>
                                 <div class="checkbox no-margin col-md-2 col-sm-2 col-xs-2">
                                    <input type="checkbox">
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="control-label col-md-8 col-sm-8 col-xs-8">Duration (mins)</label>
                                 <div class="col-md-4 col-sm-4 col-xs-4">
                                    <input type="number" min="0" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group form-group-sm">
                                 <label class="control-label col-md-8 col-sm-8 col-xs-8">
                                 <a href="">Advanced Settings</a>
                                 </label>
                              </div>
                              <button type="button" class="btn btn-primary btn-sm">Save</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach()
               <div id="section_setting" class="tab-pane fade">
                  <div class="row">
                     <div class="col-md-2">
                        <ul class="s_setting_nav">
                           <li class="active">
                              <div class="setting_nav_border">
                                 <img src="{{asset('public/assets/img/testSettings.png')}}" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#test_setting">Test Settings</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="{{asset('public/assets/img/questionnair.png')}}" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#questionnaire">Questionnaire</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="{{asset('public/assets/img/contact.png')}}" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#contact_details">Contact Details</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="{{asset('public/assets/img/mailSettings.png')}}" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#mail_settings">Mail Settings</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="{{asset('public/assets/img/mailSettings.png')}}" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#mail_templates">Mail Templates</a>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-10">
                        <div id="test_setting" class="tab-pane fade in active">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Test Timings and Minimum Pass Percentage
                                 </strong>
                              </div>
                              <form class="form-horizontal" name="tSettings" id="templatetestSetting" action="{{route('templatetestSetting')}}" method="POST">
                                 {{csrf_field()}}
                                 <input type="hidden" name="template_id" value="{{$edit->id}}">
                                 <div class="panel-body s_panelBodyHeight">
                                       <div class="form-group form-group-sm">
                                          <label class="col-sm-3 control-label">
                                             Type of the test &nbsp;
                                             <div class="s_popup">
                                                <i class="fa fa-info-circle"> </i>
                                                <span class="s_popuptext">
                                                htmltooltip.editTesttemplateType
                                                </span>
                                             </div>
                                          </label>
                                          <div class="col-sm-9">
                                             <div class="row">
                                                <div class="col-sm-5">
                                                   <select name="test_template_types_id" id="test_template_types_id" class="form-control">
                                                      @foreach($test_setting_types as $value)
                                                      <option value="{{$value->id}}">{{$value->name}}</option>
                                                      @endforeach()
                                                   </select>
                                                </div>
                                             </div>
                                             <p id="test_template_types_id_help" class="help-block">This test will be open for all interested candidates</p>
                                          </div>
                                       </div>
                                       <div class="form-group form-group-sm">
                                          <label class="col-sm-3 control-label">
                                             Webcam &nbsp;
                                             <div class="s_popup">
                                                <i class="fa fa-info-circle"> </i>
                                                <span class="s_popuptext">
                                                This is a cheating prevention mechanism to
                                                <br>
                                                remotely monitor the candidates.How it works: This
                                                <br>
                                                capture a series of screenshots at regular intervals.
                                                </span>
                                             </div>
                                          </label>
                                          <div class="col-sm-9">
                                             <div class="row">
                                                <div class="col-sm-5">
                                                   <select name="webcam_id" id="webcam_id" class="form-control">
                                                      @foreach($test_setting_webcam as $value)
                                                      <option value="{{$value->id}}">{{$value->webcam_name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                             <p id="webcam_id_help" class="help-block">(If webcam is not found, then candidate will not be able to give the test. The candidate will be prompted to check for webcam)</p>
                                          </div>
                                       </div>
                                       <div class="form-group form-group-sm">
                                          <label class="col-sm-3 control-label">
                                             Candidate Resume &nbsp;
                                             <div class="s_popup">
                                                <i class="fa fa-info-circle"> </i>
                                                <span class="s_popuptext">
                                                This allows you to ask for a candidate's resume.<br>
                                                during the registration
                                                Good to know: you can <br>
                                                choose to make the resume submission mandatory
                                                </span>
                                             </div>
                                          </label>

                                          <div class="col-sm-9">
                                             <div class="checkbox">
                                                <label>
                                                <input type="checkbox" value="1"
                                                @if(isset($edit_test_settings->request_resume) && $edit_test_settings->request_resume == 1)
                                                   checked="checked" name="request_resume" id="request_resume" > Request Resume
                                                @endif
                                                </label>
                                             </div>
                                             <div class="checkbox">
                                                <label id="mandate_resume_label">
                                                <input >
                                                <input type="checkbox" value="1"
                                                @if(isset($edit_test_settings->mandate_resume) && $edit_test_settings->mandate_resume == 1)
                                                checked='checked'
                                                @endif
                                                name="mandatory_resume" id="mandate_resume">
                                                Mandate Resume
                                                </label>
                                               </div>
                                          </div>
                                       </div>
                                       <div>
                                       <!--    <div class="form-group form-group-sm">
                                             <label class="col-sm-3 control-label">
                                                Disable Finish Test Button &nbsp;
                                                <div class="s_popup">
                                                   <i class="fa fa-info-circle"> </i>
                                                   <span class="s_popuptext">
                                                   This allows you to ask for a candidate's resume.<br>
                                                   during the registration
                                                   Good to know: you can <br>
                                                   choose to make the resume submission mandatory
                                                   </span>
                                                </div>
                                             </label>
                                             <div class="col-sm-9">
                                                <div class="checkbox no-padding">
                                                   <label>
                                                   <input type="checkbox">
                                                   </label>
                                                </div>
                                             </div>
                                          </div> -->
                                       </div>
                                       <div class="form-group form-group-sm">
                                          <label class="col-sm-3 control-label">
                                             Enable Email Verification &nbsp;
                                             <div class="s_popup">
                                                <i class="fa fa-info-circle"> </i>
                                                <span class="s_popuptext">
                                                This allows you to ask for a candidate's resume.<br>
                                                during the registration
                                                Good to know: you can <br>
                                                choose to make the resume submission mandatory
                                                </span>
                                             </div>
                                          </label>
                                          <div class="col-sm-9">
                                             <div class="checkbox">
                                                <label>
                                                <input type="checkbox" value="1"
                                                   @if(isset($edit_test_settings))
                                                 @if(isset($edit_test_settings->email_verification) && $edit_test_settings->email_verification == 1) checked='checked' @endif @endif  name="email_verification" id="enable_verification">
                                                &nbsp;
                                                </label>
                                                <div
                                                 @if(isset($edit_test_settings->email_verification) && $edit_test_settings->email_verification == 1) class="help-block hidden" @else class="help-block hidden" @endif id="enable_verification_bloc">(The candidate will not be able to resume the test in case of system failure)</div>
                                                <div class="help-block hidden">(Email-id will always be verified for the login or invite only test)</div>
                                             </div>
                                          </div>
                                       </div>
                                 </div>
                                 <div class="clearfix panel-footer borderTop">
                                    <div class="col-sm-3 s_margin_bottom">
                                       <button type="submit" class="btn btn-sm">Save</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div id="questionnaire" class="tab-pane fade">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Questionnaire <i class="fa fa-info-circle"></i>
                                 </strong>
                              </div>
                              <div class="panel-body s_questionnaire_body s_panelBodyHeight">
                               <section id="setting_questionnaire_tab">
                                 <div class="form-group">
                                   <div class="checkbox">
                                     <label>
                                       <input type="checkbox" class="enable_questionaire"> Enable questionnaire
                                     </label>
                                   </div>
                                 </div>
                                 <div class="new_questionnaire hidden">
                                   <div class="form-group">
                                     <div class="checkbox">
                                       <label>
                                         <input type="checkbox"> Questionnaire to be filled before the test( candidate must fill the questionnaire to start attempting the test)
                                       </label>
                                     </div>
                                   </div>
                                   <hr>
                                   <div class="form-group form-group-sm">
                                     <div class="form-group form-group-sm">
                                       <div class="row">
                                         <div class="col-sm-4">
                                           <div class="dropdown">
                                             <button class="btn s_dropdown_ btn-default dropdown-toggle  btn-block" type="button" data-toggle="dropdown" id="newquestion" data-urlquestion="{{route('new_user_question_create')}}" data-url="{{route('Questionnaire_newquestion')}}">
                                               + New Question <span class="caret"></span>
                                             </button>
                                             <ul class="dropdown-menu s_drop_down btn-block new_question question_select" data-template_id="{{$edit->id}}">
                                               <li><a href="#"  data-id="0" data-question="Write own question"><strong>Write own question</strong></a></li>

                                               <li class="divider"></li>
                                               <li class="dropdown-header proLiHeader">Professional</li>

                                               <li class="divider"></li>
                                               <li class="dropdown-header acaLiHeader">Academics</li>
                                             </ul>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                     <h5><strong>Questions</strong></h5>
                                     <ul class="unordered-list">
                                       <li></li>

                                       @foreach ($template_question_setting as $t_q_s)
                                       <li class="questionBorder">
                                         <form action="{{route('new_user_question_create')}}" method="post">
                                           {{csrf_field()}}

                                           <div class="row" id="">
                                             <div class="col-xs-6 title">
                                               <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Mandatory Question (Edit to change)">
                                                 <small class="text-primary">
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                 </small>
                                               </a>
                                               <span class="separator transparent-border"></span>
                                               <span title="Help Text">{{$t_q_s->question}}</span>
                                             </div>
                                             <div class="col-xs-3 title">
                                               <span class="light-font">Text</span>
                                             </div>
                                             <div class="col-xs-3">
                                               <div class="pull-right">
                                                 <div class="btn-group">
                                                   <button class="btn btn-sm btn-link">
                                                       <span class="fa fa-arrow-up"></span>
                                                   </button>
                                                   <button class="btn btn-sm btn-link no-hover">
                                                       <span class="fa fa-arrow-up transparent-font"></span>
                                                   </button>
                                                   <button type="button" class="btn btn-sm btn-link edit_question" >
                                                       <span class="fa fa-pencil"></span>
                                                   </button>
                                                   <a href="{{route('delete_user_setting_question',['id'=>$t_q_s->id])}}" class="btn btn-sm btn-link text-danger">
                                                       <span class="fa fa-trash"></span>
                                                   </a>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                           <div class="form-horizontal hidden capsule">
                                             <div class="form-group form-group-sm">
                                               <label class="control-label col-sm-2">Question</label>
                                               <div class="col-sm-10">
                                                 <input type="text" name="question" class="form-control" value="{{$t_q_s->question}}" placeholder=" Eg: Enter your University name">
                                               </div>
                                             </div>
                                             <div class="form-group form-group-sm">
                                               <label class="control-label col-sm-2">Support text</label>
                                               <div class="col-sm-10">
                                                 <input type="text" name="support_text" class="form-control" value="{{$t_q_s->support_text}}" placeholder="Eg: Give the full form of your University">
                                               </div>
                                             </div>
                                             <div class="form-group form-group-sm">
                                               <label class="control-label col-sm-2">
                                                 Knock out
                                                 <i class="fa fa-info-circle"></i>
                                               </label>
                                               <div class="col-sm-10">
                                                 <div class="" >
                                                   <label class="control-label">
                                                     <input type="checkbox" name="knock_out" @if($t_q_s->knock_out == "1") checked @endif value="1" class="knockout_checkbox" style="top:4px">
                                                      Dont allow the candidate to take the test if the criteria does not meet
                                                   </label>
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="dropdown_format_menu">
                                               <div class="form-group form-group-sm">
                                                 <label class="control-label col-sm-2">Format</label>
                                                 <div class="col-sm-4">
                                                   <select class="form-control format_class" name="format_setting_id">
                                                     <option @if($t_q_s->format_setting_id == "1") selected @endif value="1">Number</option>
                                                     <option @if($t_q_s->format_setting_id == "2") selected @endif value="2">Text</option>
                                                     <option @if($t_q_s->format_setting_id == "3") selected @endif value="3">Text Area</option>
                                                     <option @if($t_q_s->format_setting_id == "4") selected @endif value="4">Check box</option>
                                                     <option @if($t_q_s->format_setting_id == "5") selected @endif value="5">Multiple choice</option>
                                                     <option @if($t_q_s->format_setting_id == "6") selected @endif value="6">Radio group</option>
                                                     <option @if($t_q_s->format_setting_id == "7") selected @endif value="7">Drop down</option>
                                                   </select>
                                                 </div>
                                                 <div class="col-sm-4" style="padding: 0;">
                                                   <div style="padding: 1px">
                                                     <label class="control-label mandatory_checkbox_label">
                                                       <input type="checkbox" name="mandatory" @if($t_q_s->mandatory == "1") checked @endif value="1" class="mandatory_checkbox" style="top:4px"> Mandatory
                                                     </label>
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="row @if($t_q_s->format_setting_id == '5' || $t_q_s->format_setting_id == '6' || $t_q_s->format_setting_id == '7') @else hidden @endif  option_text_data">
                                                 <div class="col-sm-9 col-sm-offset-2">
                                                   <div class="no-more-tables">
                                                     <table class="table s_table option_table">
                                                       <tbody>
                                                         @if($t_q_s->format_setting_id == '5' || $t_q_s->format_setting_id == '6' || $t_q_s->format_setting_id == '7')
                                                           @foreach ($t_q_s->detail as $key => $detail)
                                                             <?php $key++; ?>
                                                             <tr>
                                                               <td valign="center">Option {{$key}}</td>
                                                               <td class="s_weight" valign="center">
                                                                 <input type="text" class="form-control option_text" data-message="{{$key}}" name="option[]" value="{{$detail->option}}">
                                                               </td>
                                                               <td valign="center">
                                                                 <a class="delete_row_option">
                                                                   <i class="fa fa-times-circle-o"></i>
                                                                 </a>
                                                               </td>
                                                             </tr>
                                                           @endforeach
                                                         @else
                                                           <tr>
                                                             <td valign="center">Option 1</td>
                                                             <td class="s_weight" valign="center">
                                                               <input type="text" class="form-control option_text" data-message="1" name="option[]">
                                                             </td>
                                                             <td valign="center">
                                                               <a class="delete_row_option">
                                                                 <i class="fa fa-times-circle-o"></i>
                                                               </a>
                                                             </td>
                                                           </tr>
                                                         @endif
                                                       </tbody>
                                                       <tfoot>
                                                          <tr>
                                                            <td></td>
                                                            <td colspan="2" class="text-align-center">
                                                              <button type="button" class="btn btn-sm btn-warning add_option">+ Add Option</button>
                                                            </td>
                                                          </tr>
                                                       </tfoot>
                                                     </table>
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="@if($t_q_s->format_setting_id == '2' || $t_q_s->format_setting_id == '3') @else hidden @endif form-group form-group-sm placeholder_text_data" style="">
                                                 <label class="control-label col-sm-2">Placeholder</label>
                                                 <div class="col-sm-10">
                                                   @if($t_q_s->format_setting_id == '2' || $t_q_s->format_setting_id == '3')
                                                     @foreach ($t_q_s->detail as $key => $placeholder)
                                                     <input type="text" name="placeholder" class="form-control placeholder_text" value="{{$placeholder->placeholder}}" >
                                                     @endforeach
                                                   @else
                                                     <input type="text" name="placeholder" class="form-control placeholder_text" value="Enter Something" disabled >
                                                   @endif
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="form-group form-group-sm knockout_criteria  @if($t_q_s->knock_out == '1') @else hidden @endif">
                                                <label class="control-label col-sm-2">Knock out criteria</label>
                                                <div class="col-sm-10">
                                                  <div class="knockout_li_number @if($t_q_s->format_setting_id == '1') @else hidden @endif">
                                                     <div class="row">
                                                        <label class="control-label col-md-1">Range: </label>
                                                        @if($t_q_s->format_setting_id == '1')
                                                          @foreach ($t_q_s->detail as $key => $max_min)
                                                            <div class="col-sm-4">
                                                              <div class="input-group input-group-sm">
                                                                <div class="input-group-addon">
                                                                  Min
                                                                </div>
                                                                <input type="number" name="min" class="form-control number_min" value="{{$max_min->min}}">
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                              <div class="input-group input-group-sm">
                                                                <div class="input-group-addon">
                                                                  Max
                                                                </div>
                                                                <input type="number" name="max" class="form-control number_max" value="{{$max_min->max}}">
                                                              </div>
                                                            </div>
                                                          @endforeach
                                                        @else
                                                          <div class="col-sm-4">
                                                            <div class="input-group input-group-sm">
                                                              <div class="input-group-addon">
                                                                Min
                                                              </div>
                                                              <input type="number" name="min" class="form-control number_min" value="0">
                                                            </div>
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <div class="input-group input-group-sm">
                                                              <div class="input-group-addon">
                                                                Max
                                                              </div>
                                                              <input type="number" name="max" class="form-control number_max" value="0">
                                                            </div>
                                                          </div>
                                                        @endif
                                                     </div>
                                                     <small class="help-block">Any number between the range will be considered as correct</small>
                                                  </div>

                                                  <div class="knockout_li_checkbox @if($t_q_s->format_setting_id == '4') @else hidden @endif">
                                                     <label class="control-label">Expected Answer:</label>
                                                     @if($t_q_s->format_setting_id == '1')
                                                       @foreach ($t_q_s->detail as $key => $checked)
                                                         <div class="radio no-padding">
                                                           <label class="control-label">
                                                             <input type="radio" @if($checked == '1') checked @endif  name="checkbox" value="1">
                                                             Checked
                                                           </label>
                                                         </div>
                                                         <div class="radio no-padding">
                                                           <label class="control-label">
                                                             <input type="radio"  @if($checked == '0') checked @endif name="checkbox" value="0">
                                                             Unchecked
                                                           </label>
                                                         </div>
                                                       @endforeach
                                                     @else
                                                       <div class="radio no-padding">
                                                         <label class="control-label">
                                                           <input type="radio" checked name="checkbox" value="1">
                                                           Checked
                                                         </label>
                                                       </div>
                                                       <div class="radio no-padding">
                                                         <label class="control-label">
                                                           <input type="radio" name="checkbox" value="0">
                                                           Unchecked
                                                         </label>
                                                       </div>
                                                     @endif
                                                  </div>

                                                  <div class="knockout_li_multiple_choice @if($t_q_s->format_setting_id == '5') @else hidden @endif">
                                                    <label class="control-label">Expected Answer(s)</label>
                                                    <ul style="padding:0;">
                                                      @if($t_q_s->format_setting_id == '5' || $t_q_s->format_setting_id == '6' || $t_q_s->format_setting_id == '7')
                                                        @foreach ($t_q_s->detail as $key => $answer_multiple_choice)
                                                          <?php $key++; ?>
                                                          <li>
                                                            <div class="no-padding">
                                                               <label class="control-label checkbox_{{$key}}">
                                                                <input type="checkbox" @if($answer_multiple_choice->option == $answer_multiple_choice->answer ) checked @endif name="answer_multiple_choice[]">
                                                                {{$answer_multiple_choice->option}}
                                                               </label>
                                                            </div>
                                                          </li>
                                                        @endforeach
                                                      @else
                                                        <li>
                                                          <div class="no-padding">
                                                             <label class="control-label checkbox_1">
                                                              <input type="checkbox" checked name="answer_multiple_choice[]">
                                                             </label>
                                                          </div>
                                                        </li>
                                                      @endif
                                                    </ul>
                                                    <small class="help-block">Candidate should select the exact choices which are checked above to qualify for the test</small>
                                                  </div>

                                                  <div class="knockout_li_radio_group @if($t_q_s->format_setting_id == '6') @else hidden @endif">
                                                    <label class="control-label">Expected Answer</label>
                                                    <ul style="padding:0;">
                                                      @if($t_q_s->format_setting_id == '5' || $t_q_s->format_setting_id == '6' || $t_q_s->format_setting_id == '7')
                                                        @foreach ($t_q_s->detail as $key => $answer_multiple_choice)
                                                          <?php $key++; ?>
                                                          <li>
                                                            <div class="radio no-padding">
                                                               <label class="control-label radio_group_{{$key}}">
                                                                <input type="radio" @if($answer_multiple_choice->option == $answer_multiple_choice->answer ) checked @endif name="answer_radio">
                                                                {{$answer_multiple_choice->option}}
                                                               </label>
                                                            </div>
                                                          </li>
                                                        @endforeach
                                                      @else
                                                        <li>
                                                          <div class="radio no-padding">
                                                             <label class="control-label radio_group_1">
                                                             <input type="radio" checked name="answer_radio">
                                                             </label>
                                                          </div>
                                                        </li>
                                                      @endif
                                                    </ul>
                                                    <small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>
                                                  </div>

                                                  <div class="knockout_li_drop_down @if($t_q_s->format_setting_id == '7') @else hidden @endif">
                                                    <label class="control-label">Expected Answer</label>
                                                    <ul style="padding:0;">
                                                      @if($t_q_s->format_setting_id == '5' || $t_q_s->format_setting_id == '6' || $t_q_s->format_setting_id == '7')
                                                        @foreach ($t_q_s->detail as $key => $answer_multiple_choice)
                                                          <?php $key++; ?>
                                                          <li>
                                                            <div class="radio no-padding">
                                                               <label class="control-label drop_down_{{$key}}">
                                                                <input type="radio" @if($answer_multiple_choice->option == $answer_multiple_choice->answer ) checked @endif name="answer_drop_down">
                                                                {{$answer_multiple_choice->option}}
                                                               </label>
                                                            </div>
                                                          </li>
                                                        @endforeach
                                                      @else
                                                        <li>
                                                          <div class="radio no-padding">
                                                             <label class="control-label drop_down_1">
                                                             <input type="radio" checked name="answer_drop_down">
                                                             </label>
                                                          </div>
                                                        </li>
                                                      @endif
                                                    </ul>
                                                    <small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>
                                                  </div>

                                                </div>
                                             </div>
                                             <div class="row">
                                               <div class="col-sm-10 col-sm-offset-2">
                                                 <button type="submit" class="btn btn-sm btn-info">Done</button>
                                                 <button type="button" class="btn btn-sm btn-default cancel_button_remove">Cancel</button>
                                               </div>
                                             </div>
                                           </div>
                                         </form>
                                       </li>
                                       @endforeach;


                                     </ul>
                                   </div>
                                 </div>
                               </section>
                              </div>
                              <div class="clearfix panel-footer borderTop">
                                 <div class="col-sm-2 s_margin_bottom">
                                    <button type="submit" class="btn btn-sm">Save Questionnaire</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="contact_details" class="tab-pane fade">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Contact Details <i class="fa fa-info-circle"></i>
                                 </strong>
                              </div>
                              <form class="form-horizontal" name="tSettings" id="templatetestContactSetting" action="{{route('templatetestContactSetting')}}" method="POST">
                                 {{csrf_field()}}
                                 <input type="hidden" name="template_id" value="{{$edit->id}}">
                                 <div class="panel-body s_panelBodyHeight">
                                    <p class="s_modal_body_heading text-center">These are the contact details for the candidate’s reference incase of any query.</p>
                                    <br>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Email ID
                                       </label>
                                       <div class="col-sm-6">
                                          <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" disabled>
                                          <div class="">
                                             <label>
                                             <input type="checkbox" value="1"@if(isset($edit_test_contact_settings->email_visible) && $edit_test_contact_settings->email_visible == 1) checked='checked' @endif name="email_visible"> Make visible to candidate
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Contact Number
                                       </label>
                                       <div class="col-sm-6">
                                          <input type="text" class="form-control" name="phone" value="{{Auth::user()->profile->phone}}" disabled>
                                          <div class="">
                                             <label>
                                             <input type="checkbox" value="1" @if(isset($edit_test_contact_settings->contact_visible) && $edit_test_contact_settings->contact_visible == 1) checked='checked' @endif name="contact_visible"> Show Contact Number to candidate for help
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix panel-footer borderTop">
                                    <div class="col-sm-3 s_margin_bottom">
                                       <button type="submit" class="btn btn-sm ">Save</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div id="mail_settings" class="tab-pane fade">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Test Report Mail Settings <i class="fa fa-info-circle"></i>
                                 </strong>
                              </div>
                               <form id="templatetestMailSetting" class="form-horizontal" name="tSettings" action="{{route('templatetestMailSetting')}}" method="POST">
                                 {{csrf_field()}}
                                 <input type="hidden" name="template_id" value="{{$edit->id}}">
                                 <div class="panel-body s_panelBodyHeight">
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Email Report <i class="fa fa-info-circle"></i>
                                       </label>
                                       <div class="col-sm-6">
                                          <div class="checkbox">
                                             <label>
                                             <input type="checkbox" name="email_report_status" value="1"
                                              @if(isset($edit_mail_settings->email_report_status) && $edit_mail_settings->email_report_status == 1) checked='checked' @endif
                                              id="check_emailreport"> Receive mail whenever a candidate completes the test
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-group-sm rec_div" style="">
                                       <label class="col-sm-3 control-label">Receivers</label>
                                       <div class="col-sm-8">
                                       <ul class="unordered-list">
                                       </ul>
                                       <button class="btn btn-info btn-sm" ng-init="showNewReciever = false" ng-hide="showNewReciever" ng-click="showNewReciever = true" style="" id="rev_button">+ Addz receiver</button>
                                       </div>
                                    </div>
                                    <div class="panel-body rec_div2">
                                          <div class="form-group form-group-sm">
                                             <label class="control-label col-sm-4">Receiver email</label>
                                             <div class="col-sm-8">
                                                <input type="email" @if(isset($edit_mail_settings)) value="{{$edit_mail_settings->receiver_email}}" @endif name="receiver_email" class="form-control" required="" style="">
                                             </div>
                                          </div>
                                          <div class="form-group form-group-sm" ng-hide="testData.isSubmissionOnlyTest">
                                             <label class="control-label col-sm-4">Minimum percentage required</label>
                                             <div class="col-sm-8">
                                                <input type="number" @if(isset($edit_mail_settings)) value="{{$edit_mail_settings->percentage_required}}" @endif name="percentage_required" class="form-control" min="0" max="100" style="">
                                             </div>
                                          </div>
                                          <div class="form-group form-group-sm" ng-hide="testData.isSubmissionOnlyTest">
                                             <div class="col-sm-8 col-sm-offset-4">
                                                <div class="checkbox">
                                                   <label>
                                                      <input type="checkbox" name="include_questionnaire" value="1"
                                                      @if(isset($edit_mail_settings->include_questionnaire) && $edit_mail_settings->include_questionnaire == 1) checked='checked' @endif
                                                      > Include questionnaire results
                                                   </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-sm-8 col-sm-offset-4">
                                                <button class="btn btn-sm btn-info" type="submit" data-ng-disabled="newTestReportMailReciever.minPercentageRequired == undefined" data-ng-click="addNewTestReportMailReciever();showNewReciever = false">Done
                                                </button>
                                                <button class="btn btn-sm btn-default" data-ng-click="showNewReciever = false" id="rev_cancel_button">Cancel
                                                </button>
                                             </div>
                                          </div>
                                     </div>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Candidate Mail Setting
                                       </label>
                                       <div class="col-sm-6">
                                          <div class="checkbox">
                                             <label>
                                             <input type="checkbox"
                                             @if(isset($edit_mail_settings->candidate_mail_setting) && $edit_mail_settings->candidate_mail_setting == 1) checked='checked' @endif
                                              name="candidate_mail_setting" value="1"> Send Report to candidate whenever candidate finishes the test
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix panel-footer borderTop">
                                    <div class="col-sm-3 s_margin_bottom">
                                       <button type="submit" class="btn btn-sm">Save</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div id="mail_templates" class="tab-pane fade">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Test Completion Mail Settings <i class="fa fa-info-circle"></i>
                                 </strong>
                              </div>
                              <form id="templatetestMessageSetting" class="form-horizontal" name="tSettings" action="{{route('template_setting_message_post')}}" method="POST">
                                 {{csrf_field()}}
                                 <div class="panel-body s_panelBodyHeight">
                                    <p class="s_modal_body_heading text-center">An email will be sent to the candidates after completing the test</p>
                                    <br>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Message
                                       </label>
                                       <div class="col-sm-6">
                                          <input type="hidden" name="template_id" value="{{$edit->id}}">
                                          <textarea name="setting_message" class="form-control" rows="5" placeholder="Your message">@if(isset($edit_test_settings_message)){{$edit_test_settings_message->setting_message}}@endif</textarea>
                                          <div>
                                             You can use tags such as &lt;candidateName&gt; and &lt;testTitle&gt; to represent candidate name and test title respectively.<br>
                                             For example:Hi &lt;candidateName&gt;,Your test - &lt;testTitle&gt; has been submitted successfully.
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix panel-footer borderTop">
                                    <div class="col-sm-4 s_margin_bottom">
                                       <button type="submit" class="btn btn-sm">Save</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="section_public_page" class="tab-pane fade">
                  <div class="s_edit_public_test">
                     <div class="ept_header">
                        <div class="row">
                           <div class="col-sm-9">
                              <small><i>This is a preview of the page that appears when candidate opens the public test link </i></small>
                           </div>
                           <div class="col-sm-3">
                              <button class="btn btn-sm btn-block btn-default">Preview in Full Screen</button>
                           </div>
                        </div>
                     </div>
                     <div class="ept_body">
                        <div class="ept_container">
                           <div class="ept_cover_image" style="background-image: url(&quot;https://storage.googleapis.com/codegrounds/PublicTestImages320419ea-36fb-455d-ae46-767c2aafa16d_USER-RecruiterCopy_ITEM-logo1.png') }}&quot;);">
                              <div class="ept_cover_image_top">
                                 <div class="clearfix">
                                    <div class="pull-right">
                                       <div class="clearfix">
                                          <div class="form-group ">
                                             <input type="text" placeholder="Add a tag and press Enter" class="form-control s_edit_btn">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="ept_cover_image_bottom">
                                 <div class="clearfix">
                                    <div class="pull-right">
                                       <button class="btn btn-sm btn-default" id="cover_image_btn" >Change Cover Image <i class="fa fa-caret-up" aria-hidden="true"></i></button>
                                       <div class="popover fade in top hidden" id="cover_image" tooltip-animation-class="fade" uib-tooltip-classes="" uib-popover-template-popup="" title="" content-exp="contentExp()" placement="top" popup-class="" animation="animation" is-open="isOpen" origin-scope="origScope" style="visibility: visible; display: block; top: -120px; left: 749px;">
                                          <div class="arrow"></div>
                                          <div class="popover-inner">
                                             <div class="popover-content">
                                                <form>
                                                   <div class="form-group form-group-sm">
                                                      <label class="control-label">
                                                      Cover Image URL
                                                      </label>
                                                      <input class="form-control">
                                                   </div>
                                                   <div class="">
                                                      <button class="btn btn-primary btn-sm small_font_size">
                                                      <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                                                      </button>
                                                      or
                                                      <button type="button" href="" class="btn btn-primary btn-sm small_font_size f_upload">Upload Image</button>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="ept_container">
                           <ul class="nav nav-tabs">
                              <li><a data-toggle="pill" href="#public_instructions">Instructions</a></li>
                              <li><a data-toggle="pill" href="#public_description">Description</a></li>
                              <li><button class="btn btn-edit-tabs"  data-toggle="modal" data-target="#add-public-page-Modal"><i class="fa fa-plus f_plus" aria-hidden="true"></i></button></li>
                           </ul>
                           <div class="panel panel-default navtab-body">
                              <div class="panel-body">
                                 <div class="">
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <a  data-toggle="modal" data-target="#edit-public-page-Modal">
                                          <i class="fa fa-pencil" aria-hidden="true"></i> Edit Page
                                          </a>
                                          <span class="separator"></span>
                                          <a class="text-danger" data-toggle="modal"  data-target="#_first_model">
                                          <i class="fa fa-trash-o" aria-hidden="true"></i> Delete Page
                                          </a>
                                       </div>
                                    </div>
                                    <hr class="sm">
                                 </div>
                                 <div class="tab-content sidebar-content">
                                    <div id="public_instructions" class="tab-pane fade in active">
                                       <p>(1) Make sure you have a proper internet connection.</p>
                                       <p>(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.</p>
                                       <p>(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.</p>
                                    </div>
                                    <div id="public_description" class="tab-pane fade">
                                       <p>This test is hosted via Codeground. Please read the instructions carefully before proceeding.</p>
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
   </div>
</section>
<!-- Edit-public-page-Modal -->
<div class="modal fade" id="_first_model" role="dialog" style="">
   <div class="modal-dialog  modal-lg s-modal-lg ">
      <!-- Modal content-->
      <div class="modal-content s_content_radius">
         <div class="modal-header s_modal_header_first">
            <h3 class="modal-title h3-old">Hosting: <i class="">English</i>
               <button type="button" class="btn btn-sm btn-default pull-right" data-dismiss="modal">Close</button>
            </h3>
         </div>
         <div class="modal-body">
           <form id="hostTestAdd" method="post" action="{{route('host_test_post')}}">
            <div class="row">
               <div class="col-md-12" style="border-right: 0px solid #ddd">
                  <div class="form-group form-group-sm">
                     <div class="">
                        <label class="control-label">
                        Hosting Test Title   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question. Supported classification are easy, intermediate and hard."> <i class="fa fa-info-circle"> </i></a>
                        </label>
                        <input type="hidden" name="template_id" value="{{$template_id}}">
                        <input type="text" class="form-control" name="host_name" required="">
                     </div>
                  </div>
                  <div class="form-group form-group-sm" data-ng-init="modalObject.settings.cutOff = 0">
                     <label class="control-label">
                     Cut-off Marks   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question. Supported classification are easy, intermediate and hard."> <i class="fa fa-info-circle"> </i></a>
                     <span class="light-font" style="font-weight:normal">(Total marks:195)</span>
                     </label>
                     <div class="row">
                        <div class="col-sm-2">
                           <input type="number" name="cut_off_marks" class="form-control" min="0" value="0" required="" integer="">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-horizontal">
                     <h5><strong>Test Timings</strong></h5>
                     <div class="form-group form-group-sm">
                        <div class="">
                           <label class="control-label col-sm-3 col-sm-offset-1">
                           Test Opening Time   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question."> <i class="fa fa-info-circle"> </i></a>
                           </label>
                           <div class="col-sm-8">
                              <div>
                                 <div class="form-horizontal">
                                    <div class="clearfix">
                                       <div class="form-group s_form_control_group">
                                          <div class="form-field">
                                             <select class="form-control" name="op_t_d">
                                                <option value="1" label="1">1</option>
                                                <option value="2" label="2">2</option>
                                                <option value="3" label="3">3</option>
                                                <option value="4" label="4">4</option>
                                                <option value="5" label="5" selected="selected">5</option>
                                                <option value="6" label="6">6</option>
                                                <option value="7" label="7">7</option>
                                                <option value="8" label="8">8</option>
                                                <option value="9" label="9">9</option>
                                                <option value="10" label="10">10</option>
                                                <option value="11" label="11">11</option>
                                                <option value="12" label="12">12</option>
                                                <option value="13" label="13">13</option>
                                                <option value="14" label="14">14</option>
                                                <option value="15" label="15">15</option>
                                                <option value="16" label="16">16</option>
                                                <option value="17" label="17">17</option>
                                                <option value="18" label="18">18</option>
                                                <option value="19" label="19">19</option>
                                                <option value="20" label="20">20</option>
                                                <option value="21" label="21">21</option>
                                                <option value="22" label="22">22</option>
                                                <option value="23" label="23">23</option>
                                                <option value="24" label="24">24</option>
                                                <option value="25" label="25">25</option>
                                                <option value="26" label="26">26</option>
                                                <option value="27" label="27">27</option>
                                                <option value="28" label="28">28</option>
                                                <option value="29" label="29">29</option>
                                                <option value="30" label="30">30</option>
                                                <option value="31" label="31">31</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control" name="op_t_m">
                                                <option value="1" label="Jan">Jan</option>
                                                <option value="2" label="Feb">Feb</option>
                                                <option value="3" label="Mar" selected="selected">Mar</option>
                                                <option value="4" label="Apr">Apr</option>
                                                <option value="5" label="May">May</option>
                                                <option value="6" label="Jun">Jun</option>
                                                <option value="7" label="Jul">Jul</option>
                                                <option value="8" label="Aug">Aug</option>
                                                <option value="8" label="Sep">Sep</option>
                                                <option value="10" label="Oct">Oct</option>
                                                <option value="11" label="Nov">Nov</option>
                                                <option value="12" label="Dec">Dec</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control" name="op_t_y">
                                                <option value="2011" label="2011">2011</option>
                                                <option value="2012" label="2012">2012</option>
                                                <option value="2013" label="2013">2013</option>
                                                <option value="2014" label="2014">2014</option>
                                                <option value="2015" label="2015">2015</option>
                                                <option value="2016" label="2016">2016</option>
                                                <option value="2017" label="2017">2017</option>
                                                <option value="2018" label="2018" selected="selected">2018</option>
                                                <option value="2019" label="2019">2019</option>
                                                <option value="2020" label="2020">2020</option>
                                             </select>
                                          </div>
                                       </div>
                                       <span>
                                          <a class="btn btn-link link-show-time click_time">
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; Set Time
                                          </a>
                                          <div class="time-box hidden">
                                             <div class="form-group s_form_control_group">
                                                <div class="form-field">
                                                   <select class="form-control" name="op_time_hrs">
                                                      <option value="12">12</option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                   </select>
                                                </div>
                                                <div class="form-field">
                                                   <select class="form-control" name="op_time_min">
                                                      <option value="00">00</option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                      <option value="13">13</option>
                                                      <option value="14">14</option>
                                                      <option value="15">15</option>
                                                      <option value="16">16</option>
                                                      <option value="17">17</option>
                                                      <option value="18">18</option>
                                                      <option value="19">19</option>
                                                      <option value="20">20</option>
                                                      <option value="21">21</option>
                                                      <option value="22">22</option>
                                                      <option value="23">23</option>
                                                      <option value="24">24</option>
                                                      <option value="25">25</option>
                                                      <option value="26">26</option>
                                                      <option value="27">27</option>
                                                      <option value="28">28</option>
                                                      <option value="29">29</option>
                                                      <option value="30">30</option>
                                                      <option value="31">31</option>
                                                      <option value="32">32</option>
                                                      <option value="33">33</option>
                                                      <option value="34">34</option>
                                                      <option value="35">35</option>
                                                      <option value="36">36</option>
                                                      <option value="37">37</option>
                                                      <option value="38">38</option>
                                                      <option value="39">39</option>
                                                      <option value="40">40</option>
                                                      <option value="41">41</option>
                                                      <option value="42">42</option>
                                                      <option value="43">43</option>
                                                      <option value="44">44</option>
                                                      <option value="45">45</option>
                                                      <option value="46">46</option>
                                                      <option value="47">47</option>
                                                      <option value="48">48</option>
                                                      <option value="49">49</option>
                                                      <option value="50">50</option>
                                                      <option value="51">51</option>
                                                      <option value="52">52</option>
                                                      <option value="53">53</option>
                                                      <option value="54">54</option>
                                                      <option value="55">55</option>
                                                      <option value="56">56</option>
                                                      <option value="57">57</option>
                                                      <option value="58">58</option>
                                                      <option value="59">59</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" name="op_time_format" value="AM" checked>AM </label>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" name="op_time_format" value="PM">PM </label>
                                             </div>
                                          </div>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group form-group-sm">
                        <div class="">
                           <label class="control-label col-sm-3 col-sm-offset-1">
                           Test Closing Time   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question."> <i class="fa fa-info-circle"> </i></a>
                           </label>
                           <div class="col-sm-8">
                              <div>
                                 <div class="form-horizontal">
                                    <div class="clearfix">
                                       <div class="form-group s_form_control_group">
                                          <div class="form-field">
                                             <select class="form-control" name="cl_t_d">
                                                <option value="1" label="1">1</option>
                                                <option value="2" label="2">2</option>
                                                <option value="3" label="3">3</option>
                                                <option value="4" label="4">4</option>
                                                <option value="5" label="5" selected="selected">5</option>
                                                <option value="6" label="6">6</option>
                                                <option value="7" label="7">7</option>
                                                <option value="8" label="8">8</option>
                                                <option value="9" label="9">9</option>
                                                <option value="10" label="10">10</option>
                                                <option value="11" label="11">11</option>
                                                <option value="12" label="12">12</option>
                                                <option value="13" label="13">13</option>
                                                <option value="14" label="14">14</option>
                                                <option value="15" label="15">15</option>
                                                <option value="16" label="16">16</option>
                                                <option value="17" label="17">17</option>
                                                <option value="18" label="18">18</option>
                                                <option value="19" label="19">19</option>
                                                <option value="20" label="20">20</option>
                                                <option value="21" label="21">21</option>
                                                <option value="22" label="22">22</option>
                                                <option value="23" label="23">23</option>
                                                <option value="24" label="24">24</option>
                                                <option value="25" label="25">25</option>
                                                <option value="26" label="26">26</option>
                                                <option value="27" label="27">27</option>
                                                <option value="28" label="28">28</option>
                                                <option value="29" label="29">29</option>
                                                <option value="30" label="30">30</option>
                                                <option value="31" label="31">31</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control" name="cl_t_m">
                                                <option value="1" label="Jan">Jan</option>
                                                <option value="2" label="Feb">Feb</option>
                                                <option value="3" label="Mar" selected="selected">Mar</option>
                                                <option value="4" label="Apr">Apr</option>
                                                <option value="5" label="May">May</option>
                                                <option value="6" label="Jun">Jun</option>
                                                <option value="7" label="Jul">Jul</option>
                                                <option value="8" label="Aug">Aug</option>
                                                <option value="9" label="Sep">Sep</option>
                                                <option value="10" label="Oct">Oct</option>
                                                <option value="11" label="Nov">Nov</option>
                                                <option value="12" label="Dec">Dec</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control" name="cl_t_y">
                                                <option value="2011" label="2011">2011</option>
                                                <option value="2012" label="2012">2012</option>
                                                <option value="2013" label="2013">2013</option>
                                                <option value="2014" label="2014">2014</option>
                                                <option value="2015" label="2015">2015</option>
                                                <option value="2016" label="2016">2016</option>
                                                <option value="2017" label="2017">2017</option>
                                                <option value="2018" label="2018" selected="selected">2018</option>
                                                <option value="2019" label="2019">2019</option>
                                                <option value="2020" label="2020">2020</option>
                                             </select>
                                          </div>
                                       </div>
                                       <span>
                                          <a class="btn btn-link link-show-time click_time">
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; Set Time
                                          </a>
                                          <div class="time-box hidden">
                                             <div class="form-group s_form_control_group">
                                                <div class="form-field">
                                                   <select class="form-control" name="cl_time_hrs">
                                                      <option value="12">12</option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                   </select>
                                                </div>
                                                <div class="form-field">
                                                   <select class="form-control" name="cl_time_min">
                                                      <option value="00">00</option>
                                                      <option value="01">01</option>
                                                      <option value="02">02</option>
                                                      <option value="03">03</option>
                                                      <option value="04">04</option>
                                                      <option value="05">05</option>
                                                      <option value="06">06</option>
                                                      <option value="07">07</option>
                                                      <option value="08">08</option>
                                                      <option value="09">09</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                      <option value="13">13</option>
                                                      <option value="14">14</option>
                                                      <option value="15">15</option>
                                                      <option value="16">16</option>
                                                      <option value="17">17</option>
                                                      <option value="18">18</option>
                                                      <option value="19">19</option>
                                                      <option value="20">20</option>
                                                      <option value="21">21</option>
                                                      <option value="22">22</option>
                                                      <option value="23">23</option>
                                                      <option value="24">24</option>
                                                      <option value="25">25</option>
                                                      <option value="26">26</option>
                                                      <option value="27">27</option>
                                                      <option value="28">28</option>
                                                      <option value="29">29</option>
                                                      <option value="30">30</option>
                                                      <option value="31">31</option>
                                                      <option value="32">32</option>
                                                      <option value="33">33</option>
                                                      <option value="34">34</option>
                                                      <option value="35">35</option>
                                                      <option value="36">36</option>
                                                      <option value="37">37</option>
                                                      <option value="38">38</option>
                                                      <option value="39">39</option>
                                                      <option value="40">40</option>
                                                      <option value="41">41</option>
                                                      <option value="42">42</option>
                                                      <option value="43">43</option>
                                                      <option value="44">44</option>
                                                      <option value="45">45</option>
                                                      <option value="46">46</option>
                                                      <option value="47">47</option>
                                                      <option value="48">48</option>
                                                      <option value="49">49</option>
                                                      <option value="50">50</option>
                                                      <option value="51">51</option>
                                                      <option value="52">52</option>
                                                      <option value="53">53</option>
                                                      <option value="54">54</option>
                                                      <option value="55">55</option>
                                                      <option value="56">56</option>
                                                      <option value="57">57</option>
                                                      <option value="58">58</option>
                                                      <option value="59">59</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" name="cl_time_format" value="AM" checked>AM </label>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" name="cl_time_format" value="PM">PM </label>
                                             </div>
                                          </div>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group form-group-sm">
                        <label class="control-label col-sm-3 col-sm-offset-1 text-left">
                        Time Zone
                        </label>
                        <span>
                           <a class="btn btn-link btn-sm click_time">(UTC+04:00) Baku</a>
                           <div class="col-sm-6 hidden">
                              <select class="form-control" name="time_zone">
                                 <option value="(UTC-12:00) International Date Line West" label="(UTC-12:00) International Date Line West">(UTC-12:00) International Date Line West</option>
                                 <option value="(UTC-11:00) Coordinated Universal Time-11" label="(UTC-11:00) Coordinated Universal Time-11">(UTC-11:00) Coordinated Universal Time-11</option>
                                 <option value="(UTC-10:00) Hawaii" label="(UTC-10:00) Hawaii">(UTC-10:00) Hawaii</option>
                                 <option value="(UTC-09:00) Alaska" label="(UTC-09:00) Alaska">(UTC-09:00) Alaska</option>
                                 <option value="(UTC-08:00) Baja California" label="(UTC-08:00) Baja California">(UTC-08:00) Baja California</option>
                                 <option value="(UTC-08:00) Pacific Time (US &amp; Canada)" label="(UTC-08:00) Pacific Time (US &amp; Canada)">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
                                 <option value="(UTC-07:00) Arizona" label="(UTC-07:00) Arizona">(UTC-07:00) Arizona</option>
                                 <option value="(UTC-07:00) Chihuahua, La Paz, Mazatlan" label="(UTC-07:00) Chihuahua, La Paz, Mazatlan">(UTC-07:00) Chihuahua, La Paz, Mazatlan</option>
                                 <option value="(UTC-07:00) Mountain Time (US &amp; Canada)" label="(UTC-07:00) Mountain Time (US &amp; Canada)">(UTC-07:00) Mountain Time (US &amp; Canada)</option>
                                 <option value="(UTC-06:00) Central America" label="(UTC-06:00) Central America">(UTC-06:00) Central America</option>
                                 <option value="(UTC-06:00) Central Time (US &amp; Canada)" label="(UTC-06:00) Central Time (US &amp; Canada)">(UTC-06:00) Central Time (US &amp; Canada)</option>
                                 <option value="(UTC-06:00) Guadalajara, Mexico City, Monterrey" label="(UTC-06:00) Guadalajara, Mexico City, Monterrey">(UTC-06:00) Guadalajara, Mexico City, Monterrey</option>
                                 <option value="(UTC-06:00) Saskatchewan" label="(UTC-06:00) Saskatchewan">(UTC-06:00) Saskatchewan</option>
                                 <option value="(UTC-05:00) Bogota, Lima, Quito" label="(UTC-05:00) Bogota, Lima, Quito">(UTC-05:00) Bogota, Lima, Quito</option>
                                 <option value="(UTC-05:00) Eastern Time (US &amp; Canada)" label="(UTC-05:00) Eastern Time (US &amp; Canada)">(UTC-05:00) Eastern Time (US &amp; Canada)</option>
                                 <option value="(UTC-05:00) Indiana (East)" label="(UTC-05:00) Indiana (East)">(UTC-05:00) Indiana (East)</option>
                                 <option value="(UTC-04:30) Caracas" label="(UTC-04:30) Caracas">(UTC-04:30) Caracas</option>
                                 <option value="(UTC-04:00) Asuncion" label="(UTC-04:00) Asuncion">(UTC-04:00) Asuncion</option>
                                 <option value="(UTC-04:00) Atlantic Time (Canada)" label="(UTC-04:00) Atlantic Time (Canada)">(UTC-04:00) Atlantic Time (Canada)</option>
                                 <option value="20" label="(UTC-04:00) Cuiaba">(UTC-04:00) Cuiaba</option>
                                 <option value="21" label="(UTC-04:00) Georgetown, La Paz, Manaus, San Juan">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option>
                                 <option value="(UTC-04:00) Cuiaba" label="(UTC-04:00) Santiago">(UTC-04:00) Santiago</option>
                                 <option value="(UTC-03:30) Newfoundland" label="(UTC-03:30) Newfoundland">(UTC-03:30) Newfoundland</option>
                                 <option value="(UTC-03:00) Brasilia" label="(UTC-03:00) Brasilia">(UTC-03:00) Brasilia</option>
                                 <option value="(UTC-03:00) Buenos Aires" label="(UTC-03:00) Buenos Aires">(UTC-03:00) Buenos Aires</option>
                                 <option value="(UTC-03:00) Cayenne, Fortaleza" label="(UTC-03:00) Cayenne, Fortaleza">(UTC-03:00) Cayenne, Fortaleza</option>
                                 <option value="(UTC-03:00) Greenland" label="(UTC-03:00) Greenland">(UTC-03:00) Greenland</option>
                                 <option value="(UTC-03:00) Montevideo" label="(UTC-03:00) Montevideo">(UTC-03:00) Montevideo</option>
                                 <option value="(UTC-03:00) Salvador" label="(UTC-03:00) Salvador">(UTC-03:00) Salvador</option>
                                 <option value="(UTC-02:00) Coordinated Universal Time-02" label="(UTC-02:00) Coordinated Universal Time-02">(UTC-02:00) Coordinated Universal Time-02</option>
                                 <option value="(UTC-02:00) Mid-Atlantic - Old" label="(UTC-02:00) Mid-Atlantic - Old">(UTC-02:00) Mid-Atlantic - Old</option>
                                 <option value="(UTC-01:00) Azores" label="(UTC-01:00) Azores">(UTC-01:00) Azores</option>
                                 <option value="(UTC-01:00) Cape Verde Is." label="(UTC-01:00) Cape Verde Is.">(UTC-01:00) Cape Verde Is.</option>
                                 <option value="(UTC) Casablanca" label="(UTC) Casablanca">(UTC) Casablanca</option>
                                 <option value="(UTC) Coordinated Universal Time" label="(UTC) Coordinated Universal Time">(UTC) Coordinated Universal Time</option>
                                 <option value="(UTC) Dublin, Edinburgh, Lisbon, London" label="(UTC) Dublin, Edinburgh, Lisbon, London">(UTC) Dublin, Edinburgh, Lisbon, London</option>
                                 <option value="(UTC) Monrovia, Reykjavik" label="(UTC) Monrovia, Reykjavik">(UTC) Monrovia, Reykjavik</option>
                                 <option value="(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna" label="(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna">(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                 <option value="(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague" label="(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague">(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                 <option value="(UTC+01:00) Brussels, Copenhagen, Madrid, Paris" label="(UTC+01:00) Brussels, Copenhagen, Madrid, Paris">(UTC+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                 <option value="(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb" label="(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb">(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                 <option value="(UTC+01:00) West Central Africa" label="(UTC+01:00) West Central Africa">(UTC+01:00) West Central Africa</option>
                                 <option value="(UTC+01:00) Windhoek" label="(UTC+01:00) Windhoek">(UTC+01:00) Windhoek</option>
                                 <option value="(UTC+02:00) Athens, Bucharest" label="(UTC+02:00) Athens, Bucharest">(UTC+02:00) Athens, Bucharest</option>
                                 <option value="(UTC+02:00) Beirut" label="(UTC+02:00) Beirut">(UTC+02:00) Beirut</option>
                                 <option value="(UTC+02:00) Cairo" label="(UTC+02:00) Cairo">(UTC+02:00) Cairo</option>
                                 <option value="(UTC+02:00) Damascus" label="(UTC+02:00) Damascus">(UTC+02:00) Damascus</option>
                                 <option value="(UTC+02:00) E. Europe" label="(UTC+02:00) E. Europe">(UTC+02:00) E. Europe</option>
                                 <option value="(UTC+02:00) Harare, Pretoria" label="(UTC+02:00) Harare, Pretoria">(UTC+02:00) Harare, Pretoria</option>
                                 <option value="(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius" label="(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius">(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                 <option value="(UTC+02:00) Istanbul" label="(UTC+02:00) Istanbul">(UTC+02:00) Istanbul</option>
                                 <option value="(UTC+02:00) Jerusalem" label="(UTC+02:00) Jerusalem">(UTC+02:00) Jerusalem</option>
                                 <option value="(UTC+02:00) Tripoli" label="(UTC+02:00) Tripoli">(UTC+02:00) Tripoli</option>
                                 <option value="(UTC+03:00) Amman" label="(UTC+03:00) Amman">(UTC+03:00) Amman</option>
                                 <option value="(UTC+03:00) Baghdad" label="(UTC+03:00) Baghdad">(UTC+03:00) Baghdad</option>
                                 <option value="(UTC+03:00) Kaliningrad, Minsk" label="(UTC+03:00) Kaliningrad, Minsk">(UTC+03:00) Kaliningrad, Minsk</option>
                                 <option value="(UTC+03:00) Kuwait, Riyadh" label="(UTC+03:00) Kuwait, Riyadh">(UTC+03:00) Kuwait, Riyadh</option>
                                 <option value="(UTC+03:00) Nairobi" label="(UTC+03:00) Nairobi">(UTC+03:00) Nairobi</option>
                                 <option value="(UTC+03:30) Tehran" label="(UTC+03:30) Tehran">(UTC+03:30) Tehran</option>
                                 <option value="(UTC+04:00) Abu Dhabi, Muscat" label="(UTC+04:00) Abu Dhabi, Muscat">(UTC+04:00) Abu Dhabi, Muscat</option>
                                 <option value="(UTC+04:00) Baku" label="(UTC+04:00) Baku" selected="selected">(UTC+04:00) Baku</option>
                                 <option value="(UTC+04:00) Moscow, St. Petersburg, Volgograd" label="(UTC+04:00) Moscow, St. Petersburg, Volgograd">(UTC+04:00) Moscow, St. Petersburg, Volgograd</option>
                                 <option value="(UTC+04:00) Port Louis" label="(UTC+04:00) Port Louis">(UTC+04:00) Port Louis</option>
                                 <option value="(UTC+04:00) Tbilisi" label="(UTC+04:00) Tbilisi">(UTC+04:00) Tbilisi</option>
                                 <option value="(UTC+04:00) Yerevan" label="(UTC+04:00) Yerevan">(UTC+04:00) Yerevan</option>
                                 <option value="(UTC+04:30) Kabul" label="(UTC+04:30) Kabul">(UTC+04:30) Kabul</option>
                                 <option value="(UTC+05:00) Ashgabat, Tashkent" label="(UTC+05:00) Ashgabat, Tashkent">(UTC+05:00) Ashgabat, Tashkent</option>
                                 <option value="(UTC+05:00) Islamabad, Karachi" label="(UTC+05:00) Islamabad, Karachi">(UTC+05:00) Islamabad, Karachi</option>
                                 <option value="(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi" label="(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                 <option value="(UTC+05:30) Sri Jayawardenepura" label="(UTC+05:30) Sri Jayawardenepura">(UTC+05:30) Sri Jayawardenepura</option>
                                 <option value="(UTC+05:45) Kathmandu" label="(UTC+05:45) Kathmandu">(UTC+05:45) Kathmandu</option>
                                 <option value="(UTC+06:00) Astana" label="(UTC+06:00) Astana">(UTC+06:00) Astana</option>
                                 <option value="(UTC+06:00) Dhaka" label="(UTC+06:00) Dhaka">(UTC+06:00) Dhaka</option>
                                 <option value="(UTC+06:00) Ekaterinburg" label="(UTC+06:00) Ekaterinburg">(UTC+06:00) Ekaterinburg</option>
                                 <option value="(UTC+06:30) Yangon (Rangoon)" label="(UTC+06:30) Yangon (Rangoon)">(UTC+06:30) Yangon (Rangoon)</option>
                                 <option value="(UTC+07:00) Bangkok, Hanoi, Jakarta" label="(UTC+07:00) Bangkok, Hanoi, Jakarta">(UTC+07:00) Bangkok, Hanoi, Jakarta</option>
                                 <option value="(UTC+07:00) Novosibirsk" label="(UTC+07:00) Novosibirsk">(UTC+07:00) Novosibirsk</option>
                                 <option value="(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi" label="(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi">(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                 <option value="(UTC+08:00) Krasnoyarsk" label="(UTC+08:00) Krasnoyarsk">(UTC+08:00) Krasnoyarsk</option>
                                 <option value="(UTC+08:00) Kuala Lumpur, Singapore" label="(UTC+08:00) Kuala Lumpur, Singapore">(UTC+08:00) Kuala Lumpur, Singapore</option>
                                 <option value="(UTC+08:00) Perth" label="(UTC+08:00) Perth">(UTC+08:00) Perth</option>
                                 <option value="(UTC+08:00) Taipei" label="(UTC+08:00) Taipei">(UTC+08:00) Taipei</option>
                                 <option value="(UTC+08:00) Ulaanbaatar" label="(UTC+08:00) Ulaanbaatar">(UTC+08:00) Ulaanbaatar</option>
                                 <option value="(UTC+09:00) Irkutsk" label="(UTC+09:00) Irkutsk">(UTC+09:00) Irkutsk</option>
                                 <option value="(UTC+09:00) Osaka, Sapporo, Tokyo" label="(UTC+09:00) Osaka, Sapporo, Tokyo">(UTC+09:00) Osaka, Sapporo, Tokyo</option>
                                 <option value="(UTC+09:00) Seoul" label="(UTC+09:00) Seoul">(UTC+09:00) Seoul</option>
                                 <option value="(UTC+09:30) Adelaide" label="(UTC+09:30) Adelaide">(UTC+09:30) Adelaide</option>
                                 <option value="(UTC+09:30) Darwin" label="(UTC+09:30) Darwin">(UTC+09:30) Darwin</option>
                                 <option value="(UTC+10:00) Brisbane" label="(UTC+10:00) Brisbane">(UTC+10:00) Brisbane</option>
                                 <option value="(UTC+10:00) Canberra, Melbourne, Sydney" label="(UTC+10:00) Canberra, Melbourne, Sydney">(UTC+10:00) Canberra, Melbourne, Sydney</option>
                                 <option value="(UTC+10:00) Guam, Port Moresby" label="(UTC+10:00) Guam, Port Moresby">(UTC+10:00) Guam, Port Moresby</option>
                                 <option value="(UTC+10:00) Hobart" label="(UTC+10:00) Hobart">(UTC+10:00) Hobart</option>
                                 <option value="(UTC+10:00) Yakutsk" label="(UTC+10:00) Yakutsk">(UTC+10:00) Yakutsk</option>
                                 <option value="(UTC+11:00) Solomon Is., New Caledonia" label="(UTC+11:00) Solomon Is., New Caledonia">(UTC+11:00) Solomon Is., New Caledonia</option>
                                 <option value="(UTC+11:00) Vladivostok" label="(UTC+11:00) Vladivostok">(UTC+11:00) Vladivostok</option>
                                 <option value="(UTC+12:00) Auckland, Wellington" label="(UTC+12:00) Auckland, Wellington">(UTC+12:00) Auckland, Wellington</option>
                                 <option value="(UTC+12:00) Coordinated Universal Time+12" label="(UTC+12:00) Coordinated Universal Time+12">(UTC+12:00) Coordinated Universal Time+12</option>
                                 <option value="(UTC+12:00) Fiji" label="(UTC+12:00) Fiji">(UTC+12:00) Fiji</option>
                                 <option value="(UTC+12:00) Magadan" label="(UTC+12:00) Magadan">(UTC+12:00) Magadan</option>
                                 <option value="(UTC+12:00) Petropavlovsk-Kamchatsky - Old" label="(UTC+12:00) Petropavlovsk-Kamchatsky - Old">(UTC+12:00) Petropavlovsk-Kamchatsky - Old</option>
                                 <option value="(UTC+13:00) Nuku'alofa" label="(UTC+13:00) Nuku'alofa">(UTC+13:00) Nuku'alofa</option>
                                 <option value="(UTC+13:00) Samoa" label="(UTC+13:00) Samoa">(UTC+13:00) Samoa</option>
                              </select>
                           </div>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div class="row">
               <div class="col-md-2 s_margin_bottom">
                  <button type="submit" class="btn">Publish Host</button>
               </div>
            </div>
           </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="section-choice-mcqs-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <form class="pull-left">
                 <span id="add_selected_question_span">Select the question(s) and enter marks</span>
                 <input type="hidden" name="public_mcq_id" id="public_question_mcq_id" style="color: black;">
                 <button type="submit" class="btn s_save_button s_font hidden" id="add_selected_question_button" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
               </form>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Clear selection</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">MCQ Library <span>(section- 22318047)</span></h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="panel panel-default">
                     <div class="panel-heading"><i class="fa fa-filter"></i> Filters</div>
                     <div class="panel-body">
                        <form action="">
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Tags</strong></label>
                              <div class="">
                                 <select id="tag_multi" multiple="multiple">
                                    <option value="1">Aptitude</option>
                                    <option value="2">Basic Algebra</option>
                                    <option value="3">HTML and CSS</option>
                                    <option value="4">JAVA</option>
                                    <option value="5">C#</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                             <label class="control-label">Level</label>
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_easy" checked>Easy
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_medium">Medium
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_hard">Hard
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_all">All
                                      </label>
                                   </div>
                                </div>
                             </div>
                           </div>

                           <div class="moreSettings_button" onclick="moreSettings()" style="margin-bottom:5px;">
                             More
                           </div>
                           <div class="moreSettings hidden">

                             <div class="form-group form-group-sm">
                                <label class="control-label"><strong>Question Id</strong></label>
                                <div class="">
                                   <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                                </div>
                             </div>
                             <div class="form-group form-group-sm">
                                <label class="control-label"><strong>Question Statement</strong></label>
                                <div class="">
                                   <input type="text" class="form-control" name="" value="" required="" placeholder="Enter question statement">
                                </div>
                             </div>

                           </div>

                           <button class="btn btn-sm btn-success">Apply</button>
                           <button class="btn btn-sm btn-default">Reset</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-9 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="pill" href="#sections-MC-public-question">Public Question (10)</a></li>
                     <li><a data-toggle="pill" href="#sections-MC-private-question">Private Question (10)</a></li>
                     <li class="pull-right"></li>
                  </ul>
                  <div class="tab-content">
                     <div id="sections-MC-public-question" class="tab-pane fade in active">
                        <div class="no-more-tables">
                           <table class="table s_table">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" class="codeQuesCheck_public_question_mcq"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox" class="public_question_mcq" value="1"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_1"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_1">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-8 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="public_question_mcq" value="2"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_2"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_2">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="public_question_mcq" value="3"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_3"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_3">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div id="sections-MC-private-question" class="tab-pane fade">
                        <div class="no-more-tables">
                           <table class="table s_table">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" class="codeQuesCheck_private_question_mcq"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox" class="private_question_mcq" value="9"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_4"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_4">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul class="ng-scope">
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text"  value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="private_question_mcq" value="256"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_5"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_5">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul class="ng-scope">
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="private_question_mcq" value="23"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_6"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_6">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul >
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Coding Modal -->
<!-- section-coding-add-compilable-question-Modal -->
<div class="modal fade" id="section-coding-add-compilable-question-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
         <form action="{{route('create_question_coding')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
         <input type="hidden" name="section_id" id="section_id_2" value="">
         <input type="hidden" name="question_type_id" value="2">
         <input type="hidden" name="question_sub_types_id" value="2">
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <span>Please add the question title </span>
                    <button type="submit" class="btn s_save_button s_font">Save</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Coding Question234</h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Question State -->
                        <div class="modal-content s_modal s_blue_color_modal">
                            <div class="modal-header s_modal_header s_blue_color_header">
                                <h4 class="modal-title s_font">Question State</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question State
                                        <div class="s_popup">

                                          <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented."> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                            </span>-->
                                        </div>
                                    </strong>
                                </div>
                                <div>
                                  <label class="container_radio border_radio_left">STAGE
                                  <input type="radio" name="`" value="1" disabled>
                                  <span class="checkmark"></span>
                                  </label>
                                  <label class="container_radio">READY
                                  <input type="radio" checked="checked" name="question_state_id" value="2">
                                  <span class="checkmark"></span>
                                  </label>
                                  <label class="container_radio border_radio_right">ABANDONED
                                  <input type="radio" name="question_state_id" value="3" disabled>
                                  <span class="checkmark"></span>
                                  </label>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Program Title
                                                    <div class="s_popup">
                                                        <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library."> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library.
                                            </span>-->
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" name="coding_program_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement">
                                    <strong>Program Statement (<a href="#section-coding-add-compilable-question-Modal-Collapse" data-toggle="modal" onclick="code_edittesttemplate_Collapse()" >Expand</a>)  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library."> <i class="fa fa-info-circle"> </i></a></strong>
                                </div>
                                <textarea class="edit"></textarea>
                                <br>
                                <div class="panel panel-pagedown-preview hidden" id="code_edittemp_panel">
                                  <div class="panel-heading">
                                    <strong>Preview</strong>
                                  </div>
                                  <div class="panel-body">
                                    <p id="code_preview_data_section_expand"></p>
                                  </div>
                                </div>
                                <br>

                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Sample Input & Output
                                        <div class="s_popup">
                                           <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramSamples <br>

                                            </span>-->
                                        </div>
                                    </strong>
                                    <div class="heading_modal_statement heading_padding_bottom">

                                    <div class="no-more-tables ">
                                        <table class="table s_table" id="section_coding_table">
                                            <thead>
                                                <th></th>
                                                <th>Input</th>
                                                <th>Output</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="coding_input[]" required=""></textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="coding_output[]" required=""></textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <a class="delete_row">
                                                        <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-align-center">
                                                        <button type="button" class="btn" onclick="addrow_section_codingquestion()">+ Add Sample Test Case</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Test Cases -->
                        <div class="modal-content s_modal s_green_color_modal">
                            <div class="modal-header s_modal_header s_green_color_header">
                                <h4 class="modal-title s_font">Test Cases</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Test Cases
                                         <div class="s_popup">
                                           <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramTestcases <br>

                                            </span>-->
                                        </div>
                                    </strong>
                                    <strong class="pull-right">
                                      <input type="checkbox" name="weightage_status" id="weightage_status" value="1" checked>
                                      Equalize Weightage,
                                      <strong class="text-success weightage_blink_success">Total: 100%</strong>
                                      <strong class="text-danger weightage_blink_error hidden">Total: 1001% (&gt; 100%)</strong>
                                    </strong>
                                    <!-- id="weightage_row" -->
                                    <table class="table s_table" id="weightage_code_table">
                                        <thead>
                                            <th></th>
                                            <th class="col-md-2">Name</th>
                                            <th class="col-md-3">Input</th>
                                            <th class="col-md-3">Output</th>
                                            <th class="col-md-4 text-center">Weightage</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <hr>
                                   <button type="button" class="btn" id="weightage_code_add_row">+ Add Test Case as Text</button>
                                   <div class="s_uplosd_btn f_upload_btn">
                                     Upload Test Case Files
                                     <input type="file" name="test_case_file" >
                                   </div>
                                    <a href="#">Test case file format</a>
                                    <div class="checkbox s_margin_0">
                                        <label>
                                        <input type="checkbox" name="test_case_verify">Verify the Test Cases
                                        </label>
                                    </div>
                                    <p>Test Cases should be added/uploaded</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Default Codes -->
                        <!-- <div class="modal-content s_modal s_yellow_color_modal">
                            <div class="modal-header s_modal_header s_yellow_color_header">
                                <h4 class="modal-title s_font">Default Codes</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <div class="checkbox s_margin_0">
                                        <label>
                                        <input type="checkbox">
                                        <strong>
                                        Add Default Codes for the Question
                                         <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              These codes will be provided to the candidate during the test will be the only allowed languages for which the code is provided. <br>

                                            </span>
                                        </div>
                                        <a href="#"> Advanced</a>
                                        </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <br>
                        <!--  Question Details -->
                        <div class="modal-content s_modal s_gray_color_modal">
                           <div class="modal-header s_modal_header s_gray_color_header">
                              <h4 class="modal-title s_font"> Question Details</h4>
                           </div>
                           <div class="modal-body s_modal_body">
                              <div class="form-group form-group-sm">
                                 <strong>Marks for this Question <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                 <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                              </div>
                              <div class="form-group form-group-sm">
                                 <strong>Allowed languages <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label class="ng-binding">
                                          <input type="checkbox" name="allowed_languages_id[]" value="1" checked="checked"> JAVA
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label class="ng-binding">
                                          <input type="checkbox" name="allowed_languages_id[]" value="2" checked="checked"> C
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="3" checked="checked"> CPP
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="4" checked="checked"> PYTHON
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="5" checked="checked"> RUBY
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="6" checked="checked"> PHP
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="7" checked="checked"> JAVASCRIPT
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="8" checked="checked"> CSHARP
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="9" checked="checked"> R
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom">
                                 <strong>Tags <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                              <div class="form-group-sm">
                                 <div class="row">
                                    <div class="col-md-3">
                                       <select name="tag_id" class="form-control">
                                         <option value="add Tag" disabled="">Add Tag</option>
                                          @foreach($tags as $value)
                                           <option value="{{$value->id}}">{{$value->tag_name}}</option>
                                         @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom"><br>
                                 <strong>Question Level <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                              <div class="heading_padding_bottom">
                                 <label class="container_radio border_radio_left">Easy
                                 <input type="radio" checked="checked" value="1" name="question_level_id">
                                 <span class="checkmark"></span>
                                 </label>
                                 <label class="container_radio">Medium
                                 <input type="radio" name="question_level_id" value="2">
                                 <span class="checkmark"></span>
                                 </label>
                                 <label class="container_radio border_radio_right">Hard
                                 <input type="radio" name="question_level_id" value="3">
                                 <span class="checkmark"></span>
                                 </label>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="provider" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Author <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="author" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <!--  Solution Details (Optional) -->
                          <div class="modal-content s_modal s_gray_color_modal">
                       <div class="modal-header s_modal_header s_gray_color_header">
                          <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Text <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="text" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Code <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="code" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>URL <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="url" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                          </div>
                          <!--<input type="file" name="solution_media">-->
                           <div class="f_upload_btn">
                                    Upload Files
                                    <input type="file" name="">
                                </div>
                       </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
<div class="modal fade" id="section-coding-add-compilable-question-Modal-Collapse" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
       <div class="modal-body s_modal_form_body">
          <div class="row">
            <div class="col-md-12">
              <strong>Question Statement (<span class="collapse_pointer" onclick="code_collapse_modal()" >Collapse</span>)</strong>
              <span class="text-danger"> Please add atleast 3 characters in the statement</span><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <textarea class="edit"></textarea>
            </div>
            <div class="col-md-6">
              <div class="panel panel-pagedown-preview">
                <div class="panel-heading">
                  <strong>Preview</strong>
                </div>
                <div class="panel-body" style="height: 647px;">
                  <p id="code_preview_data_section"></p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>

<!-- section-coding-debug-Modal -->
<!-- Coding Modal -->
<!-- Coding Modal Second Type -->
<div class="modal fade" id="section-coding-debug-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <form action="{{route('create_question_coding_debug')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
         <input type="hidden" name="section_id" id="section_id_4" value="">
         <input type="hidden" name="question_type_id" value="2">
         <input type="hidden" name="question_sub_types_id" value="3">
         <div class="modal-content">
            <div class="modal-header s_modal_form_header">
               <div class="pull-right">
                  <span>Please add the question title </span>
                  <button type="submit" class="btn s_save_button s_font">Save</button>
                  <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
               </div>
               <h3 class="modal-title s_font">Coding Question123</h3>
            </div>
            <div class="modal-body s_modal_form_body">
               <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                     <!-- Question State -->
                     <div class="modal-content s_modal s_blue_color_modal">
                        <div class="modal-header s_modal_header s_blue_color_header">
                           <h4 class="modal-title s_font">Question</h4>
                        </div>
                        <div class="modal-body s_modal_body">
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Question State <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" This optional field is meant to contain the organization name that serves as the provider of the question. "> <i class="fa fa-info-circle"> </i></a></strong>
                           </div>
                             <div>
                               <label class="container_radio border_radio_left">STAGE
                               <input type="radio" name="`" value="1" disabled>
                               <span class="checkmark"></span>
                               </label>
                               <label class="container_radio">READY
                               <input type="radio" checked="checked" name="question_state_id" value="2">
                               <span class="checkmark"></span>
                               </label>
                               <label class="container_radio border_radio_right">ABANDONED
                               <input type="radio" name="question_state_id" value="3" disabled>
                               <span class="checkmark"></span>
                               </label>
                             </div>
                           <hr>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Program Title  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" This optional field is meant to contain the organization name that serves as the provider of the question. "> <i class="fa fa-info-circle"> </i></a></strong>
                                    </div>
                                    <input type="text" name="coding_program_title" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="heading_modal_statement">
                              <strong>Program Statement (<a href="#section-coding-add-compilable-question-Modal-Collapse" data-toggle="modal" onclick="code_debug_Collapse()">Expand</a>) <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" This optional field is meant to contain the organization name that serves as the provider of the question. "> <i class="fa fa-info-circle"> </i></a></strong>
                           </div>
                           <textarea name="question_statement" class="edit"></textarea>
                           <br>
                           <div class="panel panel-pagedown-preview hidden" id="code_debug_panel">
                             <div class="panel-heading">
                               <strong>Preview</strong>
                             </div>
                             <div class="panel-body">
                               <p id="code_preview_data_debug_expand"></p>
                             </div>
                           </div>
                           <br>
                        </div>
                     </div>
                     <br>
                     <!-- Test Cases -->
                         <div class="modal-content s_modal s_green_color_modal">
                               <div class="modal-header s_modal_header s_green_color_header">
                                   <h4 class="modal-title s_font">Test Cases</h4>
                               </div>
                               <div class="modal-body s_modal_body">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Test Cases
                                            <div class="s_popup">
                                             <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a>
                                               <!--<i class="fa fa-info-circle"> </i>
                                               <span class="s_popuptext">
                                                  htmlTooltip.modalProgramTestcases <br>
                                               </span>-->
                                           </div>
                                       </strong>
                                       <strong class="pull-right">
                                       <input type="checkbox" name="weightage_status" id="weightage_edit_status" value="1" checked>
                                       Equalize Weightage,
                                       <strong class="text-success weightage_edit_blink_success">Total: 100%</strong>
                                       <strong class="text-danger weightage_edit_blink_error hidden">Total: 1001% (&gt; 100%)</strong>
                                       </strong>
                                       <table class="table s_table" id="weightage_edit_code_table">
                                           <thead>
                                               <th></th>
                                               <th class="col-md-2">Name</th>
                                               <th class="col-md-3">Input</th>
                                               <th class="col-md-3">Output</th>
                                               <th class="col-md-4 text-center">Weightage</th>
                                           </thead>
                                           <tbody>
                                           </tbody>
                                       </table>
                                       <hr>
                                       <button type="button" class="btn"  id="weightage_edit_code_add_row">+ Add Test Case as Text</button>
                                      <div class="s_uplosd_btn f_upload_btn">
                                        Upload Test Case Files
                                        <input type="file" name="test_case_file" >
                                      </div>
                                       <a href="#">Test case file format</a>
                                       <div class="checkbox s_margin_0">
                                           <label>
                                           <input type="checkbox" name="test_case_verify" value="1">Verify the Test Cases
                                           </label>
                                       </div>

                                       <p>Test Cases should be added/uploaded</p>
                                   </div>
                               </div>
                           </div>
                           <br>
                     <!-- Default Codes -->
                     <div class="modal-content s_modal s_yellow_color_modal hidden">
                        <div class="modal-header s_modal_header s_yellow_color_header">
                           <h4 class="modal-title s_font">Default Codes</h4>
                        </div>
                        <div class="modal-body s_modal_body">
                           <div>
                              <div class="debug-code">
                                 <div class="ace-editor-header">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group form-group-sm no-margin">
                                             <label class="control-label no-margin">
                                             <small>Language</small>
                                             </label>
                                             <label class="control-label no-margin ng-hide">
                                             <small><span class="ng-binding">JAVA</span></small>
                                             </label>
                                             <select class="form-control">
                                                <option value="string:JAVA" label="JAVA" selected="selected">JAVA</option>
                                                <option value="string:C" label="C">C</option>
                                                <option value="string:CPP" label="CPP">CPP</option>
                                                <option value="string:PYTHON" label="PYTHON">PYTHON</option>
                                                <option value="string:RUBY" label="RUBY">RUBY</option>
                                                <option value="string:PHP" label="PHP">PHP</option>
                                                <option value="string:JAVASCRIPT" label="JAVASCRIPT">JAVASCRIPT</option>
                                                <option value="string:CSHARP" label="CSHARP">CSHARP</option>
                                                <option value="string:R" label="R">R</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-9">
                                          <br>
                                          <span class="text-danger">For <b>JAVA</b>, the class name needs to be <b>Main</b></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="10" id="comment"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <!--  Question Details -->
                     <div class="modal-content s_modal s_gray_color_modal">
                        <div class="modal-header s_modal_header s_gray_color_header">
                           <h4 class="modal-title s_font"> Question Details</h4>
                        </div>
                        <div class="modal-body s_modal_body">
                           <div class="form-group form-group-sm">
                              <strong>Marks for this Question  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                              <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                           </div>
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Tags  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
                           </div>
                           <div class="form-group-sm">
                              <div class="row">
                                 <div class="col-md-3">
                                    <select name="tag_id" class="form-control">
                                      <option value="add Tag" disabled="">Add Tag</option>
                                       @foreach($tags as $value)
                                        <option value="{{$value->id}}">{{$value->tag_name}}</option>
                                      @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Question Level  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                           </div>
                             <div class="heading_padding_bottom">
                                    <label class="container_radio border_radio_left">Easy
                                    <input type="radio" checked="checked" value="1" name="question_level_id">
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">Medium
                                    <input type="radio" name="question_level_id" value="2">
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio border_radio_right">Hard
                                    <input type="radio" name="question_level_id" value="3">
                                    <span class="checkmark"></span>
                                    </label>
                                 </div>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Provider  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                                    </div>
                                    <input type="text" name="provider" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Author  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                                    </div>
                                    <input type="text" name="author" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <!--  Solution Details (Optional) -->
                                   <div class="modal-content s_modal s_gray_color_modal">
                            <div class="modal-header s_modal_header s_gray_color_header">
                               <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                             <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                   <div class="form-group form-group-sm">
                                      <div class="heading_modal_statement heading_padding_bottom">
                                         <strong>Text  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                                      </div>
                                      <textarea min="0" class="form-control" name="text" style=""></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                   <div class="form-group form-group-sm">
                                      <div class="heading_modal_statement heading_padding_bottom">
                                         <strong>Code  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                                      </div>
                                      <textarea min="0" class="form-control" name="code" style=""></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                   <div class="form-group form-group-sm">
                                      <div class="heading_modal_statement heading_padding_bottom">
                                         <strong>URL  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                                      </div>
                                      <textarea min="0" class="form-control" name="url" style=""></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="heading_modal_statement heading_padding_bottom">
                                <strong>Files  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramTestcases <br> "> <i class="fa fa-info-circle"> </i></a></strong>
                             </div>
                             <!--<input type="file" name="solution_media">-->
                               <div class="f_upload_btn">
                                    Upload Files
                                    <input type="file" name="">
                                </div>
                          </div>
                       </div>
                  </div>
               </div>
            </div>
         </div>
   </form>
   </div>
</div>
<div class="modal fade" id="section-coding-debug-Modal-Collapse" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
       <div class="modal-body s_modal_form_body">
          <div class="row">
            <div class="col-md-12">
              <strong>Question Statement (<span class="collapse_pointer" onclick="code_collapse_modal()" >Collapse</span>)</strong>
              <span class="text-danger"> Please add atleast 3 characters in the statement</span><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <textarea class="edit"></textarea>
            </div>
            <div class="col-md-6">
              <div class="panel panel-pagedown-preview">
                <div class="panel-heading">
                  <strong>Preview</strong>
                </div>
                <div class="panel-body" style="height: 647px;">
                  <p id="code_preview_data_debug"></p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>

<!-- Coding Modal Second Type-->

<!-- section-debug-Modal -->
<div class="modal fade" id="section-choice-debug-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
              <form class="pull-left">
                <span id="add_selected_question_code_span">Select the question(s) and enter marks</span>
                <input type="hidden" name="public_mcq_id" id="public_code_question_mcq_id" style="color: black;">
                <button type="submit" class="btn s_save_button s_font hidden" id="add_selected_question_code_button" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
              </form>
              <button type="button" class="btn btn-default s_font" data-dismiss="modal">Clear selection</button>
              <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">MCQ Library <span>(section- 22318047)</span></h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="panel panel-default">
                     <div class="panel-heading"><i class="fa fa-filter"></i> Filters</div>
                     <div class="panel-body">
                        <form action="">
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Tags</strong></label>
                              <div class="">
                                 <select id="tag_multi_choose" multiple="multiple">
                                    <option value="1">Aptitude</option>
                                    <option value="2">Basic Algebra</option>
                                    <option value="3">HTML and CSS</option>
                                    <option value="4">JAVA</option>
                                    <option value="5">C#</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                             <label class="control-label">Level</label>
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_easy" checked>Easy
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_medium">Medium
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_hard">Hard
                                      </label>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="checkbox no-margin">
                                      <label>
                                      <input type="checkbox" class="level_all">All
                                      </label>
                                   </div>
                                </div>
                             </div>
                           </div>

                           <div class="moreSettings_button_code" onclick="moreSettings_code()" style="margin-bottom:5px;">
                             More
                           </div>
                           <div class="moreSettings_code hidden">

                             <div class="form-group form-group-sm">
                                <label class="control-label"><strong>Question Id</strong></label>
                                <div class="">
                                   <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                                </div>
                             </div>
                             <div class="form-group form-group-sm">
                                <label class="control-label"><strong>Question Statement</strong></label>
                                <div class="">
                                   <input type="text" class="form-control" name="" value="" required="" placeholder="Enter question statement">
                                </div>
                             </div>

                           </div>

                           <button class="btn btn-sm btn-success">Apply</button>
                           <button class="btn btn-sm btn-default">Reset</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-9 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="pill" href="#sections-codind-debug-public-question">Public Question (10)</a></li>
                     <li><a data-toggle="pill" href="#sections-codind-debug-private-question">Private Question (10)</a></li>
                     <li class="pull-right"></li>
                  </ul>
                  <div class="tab-content">
                     <div id="sections-codind-debug-public-question" class="tab-pane fade in active">
                        <div class="no-more-tables">
                           <table class="table s_table">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" class="codeQuesCheck_public_code_question_mcq"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox" class="public_code_question_mcq" value="1"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_1"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_1">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &nbsp;&nbsp;
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-8 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="public_code_question_mcq" value="2"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_2"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_2">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="public_code_question_mcq" value="3"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_3"></i>
                                          <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_3">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row s_small">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <ul class="ng-scope">
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" new&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="_blank"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               &lt;a href="url" target="new"&gt;
                                                            </li>
                                                            <li>
                                                               <i class="fa fa-square-o" aria-hidden="true"></i>
                                                               None of the above
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div id="sections-codind-debug-private-question" class="tab-pane fade">
                        <div class="no-more-tables">
                           <table class="table s_table">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" class="codeQuesCheck_private_code_question_mcq"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox" class="private_code_question_mcq" value="9"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_4"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_4">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul class="ng-scope">
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text"  value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="private_code_question_mcq" value="256"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_5"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_5">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul class="ng-scope">
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" class="private_code_question_mcq" value="23"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_6"></i>
                                       <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_6">
                                          <div class="panel-heading">Question Statement</div>
                                          <div class="panel-body">
                                             <div class="clearfix">
                                                <div class="row s_small">
                                                   <div class="col-xs-12">
                                                      <small>How can you open a link in a new tab/browser window?</small>
                                                   </div>
                                                   <div class="col-xs-12">
                                                      <h5>Choices</h5>
                                                      <ul >
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                                            &lt;a href="url" new&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            &lt;a href="url" target="_blank"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            &lt;a href="url" target="new"&gt;
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>

                                                            None of the above
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <span class="no-underline">What is PEAR in PHP?</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="description text-muted">
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                   <div class="col-xs-6">
                                                      <span class="text-muted">Level</span>
                                                      <span class="conjunction"> : </span>Medium
                                                   </div>
                                                   <div class="col-xs-6 no-padding-left">
                                                      <span class="text-muted">Tag</span>
                                                      <span class="conjunction"> : </span>PHP
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <input type="text" value="10" class="form-control allow_number" disabled>
                                    </td>
                                    <td>
                                       <input type="text" class="form-control allow_number" disabled>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- section-submission-question-Modal-First-Submission -->
<div class="modal fade" id="section-submission-question-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <form action="{{route('create_first_submission_question')}}" method="POST" enctype="multipart/form-data">
           {{csrf_field()}}
        <input type="hidden" name="section_id" id="section_id_5" value="">
        <input type="hidden" name="question_sub_types_id" value="4">
        <input type="hidden" name="question_type_id" value="3">
         <div class="modal-content">
            <div class="modal-header s_modal_form_header">
               <div class="pull-right">
                  <span>Please add atleast 3 characters in the question statement </span>
                  <button type="submit" class="btn s_save_button s_font" >Save</button>
                  <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
               </div>
               <h3 class="modal-title s_font">Submission Question</h3>
            </div>
            <div class="modal-body s_modal_form_body">
               <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                     <!-- Question State -->
                     <div class="modal-content s_modal s_blue_color_modal">
                        <div class="modal-header s_modal_header s_blue_color_header">
                           <h4 class="modal-title s_font">Question Statement</h4>
                        </div>
                        <div class="modal-body s_modal_body">
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Question State <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                           </div>
                              <div>
                                   <label class="container_radio border_radio_left">STAGE
                                   <input type="radio" checked="checked" name="question_state_id" value="1">
                                   <span class="checkmark"></span>
                                   </label>
                                   <label class="container_radio">READY
                                   <input type="radio" name="question_state_id" value="2">
                                   <span class="checkmark"></span>
                                   </label>
                                   <label class="container_radio border_radio_right">ABANDONED
                                   <input type="radio" name="question_state_id" value="3">
                                   <span class="checkmark"></span>
                                   </label>
                               </div>
                           <hr>
                           <hr>
                           <div class="heading_modal_statement">
                              <strong>Question Statement (<a href="#section-submission-question-Modal-collapse" data-toggle="modal" onclick="submission_edittesttemplate_Collapse()" >Expand</a>) <i class="fa fa-info-circle"></i></strong>
                           </div>
                           <textarea name="question_statement" class="edit"></textarea>
                           <br>
                           <div class="panel panel-pagedown-preview hidden" id="submission_edittemp_panel">
                             <div class="panel-heading">
                               <strong>Preview</strong>
                             </div>
                             <div class="panel-body">
                               <p id="submission_preview_data_section_expand"></p>
                             </div>
                           </div>

                           <div class="checkbox hidden">
                              <label>
                              <input type="checkbox"> Enable code modification and show difference
                              </label>
                              <br>
                              <label class="control-label" style="color: #999;">
                              (The candidate will be asked to modify the code and the differences will be shown in the report)
                              </label>
                           </div>
                        </div>
                     </div>
                     <br>
                     <!-- Media and Resources -->
                     <div class="modal-content s_modal s_green_color_modal">
                        <div class="modal-header s_modal_header s_green_color_header">
                           <h4 class="modal-title s_font">Media and Resources</h4>
                        </div>
                         <div class="modal-body s_modal_body">
                           <div class="heading_modal_statement heading_padding_bottom">
                              <div class="f_upload_btn">
                                 Upload Media
                                 <input type="file" name="media">
                             </div>
                              <br>
                             <!--  <strong>
                              Resources
                              <i class="fa fa-info-circle"></i>
                              </strong>
                              <label class="control-label">
                              (These resources will be available for the candidate to download during the test)
                              </label>
                              <div class="s_pur_body">
                                 <button type="button" class="btn"> + Add resources</button>
                              </div> -->
                              <hr>
                              <strong>
                              Candidate can use
                              <i class="fa fa-info-circle"></i>
                              </strong>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="1"> Images</label>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="2"> URLs</label>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="3"> Files</label>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="4"> Text</label>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="5"> Code</label>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox" name="help_material_name[]" value="6"> Audio</label>
                              </div>
                              <span class="input-group input-group-sm">
                              <span class="input-group-addon s_addon ">Limit</span>
                              <input type="number" name="submission_limit" class="form-control" min="1" style="height:30px; width:70px;">
                              <span class="input-group-addon s_addon">seconds</span>
                              </span>
                           </div>
                        </div>
                        <br>
                        <!--  Question Details -->
                        <div class="modal-content s_modal s_gray_color_modal">
                           <div class="modal-header s_modal_header s_gray_color_header">
                              <h4 class="modal-title s_font"> Question Details</h4>
                           </div>
                           <div class="modal-body s_modal_body">
                              <div class="form-group form-group-sm" >
                                 <label>Marks for this Question <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></label>
                                 <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom">
                                 <strong>Question Level <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                                <div class="heading_padding_bottom">
                                   <label class="container_radio border_radio_left">Easy
                                   <input type="radio" checked="checked" name="question_level_id" value="1">
                                   <span class="checkmark"></span>
                                   </label>
                                   <label class="container_radio">Medium
                                   <input type="radio" name="question_level_id" value="2">
                                   <span class="checkmark"></span>
                                   </label>
                                   <label class="container_radio border_radio_right">Hard
                                   <input type="radio" name="question_level_id" value="3">
                                   <span class="checkmark"></span>
                                   </label>
                                </div>
                              <div class="heading_modal_statement heading_padding_bottom">
                                 <strong>Tags <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
                              </div>
                              <div class="form-group-sm">
                                 <div class="row">
                                    <div class="col-md-3">
                                        <select name="tag_id" class="form-control">
                                           <option value="add Tag" disabled="">Add Tag</option>
                                            @foreach($tags as $value)
                                             <option value="{{$value->id}}">{{$value->tag_name}}</option>
                                           @endforeach
                                         </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="provider" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Author <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="author" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <!--   Evaluation Parameters (Optional) -->
                        <div class="modal-content s_modal s_orange_color_modal">
                           <div class="modal-header s_modal_header s_orange_color_header">
                              <h4 class="modal-title s_font">  Evaluation Parameters (Optional)</h4>
                           </div>
                           <div class="modal-body s_modal_body">
                             <div class="row">
                               <div class="col-md-10">
                                 <div class="no-more-tables">
                                   <table class="table s_table" id="weightage_table">
                                     <thead>
                                       <th>Title</th>
                                       <th colspan="3" class="text-center">
                                         Weightage (%)
                                         <div>
                                           <a class="equalize" style="font-weight:normal" >Equalize</a>
                                         </div>
                                       </th>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <td class="s_weight" valign="center">
                                           <div>
                                             <input type="text" class="form-control text-margin weightage_title" name="submission_evaluation_title[]" value="">
                                           </div>
                                         </td>
                                         <td valign="center">
                                           <div class="input-group input-group-sm">
                                             <input type="number" name="weightage[]" class="form-control weightage_no" style="width:60px;">
                                             <span class="input-group-addon" id="basic-addon1">%</span>
                                           </div>
                                         </td>
                                         <td valign="center" colspan="2">
                                           <button type="button" class="btn save_button" disabled>+ Save New</button>
                                         </td>
                                       </tr>
                                     </tbody>
                                   </table>
                                 </div>
                               </div>
                             </div>
                           </div>
                        </div>
                        <br>
                        <!--   Evaluation Parameters (Optional) -->
                        <div class="modal-content s_modal s_light_green_color_modal">
                           <div class="modal-header s_modal_header s_light_green_color_header">
                              <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                           </div>
                           <div class="modal-body s_modal_body">
                              <div class="row">
                                 <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Text <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <textarea min="0" class="form-control" name="text" style=""></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Code <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <textarea min="0" class="form-control" name="code" style=""></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>URL <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <textarea min="0" class="form-control" name="url" style=""></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom">
                                 <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                              <!--<button type="file" class="btn">Upload Files</button>-->
                               <div class="f_upload_btn">
                                    Upload Files
                                    <input type="file" name="solution_media">
                                </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<div class="modal fade" id="section-submission-question-Modal-collapse" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
       <div class="modal-body s_modal_form_body">
          <div class="row">
            <div class="col-md-12">
              <strong>Question Statement (<span class="collapse_pointer" onclick="submission_collapse_modal()" >Collapse</span>)</strong>
              <span class="text-danger"> Please add atleast 3 characters in the statement</span><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <textarea class="edit collapse_editor" name="sub_question_statement"></textarea>
            </div>
            <div class="col-md-6">
              <div class="panel panel-pagedown-preview">
                <div class="panel-heading">
                  <strong>Preview</strong>
                </div>
                <div class="panel-body" style="height: 647px;">
                  <p id="submission_preview_data_section_collapse"></p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>

<div class="modal fade" id="section-submission-fill-blanks-question-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <form action="{{route('create_second_submission_question')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
          <input type="hidden" name="section_id" id="section_id_6" value="">
          <input type="hidden" name="question_sub_types_id" value="5">
          <input type="hidden" name="question_type_id" value="3">
          <div class="modal-content">
             <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                   <span>Please add atleast 3 characters in the question statement </span>
                   <button type="submit" class="btn s_save_button s_font">Save</button>
                   <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Submission Question</h3>
             </div>
             <div class="modal-body s_modal_form_body">
                <div class="row">
                   <div class="col-md-10 col-md-offset-1">
                      <!-- Question State -->
                      <div class="modal-content s_modal s_blue_color_modal">
                         <div class="modal-header s_modal_header s_blue_color_header">
                            <h4 class="modal-title s_font">Question Statement</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                            <div class="heading_modal_statement heading_padding_bottom">
                               <strong>Question State  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                            </div>
                            <div>
                                <label class="container_radio border_radio_left">STAGE
                                <input type="radio" checked="checked" name="question_state_id" value="1">
                                <span class="checkmark"></span>
                                </label>
                                <label class="container_radio">READY
                                <input type="radio" name="question_state_id" value="2">
                                <span class="checkmark"></span>
                                </label>
                                <label class="container_radio border_radio_right">ABANDONED
                                <input type="radio" name="question_state_id" value="3">
                                <span class="checkmark"></span>
                                </label>
                            </div>
                            <hr>
                            <hr>
                            <div class="heading_modal_statement">
                               <strong>Question Statement (<a href="#section-submission-fill-blanks-question-Modal-collapse" data-toggle="modal" onclick="submission_fill_edittesttemplate_Collapse()">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                            </div>
                            <textarea class="edit"  name="question_statement"></textarea>
                            <br>
                            <div class="panel panel-pagedown-preview hidden" id="submission_fill_edittemp_panel">
                              <div class="panel-heading">
                                <strong>Preview</strong>
                              </div>
                              <div class="panel-body">
                                <p id="submission_fill_preview_data_section_expand"></p>
                              </div>
                            </div>
                         </div>
                      </div>
                      <br>
                      <!-- Media and Resources -->
                      <div class="modal-content s_modal s_green_color_modal">
                         <div class="modal-header s_modal_header s_green_color_header">
                            <h4 class="modal-title s_font">Media and Resources</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                            <div class="heading_modal_statement heading_padding_bottom">
                               <div class="">
                                  <h5><b>Media(Audio/Video)</b></h5>
                                  <div class="s_sbtn f_upload_btn">
                                            Upload Media
                                      <input type="file" name="media" >
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <br>
                      <!-- Fill In The Blanks Solution Details -->
                      <!-- <div class="modal-content s_modal s_yellow_light_color_modal">
                         <div class="modal-header s_modal_header s_yellow_light_green_color_header">
                            <h4 class="modal-title s_font">Fill In The Blanks Solution Details</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                            <h4>Enter Solutions for the Blanks</h4>
                         </div>
                      </div>
                      <br> -->
                      <!--  Question Details -->
                      <div class="modal-content s_modal s_gray_color_modal">
                         <div class="modal-header s_modal_header s_gray_color_header">
                            <h4 class="modal-title s_font"> Question Details</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                            <div class="form-group form-group-sm" >
                               <label>Marks for this Question  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></label>
                               <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                            </div>
                            <div class="heading_modal_statement heading_padding_bottom">
                               <strong>Question Level  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                            </div>
                            <div class="heading_padding_bottom">
                             <label class="container_radio border_radio_left">Easy
                             <input type="radio" checked="checked" name="question_level_id" value="1">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio">Medium
                             <input type="radio" name="question_level_id" value="2">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio border_radio_right">Hard
                             <input type="radio" name="question_level_id" value="3">
                             <span class="checkmark"></span>
                             </label>
                          </div>
                            <div class="heading_modal_statement heading_padding_bottom">
                               <strong>Tags  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
                            </div>
                            <div class="form-group-sm">
                               <div class="row">
                                  <div class="col-md-3">
                                    <select name="tag_id" class="form-control">
                                     <option value="add Tag" disabled="">Add Tag</option>
                                      @foreach($tags as $value)
                                       <option value="{{$value->id}}">{{$value->tag_name}}</option>
                                     @endforeach
                                   </select>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group form-group-sm">
                                     <div class="heading_modal_statement heading_padding_bottom">
                                        <strong>Provider  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                     </div>
                                     <input type="text" name="provider" class="form-control">
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group form-group-sm">
                                     <div class="heading_modal_statement heading_padding_bottom">
                                        <strong>Author  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                     </div>
                                     <input type="text" name="author" class="form-control">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <br>
                      <!--   Evaluation Parameters (Optional) -->
                      <div class="modal-content s_modal s_orange_color_modal">
                         <div class="modal-header s_modal_header s_orange_color_header">
                            <h4 class="modal-title s_font">  Evaluation Parameters (Optional)</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                           <div class="row">
                             <div class="col-md-10">
                                <div class="no-more-tables ">
                                  <table class="table s_table" id="weightage_fill_table">
                                    <thead>
                                      <th>Title</th>
                                      <th colspan="3" class="text-center">
                                        Weightage (%)
                                        <div>
                                          <a class="equalize" style="font-weight:normal" >Equalize</a>
                                        </div>
                                      </th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="s_weight" valign="center">
                                          <div>
                                            <input type="text" class="form-control text-margin weightage_title" name="submission_evaluation_title[]" value="">
                                          </div>
                                        </td>
                                        <td valign="center">
                                          <div class="input-group input-group-sm">
                                            <input type="number" name="weightage[]" class="form-control weightage_no" style="width:60px;">
                                            <span class="input-group-addon" id="basic-addon1">%</span>
                                          </div>
                                        </td>
                                        <td valign="center" colspan="2">
                                          <button type="button" class="btn save_button" disabled>+ Save New</button>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                             </div>
                           </div>
                         </div>
                      </div>
                      <br>
                      <!--   Evaluation Parameters (Optional) -->
                      <div class="modal-content s_modal s_light_green_color_modal">
                         <div class="modal-header s_modal_header s_light_green_color_header">
                            <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                         </div>
                         <div class="modal-body s_modal_body">
                            <div class="row">
                               <div class="col-md-3 col-sm-12 col-xs-12">
                                  <div class="form-group form-group-sm">
                                     <div class="heading_modal_statement heading_padding_bottom">
                                        <strong>Text  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                     </div>
                                     <textarea min="0" class="form-control" name="text" style=""></textarea>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-md-3 col-sm-12 col-xs-12">
                                  <div class="form-group form-group-sm">
                                     <div class="heading_modal_statement heading_padding_bottom">
                                        <strong>Code  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                     </div>
                                     <textarea min="0" class="form-control" name="code" style=""></textarea>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-md-3 col-sm-12 col-xs-12">
                                  <div class="form-group form-group-sm">
                                     <div class="heading_modal_statement heading_padding_bottom">
                                        <strong>URL  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                     </div>
                                     <textarea min="0" class="form-control" name="url" style=""></textarea>
                                  </div>
                               </div>
                            </div>
                            <div class="heading_modal_statement heading_padding_bottom">
                               <strong>Files  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Provide the solution to the question in files if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                            </div>
                             <input type="file" name="solution_media">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
      </form>
   </div>
</div>
<div class="modal fade" id="section-submission-fill-blanks-question-Modal-collapse" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
       <div class="modal-body s_modal_form_body">
          <div class="row">
            <div class="col-md-12">
              <strong>Question Statement (<span class="collapse_pointer" onclick="submission_fill_collapse_modal()" >Collapse</span>)</strong>
              <span class="text-danger"> Please add atleast 3 characters in the statement</span><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <textarea class="edit collapse_editor" name="sub_fill_question_statement"></textarea>
            </div>
            <div class="col-md-6">
              <div class="panel panel-pagedown-preview">
                <div class="panel-heading">
                  <strong>Preview</strong>
                </div>
                <div class="panel-body" style="height: 647px;">
                  <p id="submission_fill_preview_data_section_collapse"></p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>

<!-- section-debug-Modal -->
<div class="modal fade" id="section-submission-fill-blanks-choice-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header s_modal_form_header">
           <div class="pull-right">
             <form class="pull-left">
               <span id="add_submission_question_code_span">Select the question(s) and enter marks</span>
               <input type="hidden" name="public_mcq_id" id="private_submission_question_mcq_id" style="color: black;">
               <button type="submit" class="btn s_save_button s_font hidden" id="add_submission_question_code_button" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
             </form>
             <button type="button" class="btn btn-default s_font" data-dismiss="modal">Clear selection</button>
             <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
           </div>
           <h3 class="modal-title s_font">MCQ Library <span>(section- 22318047)</span></h3>
        </div>
        <div class="modal-body s_modal_form_body">
           <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                 <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-filter"></i> Filters</div>
                    <div class="panel-body">
                       <form action="">
                          <div class="form-group form-group-sm">
                             <label class="control-label"><strong>Tags</strong></label>
                             <div class="">
                                <select id="tag_multi_choose_sub" multiple="multiple">
                                   <option value="1">Aptitude</option>
                                   <option value="2">Basic Algebra</option>
                                   <option value="3">HTML and CSS</option>
                                   <option value="4">JAVA</option>
                                   <option value="5">C#</option>
                                </select>
                             </div>
                          </div>
                          <div class="form-group form-group-sm">
                            <label class="control-label">Level</label>
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="checkbox no-margin">
                                     <label>
                                     <input type="checkbox" class="level_easy" checked>Easy
                                     </label>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="checkbox no-margin">
                                     <label>
                                     <input type="checkbox" class="level_medium">Medium
                                     </label>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="checkbox no-margin">
                                     <label>
                                     <input type="checkbox" class="level_hard">Hard
                                     </label>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="checkbox no-margin">
                                     <label>
                                     <input type="checkbox" class="level_all">All
                                     </label>
                                  </div>
                               </div>
                            </div>
                          </div>

                          <div class="moreSettings_button_submission" onclick="moreSettings_submission()" style="margin-bottom:5px;">
                            More
                          </div>
                          <div class="moreSettings_submission hidden">

                            <div class="form-group form-group-sm">
                               <label class="control-label"><strong>Question Id</strong></label>
                               <div class="">
                                  <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                               </div>
                            </div>
                            <div class="form-group form-group-sm">
                               <label class="control-label"><strong>Question Statement</strong></label>
                               <div class="">
                                  <input type="text" class="form-control" name="" value="" required="" placeholder="Enter question statement">
                               </div>
                            </div>

                          </div>

                          <button class="btn btn-sm btn-success">Apply</button>
                          <button class="btn btn-sm btn-default">Reset</button>
                       </form>
                    </div>
                 </div>
              </div>
              <div class="col-md-9 col-sm-12 col-xs-12">
                 <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="pill" href="#submission-debug-private-question">Private Question (10)</a></li>
                    <li class="pull-right"></li>
                 </ul>
                 <div class="tab-content">
                    <div id="submission-debug-private-question" class="tab-pane fade in active">
                       <div class="no-more-tables">
                          <table class="table s_table">
                             <thead>
                                <tr>
                                   <th><input type="checkbox" class="codeQuesCheck_private_submission_question_mcq"></th>
                                   <th></th>
                                   <th style="text-align: left;"><b>Statement</b></th>
                                   <th>Positive Marks</th>
                                </tr>
                             </thead>
                             <tbody>
                                <tr>
                                   <td><input type="checkbox" class="private_submission_question_mcq" value="1"></td>
                                   <td>
                                      <div class="statement">
                                         <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_1"></i>
                                         <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_1">
                                            <div class="panel-heading">Question Statement</div>
                                            <div class="panel-body">
                                               <div class="clearfix">
                                                  <div class="row s_small">
                                                     <div class="col-xs-12">
                                                        <small>How can you open a link in a new tab/browser window?</small>
                                                     </div>
                                                     <div class="col-xs-12">
                                                        <h5>Choices</h5>
                                                        <ul class="ng-scope">
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &nbsp;&nbsp;
                                                              &lt;a href="url" new&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &nbsp;&nbsp;
                                                              &lt;a href="url" target="_blank"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &nbsp;&nbsp;
                                                              &lt;a href="url" target="new"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &nbsp;&nbsp;
                                                              None of the above
                                                           </li>
                                                        </ul>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td class="col-md-8 col-sm-12 col-xs-12">
                                      <div class="statement">
                                         <div class="row">
                                            <div class="single-line-ellipsis">
                                               <span class="no-underline">What is PEAR in PHP?</span>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="description text-muted">
                                         <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                               <div class="row">
                                                  <div class="col-xs-6">
                                                     <span class="text-muted">Level</span>
                                                     <span class="conjunction"> : </span>Medium
                                                  </div>
                                                  <div class="col-xs-6 no-padding-left">
                                                     <span class="text-muted">Tag</span>
                                                     <span class="conjunction"> : </span>PHP
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td>
                                      <input type="text" value="10" class="form-control allow_number" disabled>
                                   </td>
                                </tr>
                                <tr>
                                   <td><input type="checkbox" class="private_submission_question_mcq" value="2"></td>
                                   <td>
                                      <div class="statement">
                                         <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_2"></i>
                                         <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_2">
                                            <div class="panel-heading">Question Statement</div>
                                            <div class="panel-body">
                                               <div class="clearfix">
                                                  <div class="row s_small">
                                                     <div class="col-xs-12">
                                                        <small>How can you open a link in a new tab/browser window?</small>
                                                     </div>
                                                     <div class="col-xs-12">
                                                        <h5>Choices</h5>
                                                        <ul class="ng-scope">
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" new&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" target="_blank"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" target="new"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              None of the above
                                                           </li>
                                                        </ul>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td class="col-md-10 col-sm-12 col-xs-12">
                                      <div class="statement">
                                         <div class="row">
                                            <div class="single-line-ellipsis">
                                               <span class="no-underline">What is PEAR in PHP?</span>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="description text-muted">
                                         <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                               <div class="row">
                                                  <div class="col-xs-6">
                                                     <span class="text-muted">Level</span>
                                                     <span class="conjunction"> : </span>Medium
                                                  </div>
                                                  <div class="col-xs-6 no-padding-left">
                                                     <span class="text-muted">Tag</span>
                                                     <span class="conjunction"> : </span>PHP
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td>
                                      <input type="text" value="10" class="form-control allow_number" disabled>
                                   </td>
                                </tr>
                                <tr>
                                   <td><input type="checkbox" class="private_submission_question_mcq" value="3"></td>
                                   <td>
                                      <div class="statement">
                                         <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_3"></i>
                                         <div class="panel panel-default s_tooltip panel-collapse collapse" id="collapse_3">
                                            <div class="panel-heading">Question Statement</div>
                                            <div class="panel-body">
                                               <div class="clearfix">
                                                  <div class="row s_small">
                                                     <div class="col-xs-12">
                                                        <small>How can you open a link in a new tab/browser window?</small>
                                                     </div>
                                                     <div class="col-xs-12">
                                                        <h5>Choices</h5>
                                                        <ul class="ng-scope">
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" new&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" target="_blank"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              &lt;a href="url" target="new"&gt;
                                                           </li>
                                                           <li>
                                                              <i class="fa fa-square-o" aria-hidden="true"></i>
                                                              None of the above
                                                           </li>
                                                        </ul>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td class="col-md-10 col-sm-12 col-xs-12">
                                      <div class="statement">
                                         <div class="row">
                                            <div class="single-line-ellipsis">
                                               <span class="no-underline">What is PEAR in PHP?</span>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="description text-muted">
                                         <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                               <div class="row">
                                                  <div class="col-xs-6">
                                                     <span class="text-muted">Level</span>
                                                     <span class="conjunction"> : </span>Medium
                                                  </div>
                                                  <div class="col-xs-6 no-padding-left">
                                                     <span class="text-muted">Tag</span>
                                                     <span class="conjunction"> : </span>PHP
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </td>
                                   <td>
                                      <input type="text" value="10" class="form-control allow_number" disabled>
                                   </td>
                                </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
   </div>
</div>
<!-- add-public-page-Modal -->
<div class="modal fade" id="add-public-page-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <h3>Edit Page</h3>
                  <form>
                     <div class="form-group">
                        <label>Page Title <i class="fa fa-info-circle"></i></label>
                        <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                        <label>Page Content <i class="fa fa-info-circle"></i></label>
                        <textarea class="edit"></textarea>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Page Preview -</div>
                     <div class="panel-body public_s_heght">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div class="">
               <button class="btn btn-primary btn-sm" type="button">
               <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
               </button>
               <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Edit-public-page-Modal -->
<div class="modal fade" id="edit-public-page-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <h3>Edit Page</h3>
                  <form>
                     <div class="form-group">
                        <label>Page Title <i class="fa fa-info-circle"></i></label>
                        <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                        <label>Page Content <i class="fa fa-info-circle"></i></label>
                        <textarea class="edit" style="margin-top: 30px;"></textarea>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Page Preview -</div>
                     <div class="panel-body public_s_heght">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div>
               <button class="btn btn-primary btn-sm" type="button">
               <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes
               </button>
               <button class="btn btn-danger btn-sm" type="button">
               <i class="fa fa-trash-o" aria-hidden="true"></i> Delete Page
               </button>
               <button class="btn btn-warning btn-sm" type="button"  data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- section-mcqs-Modal-First-Mcq -->
<div class="modal fade" id="section-mcqs-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
         <form action="{{route('create_question')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="section_id" id="section_id_1" value="">
        <input type="hidden" name="question_sub_types_id" value="1">
        <input type="hidden" name="question_type_id" value="1">
        <div class="modal-content">
           <div class="modal-header s_modal_form_header">
              <div class="pull-right">
                 <span>Please add atleast 3 characters in the question statement </span>
                 <button type="submit" class="btn s_save_button s_font">Save</button>
                 <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
              </div>
              <h3 class="modal-title s_font">Multiple Choice Question</h3>
           </div>
           <div class="modal-body s_modal_form_body">
              <div class="row">
                 <div class="col-md-10 col-md-offset-1">
                    <!-- Question Statement -->
                    <div class="modal-content s_modal s_blue_color_modal">
                       <div class="modal-header s_modal_header s_blue_color_header">
                          <h4 class="modal-title s_font">Question Statement</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Question State  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question. Supported classification are easy, intermediate and hard."> <i class="fa fa-info-circle"> </i></a></strong>
                          </div>
                          <div>
                             <label class="container_radio border_radio_left">STAGE
                             <input type="radio" checked="checked" name="question_state_id" value="1">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio">READY
                             <input type="radio" name="question_state_id" value="2">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio border_radio_right">ABANDONED
                             <input type="radio" name="question_state_id" value="3">
                             <span class="checkmark"></span>
                             </label>
                          </div>
                          <hr>
                          <div class="heading_modal_statement">
                             <strong>Question Statement (<a href="#section-mcqs-Modal-Collapse" data-toggle="modal" onclick="edittesttemplate_Collapse()" >Expand</a>)   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  Question level determines the standard of the question. Supported classification are easy, intermediate and hard."> <i class="fa fa-info-circle"> </i></a></strong>
                             <span>Please add atleast 3 characters in the statement</span>
                          </div><br>
                          <textarea class="edit" name="question_statement"></textarea>
                          <br>
                          <div class="panel panel-pagedown-preview hidden" id="edittemp_panel">
                            <div class="panel-heading">
                              <strong>Preview</strong>
                            </div>
                            <div class="panel-body">
                              <p id="preview_data_section_expand"></p>
                            </div>
                          </div>

                          <h5><b>Media(Audio/Video)</b></h5>
                          <div class="f_upload_btn">
                                    Upload Media
                                <input type="file" name="media" >
                          </div>
                       </div>
                    </div>
                    <br>
                    <!-- Choices -->
                    <div class="modal-content s_modal s_green_color_modal">
                       <div class="modal-header s_modal_header s_green_color_header">
                          <h4 class="modal-title s_font">Choices</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>
                                Choices
                                <div class="s_popup">
                                   <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a>
                                   <!--<i class="fa fa-info-circle"> </i>
                                   <span class="s_popuptext">
                                   Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate.
                                   </span>-->
                                </div>
                             </strong>
                             <strong class="pull-right">
                             <input type="checkbox" name="partial_marks" id="section_partial_marks">
                             Partial marks
                             </strong>
                             <div class="no-more-tables ">
                                <table class="table s_table" id="section_choices_table">
                                   <tbody>
                                      <tr>
                                         <td valign="center">1.</td>
                                         <td>
                                            <input type="checkbox" name="answer[]" class="choices_table_checkbox">
                                         </td>
                                         <td class="s_weight" valign="center">
                                            <textarea class="form-control" name="choice[]" required=""></textarea>
                                         </td>
                                         <td valign="center" class="hidden">
                                            <div class="input-group input-group-sm">
                                               <input type="number" name="partial_marks[]" value="0" class="form-control" width="30px" max="100" min="0" >
                                               <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                         </td>
                                         <td valign="center">
                                            <a class="delete_row">
                                            <i class="fa fa-times-circle-o"></i>
                                            </a>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td valign="center">2.</td>
                                        <td>
                                            <input type="checkbox" name="status"  class="choices_table_checkbox">
                                         </td>
                                         <td class="s_weight" valign="center">
                                            <textarea class="form-control" name="choice[]" required=""></textarea>
                                         </td>
                                         <td valign="center" class="hidden">
                                            <div class="input-group input-group-sm">
                                               <input type="number" name="partial_marks[]" value="0" class="form-control" width="30px" max="100" min="0" >
                                               <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                         </td>
                                         <td valign="center">
                                            <a class="delete_row">
                                            <i class="fa fa-times-circle-o"></i>
                                            </a>
                                         </td>
                                      </tr>
                                      <tr>
                                         <td valign="center">3.</td>
                                         <td>
                                            <input type="checkbox" name="status" class="choices_table_checkbox">
                                         </td>
                                         <td class="s_weight" valign="center">
                                            <textarea class="form-control" name="choice[]" required=""></textarea>
                                         </td>
                                         <td valign="center" class="hidden">
                                            <div class="input-group input-group-sm">
                                               <input type="number" name="partial_marks[]" value="0" class="form-control" width="30px" max="100" min="0" >
                                               <span class="input-group-addon" id="basic-addon1">%</span>
                                            </div>
                                         </td>
                                         <td valign="center">
                                            <a class="delete_row">
                                            <i class="fa fa-times-circle-o"></i>
                                            </a>
                                         </td>
                                      </tr>
                                   </tbody>
                                   <tfoot>
                                      <tr>
                                         <td colspan="5" class="text-align-center">
                                            <button type="button" class="btn btn-add-new btn-block" onclick="template_row_add_choice()"> + Add New Option</button>
                                         </td>
                                      </tr>
                                   </tfoot>
                                </table>
                             </div>
                             <div class="checkbox">
                                <label>
                                <input type="checkbox">Shuffle the options in the test
                                </label>
                             </div>
                          </div>
                       </div>
                    </div>
                    <br>
                    <!-- Question Details -->
                    <div class="modal-content s_modal s_yellow_color_modal">
                       <div class="modal-header s_modal_header s_yellow_color_header">
                          <h4 class="modal-title s_font">Question Details</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Marks for this Question</strong>
                                   </div>
                                   <input type="text" name="marks" class="form-control">
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Negative Marks for Answering Wrong  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <input type="text" name="negative_marks" class="form-control" required="s">
                                </div>
                             </div>
                          </div>
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Question State  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
                          </div>
                          <div class="form-group-sm">
                             <div class="row">
                                <div class="col-md-3">
                                   <select name="tag_id" class="form-control">
                                      <option value="add Tag" disabled="">Add Tag</option>
                                       @foreach($tags as $value)
                                        <option value="{{$value->id}}">{{$value->tag_name}}</option>
                                      @endforeach
                                   </select>
                                </div>
                             </div>
                          </div>
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Question Level  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                          </div>
                          <div class="heading_padding_bottom">
                             <label class="container_radio border_radio_left">Easy
                             <input type="radio" checked="checked" name="question_level_id" value="1">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio">Medium
                             <input type="radio" name="question_level_id" value="2">
                             <span class="checkmark"></span>
                             </label>
                             <label class="container_radio border_radio_right">Hard
                             <input type="radio" name="question_level_id" value="3">
                             <span class="checkmark"></span>
                             </label>
                          </div>
                          <div class="row">
                             <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Provider  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <input type="text" name="provider" class="form-control" required="">
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Author  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <input type="text" name="author" class="form-control" required="">
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <br>
                    <!--  Solution Details (Optional) -->
                    <div class="modal-content s_modal s_gray_color_modal">
                       <div class="modal-header s_modal_header s_gray_color_header">
                          <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Text  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="text" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Code  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="code" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>URL  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="url" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate."> <i class="fa fa-info-circle"> </i></a></strong>
                          </div>
                          <!--<input type="file" name="solution_media">-->
                           <div class="f_upload_btn">
                                    Upload Files
                                    <input type="file" name="">
                                </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
      </form>
   </div>
</div>
<!-- section-mcqs-Modal-First-Mcq -->

<div class="modal fade" id="section-mcqs-Modal-Collapse" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
       <div class="modal-body s_modal_form_body">
          <div class="row">
            <div class="col-md-12">
              <strong>Question Statement (<span class="collapse_pointer" onclick="collapse_modal()" >Collapse</span>)</strong>
              <span class="text-danger"> Please add atleast 3 characters in the statement</span><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <textarea class="edit" id="edit_collapse" name="question_statement"></textarea>
            </div>
            <div class="col-md-6">
              <div class="panel panel-pagedown-preview">
                <div class="panel-heading">
                  <strong>Preview</strong>
                </div>
                <div class="panel-body" style="height: 647px;">
                  <p id="preview_data_section"></p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>


<!-- section-mcqs-Modal -->
<script type="text/javascript">
   // $(document).ready(function(){
   //    @if(isset($hostFlag) && $hostFlag)
   //       console.log({{$hostFlag}});
   //       $('#_first_model').modal('show');
   //    @endif
   // });
</script>

<div class="modal fade" id="question_modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font"></i>Multiple Choice Question</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div style="">
               <div class="content-area content-area-70 new-question">

                  <form name="mcq" action="{{route('update_partial_question')}}" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="question_id" id="question_id_id" value="">
                     <?php
                     //$question_id =
                     ?>
                     <script>
                        var check = $("#question_id_id").val();
                           <?php //$check = ?>
                     </script>
                     <div class="form-group">
                        <div class="form-inline">
                           <label>Question Statement</label>
                           <span>(Current state of question : <span id="state_name"></span>)</span>
                           <br>
                           <span id="question_statement_id"></span>
                           <div class="pull-right">
                              <a target="_blank" href="{{route('library_public_questions')}}?modal=modal_pencil" class="btn-sm btn-link ajax_route">
                              <span uib-tooltip="Edit Question" class="glyphicon glyphicon-pencil f_pencil"></span></a>
                           </div>
                        </div>
                     </div>

                     <div class="">
                        <div class="form-group">
                           <label>Marks for this Question</label>
                           <input type="number" value="" id="questionmarks" name="marks" min="1" class="form-control" required="required" style="">
                           <span class="">
                           <label>Negative Marks for Answering Wrongssss</label>
                           <input type="number" step="any" id="negativeMarks" name="negative_marks" min="0" class="form-control" required="required">
                           </span>
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Update Marks">
                     </div>
                     <div>
                        This is demo account thus the choices are hidden.
                        <br>
                     </div>
                     <table class="table" >
                        <thead>
                           <tr>
                              <th colspan="3">Choices</th>
                           </tr>
                        </thead>
                        <tbody id="choiceTable">

                        </tbody>
                     </table>
                     <div class="form-group">
                        <input type="checkbox" class="partialCheck" disabled="disabled"> Partial marks
                     </div>
                     <div class="form-group">
                        <input type="checkbox" class="shuffleCheck" disabled="disabled">Shuffle the options in the test
                     </div>
                     <div>
                        <label>Tags</label>
                        <div>
                           <span class="" id="tagName">
                           </span>
                        </div>
                     </div>

                     <div class="">
                        <div class="form-group">
                           <label>Question Level</label>
                           <div class="row">
                              <div class="col-md-8" id="level_name"></div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Submission Edit  Partial Modal And Complete Modal -->
<div class="modal fade" id="submission_modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font"></i>Submission Question</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div style="">
               <div class="content-area content-area-70 new-question">
                  <form name="mcq" action="{{route('update_partial_question')}}" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="question_id" id="question_id_id" value="">
                     <div class="form-group">
                        <div class="form-inline">
                           <label>Question Statement</label>
                           <span>(Current state of question : <span id="state_name"></span>)</span>
                           <br>
                           <span id="question_statement_id"></span>
                           <div class="pull-right">
                  <a target="_blank" href="{{route('library_public_questions')}}?modal=submission_modal1"
                                 class="btn-sm btn-link code_ajax_route" data-toggle="tooltip" data-placement="top" title="Edit Question">

                                 <input type="hidden" name="question_id" id="submissions_question_id" value="">
                              <span uib-tooltip="Edit Question" class="glyphicon glyphicon-pencil f_pencil"></span></a>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="form-group">
                           <label>Marks for this Question</label>
                           <input type="number" value="" id="submission_questionmarks" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Update Marks">
                     </div>
                     <div class="form-group">
                        <input type="checkbox" disabled=""> enable code modification and show difference
                     </div>
                     <table class="table">
                        <thead>
                           <tr>
                              <th colspan="3">Resources</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <div class="form-group">
                        <label>Resources allowed by candidate to upload</label>
                        <div class="row">
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label>
                                 <input type="checkbox" disabled="">
                                 Images
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label>
                                 <input type="checkbox" disabled="">
                                 URLs
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label>
                                 <input type="checkbox" disabled="">
                                 Files
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label>
                                 <input type="checkbox" disabled="">
                                 Text
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label>
                                 <input type="checkbox" disabled="">
                                 Code
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="checkbox f_check">
                                 <label class="">
                                 <input type="checkbox" disabled="">
                                 Audio (Max Length : 30)
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <label>Tags</label>
                        <div>
                           <span class="">
                           <span class="pad-right-10">
                           <div class="submission_tags col-md-8"></div>
                           <a href="" class="no-underline">×</a>
                           </span>
                           </span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Question Level:</label>
                        <div class="row">
                           <div class="col-md-8">
                              <select class="form-control" required="" disabled="disabled">
                                 <option value="easy">Easy</option>
                                 <option value="intermediate">Intermediate</option>
                                 <option value="hard">Hard</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Author</label>
                        <div class="row">
                           <div class="col-md-8">
                              <input type="text" class="form-control submission_author" disabled="disabled">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>provider</label>
                        <div class="row">
                           <div class="col-md-8">
                              <input type="text" class="form-control submission_provider" disabled="disabled">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="coding_modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font"></i>Coding Questions</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div style="">
               <div class="content-area content-area-70 new-question">
                  <form name="coding" action="{{route('update_partial_question')}}" method="post" >
                     {{csrf_field()}}
                     <input type="hidden" name="question_id" id="codings_question_id" value="">
                     <div class="form-group">
                        <div class="form-inline">
                           <label>program Title</label>
                           <span>(Current state of question : READY<span id="state_name"></span>)</span>
                           <br>
                           <span id="question_statement_id"></span>
                           <div class="pull-right">
                              <a target="_blank" href="{{route('library_public_questions')}}?modal=modal_coding" class="btn-sm btn-link code_ajax_route" >
                              <span uib-tooltip="Edit Question" class="glyphicon glyphicon-pencil f_pencil"></span></a>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ng-scope" data-ng-if="isTestQuestion">

<label>Marks for this Question</label>
<input type="number" name="marks" min="0" id="coding_marks" class="form-control" required="required">
</div>

<input type="submit" value="Update Marks" class="btn btn-primary btn-sm f_update">

<table class="table">
<thead>
<tr>
<th colspan="4">Samples</th>
</tr>
<tr data-ng-if="currentQuestion.sampleInOut.length" class="">
<th></th>
<th>Input</th>
<th>Output</th>
<th></th>
</tr>
</thead>
<tbody class="coding_question_table">

</tbody>
</table>

<div>
<label>Tags</label>
<div>
<span class="">
<span class="pad-right-10">
<span class="coding_tags form-group">  </span>
</span>
</span>
</div>
</div>
<div class="form-group">
<label>Question Level:</label>
<div class="row">
<div class="coding_question_level col-md-8"></div>
</div>
</div>

<div class="form-group">
<label>Author</label>
<div class="row">
<div class="coding_author col-md-8"></div>
</div>
</div>

<div class="form-group">
<label>provider</label>
<div class="row">
<div class="coding_provider col-md-8"></div>
</div>

</div>




<!-- Submission Edit  Partial Modal And Complete Modal -->
<script type="text/javascript">
   // $(document).ready(function(){
   //    @if(isset($hostFlag) && $hostFlag)
   //       $('#_first_model').modal('show');
   //    @endif
   // });
</script>
@endsection
