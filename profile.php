<?php
session_start();
if(!isset($_SESSION['user_id'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  	<title>Bank System</title>
  	<?php require 'assets/autoloader.php'; ?>
  	<?php require 'assets/db.php'; ?>
  	<?php require 'assets/function.php'; ?>
  	<script type="text/javascript" src="assets/js/pages/profile.js"></script>
  	<?php
	if ( isset($_POST['username']) )
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['new_password'];
		$role = $_POST['role'];
		
		if ( updateUser($username, $email, $pass, $role) ) {
			$_SESSION['user']['username'] = $username;
			$_SESSION['user']['email'] = $email;
			$_SESSION['user']['password'] = $pass;

			header('location:index.php');
		} else {
			$error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		}
	}

	$roles_info = getRoles();
	print_r($_SESSION['user']['role']);
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
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span><?php echo $_SESSION['user']['email'];?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="profile.php"><i class="icon-user-plus"></i> My profile</a></li>
						<!-- <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li> -->
						<li class="divider"></li>
						<!-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
						<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

  <div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<a href="index.php">
					<h4>
						<i class="icon-arrow-left52 position-left"></i>
						Edit Profile
						<small class="display-block">Good morning, <?php echo $_SESSION['user']['username'];?>!</small>
					</h4>
				</a>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<!-- <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a> -->
				</div>
			</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
	</div>

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

      			<!-- Content area -->
				<div class="content">

					<!-- Edit Profile -->
					<form id="profile-form" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
								<h5 class="content-group">Edit Profile <small class="display-block">All fields are required</small></h5>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
								<input type="text" class="form-control" id="username" name="username" placeholder="UserName" value="<?php echo $_SESSION['user']['username'];?>">
								<!-- <span class=" text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span> -->
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<input type="text" class="form-control" id="email" name="email" placeholder="Your email" value="<?php echo $_SESSION['user']['email'];?>">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
							</div>

							<div class="content-divider text-muted form-group"><span>User Role</span></div>

							<div class="form-group">
								<select class="bootstrap-select" data-width="100%" id="role" name="role">
									<?php foreach ($roles_info as $info) : ?>
										<option value="<?php echo $info['id'];?>" <?php $info['id'] == $_SESSION['user']['role'] ? "selected" : ""?>><?php echo $info['name'];?></option>	
									<?php endforeach; ?>
								</select>
							</div>

							<div class="text-center">
								<!-- <a class="btn bg-teal btn-block btn-lg btn-submit">Register <i class="icon-circle-right2 position-right"></i></a> -->
								<input class="btn bg-teal btn-block btn-lg btn-submit" type="submit" value="Save">
							</div>
						</div>
					</form>
					<!-- /Edit Profile -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Simple Bank System</a> by <a href="https://github.com/crazedRomeo" target="_blank">Future</a>
					</div>
					<!-- /footer -->

					</div>
					<!-- /content area -->

      		</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

		<!-- Footer -->
		<div class="footer text-muted">
		&copy; 2022. <a href="#">Simple Bank System</a> by <a href="https://github.com/crazedRomeo" target="_blank">Future</a>
		</div>
		<!-- /footer -->
	</div>
	<!-- /page container -->
</body>
</html>