<?php
$page = "accounts";
$account_id = intval($_GET['account']);
$page_num = isset($_GET['page']) ? intval($_GET['page']) : 1;
?>
<?php require 'layout/header.php'; ?>
<?php
	$account_info = getAccount($account_id);
	$total_transaction = totalTransaction($account_id);
	$total_page = ($total_transaction % 5 == 0) ? $total_transaction / 5 : intval($total_transaction / 5) + 1;
	$prev_num = ($page_num > 1) ? $page_num - 1 : 1;
	$next_num = ($page_num == $total_page) ? $total_page : $page_num + 1;

	$transaction_list = getTransaction($account_id);
?>
<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Profile -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">Account Information</h6>
					<div class="heading-elements">
						<form class="heading-form" action="#">
							<div class="form-group">
								
							</div>
						</form>
					</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<ul class="list-inline text-center">
								<li>
									<a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user"></i></a>
								</li>
								<li class="text-left">
									<div class="text-semibold">Account Number</div>
									<div class="text-muted"><?php echo $account_info['account'];?></div>
								</li>
							</ul>
						</div>

						<div class="col-lg-3">
							<ul class="list-inline text-center">
								<li>
									<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-vcard"></i></a>
								</li>
								<li class="text-left">
									<div class="text-semibold">Account Type</div>
									<div class="text-muted"><?php echo $account_info['type'];?></div>
								</li>
							</ul>
						</div>

						<div class="col-lg-3">
							<ul class="list-inline text-center">
								<li>
									<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-coin-dollar"></i></a>
								</li>
								<li class="text-left">
									<div class="text-semibold">Balance</div>
									<div class="text-muted">$<?php echo $account_info['balance'];?></div>
								</li>
							</ul>
						</div>

						<div class="col-lg-3">
							<ul class="list-inline text-center">
								<li>
									<a href="#" class="btn border-primary-400 text-primary-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-upload10"></i></a>
								</li>
								<li class="text-left">
									<div class="text-semibold">Date</div>
									<div class="text-muted"><?php echo $account_info['created'];?></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /Profile -->

			<!-- Task manager table -->
			<div class="panel panel-white panel-account-list">
				<div class="panel-heading">
					<h6 class="panel-title">Account List</h6>
					<div class="heading-elements">
					</div>
				</div>

				<table class="table tasks-list table-lg">
					<thead>
						<tr>
							<th>No</th>
							<th>Account From</th>
							<th>Account To</th>
							<th>Transaction Type</th>
							<th>Balance</th>
							<th>Expected Total</th>
							<th>Memo</th>
						</tr>
					</thead>
					<tbody>
						<?php if ( count($transaction_list) > 0 ) : ?>
							<?php $index = ($page_num - 1) * 5 + 1; ?>
							<?php foreach ( $transaction_list as $transaction_info ) : ?>
								<tr>
									<td><?php echo $index; ?></td>
									<td><?php echo $transaction_info['dst_number']; ?></td>
									<td><?php echo $transaction_info['src_number']; ?></td>
									<td><?php echo $transaction_info['transaction_type']; ?></td>
									<td>$<?php echo $transaction_info['balance_change']; ?></td>
									<td><?php echo $transaction_info['expected_total']; ?></td>
									<td><?php echo $transaction_info['memo']; ?></td>
								</tr>
								<?php $index ++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel panel-body text-center panel-account-pager">
				<ul class="pager pager-rounded">
					<li class="previous"><a href="accountInfo.php?account=<?php echo $account_id;?>&page=<?php echo $prev_num;?>">← Older</a></li>
					<li class="next"><a href="accountInfo.php?account=<?php echo $account_id;?>&page=<?php echo $next_num;?>">Newer →</a></li>
				</ul>
			</div>
			<!-- /task manager table -->

		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->

</div>
<!-- /Page container -->

<?php require 'layout/footer.php'; ?>