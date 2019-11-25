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
    $id = $_COOKIE["id_varian"];
    $tampil = $query->query("SELECT v.id_varian, v.nama_varian, r.nama_region, v.stok_awal, v.penambahan, v.total, v.sisa
                             FROM varian_powder v
                             JOIN region r ON r.id_region = v.id_region
                             WHERE v.id_varian = '$id'");
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
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['id_varian'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Powder</label>
                        <div class="col-sm-8">
                            <input type="text" name="stock" class="form-control" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Powder</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['nama_varian'] ?>" readonly />
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
                                <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['stok_awal'] ?>" readonly />
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
                        <th class="col-lg-1">#</th>
                        <th class="col-lg-1">Nama Menu</th>
                        <th class="col-lg-1">Nama Penyajian</th>
                        <th class="col-lg-1">Harga</th>
                        <th class="col-lg-1">Actions</th>

                    </tr>
                </thead>
                <tbody class='dafuk'>
                    <?php
                    $kueriStaff = $query->query("SELECT v.id_varian, v.nama_varian, p.id_powder, p.nama_powder, j.id_penyajian, j.nama_penyajian, sj.harga
                                                 FROM powder p
                                                 JOIN varian_powder v ON p.id_varian = v.id_varian
                                                 JOIN detail_penyajian sj ON p.id_powder = sj.id_powder
                                                 JOIN penyajian j ON j.id_penyajian = sj.id_penyajian
                                                 WHERE v.id_varian = '$id'");
                    for($z = 1; $z <= $data = mysqli_fetch_array($kueriStaff); $z++) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $z; ?></td>
                            <td style="display:none;" id="aidi"><?php echo $data['id_powder'];?></td>
                            <td style="display:none;" class='aidi' id="aidi_saji"><?php echo $data['id_penyajian'] ?></td>
                            <td><?php echo $data['nama_powder']?></td>
                            <td id="saji"><?php echo $data['nama_penyajian'] ?></td>
                            <td id="region"><?php echo $data = 'Rp ' . number_format($data['harga'], '0', ',', '.'); ?></td>
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
            let saji = $(this).parent().parent().parent().children("#aidi_saji").html();
            document.cookie = "id_powder=" + id;
            document.cookie = "id_penyajian=" + saji;
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