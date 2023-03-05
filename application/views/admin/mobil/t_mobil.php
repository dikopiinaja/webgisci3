<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<div class="card">
	<div class="card-body">
		<form method="post" action="<?= base_url('admin/tambah_mobil')?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="Nama Mobil">Nama Mobil</label>
							<input type="text" class="form-control <?php echo form_error('nama_mobil') ? 'is-invalid':'' ?>"
								name="nama_mobil" id="mobil">
							<div class="invalid-feedback">
								<?php echo form_error('nama_mobil') ?>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="No Plat">No. Plat</label>
							<input type="text" class="form-control <?php echo form_error('noplat') ? 'is-invalid':'' ?>"
								name="noplat" id="noplat">
							<div class="invalid-feedback">
								<?php echo form_error('noplat') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="Kapasitas">Kapasitas</label>
							<input type="number" class="form-control <?php echo form_error('kapasitas') ? 'is-invalid':'' ?>"
								name="kapasitas" id="kapasitas">
							<div class="invalid-feedback">
								<?php echo form_error('kapasitas') ?>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="Tipe">Tipe</label>
							<select name="tipe" id=""
								class="form-control <?php echo form_error('tipe') ? 'is-invalid':'' ?>">
								<option value="">-- Pilih Tipe --</option>
								<option value="Kecil">Kecil</option>
								<option value="Sedang">Sedang</option>
								<option value="Besar">Besar</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('tipe') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
