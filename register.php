<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Banking</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<script type="text/javascript" src="assets/js/pages/register.js"></script>
	<?php
	$error = "";
	if ( isset($_POST['username']) )
	{
		$error = "";
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
		if ( registerUser($username, $email, $pass) ) {
			loginUser($username, $pass);
		} else {
			$error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		}
	}
	?>
</head>
<body>
<!--
<div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
	<br><h4 class="text-center text-white">Select Your Session</h4>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-success btn-block">User Login</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <form method="POST">
       	<input type="email" value="some@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="some" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Manager Login
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <form method="POST">
       	<input type="email" value="manager@manager.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="manager" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Cashier Login
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form method="POST">
       	<input type="email" value="cashier@cashier.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="cashier" class="form-control" required placeholder="Enter Password">
       	<button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
</div> -->

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Bank</a>

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

					<!-- Advanced login -->
					<form id="register-form" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
								<h5 class="content-group">Create User <small class="display-block">All fields are required</small></h5>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
								<input type="text" class="form-control" id="username" name="username" placeholder="UserName">
								<!-- <span class=" text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span> -->
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<input type="text" class="form-control" id="email" name="email" placeholder="Your email">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
							</div>

							<div class="text-center">
								<!-- <a class="btn bg-teal btn-block btn-lg btn-submit">Register <i class="icon-circle-right2 position-right"></i></a> -->
								<input class="btn bg-teal btn-block btn-lg btn-submit" type="submit" value="Register">
								<a href="login.php" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to Sign In</a>
							</div>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Simple Bank</a> by <a href="https://github.com/crazedRomeo" target="_blank">Future</a>
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