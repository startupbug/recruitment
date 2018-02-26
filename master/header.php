<?php $base_url = 'http://site.startupbug.net:6888/recruitment/v1/'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blank template</title>
	<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="<?php echo $base_url;?>/assets/img/logo.png" type="image/png" sizes="25x25">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/Autocomplete/dist/autocomplete.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/alertify/themes/alertify.default.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/plugins/menu/css/hamburgers.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/plugins/menu/css/jquery.mmenu.all.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/plugins/menu/css/jquery.mhead.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/editor.css"/>
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/responsive.css">
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
									<div class="list-parent">
										<div class="list-child">
											<a href="<?php echo $base_url;?>dashboard/view.php"><img src="<?php echo $base_url;?>/assets/img/icon-edit.png">Manage Tests
										</a></div>
									</div>
								</li>
								<li>
									<div class="list-parent">
										<div class="list-child">
											<a href="<?php echo $base_url;?>dashboard/LibraryPublicQuestions.php"><img src="<?php echo $base_url;?>/assets/img/icon-library.png">Library
										</a></div>
									</div>
								</li>
								<!--<li>
									<div class="list-parent">
										<div class="list-child">
											<img src="<?php echo $base_url;?>/assets/img/icon-more.png">More
										</div>
									</div>
								</li>-->
								<li class="dropdown">
									<div>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $base_url;?>/assets/img/icon-more.png">MoreMenu <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo $base_url;?>dashboard/history.php">Assessment History</a></li>
											<li><a href="<?php echo $base_url;?>dashboard/customersupport.php">Customer Support</a></li>
										</ul>
									</div>
								</li>
								<li>
									<div class="header-search">
										<div class="icon-addon addon-md">
											<input type="text" placeholder="Search Help Doc Ex: How To Host Test" class="form-control input-search" id="text">
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
								<li><i class="fa fa-bell"></i></li>
								<li><a href="info.php"><i class="fa fa-info-circle"></i></a></li>
								<li>
									<div class="dropdown">
										<button class="btn btn-default dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											fnovellino
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
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
