<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="public/assets/images/icons/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="public/images/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="public/css/loginpage.css">
  	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center logoDiv">
				<img src="public/images/avtar.png" class="loginlogo" alt="login form"/>
			</div>	
		</div>
	</div>
	
	<div class="container">
		<div class="container-login100">		
			<div class="row">
				<div class="col-md-12 col-sm-12 col-ls-12">
					<div class="login-box">
						<form method="post" action="<?php echo e(url('partner/checklogin')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group mb-4">
								<lable for="username" class="loginLables">User ID</lable>
								<input id="username" class="form-control inputElements" type="email" name="username" placeholder="Enter Username" autocomplete="off">								
							</div>
							<div class="form-group">
								<lable class="loginLables mb-0">Password</lable>
								<input class="form-control inputElements" type="password" name="password" placeholder="Enter Password" autocomplete="off">	
							</div>

							<?php if($errors->any()): ?>
							<div class="alert alert-danger d-flex align-items-center"><?php echo e($errors->first()); ?></div>
							<?php endif; ?>

							<div class="mt-4 text-center ">
								<input type="submit" name="login" class="login" value="Login" />
							</div>
						</form>
					</div>	
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- Start Footer -->

<!-- End Footer -->
</body>
</html><?php /**PATH C:\xampp\htdocs\product_master\resources\views/login.blade.php ENDPATH**/ ?>