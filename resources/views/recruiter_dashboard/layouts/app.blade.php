<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Online Recruitment') }}</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('public/assets/img/logo.png') }}" type="image/png" sizes="25x25">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bower_components/Autocomplete/dist/autocomplete.css') }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/hamburgers.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/jquery.mhead.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('public/assets/css/editor.css') }}"/> -->
    <link rel="stylesheet" href="{{ asset('public/bower_components/alertify/themes/alertify.default.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/froala_editor.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/assets/css/sweetalert.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/assets/css/loading.css') }}"/>

    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery.countdownTimer.css') }}"/>

    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/S_style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">

    <script type="text/javascript">


    </script>
</head>
<body>
    <div id="wrapper">
        @include('recruiter_dashboard.partials.header')
        @yield('content')
    </div>
<!-- Filter-Modal -->

<!-- <div class="modal fade" id="filter-programming-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Apply</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font"><i class="fa fa-filter fa-lg"></i>  Filter Criteria909</h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <form class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">Question id:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="id" placeholder="Enter question id" name="id"  min="0" max="9999999999999">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Question Title:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" placeholder="Enter question title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">Question Statement:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="statement" placeholder="Enter question statement" name="statement">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tags :</label>
                        <div class="col-sm-9">
                            <select id="tag_multi_programming" multiple="multiple">
                                <option value="1">Aptitude</option>
                                <option value="2">Basic Algebra</option>
                                <option value="3">HTML and CSS</option>
                                <option value="4">JAVA</option>
                                <option value="5">C#</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group state">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="staged" checked >Staged
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="ready" checked >Ready
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="all" checked >All
                        </div>
                    </div>
                    <div class="form-group level">
                        <label class="control-label col-sm-2" for="statement">Level :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="easy" checked >Easy
                        </div>
                        <div class="checkbox col-md-2 col-xs-4">
                            <input type="checkbox" class="intermediate" checked >Intermediate
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="hard" checked >Hard
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox" class="all" checked >All
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="provider">Provider:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="provider" placeholder="Enter provider of question" name="provider">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" placeholder="Enter author of question" name="author">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


<!-- public-mcqs-Modal -->
<div class="modal fade" id="public-mcqs-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font"><span id="pub_mcq_type"></span> <span>(Question Id : <span id="pub_mcq_no"></span>)</span></h3>
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
                                <div class="panel panel-pagedown-preview">
                                    <div class="panel-heading">
                                        <strong>Preview</strong>
                                    </div>
                                    <div class="panel-body">
                                  <!--       <p>What does the following idiom/phrase mean?</p>
                                        <pre>
                                              &lt;&#63;php
                                              $a = array("hi", "hello", "bye");
                                              for (;count($a) < 5;) {
                                              if (count($a) == 3)
                                              print $a;
                                            }
                                            &#63;&gt;
                                          </pre> -->
                                          <span id="pub_mcq_statement"></span>
                                    </div>
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
                                    <strong>Question State <i class="fa fa-info-circle"></i></strong>
                                    <strong class="pull-right">
                                    <input type="checkbox" class="partialCheck" name="" value="">
                                    Partial marks
                                    </strong>
                                    <div class="no-more-tables ">
                                        <table class="table s_table">
                                            <tbody id="choiceTable_lib">


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" class="shuffleCheck">Shuffle the options in the test
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
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags <i class="fa fa-info-circle"></i></strong>
                                </div>
                                <p id="pub_mcq_tags">-</p>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- public-programming-question-Modal -->
<div class="modal fade" id="public-programming-question-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Coding Question <span>(Question Id : <span class="pub_cod_no"></span>)</span></h3>
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Program Title <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <input type="text" class="form-control pub_cod_title" value="Pass The Ball" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Program Statement <i class="fa fa-info-circle"></i></strong>
                                </div>
                                <div class="panel panel-pagedown-preview">
                                    <div class="panel-heading">
                                        <strong>Preview</strong>
                                    </div>
                                    <div class="panel-body">
                                       <!--  <p>What does the following idiom/phrase mean?</p> -->
                                        <p class="s_modal_body_heading pub_cod_statement">
                                            The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
                                            ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from (j-Ai) to (j-1), or from (j+1) to (j+Ai) (provided that the position exists).
                                            Now, ThunderCracker wants to find out the number of ways in which, after exactly M passes, the ball reaches his friend MunKee, given that the first pass is made by ThunderCracker. (Two ways are considered different if there exists atleast one pass which resulted in the ball being passed to a different player.)
                                        </p>

                                    </div>
                                </div>
                                <br>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Sample Input & Output <i class="fa fa-info-circle"></i></strong>
                                    <div class="no-more-tables ">
                                        <table class="table s_table">
                                            <thead>
                                                <th></th>
                                                <th><b>Input</b></th>
                                                <th><b>Output</b></th>
                                            </thead>
                                            <tbody id="pub_cod_inout">

                                              <!--  <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="option" rows="4" required="" disabled>3 3 2 1 1 1 1
                                                        </textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="option" rows="4" required="" disabled>2</textarea>
                                                    </td>
                                                </tr> -->
                                            </tbody>
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
                                    <hr>
                                    <div class="no-more-tables ">
                                        <table class="table s_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><b>Name</b></th>
                                                    <th><b>Weightage</b></th>
                                            </thead>
                                            <tbody id="pub_cod_cases">
                                              <!--   <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        Test 0
                                                    </td>
                                                    <td valign="center">
                                                        <input type="number" name="" value="50" disabled>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
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
                        <!--  Question Details -->
                        <div class="modal-content s_modal s_yellow_color_modal">
                            <div class="modal-header s_modal_header s_yellow_color_header">
                                <h4 class="modal-title s_font"> Question Details</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags <i class="fa fa-info-circle"></i></strong>
                                </div>
                                <span class="s_modal_body_heading"><span id="pub_cod_tags"></span>
                                <br>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question Level <i class="fa fa-info-circle"></i></strong><span> :  <span id="pub_cod_level"></span></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <input type="text" class="form-control pub_cod_provider" name="provider" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <input type="text" class="form-control pub_cod_author"  name="author" disabled value="">
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


<div class="modal fade" id="private-programming-debug-Modal" role="dialog">
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
                                    <strong>Question State <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
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
                                                <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement">
                                    <strong>Program Statement (<a href="#">Expand</a>) <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
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
                                    <strong>Test Cases <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
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
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
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
                                    <strong>Question Level <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
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
                                                <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
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
                            <div class="modal-header s_modal_header s_orange_color_header  accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution3" aria-expanded="false">
                                <h4 class="modal-title s_font">  Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution3">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Text <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Code <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>URL <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="instructions page before the test. <br>
                                 This is a markdown editor <br>
                                 Learning refrence:<br>
                                 http://www.markdowntutorial.com/"> <i class="fa fa-info-circle"> </i></a></strong>
                                </div>
                                <!--<button type="file" class="btn">Upload Files</button>-->
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
    </div>
</div>
<!-- private-submission-question-Modal -->

<!-- section-submission-fill-blanks-question-Modal -->


@yield('create_template_modal')

<!--view page on Filter -->
@yield('filter_criteria_template_modal')


<!--filter modal view page end-->
<!--view page on Setup manual-->
<div class="modal fade" id="setup_manual" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter fa_evaluate">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <!--<button type="button" class="btn s_save_button s_font" data-dismiss="modal">Create</button>-->
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                </div>
                <h3 class="modal-title s_font f_font">Setup Manual Evaluation</h3>
            </div>
            <div class="modal-body s_modal_form_body modal_top">
                <div class="row">
                    <div class="col-md-3 bg_color">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="evaluator">
                                    <a data-toggle="pill" href="#add_evaluater" class="active">
                                    1.Add Evaluators
                                    </a>
                                </h3>
                                <h3 class="evaluator">
                                    <a data-toggle="pill" href="#assign_evaluater">
                                    1.Assign Evaluators To Reports
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="add_evaluater" class="tab-pane active">
                            <h3 class="evaluater">Add Evaluators</h3>
                            <form class="" action="#">
                                <div class="row border_manual">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group manual">
                                            <input type="text" class="form-control" id="name" placeholder="Name:">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group manual">
                                            <input type="email" class="form-control" id="email" placeholder="Email:">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="button_manual"><button type="submit" class="btn btn-default">Add Evaluater</button></div>
                                    </div>
                                </div>
                            </form>
                            <table class="table manual_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="last_manual">
                                <h3>No Judges Added.Please Add a Judge</h3>
                            </div>
                            <div class="button_step"><button type="button" class="btn">Proceed to Next Step</button></div>
                        </div>
                        <div id="assign_evaluater" class="tab-pane">
                            <h3 class="evaluater">In the Reports Page, you can select one or more candidate reports as shown below.</h3>
                            <div class="img_evaluate"><img src="{{ asset('public/assets/img/selectCandidates-min.png') }}" class="img-responsive"></div>
                            <h3 class="evaluater">You can then assign Evaluators to evaluate these selected reports as shown below.</h3>
                            <div class="img_evaluate"><img src="{{ asset('public/assets/img/assignjudge-min.png') }}" class="img-responsive"></div>
                            <h3 class="evaluater"><a href="#">Click here</a>to open the Reports Page to assign Manual Evaluators.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--setup manual end-->
@yield('createtemplate')

<!--Setting page on user management-->
<div class="modal fade" id="usermanagement" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter fa_evaluate fa_user">
            <div class="modal-header s_modal_form_header">
                <h3 class="modal-title s_font f_font">Add New User</h3>
            </div>
            <div class="modal-body s_modal_form_body modal_top modal_user">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Email Address</label>
                            <div class="col-md-9">
                                <div class="template"><input id="name" name="name" type="text" class="form-control general">
                                </div>
                            </div>
                        </div>
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="email">Role</label>
                            <div class="col-md-9">
                                <div class="checkbox_user"><input type="checkbox" name="admin" value="admin">Admin<br></div>
                                <p class="user_content">Complete control except access to setting page.</p>
                                <br>
                                <div class="checkbox_user"><input type="checkbox" name="admin" value="admin">Test Manager</div>
                                <p class="user_content">Manage Tests and Templates (host, add, edit, delete). Cannot access reports.</p>
                                <br>
                                <div class="checkbox_user"><input type="checkbox" name="admin" value="admin">Template Manager</div>
                                <p class="user_content">Manage Test Templates (add, edit, delete), Manage questions in Templates. Cannot host tests or access reports.</p>
                                <br>
                                <div class="checkbox_user"><input type="checkbox" name="admin" value="admin">Report viewer</div>
                                <p class="user_content">View all reports.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer user_save">
                <div class="button_notify">
                    <button type="button" class="btn">Save and Notify User</button>
                    <!--<button type="button" class="btn cancel_footer">Cancel</button>-->
                    <button type="button" class="btn btn-default s_font btn cancel_footer" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end user management-->
<!--Invited Candidates on send reminder-->
<div class="modal fade" id="duplicatesend-2" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter fa_evaluate">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                </div>
                <h3 class="modal-title s_font f_font"><i class="fa fa-copy duplicate_copy"></i>Compose mail</h3>
            </div>
            <div class="modal-body s_modal_form_body modal_top modal_duplicate">
                <div class="row">

                    <div class="col-md-10">

                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Recipients:</label>
                            <div class="col-md-9">
                                <h3 class="candidate_view">All Candidates</h3>

                            </div>
                        </div>

                    </div>
                    <br>
                    <br>

                    <div class="col-md-10 subject">

                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Subject:</label>
                            <div class="col-md-9">
                                <div class="template"><input id="name" name="name" type="text" placeholder="Subject of the mail" class="form-control general">
                                </div>
                            </div>
                        </div>

                    </div>
                     <div class="col-md-10 subject">

                        <div class="form-group title message_body">
                            <label class="col-md-3 control-label" for="name">Body:</label>
                            <div class="col-md-9">
                                    <textarea rows="8" cols="112" placeholder="Please add the information that you want to notify to the candidate">Dear candidates,
 This is to remind you that the testJava Coding will commence on 02/06/2018 08:42 am and ends on 02/20/2018 08:39 am.
 We wish you the best of luck.
                                    </textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-->

<!--preview test on ques page-->
<div class="modal fade" id="preview_test" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content filter fa_evaluate fa_previewtest">
            <div class="modal-header s_modal_form_header">
                <!--<div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
                </div>-->
                <h3 class="modal-title s_font f_font"><i class="fa fa-laptop"></i>System Check</h3>
            </div>
            <div class="modal-body s_modal_form_body modal_top modal_duplicate">
                <div class="row">

                    <div class="col-md-6">
                        <div class="browser_chrome">
                        <p class="browser">Browser</p>
                        <div class="chrome_fa"><i class="fa fa-chrome"></i></div>
                        <p class="num">Chrome 64</p>
                        <p class="support"><i class="fa fa-check"></i>Supported</p>
                    </div>
                    <div class="browser_chrome">
                        <p class="browser">Speakers</p>
                        <div class="chrome_fa"><i class="fa fa-chrome"></i></div>
                        <p class="num">Required</p>
                        <audio controls>
                          <source src="" type="audio/ogg">
                          <source src="" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                        <p class="num">Play to test</p>
                   </div>
                   </div>
                   <div class="col-md-6">
                     <div class="browser_chrome">
                        <p class="browser">Camera</p>
                        <div class="chrome_fa"><i class="fa fa-chrome"></i></div>
                        <p class="num">Required</p>

                        <p class="not_found"><i class="fa fa-window-close"></i>Not Found <span><a href="#">(Retry)</a></span></p>

                   </div>

                   </div>
            </div>
        </div>
         <div class="panel-footer preview_test_fa">
             <div class="pull-right issues">
                Your test has issues
                <button type="button" class="btn proceed" data-dismiss="modal">Proceed Anyway</button>
                <!--<p class="issues">Your test has issues</p>-->
                    <!--<button type="button" class="btn s_save_button s_font" data-dismiss="modal">Send</button>-->

                    <!--<button type="button" class="btn btn-default s_font proceed" data-dismiss="modal">Proceed Anyway</button>-->
                </div>

         </div>
    </div>
</div>

<!--end-->
<script src="{{ asset('public/bower_components/jquery/dist/jQuery.min.js') }}"></script>
<script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/bower_components/wow/dist/wow.min.js') }}"></script>
<script src="{{ asset('public/bower_components/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('public/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="http://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<script src="{{ asset('public/assets/plugins/menu/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('public/assets/plugins/menu/js/jquery.mhead.js') }}"></script>
<script src="{{ asset('public/assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.blink.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.localscroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollTo.js') }}"></script>
<!-- <script src="{{ asset('public/assets/js/editor.js') }}"></script> -->
<!-- <script src="{{ asset('public/assets/js/sweetalert.min.js') }}"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/assets/js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('public/assets/js/froala_editor.min.js') }}"></script>
<script src="{{ asset('public/assets/js/loading.js') }}"></script>
<script src="{{ asset('public/assets/js/paginathing.js') }}"></script>

<script src="{{ asset('public/assets/js/jquery.countdownTimer.js') }}"></script>

<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<script src="{{ asset('public/assets/js/script.js') }}"></script>
<script src="{{ asset('public/assets/js/f.js') }}"></script>
<script src="{{ asset('public/assets/js/s_js.js') }}"></script>
<script src="{{ asset('public/assets/js/i_js.js') }}"></script>
<script src="{{ asset('public/assets/js/fa_js.js') }}"></script>
<script src="{{ asset('public/assets/js/h.js') }}"></script>

<script>

  var csrf = '{{csrf_field()}}';
  var base_url  = '{{ asset('') }}';

  $(document).ready(function(){
      $('.duplicate_modal_id').click(function(){
          var a = $(this).attr('data-target-id');
          $(".modal-body input[name=previous_template_id]").val(a);
    });
  });

  $('body').scrollspy({target: "#myScrollspy"})
  $(document).ready(function(){
      $(".dropdown").click(function() {
          $('.dropdown-menu', this).toggleClass('open');
      });
  });

  function modal_data(id, tpye){
      console.log(id);
      switch(tpye) {
          case "modal_pencil":
              text = ".ajax_route";
              break;
          case "modal_coding":
              text = ".code_ajax_route";
              break;
          case "submission_modal":
              text = ".submission_ajax_route";
              break;
          default:
              text = ".ajax_route";
      }

    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
      url: base_url  + 'recruiter/question_modal_partial_data',
      type: 'post',
      data: {'question_id': id},
      'dataType' : 'json',
      success: function (data) {
        console.log("123");
        console.log(data.dataz);
        console.log(data.question_data.question_level_id);
        $("#questionmarks").val(data.question_data.marks);
        $("#negativeMarks").val(data.question_data.negative_marks);
        $("#question_id_id").val(data.question_data.question_id);

        $(text).attr("href","{{route('library_public_questions')}}/"+id+"?modal="+tpye);


        $("#question_statement_id").text(data.question_data.question_statement);
        $("#state_name").text(data.question_data.state_name);
        $("#level_name").text(data.question_data.level_name);
        $("#tagName").text(data.question_data.tag_name);
        // $("#question_ki_id").text(id);

        /* Multiple Choices HTML */
        $choices_html = ``;

      var i=1;
      var partialFlag = 0;
      var shuffleFlag = 0;
      $.each(data.question_choices, function( index, value ) {
               //alert( index + ": " + value );
               //value.partial_marks = value.partial_marks ? value.partial_marks : '';
               $choices_html += `<tr class="">
                                <td class="">`+i+`.</td>
                                <td class="">
                                   <input type="radio" name="893" value="true" disabled="disabled">
                                </td>
                                <td>
                                   <textarea class="form-control" name="option" required="" disabled="disabled">`+value.choice+`</textarea>
                                </td>
                                <td width="120px" class="">
                                   <div class="input-group input-group-sm">
                                      <input type="number" class="form-control" width="30px" value="`+value.partial_marks+`"  disabled="disabled">
                                      <span class="input-group-addon" id="basic-addon1">%</span>
                                   </div>
                                </td>
                                <td>
                                </td>
                             </tr> `;
                //checking partial flag
                if(value.partial_marks != null){
                      partialFlag = 1;
                }
                if(value.shuffleFlag != 0){
                      shuffleFlag = 1;
                }
        i++;
      });

      //Ticking Partial flag if required
      if(partialFlag == 1){
        $('.partialCheck').prop('checked', true);
      }
      if(shuffleFlag == 1){
        $('.shuffleCheck').prop('checked', true);
      }


      $("#choiceTable").html($choices_html);


      },
      error: function (data) {
        console.log(data);
      }
    });

  }

  //HASAN MEHDI  SENDING CODING QUESTION ID IN CONTROLLER FUNCTION coding_question_modal_partial_data()
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  $(document).ready(function(){

        $('.coding_question_id').click(function(){
            console.log($(this).data('id'));
            // alert($(this).data('url'));
            $("#codings_question_id").val($(this).data('id'));

            var questionid = $(this).data('id');
            var question_typeid = 2;
            $.ajax({
                type: 'post',
                url: $(this).data('url'),
                data: {'id': questionid, 'quesType': question_typeid},
                success: function (data) {
                console.log("success");
                console.log(data);
                if(question_typeid == 2)
                {
                    //console.log("has" + );
                    $("#coding_marks").val(data.coding_question_data.marks);
                    $('.coding_tags').text(data.coding_question_data.tag_name);
                    $('.coding_question_level').text(data.coding_question_data.level_name);
                    $('.coding_author').text(data.coding_question_data.author);
                    $('.coding_provider').text(data.coding_question_data.provider);
                    $(".code_ajax_route").attr("href","{{route('library_public_questions')}}/"+data.coding_question_data.id+"?modal=modal_coding");

               var inout_html = "";
                   var i =1;
                    $.each(data.coding_question_entries, function( index, value ) {
                            //alert( index + ": " + value );
                            //value.partial_marks = value.partial_marks ? value.partial_marks : '';
                            inout_html += `<tr>
                                         <td valign="center">`+i+`</td>
                                         <td valign="center">
                                             <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.input+`
                                             </textarea>
                                         </td>
                                         <td valign="center">
                                             <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.output+`</textarea>
                                         </td>
                                     </tr>`;
                                     i = i +1;
                     i++;
                   });

                  $(".coding_question_table").html(inout_html);

                }
                }
            });
      });
    });

  //HASAN MEHDI  SENDING CODING QUESTION ID IN CONTROLLER FUNCTION submission_question_modal_partial_data()
  $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).ready(function(){

          $('.submission_question_id').click(function(){
              console.log($(this).data('id'));
              // alert($(this).data('url'));
              $("#submission_question_id").val($(this).data('id'));

              var questionid = $(this).data('id');
              var question_typeid = 3;
              $.ajax({
                  type: 'post',
                  url: $(this).data('url'),
                  data: {'id': questionid, 'quesType': question_typeid},
                  success: function (data) {
                  console.log("success");
                  console.log(data);
                  if(question_typeid == 3)
                  {
                      //console.log("has" + );
                      $("#submissions_question_id").val(data.coding_question_data.id);
                      $('#submission_questionmarks').val(data.coding_question_data.marks);
                      $('.submission_tags').text(data.coding_question_data.tag_name);
                      // $('.submission_level').text(data.coding_question_data.level_name);
                      $('.submission_author').val(data.coding_question_data.author);
                      $('.submission_provider').val(data.coding_question_data.provider);

                      $(".submission_ajax_route").attr("href","{{route('library_public_questions')}}/"+data.coding_question_data.id+"?modal=submission_modal1");

                 var inout_html = "";
                     var i =1;
                      $.each(data.coding_question_entries, function( index, value ) {
                              //alert( index + ": " + value );
                              //value.partial_marks = value.partial_marks ? value.partial_marks : '';
                              inout_html += `<tr>
                                           <td valign="center">`+i+`</td>
                                           <td valign="center">
                                               <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.input+`
                                               </textarea>
                                           </td>
                                           <td valign="center">
                                               <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.output+`</textarea>
                                           </td>
                                       </tr>`;
                                       i = i +1;
                       i++;
                     });

                    $(".coding_question_table").html(inout_html);

                  }
                  }
              });
        });
      });



      $(document).ready(function(){
        @if(isset($hostFlag) && $hostFlag)
        $('#_first_model').modal('show');
        @endif
      });

</script>
@yield('modal_content')
</body>
</html>
