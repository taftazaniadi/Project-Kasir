<?php
    include "../lib/koneksi.php";
    
    session_start();
    
    if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
        echo "
            <link rel='stylesheet' href='assets/alert/css/sweetalert.css'>
            <script type='text/javascript' src='assets/alert/js/jquery-2.1.4.min.js'></script>
            <script src='assets/alert/js/sweetalert.min.js'></script>
            <script src='assets/alert/js/qunit-1.18.0.js'></script>
	 		<script type='text/javascript'>
				setTimeout(function () { 	
					swal({
						title: 'Warning',
						text:  'Untuk mengakses modul, Anda harus login',
						type: 'error',
						showConfirmButton: true
					});		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('Login');
				} ,3000);	
	  		</script>";
        //echo "<center>Untuk mengakses modul, Anda harus login <br>";
        //echo "<a href='Login'><b>LOGIN</b></a></center>";
    } else {
        include "template/header.php";
        include "template/footer.php";
    }
?>