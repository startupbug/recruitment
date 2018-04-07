@extends('employee_dashboard.layouts.app')
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
                Test Hosted (1)
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
                Test Templates (6)
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
            <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#collapse_livecode" aria-expanded="false">
                <div class="row main_tab">
                    <div class="col-md-6">
                        <div class="left_tab">
                            <ul>
                                <li>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#collapse_livecode" aria-expanded="false">
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
                                        <button type="button" id="dropdownMenu2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        More
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="invited_candidates.php">View Invited Candidates</a></li>
                                            <li><a href="previewtest.php" target="blank">Preview Test</a></li>
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
                                            <span class="margin_29">:</span>
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
                <div class="view_filter_right">
                    <i class="fa fa-filter" data-toggle="modal" data-target="#filter_view"></i>
                </div>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template1" aria-expanded="false">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template1" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li> Customer Service Test - CodeGround  <span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li class="host_content">
                                        <div class="host">
                                            <a href="host_text.php">Host this test</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="previewtest.php" target="blank">Preview Templates</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
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
                                        <tr>
                                            <td>Section1   <span class="pull-right">10MCQ (15min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section2   <span class="pull-right">5MCQ (10min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section3   <span class="pull-right">5MCQ (10min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section4   <span class="pull-right">5MCQ (10min)</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template2" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template2" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>BPO Test - CodeGround <span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
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
                                            <th>Timings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>Duration</span>
                                                <span class="pull-right margin_22">
                                                <span class="margin_25">:</span>
                                                45 minutes</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sections</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Section1 <i class="fa fa-window-maximize" aria-hidden="true"></i>  <span class="pull-right">10MCQ (15min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section2 <i class="fa fa-window-maximize" aria-hidden="true"></i>  <span class="pull-right">10MCQ (15min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section3 <i class="fa fa-window-maximize" aria-hidden="true"></i>  <span class="pull-right">10MCQ (15min)</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template3" aria-expanded="false">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template3" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>English <span class="test-muted">(try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
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
                                <table class="table table-bordered size">
                                    <thead>
                                        <tr>
                                            <th>Timings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>Duration</span>
                                                <span class="pull-right margin_22">
                                                <span class="margin_25">:</span>
                                                33 minutes</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered size">
                                    <thead>
                                        <tr>
                                            <th>Sections</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Section1 <i class="fa fa-window-maximize" aria-hidden="true"></i>  <span class="pull-right">17MCQ (15min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section2   <span class="pull-right">2 Coding / 2 MCQ / 1 Submission (3min)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Section3   <span class="pull-right">2MCQ (15min)</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template4" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template4" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>Html</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
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
                                <table class="table table-bordered size">
                                    <thead>
                                        <tr>
                                            <th>Timings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>Duration</span>
                                                <span class="pull-right margin_22">
                                                <span class="margin_25">:</span>
                                                15 minutes</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered size">
                                    <thead>
                                        <tr>
                                            <th>Sections</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Section1   <span class="pull-right">1 Coding / 2 MCQ / 1 Submission (15min)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template5" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template5" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>Test template <span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row border_view">
                        <div id="template5" class="panel-collapse collapse">
                            <div class="col-md-12">
                                <p class="view_content">Webcam : required</p>
                            </div>
                            <div class="col-md-3">
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
                                                <span class="margin_25">:</span>
                                                30 minutes</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sections</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <tr>
                                            <td>Section1 <i class="fa fa-window-maximize" aria-hidden="true"></i>  <span class="pull-right">3 MCQ (15min)</td>
                                        </tr>
                                        <tr>
                                            <td>Section2   <span class="pull-right">1 Submission (15min)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template6" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template6" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>Java Coding <span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <!--<li><a href="publicpreview.php" target="_blank">Public Preview</a></li>-->
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row border_view">
                        <div id="template6" class="panel-collapse collapse">
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
                                                <span class="margin_29">:</span>
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
                                            <td>Section1  <i class="fa fa-window-maximize" aria-hidden="true"></i> 2 Coding / 8 MCQ (90min)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template7" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template7" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>Sample Template 2<span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <li><a href="publicpreview.php" target="_blank">Public Preview</a></li>
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row border_view">
                        <div id="template7" class="panel-collapse collapse">
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
                                                <span class="margin_29">:</span>
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
                <section class="tab_nav accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#template8" aria-expanded="false"">
                    <div class="row main_tab">
                        <div class="col-md-6">
                            <div class="left_tab">
                                <ul>
                                    <li>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#template8" aria-expanded="false">
                                        <span class="fa fa-caret-right"></span>
                                        </a>
                                    </li>
                                    <li>Sample Template 1<span class="test-muted">(Try)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right_tab">
                                <ul>
                                    <!--<li><a href="publicpreview.php" target="_blank">Public Preview</a></li>-->
                                    <li><a href="host_text.php">Edit</a></li>
                                    <li>
                                        <div class="host">  <a href="host_text.php">Host this test</a></div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            More
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="invited_candidates.php">Preview Template</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#createtemplate">Create Duplicate Template</a></li>
                                                <li><a href="#" class="deleteConfirm" onclick='confirmAlert()'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row border_view">
                        <div id="template8" class="panel-collapse collapse">
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
                                                <span class="margin_29">:</span>
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
@endsection
    
@section('create_template_modal')
<!--View page on create a test template -->
<div class="modal fade" id="create-test-template-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <form action="{{route('create_test_template')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header s_modal_form_header">
                    <div class="pull-right">
                        <button type="submit" class="btn s_save_button s_font">Create</button>
                        <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                    </div>
                    <h3 class="modal-title s_font">Create New Test Template</h3>
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
                                            <label><input type="radio" name="template_type_id" value="1">Public</label>
                                            <label><input type="radio" name="template_type_id" value="2">Invite-Only</label>
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

