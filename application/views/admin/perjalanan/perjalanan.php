<!-- DataTales Example -->
<div>
	<?= $this->session->flashdata('message'); ?>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h5 class="m-0 font-weight-bold text-primary">
					<button class="btn-sm btn-success float-right" id="newPage"><i class="fa fa-plus"></i></button>
				</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="dataPerjalanan" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th width="5%">ID Perjalanan</th>
								<th>Kota</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="jadwal"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- MODAL HAPUS PERJALANAN -->
<div class="modal fade" id="hapus_perjalanan" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Apakah Anda yakin ingin menghapusnya?</h6>
			</div>
			<div class="modal-footer">
				<form id="formDelete" action="" method="post">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END HAPUS PERJALANAN -->

<script type="text/javascript">
$(document).ready(function(){
	getPerjalanan();

	$('#dataPerjalanan').DataTable({
		fixedHeader: true,
		pagingType: 'full_numbers',
		order: [[3, 'desc']]
		// bJQueryUI:true,
		// bSort:false,
		// bPaginate:true,
		// sPaginationType:"full_numbers",
		// iDisplayLength: 10
	})
});

$('#newPage').click(function(){
	window.location = "<?= base_url()?>admin/tambah_perjalanan";
});

function getPerjalanan(){
	$.ajax({
		url: "<?= base_url('admin/getPerjalanan')?>",
		dataType: "JSON",
		success: function(data){
			// console.log(data)
			var html = '';
			var no = 1;
			for (let i = 0; i < data.length; i++) {
				const id_perjalanan = data[i].id_perjalanan;
				const nama_perjalanan = data[i].nama_perjalanan;
				const latitude = data[i].latitude;
				const longitude = data[i].longitude;
				// console.log(element)
				html += 
				`
					<tr>
						<td>${no++}</td>
						<td>${nama_perjalanan}</td>
						<td>${latitude}</td>
						<td>${longitude}</td>
						<td>
						<a href="<?= base_url()?>admin/update_perjalanan/${id_perjalanan}"
										class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
									<a href="#hapus_perjalanan" data-toggle="modal"
										onclick="$('#hapus_perjalanan #formDelete').attr('action', '<?=site_url('admin/hapus_perjalanan/${id_perjalanan}')?>')"
										class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				`
				$('#jadwal').html(html);
			}
		}
	})
}
</script>
