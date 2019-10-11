<?php error_reporting(E_ALL ^ E_WARNING); ?>

<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script class="afx" src="assets/vendor/jquery/jquery.cookie.js"></script>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Penjadwalan Karyawan</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="Dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Karyawan</span></li>
				<li><span>Penjadwalan Karyawan</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<?php
	include "../lib/koneksi.php";
	$kueri = mysqli_query($query, "SELECT * FROM staff");
	?>

	<!-- start: page -->
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>
			<h2 class="panel-title">Pembagian Jadwal</h2>
		</header>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-md">
						<a href="#"><button class="tbl btn btn-warning">Update <i class="fa fa-pencil"></i></button></a> &nbsp;
						<a href="#"><button class="tbl btn btn-primary" disabled name="kirim">Save <i class="fa fa-floppy-o"></i></button></a> &nbsp;
						<a href="#"><button class="tbl btn btn-danger" disabled>Cancel <i class="fa fa-times"></i></button></a>
					</div>
				</div>
			</div>
			<table class="table table-striped mb-none">
				<thead>
					<tr>
						<th>#</th>
						<th>Jam Kerja</th>
						<th>Senin</th>
						<th>Selasa</th>
						<th>Rabu</th>
						<th>Kamis</th>
						<th>Jum'at</th>
						<th>Sabtu</th>
						<th>Minggu</th>
					</tr>
				</thead>
				<?php
				include "../lib/koneksi.php";
				$angka = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 1");
				$hasil = mysqli_fetch_array($angka, MYSQLI_ASSOC);
				$angka2 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 2");
				$hasil2 = mysqli_fetch_array($angka2, MYSQLI_ASSOC);
				$angka3 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 3");
				$hasil3 = mysqli_fetch_array($angka3, MYSQLI_ASSOC);
				$angka4 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 4");
				$hasil4 = mysqli_fetch_array($angka4, MYSQLI_ASSOC);
				$angka5 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 5");
				$hasil5 = mysqli_fetch_array($angka5, MYSQLI_ASSOC);
				$angka6 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 6");
				$hasil6 = mysqli_fetch_array($angka6, MYSQLI_ASSOC);
				$angka7 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 7");
				$hasil7 = mysqli_fetch_array($angka7, MYSQLI_ASSOC);
				$angka8 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 8");
				$hasil8 = mysqli_fetch_array($angka8, MYSQLI_ASSOC);
				$angka9 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 9");
				$hasil9 = mysqli_fetch_array($angka9, MYSQLI_ASSOC);
				$angka10 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 10");
				$hasil10 = mysqli_fetch_array($angka10, MYSQLI_ASSOC);
				$angka11 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 11");
				$hasil11 = mysqli_fetch_array($angka11, MYSQLI_ASSOC);
				$angka12 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 12");
				$hasil12 = mysqli_fetch_array($angka12, MYSQLI_ASSOC);
				$angka13 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 13");
				$hasil13 = mysqli_fetch_array($angka13, MYSQLI_ASSOC);
				$angka14 = mysqli_query($query, "SELECT j.id_jadwal, j.nama_shift, j.hari, s.id_staff, s.Nama FROM jadwal j JOIN staff s ON j.id_staff = s.id_staff WHERE j.id_jadwal = 14");
				$hasil14 = mysqli_fetch_array($angka14, MYSQLI_ASSOC);
				$tipe = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil[Nama]'");
				$tipe2 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil2[Nama]'");
				$tipe3 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil3[Nama]'");
				$tipe4 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil4[Nama]'");
				$tipe5 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil5[Nama]'");
				$tipe6 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil6[Nama]'");
				$tipe7 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil7[Nama]'");
				$tipe8 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil8[Nama]'");
				$tipe9 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil9[Nama]'");
				$tipe10 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil10[Nama]'");
				$tipe11 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil11[Nama]'");
				$tipe12 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil12[Nama]'");
				$tipe13 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil13[Nama]'");
				$tipe14 = mysqli_query($query, "SELECT * FROM staff WHERE Nama != '$hasil14[Nama]'");
				?>
				<tbody>
					<tr>
						<td>Shift 1</td>
						<td>08.00 - 16.00</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="senin1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil != NULL) {
										echo "<option value='" . $hasil['id_staff'] . "' selected>" .
											$hasil['Nama'] . "</option>";
										while ($a = mysqli_fetch_array($tipe, MYSQLI_ASSOC)) {
											echo "<option value='" . $a['id_staff'] . "' >" .
												$a['Nama'] . "</option>";
										}
									} else {
										while ($a = mysqli_fetch_array($tipe, MYSQLI_ASSOC)) {
											echo "<option value='" . $a['id_staff'] . "' >" .
												$a['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="selasa1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil2 != NULL) {
										echo "<option value='" . $hasil2['id_staff'] . "' selected>" .
											$hasil2['Nama'] . "</option>";
										while ($b = mysqli_fetch_array($tipe2, MYSQLI_ASSOC)) {
											echo "<option value='" . $b['id_staff'] . "' >" .
												$b['Nama'] . "</option>";
										}
									} else {
										while ($b = mysqli_fetch_array($tipe2, MYSQLI_ASSOC)) {
											echo "<option value='" . $b['id_staff'] . "' >" .
												$b['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="rabu1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil3 != NULL) {
										echo "<option value='" . $hasil3['id_staff'] . "' selected>" .
											$hasil3['Nama'] . "</option>";
										while ($d = mysqli_fetch_array($tipe3, MYSQLI_ASSOC)) {
											echo "<option value='" . $d['id_staff'] . "' >" .
												$d['Nama'] . "</option>";
										}
									} else {
										while ($d = mysqli_fetch_array($tipe3, MYSQLI_ASSOC)) {
											echo "<option value='" . $d['id_staff'] . "' >" .
												$d['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="kamis1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil4 != NULL) {
										echo "<option value='" . $hasil4['id_staff'] . "' selected>" .
											$hasil4['Nama'] . "</option>";
										while ($e = mysqli_fetch_array($tipe4, MYSQLI_ASSOC)) {
											echo "<option value='" . $e['id_staff'] . "' >" .
												$e['Nama'] . "</option>";
										}
									} else {
										while ($e = mysqli_fetch_array($tipe4, MYSQLI_ASSOC)) {
											echo "<option value='" . $e['id_staff'] . "' >" .
												$e['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="jumat1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil5 != NULL) {
										echo "<option value='" . $hasil5['id_staff'] . "' selected>" .
											$hasil5['Nama'] . "</option>";
										while ($f = mysqli_fetch_array($tipe5, MYSQLI_ASSOC)) {
											echo "<option value='" . $f['id_staff'] . "' >" .
												$f['Nama'] . "</option>";
										}
									} else {
										while ($f = mysqli_fetch_array($tipe5, MYSQLI_ASSOC)) {
											echo "<option value='" . $f['id_staff'] . "' >" .
												$f['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="sabtu1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil6 != NULL) {
										echo "<option value='" . $hasil6['id_staff'] . "' selected>" .
											$hasil6['Nama'] . "</option>";
										while ($g = mysqli_fetch_array($tipe6, MYSQLI_ASSOC)) {
											echo "<option value='" . $g['id_staff'] . "' >" .
												$g['Nama'] . "</option>";
										}
									} else {
										while ($g = mysqli_fetch_array($tipe6, MYSQLI_ASSOC)) {
											echo "<option value='" . $g['id_staff'] . "' >" .
												$g['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="minggu1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil7 != NULL) {
										echo "<option value='" . $hasil7['id_staff'] . "' selected>" .
											$hasil7['Nama'] . "</option>";
										while ($h = mysqli_fetch_array($tipe7, MYSQLI_ASSOC)) {
											echo "<option value='" . $h['id_staff'] . "' >" .
												$h['Nama'] . "</option>";
										}
									} else {
										while ($h = mysqli_fetch_array($tipe7, MYSQLI_ASSOC)) {
											echo "<option value='" . $h['id_staff'] . "' >" .
												$h['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Shift 2</td>
						<td>16.00 - 22.00</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" name="senin2" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil8 != NULL) {
										echo "<option value='" . $hasil8['id_staff'] . "' selected>" .
											$hasil8['Nama'] . "</option>";
										while ($i = mysqli_fetch_array($tipe8, MYSQLI_ASSOC)) {
											echo "<option value='" . $i['id_staff'] . "' >" .
												$i['Nama'] . "</option>";
										}
									} else {
										while ($i = mysqli_fetch_array($tipe8, MYSQLI_ASSOC)) {
											echo "<option value='" . $i['id_staff'] . "' >" .
												$i['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil9 != NULL) {
										echo "<option value='" . $hasil9['id_staff'] . "' selected>" .
											$hasil9['Nama'] . "</option>";
										while ($j = mysqli_fetch_array($tipe9, MYSQLI_ASSOC)) {
											echo "<option value='" . $j['id_staff'] . "' >" .
												$j['Nama'] . "</option>";
										}
									} else {
										while ($j = mysqli_fetch_array($tipe9, MYSQLI_ASSOC)) {
											echo "<option value='" . $j['id_staff'] . "' >" .
												$j['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil10 != NULL) {
										echo "<option value='" . $hasil10['id_staff'] . "' selected>" .
											$hasil10['Nama'] . "</option>";
										while ($k = mysqli_fetch_array($tipe10, MYSQLI_ASSOC)) {
											echo "<option value='" . $k['id_staff'] . "' >" .
												$k['Nama'] . "</option>";
										}
									} else {
										while ($k = mysqli_fetch_array($tipe10, MYSQLI_ASSOC)) {
											echo "<option value='" . $k['id_staff'] . "' >" .
												$k['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil11 != NULL) {
										echo "<option value='" . $hasil11['id_staff'] . "' selected>" .
											$hasil11['Nama'] . "</option>";
										while ($l = mysqli_fetch_array($tipe11, MYSQLI_ASSOC)) {
											echo "<option value='" . $l['id_staff'] . "' >" .
												$l['Nama'] . "</option>";
										}
									} else {
										while ($l = mysqli_fetch_array($tipe11, MYSQLI_ASSOC)) {
											echo "<option value='" . $l['id_staff'] . "' >" .
												$l['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil12 != NULL) {
										echo "<option value='" . $hasil12['id_staff'] . "' selected>" .
											$hasil12['Nama'] . "</option>";
										while ($m = mysqli_fetch_array($tipe12, MYSQLI_ASSOC)) {
											echo "<option value='" . $m['id_staff'] . "' >" .
												$m['Nama'] . "</option>";
										}
									} else {
										while ($m = mysqli_fetch_array($tipe12, MYSQLI_ASSOC)) {
											echo "<option value='" . $m['id_staff'] . "' >" .
												$m['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil13 != NULL) {
										echo "<option value='" . $hasil13['id_staff'] . "' selected>" .
											$hasil13['Nama'] . "</option>";
										while ($n = mysqli_fetch_array($tipe13, MYSQLI_ASSOC)) {
											echo "<option value='" . $n['id_staff'] . "' >" .
												$n['Nama'] . "</option>";
										}
									} else {
										while ($n = mysqli_fetch_array($tipe13, MYSQLI_ASSOC)) {
											echo "<option value='" . $n['id_staff'] . "' >" .
												$n['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<select class="aktif form-control" data-plugin-multiselect id="ms_example1" disabled>
									<option value="NULL"> - </option>
									<?php
									if ($hasil14 != NULL) {
										echo "<option value='" . $hasil14['id_staff'] . "' selected>" .
											$hasil14['Nama'] . "</option>";
										while ($i = mysqli_fetch_array($tipe14, MYSQLI_ASSOC)) {
											echo "<option value='" . $i['id_staff'] . "' >" .
												$i['Nama'] . "</option>";
										}
									} else {
										while ($i = mysqli_fetch_array($tipe14, MYSQLI_ASSOC)) {
											echo "<option value='" . $i['id_staff'] . "' >" .
												$i['Nama'] . "</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>
			<h2 class="panel-title">Jadwal Karyawan</h2>
		</header>
		<div class="panel-body">
			<table class="table table-striped mb-none">
				<thead>
					<tr>
						<th>#</th>
						<th>Jam Kerja</th>
						<th>Senin</th>
						<th>Selasa</th>
						<th>Rabu</th>
						<th>Kamis</th>
						<th>Jum'at</th>
						<th>Sabtu</th>
						<th>Minggu</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Shift 1</td>
						<td>08.00 - 16.00</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil2['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil2['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil3['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil3['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil4['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil4['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil5['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil5['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil6['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil6['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil7['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil7['Nama'];
								}
								?>
							</div>
						</td>
					</tr>
					<tr>
						<td>Shift 2</td>
						<td>16.00 - 22.00</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil8['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil8['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil9['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil9['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil10['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil10['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil11['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil11['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil12['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil12['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil13['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil13['Nama'];
								}
								?>
							</div>
						</td>
						<td>
							<div class="col-sm">
								<?php
								if ($hasil14['Nama'] == NULL) {
									echo "-";
								} else {
									echo $hasil14['Nama'];
								}
								?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
	<!-- end: page -->
</section>
</div>

<aside id="sidebar-right" class="sidebar-right">

	</section>

	<script>
		document.cookie = "state=standby;";

		$(".tbl:eq(0)").click(() => {
			$(".tbl").slice(1, 3).removeAttr("disabled");
			$(".tbl:eq(0)").attr("disabled", "true");
			$(".btn.disabled").removeAttr("disabled");
			$(".btn.disabled").removeClass("disabled");
		});
		$(".tbl:eq(1)").click(() => {
			$(".tbl:eq(0)").removeAttr("disabled");
			$(".tbl:eq(1)").attr("disabled", "true");
			$(".tbl:eq(2)").attr("disabled", "true");
			$(".btn.dropdown-toggle").attr("disabled");
			$(".btn.dropdown-toggle").addClass("disabled");
			let nama1 = $('tr:eq(1)').children('td:eq(2)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama2 = $('tr:eq(1)').children('td:eq(3)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama3 = $('tr:eq(1)').children('td:eq(4)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama4 = $('tr:eq(1)').children('td:eq(5)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama5 = $('tr:eq(1)').children('td:eq(6)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama6 = $('tr:eq(1)').children('td:eq(7)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama7 = $('tr:eq(1)').children('td:eq(8)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama8 = $('tr:eq(2)').children('td:eq(2)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama9 = $('tr:eq(2)').children('td:eq(3)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama10 = $('tr:eq(2)').children('td:eq(4)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama11 = $('tr:eq(2)').children('td:eq(5)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama12 = $('tr:eq(2)').children('td:eq(6)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama13 = $('tr:eq(2)').children('td:eq(7)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			let nama14 = $('tr:eq(2)').children('td:eq(8)').children().children().children('ul').children('li[class=active]').children().children().children().val();
			document.cookie = "k1=" + nama1 + ";";
			document.cookie = "k2=" + nama2 + ";";
			document.cookie = "k3=" + nama3 + ";";
			document.cookie = "k4=" + nama4 + ";";
			document.cookie = "k5=" + nama5 + ";";
			document.cookie = "k6=" + nama6 + ";";
			document.cookie = "k7=" + nama7 + ";";
			document.cookie = "k8=" + nama8 + ";";
			document.cookie = "k9=" + nama9 + ";";
			document.cookie = "k10=" + nama10 + ";";
			document.cookie = "k11=" + nama11 + ";";
			document.cookie = "k12=" + nama12 + ";";
			document.cookie = "k13=" + nama13 + ";";
			document.cookie = "k14=" + nama14 + ";";
			document.cookie = "state=input";
			location.reload();
		});
		$(".tbl:eq(2)").click(() => {
			$(".select option:first-child").attr("selected", "selected");
			$(".tbl:eq(0)").removeAttr("disabled");
			$(".tbl:eq(1)").attr("disabled", "true");
			$(".tbl:eq(2)").attr("disabled", "true");
			$(".btn.dropdown-toggle").attr("disabled");
			$(".btn.dropdown-toggle").addClass("disabled");
			document.cookie = "state=standby;";
			location.reload();
		});
	</script>

	<?php
		if(isset($_COOKIE[state])){
			$status = $_COOKIE[state];

			if ($status == "input") {
				$satu = ($_COOKIE[k1] != "NULL" ? "'" . $_COOKIE[k1] . "'" : $_COOKIE[k1]);
				$dua = ($_COOKIE[k2] != "NULL" ? "'" . $_COOKIE[k2] . "'" : $_COOKIE[k2]);
				$tiga = ($_COOKIE[k3] != "NULL" ? "'" . $_COOKIE[k3] . "'" : $_COOKIE[k3]);
				$empat = ($_COOKIE[k4] != "NULL" ? "'" . $_COOKIE[k4] . "'" : $_COOKIE[k4]);
				$lima = ($_COOKIE[k5] != "NULL" ? "'" . $_COOKIE[k5] . "'" : $_COOKIE[k5]);
				$enam = ($_COOKIE[k6] != "NULL" ? "'" . $_COOKIE[k6] . "'" : $_COOKIE[k6]);
				$tuju = ($_COOKIE[k7] != "NULL" ? "'" . $_COOKIE[k7] . "'" : $_COOKIE[k7]);
				$lapan = ($_COOKIE[k8] != "NULL" ? "'" . $_COOKIE[k8] . "'" : $_COOKIE[k8]);
				$sembilan = ($_COOKIE[k9] != "NULL" ? "'" . $_COOKIE[k9] . "'" : $_COOKIE[k9]);
				$puluh = ($_COOKIE[k10] != "NULL" ? "'" . $_COOKIE[k10] . "'" : $_COOKIE[k10]);
				$sebel = ($_COOKIE[k11] != "NULL" ? "'" . $_COOKIE[k11] . "'" : $_COOKIE[k11]);
				$duabel = ($_COOKIE[k12] != "NULL" ? "'" . $_COOKIE[k12] . "'" : $_COOKIE[k12]);
				$tigabel = ($_COOKIE[k13] != "NULL" ? "'" . $_COOKIE[k13] . "'" : $_COOKIE[k13]);
				$empatbel = ($_COOKIE[k14] != "NULL" ? "'" . $_COOKIE[k14] . "'" : $_COOKIE[k14]);
				$input = mysqli_query($query, "UPDATE jadwal SET id_staff = CASE id_jadwal WHEN 1 THEN $satu WHEN 2 THEN $dua WHEN 3 THEN $tiga WHEN 4 THEN $empat WHEN 5 THEN $lima WHEN 6 THEN $enam WHEN 7 THEN $tuju WHEN 8 THEN $lapan WHEN 9 THEN $sembilan WHEN 10 THEN $puluh WHEN 11 THEN $sebel WHEN 12 THEN $duabel WHEN 13 THEN $tigabel WHEN 14 THEN $empatbel ELSE NULL END WHERE id_jadwal IN(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14)");
				echo "<script>document.cookie='state=standby'</script>";
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
								window.location.reload();
							} ,3000);	
				  		</script>";
			} else {
				echo "<script>console.log(document.cookie)</script>";
			}
		}
		
		
	?>