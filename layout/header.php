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

	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li <?php echo $page == "" ? "class='active'" : ""?>><a href="index.php"><i class="icon-home position-left"></i> Dashboard</a></li>
				<li <?php echo $page == "account" ? "class='active'" : ""?>><a href="account.php"><i class="icon-user-plus position-left"></i> Create Account</a></li>
				<li <?php echo $page == "accounts" ? "class='active'" : ""?>><a href="accounts.php"><i class="icon-users4 position-left"></i> My Accounts</a></li>
				<li <?php echo $page == "deposit" ? "class='active'" : ""?>><a href="deposit.php"><i class="icon-display4 position-left"></i> Deposit</a></li>
				<li <?php echo $page == "withdraw" ? "class='active'" : ""?>><a href="withdraw.php"><i class="icon-display4 position-left"></i> Withdraw</a></li>
				<li <?php echo $page == "transfer" ? "class='active'" : ""?>><a href="#"><i class="icon-display4 position-left"></i> Transfer</a></li>
				<li <?php echo $page == "profile" ? "class='active'" : ""?>><a href="profile.php"><i class="icon-profile position-left"></i> Profile</a></li>
				<li><a href="logout.php"><i class="icon-switch2 position-left"></i> Logout</a></li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	
	<!-- <div class="page-header">
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
				</div>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
	</div> -->