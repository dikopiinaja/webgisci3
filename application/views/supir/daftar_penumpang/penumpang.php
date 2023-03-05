<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 bg-primary">
		<h6 class="m-0 font-weight-bold text-white text-center"><?php echo $subtitle;?>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table" id="dataTable" width="100%" cellspacing="0">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Nama Penumpang</th>
						<th>Tgl Keberangkatan</th>
						<th>Harga</th>
						<th>Mobil</th>
						<th>Kursi</th>
						<th>Tujuan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
                        $no = 1;
                        foreach($query as $row){
                    ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->nama?></td>
						<td><?php echo tanggal_indo(date('Y-m-d',strtotime(''.$row->tgl_berangkat.''))); ?> - <?php echo tanggal_indo(date('Y-m-d',strtotime(''.$row->tgl_sampai.''))); ?></td>
						<td><?php echo "Rp. ". rupiah($row->ongkos)?></td>
						<td><?php echo $row->MOBIL?></td>
						<td><?php echo $row->kursi?> / <?php echo $row->kapasitas?></td>
						<td><?php echo $row->ASAL?> - <?php echo $row->TUJUAN?> <br> <span class="font-weight-bold"><?php echo "Rp. ". rupiah($row->ongkos); ?></span></td>
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
