<footer class="p-4 border-top bg-light text-dark">
	<div class="row">
    <?php foreach($travel->result() as $t){ ?>
		<div class="col-12 col-md text-white">
			<!-- <img class="mb-2" src="<?= base_url('assets'); ?>/public/img/logo.png" alt="" width="24" height="24"> -->
			<h6 class="d-block mb-3 text-muted text-black">&copy; <?= $t->nama_travel ?> <?= date('Y');?></h6>
		</div>
		<div class="col-12 col-md">
			<h5>Contact Me</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#"><i class="fa fa-user"></i>  <?= $t->nama_pemilik ?></a></li>
				<li>
					<a class="text-muted" href="#"><i class="fa fa-map-marker"></i> <?= $t->alamat ?></a>
					<div id="mapfooter"></div>
				</li>
				<li><a class="text-muted" href="#"><i class="fa fa-phone"></i>  <?= $t->no_hp ?></a></li>
			</ul>
		</div>
    <?php } ?>
	</div>
</footer>

<style>
	#mapfooter {
		width: 100%;
		height: 200px;
	}
</style>
<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script> -->
<script>
var mymap = L.map('mapfooter').setView([-7.5921091,109.2432358], 15);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia3Vuc2FyaWZhbiIsImEiOiJjbGl1YTNqcHcwZ3NuM3BtODJibDlkY3ZhIn0.ZXfl_8wjX5q5Qv0YhVdaQQ', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	id: 'mapbox/streets-v11',
}).addTo(mymap);
L.marker([-7.5938532,109.2556383]).addTo(mymap)
</script>
