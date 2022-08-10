<?php $page = "profile"; ?>
<?php require 'layout/header.php'; ?>
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
?>

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
	
</div>
<!-- /page container -->