<?php if($this->session->flashdata('nomor') === null): ?>
<div class="container-fluid mt-5">
	<div class="row justify-content-center">
		<div class="col-5">
			<div class="alert alert-danger">
				<h4> Peringatan !! </h4><br>
				<p>Silahkan Lakukan Kembali Pemesanan Anda. Kode E-Ticket Anda Hilang</p> 
			</div>
		</div>
	</div>
</div>
<?php else: ?>

<div class="container-fluid mt-2">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-dark text-white text-center">Success!!!</div>
				<div class="card-body">
					<h3 class="text-center text-success"><i>Selamat!!!</i></h3>
					<p class="text-center">Anda telah Berhasil Memesan Tiket travel</p>
					<p class="text-center text-warning">Lakukan Pembayaran ditempat!!</p>
					<h5 class="text-center">Total yang harus dibayar</h5>
					<h3 class="text-center text-danger"><b><?= $this->session->flashdata('total') ?></b></h3>
					<br>
					<h5 class="text-center">Silahkan Cetak E-ticket Anda !!!
						<a href="<?= site_url('ticket/cetakTiket')?>" class="btn btn-sm btn-primary"><i
								class="fa fa-print"></i></a>
					</h5>
					<br>
					<h4 class="text-center">Terima Kasih</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>