<div class="row  justify-content-center">
	<div class="col-6">
		<div class="card shadow">
			<div class="card-body">
				<div class="table table-outline">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Pesan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($notifikasi as $not) : ?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $not->pesan?></td>
								<td></td>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
