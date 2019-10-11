				<script src=""></script>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Tambah Menu</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inventaris</span></li>
								<li><span>Menu</span></li>
								<li><span>Tambah Menu</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<?php
					include "../lib/koneksi.php";
					$jenis = mysqli_query($query, "SELECT * FROM jenis_menu");
					$saji = mysqli_query($query, "SELECT * FROM penyajian");
					$region = mysqli_query($query, "SELECT * FROM region");
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

										<h2 class="panel-title">Input Data Menu</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Jenis Menu</label>
											<div class="col-sm-9">
												<select class="form-control" id="exampleFormControlSelect1" name="id_jenis" required>
													<option>-- Pilih Jenis Menu --</option>
													<?php
													while ($j = mysqli_fetch_array($jenis, MYSQLI_ASSOC)) {
														echo "<option value='" . $j['id_jenis'] . "'>" .
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
												<input type="text" name="nama_menu" class="form-control" placeholder="eg.: Chocobar" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Harga</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="harga" class="form-control" placeholder="eg.: 50000" required />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Stock</label>
											<div class="col-sm-9">
												<input type="text" name="stock" class="form-control" placeholder="eg.: 15" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Cabang</label>
											<div class="col-sm-9">
												<select class="form-control" id="exampleFormControlSelect1" name="id_region" required>
													<option>-- Pilih Cabang --</option>
													<?php
													while ($j = mysqli_fetch_array($region, MYSQLI_ASSOC)) {
														echo "<option value='" . $j['id_region'] . "'>" .
															$j['nama_region']
															. "</option>";
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Penyajian</label>
											<div class="col-md-6">
												<select class="form-control" multiple="multiple" data-plugin-multiselect id="ms_example0" name="penyajian[]" required>

													<?php
													while ($p = mysqli_fetch_array($saji, MYSQLI_ASSOC)) {
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
					$idJenis = $_POST['id_jenis'];
					$namaMenu = $_POST['nama_menu'];
					$hargaMenu = $_POST['harga'];
					$stock = $_POST['stock'];
					$region = $_POST['id_region'];
					$queryTambah = mysqli_query($query, "INSERT INTO powder(id_jenis, nama_powder, harga, stock_awal, sisa, id_region) VALUES ('$idJenis','$namaMenu','$hargaMenu','$stock', 0, '$region')");
					$result = mysqli_query($query, "SELECT id_powder FROM powder WHERE id_jenis = '$idJenis' AND nama_powder = '$namaMenu' AND harga = '$hargaMenu' AND stock_awal = '$stock'");

					$row = mysqli_fetch_assoc($result);

					if (isset($_POST['penyajian'])) {
						$arr = $_POST['penyajian'];
						foreach ($arr as $cel) {
							$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, id_region) VALUES('$row[id_powder]', '$cel', '$region')");
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
								window.location.replace('Menu');
							} ,3000);	
				  		</script>";
				}
				?>

				<script>
					function goBack() {
						window.history.back();
					}
				</script>