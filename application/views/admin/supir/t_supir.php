<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<div class="card">
	<div class="card-body">
		<form method="post" action="<?= base_url('admin/tambah_supir')?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="form-group col-md-6">
							<label>Nama Supir</label>
							<input type="text"
								class="form-control <?php echo form_error('nama_supir') ? 'is-invalid':'' ?>"
								name="nama_supir">
							<div class="invalid-feedback">
								<?php echo form_error('nama_supir') ?>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label>Tempat Lahir</label>
							<input type="text"
								class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								name="tempat_lahir">
							<div class="invalid-feedback">
								<?php echo form_error('tempat_lahir') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Tanggal Lahir</label>
							<input type="date"
								class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"
								name="tanggal_lahir">
							<div class="invalid-feedback">
								<?php echo form_error('tanggal_lahir') ?>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="Tipe">Mobil</label>
							<select name="id_mobil"
								class="form-control <?php echo form_error('id_mobil') ? 'is-invalid':'' ?>">
								<option value="">-- Pilih Mobil --</option>
								<?php foreach ($mobil as $mbl ) { ?>
								<option value="<?= $mbl->id_mobil?>"><?= $mbl->nama_mobil?></option>
								<?php } ?>

							</select>
							<div class="invalid-feedback">
								<?php echo form_error('id_mobil') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>No. HP</label>
							<input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								name="no_hp">
							<div class="invalid-feedback">
								<?php echo form_error('no_hp') ?>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								name="email">
							<div class="invalid-feedback">
								<?php echo form_error('email') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
						<label>Status</label>
							<select name="status" id=""
								class="form-control  <?php echo form_error('status') ? 'is-invalid':'' ?>">
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('status') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
