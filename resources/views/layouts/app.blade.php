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
    <link rel="stylesheet" href="{{ asset('public/assets/css/editor.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/S_style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bower_components/alertify/themes/alertify.default.css') }}">
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="top_left">
                            <ul>
                                <li><div class="logo_left"><img src="{{ asset('public/assets/img/logo.png') }}"></div></li>
                                <li>
                                    <a href="dashboard/view.php">
                                        <div class="list-parent">
                                            <div class="list-child">
                                                <img src="{{ asset('public/assets/img/icon-edit.png') }}">Manage Tests
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard/LibraryPublicQuestions.php">
                                        <div class="list-parent">
                                            <div class="list-child">
                                                <img src="{{ asset('public/assets/img/icon-library.png') }}">Library
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <div>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{ asset('public/assets/img/icon-more.png') }}">MoreMenu
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="dashboard/history.php"><i class="fa fa-clock-o" aria-hidden="true"></i>Assessment History</a></li>
                                            <li><a href="dashboard/customersupport.php"><i class="fa fa-headphones"></i>Customer Support</a></li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="searchbar">
                                    <div class="header-search">
                                        <div class="icon-addon addon-md">
                                            <input type="text" placeholder="Search Help Doc Ex: How To Host Test" class="form-control input-search">
                                            <label for="text" class="glyphicon glyphicon-search" rel="tooltip" title="text"></label>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="top_right">
                            <ul>
                                <!--<li><i class="fa fa-bell"></i></li>-->
                                <li class="dropdown">
                                    <div>
                                        <button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-bell"></i>
                                            <span class="caret icon_bell"></span>
                                        </button>
                                        <ul class="dropdown-menu right_menu bg_icon" aria-labelledby="dropdownMenu1">
                                            <li><a href="#"><img src="{{ asset('public/assets/img/credits_db.png') }}" class="img-responsive db_img"></i><p class="free_credit">Get 5 free credits, help us <br>improve COdeGround, click here</p></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="/dashboard/setting/info.php"><i class="fa fa-info-circle"></i></a></li>
                                <li class="dropdown">
                                    <div>
                                        <button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            fnovellino
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu right_menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="dashboard//setting/general_setting.php">Settings</a></li>
                                            <li><a href="dashboard/setting/change_password.php">Change Password</a></li>
                                            <li><a href="#">Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
            @yield('content')
    </div>
<!-- Filter-Modal -->
<div class="modal fade" id="mcqs-filter-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Apply</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font"><i class="fa fa-filter fa-lg"></i>  Filter Criteria</h3>
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
                        <label class="control-label col-sm-2" for="statement">Question Statement:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="statement" placeholder="Enter question statement" name="statement">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tags :</label>
                        <div class="col-sm-9">
                            <select id="tag_multi" multiple="multiple">
                                <option value="1">Aptitude</option>
                                <option value="2">Basic Algebra</option>
                                <option value="3">HTML and CSS</option>
                                <option value="4">JAVA</option>
                                <option value="5">C#</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Staged
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Ready
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Easy
                        </div>
                        <div class="checkbox col-md-2 col-xs-4">
                            <input type="checkbox">EasyIntermediate
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Hard
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
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
</div>
<div class="modal fade" id="filter-programming-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Apply</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font"><i class="fa fa-filter fa-lg"></i>  Filter Criteria</h3>
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
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Staged
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Ready
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Easy
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">EasyIntermediate
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Hard
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
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
</div>
<!-- public-mcqs-Modal -->
<div class="modal fade" id="public-mcqs-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Multiple Choice Question <span>(Question Id : 1321023)</span></h3>
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
                                        <p>What does the following idiom/phrase mean?</p>
                                        <pre>
          &lt;&#63;php
          $a = array("hi", "hello", "bye");
          for (;count($a) < 5;) {
          if (count($a) == 3)
          print $a;
        }
        &#63;&gt;
      </pre>
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
                                    <input type="checkbox" name="" value="">
                                    Partial marks
                                    </strong>
                                    <div class="no-more-tables ">
                                        <table class="table s_table">
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required="" disabled>To meet with disaster</textarea>
                                                    </td>
                                                    <td valign="center">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required="" disabled>To deal with a person who is inferior to oneself</textarea>
                                                    </td>
                                                    <td valign="center">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required="" disabled>To deal with someone who proves formidable than one expected</textarea>
                                                    </td>
                                                    <td valign="center">
                                                    </td>
                                                </tr>
                                            </tbody>
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
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags <i class="fa fa-info-circle"></i></strong>
                                </div>
                                <p>English Proficiency/Idioms</p>
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
                <h3 class="modal-title s_font">Coding Question <span>(Question Id : 1321023)</span></h3>
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
                                            <input type="text" class="form-control" value="Pass The Ball" disabled>
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
                                        <p>What does the following idiom/phrase mean?</p>
                                        <p class="s_modal_body_heading">
                                            The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
                                            ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from (j-Ai) to (j-1), or from (j+1) to (j+Ai) (provided that the position exists).
                                            Now, ThunderCracker wants to find out the number of ways in which, after exactly M passes, the ball reaches his friend MunKee, given that the first pass is made by ThunderCracker. (Two ways are considered different if there exists atleast one pass which resulted in the ball being passed to a different player.)
                                        </p>
                                        <h1>Input :</h1>
                                        <p class="s_modal_body_heading">
                                            A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
                                        </p>
                                        <h1>Input :</h1>
                                        <p class="s_modal_body_heading">
                                            A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
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
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="option" rows="4" required="" disabled>3 3 2 1 1 1 1
                                                        </textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="option" rows="4" required="" disabled>2</textarea>
                                                    </td>
                                                </tr>
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
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        Test 0
                                                    </td>
                                                    <td valign="center">
                                                        <input type="number" name="" value="50" disabled>
                                                    </td>
                                                </tr>
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
                                <span class="s_modal_body_heading">Dynamic Programing</span>
                                <br>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question Level <i class="fa fa-info-circle"></i></strong><span> :  intermediate</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Provider <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <input type="text" class="form-control" name="provider" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <input type="text" class="form-control" name="author" disabled value="ajinkya1p3">
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
<!-- private-mcqs-Modal -->
<div class="modal fade" id="private-mcqs-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Multiple Choice Question <small> (Question Id : 5968649)</small> </h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Question Statement -->
                        <div class="modal-content s_modal s_blue_color_modal">
                            <div class="modal-header s_modal_header s_blue_color_header">
                                <h5 class="modal-title s_font">Question Statement</h5>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question State

                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               There are three possible states for a question. <br>
                                                (1)Stage (2) Ready (3) Abandoned <br>
                                                <br>
                                                <br>
                                                Why is it needed:The purpose of the states is to manage the question development cycle.
                                                <br>
                                                <br>
                                                Question is the Stage state the represents the question which is
                                                added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the Abondoned state represents a question which is rejected.
                                            </span>
                                        </div>
                                    </strong>
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
                                <div class="heading_modal_statement">
                                    <strong>Question Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                                    <span>Please add atleast 3 characters in the statement</span>
                                </div>
                                <textarea id="s_txtEditor"></textarea>
                                <h5><b>Media(Audio/Video)</b></h5>
                                
                                <!-- <button type="button" class="btn">Upload Media</button> -->

                                <div class="f_upload_btn">
                                    Upload Media
                                    <input type="file" name="">
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
                                    <strong>Choices
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
                                    <input type="checkbox" name="" value="1" id="partial_marks">
                                    Partial marks
                                    </strong>
                                    <div class="no-more-tables ">
                                        <table class="table s_table" id="choices_table">
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td>
                                                      <input type="checkbox" name="" value="" class="choices_table_checkbox">
                                                    </td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required=""></textarea>
                                                    </td>
                                                    <td valign="center" class="hidden">
                                                        <div class="input-group input-group-sm">
                                                            <input type="number" class="form-control" width="30px" max="100" min="0" >
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
                                                    <td> <input type="checkbox" name="" value=""  class="choices_table_checkbox"> </td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required=""></textarea>
                                                    </td>
                                                    <td valign="center" class="hidden">
                                                        <div class="input-group input-group-sm">
                                                            <input type="number" class="form-control" width="30px" max="100" min="0" >
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
                                                    <td> <input type="checkbox" name="" value="" class="choices_table_checkbox"> </td>
                                                    <td class="s_weight" valign="center">
                                                        <textarea class="form-control" name="option" required=""></textarea>
                                                    </td>
                                                    <td valign="center" class="hidden">
                                                        <div class="input-group input-group-sm">
                                                            <input type="number" class="form-control" width="30px" max="100" min="0" >
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
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Each question can be associated with multiple tags. <br>
                                                <br>
                                                Why it matters:
                                                <br>
                                                <br>
                                                (1) Tags are used in filters while searching through the library.
                                                (2) Tagging is an efficient way of management of library spanning multiple conceptual categories and classifiaction.
                                            </span>
                                        </div>
                                     No tags added</strong>
                                </div>
                                <div class="form-group-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control">
                                                <option value="add Tag" disabled="">Add Tag</option>
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
                                    <strong>Question Level
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Question level determines the standard of the question. Supported classification are easy, intermediate and hard. <br>

                                            </span>
                                        </div>
                                    </strong>
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
                                                <strong>Provider
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                This optional field is meant to contain the organization name that serves as the provider of the question. <br>

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                This field is meant to contain the name of the author of this question. <br>

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--  Solution Details (Optional) -->
                        <div class="modal-content s_modal s_gray_color_modal">
                            <div class="modal-header s_modal_header s_gray_color_header accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution1" aria-expanded="false">
                              <h4 class="modal-title s_font"><i class="fa fa-caret-right"></i> Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution1">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Text
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                Provide the solution to the question in text if the question is required to use.


                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Code
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Provide the solution to the question in Code if the question is required to use.
                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>URL
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Provide the solution to the question in URL if the question is required to use.
                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Files
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Provide the solution to the question in files if the question is required to use.
                                            </span>
                                        </div>
                                    </strong>
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
<!-- private-programming-question-Modal -->
<div class="modal fade" id="private-programming-question-Modal" role="dialog">
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
                                    <strong>Question State
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                            </span>
                                        </div>
                                    </strong>
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
                                                <strong>Program Title
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library.
                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement">
                                    <strong>Program Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                                </div>
                                <textarea id="s_txtEditor_programming"></textarea>
                                <br>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Sample Input & Output
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramSamples <br>

                                            </span>
                                        </div>
                                    </strong>
                                    <div class="no-more-tables ">
                                        <table class="table s_table" id="coding_qustion_table">
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
                                                        <a class="delete_row">
                                                        <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-align-center">
                                                        <button class="btn" onclick="addrow_codingquestion()">+ Add Sample Test Case</button>
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
                                    <strong>Test Cases
                                         <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramTestcases <br>

                                            </span>
                                        </div>
                                    </strong>
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
                        </div>
                        <br>
                        <!--  Question Details -->
                        <div class="modal-content s_modal s_gray_color_modal">
                            <div class="modal-header s_modal_header s_gray_color_header">
                                <h4 class="modal-title s_font"> Question Details</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Tags
                                         <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Each question can be associated with multiple tags. <br>
                                             Why it matters:<br>
                                             (1) Tags are used in filters while searching through the library.
                                             <br>
                                             (2) Tagging is an efficient way of management of <br>library spanning multiple conceptual categories and <br>classification.


                                            </span>
                                        </div>
                                     No tags added</strong>
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
                                    <strong>Question Level
                                         <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              Question level determines the standard of the question. Supported classification are easy, intermediate and hard. <br>

                                            </span>
                                        </div>
                                    </strong>
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
                                                <strong>Provider
                                                     <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               This optional field is meant to contain the organization name that serves as the provider of the question. <br>

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author
                                                     <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              This field is meant to contain the name of the author of this question. <br>

                                            </span>
                                        </div>
                                                </strong>
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
                            <div class="modal-header s_modal_header s_orange_color_header accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution2" aria-expanded="false">
                                <h4 class="modal-title s_font"><i class="fa fa-caret-right"></i> Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution2">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Text
                                                     <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution of the question in text if the question is required to use.

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Code
                                                     <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution of the question in code if the question is required to use.

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>URL
                                                <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution of the question in URL if the question is required to use.

                                            </span>
                                        </div>

                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Files
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution of the question in FILE if the question is required to use.

                                            </span>
                                        </div>
                                    </strong>
                                </div>
                               <!-- <button type="file" class="btn">Upload Files</button>-->
                               <div class="f_upload_btn">
                                    Upload Media
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
<!-- private-programming-question-Modal -->
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
                            <div class="modal-header s_modal_header s_orange_color_header  accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution3" aria-expanded="false">
                                <h4 class="modal-title s_font"> <i class="fa fa-caret-right"></i> Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution3">
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
<div class="modal fade" id="private-submission-question-Modal" role="dialog">
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
                                    <strong>Question State
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                            </span>
                                        </div>
                                    </strong>
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
                                                <strong>Question Type <i class="fa fa-info-circle"></i></strong>
                                            </div>
                                            <select name="questionType" class="form-control">
                                                <option value="DEFAULT">Normal Submission</option>
                                                <option value="FILL_IN_THE_BLANKS">Fill in the Blanks</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement">
                                    <strong>Question Statement (<a href="#">Expand</a>)
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             This section provides a mark down editor to write the program statement. <br>
                                               What does it mean: Markdown is a lightweight markup language with plain text formatting syntax.<br>
                                               Learning refrence:
                                               <br>
                                                http://markdowntutorial.com/<br>
                                                Good to know: The expand link opens an expanded view of the editor for a better view of the text while typing/editing.



                                            </span>
                                        </div>
                                    </strong>
                                </div>
                                <textarea id="s_txtEditor_submission"></textarea>
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> Enable code modification and show difference
                                    </label>
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
                                        <!--<button type="button" class="btn">Upload Media</button>-->
                                        <div class="f_upload_btn">
                                    Upload Media
                                    <input type="file" name="">
                                </div>
                                    </div>
                                    <br>
                                    <strong>
                                    Resources
                                  <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                            htmlTooltip.modalSubmissionResources




                                            </span>
                                        </div>
                                    </strong>
                                    <label class="control-label">
                                    (These resources will be available for the candidate to download during the test)
                                    </label>
                                    <div class="s_pur_body">
                                        <!--<button type="button" class="btn"> + Add resources</button>-->
                                        <div class="f_upload_btn">
                                   + Add resources
                                    <input type="file" name="">
                                </div>
                                    </div>
                                    <hr>
                                    <strong>
                                    Candidate can use
                                   <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                htmlTooltip.modalSubmissionCandidateResources




                                            </span>
                                        </div>
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
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question Level
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                Question level determines the standard of the question, Supported classification are easy, intermediate and hard.




                                            </span>
                                        </div>
                                    </strong>
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
                                    <strong>Tags
                                        <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               Each question can be associated with multiple tags.
                                               <br>
                                               Why it matters:<br>
                                               (1) Tags are used in filters while searching through the library.
                                               <br>
                                               (2) Tagging is an efficient way of management of library spanning multiple conceptual categories and classification.




                                            </span>
                                        </div>
                                     No tags added</strong>
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
                                                <strong>Provider
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              This optional field is meant to contain the organization name that serves as the provider of the question.






                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Author
                                                      <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              This optional field is meant to contain the  name of the autor of the organization.






                                            </span>
                                        </div>
                                                </strong>
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
                            <div class="modal-header s_modal_header s_orange_color_header accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution_4" aria-expanded="false">
                                <h4 class="modal-title s_font"><i class="fa fa-caret-right"></i> Evaluation Parameters (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution_4">
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
                            <div class="modal-header s_modal_header s_light_green_color_header accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#solution_5" aria-expanded="false">
                                <h4 class="modal-title s_font"> <i class="fa fa-caret-right"></i> Solution Details (Optional)</h4>
                            </div>
                            <div class="modal-body s_modal_body panel-collapse collapse" id="solution_5">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Text
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution to the question in text if the question is required to use.

                                            </span>
                                        </div>






                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Code
                                                       <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution to the question in Code if the question is required to use.

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>URL
                                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution to the question in text if the question is required to use.

                                            </span>
                                        </div>
                                                </strong>
                                            </div>
                                            <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Files
                                           <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                             Provide the solution to the question in text if the question is required to use.

                                            </span>
                                        </div>
                                    </strong>
                                </div>
                                <!--<button type="file" class="btn">Upload Files</button>-->
                                <div class="f_upload_btn">
                                    Upload Media
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
<!-- section-submission-fill-blanks-question-Modal -->
<div class="modal fade" id="private-submission-fill-blanks-question-Modal" role="dialog">
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
                           <strong>Question State 
                              <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                            </span>
                                        </div>
                           </strong>
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
                           <strong>Question Statement (<a href="#">Expand</a>) 
                              <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                            This section provides a markdown editor to write a program statement. <br>
                                               What does it mean: Markdown is a lightweight markup language with plain text formatting syntax:<br>
                                               Learning Refrence:
                                               
                                                <br>
                                                http://markdowntutorial.com
                                                <br>
                                                Good to know: The expends link open an expanded view of the editor for a better view of the text while typing/editing.
                                            </span>
                                        </div>
                           </strong>
                        </div>
                        <textarea id="s_txtEditor_submission_Add_section_fill_blanks"></textarea>
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
                            <!--<button type="button" class="btn">Upload Media</button>-->
                            <div class="f_upload_btn">
                                    Upload Media
                                    <input type="file" name="">
                                </div>
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
                           <strong>Question Level 
                              <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                Question level determines the standard of the question. supported classification are easy, intermediate and hard.
                                             
                                                
                                            </span>
                                        </div>
                           </strong>
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
                           <strong>Tags
                              <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              Each question can be associated with multiple tags. <br>
                                              
                                                <br>
                                                Why it matters:
                                                <br>
                                                (1) Tags are used in filters while searching through the library.<br>
                                                (2) Tagging is an efficient way of management of library spanning multiple conceptual categories and classification.
                                            </span>
                                        </div>
                            No tags added</strong>
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
                                  <strong>Provider 
                                      <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                            This optional field is meant to contain the <br>
                                              organization name that serves as the provider of the question.
                                               
                                            </span>
                                        </div>
                                  </strong>
                                </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                <div class="heading_modal_statement heading_padding_bottom">
                                   <strong>Author </strong>
                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                            This field is meant to contain the <br>
                                             name of the author of the question.
                                               
                                            </span>
                                        </div>
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
                                  <strong>Text 
                                     <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                           Provide the solution to the question in text if the question is required to use. <br>
                                              
                                               
                                            </span>
                                        </div>
                                  </strong>
                                </div>
                                <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                            </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-3 col-sm-12 col-xs-12">
                             <div class="form-group form-group-sm">
                                <div class="heading_modal_statement heading_padding_bottom">
                                  <strong>Code 
                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                           Provide the solution to the question in code if the question is required to use. <br>
                                              
                                               
                                            </span>
                                        </div>
                                  </strong>
                                </div>
                                <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                            </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-3 col-sm-12 col-xs-12">
                             <div class="form-group form-group-sm">
                                <div class="heading_modal_statement heading_padding_bottom">
                                  <strong>URL 
                                    <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                           Provide the solution to the question in URL if the question is required to use. <br>
                                              
                                               
                                            </span>
                                        </div>
                                  </strong>
                                </div>
                                <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                            </div>
                          </div>
                       </div>
                       <div class="heading_modal_statement heading_padding_bottom">
                        <strong>Files 
                            <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                           Provide the solution to the question in file if the question is required to use. <br>
                                              
                                               
                                            </span>
                                        </div>
                        </strong>
                       </div>
                       <!--<button type="file" class="btn">Upload Files</button>-->
                       <div class="f_upload_btn">
                                    Upload Media
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


<!--View page on create a test template -->
<div class="modal fade" id="create-test-template-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Create</button>
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
                                <div class="template"><input id="name" name="name" type="text" placeholder="Name of the test template" class="form-control general">
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
                                    <label><input type="radio" name="optradio">Public</label>
                                    <label><input type="radio" name="optradio">Invite-Only</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Close-->
<!--view page on Filter -->
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
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Name:</label>
                            <div class="col-md-9">
                                <div class="template"><input id="name" name="name" type="text" placeholder="Enter the name of the test" class="form-control general">
                                </div>
                            </div>
                        </div>
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Test type:</label>
                            <div class="col-md-9">
                                <div class="checkbox both">
                                    <label><input type="checkbox" value="">Invite only</label>
                                    <label><input type="checkbox" value="">Public</label>
                                    <label><input type="checkbox" value="">Both</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Test status:</label>
                            <div class="col-md-9">
                                <div class="checkbox both">
                                    <label><input type="checkbox" value="">Live</label>
                                    <label class="upcoming"><input type="checkbox" value="">Upcoming</label>
                                    <label><input type="checkbox" value="">Expired</label>
                                    <label><input type="checkbox" value="">All</label>
                                </div>
                            </div>
                        </div>
                        <div class="button_filter">
                            <button type="button" class="btn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <div class="img_evaluate"><img src="../assets/img/selectCandidates-min.png" class="img-responsive"></div>
                            <h3 class="evaluater">You can then assign Evaluators to evaluate these selected reports as shown below.</h3>
                            <div class="img_evaluate"><img src="../assets/img/assignjudge-min.png" class="img-responsive"></div>
                            <h3 class="evaluater"><a href="#">Click here</a>to open the Reports Page to assign Manual Evaluators.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--setup manual end-->
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
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group title">
                            <label class="col-md-3 control-label" for="name">Test-template Name:</label>
                            <div class="col-md-9">
                                <div class="template"><input id="name" name="name" type="text" placeholder="Enter name of the new test template" class="form-control general">
                                </div>
                            </div>
                        </div>
                        <div class="button_duplicate"><button type="button" class="btn">Create</button>
                            <button type="button" class="btn btn-default s_font f_font" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end -->
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
                          <source src="horse.ogg" type="audio/ogg">
                          <source src="horse.mp3" type="audio/mpeg">
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
<script src="{{ asset('public/assets/js/editor.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<script src="{{ asset('public/assets/js/script.js') }}"></script>


<script type="text/javascript">
    $('body').scrollspy({target: "#myScrollspy"})
    $(document).ready(function(){
        $(".dropdown").click(function() {
            $('.dropdown-menu', this).toggleClass('open');
        });
    });
</script>
</body>
</html>

