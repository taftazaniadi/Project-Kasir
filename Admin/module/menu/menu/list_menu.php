<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Daftar Stock</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="Dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Inventaris</span></li>
				<li><span>Daftar Stock</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<?php
	$basic1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Basic'");
	$out1 = mysqli_fetch_array($basic1);
	$basic = $out1[0];
	$premium1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Premium'");
	$out2 = mysqli_fetch_array($premium1);
	$premium = $out2[0];
	$soklat1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Soklat'");
	$out3 = mysqli_fetch_array($soklat1);
	$soklat = $out3[0];
	$chocpre1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Choco Premium'");
	$out4 = mysqli_fetch_array($chocpre1);
	$chocpre = $out4[0];
	$yakult1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Yakult'");
	$out5 = mysqli_fetch_array($yakult1);
	$yakult = $out5[0];
	$juice1 = mysqli_query($query, "SELECT COUNT(*) FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis WHERE j.nama_jenis = 'Fresh and Juice'");
	$out6 = mysqli_fetch_array($juice1);
	$juice = $out6[0];
	?>

	<div class="row">
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Basic</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $basic ?>
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
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-quartenary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-quartenary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Premium</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $premium ?>
									</strong>
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
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-secondary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-secondary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Soklat</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $soklat ?>
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
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Choco Premium</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $chocpre ?>
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
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-quartenary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-quartenary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Yakult</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $yakult ?>
									</strong>
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
		<div class="col-md-12 col-lg-4 col-xl-4">
			<section class="panel panel-featured-left panel-featured-secondary">
				<div class="panel-body">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-secondary">
								<i class="fa fa-beer"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">Fresh n Juice</h4>
								<div class="info">
									<strong class="amount">
										<?php echo $juice ?>
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
	</div>

	<div class="row">
		<section class="panel">
			<!-- start: page -->
			<div class="col-md-4">
				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Daftar Menu</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-md">
									<a href="Add_Menu"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
								</div>
							</div>
						</div>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<?php
							include "../lib/koneksi.php";
							$list = mysqli_query($query, "SELECT * FROM region");
							foreach ($list as $count => $serves) { ?>
								<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
									<a href="#tab-<?php echo $serves['id_region'] ?>" aria-controls="#tab-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
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
								<div role="tabpanel" <?php if ($count == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab-<?php echo $serves['id_region'] ?>">
									<table id="example1-tab1-dt" class="table table-striped table-condensed display" cellspacing="0">
										<thead>
											<tr>
												<th>Nama Menu</th>
												<th>Jenis Menu</th>
												<th>Sisa Stock</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include "../lib/koneksi.php";
												$kueriMenu = mysqli_query($query, "SELECT DISTINCT(p.nama_powder), p.id_powder, j.nama_jenis, p.sisa, detail_penyajian.id_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region r ON r.id_region = detail_penyajian.id_region WHERE detail_penyajian.id_region = '" . $serves['id_region'] . "' ORDER BY p.id_powder ");
												for ($x = 1; $x <= $menu = mysqli_fetch_assoc($kueriMenu); $x++) {
													?>
												<tr class="gradeX">
													<td style="display:none;"><?php echo $x ?></td>
													<td style="display:none;" id="aidi"><?php echo $menu['id_powder'] ?></td>
													<td><?php echo $menu['nama_powder'] ?></td>
													<td><?php echo $menu['nama_jenis'] ?></td>
													<td><?php echo $menu['sisa'] ?></td>
													<td style="display:none;" id="region"><?php echo $menu['id_region'] ?></td>
													<td>
														<a href="#"><button type="button" class="btn-detail-menu mb-xs mt-xs mr-xs btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
														<!-- <a href="#"><button type="button" class="btn-edit-menu mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a> -->
														<a href="#"><button type="button" class="btn-hapus-menu mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
													</td>
												</tr>
											<?php
												} ?>
										</tbody>
									</table>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
			<!-- end: page -->

			<!-- start: page -->
			<div class="col-md-4">
				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Daftar Topping</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-md">
									<a href="Add_Topping"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
								</div>
							</div>
						</div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<?php
							include "../lib/koneksi.php";
							$list1 = mysqli_query($query, "SELECT * FROM region");
							foreach ($list1 as $count1 => $serves1) {
								?>
								<li role="presentation" <?php if ($count1 == 0) { ?> class="active" <?php } ?>>
									<a href="#tab1-<?php echo $serves1['id_region'] ?>" aria-controls="#tab1-<?php echo $serves1['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves1['nama_region'] ?></a>
								</li>
							<?php } ?>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<?php
							include "../lib/koneksi.php";
							$list1 = mysqli_query($query, "SELECT * FROM region");
							foreach ($list1 as $count1 => $serves1) {
								?>
								<div role="tabpanel" <?php if ($count1 == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab1-<?php echo $serves1['id_region'] ?>">
									<table id="example1-tab1-dt" class="table table-striped table-condensed display1" cellspacing="0">
										<thead>
											<tr>
												<th>Nama Topping</th>
												<th>Sisa Stock</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include "../lib/koneksi.php";
												$kueriTopping = mysqli_query($query, "SELECT * FROM topping WHERE id_region = " . $serves1['id_region']);
												for ($i = 1; $i <= $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC); $i++) {
													?>
												<tr class="gradeX">
													<td style="display:none;"><?php echo $i ?></td>
													<td style="display:none;" id="aidi"><?php echo $topping['id_topping']; ?></td>
													<td><?php echo $topping['nama_topping']; ?></td>
													<td><?php echo $topping['sisa'] ?></td>
													<td>
														<a href="#"><button type="button" class="btn-detail-topping mb-xs mt-xs mr-xs btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
														<!-- <a href="#"><button type="button" class="btn-edit-topping mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a> -->
														<a href="#"><button type="button" class="btn-hapus-topping mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
													</td>
												</tr>
											<?php
												} ?>
										</tbody>
									</table>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
			<!-- end: page -->

			<!-- start: page -->
			<div class="col-md-4">
				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Daftar Ekstra</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-md">
									<a href="Add_Ekstra"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a> &nbsp;
								</div>	
							</div>
						</div>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<?php
							include "../lib/koneksi.php";
							$list = mysqli_query($query, "SELECT * FROM region");
							foreach ($list as $count => $serves) { ?>

								<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
									<a href="#tab2-<?php echo $serves['id_region'] ?>" aria-controls="#tab2-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
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
								<div role="tabpanel" <?php if ($count == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab2-<?php echo $serves['id_region'] ?>">
									<table id="example1-tab1-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Nama Ekstra</th>
												<th>Sisa Stock</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												include "../lib/koneksi.php";
												$ekstra = mysqli_query($query, "SELECT * FROM ekstra WHERE id_region = " . $serves['id_region']);
												while ($hasil = mysqli_fetch_array($ekstra)) {
													?>
												<tr class="gradeX">
													<td style="display:none;" id="aidi"><?php echo $hasil['id_ekstra']; ?></td>
													<td><?php echo $hasil['nama_ekstra']; ?></td>
													<td><?php echo $hasil['sisa'] ?> <?php echo $hasil['satuan'] ?></td>
													<td style="display:none" id="region"><?php echo $hasil['id_region'] ?></td>
													<td>
														<a href="#"><button type="button" class="btn-detail-ekstra mb-xs mt-xs mr-xs btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
														<!-- <a href="#"><button type="button" class="btn-edit-ekstra mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a> -->
														<a href="#"><button type="button" class="btn-hapus-ekstra mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
			<!-- end: page -->
		</section>
	</div>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>
			<h2 class="panel-title">Detail Penggunaan</h2>
		</header>
		<div class="panel-body">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
				include "../lib/koneksi.php";
				$list3 = mysqli_query($query, "SELECT * FROM region");
				foreach ($list3 as $count3 => $serves3) { ?>

					<li role="presentation" <?php if ($count3 == 0) { ?> class="active" <?php } ?>>
						<a href="#tab3-<?php echo $serves3['id_region'] ?>" aria-controls="#tab3-<?php echo $serves3['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves3['nama_region'] ?></a>
					</li>
				<?php } ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php
				include "../lib/koneksi.php";
				$list3 = mysqli_query($query, "SELECT * FROM region");
				foreach ($list3 as $count3 => $serves3) {
					?>
					<div role="tabpanel" <?php if ($count3 == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab3-<?php echo $serves3['id_region'] ?>">
						<table id="example1-tab3-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nama Ekstra</th>
									<th style="text-align:center">Basic</th>
									<th style="text-align:center">Premium</th>
									<th style="text-align:center">Soklat</th>
									<th style="text-align:center">Choco Premium</th>
									<th style="text-align:center">Yakult</th>
									<th style="text-align:center">Fresh and Juice</th>
									<th style="text-align:center">Total Pemakaian</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "../lib/koneksi.php";
									$data = mysqli_query($query, "SELECT ekstra.nama_ekstra,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 1, pemakaian, NULL)) AS basic_use,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 2, pemakaian, NULL)) AS premium_use,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 3, pemakaian, NULL)) AS soklat_use,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 4, pemakaian, NULL)) AS chocpre_use,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 5, pemakaian, NULL)) AS yakult_use,
									GROUP_CONCAT(DISTINCT IF(id_jenis = 6, pemakaian, NULL)) AS juice_use,
									SUM(pemakaian) AS total
									FROM detail_ekstra dt
									RIGHT JOIN ekstra ON ekstra.id_ekstra = dt.id_ekstra
									WHERE (dt.id_jenis BETWEEN 1 AND 6) AND dt.id_region = '" . $serves3['id_region'] . "'
									GROUP BY ekstra.nama_ekstra");
									while ($tampil = mysqli_fetch_array($data)) {
										?>
									<tr>
										<td><?php echo $tampil['nama_ekstra'] ?></td>
										<td style="text-align:center"><?php echo $tampil['basic_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['premium_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['soklat_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['chocpre_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['yakult_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['juice_use'] ?></td>
										<td style="text-align:center"><?php echo $tampil['total'] ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

</section>

<script>
	if (localStorage.status == undefined || localStorage.status == 3) {
		localStorage.setItem("status", 2);
	} else {
		localStorage.setItem("status", 3);
		window.location.reload();
	}
	$(document).ready(() => {
		$('.btn-detail-menu').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			let detail = "Detail_Menu?id_powder=" + id;
			document.cookie = "id_powder=" + id;
			window.location.replace(detail);
			// console.log(detail);
		});
		// $('.btn-edit-menu').click(function() {
		// 	let id = $(this).parent().parent().parent().children("#aidi").html();
		// 	let edit = "Edit_Menu?id_powder=" + id;
		// 	document.cookie = "id_powder=" + id;
		// 	document.cookie = "status=update";
		// 	window.location.replace(edit);
		// 	// console.log(edit);
		// });
		$('.btn-hapus-menu').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			// let saji = $(this).parent().parent().parent().children("#saji").html();
			let region = $(this).parent().parent().parent().children("#region").html();
			document.cookie = "id_powder=" + id;
			// document.cookie = "id_penyajian=" + saji;
			document.cookie = "id_region=" + region;
			document.cookie = "status=hapus";

			swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this data!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function() {
					swal("Deleted!", "Your data has been deleted.", "success");
					window.location.replace("Hapus_Menu")
				});
		});

		// Topping
		$('.btn-detail-topping').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			let detail = "Detail_Topping?id_topping=" + id;
			document.cookie = "id_topping=" + id;
			window.location.replace(detail);
		});
		// $('.btn-edit-topping').click(function() {
		// 	let id = $(this).parent().parent().parent().children("#aidi").html();
		// 	let edit = "Edit_Topping?id_topping=" + id;
		// 	document.cookie = "id_topping=" + id;
		// 	window.location.replace(edit);
		// 	console.log(id);
		// });
		$('.btn-hapus-topping').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			document.cookie = "id_topping=" + id;
			document.cookie = "status=hapus";
			swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this data!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function() {
					swal("Deleted!", "Your data has been deleted.", "success");
					window.location.replace('Hapus_Topping');
				});
		});

		// Ekstra
		$('.btn-detail-ekstra').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			let detail = "Detail_Ekstra?id_ekstra=" + id;
			document.cookie = "id_ekstra=" + id;
			window.location.replace(detail);
		});
		// $('.btn-edit-ekstra').click(function() {
		// 	let id = $(this).parent().parent().parent().children("#aidi").html();
		// 	let edit = "Edit_Ekstra?id_ekstra=" + id;
		// 	document.cookie = "id_ekstra=" + id;
		// 	window.location.replace(edit);
		// });
		$('.btn-hapus-ekstra').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			document.cookie = "id_ekstra=" + id;
			document.cookie = "status=hapus";
			swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this data!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function() {
					swal("Deleted!", "Your data has been deleted.", "success");
					window.location.replace('Hapus_Ekstra');
				});
		});
	})
</script>

<script>
	$(document).ready(function() {
		$('table.display').DataTable();
		$('table.display1').DataTable();
		$('table.display2').DataTable();
	});
</script>