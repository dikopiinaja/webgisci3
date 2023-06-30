<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-route"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Mutiara Travel<sup>New</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<?php
	// Cek role user
	if ($this->session->userdata('role') == '1') { // Jika role-nya admin
	?>

		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('admin'); ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Master Data
		</div>


		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Data</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Travel</h6>
					<a class="collapse-item <?php if ($this->uri->segment(1) == 'admin/perjalanan') {
						echo 'active'; } ?>" href="<?= base_url('admin/perjalanan'); ?>">Perjalanan</a>
					<a class="collapse-item <?php if ($this->uri->segment(1) == 'jadwal') {
						echo 'active'; } ?>" href="<?= base_url('admin/jadwal'); ?>">Jadwal Keberangkatan</a>
					<a class="collapse-item <?php if ($this->uri->segment(1) == 'supir') {
						echo 'active'; } ?>" href="<?= base_url('admin/supir'); ?>">Supir</a>
					<a class="collapse-item <?php if ($this->uri->segment(1) == 'mobil') {
						echo 'active'; } ?>" href="<?= base_url('admin/mobil'); ?>">Mobil</a>
					<a class="collapse-item <?php if ($this->uri->segment(1) == 'kategori') {
						echo 'active'; } ?>" href="<?= base_url('admin/kategori'); ?>">Kategori</a>
				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Transaksi
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item  <?php if ($this->uri->segment(2) == 'daftarPenumpang') {
									echo 'active';
								} ?>">
			<a class="nav-link" href="<?= site_url('admin/daftarPenumpang'); ?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Pemesanan Tiket</span>
			</a>
			<!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= site_url('admin/buk_pem'); ?>">Pembayaran Tiket</a>
				<a class="collapse-item" href="login.html">Penjualan Tiket</a>
			</div>
		</div> -->
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if ($this->uri->segment(1) == '') { echo 'active'; } ?>" href="<?= base_url('admin/layouts'); ?>">
				<i class="fas fa-fw fa-car"></i>
				<span>Layout Mobil</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if ($this->uri->segment(1) == '') { echo 'active'; } ?>" href="<?= base_url(''); ?>">
				<i class="fas fa-fw fa-home"></i>
				<span>Web</span>
			</a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" href="<?= base_url('admin/notifikasi'); ?>">
				<i class="fas fa-fw fa-bell"></i>
				<span>Notifikasi</span></a>
		</li> -->
		<li class="nav-item <?php if ($this->uri->segment(1) == 'peta') {
								echo 'active';
							} ?>">
			<a class="nav-link" href="<?= site_url('peta'); ?>">
				<i class="fas fa-fw fa-bell"></i>
				<span>Peta Perjalanan</span></a>
		</li>
	<?php
	} else { ?>
		<li class="nav-item">
			<a class="nav-link <?php if ($this->uri->segment(1) == 'supir') {
									echo 'active';
								} ?>" href="<?= site_url('supir'); ?>">
				<i class="fas fa-fw fa-home"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li class="nav-item <?php if ($this->uri->segment(1) == 'jadwal') {
								echo 'active';
							} ?>">
			<a class="nav-link" href="<?= site_url('jadwal'); ?>">
				<i class="fas fa-fw fa-cog"></i>
				<span>Jadwal Keberangkatan</span>
			</a>
		</li>
		<li class="nav-item <?php if ($this->uri->segment(1) == 'daftarPenumpang') {
								echo 'active';
							} ?>">
			<a class="nav-link" href="<?= site_url('daftarPenumpang'); ?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Daftar Penumpang</span>
			</a>
			<!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= site_url('user/upload'); ?>">List Daftar Penumpang</a>
			</div>
		</div> -->
		</li>
	<?php } ?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>


</ul>