<div class="jumbotron jumbotron-fluid" style="margin-bottom:0;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<br><br><br><br>
				<h1 class="display-5">New Mutiara Travel</h1>
				<p class="lead">Search your best travel choice, <span>here</span></p>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-primary text-center text-white">Cari Perjalanan
					</div>
					<form action="<?= site_url('cariTiket') ?>" method="POST">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="">Asal</label>
									<select name="asal" class="form-control">
										<option value="">--Select--</option>
										<?php foreach ($perjalanan as $p) : ?>
											<option value="<?= $p->id_perjalanan ?>"><?= $p->nama_perjalanan ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="">Tujuan</label>
									<select name="tujuan" class="form-control">
										<option value="">--Select--</option>
										<?php foreach ($perjalanan as $p) : ?>
											<option value="<?= $p->id_perjalanan ?>"><?= $p->nama_perjalanan ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="">Tanggal Berangkat</label>
									<input type="date" name="tgl" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="">Jumlah penumpang</label>
									<select name="jumlah" class="form-control">
										<?php for ($i = 1; $i <= 4; $i++) : ?>
											<option value="<?= $i ?>"><?= $i ?> Penumpang</option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-success btn-block">Cari</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<?php if (!isset($tiket_travel)) : ?>

	<?php else : ?>
		<div id="mapid"></div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Mobil</th>
						<th class="text-center">Rute</th>
						<th>Tanggal Berangkat</th>
						<th>Tanggal Sampai</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if ($tiket_travel === NULL) : ?>
						<p>Maaf Tiket Tidak Tersedia</p>
					<?php endif ?>
					<?php $no = 1;
					foreach ($tiket_travel as $tr) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $tr->MOBIL ?></td>
							<td class="text-center"><span><?= $tr->KATEGORI ?></span><br> <?= $tr->ASAL ?> - <?= $tr->TUJUAN ?>
							</td>
							<td><?= tanggal_indo(date('Y-m-d', strtotime('' . $tr->tgl_berangkat . ''))); ?></td>
							<td><?= $tr->tgl_sampai ?></td>
							<td><a href="<?= base_url('pesan/' . $tr->id_jadwal . '?p=' . $penumpang) ?>" class="btn btn-success">Pesan</a></td>
						</tr>

				</tbody>
			</table>
		</div>
		<div class="card">
			<style>
				#mapid {
					width: 100%;
					height: 500px;
				}
			</style>
			<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

			<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
			<!-- Peta Perjalanan -->
			<script>
				var mymap = L.map('mapid').setView([-8.1880314, 108.3328141], 6.5);
				let latLng1 = L.latLng(<?= $tr->LATLONG1 ?>);
				let latLng2 = L.latLng(<?= $tr->LATLONG2 ?>);
				// let latLng2 = L.latLng(-6.871892962887516,107.56634502588045);
				let wp1 = new L.Routing.Waypoint(latLng1);
				let wp2 = new L.Routing.Waypoint(latLng2);

				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
						'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					id: 'mapbox/streets-v11',
				}).addTo(mymap);

				L.Routing.control({
					waypoints: [latLng1, latLng2]
				}).addTo(mymap);

				let routeUs = L.Routing.osrmv1();
				routeUs.route([wp1, wp2], (err, routes) => {
					if (!err) {
						let best = 100000000000;
						let bestRoute = 0;
						for (i in routes) {
							if (route[i].summary.totalDistance < best) {
								bestRoute = i;
								best = routes[i].summary.totalDistance;
							}
						}
						console.log('best route', routes[bestRoute]);
						L.Routing.line(routes[bestRoute], {
							style: [{
								color: 'green',
								weight: '10'
							}]
						}).addTo(map);
					}
				});
			</script>

		<?php endforeach ?>

		</div>
	<?php endif; ?>
</div>