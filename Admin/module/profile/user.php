<section role="main" class="content-body">
	<header class="page-header">
		<h2>User Profile</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="admin.php?module='dashboard'">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>User Profile</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
	<?php
	include "../lib/koneksi.php";
	$hitung = mysqli_query($query, "SELECT COUNT(nama) FROM staff");
	$angka = mysqli_fetch_array($hitung);
	$total = $angka[0];
	?>
	<div class="row">
		<div class="col-md-4 col-lg-3">
			<?php
			include "../lib/koneksi.php";
			$kueriAdmin = mysqli_query($query, "SELECT * FROM Admin LIMIT 1");
			while ($admin = mysqli_fetch_assoc($kueriAdmin)) {
				?>
				<section class="panel">
					<div class="panel-body">
						<div class="thumb-info mb-md">
							<img src="<?php echo "upload/" . $admin['image']; ?>" class="rounded img-responsive" />
							<div class="thumb-info-title">
								<span class="thumb-info-inner"><?php echo $admin['first_name'] ?></span>
								<span class="thumb-info-type">CEO</span>
							</div>
						</div>

						<hr class="dotted short">

						<h6 class="text-muted">About</h6>
						<p><?php echo $admin['bio'] ?></p>

						<hr class="dotted short">

						<div class="social-icons-list">
							<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
							<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
							<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
						</div>

					</div>
				</section>

		</div>
		<div class="col-md-8 col-lg-6">

			<div class="tabs tab-content">
				<form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
					<h4 class="mb-xlg">Personal Information</h4>
					<fieldset>
						<input type="hidden" class="form-control" value="<?php echo $admin['id_admin'] ?>" name="id_admin">
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileFirstName">First Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['first_name'] ?>" name="first_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">Last Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['last_name'] ?>" name="last_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">Username</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['username'] ?>" name="username">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">Contact</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['contact'] ?>" name="kontak">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileAddress">Address</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['alamat'] ?>" name="alamat">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">Email</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?php echo $admin['email'] ?>" name="email">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">Picture</label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="pict" id="pict" accept=".png,.jpg">
							</div>
						</div>
					</fieldset>
					<hr class="dotted tall">
					<h4 class="mb-xlg">About Yourself</h4>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
							<div class="col-md-8">
								<textarea class="form-control" rows="3" name="bio"><?php echo $admin['bio'] ?></textarea>
							</div>
						</div>
					</fieldset>
					<hr class="dotted tall">
					<h4 class="mb-xlg">Change Password</h4>
					<fieldset class="mb-xl">
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
							<div class="col-md-8">
								<input type="password" class="form-control" name="new">
							</div>
						</div>
					</fieldset>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" class="btn btn-primary" name="kirim">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
		<div class="col-md-12 col-lg-3">
		<?php
		} ?>

		<?php
		include "../lib/koneksi.php";

		$currentDate = date('Y/m/d');

		$order = mysqli_query($query, "SELECT COUNT(*) FROM jual WHERE tanggal = '$currentDate'");
		$out = mysqli_fetch_array($order);
		$order2 = $out[0];

		$profit = mysqli_query($query, "SELECT SUM(total) FROM jual");
		$fit = mysqli_fetch_array($profit);
		$profit2 = $fit[0];

		function formatRupiah($profit2)
		{
			if (is_numeric($profit2)) {
				$format_rupiah = 'Rp ' . number_format($profit2, '2', ',', '.');
				return $format_rupiah;
			} else {
				echo "Rp 0";
			}
		}
		?>
		<h4 class="mb-md">Sale Stats</h4>
		<ul class="simple-card-list mb-xlg">
			<li class="primary">
				<h3><?php echo $order2; ?></h3>
				<p>Jumlah Orderan Hari Ini</p>
			</li>
			<li class="primary">
				<h3><?php echo formatRupiah($profit2); ?></h3>
				<p>Penghasilan</p>
			</li>
			<li class="primary">
				<h3><?php echo $total ?></h3>
				<p>Jumlah Karyawan</p>
			</li>
		</ul>
		</div>
	</div>
	<!-- end: page -->
</section>
</div>

<?php
if (isset($_POST["kirim"])) {
	$pass = $_POST['new'];

	$ekstensi_diperbolehkan	= array('png', 'jpg');
	$nama = $_FILES['pict']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['pict']['tmp_name'];

	if ($pass == NULL && $nama == NULL) {
		mysqli_query($query, "UPDATE admin SET username = '$_POST[username]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', alamat = '$_POST[alamat]', contact = '$_POST[kontak]', bio = '$_POST[bio]', email = '$_POST[email]', WHERE id_admin = '$_POST[id_admin]'");
	} else if ($pass == NULL && $nama != NULL) {
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'upload/' . $nama);
			mysqli_query($query, "UPDATE admin SET username = '$_POST[username]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', alamat = '$_POST[alamat]', contact = '$_POST[kontak]', bio = '$_POST[bio]', email = '$_POST[email]', image='$nama' WHERE id_admin = '$_POST[id_admin]'");
		}
	} else if ($pass != NULL && $nama == NULL) {
		mysqli_query($query, "UPDATE admin SET username = '$_POST[username]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', password = '$_POST[new]', alamat = '$_POST[alamat]', contact = '$_POST[kontak]', bio = '$_POST[bio]', email = '$_POST[email]' WHERE id_admin = '$_POST[id_admin]'");
	} else {
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'upload/' . $nama);
			mysqli_query($query, "UPDATE admin SET username = '$_POST[username]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', password = '$_POST[new]', alamat = '$_POST[alamat]', contact = '$_POST[kontak]', bio = '$_POST[bio]', email = '$_POST[email]', image='$nama' WHERE id_admin = '$_POST[id_admin]'");
		}
	}


	echo "
		<script type='text/javascript'>
			setTimeout(function () { 
				swal({
					title: 'Success',
					text:  'Data has been updated.',
					type: 'success',
					showConfirmButton: true
				});		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('Profile');
			} ,3000);	
		</script>";
}
?>