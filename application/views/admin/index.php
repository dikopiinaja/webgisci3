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
	<script src="<?= base_url("assets")?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url("assets")?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url("assets")?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url("assets")?>/js/sb-admin-2.min.js"></script>

	<script src="<?= base_url('assets');?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets');?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Page level custom scripts -->
	<script src="<?= base_url('assets');?>/js/demo/datatables-demo.js"></script>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>
		<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
			$.ajax({
				url:"<?= site_url('admin/getTot');?>",
				type:"POST",
				dataType:"json",
				data:{},
				success:function(data){
					$("#tot-jadwal").html(data.tot)
				}
			});
		}, 2000);
	})
</script>
	<!-- Peta Perjalanan -->
	<!-- <script>
	var mymap = L.map('mapid').setView([-8.1880314,108.3328141],6.5);

		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		}).addTo(mymap);
	</script> -->
	<script>
		var curLocation = [0, 0];
		if (curLocation[0] == 0 && curLocation[1] == 0) {
			curLocation = [-8.1880314, 108.3328141];
		}

		var mymap = L.map('mapid').setView([-8.1880314, 108.3328141], 7);
		L.tileLayer(
			'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
					'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/streets-v11'
			}).addTo(mymap);

		mymap.attributionControl.setPrefix(false);
		var marker = new L.marker(curLocation, {
			draggable: 'true'
		});

		marker.on('dragend', function (event) {
			var position = marker.getLatLng();
			marker.setLatLng(position, {
				draggable: 'true'
			}).bindPopup(position).update();
			$("#Latitude").val(position.lat);
			$("#Longitude").val(position.lng).keyup();
		});

		$("#Latitude, #Longitude").change(function () {
			var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
			marker.setLatLng(position, {
				draggable: 'true'
			}).bindPopup(position).update();
			mymap.panTo(position);
		});
		mymap.addLayer(marker);

	</script>

	<!-- Notifikasii -->
	<script>
  $(document).ready(function(){
   
   function load_unseen_notification(view = '')
   {
    $.ajax({
     url:"<?= base_url('notifikasi/notifikasi')?>",
     method:"POST",
     data:{view:view},
     dataType:"json",
     success:function(data)
     {
      $('.dropdown-menu').html(data.notification);
      if(data.unseen_notification > 0)
      {
       $('.count').html(data.unseen_notification);
     }
   }
 });
  }
  
  load_unseen_notification();
  
  $('#comment_form').on('submit', function(event){
    event.preventDefault();
    if($('#subject').val() != '' && $('#comment').val() != '')
    {
     var form_data = $(this).serialize();
     $.ajax({
      url:"insert.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
       $('#comment_form')[0].reset();
       load_unseen_notification();
     }
   });
   }
   else
   {
     alert("Both Fields are Required");
   }
 });
  
  $(document).on('click', '.dropdown-toggle', function(){
    $('.count').html('');
    load_unseen_notification('yes');
  });
  
  setInterval(function(){ 
    load_unseen_notification();; 
  }, 5000);
  
});
</script>
</body>

</html>

