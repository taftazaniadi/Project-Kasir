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
                <li><span>Tambah Karyawan</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
    include "../lib/koneksi.php";
    //cari id terakhir ditanggal hari ini
    $query1 = "SELECT MAX(id_staff) as maxID FROM staff";
    $hasil = mysqli_query($query, $query1);
    $data = mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
    $NoUrut = (int) substr($idMax, 1, 4); // ambil 4 digit dimulai dari index ke 8
    $NoUrut++; //nomor urut +1

    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = sprintf('S%04s', $NoUrut);

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

                        <h2 class="panel-title">Input Data Karyawan</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Staff</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_staff" class="form-control" value="<?php echo $NewID ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Karyawan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_staff" class="form-control" placeholder="eg.: Ikbal" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" placeholder="eg.: m_ikbal" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="pass" class="form-control" placeholder="eg.: 123456" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kontak</label>
                            <div class="col-sm-9">
                                <input type="text" name="kontak" class="form-control" placeholder="eg.: 085312345678" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" placeholder="eg.: google@gmail.com" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" cols="92" rows="3" placeholder="eg.: Jl. Ringroad Utara" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" required />
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
            mysqli_query($query, "INSERT INTO staff(id_staff, Nama, username, password, contact, email, alamat, image) VALUES ('$id', '$nama_staff', '$username', '$password', '$kontak', '$email', '$alamat', '$nama')");
        }
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