<div class="card">
	<div class="card-header bg-dark text-center text-white">Daftar Penumpang</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" id="dataTable">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>No. Tiket</th>
						<th>Jadwal Keberangkatan</th>
						<th>Mobil</th>
						<th>Kursi</th>
						<th>Ongkos</th>
						<th>Tanggal Berangkat</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($penumpang as $p) : ?>
					<tr>
						<th><?= $no++?></th>
						<th><?= $p->nama?></th>
						<th><?= $p->no_tiket?></th>
						<th><?= $p->ASAL?> - <?= $p->TUJUAN?></th>
						<th><?= $p->MOBIL?></th>
						<th><?= $p->kursi?> / <?= $p->kapasitas?></th>
						<th><?= "Rp. ". rupiah($p->ongkos);?></th>
						<th><?= $p->tgl_berangkat?></th>
					</tr>
					<?php endforeach?>
				</tbody>
			</table>
		</div>
	</div>
</div>
