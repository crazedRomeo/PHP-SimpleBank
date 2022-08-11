<?php $page = "deposit"; ?>
<?php require 'layout/header.php'; ?>
<script type="text/javascript" src="assets/js/pages/deposit.js"></script>
<?php
	$error = "";
	$account_list = getAccounts();

	if ( isset($_POST['account_number']) && intval($_POST['account_number']) > 0 )
	{
		$error = "";
		
		if ( !depositAccount() ) {
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
				<form id="deposit-form" method="POST">
					<div class="panel panel-body deposit-form">
						<div class="text-center">
							<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
							<h5 class="content-group">Deposit</h5>
						</div>

						<?php if ($error != "") : ?>
							<div class="alert bg-danger">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Deposit failed.</span>
							</div>
						<?php endif; ?>

						<div class="form-group">
							<label class="control-label">Account Number</label>
							<select class="bootstrap-select" data-show-subtext="true" data-width="100%" id="account_number" name="account_number">
								<?php foreach ($account_list as $info) : ?>
									<option value="<?php echo $info['id'];?>" data-subtext="( $<?php echo $info['balance'];?> )"><?php echo $info['account'];?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<label class="control-label">Balance</label>
							<div class="form-control-feedback">
								<i class="icon-coin-dollar text-muted"></i>
							</div>
							<input type="number" class="form-control" id="balance" name="balance" value="5">
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<label class="control-label">Memo</label>
							<textarea rows="5" cols="5" class="form-control" id="memo" name="memo"></textarea>
						</div>

						<div class="text-center">
							<input class="btn bg-teal btn-block btn-lg btn-submit" type="submit" value="Deposit">
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