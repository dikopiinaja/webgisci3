<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center bg-primary text-white">
				Edit Kategori
			</div>
			<div class="card-body">
				<form method="post"
					action="<?= base_url('admin/update_perjalanan')?>/<?php echo $kategori->id_kategori?>">
					<div class="form-group">
						<input type="text" hidden class="form-control form-control" name="id"
						 value="<?php echo $kategori->id_kategori?>">
						<label for="Kategori">Nama Kategori</label>
						<input type="text" class="form-control" name="nama_kategori" id="Perjalanan"
							value="<?php echo $kategori->nama_kategori?>">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
