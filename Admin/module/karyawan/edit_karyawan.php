<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Karyawan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Karyawan</span></li>
                <li><span>Edit Karyawan</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
    include "../lib/koneksi.php";
    $id = $_COOKIE["id_staff"];
    $tampil = mysqli_query($query, "SELECT * FROM staff WHERE id_staff = '$id'");
    $data = mysqli_fetch_array($tampil);
    ?>

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Edit Data Karyawan</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Staff</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_staff" class="form-control" value="<?php echo $id ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Karyawan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_staff" class="form-control" value="<?php echo $data['Nama'] ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="pass" class="form-control" value="<?php echo $data['password'] ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kontak</label>
                            <div class="col-sm-9">
                                <input type="text" name="kontak" class="form-control" value="<?php echo $data['contact'] ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textareaDefault">Alamat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat" rows="3" id="textareaDefault" required><?php echo $data['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-primary" name="kirim">Submit</button>
                                <button type="button" class="btn btn-default" onclick="window.location.href='Data_Karyawan'">Cancel</button>
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
    $id = $_POST['id_staff'];
    $nama_staff = $_POST['nama_staff'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //Image
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['image']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['image']['tmp_name'];

    if ($nama != NULL) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'upload/Staff/' . $nama);
            mysqli_query($query, "UPDATE staff SET Nama = '$nama_staff', username = '$username', password = '$password', contact = '$kontak', email = '$email', alamat = '$alamat', image = '$nama' WHERE id_staff = '$id'");
        }
    } else {
        mysqli_query($query, "UPDATE staff SET Nama = '$nama_staff', username = '$username', password = '$password', contact = '$kontak', email = '$email', alamat = '$alamat' WHERE id_staff = '$id'");
    }
    echo "
		<script type='text/javascript'>
			setTimeout(function () { 
				swal({
					title: 'Success',
					text:  'Data has been Added.',
					type: 'success',
					showConfirmButton: true
				});		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('Data_Karyawan');
			} ,3000);	
		</script>";
}
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>