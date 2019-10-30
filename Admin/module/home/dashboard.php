				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- Count Karyawan -->
					<?php
					include "../lib/koneksi.php";
					$hitung = mysqli_query($query, "SELECT COUNT(nama) FROM staff");
					$angka = mysqli_fetch_array($hitung);
					$total = $angka[0];
					?>
					<!-- Count Menu -->
					<?php
					include "../lib/koneksi.php";
					$menu = mysqli_query($query, "SELECT COUNT(*) from powder");
					$angka1 = mysqli_fetch_array($menu);
					$total1 = $angka1[0];
					?>
					<!-- Count Topping -->
					<?php
					include "../lib/koneksi.php";
					$menu = mysqli_query($query, "SELECT COUNT(*) from topping");
					$angka2 = mysqli_fetch_array($menu);
					$total2 = $angka2[0];
					?>

					<!-- Count Orders n Profit-->
					<?php
					include "../lib/koneksi.php";

					$currentDate = date('Y/m/d');

					$order = mysqli_query($query, "SELECT COUNT(detail_transaksi.no_nota) FROM jual JOIN detail_transaksi ON 	detail_transaksi.no_nota = jual.no_nota WHERE tanggal = '$currentDate'");
					$out = mysqli_fetch_array($order);
					$order2 = $out[0];

					$profit = mysqli_query($query, "SELECT SUM(total) FROM jual WHERE tanggal = '$currentDate'");
					$fit = mysqli_fetch_array($profit);
					$profit2 = $fit[0];

					function formatRupiah($profit2)
					{
						if (is_numeric($profit2)) {
							$format_rupiah = 'Rp ' . number_format($profit2, '0', ',', '.');
							return $format_rupiah;
						} else {
							echo "Rp 0";
						}
					}
					?>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<section class="panel">
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-8">
												<?php
												include "../lib/koneksi.php";
												$region = mysqli_query($query, "SELECT * FROM region");
												?>
												<div class="chart-data-selector" id="salesSelectorWrapper">
													<h2>
														Sales:
														<strong>
															<select class="form-control" id="salesSelector">
																<?php
																while ($j = mysqli_fetch_array($region, MYSQLI_ASSOC)) {
																	echo "<option value='" . $j['id_region'] . "'>" .
																		$j['nama_region']
																		. "</option>";
																}
																?>
															</select>
														</strong>
													</h2>

													<div id="salesSelectorItems" class="chart-data-selector-items mt-sm">
														<!-- Flot: Sales JSOFT Admin -->
														<div class="chart chart-sm" data-sales-rel="<?php echo $j['id_region'] = '1'; ?>" id="flotDashSales1" class="chart-active"></div>
														<script>
															var flotDashSales1Data = [{
																data: [
																	["Jan", 140],
																	["Feb", 240],
																	["Mar", 190],
																	["Apr", 140],
																	["May", 180],
																	["Jun", 320],
																	["Jul", 270],
																	["Aug", 180],
																	["Sep", 150],
																	["Oct", 150],
																	["Nov", 150],
																	["Des", 150]
																],
																color: "#0088cc"
															}];

															// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.
														</script>

														<!-- Flot: Sales JSOFT Drupal -->
														<div class="chart chart-sm" data-sales-rel="<?php echo $j['id_region'] = '2'; ?>" id="flotDashSales2" class="chart-hidden"></div>
														<script>
															var flotDashSales2Data = [{
																data: [
																	["Jan", 240],
																	["Feb", 240],
																	["Mar", 290],
																	["Apr", 540],
																	["May", 480],
																	["Jun", 220],
																	["Jul", 170],
																	["Aug", 190],
																	["Sep", 150],
																	["Oct", 150],
																	["Nov", 150],
																	["Des", 150]
																],
																color: "#2baab1"
															}];

															// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.
														</script>

														<!-- Flot: Sales JSOFT Wordpress -->
														<div class="chart chart-sm" data-sales-rel="<?php echo $j['id_region'] = '3'; ?>" id="flotDashSales3" class="chart-hidden"></div>
														<script>
															var flotDashSales3Data = [{
																data: [
																	["Jan", 840],
																	["Feb", 740],
																	["Mar", 690],
																	["Apr", 940],
																	["May", 1180],
																	["Jun", 820],
																	["Jul", 570],
																	["Aug", 780],
																	["Sep", 150],
																	["Oct", 150],
																	["Nov", 150],
																	["Des", 150]
																],
																color: "#734ba9"
															}];

															// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.
														</script>
													</div>
												</div>
											</div>
											<div class="col-lg-4 text-center">
												<h2 class="panel-title mt-md">Sales Goal</h2>
												<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
													<div class="liquid-meter">
														<meter min="0" max="100" value="35" id="meterSales"></meter>
													</div>
													<div class="liquid-meter-selector" id="meterSalesSel">
														<a href="#" data-val="35" class="active">Monthly Goal</a>
														<a href="#" data-val="28">Annual Goal</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-life-ring"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Jumlah Menu | Topping</h4>
														<div class="info">
															<strong class="amount"><?php echo $total1 ?></strong> |
															<strong class="amount"><?php echo $total2 ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="Menu">(view all)</a>
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
														<i class="fa fa-money"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Profit</h4>
														<div class="info">
															<strong class="amount">
																<?php echo formatRupiah($profit2); ?>
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
														<h4 class="title">Today's Orders</h4>
														<div class="info">
															<strong class="amount">
																<?php echo $order2; ?>
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
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Karyawan</h4>
														<div class="info">
															<strong class="amount"><?php echo $total; ?></strong>
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
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<section class="panel">
								<header class="panel-heading panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Daftar Menu</h2>
								</header>
								<div class="panel-body">
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
												<table id="example1-tab1-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Nama Menu</th>
															<th>Stock</th>
														</tr>
													</thead>
													<tbody>
														<?php
															include "../lib/koneksi.php";
															$barang = mysqli_query($query, "SELECT DISTINCT nama_powder, sisa FROM powder WHERE id_region = '" . $serves['id_region'] . "' ORDER BY nama_powder");
															for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
																?>
															<tr>
																<td style="display:none"><?php echo $x ?></td>
																<td><?php echo $hasil['nama_powder'] ?></td>
																<td>
																	<?php
																		if ($hasil['sisa'] > 20) {
																			echo '<span class="label label-success">' . $hasil['sisa'] . '</span>';
																		} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 20) {
																			echo '<span class="label label-warning">' . $hasil['sisa'] . '</span>';
																		} elseif ($hasil['sisa'] < 5) {
																			echo '<span class="label label-danger">' . $hasil['sisa'] . '</span>';
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
								</div>
							</section>
						</div>
						<div class="col-md-4">
							<section class="panel">
								<header class="panel-heading panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Daftar Topping</h2>
								</header>

								<div class="panel-body">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs nav-justified" role="tablist">
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
												<table id="example2-tab1-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Nama Topping</th>
															<th>Stock</th>
														</tr>
													</thead>
													<tbody>
														<?php
															include "../lib/koneksi.php";
															$barang = mysqli_query($query, "SELECT * FROM topping WHERE id_region = " . $serves['id_region']);
															for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
																?>
															<tr>
																<td style="display:none"><?php echo $x ?></td>
																<td><?php echo $hasil['nama_topping'] ?></td>
																<td>
																	<?php
																		if ($hasil['sisa'] > 20) {
																			echo '<span class="label label-success">' . $hasil['sisa'] . '</span>';
																		} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 20) {
																			echo '<span class="label label-warning">' . $hasil['sisa'] . '</span>';
																		} elseif ($hasil['sisa'] < 5) {
																			echo '<span class="label label-danger">' . $hasil['sisa'] . '</span>';
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
								</div>
							</section>
						</div>
						<div class="col-md-4">
							<section class="panel">
								<header class="panel-heading panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Daftar Ekstra</h2>
								</header>

								<div class="panel-body">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs  nav-justified" role="tablist">
										<?php
										include "../lib/koneksi.php";
										$list = mysqli_query($query, "SELECT * FROM region");
										foreach ($list as $count => $serves) { ?>

											<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
												<a href="#tab2-<?php echo $serves['id_region'] ?>" aria-controls="#tab-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
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
												<table id="example2-tab1-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Nama Ekstra</th>
															<th>Stock</th>
														</tr>
													</thead>
													<tbody>
														<?php
															include "../lib/koneksi.php";
															$barang = mysqli_query($query, "SELECT * FROM ekstra WHERE id_region = " . $serves['id_region']);
															for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
																?>
															<tr>
																<td style="display:none"><?php echo $x ?></td>
																<td><?php echo $hasil['nama_ekstra'] ?></td>
																<td>
																	<?php
																			if ($hasil['satuan'] == 'Liter') {
																				if ($hasil['sisa'] > 10) {
																					echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																					echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] < 5) {
																					echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				}
																			} else if ($hasil['satuan'] == 'Cup') {
																				if ($hasil['sisa'] > 10) {
																					echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																					echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] < 5) {
																					echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				}
																			} else if ($hasil['satuan'] == 'Botol') {
																				if ($hasil['sisa'] > 10) {
																					echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																					echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] < 5) {
																					echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				}
																			} else if ($hasil['satuan'] == 'Bungkus') {
																				if ($hasil['sisa'] > 10) {
																					echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																					echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				} elseif ($hasil['sisa'] < 5) {
																					echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																				}
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
								</div>
							</section>
						</div>
					</div>
					</div>
					<!-- end: page -->
				</section>
				</div>

				<!-- <script>
					$(document).ready(function() {
						$('table.display').DataTable();
					});
				</script> -->