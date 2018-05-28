<?php $base_url = 'http://localhost/recruitment/public/'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Recruitment</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
		<link rel="icon" href="{{ asset('public/assets/img/logo.png') }}" sizes="25x25">
		<link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('public/bower_components/Autocomplete/dist/autocomplete.css') }}">
		<!-- CSS -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
		<!-- Default theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
		<!-- Semantic UI theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
		<!-- Bootstrap theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>
		<link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/hamburgers.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/jquery.mmenu.all.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/plugins/menu/css/jquery.mhead.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/css/select2.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('public/assets/css/editor.css') }}"/>
		<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/css/style2.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/css/S_style.css') }}">
		<link rel="stylesheet" href="{{ asset('public/assets/css/candidate_style.css') }}">
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
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="top_right">
							<ul>								
								<li><a href="#" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info-circle"></i></a></li>								
								<li class="dropdown">
									<div>
										<button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											{{Auth::user()->email}}
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu right_menu" aria-labelledby="dropdownMenu1">
											<li><a href="{{route('candidate_change_password')}}">Change Password</a></li>
											<li><a href="{{route('candidate_logout')}}">Logout</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="navigation">
                    <div class="container-fluid">
                        <nav class="header-tabs-nav">
                            <ul class="headerul clearfix">
                                <li><a href="{{route('candidate_index')}}" class="active" style=""><i class="fa fa-user"></i>Profile</a></li>
                                <li class="f-test"><a href="{{route('my_test')}}" class="f_hover" style=""><i class="fa fa-file-text-o"></i>My Tests</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
		</header>