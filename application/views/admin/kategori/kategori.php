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
					<table class="table" id="dataKategori" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="formKategori">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="kategori">Nama Kategori</label>
						<input type="text" class="form-control" <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?> name="nama_kategori" id="nama_kategori">
						<div class="invalid-feedback">
							<?php echo form_error('nama_kategori') ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary btnSave">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEditKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<input type="text" name="id_kategori" id="id_kategori">
				<input type="text" class="form-control" <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?> name="nama_kategori" id="nama_kategori">
				<div class="invalid-feedback">
					<?php echo form_error('nama_kategori') ?>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary btnUpdate">Simpan</button>
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
		loadCategori();
		// table();
	});

	function loadCategori(){
		$.ajax({
            type: "get",
            url : "<?= base_url('admin/getCategory')?>",
            dataType : "json",
            success: function(data){
                // console.log(data);
                var table = 
                $('#dataKategori').DataTable({
                    order: [[1, 'asc']],
                    data : data,
                    lengthChange: false,     
                   
                    columnDefs: [
                        {
                            searchable: false,
                            orderable: false,
                            targets: 0,
                        },
                    ],
                    buttons: [
                        'print'
                    ],
                    // processing: true,
                    // serverSide: true,
                    columns  : [
                        { data : null },
                        { data : 'nama_kategori'},
                        { data : null,
                            render: function ( data, type, row, meta) {
                            	return '<button data-id="'+ row['id_kategori'] +'" class="btn btn-primary" data-toggle="modal" data-target="#modalEditKategori"><i class="fa fa-pen"></i></button> <button class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
                            }
                        },
                    ]
                });

                table.on('order.dt search.dt', function () {
                    table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i){
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            }
        })
	}

	$('#formKategori').on('click','.btnSave',function(event){
		event.preventDefault();
		
		var nameCategory = $('#nama_kategori').val();
		console.log(nameCategory)
		if(nameCategory.trim() == '' ){
		alert('Masukkan nama kategori.');
				$('#nama_kategori').focus();
		return false;
		}else{
			$.ajax({
				url: '<?= base_url('admin/tambah_kategori')?>',
				type: 'POST',
				data : {
					nama_kategori : nameCategory,
				},
				success: function(data){
					console.log(data)
					$('#modalKategori').hide();
					Swal.fire(
						'Success!!!',
						'Data Kategori berhasil disimpan!',
						'success'
					).then(function(){
							location.reload();
						}
					);
					// $('[name="nama_kategori"]').val(""); 
				}
			});

		}
	});

	$(document).on("click", ".btnEditKategori", function(e) {
		// e.preventDefault;
		var id = $(this).attr("data-id");
		$('#id_kategori').val(id);

		console.log(id);
	});
	// $('.btnEditKategori').click(function(){
	// 	var btn_id =  $(this).attr('data-id'); //getting the btn's id
	// 	console.log(btn_id);
	// 	$('#id_kategori').val(id);
	// });
</script>
