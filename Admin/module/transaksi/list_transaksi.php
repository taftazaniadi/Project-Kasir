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
				<li><span>Total Transaksi</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<?php
	include "../lib/koneksi.php";

	$currentDate = date('Y/m/d');

	$jumlah1 = mysqli_query($query, "SELECT COUNT(*) FROM detail_transaksi dt JOIN jual j ON dt.no_nota = j.no_nota WHERE (j.tanggal = '$currentDate') AND (j.waktu BETWEEN '08:00:00' AND '16:00:00')");
	$out_jumlah = mysqli_fetch_array($jumlah1);
	$jumlah = $out_jumlah[0];

	$omset1 = mysqli_query($query, "SELECT SUM(total) FROM jual j WHERE (j.tanggal = '$currentDate') AND (j.waktu BETWEEN '08:00:00' AND '16:00:00') AND (status = 'Success')");
	$out_omset = mysqli_fetch_array($omset1);
	$omset = $out_omset[0];

	$omsets2 = mysqli_query($query, "SELECT SUM(total) FROM jual j WHERE (j.tanggal = '$currentDate') AND (j.waktu BETWEEN '16:00:00' AND '22:00:00') AND (status = 'Success')");
	$out_omset2 = mysqli_fetch_array($omsets2);
	$omset2 = $out_omset2[0];

	$total1 = mysqli_query($query, "SELECT SUM(total) FROM jual j WHERE (j.tanggal = '$currentDate') AND (status = 'Success')");
	$out_total = mysqli_fetch_array($total1);
	$total = $out_total[0];

	function formatRupiah1($omset)
	{
		if (is_numeric($omset)) {
			$format_rupiah = 'Rp ' . number_format($omset, '0', ',', '.');
			return $format_rupiah;
		} else {
			echo "Rp 0";
		}
	}

	function formatRupiah2($omset2)
	{
		if (is_numeric($omset2)) {
			$format_rupiah = 'Rp ' . number_format($omset2, '2', ',', '.');
			return $format_rupiah;
		} else {
			echo "Rp 0";
		}
	}

	function formatRupiah3($total)
	{
		if (is_numeric($total)) {
			$format_rupiah = 'Rp ' . number_format($total, '2', ',', '.');
			return $format_rupiah;
		} else {
			echo "Rp 0";
		}
	}
	?>

	<div class="row">
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-shopping-cart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Total Penjualan</h4>
								<div class="info">
									<strong class="amount"><?php echo $jumlah ?></strong>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase">(view all)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-quartenary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-quartenary">
								<i class="fa fa-money"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Total Omset</h4>
								<div class="info">
									<strong class="amount"><?php echo formatRupiah3($total); ?></strong>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase" href="Data_Karyawan">(view all)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-secondary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-secondary">
								<i class="fa fa-shopping-cart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Omset Shift 1</h4>
								<div class="info">
									<strong class="amount">
										<?php echo formatRupiah1($omset); ?>
									</strong>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase">(view all)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-6">
			<section class="panel panel-featured-left panel-featured-tertiary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-tertiary">
								<i class="fa fa-shopping-cart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Omset Shift 2</h4>
								<div class="info">
									<strong class="amount">
										<?php echo formatRupiah2($omset2); ?>
									</strong>
								</div>
							</div>
							<div class="summary-footer">
								<a class="text-muted text-uppercase" href="List_Transaksi">(view all)</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>

			<h2 class="panel-title">Total Transaksi</h2>
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
												   WHERE dt.id_region = " . $serves['id_region']);
									for ($i = 1; $i <= $out = mysqli_fetch_array($hasil); $i++) {
										?>
									<tr class="gradeX">
										<td><?= $i ?></td>
										<td><?= $out['Nama']; ?></td>
										<td><?= $out['nama_pembeli']; ?></td>
										<td><?= $out['tanggal']; ?></td>
										<td><?= $out['waktu']; ?></td>
										<td><?= $out['nama_powder']; ?></td>
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
										<td><?= 'Rp ' . number_format($out['jumlah'], '0', ',', '.'); ?>
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