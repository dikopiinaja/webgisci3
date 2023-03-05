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
	// $(document).ready(function(){
	// 	showPosition();
	// })

	if(navigator.geolocation){ //jika navigator tersedia
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}else{ //jika navigator tidak tersedia
		console.log("Geolocation is not supported by this device");
	}
 
  	//jika location allowed
  	function showPosition(position){
		var latitude = position.coords.latitude 
		var longitude = position.coords.longitude;
		var latlong = latitude +', '+ longitude;
		// alert(latlong);
		// console.log(latlong);
		// var mymap = L.map('mapidReg').setView([-8.1880314, 108.3328141], 9);
		var mymap = L.map('mapidReg').setView([latitude , longitude], 6.5);

		var myIcon = L.icon({
			iconUrl: '<?= base_url('assets/leaflet/images/marker-device.png')?>',
			iconSize: [24, 35],
			iconAnchor: [22, 35],
			popupAnchor: [-3, -76],
			shadowUrl: '<?= base_url('assets/leaflet/images/marker-shadow.png')?>',
			shadowSize: [43, 30],
			shadowAnchor: [23, 34]
		});

// L.marker([50.505, 30.57], {icon: myIcon}).addTo(map);
		console.log(mymap)
		L.tileLayer(
			'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/streets-v11',
			}).addTo(mymap);

		L.marker([latitude ,longitude], {icon: myIcon}).addTo(mymap);
		<?php foreach ($perjalanan as $key => $peta) { ?>
			L.marker([<?= $peta->latitude ?> , <?= $peta->longitude ?>]).addTo(mymap);
		<?php } ?>
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

</script>
