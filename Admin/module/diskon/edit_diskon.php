<section role="main" class="content-body">
    <header class="page-header">
        <h2>Edit Discount</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Discount</span></li>
                <li><span>Edit Discount</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_diskon"];
    $kueriTopping = mysqli_query($query, "SELECT * FROM diskon WHERE id_diskon = $id");
    $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC);
    ?>
    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form" action="#" class="form-horizontal" method="POST">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Edit Discount</h2>
                    </header>
                    <div class="panel-body">
                        <input type="hidden" name="id_topping" value="<?php echo $topping['id_diskon']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Discount</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="nama_diskon" class="form-control" value="<?php echo $topping['total_diskon'] ?>" disabled />
                                    <span class="input-group-addon btn-success">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Minimal Pembelian</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon btn-success">Rp </span>
                                    <input type="text" name="min_pembelian" class="form-control" value="<?php echo $topping['min_pembelian'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-primary" name="kirim">Submit</button>
                                <button type="button" class="btn btn-default" onclick="window.location.href='Discount'">Cancel</button>
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
    $nama = $_POST['nama_diskon'];
    $min = $_POST['min_pembelian'];
    $queryTambah = mysqli_query($query, "UPDATE diskon SET total_diskon = '$nama', min_pembelian = '$min' WHERE id_diskon = '$id'");
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
							window.location.replace('Discount');
						} ,3000);
						document.cookie='status=standby'	
					  </script>";
}
?>