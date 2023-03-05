<!-- DataTales Example -->
<div>
<?= $this->session->flashdata('message'); ?>
</div>
<button class="btn btn-warning"><a class="btn btn-primary float-right" href="<?= site_url('admin/tambahJadwal')?>"> <i class="fa fa-plus"></i></a></button>
<button class="btn btn-warning"><a class="btn btn-primary float-right" href="<?= site_url('admin/cetakLaporan_jadwal')?>"> <i class="fa fa-print"></i></a></button>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary text-center"><?php echo $subtitle;?>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table" id="dataTable" width="100%" cellspacing="0">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Perjalanan</th>
						<th>Tgl Berangkat</th>
						<th>Tgl Sampai</th>
						<th>Mobil</th>
						<th>Tujuan</th>
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
						<td><?php echo $row->KATEGORI?></td>
						<td><?php echo tanggal_indo(date('Y-m-d' ,strtotime($row->tgl_berangkat))); ?></td>
						<td><?php echo tanggal_indo(date('Y-m-d' ,strtotime($row->tgl_sampai))); ?></td>
						<td><?php echo $row->MOBIL?></td>
						<td><?php echo $row->ASAL?> - <?php echo $row->TUJUAN?> <br> <span class="font-weight-bold"><?php echo "Rp. ". rupiah($row->ongkos); ?></span></td>
						<td>
							<a href="#hapus_jadwal" data-toggle="modal"
								onclick="$('#hapus_jadwal #formDelete').attr('action', '<?=site_url('admin/hapus_jadwal/'). $row->id_jadwal?>')"
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
<div class="modal fade" id="hapus_jadwal" tabindex="-1" role="dialog">
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
