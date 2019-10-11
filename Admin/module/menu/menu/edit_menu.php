				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Menu</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inventaris</span></li>
								<li><span>Menu</span></li>
								<li><span>Edit Menu</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<?php
					include "../lib/koneksi.php";
					$id = $_COOKIE["id_powder"];
					$saji = mysqli_query($query, "SELECT * FROM penyajian");
					$kuqeriMenu = mysqli_query($query, "SELECT p.id_powder, j.id_jenis, j.nama_jenis, p.nama_powder, p.harga, p.stock_awal, p.sisa, s.id_penyajian, s.nama_penyajian, region.nama_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region ON region.id_region = detail_penyajian.id_region WHERE p.id_powder = '$id' ORDER BY p.id_powder");
					$menu = mysqli_fetch_array($kuqeriMenu, MYSQLI_ASSOC);
					$jenis2 = mysqli_query($query, "SELECT * from detail_penyajian join powder on powder.id_powder = detail_penyajian.id_powder join penyajian on penyajian.id_penyajian = detail_penyajian.id_penyajian where powder.id_powder='$id'");
					$tipe = mysqli_query($query, "SELECT * FROM penyajian WHERE penyajian.id_penyajian NOT IN (SELECT id_penyajian FROM detail_penyajian WHERE id_powder='$id')");
					$tipe2 = mysqli_query($query, "SELECT * FROM jenis_menu WHERE nama_jenis != '$menu[nama_jenis]'");
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

										<h2 class="panel-title">Edit Data Menu</h2>
									</header>
									<div class="panel-body">
										<input type="hidden" name="id_powder" class="form-control" value="<?php echo $menu['id_powder']; ?>" />
										<div class="form-group">
											<label class="col-sm-3 control-label">Jenis Menu</label>
											<div class="col-sm-9">
												<select class="form-control" id="exampleFormControlSelect1" name="id_jenis" readonly>
													<option>-- Pilih Jenis Menu --</option>
													<?php
													echo "<option value='" . $menu['id_jenis'] . "' selected>" .
														$menu['nama_jenis']
														. "</option>";
													while ($j = mysqli_fetch_array($tipe2, MYSQLI_ASSOC)) {
														echo "<option value='" . $j['id_jenis'] . "' >" .
															$j['nama_jenis']
															. "</option>";
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Menu</label>
											<div class="col-sm-9">
												<input type="text" name="nama_menu" class="form-control" value="<?php echo $menu['nama_powder'] ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Harga</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="harga" class="form-control" value="<?php echo $menu['harga']; ?>" />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Stock</label>
											<div class="col-sm-9">
												<input type="text" name="stock" class="form-control" value="<?php echo $menu['stock_awal']; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Cabang</label>
											<div class="col-md-6">
												<select class="form-control" id="exampleFormControlSelect1" name="id_region" readonly>
													<?php
													echo "<option value='" . $menu['id_region'] . "' selected>" .
														$menu['nama_region']
														. "</option>";
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Penyajian</label>
											<div class="col-md-6">
												<select class="form-control" multiple="multiple" data-plugin-multiselect id="ms_example0" name="penyajian[]">
													<?php
													while ($p = mysqli_fetch_array($jenis2, MYSQLI_ASSOC)) {
														echo "<option value='" . $p['id_penyajian'] . "' selected>" .
															$p['nama_penyajian']
															. "</option>";
													}
													while ($p = mysqli_fetch_array($tipe, MYSQLI_ASSOC)) {
														echo "<option value='" . $p['id_penyajian'] . "'>" .
															$p['nama_penyajian']
															. "</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="kirim">Submit</button>
												<button type="button" class="btn btn-default" onclick="goBack()">Cancel</button>
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
					$jenis = $_POST["id_jenis"];
					$nama = $_POST["nama_menu"];
					$harga = $_POST["harga"];
					$stock = $_POST["stock"];
					$input = mysqli_query($query, "UPDATE powder SET id_jenis = '$jenis', nama_powder = '$nama', harga = '$harga', stock_awal = '$stock' WHERE id_powder = '$_POST[id_powder]'");
					$result = mysqli_query($query, "SELECT id_powder FROM powder WHERE id_jenis = '$_POST[id_powder]' AND nama_powder = '$nama' AND harga = '$harga' AND stock_awal = '$stock'");
					$row = mysqli_fetch_assoc($result);

					if (isset($_POST['penyajian'])) {
						$arr = $_POST['penyajian'];
						foreach ($arr as $cel) {
							$add = mysqli_query($query, "UPDATE detail_penyajian SET id_penyajian = '$cel' WHERE id_powder = '$_POST[id_powder]'");
						}
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
								window.location.replace('Menu');
							} ,3000);
							document.cookie='status=standby'	
					  	</script>";
					}
				}
				?>

				<script>
					function goBack() {
						window.history.back();
					}
				</script>