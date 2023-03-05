<footer class="p-4 border-top bg-light text-dark">
	<div class="row">
    <?php foreach($travel->result() as $t){ ?>
		<div class="col-12 col-md text-white">
			<!-- <img class="mb-2" src="<?= base_url('assets'); ?>/public/img/logo.png" alt="" width="24" height="24"> -->
			<h6 class="d-block mb-3 text-muted text-black">&copy; <?= $t->nama_travel ?> <?= date('Y');?></h6>
		</div>
		<div class="col-12 col-md">
			<h5>Contact Me</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#"><i class="fa fa-user"></i>  <?= $t->nama_pemilik ?></a></li>
				<li><a class="text-muted" href="#"><i class="fa fa-map text-success "> <br> </i><?= $t->alamat ?></a></li>
				<li><a class="text-muted" href="#"><i class="fa fa-phone"></i>  <?= $t->no_hp ?></a></li>
			</ul>
		</div>
		<!-- <div class="col-6 col-md">
			<h5>About</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">About Us</a></li>
			</ul>
		</div> -->
    <?php } ?>
	</div>
</footer>
