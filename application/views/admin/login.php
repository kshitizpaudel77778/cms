<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<title>Login</title>

	<link href="<?php echo base_url(); ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	
	<link href="<?php echo base_url(); ?>public/admin/css/sb-admin-2.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css">

	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  	<div class="container v-center">
    	<!-- Outer Row -->
    	<div class="row justify-content-center">
	      	<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($setting_login_photo['login_photo']); ?>);"></div>
							<div class="col-lg-6">
								<div class="p-5">

									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
									</div>

									<?php
							        if($this->session->flashdata('error')) {
							            echo '<div class="bg-danger text-white mb-3 p-2">'.$this->session->flashdata('error').'</div>';
							        }
							        if($this->session->flashdata('success')) {
							            echo '<div class="success">'.$this->session->flashdata('success').'</div>';
							        }
							        ?>

									<?php echo form_open(base_url().'admin/login', array('class'=>'user')); ?>
										<div class="form-group">
											<input type="email" class="form-control form-control-user" placeholder="Email Address" name="email">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" placeholder="Password" name="password">
										</div>
										<input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="form1">
									<?php echo form_close(); ?>
									<hr>
									<div class="text-center">
										<a class="small" href="<?php echo base_url(); ?>admin/forget-password">Forgot Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

    	</div>

  	</div>

	<script src="<?php echo base_url(); ?>public/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="<?php echo base_url(); ?>public/admin/js/sb-admin-2.min.js"></script>

	<script src="<?php echo base_url(); ?>public/admin/js/custom.js"></script>

</body>
</html>
