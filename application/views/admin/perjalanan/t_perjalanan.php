<style>
	#mapid {
		width: 100%;
		height: 500px;
	}

</style>
<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				Tambah Kota
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('admin/tambah_perjalanan')?>">
					<div class="form-group">
						<label>Nama Perjalanan</label>
						<input type="text"
							class="form-control <?php echo form_error('nama_perjalanan') ? 'is-invalid':'' ?>"
							name="nama_perjalanan" id="Perjalanan">
						<div class="invalid-feedback">
							<?php echo form_error('nama_perjalanan') ?>
						</div>
					</div>
					<div class="form-group">
						<label>Latitude</label>
						<input type="text" class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
							name="latitude" id="Latitude">
						<div class="invalid-feedback">
							<?php echo form_error('latitude') ?>
						</div>
					</div>
					<div class="form-group">
						<label>Longitude</label>
						<input type="text" class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
							name="longitude" id="Longitude">
						<div class="invalid-feedback">
							<?php echo form_error('longitude') ?>
						</div>
					</div>
					<div class="form-group">
						<label>LatLong</label>
						<input type="text" class="form-control <?php echo form_error('latlong') ? 'is-invalid':'' ?>"
							name="latlong" id="Latlong">
						<div class="invalid-feedback">
							<?php echo form_error('latlong') ?>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-header">Peta Lokasi</div>
			<div class="card-body">
				<div id="mapid"></div>
			</div>
		</div>
	</div>
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>

<script>
	var curLocation = [0, 0];
	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [-8.1880314, 108.3328141];
	}

	const container = document.getElementById('mapid');
	if(container){

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
