<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Discount</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Discount</span></li>
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

            <h2 class="panel-title">Discount</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <a href="Add_Discount"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
                    </div>
                </div>
            </div>

            <table class="table table-striped mb-none" id="datatable-default" method="GET">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Discount</th>
                        <th> = </th>
                        <th>Total Belanja</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../lib/koneksi.php";
                    $kueriTopping = mysqli_query($query, "SELECT * FROM diskon ");
                    for ($z = 1; $z <= $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC); $z++) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $z ?></td>
                            <td style="display:none;" id="aidi"><?php echo $topping['id_diskon']; ?></td>
                            <td><?php echo $topping['total_diskon']; ?></td>
                            <td> > </td>
                            <td><?php echo $topping = 'Rp ' . number_format($topping['min_pembelian'], '0', ',', '.'); ?></td>
                            <td>
                                <a href="#"><button type="button" class="btn-edit mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a>
                                <a href="#"><button type="button" class="btn-hapus mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </section>
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
            let edit = "Edit_Discount?id_diskon=" + id;
            document.cookie = "id_diskon=" + id;
            window.location.replace(edit);
            console.log(id);
        });
        $('.btn-hapus').click(function() {
            let id = $(this).parent().parent().parent().children("#aidi").html();
            document.cookie = "id_diskon=" + id;
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
                    <?php
                    if (isset($_COOKIE['id_diskon']) && isset($_COOKIE['status'])) {
                        $id = $_COOKIE["id_diskon"];
                        $status = $_COOKIE["status"];
                        if ($status == "hapus") {
                            $hapus = mysqli_query($query, "DELETE FROM diskon WHERE id_diskon = '$id'");
                            echo "document.cookie='status=standby';";
                        }
                    }
                    ?>
                    swal("Deleted!", "Your data has been deleted.", "success");
                    window.location.reload();
                });
        });
    })
</script>