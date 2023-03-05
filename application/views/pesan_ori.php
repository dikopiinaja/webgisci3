<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-5 mt-2">
			<div class="card">
				<div class="card-header bg-warning text-center text-black">
					Informasi Perjalanan
				</div>
				<div class="card-body">
					<!-- <div class="row"> -->
					<div class="form-group form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Mobil</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak($info->MOBIL) ?>">
						</div>
					</div>
					<!-- </div> -->
					<!-- <div class="row"> -->
					<div class="form-group  form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Dari</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak($info->ASAL) ?>">
						</div>
					</div>
					<!-- </div> -->
					<!-- <div class="row"> -->
					<div class="form-group  form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Tujuan</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak($info->TUJUAN) ?>">
						</div>
					</div>
					<!-- </div> -->
					<div class="form-group form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Ongkos</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak ("Rp. ". rupiah($info->ongkos)) ?>">
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Tgl Berangkat</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak ($info->tgl_berangkat) ?>">
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="col-md-4">
							<h6><label class="text-primary">Tgl Sampai</label></h6>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?php cetak ($info->tgl_sampai) ?>">
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="col-md-4">
							<span><label class="text-primary">Jml Penumpang</label></span>
						</div>
						<div class="col-md-8">
							<input class="form-control-plaintext" readonly disable type="text"
								value="<?= $_GET['p'] ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7 mt-2">
			<form action="<?= base_url('pesanTiket')?>" method="POST">
				<input type="hidden" name='penumpang' value='<?= $_GET['p'] ?>'>
				<input type="hidden" name='id_jadwal' value='<?= $id_jadwal ?>'>
				<input type="hidden" name='no_tiket' value='<?= $no_tiket ?>'>
				<div class="card">
					<div class="card-header bg-primary text-white text-center">
						Detail Penumpang
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>No.</th>
								<th>Nama</th>
								<th>>= 17 Tahun Nomor ID (KTP, SIM, PASSPORT)*</th>
							</thead>
							<tbody>
								<?php for ($i=1; $i<=$_GET['p'];$i++<=4): ?>
								<tr>
									<td scope="col"><?= $i ?></td>
									<td scope="col">
										<input type="text" name='nama<?= $i ?>' class="form-control" required>
									</td>
									<td scope="col">
										<input type="text" name='no_identitas<?= $i ?>' class="form-control" required>
										<input type="hidden" name='tgl_pesan' value="<?php echo date("d-m-Y"); ?>">
									</td>
								</tr>
								<?php endfor; ?>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-header bg-primary text-center text-white">
						Detail Pemesan
					</div>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-md-3">
								<label>Nama</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="nama_pemesan" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label>Email</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label>No. Telp</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="no_telpon" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<label>Alamat</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="alamat" id="" cols="30" rows="10" required></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-success float-right">Simpan & Lanjutkan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
