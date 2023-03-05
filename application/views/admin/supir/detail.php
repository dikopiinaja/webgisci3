<div class="card">
	<div class="card-header text-center bg-danger text-white"><b>Data Supir</b> <span>New Mutiara Travel</span> </div>
	<div class="card-body">
        <div class="row">
            <div class="form-group col-md-5">
                <label for="nama_supir" class="col-md-6 col-form-label">Nama</label>
                <label for="ttl" class="col-md-6 col-form-label">Tempat, Tanggal Lahir</label>
                <label for="nohp" class="col-md-6 col-form-label">No. HP</label>
                <label for="nohp" class="col-md-6 col-form-label">Email</label>
            </div>
            <div class="form-group col-md-6">
            <input type="text" readonly class="form-control-plaintext" 
                    value="<?php echo $supir['nama_supir']?>">
            <input type="text" readonly class="form-control-plaintext" 
                    value="<?php echo $supir['tempat_lahir']?>, <?php echo $supir['tanggal_lahir']?>">
            <input type="text" readonly class="form-control-plaintext"
                    value="<?php echo $supir['no_hp']?>">
            <input type="text" readonly class="form-control-plaintext"
                    value="<?php echo $supir['email']?>">
            </div>
            <div class="form-group col-md-1">
            <i class="nav-icon far fa-user"></i>
            </div>
        </div>
	</div>
    <div class="card-footer">
        <button class="btn btn-warning">
            <a href="<?= site_url('admin/supir');?>">Kembali</a>
        </button>
    </div>
</div>
