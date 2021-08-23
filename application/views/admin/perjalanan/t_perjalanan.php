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
