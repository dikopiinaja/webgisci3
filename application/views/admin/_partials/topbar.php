<nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>


	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-bell fa-fw"></i>
				<!-- Counter - Alerts -->
				<span class="badge badge-danger badge-counter" id="notif"></span>
			</a>
			<!-- Dropdown - Alerts -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
				<h6 class="dropdown-header">
					Alerts
				</h6>
				<div id="pesan"></div>
			</div>
		</li>

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucwords($user['user_name']);?></span>
				<img class="img-profile rounded-circle" src="<?= base_url('assets');?>/img/undraw_profile.svg">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<div class="dropdown-header ml-1 mr-1">
					<div class="dropdown-item p-0"><i class="fa fa-user fa-sm fa-fw mr-2"></i><?= ucwords($user['user_email']);?>
					</div>
					<div class="dropdown-divider p-0"></div>
					<div class="dropdown-item p-0"><?= ucwords($user['user_name']);?></div>
				</div>
				<div class="dropdown-header ml-1 mr-1">
					<a class="dropdown-item p-0" href="<?= site_url('admin/profile');?>">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Profile
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item p-0" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Logout
					</a>
				</div>
			</div>
		</li>

	</ul>

</nav>
