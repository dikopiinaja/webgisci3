<style>
	#mapidReg {
		width: 100%;
		height: 500px;
	}

</style>
<div id="mapidReg"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>

<!-- Peta Perjalanan -->
<script>

	if(navigator.geolocation){ //jika navigator tersedia
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}else{ //jika navigator tidak tersedia
		console.log("Geolocation is not supported by this device");
	}
 
  	//jika location allowed
  	function showPosition(position){
		var latlong = position.coords.latitude + "," + position.coords.longitude;
		// alert(latlong);
		console.log(latlong);
	}
     
  	//jika location disabled atau not allowed
  	function showError(error){
		switch(error.code){
		case error.PERMISSION_DENIED:
			console.log("User denied the request for Geolocation.");
			break;
		case error.POSITION_UNAVAILABLE:
			console.log("Location information is unavailable.");
			break;
		case error.TIMEOUT:
			console.log("The request to get user location timed out.");
			break;
		case error.UNKNOWN_ERROR:
			console.log("An unknown error occurred.");
			break;
		}
  	}

	var mymap = L.map('mapidReg').setView([-8.1880314, 108.3328141], 6.5);

	L.tileLayer(
		'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		}).addTo(mymap);

        
		<?php foreach ($perjalanan as $key => $peta) { ?>
			L.marker([<?= $peta->latitude ?> , <?= $peta->longitude ?>]).addTo(mymap);
		<?php } ?>
</script>
