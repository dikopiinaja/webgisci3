<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center bg-primary text-white">
				Edit Perjalanan
			</div>
			<div class="card-body">
				<form method="post"
					action="<?= base_url('admin/update_perjalanan')?>/<?php echo $perjalanan->id_perjalanan?>">
					<div class="form-group">
						<input type="text" hidden class="form-control form-control" name="id"
						 value="<?php echo $perjalanan->id_perjalanan?>">
						<label for="Perjalanan">Nama Perjalanan</label>
						<input type="text" class="form-control" name="nama_perjalanan" id="Perjalanan"
							value="<?php echo $perjalanan->nama_perjalanan?>">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
