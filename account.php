<?php
$page = "account";
$bytes = random_bytes(6);
$account_number = bin2hex($bytes);
$type_info[] = array('id' => 0, 'type' => 'Personal');
?>
<?php require 'layout/header.php'; ?>
<script type="text/javascript" src="assets/js/pages/account.js"></script>
<?php
	$error = "";
	if ( isset($_POST['account_number']) )
	{
		$error = "";
		
		if ( !registerAccount() ) {
			$error = "error";
		} else {
			header('location:accounts.php');
		}
	}
?>
<!-- Page container -->
<div class="page-container login-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<form id="account-form" method="POST">
					<div class="panel panel-body account-form">
						<div class="text-center">
							<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
							<h5 class="content-group">Create Account <small class="display-block">All fields are required</small></h5>
						</div>

						<?php if ($error != "") : ?>
							<div class="alert bg-danger">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Account registration failed.</span>
							</div>
						<?php endif; ?>

						<div class="form-group has-feedback has-feedback-left">
							<label class="control-label">Account Number</label>
							<div class="form-control-feedback">
								<i class="icon-address-book text-muted"></i>
							</div>
							<input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo $account_number; ?>" placeholder="Account Number">
							<div class="form-control-feedback form-control-feedback-right" id="account_reload">
								<i class="icon-reload-alt text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<label class="control-label">UserName</label>
							<div class="form-control-feedback">
								<i class="icon-user-check text-muted"></i>
							</div>
							<input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>" disabled>
						</div>

						<div class="form-group">
							<label class="control-label">Account Type</label>
							<select class="bootstrap-select" data-width="100%" id="type" name="type">
								<?php foreach ($type_info as $info) : ?>
									<option value="<?php echo $info['id'];?>"><?php echo $info['type'];?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<label class="control-label">Balance</label>
							<div class="form-control-feedback">
								<i class=" icon-coin-dollar text-muted"></i>
							</div>
							<input type="number" class="form-control" id="balance" name="balance" value="5">
						</div>

						<div class="text-center">
							<!-- <a class="btn bg-teal btn-block btn-lg btn-submit">Register <i class="icon-circle-right2 position-right"></i></a> -->
							<input class="btn bg-teal btn-block btn-lg btn-submit" type="submit" value="Register">
						</div>
					</div>
				</form>
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->

</div>
<!-- /Page container -->

<?php require 'layout/footer.php'; ?>