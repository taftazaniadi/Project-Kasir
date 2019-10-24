<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Data Karyawan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Karyawan</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Data Karyawan</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <a href="Add_Karyawan"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
                    </div>
                </div>
            </div>
            <table id="example1-tab1-dt" class="table table-striped table-condensed display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Staff</th>
                        <th>Nama Karyawan</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../lib/koneksi.php";
                    $kueriTopping = mysqli_query($query, "SELECT * FROM staff");
                    for ($i = 1; $i <= $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC); $i++) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $i ?></td>
                            <td id="aidi"><?php echo $topping['id_staff']; ?></td>
                            <td><?php echo $topping['Nama']; ?></td>
                            <td><?php echo $topping['username']; ?></td>
                            <td><?php echo $topping['password']; ?></td>
                            <td><?php echo $topping['contact'] ?></td>
                            <td><?php echo $topping['alamat'] ?></td>
                            <td><?php echo $topping['email'] ?></td>
                            <td><?php echo $topping['image'] ?></td>
                            <td>
                                <a href="#"><button type="button" class="btn-edit mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a>
                                <a href="#"><button type="button" class="btn-hapus mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <!-- end: page -->
    </section>
    </div>

    <script>
        if (localStorage.status == undefined || localStorage.status == 3) {
            localStorage.setItem("status", 2);
        } else {
            localStorage.setItem("status", 3);
            window.location.reload();
        }
        $(document).ready(() => {
            $('.btn-edit').click(function() {
                let id = $(this).parent().parent().parent().children("#aidi").html();
                let edit = "Edit_Karyawan?id_staff=" + id;
                document.cookie = "id_staff=" + id;
                window.location.replace(edit);
            });
            $('.btn-hapus').click(function() {
                let id = $(this).parent().parent().parent().children("#aidi").html();
                document.cookie = "id_staff=" + id;
                document.cookie = "status=hapus";
                swal({
                        title: "Are you sure?",
                        text: "Your will not be able to recover this data!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function() {
                        swal("Deleted!", "Your data has been deleted.", "success");
                        window.location.replace('Hapus_Staff');
                    });
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>