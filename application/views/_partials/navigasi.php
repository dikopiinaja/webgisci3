<?php 
// $jml_notif = $this->model_notifikasi->load_notification();
// $notif = $this->model_notifikasi->notification();
 ?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
	<div class="container">
		<a class="navbar-brand <?php if($this->uri->segment(1)==''){echo 'active';}?>" href="<?= site_url('');?>">
			<img src="<?= base_url('assets');?>/public/img/logo.png" alt="">
			New Mutiara Travel
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
			aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item">
 					<a class="nav-link" href="<?= site_url('konfirmasi');?>">Konfirmasi Pembayaran</a>
 				</li> -->
				<li class="nav-item">
					<a class="nav-link <?php if($this->uri->segment(1)=='peta_perjalanan'){echo 'active';}?>" href="<?= site_url('peta_perjalanan');?>">Peta Perjalanan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($this->uri->segment(1)=='dataBooking'){echo 'active';}?>" href="<?= site_url('dataBooking')?>">Data Booking <div class="badge badge-info"></div></a>
				</li>
				<li class="nav-item">
					<!-- <button class="btn btn-primary" data-toggle="modal" data-target="#auth">
 						Login
 					</button> -->
				</li>
				<li class="nav-item dropdown">
					<!-- <a class="nav-link dropdown-toggle" data-toggle="dropdown"><span
							class="label label-pill label-warning" id="tot-jadwal">Notifikasi <i class="fa fa-bell"></i>
							<div class="badge badge-warning"><?= $jml_notif;?></div>
						</span></a>
					<ul class="dropdown-menu">
						<div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">

						</div>
					</ul> -->
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- <script>
$(document).ready(function() {
    selesai();
});
 

function selesai() {
    setTimeout(function() {
        jumlah();
        selesai();
        pesan();
    }, 200);
}


function jumlah() {
    $.getJSON("<?= base_url("guest");?>", function(datas) {
        $("#notif").html(datas.jumlah);
    });
}



function pesan() {
    $.getJSON("data_pesan.php", function(data) {
        $("#pesan").empty();
        var no = 1;
        $.each(data.result, function() {
            $("#pesan").append(`<a id="pesan" class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>&nbsp;`+this['pesan'].substr(0, 20)+`...</a>`);
        });
    });
}
</script> -->
