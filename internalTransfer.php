<?php $page = "itransfer"; ?>
<?php require 'layout/header.php'; ?>
<script type="text/javascript" src="assets/js/pages/transfer.js"></script>
<?php
	$error = "";
	$account_list = getAccounts();

	if ( isset($_POST['account_src']) && intval($_POST['account_src']) > 0 && isset($_POST['account_dst']) && intval($_POST['account_dst']) > 0 )
	{
		$error = "";
		
		if ( !transferAccount() ) {
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
				<form id="transfer-form" method="POST">
					<div class="panel panel-body transfer-form">
						<div class="text-center">
							<div class="icon-object border-success text-success"><i class="icon-transmission"></i></div>
							<h5 class="content-group">Internal Transfer</h5>
						</div>

						<?php if ($error != "") : ?>
							<div class="alert bg-danger">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Internal Transfer Failed.</span>
							</div>
						<?php endif; ?>

						<div class="form-group">
							<label class="control-label">Account From</label>
							<select class="bootstrap-select" data-show-subtext="true" data-width="100%" id="account_src" name="account_src">
								<?php foreach ($account_list as $info) : ?>
									<option value="<?php echo $info['id'];?>" data-subtext="( $<?php echo $info['balance'];?> )"><?php echo $info['account'];?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label">Account To</label>
							<select class="bootstrap-select" data-show-subtext="true" data-width="100%" id="account_dst" name="account_dst">
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
							<input class="btn bg-teal btn-block btn-lg btn-submit" type="submit" value="Withdraw">
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