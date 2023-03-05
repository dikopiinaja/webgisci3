<style>
	#mapid {
		width: 70%;
		height: 500px;
	}
</style>
<div class="content mt-2">
	<br>
	<div class="row">
		<div id="mapid" class="container"></div>
	</div>
	<br>
</div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>


<!-- Peta Perjalanan -->
<script>
	var mymap = L.map('mapid').setView([-8.1880314, 108.3328141], 6.5);

	L.tileLayer(
		'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		}).addTo(mymap);

	<?php foreach($perjalanan as $key => $peta) { ?>
		L.marker([ <?= $peta->latitude ?> , <?= $peta->longitude?> ]).addTo(mymap)
		.bindPopup("<b>Nama Kota :</b> <?= $peta->nama_perjalanan ?>");
	<?php } ?>
</script>
