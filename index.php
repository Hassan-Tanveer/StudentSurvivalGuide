<?php
session_start();
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Site Metas -->
	<title>Student Survival Guide</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="css/all.min.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div id="particles-js" class="main-form-box">
		<div class="md-form">
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="panel panel-login">
							<div class="logo-top">
							<img src="images/logo1.png"><a href="#"><img src="" alt="" /></a>
							</div>
							<div class="panel-heading">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-xl-6">
										<a href="#login" class="active" id="login-form-link">Login</a>
									</div>
									<div class="col-lg-6 col-sm-6 col-xl-6">
										<a href="#register" id="register-form-link">Register</a>
									</div>
									<div class="or">OR</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<form id="login-form" action="loginForm.php" method="post" role="form"
											style="display: block;">
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-envelope"></i></label>
												<input type="text" name="Email" id="email" tabindex="1"
													class="form-control" placeholder="Email" value=""
													required="required">
											</div>
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-key"></i></label>
												<input type="password" name="Password" id="password" tabindex="2"
													class="form-control" placeholder="Password" required="required" minLength="8" maxlength="40">
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-6 offset-sm-3">
														<input type="submit" name="login_user" id="login-submit"
															tabindex="4" class="form-control btn btn-login"
															value="Login">
													</div>
												</div>
											</div>
										</form>
										<form id="register-form" action="signup.php" method="post" role="form"
											style="display: none;">
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-user-tie"></i></label>
												<input type="text" name="Name" id="username" tabindex="1"
													class="form-control" placeholder="Full Name" value=""
													required="required" minLength="2" maxlength="40">
											</div>
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-envelope"></i></label>
												<input type="email" name="Email" id="email" tabindex="1"
													class="form-control" placeholder="Email Address" value=""
													required="required" minLength="6" maxlength="40">
											</div>
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-key"></i></label>
												<input type="password" name="password_1" id="password" tabindex="2"
													class="form-control" placeholder="Password" required="required" minLength="8" maxlength="40">
											</div>
											<div class="form-group">
												<label class="icon-lp"><i class="fas fa-key"></i></label>
												<input type="password" name="password_2" id="confirm-password"
													tabindex="2" class="form-control" placeholder="Confirm Password"
													required="required" minLength="8" maxlength="40">
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-6 offset-sm-3">
														<input type="submit" name="reg_user" id="register-submit"
															tabindex="4" class="form-control btn btn-register"
															value="Register Now">
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
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/particles.min.js"></script>
	<script src="js/index.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#login-form-link').click(function (e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function (e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
		});

		$('.form-group input').focus(function () {
			$(this).parent().addClass('addcolor');
		}).blur(function () {
			$(this).parent().removeClass('addcolor');
		});
	</script>
</body>

</html>