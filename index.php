<?php require 'layout/header.php'; ?>

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

</div>
<!-- /Page container -->

<?php require 'layout/footer.php'; ?>