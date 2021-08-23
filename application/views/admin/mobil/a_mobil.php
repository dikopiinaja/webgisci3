<!-- DataTales Example -->
<div>
	<?= $this->session->flashdata('message'); ?>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?php echo $subtitle;?>
			<a href="<?php echo base_url()?>admin/tambah_mobil"
				class="btn-sm btn-circle btn-primary  float-right"><i class="fa fa-plus"></i></a>
		</h6>
	</div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Mobil </th>
						<th>No. Plat </th>
						<th>Kapasitas</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach($query as $row){
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->nama_mobil?></td>
						<td><?php echo $row->noplat?></td>
						<td><?php echo $row->kapasitas?></td>
						<td><?php echo $row->tipe?></td>
						<td>
							<a href="<?php echo base_url()?>admin/update_mobil/<?php echo $row->id_mobil?>"
										class="btn btn-circle btn-warning"><i class="fa fa-pen"></i></a>
							<a href="#hapus_mobil" data-toggle="modal"
								onclick="$('#hapus_mobil #formDelete').attr('action', '<?=site_url('admin/hapus_mobil/'). $row->id_mobil?>')"
								class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php 
					$no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- MODAL HAPUS PERJALANAN -->
<div class="modal fade" id="hapus_mobil" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Apakah Anda yakin ingin menghapusnya?</h6>
			</div>
			<div class="modal-footer">
				<form id="formDelete" action="" method="post">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END HAPUS PERJALANAN -->
