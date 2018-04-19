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
            <strong>&nbsp;&nbsp;&nbsp;Template: BPO Test - Recruitment</strong>
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
                           <a href="{{route('delete_section',['id'=>$value->id])}}" class="deleteConfirm" onclick="return confirm('Are You Sure To Delete This Test Template?')">
                           <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                           </a>
                        </div>
                     </li>
                     @endforeach    
                     <form action="{{route('add_section')}}" id="add_section" method="post">
                        {{csrf_field()}}                       
                        <input type="hidden" name="order_value" value="{{ $order = $order ? $order : 0 }}">
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
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext host_popup">
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 "http://www.markdowntutorial.com/
                                 </span>
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
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext host_popup">
                                 This is the description of the test.<br>
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 "http://www.markdowntutorial.com/
                                 </span>
                              </div>
                           </label>
                           <div>
                              <textarea name="description" class='edit' style="margin-top: 30px;"placeholder="Type some text">
                                 @if(isset($edit->description)) {{$edit->description}} @endif
                              </textarea>
                              <!-- <textarea id="s_txt_BD_DescriptionEditor" rows="8" cols="80" name="description">
                                 </textarea> -->
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="instructions">
                              Instructions
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext host_popup">
                                 type below the instructions for the test.<br>
                                 Good to know: the candidate can view this in the
                                 instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 "http://www.markdowntutorial.com/
                                 </span>
                              </div>
                           </label>
                           <div>
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
                           <h3>Customer Service Test - CodeGround</h3>
                           <h4>Description</h4>
                           <p>This test is hosted via Codeground. Please read the instructions carefully before proceeding.</p>
                           <h4>Instructions</h4>
                           <p>(1) Make sure you have a proper internet connection.</p>
                           <p>(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.</p>
                           <p>(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.</p>
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
                        <li><a data-toggle="pill" href="#sections-coding-{{$key}}">Coding (2)</a></li>
                        <li><a data-toggle="pill" href="#sections-submission-{{$key}}">Submission (2)</a></li>
                        <li class="pull-right"></li>                        
                     </ul>
                     <div class="tab-content">
                        <div id="sections-multiplechoice-{{$key}}" class="tab-pane fade in active">
                           <form action="{{route('delete_all_mcqs_questions')}}" method="get"> 
                              <input type="hidden" name="section_mc_id[]"  id="section_mc_id">
                              <button type="submit" class="btn delete_section_mc hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox"></th>
                                       <th>#</th>
                                       <th>Statement</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($sec['ques'] as $serial_number => $q)
                                  <tr>
                                       <td><input type="checkbox" name="prog" class="prog_mc" value="{{$q->id}}"></td>
                                       <td>{{++$serial_number}}</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="#" onclick="modal_data({{$q->id}})" data-toggle="modal" data-target="#question_modal"class="no-underline">{{$q->question_statement}}</a>
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
                                          <button type="button" class="btn" data-toggle="modal" data-target="#section-mcqs-Modal" onclick="section_id({{$key}})">
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
                           <form>
                              <input type="text" name="section_c_id[]"  id="section_c_id">
                              <button type="submit" class="btn delete_section_c hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox"></th>
                                       <th>#</th>
                                       <th>Statementp</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td><input type="checkbox" class="prog_c"></td>
                                       <td>1</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><input type="checkbox"></td>
                                       <td>2</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><input type="checkbox"></td>
                                       <td>3</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
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
                                                <li><a data-toggle="modal" data-target="#section-coding-add-compilable-question-Modal">Add Compilable Question</a></li>
                                                <li><a data-toggle="modal" data-target="#section-coding-debug-Modal">Add Debug Question</a></li>
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
                           <form>
                              <input type="text" name="section_s_id[]"  id="section_s_id">
                              <button type="submit" class="btn delete_section_s hidden">Delete</button>
                           </form>
                           <div class="no-more-tables">
                              <table class="table s_table">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox"></th>
                                       <th>#</th>
                                       <th>Statement000</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td><input type="checkbox" class="prog_s"></td>
                                       <td>1</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><input type="checkbox"></td>
                                       <td>2</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><input type="checkbox"></td>
                                       <td>3</td>
                                       <td class="col-md-10 col-sm-12 col-xs-12">
                                          <div class="statement">
                                             <div class="row">
                                                <div class="single-line-ellipsis">
                                                   <a href="" class="no-underline">Very cool Number</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="description text-muted">
                                             <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                   <div class="row">
                                                      <div class="col-xs-6">
                                                         <span style="text-transform:capitalize;">
                                                         <i>easy</i>
                                                         </span>
                                                      </div>
                                                      <div class="col-xs-6 no-padding-left">
                                                         <span class="text-muted">Marks</span>
                                                         <span class="conjunction">:</span>49
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                   <span class="text-muted">Tags : </span>
                                                   <span class="question-tags">Programming</span>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <a>
                                          <i class="fa fa-times-circle text-danger"></i>
                                          </a>
                                       </td>
                                    </tr>
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
                                                <li><a data-toggle="modal" data-target="#section-submission-question-Modal">Add Submission Question</a></li>
                                                <li><a data-toggle="modal" data-target="#section-submission-fill-blanks-question-Modal">Add Fill In The Blanks Question</a></li>
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
                                 <label class="control-label col-md-8 col-sm-8 col-xs-8">
                                    Window Proctoring
                                    <div class="s_popup">
                                       <i class="fa fa-info-circle"> </i>
                                       <span class="s_popuptext">
                                       This is a cheating prevention mechanism which<br>
                                       mandates the candidate to stay<br>
                                       Good to know: the candidate can view this in the
                                       instructions page before the test. <br>
                                       This is a markdown editor <br>
                                       Learning refrence:<br>
                                       "http://www.markdowntutorial.com/
                                       </span>
                                    </div>
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
                                 <img src="../assets/img/testSettings.png" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#test_setting">Test Settings</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="../assets/img/questionnair.png" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#questionnaire">Questionnaire</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="../assets/img/contact.png" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#contact_details">Contact Details</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="../assets/img/mailSettings.png" height="20" alt="" class="pull-left">
                                 <a data-toggle="pill" href="#mail_settings">Mail Settings</a>
                              </div>
                           </li>
                           <li>
                              <div class="setting_nav_border">
                                 <img src="../assets/img/mailSettings.png" height="20" alt="" class="pull-left">
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
                              <div class="panel-body s_panelBodyHeight">
                                 <form class="form-horizontal" name="tSettings">
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
                                                <select class="form-control">
                                                   <option value="boolean:true" label="Public" selected="selected">Public</option>
                                                   <option value="boolean:false" label="Invite Only">Invite Only</option>
                                                </select>
                                             </div>
                                          </div>
                                          <p class="help-block">This test will be open for all interested candidates</p>
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
                                                <select class="form-control">
                                                   <option value="Required">Strictly Required</option>
                                                   <option value="Not_Required">Capture webcam if available</option>
                                                   <option value="Strictly_Not_Required">Not Required</option>
                                                </select>
                                             </div>
                                          </div>
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
                                             <input type="checkbox"> Request Resume
                                             </label>
                                          </div>
                                          <div class="checkbox">
                                             <label>
                                             <input type="checkbox"> Mandate Resume
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div>
                                       <div class="form-group form-group-sm">
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
                                       </div>
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
                                             <input type="checkbox">
                                             &nbsp;
                                             </label>
                                             <div class="help-block">(The candidate will not be able to resume the test in case of system failure)</div>
                                             <div class="help-block">(Email-id will always be verified for the login or invite only test)</div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="clearfix panel-footer borderTop">
                                 <div class="col-sm-3 s_margin_bottom">
                                    <button type="submit" class="btn btn-sm">Save</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="questionnaire" class="tab-pane fade">
                           <div class="panel panel-default s_margin_10">
                              <div class="panel-heading">
                                 <strong>
                                 Questionnaire <i class="fa fa-info-circle"></i>
                                 </strong>
                              </div>
                              <div class="panel-body s_panelBodyHeight">
                                 <form class="form-horizontal" name="tSettings">
                                    <div class="form-group form-group-sm">
                                       <div class="checkbox">
                                          <label>
                                          <input type="checkbox"> Enable questionnaire
                                          </label>
                                       </div>
                                    </div>
                                 </form>
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
                              <form class="form-horizontal" name="tSettings">
                                 <div class="panel-body s_panelBodyHeight">
                                    <p class="s_modal_body_heading text-center">These are the contact details for the candidate’s reference incase of any query.</p>
                                    <br>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Email ID
                                       </label>
                                       <div class="col-sm-6">
                                          <input type="text" class="form-control" name="" value="jyothi@codeground.in" disabled>
                                          <div class="">
                                             <label>
                                             <input type="checkbox"> Make visible to candidate
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Contact Number
                                       </label>
                                       <div class="col-sm-6">
                                          <input type="text" class="form-control" name="" value="080 655 55 814" disabled>
                                          <div class="">
                                             <label>
                                             <input type="checkbox"> Show Contact Number to candidate for help
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
                              <form class="form-horizontal" name="tSettings">
                                 <div class="panel-body s_panelBodyHeight">
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Email Report <i class="fa fa-info-circle"></i>
                                       </label>
                                       <div class="col-sm-6">
                                          <div class="checkbox">
                                             <label>
                                             <input type="checkbox"> Receive mail whenever a candidate completes the test
                                             </label>
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
                                             <input type="checkbox"> Send Report to candidate whenever candidate finishes the test
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
                              <form class="form-horizontal" name="tSettings">
                                 <div class="panel-body s_panelBodyHeight">
                                    <p class="s_modal_body_heading text-center">An email will be sent to the candidates after completing the test</p>
                                    <br>
                                    <div class="form-group form-group-sm">
                                       <label class="col-sm-3 control-label">
                                       Message
                                       </label>
                                       <div class="col-sm-6">
                                          <textarea class="form-control" rows="5" placeholder="Your message">Hi &lt;candidateName&gt;,
                                             Your test - &lt;testTitle&gt; has been submitted successfully.
                                             Thanks,
                                          Codeground.</textarea>
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
                           <div class="ept_cover_image" style="background-image: url(&quot;https://storage.googleapis.com/codegrounds/PublicTestImages320419ea-36fb-455d-ae46-767c2aafa16d_USER-RecruiterCopy_ITEM-logo1.png&quot;);">
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
                                                      <button type="button" href="" class="btn btn-primary btn-sm small_font_size">Upload Image</button>
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
                              <li><button class="btn btn-edit-tabs"  data-toggle="modal" data-target="#add-public-page-Modal"><i class="fa fa-plus" aria-hidden="true"></i></button></li>
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
            <h3 class="modal-title h3-old">Hosting: <i class="ng-binding">English</i>
               <button type="button" class="btn btn-sm btn-default pull-right" data-dismiss="modal">Close</button>
            </h3>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12" style="border-right: 0px solid #ddd">
                  <div class="form-group form-group-sm">
                     <div class="">
                        <label class="control-label">
                        Hosting Test Title <i class="fa fa-info-circle"></i>
                        </label>
                        <input type="text" class="form-control" name="testName" required="">
                     </div>
                  </div>
                  <div class="form-group form-group-sm" data-ng-init="modalObject.settings.cutOff = 0">
                     <label class="control-label">
                     Cut-off Marks <i class="fa fa-info-circle"></i>
                     <span class="light-font" style="font-weight:normal">(Total marks:195)</span>
                     </label>
                     <div class="row">
                        <div class="col-sm-2">
                           <input type="number" name="cutOff" class="form-control" min="0" value="0" required="" integer="">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-horizontal">
                     <h5><strong>Test Timings</strong></h5>
                     <div class="form-group form-group-sm">
                        <div class="">
                           <label class="control-label col-sm-3 col-sm-offset-1">
                           Test Opening Time <i class="fa fa-info-circle"></i>
                           </label>
                           <div class="col-sm-8">
                              <div>
                                 <div class="form-horizontal">
                                    <div class="clearfix">
                                       <div class="form-group s_form_control_group">
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:1" label="1">1</option>
                                                <option value="number:2" label="2">2</option>
                                                <option value="number:3" label="3">3</option>
                                                <option value="number:4" label="4">4</option>
                                                <option value="number:5" label="5" selected="selected">5</option>
                                                <option value="number:6" label="6">6</option>
                                                <option value="number:7" label="7">7</option>
                                                <option value="number:8" label="8">8</option>
                                                <option value="number:9" label="9">9</option>
                                                <option value="number:10" label="10">10</option>
                                                <option value="number:11" label="11">11</option>
                                                <option value="number:12" label="12">12</option>
                                                <option value="number:13" label="13">13</option>
                                                <option value="number:14" label="14">14</option>
                                                <option value="number:15" label="15">15</option>
                                                <option value="number:16" label="16">16</option>
                                                <option value="number:17" label="17">17</option>
                                                <option value="number:18" label="18">18</option>
                                                <option value="number:19" label="19">19</option>
                                                <option value="number:20" label="20">20</option>
                                                <option value="number:21" label="21">21</option>
                                                <option value="number:22" label="22">22</option>
                                                <option value="number:23" label="23">23</option>
                                                <option value="number:24" label="24">24</option>
                                                <option value="number:25" label="25">25</option>
                                                <option value="number:26" label="26">26</option>
                                                <option value="number:27" label="27">27</option>
                                                <option value="number:28" label="28">28</option>
                                                <option value="number:29" label="29">29</option>
                                                <option value="number:30" label="30">30</option>
                                                <option value="number:31" label="31">31</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:0" label="Jan">Jan</option>
                                                <option value="number:1" label="Feb">Feb</option>
                                                <option value="number:2" label="Mar" selected="selected">Mar</option>
                                                <option value="number:3" label="Apr">Apr</option>
                                                <option value="number:4" label="May">May</option>
                                                <option value="number:5" label="Jun">Jun</option>
                                                <option value="number:6" label="Jul">Jul</option>
                                                <option value="number:7" label="Aug">Aug</option>
                                                <option value="number:8" label="Sep">Sep</option>
                                                <option value="number:9" label="Oct">Oct</option>
                                                <option value="number:10" label="Nov">Nov</option>
                                                <option value="number:11" label="Dec">Dec</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:2011" label="2011">2011</option>
                                                <option value="number:2012" label="2012">2012</option>
                                                <option value="number:2013" label="2013">2013</option>
                                                <option value="number:2014" label="2014">2014</option>
                                                <option value="number:2015" label="2015">2015</option>
                                                <option value="number:2016" label="2016">2016</option>
                                                <option value="number:2017" label="2017">2017</option>
                                                <option value="number:2018" label="2018" selected="selected">2018</option>
                                                <option value="number:2019" label="2019">2019</option>
                                                <option value="number:2020" label="2020">2020</option>
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
                                                   <select class="form-control">
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
                                                   <select class="form-control">
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
                                                <label><input type="radio" value="AM">AM &nbsp;&nbsp;&nbsp; </label>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" value="PM">PM &nbsp;&nbsp;&nbsp; </label>
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
                           Test Closing Time <i class="fa fa-info-circle"></i>
                           </label>
                           <div class="col-sm-8">
                              <div>
                                 <div class="form-horizontal">
                                    <div class="clearfix">
                                       <div class="form-group s_form_control_group">
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:1" label="1">1</option>
                                                <option value="number:2" label="2">2</option>
                                                <option value="number:3" label="3">3</option>
                                                <option value="number:4" label="4">4</option>
                                                <option value="number:5" label="5" selected="selected">5</option>
                                                <option value="number:6" label="6">6</option>
                                                <option value="number:7" label="7">7</option>
                                                <option value="number:8" label="8">8</option>
                                                <option value="number:9" label="9">9</option>
                                                <option value="number:10" label="10">10</option>
                                                <option value="number:11" label="11">11</option>
                                                <option value="number:12" label="12">12</option>
                                                <option value="number:13" label="13">13</option>
                                                <option value="number:14" label="14">14</option>
                                                <option value="number:15" label="15">15</option>
                                                <option value="number:16" label="16">16</option>
                                                <option value="number:17" label="17">17</option>
                                                <option value="number:18" label="18">18</option>
                                                <option value="number:19" label="19">19</option>
                                                <option value="number:20" label="20">20</option>
                                                <option value="number:21" label="21">21</option>
                                                <option value="number:22" label="22">22</option>
                                                <option value="number:23" label="23">23</option>
                                                <option value="number:24" label="24">24</option>
                                                <option value="number:25" label="25">25</option>
                                                <option value="number:26" label="26">26</option>
                                                <option value="number:27" label="27">27</option>
                                                <option value="number:28" label="28">28</option>
                                                <option value="number:29" label="29">29</option>
                                                <option value="number:30" label="30">30</option>
                                                <option value="number:31" label="31">31</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:0" label="Jan">Jan</option>
                                                <option value="number:1" label="Feb">Feb</option>
                                                <option value="number:2" label="Mar" selected="selected">Mar</option>
                                                <option value="number:3" label="Apr">Apr</option>
                                                <option value="number:4" label="May">May</option>
                                                <option value="number:5" label="Jun">Jun</option>
                                                <option value="number:6" label="Jul">Jul</option>
                                                <option value="number:7" label="Aug">Aug</option>
                                                <option value="number:8" label="Sep">Sep</option>
                                                <option value="number:9" label="Oct">Oct</option>
                                                <option value="number:10" label="Nov">Nov</option>
                                                <option value="number:11" label="Dec">Dec</option>
                                             </select>
                                          </div>
                                          <div class="form-field">
                                             <select class="form-control">
                                                <option value="number:2011" label="2011">2011</option>
                                                <option value="number:2012" label="2012">2012</option>
                                                <option value="number:2013" label="2013">2013</option>
                                                <option value="number:2014" label="2014">2014</option>
                                                <option value="number:2015" label="2015">2015</option>
                                                <option value="number:2016" label="2016">2016</option>
                                                <option value="number:2017" label="2017">2017</option>
                                                <option value="number:2018" label="2018" selected="selected">2018</option>
                                                <option value="number:2019" label="2019">2019</option>
                                                <option value="number:2020" label="2020">2020</option>
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
                                                   <select class="form-control">
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
                                                   <select class="form-control">
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
                                                <label><input type="radio" value="AM">AM &nbsp;&nbsp;&nbsp; </label>
                                             </div>
                                             <div class="radio-inline form-control-group-radio">
                                                <label><input type="radio" value="PM">PM &nbsp;&nbsp;&nbsp; </label>
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
                              <select class="form-control">
                                 <option value="1" label="(UTC-12:00) International Date Line West">(UTC-12:00) International Date Line West</option>
                                 <option value="2" label="(UTC-11:00) Coordinated Universal Time-11">(UTC-11:00) Coordinated Universal Time-11</option>
                                 <option value="3" label="(UTC-10:00) Hawaii">(UTC-10:00) Hawaii</option>
                                 <option value="4" label="(UTC-09:00) Alaska">(UTC-09:00) Alaska</option>
                                 <option value="5" label="(UTC-08:00) Baja California">(UTC-08:00) Baja California</option>
                                 <option value="6" label="(UTC-08:00) Pacific Time (US &amp; Canada)">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
                                 <option value="7" label="(UTC-07:00) Arizona">(UTC-07:00) Arizona</option>
                                 <option value="8" label="(UTC-07:00) Chihuahua, La Paz, Mazatlan">(UTC-07:00) Chihuahua, La Paz, Mazatlan</option>
                                 <option value="9" label="(UTC-07:00) Mountain Time (US &amp; Canada)">(UTC-07:00) Mountain Time (US &amp; Canada)</option>
                                 <option value="10" label="(UTC-06:00) Central America">(UTC-06:00) Central America</option>
                                 <option value="11" label="(UTC-06:00) Central Time (US &amp; Canada)">(UTC-06:00) Central Time (US &amp; Canada)</option>
                                 <option value="12" label="(UTC-06:00) Guadalajara, Mexico City, Monterrey">(UTC-06:00) Guadalajara, Mexico City, Monterrey</option>
                                 <option value="13" label="(UTC-06:00) Saskatchewan">(UTC-06:00) Saskatchewan</option>
                                 <option value="14" label="(UTC-05:00) Bogota, Lima, Quito">(UTC-05:00) Bogota, Lima, Quito</option>
                                 <option value="15" label="(UTC-05:00) Eastern Time (US &amp; Canada)">(UTC-05:00) Eastern Time (US &amp; Canada)</option>
                                 <option value="16" label="(UTC-05:00) Indiana (East)">(UTC-05:00) Indiana (East)</option>
                                 <option value="17" label="(UTC-04:30) Caracas">(UTC-04:30) Caracas</option>
                                 <option value="18" label="(UTC-04:00) Asuncion">(UTC-04:00) Asuncion</option>
                                 <option value="19" label="(UTC-04:00) Atlantic Time (Canada)">(UTC-04:00) Atlantic Time (Canada)</option>
                                 <option value="20" label="(UTC-04:00) Cuiaba">(UTC-04:00) Cuiaba</option>
                                 <option value="21" label="(UTC-04:00) Georgetown, La Paz, Manaus, San Juan">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option>
                                 <option value="22" label="(UTC-04:00) Santiago">(UTC-04:00) Santiago</option>
                                 <option value="23" label="(UTC-03:30) Newfoundland">(UTC-03:30) Newfoundland</option>
                                 <option value="24" label="(UTC-03:00) Brasilia">(UTC-03:00) Brasilia</option>
                                 <option value="25" label="(UTC-03:00) Buenos Aires">(UTC-03:00) Buenos Aires</option>
                                 <option value="26" label="(UTC-03:00) Cayenne, Fortaleza">(UTC-03:00) Cayenne, Fortaleza</option>
                                 <option value="27" label="(UTC-03:00) Greenland">(UTC-03:00) Greenland</option>
                                 <option value="28" label="(UTC-03:00) Montevideo">(UTC-03:00) Montevideo</option>
                                 <option value="29" label="(UTC-03:00) Salvador">(UTC-03:00) Salvador</option>
                                 <option value="30" label="(UTC-02:00) Coordinated Universal Time-02">(UTC-02:00) Coordinated Universal Time-02</option>
                                 <option value="31" label="(UTC-02:00) Mid-Atlantic - Old">(UTC-02:00) Mid-Atlantic - Old</option>
                                 <option value="32" label="(UTC-01:00) Azores">(UTC-01:00) Azores</option>
                                 <option value="33" label="(UTC-01:00) Cape Verde Is.">(UTC-01:00) Cape Verde Is.</option>
                                 <option value="34" label="(UTC) Casablanca">(UTC) Casablanca</option>
                                 <option value="35" label="(UTC) Coordinated Universal Time">(UTC) Coordinated Universal Time</option>
                                 <option value="36" label="(UTC) Dublin, Edinburgh, Lisbon, London">(UTC) Dublin, Edinburgh, Lisbon, London</option>
                                 <option value="37" label="(UTC) Monrovia, Reykjavik">(UTC) Monrovia, Reykjavik</option>
                                 <option value="38" label="(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna">(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                 <option value="39" label="(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague">(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                 <option value="40" label="(UTC+01:00) Brussels, Copenhagen, Madrid, Paris">(UTC+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                 <option value="41" label="(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb">(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                 <option value="42" label="(UTC+01:00) West Central Africa">(UTC+01:00) West Central Africa</option>
                                 <option value="43" label="(UTC+01:00) Windhoek">(UTC+01:00) Windhoek</option>
                                 <option value="44" label="(UTC+02:00) Athens, Bucharest">(UTC+02:00) Athens, Bucharest</option>
                                 <option value="45" label="(UTC+02:00) Beirut">(UTC+02:00) Beirut</option>
                                 <option value="46" label="(UTC+02:00) Cairo">(UTC+02:00) Cairo</option>
                                 <option value="47" label="(UTC+02:00) Damascus">(UTC+02:00) Damascus</option>
                                 <option value="48" label="(UTC+02:00) E. Europe">(UTC+02:00) E. Europe</option>
                                 <option value="49" label="(UTC+02:00) Harare, Pretoria">(UTC+02:00) Harare, Pretoria</option>
                                 <option value="50" label="(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius">(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                 <option value="51" label="(UTC+02:00) Istanbul">(UTC+02:00) Istanbul</option>
                                 <option value="52" label="(UTC+02:00) Jerusalem">(UTC+02:00) Jerusalem</option>
                                 <option value="53" label="(UTC+02:00) Tripoli">(UTC+02:00) Tripoli</option>
                                 <option value="54" label="(UTC+03:00) Amman">(UTC+03:00) Amman</option>
                                 <option value="55" label="(UTC+03:00) Baghdad">(UTC+03:00) Baghdad</option>
                                 <option value="56" label="(UTC+03:00) Kaliningrad, Minsk">(UTC+03:00) Kaliningrad, Minsk</option>
                                 <option value="57" label="(UTC+03:00) Kuwait, Riyadh">(UTC+03:00) Kuwait, Riyadh</option>
                                 <option value="58" label="(UTC+03:00) Nairobi">(UTC+03:00) Nairobi</option>
                                 <option value="59" label="(UTC+03:30) Tehran">(UTC+03:30) Tehran</option>
                                 <option value="60" label="(UTC+04:00) Abu Dhabi, Muscat">(UTC+04:00) Abu Dhabi, Muscat</option>
                                 <option value="61" label="(UTC+04:00) Baku" selected="selected">(UTC+04:00) Baku</option>
                                 <option value="62" label="(UTC+04:00) Moscow, St. Petersburg, Volgograd">(UTC+04:00) Moscow, St. Petersburg, Volgograd</option>
                                 <option value="63" label="(UTC+04:00) Port Louis">(UTC+04:00) Port Louis</option>
                                 <option value="64" label="(UTC+04:00) Tbilisi">(UTC+04:00) Tbilisi</option>
                                 <option value="65" label="(UTC+04:00) Yerevan">(UTC+04:00) Yerevan</option>
                                 <option value="66" label="(UTC+04:30) Kabul">(UTC+04:30) Kabul</option>
                                 <option value="67" label="(UTC+05:00) Ashgabat, Tashkent">(UTC+05:00) Ashgabat, Tashkent</option>
                                 <option value="68" label="(UTC+05:00) Islamabad, Karachi">(UTC+05:00) Islamabad, Karachi</option>
                                 <option value="69" label="(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                 <option value="70" label="(UTC+05:30) Sri Jayawardenepura">(UTC+05:30) Sri Jayawardenepura</option>
                                 <option value="71" label="(UTC+05:45) Kathmandu">(UTC+05:45) Kathmandu</option>
                                 <option value="72" label="(UTC+06:00) Astana">(UTC+06:00) Astana</option>
                                 <option value="73" label="(UTC+06:00) Dhaka">(UTC+06:00) Dhaka</option>
                                 <option value="74" label="(UTC+06:00) Ekaterinburg">(UTC+06:00) Ekaterinburg</option>
                                 <option value="75" label="(UTC+06:30) Yangon (Rangoon)">(UTC+06:30) Yangon (Rangoon)</option>
                                 <option value="76" label="(UTC+07:00) Bangkok, Hanoi, Jakarta">(UTC+07:00) Bangkok, Hanoi, Jakarta</option>
                                 <option value="77" label="(UTC+07:00) Novosibirsk">(UTC+07:00) Novosibirsk</option>
                                 <option value="78" label="(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi">(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                 <option value="79" label="(UTC+08:00) Krasnoyarsk">(UTC+08:00) Krasnoyarsk</option>
                                 <option value="80" label="(UTC+08:00) Kuala Lumpur, Singapore">(UTC+08:00) Kuala Lumpur, Singapore</option>
                                 <option value="81" label="(UTC+08:00) Perth">(UTC+08:00) Perth</option>
                                 <option value="82" label="(UTC+08:00) Taipei">(UTC+08:00) Taipei</option>
                                 <option value="83" label="(UTC+08:00) Ulaanbaatar">(UTC+08:00) Ulaanbaatar</option>
                                 <option value="84" label="(UTC+09:00) Irkutsk">(UTC+09:00) Irkutsk</option>
                                 <option value="85" label="(UTC+09:00) Osaka, Sapporo, Tokyo">(UTC+09:00) Osaka, Sapporo, Tokyo</option>
                                 <option value="86" label="(UTC+09:00) Seoul">(UTC+09:00) Seoul</option>
                                 <option value="87" label="(UTC+09:30) Adelaide">(UTC+09:30) Adelaide</option>
                                 <option value="88" label="(UTC+09:30) Darwin">(UTC+09:30) Darwin</option>
                                 <option value="89" label="(UTC+10:00) Brisbane">(UTC+10:00) Brisbane</option>
                                 <option value="90" label="(UTC+10:00) Canberra, Melbourne, Sydney">(UTC+10:00) Canberra, Melbourne, Sydney</option>
                                 <option value="91" label="(UTC+10:00) Guam, Port Moresby">(UTC+10:00) Guam, Port Moresby</option>
                                 <option value="92" label="(UTC+10:00) Hobart">(UTC+10:00) Hobart</option>
                                 <option value="93" label="(UTC+10:00) Yakutsk">(UTC+10:00) Yakutsk</option>
                                 <option value="94" label="(UTC+11:00) Solomon Is., New Caledonia">(UTC+11:00) Solomon Is., New Caledonia</option>
                                 <option value="95" label="(UTC+11:00) Vladivostok">(UTC+11:00) Vladivostok</option>
                                 <option value="96" label="(UTC+12:00) Auckland, Wellington">(UTC+12:00) Auckland, Wellington</option>
                                 <option value="97" label="(UTC+12:00) Coordinated Universal Time+12">(UTC+12:00) Coordinated Universal Time+12</option>
                                 <option value="98" label="(UTC+12:00) Fiji">(UTC+12:00) Fiji</option>
                                 <option value="99" label="(UTC+12:00) Magadan">(UTC+12:00) Magadan</option>
                                 <option value="100" label="(UTC+12:00) Petropavlovsk-Kamchatsky - Old">(UTC+12:00) Petropavlovsk-Kamchatsky - Old</option>
                                 <option value="101" label="(UTC+13:00) Nuku'alofa">(UTC+13:00) Nuku'alofa</option>
                                 <option value="102" label="(UTC+13:00) Samoa">(UTC+13:00) Samoa</option>
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
                  <button type="submit" class="btn">Publish Test</button>
               </div>
            </div>
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
               <span>Select the question(s) and enter marks  </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
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
                           <label class="checkbox-inline">
                           <input type="checkbox"> Easy
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Medium
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Hard
                           </label>
                           <br>
                           <label class="checkbox">
                           <input type="checkbox"> All
                           </label>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Id</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Statement</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question statement">
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
                                    <th><input type="checkbox"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
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
                                    <th><input type="checkbox"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                    <th>Negative Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                    <td>
                                       <input type="number" class="form-control">
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
<!-- section-coding-add-compilable-question-Modal -->
<div class="modal fade" id="section-coding-add-compilable-question-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add the question title </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Coding Question</h3>
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
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement">
                           <strong>Program Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <textarea id="s_txtEditor_selection_coding"></textarea>
                        <br>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Sample Input & Output <i class="fa fa-info-circle"></i></strong>
                           <div class="no-more-tables ">
                              <table class="table s_table">
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
                                          <textarea class="form-control" name="option" required=""></textarea>
                                       </td>
                                       <td valign="center">
                                          <textarea class="form-control" name="option" required=""></textarea>
                                       </td>
                                       <td valign="center">
                                          <a href="">
                                          <i class="fa fa-times-circle-o"></i>
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="4" class="text-align-center">
                                          <button class="btn">+ Add Sample Test Case</button>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
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
                           <strong>Test Cases <i class="fa fa-info-circle"></i></strong>
                           <strong class="pull-right">
                           <input type="checkbox" name="" value="">
                           Equalize Weightage, <a href="#">Total: 0%</a>
                           </strong>
                           <hr>
                           <button class="btn">+ Add Test Case as Text</button>
                           <button class="btn">Upload Test Case Files</button>
                           <a href="#">Test case file format</a>
                           <div class="checkbox s_margin_0">
                              <label>
                              <input type="checkbox">Verify the Test Cases
                              </label>
                           </div>
                           <p>Test Cases should be added/uploaded</p>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Default Codes -->
                  <div class="modal-content s_modal s_yellow_color_modal">
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
                              <i class="fa fa-info-circle"></i>
                              <a href="#"> Advanced</a>
                              </strong>
                              </label>
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
                           <strong>Marks for this Question <i class="fa fa-info-circle"></i></strong>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <div class="form-group form-group-sm">
                           <strong>Allowed languages <i class="fa fa-info-circle"></i></strong>
                           <div class="row">
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label class="ng-binding">
                                    <input type="checkbox" value="JAVA" checked="checked"> JAVA
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label class="ng-binding">
                                    <input type="checkbox" value="C" checked="checked"> C
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="CPP" checked="checked"> CPP
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="PYTHON" checked="checked"> PYTHON
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="RUBY" checked="checked"> RUBY
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="PHP" checked="checked"> PHP
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="JAVASCRIPT" checked="checked"> JAVASCRIPT
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="CSHARP" checked="checked"> CSHARP
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="checkbox no-margin">
                                    <label>
                                    <input type="checkbox" value="R" checked="checked"> R
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Tags <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Select Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--  Solution Details (Optional) -->
                  <div class="modal-content s_modal s_orange_color_modal">
                     <div class="modal-header s_modal_header s_orange_color_header">
                        <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Text <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Code <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>URL <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Files <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <button type="file" class="btn">Upload Files</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-coding-debug-Modal -->
<div class="modal fade" id="section-coding-debug-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add the question title </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Coding Question</h3>
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
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement">
                           <strong>Program Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <textarea id="s_txtEditor_programming_debug"></textarea>
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
                           <strong>Test Cases <i class="fa fa-info-circle"></i></strong>
                           <strong class="pull-right">
                           <input type="checkbox" name="" value="">
                           Equalize Weightage, <a href="#">Total: 0%</a>
                           </strong>
                           <hr>
                           <button class="btn">+ Add Test Case as Text</button>
                           <button class="btn">Upload Test Case Files</button>
                           <a href="#">Test case file format</a>
                           <div class="checkbox s_margin_0">
                              <label>
                              <input type="checkbox">Verify the Test Cases
                              </label>
                           </div>
                           <p>Test Cases should be added/uploaded</p>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Default Codes -->
                  <div class="modal-content s_modal s_yellow_color_modal">
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
                           <strong>Marks for this Question <i class="fa fa-info-circle"></i></strong>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Tags <i class="fa fa-info-circle"></i> No tags added</strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Select Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--  Solution Details (Optional) -->
                  <div class="modal-content s_modal s_orange_color_modal">
                     <div class="modal-header s_modal_header s_orange_color_header">
                        <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Text <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Code <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>URL <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Files <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <button type="file" class="btn">Upload Files</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-debug-Modal -->
<div class="modal fade" id="section-choice-debug-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Select the question(s) and enter marks  </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
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
                           <label class="checkbox-inline">
                           <input type="checkbox"> Easy
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Medium
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Hard
                           </label>
                           <br>
                           <label class="checkbox">
                           <input type="checkbox"> All
                           </label>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Id</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Statement</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question statement">
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
                                    <th><input type="checkbox"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_11"></i>
                                          <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_11">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <p class="s_modal_body_heading"> The first line of the input consists of 4 space separated integers - N (denoting the number of players), M (denoting the number of passes), and X and Y, denoting ThunderCracker's and MunKee's numbers respectively.
                                                            The next line contains M space separated integers, denoting array A, the power with which passes can be made in the i'th pass (1<=i<=M).
                                                         </p>
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
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_12"></i>
                                          <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_12">
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
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_13"></i>
                                          <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_13">
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
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
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
                                    <th><input type="checkbox"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_14"></i>
                                       <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_14">
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_15"></i>
                                       <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_15">
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_16"></i>
                                       <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_16">
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
                                    </td>
                                    <td class="col-md-10 col-sm-12 col-xs-12">
                                       <div class="statement">
                                          <div class="row">
                                             <div class="single-line-ellipsis">
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control">
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
<!-- section-submission-question-Modal -->
<div class="modal fade" id="section-submission-question-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add atleast 3 characters in the question statement </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
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
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <hr>
                        <div class="heading_modal_statement">
                           <strong>Question Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <textarea id="s_txtEditor_Add_section_submission"></textarea>
                        <div class="checkbox">
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
                           <div class="">
                              <h5><b>Media(Audio/Video)</b></h5>
                              <button type="button" class="btn">Upload Media</button>
                           </div>
                           <br>
                           <strong>
                           Resources
                           <i class="fa fa-info-circle"></i>
                           </strong>
                           <label class="control-label">
                           (These resources will be available for the candidate to download during the test)
                           </label>
                           <div class="s_pur_body">
                              <button type="button" class="btn"> + Add resources</button>
                           </div>
                           <hr>
                           <strong>
                           Candidate can use
                           <i class="fa fa-info-circle"></i>
                           </strong>
                           <div class="checkbox">
                              <label><input type="checkbox"> Images</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> URLs</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Files</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Text</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Code</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Audio</label>
                           </div>
                           <span class="input-group input-group-sm">
                           <span class="input-group-addon s_addon ">Limit</span>
                           <input type="number" class="form-control" min="1" style="height:30px; width:70px;">
                           <span class="input-group-addon s_addon">seconds</span>
                           </span>
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
                        <div class="form-group form-group-sm" >
                           <label>Marks for this Question <i class="fa fa-info-circle"></i></label>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Tags <i class="fa fa-info-circle"></i> No tags added</strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Select Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
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
                        <div class="no-more-tables ">
                           <table class="table s_table">
                              <thead>
                                 <th>Tile</th>
                                 <th>Weightage (%)</th>
                                 <th></th>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="s_weight" valign="center">
                                       <div >
                                          <input type="text" class="form-control text-margin" name="title" value="">
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <div class="input-group input-group-sm">
                                          <input type="number" class="form-control" width="30px" max="100" min="0">
                                          <span class="input-group-addon" id="basic-addon1">%</span>
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <button type="button" class="btn">+ Save New</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
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
                                    <strong>Text <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Code <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>URL <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Files <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <button type="file" class="btn">Upload Files</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section-submission-fill-blanks-question-Modal -->
<div class="modal fade" id="section-submission-fill-blanks-question-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add atleast 3 characters in the question statement </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
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
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <hr>
                        <div class="heading_modal_statement">
                           <strong>Question Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <textarea id="s_txtEditor_Add_section_fill_blanks_submission"></textarea>
                        <br>
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
                              <button type="button" class="btn">Upload Media</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Fill In The Blanks Solution Details -->
                  <div class="modal-content s_modal s_yellow_light_color_modal">
                     <div class="modal-header s_modal_header s_yellow_light_green_color_header">
                        <h4 class="modal-title s_font">Fill In The Blanks Solution Details</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <h4>Enter Solutions for the Blanks</h4>
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
                           <label>Marks for this Question <i class="fa fa-info-circle"></i></label>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Tags <i class="fa fa-info-circle"></i> No tags added</strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Select Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <input type="text" class="form-control">
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
                        <div class="no-more-tables ">
                           <table class="table s_table">
                              <thead>
                                 <th>Tile</th>
                                 <th>Weightage (%)</th>
                                 <th></th>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="s_weight" valign="center">
                                       <div >
                                          <input type="text" class="form-control text-margin" name="title" value="">
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <div class="input-group input-group-sm">
                                          <input type="number" class="form-control" width="30px" max="100" min="0">
                                          <span class="input-group-addon" id="basic-addon1">%</span>
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <button type="button" class="btn">+ Save New</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
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
                                    <strong>Text <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Code <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>URL <i class="fa fa-info-circle"></i></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Files <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <button type="file" class="btn">Upload Files</button>
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
               <span>Select the question(s) and enter marks  </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal"><i class="fa fa-list"></i> Add Selected Questions</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Clear selection</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Submission Questions Library <span>(section- 22318047)</span></h3>
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
                           <label class="checkbox-inline">
                           <input type="checkbox"> Easy
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Medium
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox"> Hard
                           </label>
                           <br>
                           <label class="checkbox">
                           <input type="checkbox"> All
                           </label>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Id</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question id">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label class="control-label"><strong>Question Statement</strong></label>
                              <div class="">
                                 <input type="text" class="form-control" name="" value="" placeholder="Enter question statement">
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
                     <li class="active"><a>Public Question (10)</a></li>
                     <li class="pull-right"></li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade in active">
                        <div class="no-more-tables">
                           <table class="table s_table">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox"></th>
                                    <th></th>
                                    <th style="text-align: left;"><b>Statement</b></th>
                                    <th>Positive Marks</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                       <div class="statement">
                                          <i class="fa fa-eye" class="s_tooltip_modal" data-toggle="collapse" data-parent="#accordion" href="#collapse_21"></i>
                                          <div class="panel panel-default s_tooltip s_tooltip_large panel-collapse collapse" id="collapse_21">
                                             <div class="panel-heading">Question Statement</div>
                                             <div class="panel-body">
                                                <div class="clearfix">
                                                   <div class="row">
                                                      <div class="col-xs-12">
                                                         <small>How can you open a link in a new tab/browser window?</small>
                                                      </div>
                                                      <div class="col-xs-12">
                                                         <h5>Choices</h5>
                                                         <p class="s_modal_body_heading"> The first line of the input consists of 4 space separated integers - N (denoting the number of players), M (denoting the number of passes), and X and Y, denoting ThunderCracker's and MunKee's numbers respectively.
                                                            The next line contains M space separated integers, denoting array A, the power with which passes can be made in the i'th pass (1<=i<=M).
                                                         </p>
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
                                                <a href="" class="no-underline">What is PEAR in PHP?</a>
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
                                       <input type="number" value="10" class="form-control" disabled>
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
                        <textarea id="s_txtEditor_Add_public_page"></textarea>
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
<!-- section-mcqs-Modal -->
<div class="modal fade" id="section-mcqs-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <form action="{{route('create_question')}}" method="POST" enctype="multipart/form-data">
         {{csrf_field()}}   
         <input type="hidden" name="section_id" id="section_id" value="">     
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
                              <strong>Question State <i class="fa fa-info-circle"></i></strong>
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
                              <strong>Question Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                              <span>Please add atleast 3 characters in the statement</span>
                           </div>
                           <textarea id="s_select_mcqs_txtEditor" name="question_statement"></textarea>
                           <h5><b>Media(Audio/Video)</b></h5>
                           <div class="f_upload_btn">
                              Upload Media
                              <input type="file" name="media" >
                           </div>
                           <!-- <button type="button" class="btn">Upload Media</button> -->
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
                                    <i class="fa fa-info-circle"> </i>
                                    <span class="s_popuptext">
                                    Under this section, one can add the <br>
                                    Good to Know: <br>
                                    (1) Multiple choice multiple answer type questions are supported.
                                    <br>
                                    <br>
                                    (2) Choice field's value cannot be empty or a duplicate.
                                    </span>
                                 </div>
                              </strong>
                              <strong class="pull-right">
                              <input type="checkbox" name="partial_marks" id="partial_marks">
                              Partial marks
                              </strong>
                              <div class="no-more-tables ">
                                 <table class="table s_table" id="choices_table">
                                    <tbody>
                                       <tr>
                                          <td valign="center">1.</td>
                                          <td>
                                             <input type="checkbox" name="status" class="choices_table_checkbox">
                                          </td>
                                          <td class="s_weight" valign="center">
                                             <textarea class="form-control" name="choice[]" required=""></textarea>
                                          </td>
                                          <td valign="center" class="hidden">
                                             <div class="input-group input-group-sm">
                                                <input type="number" name="partial_marks[]" value="" class="form-control" width="30px" max="100" min="0" >
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
                                                <input type="number" name="partial_marks[]" value="" class="form-control" width="30px" max="100" min="0" >
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
                                                <input type="number" name="partial_marks[]" value="" class="form-control" width="30px" max="100" min="0" >
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
                                             <button class="btn btn-add-new btn-block" onclick="addrow_choice()"> + Add New Option</button>
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
                                       <strong>Negative Marks for Answering Wrong <i class="fa fa-info-circle"></i></strong>
                                    </div>
                                    <input type="text" name="negative_marks" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Question State <i class="fa fa-info-circle"></i> No tags added</strong>
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
                              <strong>Question Level <i class="fa fa-info-circle"></i></strong>
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
                                       <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                    </div>
                                    <input type="text" name="provider" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Author <i class="fa fa-info-circle"></i></strong>
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
                                       <strong>Text <i class="fa fa-info-circle"></i></strong>
                                    </div>
                                    <textarea min="0" class="form-control" name="text" style=""></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>Code <i class="fa fa-info-circle"></i></strong>
                                    </div>
                                    <textarea min="0" class="form-control" name="code" style=""></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                 <div class="form-group form-group-sm">
                                    <div class="heading_modal_statement heading_padding_bottom">
                                       <strong>URL <i class="fa fa-info-circle"></i></strong>
                                    </div>
                                    <textarea min="0" class="form-control" name="url" style=""></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="heading_modal_statement heading_padding_bottom">
                              <strong>Files <i class="fa fa-info-circle"></i></strong>
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
<!-- section-mcqs-Modal -->
@endsection
@section('modal_content')
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
                     <div class="form-group">
                        <div class="form-inline">
                           <label>Question Statement</label>
                           <span>(Current state of question : <h6 id="state_name"></h6>)</span>
                           <br>                         
                           <span id="question_statement_id"></span>
                           <div class="pull-right">
                              <a target="_blank" href="{{route('library_public_questions')}}?modal=modal_pencil" class="btn-sm btn-link">
                              <span uib-tooltip="Edit Question" class="glyphicon glyphicon-pencil f_pencil"></span></a>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="form-group">
                           <label>Marks for this Question</label>
                           <input type="number" value="" id="questionmarks" name="marks" min="1" class="form-control" required="required" style="">
                           <span class="">
                           <label>Negative Marks for Answering Wrong</label>
                           <input type="number" step="any" id="negativeMarks" name="negative_marks" min="0" class="form-control" required="required">
                           </span>
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Update Marks">
                     </div>
                     <div>
                        This is demo account thus the choices are hidden.
                        <br>
                     </div>
                     <table class="table">
                        <thead>
                           <tr>
                              <th colspan="3">Choices</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="" id="mcqrow0">
                              <td class="">1.</td>
                              <td class="">
                                 <input type="radio" name="893" value="true" disabled="disabled">
                              </td>
                              <td>
                                 <textarea class="form-control" id="mcq0" name="option" required="" disabled="disabled">Cipher</textarea>
                              </td>
                              <td width="120px" class="">
                                 <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" width="30px" max="100" min="0" disabled="disabled">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                 </div>
                              </td>
                              <td>
                              </td>
                           </tr>
                           <tr id="mcqrow1">
                              <td class="ng-binding">2.</td>
                              <td>
                                 <input type="radio" name="903" value="true" disabled="disabled">
                              </td>
                              <td>
                                 <textarea class="form-control" id="mcq1" name="option" required="" disabled="disabled">Rounds</textarea>
                              </td>
                              <td width="120px" class="">
                                 <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" width="30px" max="100" min="0" disabled="disabled">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                 </div>
                              </td>
                              <td>
                              </td>
                           </tr>
                           <tr id="mcqrow2">
                              <td>3.</td>
                              <td>
                                 <input type="radio" name="913" value="true" disabled="disabled"> 
                              </td>
                              <td>
                                 <textarea class="form-control" id="mcq2" name="option" required="" disabled="disabled">Encryption</textarea>
                              </td>
                              <td width="120px">
                                 <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" width="30px" max="100" min="0" disabled="disabled">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                 </div>
                              </td>
                              <td>
                              </td>
                           </tr>
                           <tr id="mcqrow3">
                              <td>4.</td>
                              <td>
                                 <input type="radio" name="923" value="true" disabled="disabled">
                              </td>
                              <td>
                                 <textarea class="form-control" id="mcq3" name="option" required="" disabled="disabled">DES function</textarea>
                              </td>
                              <td width="120px">
                                 <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" width="30px" max="100" min="0" data-ng-disabled="true">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                 </div>
                              </td>
                              <td>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="form-group">
                        <input type="checkbox" disabled="disabled"> Partial marks
                     </div>
                     <div class="form-group">
                        <input type="checkbox" disabled="disabled">Shuffle the options in the test
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
@endsection