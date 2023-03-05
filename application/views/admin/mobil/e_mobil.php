<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center bg-primary text-white">
				Edit Mobil Angkutan
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('admin/update_mobil')?>/<?php echo $mobil->id_mobil?>">
					<div class="row">
						<div class="form-group col-md-6">
							<input type="text" hidden class="form-control form-control" name="id"
								value="<?php echo $mobil->id_mobil?>">
							<label for="mobil">Nama Perjalanan</label>
							<input type="text" class="form-control" name="nama_mobil" id="mobil"
								value="<?php echo $mobil->nama_mobil?>">
						</div>
                        <div class="form-group col-md-6">
							<label for="noplat">No. Plat</label>
							<input type="text" class="form-control" name="noplat" id="noplat"
								value="<?php echo $mobil->noplat?>">
                        </div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="kapasitas">Kapasitas</label>
							<input type="number" class="form-control" name="kapasitas" id="kapasitas"
								value="<?php echo $mobil->kapasitas?>">
						</div>
                        <div class="form-group col-md-6">
							<label for="tipe">Tipe</label>
							<label for="Tipe">Tipe</label>
							<select name="tipe" id=""
								class="form-control <?php echo form_error('tipe') ? 'is-invalid':'' ?>">
								<option value="">--> Pilih Tipe <--</option>
								<option value="Kecil">Kecil</option>
								<option value="Sedang">Sedang</option>
								<option value="Besar">Besar</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('tipe') ?>
							</div>
                        </div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
