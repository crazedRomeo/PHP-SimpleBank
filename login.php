<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank System</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<?php
	if (isset($_POST['username']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$ret = loginUser($username, $password);
	}
	?>
</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Bank System</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form id="login-form" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to User <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<?php if ($ret == 1) : ?>
								<div class="alert bg-danger">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold">The password is incorrect.</span>
								</div>
							<?php endif; ?>

							<?php if ($ret == 2) : ?>
								<div class="alert bg-danger">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold">The user doesn't exist.</span>
								</div>
							<?php endif; ?>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								<input type="text" class="form-control" id="username" name="username" placeholder="Username or Email">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>

							<!-- <div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div> -->

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="content-divider text-muted form-group"><span>Don't have an user?</span></div>
							<a href="register.php" class="btn btn-default btn-block content-group">Sign up</a>
							
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted">
					&copy; 2022. <a href="#">Simple Bank System</a> by <a href="https://github.com/crazedRomeo" target="_blank">@Future</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</body>
</html>