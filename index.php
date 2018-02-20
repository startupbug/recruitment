<?php $base_url = 'http://localhost/recruitment/'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blank template</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="<?php echo $base_url;?>/assets/img/logo.png" type="image/png" sizes="25x25">
	<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>/assets/bower_components/alertify/themes/alertify.default.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/login.css">

</head>
<body>
	<div id="wrapper">

		<header>

			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="logo_left"><img src="assets/img/logo.png" class="img-responsive"></div>
					</div>
				</div>
			</div>

		</header>

		<section class="form_right">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-8">
						<div class="login_image"><img src="assets/img/login_image.png" class="img-responsive"></div>
					</div>
					<div class="col-md-3">
						<h1 class="signin">Sign In!</h1>
						<div class="form-group">
							<label for="exampleInputName">Email:</label>

							<div class="input-group input-group-lg">

								<input type="text" class="form-control" id="useremail" placeholder="Email"><span  class = "input-group-addon" id = "usericonemail"><i class = "glyphicon glyphicon-user"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputName">Password:</label>
							<div class="input-group input-group-lg">

								<input type="text" class="form-control" id="userpassword" placeholder="Password">  <span  class = "input-group-addon" ><i class = "glyphicon glyphicon-lock"></i></span>
							</div>
						</div>
						<h3 class="fotgot">Forgot Password? | Sign Up</h3>
						<div class="button_signin"><button type="button" class="btn">Sign In</button></div>



					</div>
				</div>
			</div>
		</section>

		<footer class="last_footer">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="nav_footer">

							<ul>
								<li>
									<a href="#">© 2015 Talento.</a>
								</li>
								<li>
									<a href="#">Terms</a>
								</li>
								<li>
									<a href="#">Contact</a>
								</li>
								<li>
									<a href="#">About</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>

		</footer>
	</div>


	<script src="<?php echo $base_url;?>/assets/bower_components/jquery/dist/jQuery.min.js"></script>
	<script src="<?php echo $base_url;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo $base_url;?>/assets/bower_components/alertify/alertify.min.js"></script>
</body>
</html>


