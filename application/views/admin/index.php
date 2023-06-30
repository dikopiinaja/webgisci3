<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $head;?>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php echo $sidebar?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php echo $topbar?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<?php echo $breadcrumb?>

					<!-- Content Row -->
					<?php echo $content;?>
					<!-- Content Row -->

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; New Mutiara Travel <?php echo date('Y');?></span>
					</div>
				</div>
			</footer>

			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Are you sure want to quit</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?php echo base_url()?>auth/logout">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url("assets")?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url("assets")?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url("assets")?>/js/sb-admin-2.min.js"></script>
	<!-- select2  -->
	<script src="<?= base_url("assets")?>/select2/select2.min.js"></script>

	<script src="<?= base_url('assets');?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets');?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Page level custom scripts -->
	<script src="<?= base_url('assets');?>/js/demo/datatables-demo.js"></script>

	<!-- Notifikasii -->
	<script>

	$(document).ready(function(){
		selesai();
	});

	// merge function
	function selesai(){
		setTimeout(() => {
			jumlah();
			selesai();
			pesan();
		}, 2000);
	}

	// get row notif
	function jumlah(){
		$.getJSON('<?= base_url('notifikasi/notif')?>', function(data){
			$('#notif').html(data);
		});
	}

	// get data pesan
	function pesan(){
		$.getJSON('<?= base_url('notifikasi/load_notif')?>', function(data){
			$('#pesan').empty();
			var no = 1;
			$.each(data, function(key, val){
				$('#pesan').append(`<a id="pesan" class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
				</svg>&nbsp;`+val.judul.substr(0, 20)+`...</a>`);
			});
		});
	}

</script>
</body>

</html>

