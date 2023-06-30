<!-- <?php
	$tgl_pesan= date("Y-m-d H:i:s");
?> -->
<div class="p-2 container" style="height:500px;">
	<div class="card bg-light">
		<div class="card-title card-header text-center bg-success text-white">
		<h4><b>Update !!!</b></h4>
		<i> Data Booking Penumpang Travel / Hari</i>
		</div>
		<div class="card-body">
			<table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">No. Tiket</th>
							<th scope="col">Ongkos</th>
							<th scope="col">Jadwal Keberangkatan</th>
							<th scope="col">Mobil</th>
							<th scope="col">Tanggal Berangkat</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($penumpang as $p) : ?>
						<tr>
							<th><?= $no++?></th>
							<th scope="row"><?= $p->nama?></th>
							<th scope="row"><?= $p->no_tiket?></th>
							<th><?= "Rp. ". rupiah($p->ongkos);?></th>
							<th><?= $p->ASAL?> - <?= $p->TUJUAN?></th>
							<th><?= $p->MOBIL?></th>
							<th><?= $p->tgl_berangkat?></th>
						</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</table>
		</div>
	</div>
</div>
