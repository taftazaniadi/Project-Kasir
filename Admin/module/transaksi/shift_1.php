<?php error_reporting(E_ALL ^ E_WARNING); ?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Total Transaksi</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="Dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Transaksi</span></li>
				<li><span>Shift 1</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>

			<h2 class="panel-title">Transaksi Shift 1</h2>
		</header>
		<div class="panel-body">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) { ?>

					<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
						<a href="#tab1-<?php echo $serves['id_region'] ?>" aria-controls="#tab-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
					</li>
				<?php } ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) {
					?>

					<div role="tabpanel" <?php if ($count == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab1-<?php echo $serves['id_region'] ?>">
						<table id="example1-tab1-dt" class="table table-striped table-condensed display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Karyawan</th>
									<th>Nama Pembeli</th>
									<th>Tanggal</th>
									<th>Waktu</th>
									<th>Nama Menu</th>
									<th>Sajian</th>
									<th>Nama Topping</th>
									<th>Harga</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "../lib/koneksi.php";
									$currentDate = date('Y/m/d');
									$hasil = mysqli_query($query, "SELECT dt.no_nota, s.Nama, j.tanggal, j.waktu, j.nama_pembeli, p.nama_powder, sj.nama_penyajian, t.nama_topping, dt.jumlah, j.status 
												   FROM detail_transaksi dt
												   JOIN jual j ON dt.no_nota = j.no_nota
												   JOIN staff s ON s.id_staff = j.id_staff
												   JOIN powder p ON p.id_powder = dt.id_powder
												   LEFT JOIN penyajian sj ON sj.id_penyajian = dt.id_penyajian
												   LEFT JOIN topping t ON t.id_topping = dt.id_topping
												   WHERE (j.tanggal = '$currentDate') AND (j.waktu BETWEEN '08:00:00' AND '16:00:00') AND dt.id_region = " . $serves['id_region']);
									for ($i = 1; $i <= $out = mysqli_fetch_array($hasil); $i++) {
										?>
									<tr class="gradeX">
										<td><?php echo $i ?></td>
										<td><?php echo $out['Nama']; ?></td>
										<td><?php echo $out['nama_pembeli']; ?></td>
										<td><?php echo $out['tanggal']; ?></td>
										<td><?php echo $out['waktu']; ?></td>
										<td><?php echo $out['nama_powder']; ?></td>
										<td>
											<?php
													if ($out['nama_penyajian'] == NULL) {
														echo "--";
													} else {
														echo $out['nama_penyajian'];
													}
													?>
										</td>
										<td>
											<?php
													if ($out['nama_topping'] == NULL) {
														echo "--";
													} else {
														echo $out['nama_topping'];
													}
													?>
										</td>
										<td><?php echo $out['jumlah']; ?>
										<td>
											<?php
													if ($out['status'] == "Success") {
														echo '<span class="label label-success">Success</span>';
													} else {
														echo '<span class="label label-warning">Process</span>';
													}
													?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
	</section>
	<!-- end: page -->
</section>
</div>

<script>
	$(document).ready(function() {
		$('table.display').DataTable();
	});
</script>