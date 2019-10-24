<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Topping</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Inventaris</span></li>
                <li><span>Topping</span></li>
                <li><span>Detail Topping</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_topping"];
    $tampil = mysqli_query($query, "SELECT topping.id_topping, topping.nama_topping, topping.harga, topping.stock_awal, topping.penambahan, topping.total, topping.sisa, region.nama_region FROM topping JOIN region ON topping.id_region = region.id_region WHERE id_topping = '$id'");
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
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">ID Topping</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['id_topping'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Topping</label>
                        <div class="col-sm-8">
                            <input type="text" name="stock" class="form-control" value="<?php echo $data['nama_topping'] ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_menu" class="form-control" value="<?php echo 'Rp ' . number_format($data['harga'], '0', ',', '.'); ?>" readonly />
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
</section>
</div>