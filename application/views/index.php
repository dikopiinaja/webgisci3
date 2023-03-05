<!DOCTYPE html>
<html lang="en">

<head>

	<?= $head?>

</head>

<body>
	<?= $navigasi?>
	<?= $content?>
	<?= $footer?>
	<!-- Bootstrap core JavaScript -->
	<!-- <script src="<?= base_url('assets');?>/public/js/bootstrap.min.js"></script> -->
	<!-- <script src="<?= base_url('assets');?>/public/js/jquery.min.js"></script> -->
	<!-- <script src="<?= base_url('assets');?>/leaflet/leaflet.css"></script> -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
	<link href="<?= base_url("assets")?>/css/sweetalert2.min.css" rel="stylesheet">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script> -->
	<div class="modal fade" id="auth" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white text-center">
					<h6 class="modal-title">Login</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<input type="text" name="user_email" id="user_email" class="form-control"
								placeholder="Input Email">
						</div>
						<div class="form-group">
							<input type="password" name="user_password" id="user_password" class="form-control"
								placeholder="Input Password">
						</div>
						<button type="submit" name="button_login" class="btn btn-success">Login</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
<script src="<?= base_url('assets');?>/leaflet/leaflet.js"></script>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>
<script src="<?= base_url("assets")?>/js/sweetalert2.all.min.js"></script>
<!-- Pusher Notifikasi -->
<!-- <script src="https://js.pusher.com/4.4/pusher.min.js"></script> -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
	// Enable pusher logging - don't include this in production
	Pusher.logToConsole = true;

	var pusher = new Pusher('0bc788817f001f4a9802', {
		cluster: 'ap1'
	});

	var channel = pusher.subscribe('my-channel');
	channel.bind('my-event', function (data) {
		alert(JSON.stringify(data));
	});

</script>


</html>
