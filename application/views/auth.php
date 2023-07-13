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
	<link rel="stylesheet" href="<?= base_url('assets');?>/css/sweetalert2.min.css">

</head>

<body class="bg-blue-custom">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-md-5">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<?php if ($this->session->flashdata('flash')) :?>

				<?php endif; ?>
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body pt-0">
						<!-- Nested Row within Card Body -->
						<!-- <div class="row"> -->
							<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
							<!-- <div class="col-lg-6"> -->
								<div class="p-4">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><i class="fa fa-bus"> New Mutiara Travel</i></h1>
									</div>
									<div class="input-group form-group mb-3">
										<input type="email" class="form-control" name="user_email"
											id="user_email" autocomplete="off" style="border-radius: 0;"
											placeholder="Enter Email Address...">
											<?= form_error('user_email','<small class="text-danger pl-1">','</small>');?>
											<div class="input-group-prepend">
												<span class="input-group-text" style="border: none;" id="basic-addon1"><i class="fa fa-user"></i></span>
											</div>
										</div>
										<div class="input-group form-group mb-3">
											<input type="password" class="form-control" name="user_password" autocomplete="off" style="border-radius: 0;"
											id="user_password" placeholder="Password">
											<div class="input-group-prepend">
												<span class="input-group-text" style="border: none;" id="basic-addon1"><i class="fa fa-lock"></i></span>
											</div>
									</div>
									<a href="" style="font-size: 10pt;">Forgot Password</a>
									<a class="col-md-3 float-right btn bg-blue-custom text-white btn-user btnLogin">
										Login
									</a>
									<!-- <hr> -->
								</div>
							<!-- </div>
						</div> -->
					</div>
				</div>

			</div>

		</div>

	</div>
    <!-- Sweat Alert -->
	<?php echo "<script>".$this->session->flashdata('message')."</script>"?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets');?>/js/sweetalert2.all.min.js"></script>
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets');?>/js/sb-admin-2.min.js"></script>

</body>
<script type="text/javascript">
$(document).ready(function(){
	$('.btnLogin').on('keypress, click',function(){
		var userEmail = $('#user_email').val();
		var userPassword = $('#user_password').val();
		if(userEmail.length == ""){
			Swal.fire(
				'Oops...',
				'Username Wajib Diisi !',
				'warning'
            );
		}else if (userPassword.length == ""){
			Swal.fire(
				'Oops...',
				'Password Wajib Diisi !',
				'warning'
            );
		} else {
			$.ajax({
				url: "<?= base_url('auth/process_login')?>",
				type: "POST",
				data: {
					"user_email": userEmail,
					"user_password": userPassword
				},
				success: function(response){
					res = JSON.parse(response)

					// console.log(res.user_email)
					// console.log(res.role)
					// for(var r in response ){
						var email = res.user_email
						var password = res.user_password
						var role = res.role
						// console.log(role);

						if(role == 1){
							Swal.fire({
								title: 'Login Admin Berhasil!',
								text: 'Anda akan di arahkan dalam 3 Detik',
								icon: 'success',
								timer: 3000
							})
							.then(function() {
								window.location.href = "<?= base_url('admin') ?>";
							});
						}else if(role == 2){
							Swal.fire({
								title: 'Login Supir Berhasil!',
								text: 'Anda akan di arahkan dalam 3 Detik',
								icon: 'success',
								timer: 3000
							})
							.then (function() {
								window.location.href = "<?= base_url('supir') ?>";
							});
						}else{
							Swal.fire(
								'Oops!',
								'Email / Password salah / tidak terdaftar!',
								'error'
							);
							$('#user_password').val('');
							// console.log(response);
						}
					// }
				},
				error: function(response){
					Swal.fire(
						'Oops!',
						'server error!',
						'error'
					);
					// console.log(response);
				}
			})
		}
	})
})
</script>

</html>
