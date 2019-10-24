<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Menu</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Inventaris</span></li>
                <li><span>Menu</span></li>
                <li><span>Detail Menu</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_powder"];
    $tampil = mysqli_query($query, "SELECT p.id_powder, j.id_jenis, j.nama_jenis, p.nama_powder, detail_penyajian.harga, detail_penyajian.id_region, p.stock_awal, p.penambahan, p.total, p.sisa, s.id_penyajian, s.nama_penyajian, region.nama_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region ON region.id_region = detail_penyajian.id_region WHERE p.id_powder = '$id' ORDER BY p.id_powder");
    $data = mysqli_fetch_array($tampil);
    ?>

    <!-- start: page -->

    <div class="row">
        <div class="col-sm-offset-8">
            <div class="mb-md-edit">
                <a href="Edit_Menu?id_powder=<?php echo $id ?>"><button class="btn btn-warning">Edit &nbsp; <i class="fa fa-pencil"></i></button></a> &nbsp;
                <a href="Menu"><button class="btn btn-danger">Back &nbsp; <i class="fa fa-mail-reply-all"></i></button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">ID Powder</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['id_powder'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Powder</label>
                        <div class="col-sm-8">
                            <input type="text" name="stock" class="form-control" value="<?php echo $data['nama_jenis'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Powder</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['nama_powder'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Cabang</label>
                        <div class="col-sm-8">
                            <input type="text" name="stock" class="form-control" value="<?php echo $data['nama_region'] ?>" readonly />
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['stock_awal'] ?>" readonly />
                                <span class="input-group-addon btn-warning">Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Penambahan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="stock" class="form-control" value="<?php echo $data['penambahan'] ?>" readonly />
                                <span class="input-group-addon btn-warning">Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['total'] ?>" readonly />
                                <span class="input-group-addon btn-warning">Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sisa Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="stock" class="form-control" value="<?php echo $data['sisa'] ?>" readonly />
                                <span class="input-group-addon btn-warning">Pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>
            <h2 class="panel-title">Detail Penyajian</h2>
        </header>
        <div class="panel-body">
            <table class="table table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th class="col-lg-1">ID Penyajian</th>
                        <th class="col-lg-2">Nama Penyajian</th>
                        <th class="col-lg-1">Harga</th>
                        <th class="col-lg-1">Actions</th>

                    </tr>
                </thead>
                <tbody class='dafuk'>
                    <?php
                    include "../lib/koneksi.php";
                    // $id = $_COOKIE["id_powder"];
                    $kueriStaff = mysqli_query($query, "SELECT p.id_powder, j.id_jenis, j.nama_jenis, p.nama_powder, detail_penyajian.harga, detail_penyajian.id_region, p.stock_awal, p.penambahan, p.total, p.sisa, s.id_penyajian, s.nama_penyajian, region.nama_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region ON region.id_region = detail_penyajian.id_region WHERE p.id_powder = '$id' ORDER BY p.id_powder");
                    while ($staff = mysqli_fetch_assoc($kueriStaff)) {
                        ?>
                        <tr class="gradeX">
                            <td class='aidi' id="aidi"><?php echo $staff['id_penyajian'] ?></td>
                            <td id="saji"><?php echo $staff['nama_penyajian'] ?></td>
                            <td id="region"><?php echo $staff = 'Rp ' . number_format($staff['harga'], '0', ',', '.'); ?></td>
                            <td>
                                <a href="#"><button type="button" class="btn-hapus-menu mb-xs mt-xs mr-xs btn btn-xs btn-danger">Hapus &nbsp;<i class="fa fa-trash-o"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
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
        $('.btn-hapus-menu').click(function() {
            let id = $(this).parent().parent().parent().children("#aidi").html();
            let saji = $(this).parent().parent().parent().children("#saji").html();
            let region = $(this).parent().parent().parent().children("#region").html();
            document.cookie = "id_powder=" + id;
            document.cookie = "id_penyajian=" + saji;
            document.cookie = "id_region=" + region;
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
                    window.location.replace("Hapus_Menu")
                });
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>