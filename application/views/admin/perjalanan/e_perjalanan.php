<style>
	#mapedit {
		width: 100%;
		height: 500px;
	}

</style>
<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				Edit Kota
			</div>
			<div class="card-body">
				<form id="formPerjalanan" onsubmit="updatePerjalanan()">
					<div class="form-group">
						<label>Nama Perjalanan</label>
						<input type="text" hidden class="form-control form-control" name="id" id="id_perjalanan"
						 value="<?php echo $perjalanan->id_perjalanan?>">
						<input type="text"
							class="form-control <?php echo form_error('nama_perjalanan') ? 'is-invalid':'' ?>"
							name="nama_perjalanan" id="Perjalanan" value="<?php echo $perjalanan->nama_perjalanan?>">
						<div class="invalid-feedback">
							<?php echo form_error('nama_perjalanan') ?>
						</div>
					</div>
					<div class="form-group">
						<label>Latitude</label>
						<input type="text" class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
							name="latitude" id="Latitude" value="<?php echo $perjalanan->latitude?>">
						<div class="invalid-feedback">
							<?php echo form_error('latitude') ?>
						</div>
					</div>
					<div class="form-group">
						<label>Longitude</label>
						<input type="text" class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
							name="longitude" id="Longitude" value="<?php echo $perjalanan->longitude?>">
						<div class="invalid-feedback">
							<?php echo form_error('longitude') ?>
						</div>
					</div>
					<div class="form-group">
						<label>LatLong</label>
						<input type="text" class="form-control <?php echo form_error('latlong') ? 'is-invalid':'' ?>"
							name="latlong" id="Latlong" value="<?php echo $perjalanan->Latlong?>">
						<div class="invalid-feedback">
							<?php echo form_error('latlong') ?>
						</div>
					</div>
					<button class="btn btn-success" type="submit">Update</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-header">Peta Lokasi</div>
			<div class="card-body">
				<div id="mapedit"></div>
			</div>
		</div>
	</div>
</div>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>

<script>

	var idperjalanan = $('#id_perjalanan').val();
	var latitude = $('#Latitude').val();
	var longitude = $('#Longitude').val();
	var latlong = $('#Latlong').val();

	function showLoad(){
		// $(document).ajaxStart(function(){
			$('#loading').addClass('loading');
			$('#loading-content').addClass('loading-content');
		// });
	}
	
	function hideLoad(){
		// $(document).ajaxStop(function(){
			$('#loading').removeClass('loading');
			$('#loading-content').removeClass('loading-content');
		// })
	}

	function updatePerjalanan(){
		$(document).on("submit",'#formPerjalanan', function(e){
			e.preventDefault();
			$.ajax({
				url: '<?= base_url('admin/update_perjalanan/')?>'+idperjalanan+'',
				method: 'POST',
				data: $('#formPerjalanan').serialize(),
				beforeSend: showLoad(),
				// 	function() {
				// 	$('.btn').prop('disabled', 'disabled'),
				// 	$('.btnSimpan').html('<button class="spinner-border text-secondary" role="status"><span class="sr-only">Loading...</span></button>')
				// },
				success: function(data){
					// console.log(data);
					hideLoad();
					swal.fire('Berhasil', 'Data Perjalanan Berhasil diedit!!!', 'success').then(function(){ window.location.href = '<?= base_url('admin/perjalanan')?>'});
				}
			})
		})
	}

	var curLocation = [0, 0];
	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [latitude, longitude];
	}

	const container = document.getElementById('mapedit');
	if(container){
		// console.log(latitude);

		var mymap = L.map('mapedit').setView([latitude, longitude], 7);
		L.tileLayer(
			'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia3Vuc2FyaWZhbiIsImEiOiJjbGl1YTNqcHcwZ3NuM3BtODJibDlkY3ZhIn0.ZXfl_8wjX5q5Qv0YhVdaQQ', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
					'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/streets-v11'
			}).addTo(mymap);

		// L.tileLayer(
		// 	'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		// 		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		// 			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		// 			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		// 		id: 'mapbox/streets-v11'
		// 	}).addTo(mymap);

		// L.marker([latitude ,longitude]).addTo(mymap);
	
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
			$('#Latlong').val(position.lat + ', ' + position.lng);
		});
	
		$("#Latitude, #Longitude").change(function () {
			var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
			marker.setLatLng(position, {
				draggable: 'true'
			}).bindPopup(position).update();
			mymap.panTo(position);
		});
		mymap.addLayer(marker);
	}
</script>
