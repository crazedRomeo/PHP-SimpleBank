<?php
$page = "accounts";
$page_num = isset($_GET['page']) ? intval($_GET['page']) : 1;
?>
<?php require 'layout/header.php'; ?>
<script type="text/javascript" src="assets/js/pages/accounts.js"></script>
<?php
	$total_account = totalAccounts();
	$total_page = ($total_account % 5 == 0) ? $total_account / 5 : intval($total_account / 5) + 1;
	$prev_num = ($page_num > 1) ? $page_num - 1 : 1;
	$next_num = ($page_num == $total_page) ? $total_page : $page_num + 1;

	$account_list = getAccounts();
?>
<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

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
							<th>Account Number</th>
							<th>Account Type</th>
							<th>Balance</th>
							<th>Modified</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ( count($account_list) > 0 ) : ?>
							<?php $index = ($page_num - 1) * 5 + 1; ?>
							<?php foreach ( $account_list as $account_info ) : ?>
								<tr onclick="showAccount(<?php echo $account_info['id'];?>)">
									<td><?php echo $index; ?></td>
									<td><?php echo $account_info['account']; ?></td>
									<td>
										<?php echo $account_info['type']; ?>
									</td>
									<td>
										$<?php echo $account_info['balance']; ?>
									</td>
									<td>
										<?php echo $account_info['modified']; ?>
									</td>
									<td>
										<?php if ( $account_info['active'] == 1 ) : ?>
											<span class="label label-success">Active</span>
										<?php else : ?>
											<span class="label label-default">Inactive</span>
										<?php endif; ?>
									</td>
								</tr>
								<?php $index ++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel panel-body text-center panel-account-pager">
				<ul class="pager pager-rounded">
					<li class="previous"><a href="accounts.php?page=<?php echo $prev_num;?>">← Older</a></li>
					<li class="next"><a href="accounts.php?page=<?php echo $next_num;?>">Newer →</a></li>
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