<?php
date_default_timezone_set('Asia/Jakarta');
$tgl = date('d-m-Y H:i:s');
?>
<style>
	.text-label{
		font-size: 10pt;
		margin-bottom: 0;
	}
	.form-control-plaintext{
		font-size: 10pt;
		padding-top: 0;
		padding-bottom: 0;
	}
</style>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-4 mt-2">
			<div class="card">
				<div class="card-header bg-success text-white">
					Informasi Perjalanan
				</div>
				<div class="card-body" style="padding:10px;">
					<!-- <div class="row"> -->
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Mobil</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak($info->MOBIL) ?>">
						</div>
					</div>
					<!-- </div> -->
					<!-- <div class="row"> -->
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Dari</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak($info->ASAL) ?>">
						</div>
					</div>
					<!-- </div> -->
					<!-- <div class="row"> -->
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Tujuan</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak($info->TUJUAN) ?>">
						</div>
					</div>
					<!-- </div> -->
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Ongkos</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak("Rp. " . rupiah($info->ongkos)) ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Tgl Berangkat</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak($info->tgl_berangkat) ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="text-label text-left">Tgl Sampai</label>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?php cetak($info->tgl_sampai) ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<span><label class="text-label text-left">Jml Penumpang</label></span>
						</div>
						<div class="col-sm-1">: </div>
						<div class="col-sm-7">
							<input class="form-control-plaintext" readonly disable type="text" value="<?= $_GET['p'] ?>">
							<input class="form-control-plaintext" type="hidden" value="<?= $_GET['p'] ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 mt-2">
			<form action="<?= base_url('pesanTiket') ?>" method="POST">
				<input type="hidden" name='penumpang' value='<?= $_GET['p'] ?>'>
				<input type="hidden" name='id_jadwal' value='<?= $id_jadwal ?>'>
				<input type="hidden" name='no_tiket' value='<?= $no_tiket ?>'>
				<input type="hidden" name='ongkos' value='<?= $info->ongkos ?>'>
				
				<div class="card">
					<div class="card-header bg-secondary text-white">
						Detail Penumpang
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>No.</th>
								<th>Nama</th>
								<th>>= 17 Tahun Nomor ID (KTP, SIM, PASSPORT)*</th>
								<!-- <th class="btn btn-success btn-block"><i class="fa fa-plus"></i>Tambah Penumpang</th> -->
							</thead>
							<tbody>
								<?php for ($i = 1; $i <= $_GET['p']; $i++) : ?>
									<tr>
										<td scope="col"><?= $i ?></td>
										<td scope="col">
											<input type="text" name='nama[]' class="form-control" required>
										</td>
										<td scope="col">
											<input type="text" name='no_identitas[]' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" required>
											<!-- <input type="hidden" name='tgl_pesan' value="<?= $tgl ?>"> -->
										</td>
									</tr>
								<?php endfor; ?>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-header bg-secondary text-white">
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
								<input type="text" class="form-control" name="no_telpon" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
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
						<button type="submit" name="submit" class="btn btn-success float-right">Simpan & Lanjutkan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function () {    
    
	$('.no_identitas').keypress(function (e) {    

		// var charCode = (e.which) ? e.which : event.keyCode    

		// if (String.fromCharCode(charCode).match(/[^0-9]/g))    

		// 	return false;      
		console.log(value)                  

	});    

});   
</script> -->