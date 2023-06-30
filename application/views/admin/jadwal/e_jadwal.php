<style>
	.select2-selection__rendered {
    	line-height: 31px !important;
	}
	.select2-container .select2-selection--single {
		height: 35px !important;
	}
	.select2-selection__arrow {
		height: 34px !important;
	}
</style>
<div class="row">
	<div class="container">
		<div class="card">
			<!-- <div class="card-header">
				Tambah Jadwal
			</div> -->
			<div class="card-body">
				<form id="formJadwal" onsubmit="updateJadwal()">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="">Nama Mobil</label>
                            <input type="hidden" name="id" id="id_jadwal" value="<?= $jadwal->id_jadwal; ?>">
							<select name="mobil"
								class="form-control <?php echo form_error('mobil') ? 'is-invalid':'' ?> select2">
								<option value="">-- Pilih Mobil --</option>
								<?php foreach ($mobil as $m): ?>
								<option value="<?= $m->id_mobil?>" <?php if($jadwal->mobil == $m->id_mobil ) { ?> selected="selected"<?php } ?> ><?= $m->nama_mobil ?></option>
								<?php endforeach?>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('mobil') ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="">Asal</label>
							<select name="asal"
								class="form-control  <?php echo form_error('asal') ? 'is-invalid':'' ?> select2">
								<option value="">-- Pilih Keberangkatan --</option>
								<?php foreach ($perjalanan as $p): ?>
								<option value="<?= $p->id_perjalanan?>" <?php echo ($jadwal->asal == $p->id_perjalanan ) ? 'selected' : '' ?> ><?= $p->nama_perjalanan ?></option>
								<?php endforeach?>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('asal') ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="">Tujuan</label>
							<select name="tujuan" class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?> select2">
								<option value="">-- Pilih Tujuan --</option>
								<?php foreach ($perjalanan as $p): ?>
								<option value="<?= $p->id_perjalanan?>" <?php echo ($jadwal->tujuan == $p->id_perjalanan ) ? 'selected' : '' ?>><?= $p->nama_perjalanan ?></option>
								<?php endforeach?>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('tujuan') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Tanggal berangkat</label>
							<input type="datetime-local" min="<?= date('Y-m-d/TH:i:s') ?>"
								class="form-control  <?php echo form_error('tgl_berangkat') ? 'is-invalid':'' ?>"
								name="tgl_berangkat" value="<?= $jadwal->tgl_berangkat ?>">
							<div class="invalid-feedback">
								<?php echo form_error('tgl_berangkat') ?>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="">Tanggal sampai</label>
							<input type="datetime-local" min="<?= date('Y-m-d/TH:i:s') ?>"
								class="form-control  <?php echo form_error('tgl_sampai') ? 'is-invalid':'' ?>"
								name="tgl_sampai" value="<?= $jadwal->tgl_sampai ?>">
							<div class="invalid-feedback">
								<?php echo form_error('tgl_sampai') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Ongkos</label>
							<input type="text"
								class="form-control  <?php echo form_error('ongkos') ? 'is-invalid':'' ?>"
								name="ongkos" value="<?= $jadwal->ongkos ?>">
							<div class="invalid-feedback">
								<?php echo form_error('ongkos') ?>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="">Kategori</label>
							<select name="kategori"
								class="form-control  <?php echo form_error('kategori') ? 'is-invalid':'' ?> select2" data-minimum-results-for-search="Infinity">
								<option value="">-- Pilih Kategori --</option>
								<?php foreach ($kategori as $k): ?>
								<option value="<?= $k->id_kategori?>" <?php echo ($jadwal->kategori == $k->id_kategori ) ? 'selected' : '' ?>><?= $k->nama_kategori ?></option>
								<?php endforeach?>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('kategori') ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Update</button>
					<button type="reset" onclick="cancel()" class="btn btn-danger">Batal</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2({
			height: '34px'
		});
        updateJadwal();
	});

    function cancel(){
        window.location = "<?= site_url('admin/jadwal');?>";
    }

	function changeStat(id_notif){
		$.ajax({
			url:"<?= site_url('admin/changestat')?>",
			type:"POST",
			dataType:"json",
			data:{id_notif:id_notif},
			success:function(data){
				alert(data.msg);
			}
		})
	}

    function showLoad(){
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
	}
	
	function hideLoad(){
        $('#loading').removeClass('loading');
        $('#loading-content').removeClass('loading-content');
	}


    var id_jadwal = $('#id_jadwal').val();
    console.log(id_jadwal)
    function updateJadwal(id_jadwal){
        $(document).on("submit","#formJadwal", function(e){
            e.preventDefault();
            $.ajax({
                url : "<?= site_url('admin/editJadwal/')?>"+id_jadwal+"",
                method: 'POST',
				data: $('#formJadwal').serialize(),
				beforeSend: showLoad(),
				success: function(data){
					// console.log(data);
					hideLoad();
					swal.fire('Berhasil', 'Data Jadwal Berhasil diedit!!!', 'success').then(function(){ window.location.href = '<?= base_url('admin/jadwal')?>'});
				}
            });
        })
    }
</script>


