<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>->Login<-</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets');?>/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<?php if ($this->session->flashdata('flash')) :?>

				<?php endif; ?>
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><i class="fa fa-route"> New Mutiara Travel</i></h1>
									</div>
									<form class="user" method="post" action="<?= base_url('auth/process_login'); ?>">
										<div class="form-group">
											<input type="email" class="form-control form-control" name="user_email"
												id="user_email"
												placeholder="Enter Email Address...">
                                                <?= form_error('user_email','<small class="text-danger pl-1">','</small>');?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control" name="user_password"
												id="user_password" placeholder="Password">
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
    <!-- Sweat Alert -->
	<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets');?>/js/sb-admin-2.min.js"></script>

</body>

</html>
