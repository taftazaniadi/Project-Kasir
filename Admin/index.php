<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Administration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="assets/alert/css/sweetalert.css">


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="#">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="kirim">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<?php
    include "../lib/koneksi.php";
    if (isset($_POST['kirim'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if (!ctype_alnum($username) or !ctype_alnum($pass)) {
            echo "
	 		<script type='text/javascript'>
				setTimeout(function () { 	
					swal({
						title: 'Login Failed',
						text:  'For $username',
						type: 'error',
						showConfirmButton: true
					});		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('Login');
				} ,3000);	
	  		</script>";
        } else {
            $login = mysqli_query($query, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
            $ketemu = mysqli_num_rows($login);
            $r = mysqli_fetch_array($login);
            //apabila username dan password ditemukan
            if ($ketemu > 0) {
                $_SESSION['namauser'] = $r['username'];
                $_SESSION['passuser'] = $r['password'];
                echo "
					<script type='text/javascript'>
						setTimeout(function () { 
							swal({
								title: 'Welcome',
								text:  'Hello, $r[first_name] $r[last_name]',
								type: 'success',
								showConfirmButton: true
							});		
						},10);	
						window.setTimeout(function(){ 
							window.location.replace('Dashboard');
						} ,3000);	
				</script>";
            } else {
                echo "
	 			<script type='text/javascript'>
					setTimeout(function () { 	
						swal({
							title: 'Login Failed',
							text:  'For $username',
							type: 'error',
							showConfirmButton: true
						});		
					},10);	
					window.setTimeout(function(){ 
						window.location.replace('Login');
					} ,3000);	
	  			</script>";
            }
        }
    }
?>
	
<!--===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>
	<script type="text/javascript" src="assets/alert/js/jquery-2.1.4.min.js"></script>
	<script src="assets/alert/js/sweetalert.min.js"></script>
	<script src="assets/alert/js/qunit-1.18.0.js"></script>

</body>
</html>