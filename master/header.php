<?php $base_url = 'http://localhost/recruitment_r/'; ?>
<!DOCTYPE html>

<html>
<head>
	<title>Online Recruitment</title>
	<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
		<link rel="icon" href="<?php echo $base_url;?>assets/img/logo.png" type="image/png" sizes="25x25">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/bower_components/Autocomplete/dist/autocomplete.css">
		<!-- CSS -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
		<!-- Default theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
		<!-- Semantic UI theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
		<!-- Bootstrap theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/plugins/menu/css/hamburgers.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/plugins/menu/css/jquery.mmenu.all.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/plugins/menu/css/jquery.mhead.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/select2.min.css"/>
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/editor.css"/>
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/responsive.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/S_style.css">
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9">

						<div class="top_left">

							<ul>
								<li><div class="logo_left"><img src="<?php echo $base_url;?>/assets/img/logo.png"></div></li>


								<li>
									<a href="<?php echo $base_url;?>dashboard/view.php">
										<div class="list-parent">
											<div class="list-child">
												<img src="<?php echo $base_url;?>/assets/img/icon-edit.png">Manage Tests
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="<?php echo $base_url;?>dashboard/LibraryPublicQuestions.php">
										<div class="list-parent">
											<div class="list-child">
												<img src="<?php echo $base_url;?>/assets/img/icon-library.png">Library
											</div>
										</div>
									</a>
								</li>
								<li class="dropdown">
									<div>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<img src="<?php echo $base_url;?>/assets/img/icon-more.png">MoreMenu
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo $base_url;?>dashboard/history.php"><i class="fa fa-clock-o" aria-hidden="true"></i>Assessment History</a></li>
											<li><a href="<?php echo $base_url;?>dashboard/customersupport.php"><i class="fa fa-headphones"></i>Customer Support</a></li>

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
											<li><a href="#"><img src="../assets/img/credits_db.png" class="img-responsive db_img"></i><p class="free_credit">Get 5 free credits, help us <br>improve COdeGround, click here</p></a></li>
										</ul>
									</div>
								</li>
								<li><a href="<?php echo $base_url;?>/dashboard/setting/info.php"><i class="fa fa-info-circle"></i></a></li>
								<li class="dropdown">
									<div>
										<button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											fnovellino
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu right_menu" aria-labelledby="dropdownMenu1">
											<li><a href="<?php echo $base_url;?>dashboard//setting/general_setting.php">Settings</a></li>
											<li><a href="<?php echo $base_url;?>dashboard/setting/change_password.php">Change Password</a></li>
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
