<?php
error_reporting(E_ALL ^ E_WARNING);
?>

<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Dashboard | Administrations</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <link rel="stylesheet" href="assets/alert/css/sweetalert.css">

</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="Dashboard" class="logo">
                    <img src="assets/images/logo.png" height="35" alt="Admin" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <form action="#" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="assets/images/!logged-user.jpg" class="img-circle" data-lock-picture="../assets/images/!logged-user.jpg" />
                        </figure>
                        <?php
                        include "../lib/koneksi.php";
                        $kueriAdmin = mysqli_query($query, "select * from admin LIMIT 1");
                        while ($admin = mysqli_fetch_assoc($kueriAdmin)) {
                            ?>
                            <div class="profile-info">
                                <span class="name"><?php echo $admin['first_name']; ?>
                                    <?php echo $admin['last_name'] ?></span>
                                <span class="role">Administrator</span>
                            </div>
                        <?php
                        } ?>
                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" href="Profile"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" href="#" id="out"><i class="fa fa-power-off"></i> Logout</a>
                                <script type='text/javascript' src='assets/alert/js/jquery-2.1.4.min.js'></script>
                                <script src='assets/alert/js/sweetalert.min.js'></script>
                                <script src='assets/alert/js/qunit-1.18.0.js'></script>
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#out').click(function() {
                                            swal({
                                                    title: 'Confirm',
                                                    text: 'Are you want log out this account?',
                                                    type: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonClass: 'btn-danger',
                                                    confirmButtonText: 'Yes',
                                                    closeOnConfirm: false
                                                },
                                                function() {
                                                    swal('Success!',
                                                        'Anda telah logout dari Halaman Administrator',
                                                        'success');
                                                    window.location.replace('Login');
                                                });
                                        });
                                    });
                                </script>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="Dashboard">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span><b>Dashboard</b></span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span><b>Transaksi</b></span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="Shift_1">
                                                Shift Ke - 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="Shift_2">
                                                Shift Ke - 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="List_Transaksi">
                                                Total Transaksi
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span><b>Inventaris</b></span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="Menu">
                                                Menu
                                            </a>
                                        </li>
                                        <li>
                                            <a href="Topping">
                                                Topping
                                            </a>
                                        </li>

                                        <li>
                                            <a href="Ekstra">
                                                Ekstra
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="Discount">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span><b>Discount</b></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Region">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <span><b>Cabang</b></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Data_Karyawan">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span><b>Karyawan</b></span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                        <span><b>Laporan (On Process)</b></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <hr class="separator" />
                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            <?php
            if ($_GET['module'] == 'dashboard') {
                include "module/home/dashboard.php";
            } elseif ($_GET['module'] == 'profile') {
                include "module/profile/user.php";
            } elseif ($_GET['module'] == 'list_karyawan') {
                include "module/karyawan/listkaryawan.php";
            } elseif ($_GET['module'] == 'list_transaksi') {
                include "module/transaksi/list_transaksi.php";
            } elseif ($_GET['module'] == 'list_menu') {
                include "module/menu/menu/list_menu.php";
            } elseif ($_GET['module'] == 'list_topping') {
                include "module/menu/topping/list_topping.php";
            } elseif ($_GET['module'] == 'add_menu') {
                include "module/menu/menu/tambah_menu.php";
            } elseif ($_GET['module'] == 'add_topping') {
                include "module/menu/topping/tambah_topping.php";
            } elseif ($_GET['module'] == 'edit_topping') {
                include "module/menu/topping/edit_topping.php";
            } elseif ($_GET['module'] == 'edit_menu') {
                include "module/menu/menu/edit_menu.php";
            } elseif ($_GET['module'] == 'hapus_menu') {
                include "module/menu/menu/hapus_menu.php";
            } elseif ($_GET['module'] == 'shift_1') {
                include "module/transaksi/shift_1.php";
            } elseif ($_GET['module'] == 'shift_2') {
                include "module/transaksi/shift_2.php";
            } elseif ($_GET['module'] == 'ekstra') {
                include "module/menu/ekstra/list_ekstra.php";
            } elseif ($_GET['module'] == 'diskon') {
                include "module/diskon/diskon.php";
            } elseif ($_GET['module'] == 'region') {
                include "module/region/region.php";
            } elseif ($_GET['module'] == 'add_region') {
                include "module/region/add_region.php";
            } elseif ($_GET['module'] == 'edit_region') {
                include "module/region/edit_region.php";
            } elseif ($_GET['module'] == 'edit_ekstra') {
                include "module/menu/ekstra/edit_ekstra.php";
            } elseif ($_GET['module'] == 'add_ekstra') {
                include "module/menu/ekstra/tambah_ekstra.php";
            } elseif ($_GET['module'] == 'add_diskon') {
                include "module/diskon/add_diskon.php";
            } elseif ($_GET['module'] == 'edit_diskon') {
                include "module/diskon/edit_diskon.php";
            } else {
                include "module/home/dashboard.php";
            }
            ?>