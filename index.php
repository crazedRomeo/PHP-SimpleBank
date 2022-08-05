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
				<h4>
					<i class="icon-home position-left"></i>
					Dashboard
					<small class="display-block">Good morning, <?php echo $_SESSION['user']['username'];?>!</small>
				</h4>
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
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
      			<div class="row">
					<div class="col-lg-12">

						<!-- Profile -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title">Profile</h6>
								<div class="heading-elements">
									<form class="heading-form" action="#">
										<div class="form-group">
											
										</div>
									</form>
								</div>
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Username</div>
												<div class="text-muted"><?php echo $_SESSION['user']['username'];?></div>
											</li>
										</ul>
									</div>

									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-mention"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Email</div>
												<div class="text-muted"><?php echo $_SESSION['user']['email'];?></div>
											</li>
										</ul>
									</div>

									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Role</div>
												<div class="text-muted">user<?php echo $_SESSION['user']['role'];?></div>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="position-relative" id="traffic-sources"><div class="d3-tip e" style="display: none;"></div><svg width="919.5" height="330"><g transform="translate(50,5)"></g></svg></div>
						</div>
						<!-- /Profile -->

					</div>
				</div>
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