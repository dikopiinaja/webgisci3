<div>
	<?= $this->session->flashdata('message'); ?>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><?php echo $subtitle;?>
					<button type="button" data-toggle="modal" data-target="#modalKategori" class="btn-sm btn-circle btn-primary float-right"><i class="fa fa-plus"></i></button>
				</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								// $no = 1;
								// foreach($query->result() as $row){
									 ?>
							<!-- <tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->nama_kategori?></td>
								<td>
									<a href="<?php echo base_url('kategori')?>/update_kategori/<?php echo $row->id_kategori?>"
										class="btn btn-circle btn-warning"><i class="fa fa-pen"></i></a>
									<a href="#hapus_kategori" data-toggle="modal"
										onclick="$('#hapus_kategori #formDelete').attr('action', '<?=site_url('admin/hapus_kategori/'). $row->id_kategori?>')"
										class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a>
								</td>
							</tr> -->
							<?php 
                            // $no++;
							// 	} 
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-5">
		<div class="card">
			<div class="card-header bg-primary text-center text-white">
				Tambah Kategori
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('admin/tambah_kategori')?>">
					<div class="form-group">
						<label for="kategori">Nama Kategori</label>
						<input type="text" class="form-control" <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?> name="nama_kategori" id="Perjalanan">
						<div class="invalid-feedback">
							<?php echo form_error('nama_kategori') ?>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
				</form>
			</div>
		</div>
	</div> -->
</div>

<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form id="formKategori">
			<div class="form-group">
				<label for="kategori">Nama Kategori</label>
				<input type="text" class="form-control" <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?> name="nama_kategori" id="Perjalanan">
				<div class="invalid-feedback">
					<?php echo form_error('nama_kategori') ?>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary btnSave">Simpan</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL HAPUS PERJALANAN -->
<div class="modal fade" id="hapus_kategori" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Apakah Anda yakin ingin menghapusnya?</h6>
			</div>
			<div class="modal-footer">
				<form id="formDelete" action="" method="post">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END HAPUS PERJALANAN -->

<script type="text/javascript">
	// ajax GET request javascript
	$(document).ready(function(){
		loadCategory();
		// table();
	});

	function loadCategory(){
		var xhttp = new XMLHttpRequest();
		xhttp.open('GET', '<?= base_url('admin/getCategory')?>', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				var response = JSON.parse(this.responseText);
				var table = document.getElementById('dataTable').getElementsByTagName("tbody")[0];
				// console.log(response);
				for (var key in response){
					if(response.hasOwnProperty(key)){
						var val = response[key];

						// insert new row
						var newRow = table.insertRow(0);
						var number_cell = newRow.insertCell(0);
						var name_cell = newRow.insertCell(1);
						var action_cell = newRow.insertCell(2);

						number_cell = val['id_kategori'];
						name_cell = val['nama_kategori'];
						action_cell = val['id_kategori'];
					}
				}
			}
		}
	
		// table();
		xhttp.send();
	}

	function table(){
		var no = 1;
		
		// $('tbody').each(function(){
		// 	//this wrapped in jQuery will give us the current .letter-q div
		// 	$(this).append(`<tr>
		// 					<td>${no}</td>
		// 					<td></td>
		// 					<td></td>
		// 				</tr>`);
		// });

		// $("tbody").append();
	}

	$('#formKategori').on('click','btnSave',function(event){
		event.preventDefault();
		
		var nameCategory = $('#nama_kategori').val();
		$.ajax({
			url: '<?= base_url('admin/tambah_kategori')?>',
			type: 'POST',
			data : {
				nama_kategori : nameCategory,
			},
			success: function(data){
				// console.log(data)
				$('[name="nama_kategori"]').val("");
			}
		});
	});
</script>
