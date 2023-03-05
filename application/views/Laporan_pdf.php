<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Data Penumpang</title>
</head>
<style>
	.table {
		width: 100%;
		margin-bottom: 1rem;
		color: #858796
	}

	.table td,
	.table th {
		padding: .75rem;
		vertical-align: top;
		border-top: 1px solid #e3e6f0
	}

	.table thead th {
		vertical-align: bottom;
		border-bottom: 2px solid #e3e6f0
	}

	.table tbody+tbody {
		border-top: 2px solid #e3e6f0
	}

	.table-sm td,
	.table-sm th {
		padding: .3rem
	}

	.table-bordered {
		border: 1px solid #e3e6f0
	}

	.table-bordered td,
	.table-bordered th {
		border: 1px solid #e3e6f0
	}

	.table-bordered thead td,
	.table-bordered thead th {
		border-bottom-width: 2px
	}

	.table-borderless tbody+tbody,
	.table-borderless td,
	.table-borderless th,
	.table-borderless thead th {
		border: 0
	}

	.table-striped tbody tr:nth-of-type(odd) {
		background-color: rgba(0, 0, 0, .05)
	}

	.table-hover tbody tr:hover {
		color: #858796;
		background-color: rgba(0, 0, 0, .075)
	}

	.card {
		position: relative;
		display: flex;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid #e3e6f0;
		border-radius: .35rem
	}

	.card>hr {
		margin-right: 0;
		margin-left: 0
	}

	.card>.list-group {
		border-top: inherit;
		border-bottom: inherit
	}

	.card>.list-group:first-child {
		border-top-width: 0;
		border-top-left-radius: calc(.35rem - 1px);
		border-top-right-radius: calc(.35rem - 1px)
	}

	.card>.list-group:last-child {
		border-bottom-width: 0;
		border-bottom-right-radius: calc(.35rem - 1px);
		border-bottom-left-radius: calc(.35rem - 1px)
	}

	.card>.card-header+.list-group,
	.card>.list-group+.card-footer {
		border-top: 0
	}

	.card-body {
		flex: 1 1 auto;
		min-height: 1px;
		padding: 0.25rem
	}

	.card-title {
		margin-bottom: .75rem
	}

	.card-subtitle {
		margin-top: -.375rem;
		margin-bottom: 0
	}

	.card-text:last-child {
		margin-bottom: 0
	}

	.card-link:hover {
		text-decoration: none
	}

	.card-link+.card-link {
		margin-left: 1.25rem
	}

	.card-header {
		padding: .25rem 0.25rem;
		margin-bottom: 0;
		background-color: #f8f9fc;
		border-bottom: 1px solid #e3e6f0
	}

	.card-header:first-child {
		border-radius: calc(.35rem - 1px) calc(.35rem - 1px) 0 0
	}

	.card-footer {
		padding: .75rem 1.25rem;
		background-color: #f8f9fc;
		border-top: 1px solid #e3e6f0
	}

	.card-footer:last-child {
		border-radius: 0 0 calc(.35rem - 1px) calc(.35rem - 1px)
	}

	.card-header-tabs {
		margin-right: -.625rem;
		margin-bottom: -.75rem;
		margin-left: -.625rem;
		border-bottom: 0
	}

	.card-header-pills {
		margin-right: -.625rem;
		margin-left: -.625rem
	}

	.card-img-overlay {
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		padding: 1.25rem;
		border-radius: calc(.35rem - 1px)
	}

	.card-img,
	.card-img-bottom,
	.card-img-top {
		flex-shrink: 0;
		width: 100%
	}

	.card-img,
	.card-img-top {
		border-top-left-radius: calc(.35rem - 1px);
		border-top-right-radius: calc(.35rem - 1px)
	}

	.card-img,
	.card-img-bottom {
		border-bottom-right-radius: calc(.35rem - 1px);
		border-bottom-left-radius: calc(.35rem - 1px)
	}

	.card-deck .card {
		margin-bottom: .75rem
	}

</style>

<body>
	<div class="card">
		<div class="card-body">
			<h3 style="text-align:center;">Data Pemesanan Tiket</h3>
			<h4 style="text-align:center;">New Mutiara Travel</h4>
			<h5 style="text-align:center;">Jalan Patimura No.40 RT 03/04 Buntu Kec. Kroya Kab. Cilacap</h5>
			<hr style="width:100%; border:1px">
			<table class="table table-sm table-hover">
				<tr>
					<td>Nama Pemesan</td>
					<td>No. Tiket</td>
					<td>Perjalanan</td>
					<td>Tanggal Berangkat</td>
					<td>Mobil</td>
					<td>Kursi</td>
				</tr>
				<?php foreach ($penumpang as $p ) :?>
				<tr>
					<td><?= $p->nama?></td>
					<td><?= $p->no_tiket?></td>
					<td><?= $p->ASAL?> - <?= $p->TUJUAN?></td>
					<td><?= $p->tgl_berangkat?></td>
					<td><?= $p->MOBIL?></td>
					<td><?= $p->kursi?></td>
				</tr>
				<?php endforeach ?>
			</table>
			<h5 style="text-align:right">Tertanda</h5>
			<h6 style="text-align:right">Imam Sutaryo</h6>
		</div>
	</div>
</body>

</html>
