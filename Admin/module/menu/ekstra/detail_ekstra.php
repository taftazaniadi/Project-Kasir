<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Ekstra</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Inventaris</span></li>
                <li><span>Ekstra</span></li>
                <li><span>Detail Ekstra</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_ekstra"];
    $tampil = mysqli_query($query, "SELECT ekstra.id_ekstra, ekstra.nama_ekstra, region.nama_region, ekstra.stock_awal, ekstra.penambahan, ekstra.total, ekstra.sisa, ekstra.satuan FROM ekstra JOIN region ON ekstra.id_region = region.id_region WHERE id_ekstra = '$id'");
    $data = mysqli_fetch_array($tampil);
    ?>

    <!-- start: page -->

    <div class="row">
        <div class="col-sm-offset-8">
            <div class="mb-md-edit">
                <a href="Edit_Topping?id_topping=<?php echo $id ?>"><button class="btn btn-warning">Edit &nbsp; <i class="fa fa-pencil"></i></button></a> &nbsp;
                <a href="Menu"><button class="btn btn-danger">Back &nbsp; <i class="fa fa-mail-reply-all"></i></button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Ekstra</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['id_ekstra'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Ekstra</label>
                        <div class="col-sm-9">
                            <input type="text" name="stock" class="form-control" value="<?php echo $data['nama_ekstra'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cabang</label>
                        <div class="col-sm-9">
                            <input type="text" name="stock" class="form-control" value="<?php echo $data['nama_region'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['stock_awal'] ?>" readonly />
                                <span class="input-group-addon btn-warning"><?php echo $data['satuan'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Penambahan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="stock" class="form-control" value="<?php echo $data['penambahan'] ?>" readonly />
                                <span class="input-group-addon btn-warning"><?php echo $data['satuan'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['total'] ?>" readonly />
                                <span class="input-group-addon btn-warning"><?php echo $data['satuan'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sisa Stock</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="stock" class="form-control" value="<?php echo $data['sisa'] ?>" readonly />
                                <span class="input-group-addon btn-warning"><?php echo $data['satuan'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>
</div>