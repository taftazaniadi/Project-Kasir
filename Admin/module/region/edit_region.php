<section role="main" class="content-body">
    <header class="page-header">
        <h2>Edit Cabang</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Inventaris</span></li>
                <li><span>Region</span></li>
                <li><span>Edit Cabang</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_region"];
    $kueriTopping = mysqli_query($query, "SELECT * FROM region WHERE id_region = $id");
    $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC);
    ?>
    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form" action="#" class="form-horizontal" method="POST" action="">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Edit Data Cabang</h2>
                    </header>
                    <div class="panel-body">
                        <input type="hidden" name="id_topping" value="<?php echo $topping['id_topping']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Cabang</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_cabang" class="form-control" value="<?php echo $topping['nama_region'] ?>" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" value="<?php echo $topping['alamat'] ?>" />
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-primary" name="kirim">Submit</button>
                                <button type="button" class="btn btn-default" onclick="window.location.href='Region'">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </form>
        </div>
    </div>
    <!-- end: page -->
</section>
</div>

<?php
if (isset($_POST["kirim"])) {
    $nama = $_POST['nama_region'];
    $alamat = $_POST['alamat'];
    $queryTambah = mysqli_query($query, "UPDATE region SET nama_region = '$nama', alamat = '$alamat' WHERE id_region = '$id'");
    echo "
					<script type='text/javascript'>
						setTimeout(function () { 
							swal({
								title: 'Success',
								text:  'Data has been Updated.',
								type: 'success',
								showConfirmButton: true
							});		
						},10);	
						window.setTimeout(function(){ 
							window.location.replace('Region');
						} ,3000);
						document.cookie='status=standby'	
					  </script>";
}
?>