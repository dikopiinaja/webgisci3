<?php
foreach ($query as $q){ ?>
<section>
	<div class="container" style="margin-top:80px;">
		<div class="card">
			<div class="row align-items-center">
				<div class="container">
					<div class="col-12">
						<div class="p-4 row">
							<h5 class="col-4"><?= $q->KATEGORI?><p class="text-align-center"></h5>
								<p class="col-3">
									<?= $q->ASAL?> - <?= $q->TUJUAN?></p>
								</p>
								<p class="col-3"><?= $q->tgl_berangkat?> <br> <?= $q->tgl_sampai?></p>
								<a href="<?= site_url('reservation');?>"><p class="col-2"> <button class="btn btn-primary">Pesan</button></p></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
