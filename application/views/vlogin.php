<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="shortcut icon"  href="<?php echo base_url('theme-assets/images/logo/logom.png')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/animate/animate.css")?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/css-hamburgers/hamburgers.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/animsition/css/animsition.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/select2/select2.min.css")?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/daterangepicker/daterangepicker.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/util.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/main.css")?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url("assets/images/bglogadmin.jpg")?>);">
					<span class="login100-form-title-1">
						Login
					</span>
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url('Login/aksi_login');?>" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div>
						<button class="btn" data-toggle="modal" data-target="#daftar">
							<i class="fa fa-plus"></i> Daftar Member</button>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" href="<?php echo base_url('HomeAdm/index');?>">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!-- Modal Input Baru-->
<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">DAFTAR MEMBER</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('Member/save'); ?>" enctype="multipart/form-data">

        <div class="form-group">
                <label name="username">Username</label>
                <input type="text" name="username" class="form-control">
                <label name="password">Password</label>
                <input type="password" name="password" class="form-control">
                
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>

        </form>
      </div>
    </div>
  </div>
</div>


<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/jquery/jquery-3.2.1.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/animsition/js/animsition.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/bootstrap/js/popper.js")?>"></script>
	<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/select2/select2.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/daterangepicker/moment.min.js")?>"></script>
	<script src="<?php echo base_url("assets/vendor/daterangepicker/daterangepicker.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/vendor/countdowntime/countdowntime.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/js/main.js")?>"></script>

</body>
</html>