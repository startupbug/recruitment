@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="view">
    @include('general_partials.error_section')
    <div class="container-fluid padding-15-fluit">
        <div class="row">
            <div class="col-md-12">
                <div class="button_view"><span class="glyphicon glyphicon-plus"></span>
                    <button type="button" class="btn" data-toggle="modal" data-target="#create-test-template-Modal">Create a Test Template</button>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid padding-15-fluid">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="pill" href="#home">

                Test Hosted ({{isset($hosted_tests) ? count($hosted_tests) : '' }})
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
        <li>
            <a data-toggle="pill" href="#testemplate">
                Test Templates ({{$count}})
                <div class="s_click_popup">
                    <i class="fa fa-info-circle" data-toggle="tooltip" title="Click Me" tooltip-trigger="outsideClick"> </i>
                    <span class="s_click_popuptext f_popup">
                    Click Me
                    </span>
                </div>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="view_filter_right">
                <i class="fa fa-filter" data-toggle="modal" data-target="#filter_view"></i>
            </div>

        @foreach($hosted_tests as $key => $hosted_test)
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
                                @if($hosted_test->status == 2)
                                    <!-- Terminated -->
                                    <li>Expired (terminated)</li>
                                   <?php $expired_status=true;  ?>  
                                @elseif(strtotime($todaydate) > strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date))))
                                 <li>Expired</li>
                                 <?php $expired_status=true;   ?>                         
                                @elseif(strtotime($todaydate) == strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date))))
                                 <li>Live</li>
                                 <?php $live_status=true;  ?>  
                                @elseif(strtotime($todaydate) < strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date))))
                                 <li>Live</li>
                                 <?php $live_status=true;  ?>                                             
                                @endif

                                <li>{{$hosted_test->host_name}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right_tab">
                            <ul>
                                 @if(!(strtotime($todaydate) > strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date)))))
                                    <li><a href="#">Invite Candidates</a></li>
                                    <li><a href="{{route('edit_template',['id'=>$hosted_test->test_template_id])}}">Edit</a></li>                                                                 
                                 @endif
                               <!--  <li>Report</li> -->
                                <li>
                                    <div class="dropdown">
                                        <button type="button" id="dropdownMenu2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        More
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="invited_candidates.php">View Invited Candidates</a></li>

                                            <li><a href="{{route('preview_public_testpage', ['id' => $hosted_test->host_id])}}" target="blank">Preview Public Test Page</a></li>
                                            <li><a href="#" target="blank">View subscribed candidates</a></li>
                                           <li><a href="{{route('preview_test', ['id' => $hosted_test->test_template_id])}}" target="blank">Preview Test</a></li>                                            
                                            <li><a class="deleteConfirm" onclick="confirmAlert('Are You Sure ? You want to delete this Host.', '{{route('host_test_del')}}', {{$hosted_test->host_id}} )" >Delete Test</a></li>
                                            @if($live_status)
                                                 <li><a class="deleteConfirm" onclick="confirmAlert('Are You Sure ? You want to terminate this Host.', '{{route('host_terminate')}}', {{$hosted_test->host_id}} )" >Terminate</a></li>
                                            @endif

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
                    <div id="collapse_livecode{{$key}}" class="panel-collapse collapse">
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
                                           <!--  Tue, Feb 6, 8:42 AM, CAST -->
                                             {{ date("F jS, Y H:i", strtotime($hosted_test->test_open_date)) }}
                                             {{ $hosted_test->test_open_time }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Ends at  </span>
                                            <span class="pull-right margin_25">
                                            <span class="margin_25">:</span>
                                            {{ date("F jS, Y H:i", strtotime($hosted_test->test_close_date)) }}
                                            {{ $hosted_test->test_close_time }} </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Duration</span>
                                        <?php 
                                        $to_time = date("H:i:s",strtotime($hosted_test->test_open_date));
                                        $from_time = date("H:i:s",strtotime($hosted_test->test_close_date) );
                                    
                                        $datetime1 = new DateTime($to_time." ".$hosted_test->test_open_time);
                                        $datetime2 = new DateTime($from_time." ".$hosted_test->test_close_time);
                                        $interval = $datetime1->diff($datetime2);

                                        ?>
                                            <span class="pull-right margin_22">
                                            <span class="margin_29">:</span>
                                            <?php echo $interval->format('%hh %im');?></span>
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
                                            {{$hosted_test->cut_off_marks}}</span>
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
        @endforeach
        </div>
        <div id="testemplate" class="tab-pane fade">
            <div class="col-md-12 s_testtemplate_border">
                <div class="view_filter_right">
                    <i class="fa fa-filter" data-toggle="modal" data-target="#filter_view"></i>
                </div>
                
                @foreach($listing as $key => $value)

                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template_{{$key}}" aria-expanded="false">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                  <li>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template_{{$key}}" aria-expanded="false">
                                      <span class="fa fa-caret-right"></span>
                                    </a>
                                  </li>
                                  <li> {{$value->title}} <span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                  <li><a href="{{route('preview_test',['id'=>$value->id])}}" target="_blank">Public Preview</a></li>
                                  <li><a href="{{route('edit_template',['id'=>$value->id])}}"  onclick="edit_template_text_editor()">Edit</a></li>
                                  <li class="host_content">
                                      <div class="host">
                                          <a href="{{route('host_test_page',['id'=>$value->id])}}">Host this test</a>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="dropdown">
                                          <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                          More
                                          <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                              <li><a href="" target="blank">Preview Templates</a></li>
                                              <li>
                                                  <a href="#" class="duplicate_modal_id duplication_of_template" data-toggle="modal" data-message="{{$value->id}}" data-target="#createtemplate">Create Duplicate Template</a>
                                              </li>
                                              <li>
                                                  <a href="{{route('delete_test_template',['id'=>$value->id])}}" class="deleteConfirm" onclick="return confirm('Are You Sure To Delete This Test Template?')">Delete</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row border_view">
                        <div id="template_{{$key}}" class="panel-collapse collapse">
                            <div class="col-md-12">
                                <p class="view_content">Webcam : required</p>
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
                                            <td><span>Duration</span>
                                                <span class="pull-right margin_22">
                                                <span class="margin_30">:</span>
                                                45 minutes</span>
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
                                        @foreach($sections[$value->id] as $key => $section)
                                        <tr>
                                            <td>{{$section->section_name}}{{++$key}}
                                                <?php 
                                                $abc = App\Question::select('questions.id')->where('questions.question_type_id',1)
                                                ->where('questions.section_id',$section->id)
                                                ->count();
                                                $def = App\Question::select('questions.id')->where('questions.question_type_id',2)
                                                ->where('questions.section_id',$section->id)
                                                ->count();
                                                 $hij = App\Question::select('questions.id')->where('questions.question_type_id',3)
                                                ->where('questions.section_id',$section->id)
                                                ->count();
                                                ?>

                                            <span class="pull-right">                     
                                                {{$abc}} MCQ (15min)
                                                /
                                                {{$def}} Coding (15min)
                                                /
                                                {{$hij}} Submission (15min)
                                            </span>

                                            </td>
                                        </tr>    
                                        @endforeach                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>    
                @endforeach() 
                @if($count == 0)
                <h1>No template to found</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('createtemplate')
<!--create duplicate template on view page-->
<div class="modal fade" id="createtemplate" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter fa_evaluate">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <!--<button type="button" class="btn s_save_button s_font" data-dismiss="modal">Create</button>-->
                    <!--<button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>-->
                </div>
                <h3 class="modal-title s_font f_font"><i class="fa fa-copy duplicate_copy"></i>Create Duplicate Test Template</h3>
            </div>
            <div class="modal-body s_modal_form_body modal_top modal_duplicate">
                <form action="{{route('create_duplicate_template_post')}}" id="create_duplicate_template_post" method="POST">
                    {{csrf_field()}}
                    <input type="text" id="duplication_of_template_ki_id" value="" name="previous_template_id">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group title">
                                <label class="col-md-3 control-label" for="name">Test-template Name:</label>
                                <div class="col-md-9">
                                    <div class="template">
                                        <input id="name" name="title" value="" type="text" placeholder="Enter name of the new test template" class="form-control general">
                                    </div>
                                    <img src="{{ asset('public/assets/img/loader.gif') }}" id="loader_image" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="button_duplicate">
                                <button type="submit" class="btn">Create</button>
                                <button type="button" id="close_modal_template" class="btn btn-default s_font f_font" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end -->
@endsection
@section('create_template_modal')
<!--View page on create a test template -->
<div class="modal fade" id="create-test-template-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <form action="{{route('create_test_template')}}" method="post">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header s_modal_form_header">
                    <div class="pull-right">
                        <button type="submit" class="btn s_save_button s_font">Create</button>
                        <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                    </div>
                    <h3 class="modal-title s_font">Create New Test Template1</h3>
                </div>
                <div class="modal-body s_modal_form_body test_template">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                                <div class="form-group title">
                                    <label class="col-md-3 control-label" for="name">Template Title
                                        <div class="s_popup">
                                                    <i class="fa fa-info-circle"> </i>
                                                    <span class="s_popuptext">
                                                      This field represents the title of the test template.<br>
                                                      <br>
                                                        Why it matters:  The title of the template is used for identification and searching of historical templates via filters.

                                                    </span>
                                                </div>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="template"><input id="name" name="title" type="text" placeholder="Name of the test template" class="form-control general">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group title">
                                    <label class="col-md-3 control-label" for="name">Type
                                        <div class="s_popup">
                                                    <i class="fa fa-info-circle"> </i>
                                                    <span class="s_popuptext">
                                                     Based the mode of inviting candidates,test can be of two types: (1)Public (2)Invite-Only<br>
                                                      <br>
                                                      Public Test: This type of test supports unrestricted invitation to the test takers by generating a public link and distributing the same among the test takers.
                                                      <br>
                                                      <br>
                                                      Invite-Only Test: This type of test supports selective invitation to the test takers by sending an auto generated email invitation.

                                                    </span>
                                                </div>

                                    </label>
                                    <div class="col-md-9">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="template_type_id" value="1"  checked="checked">Public
                                            </label>
                                            <label>
                                                <input type="radio" name="template_type_id" value="2">Invite-Only
                                            </label>
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
<!--Close-->
@endsection
@section('filter_criteria_template_modal')
<div class="modal fade" id="filter_view" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <!--<button type="button" class="btn s_save_button s_font" data-dismiss="modal">Create</button>-->
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                </div>
                <h3 class="modal-title s_font f_font"><i class="fa fa-filter">Filter Criteria</i></h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <form action="{{route('manage_test_view')}}" method="get">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group title">
                                <label class="col-md-3 control-label" for="name">Name:</label>
                                <div class="col-md-9">
                                    <div class="template">
                                        <input type="hidden" name="filter_hidden" value="1">
                                        <input id="name" name="name" type="text" placeholder="Enter the name of the test" class="form-control general" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group title">
                                <label class="col-md-3 control-label" for="name">Test type:</label>
                                <div class="col-md-9">
                                    <div class="checkbox both ">
                                        <label><input type="checkbox" name="search[]" value="1" checked="">Public</label>
                                        <label><input type="checkbox" name="search[]" value="2">Private</label>
                                        <label><input type="checkbox" name="search[]" value="3">Both</label>
                                    </div>
                                </div>
                            </div> 
                            <div class="button_filter">
                                <button type="submit" class="btn">Apply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

