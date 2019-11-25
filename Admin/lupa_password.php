<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password | Administration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
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

</head>

<body>
    <?php
        include "../lib/koneksi.php";
        $data = $query->query("SELECT * FROM Admin LIMIT 1");
        $hasil = $data->fetch_array();
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/login/images/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form" method="POST">
                    <span class="login100-form-logo">
                        <img src="assets/login/images/icon.png">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Forgot Password
                    </span>

                    <center>
                        <p>
                            Please enter your Username to show your password
                        </p>
                    </center><br><br>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" id="username" placeholder="Username" value="<?php echo $hasil['username'];?>" disabled>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100 input-pass" type="text" name="password" id="password" placeholder="Password will show" disabled>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="Show" id="Show" onclick="SubmitForm(); return false">
                            Show Password
                        </button>
                    </div>
                </form>
                <center><p><a href="Login">Back to Login</a></p></center>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

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

    <script>
        function SubmitForm() {
            var username = $('#username').val();

            $.post("show.php", {username: username}, 
            function(data) {
                $('.input-pass').val(data);
            })
        }
    </script>
</body>

</html>