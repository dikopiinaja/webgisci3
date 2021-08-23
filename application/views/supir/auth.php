<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets');?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?= base_url('assets');?>/public/css/one-page-wonder.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?= site_url('home');?>">
				<img src="<?= base_url('assets');?>/public/img/logo.png" alt="">
				<?= $title?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('home/trips');?>">Daftar Tour</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Data Booking <badges>0</badges></a>
					</li>
					<li class="nav-item">
						<button class="btn btn-primary" data-toggle="modal" data-target="#auth">
							Login
						</button>
					</li>
				</ul>
			</div>
		</div>
    </nav>
    <div class="container">
        <div class="card form-login">
            <div class="card-header">
                Login System
            </div>
            <div class="card-body">
                <form action="<?= site_url('auth');?>">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="user_email" name="user_email" class="form-control" id="user_email" placeholder="Input Email">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Input Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<!-- Footer -->
	<footer class="py-3 bg-black fixed-bottom">
		<div class="container">
			<p class="m-0 text-center text-white small">Copyright &copy; New Mutiara Website 2020</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url('assets');?>/public/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets');?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
	<div class="modal" id="auth" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="">
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Input Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Login</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
