				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Ekstra</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inventaris</span></li>
								<li><span>Ekstra</span></li>
								<li><span>Edit Ekstra</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<?php
					include "../lib/koneksi.php";
					$id = $_COOKIE["id_ekstra"];
					$kueriTopping = mysqli_query($query, "SELECT * FROM ekstra JOIN region ON region.id_region = ekstra.id_region WHERE ekstra.id_ekstra = '$id'");
					$topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC);
					?>
					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<form id="form" action="#" class="form-horizontal" method="POST" action="">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Edit Data Ekstra</h2>
									</header>
									<div class="panel-body">
										<input type="hidden" name="id_topping" value="<?php echo $topping['id_ekstra']; ?>">
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Ekstra</label>
											<div class="col-sm-9">
												<input type="text" name="nama_ekstra" class="form-control" value="<?php echo $topping['nama_ekstra'] ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Penambahan</label>
											<div class="col-sm-5">
												<input type="text" name="tambah" class="form-control" placeholder="eg.: 2000/20" required />
											</div>
											<label class="col-sm-1 control-label">Satuan</label>
											<div class="col-sm-3">
												<select class="form-control" id="exampleFormControlSelect1" name="satuan" required>
													<option>-- Pilih Satuan --</option>
													<option value="Cup">Cup</option>
													<option value="Liter">Liter</option>
													<option value="Bungkus">Bungkus</option>
													<option value="Botol">Botol</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Cabang</label>
											<div class="col-md-6">
												<select class="form-control" id="exampleFormControlSelect1" name="id_region" readonly>
													<?php
													echo "<option value='" . $topping['id_region'] . "' selected>" .
														$topping['nama_region']
														. "</option>";
													?>
												</select>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="kirim">Submit</button>
												<button type="button" class="btn btn-default" onclick="history.back()">Cancel</button>
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
					$nama = $_POST['nama_ekstra'];
					$stock = $_POST['tambah'];
					$region = $_POST['id_region'];
					$satuan = $_POST['satuan'];
					$queryTambah = mysqli_query($query, "UPDATE ekstra SET stock_awal = sisa, penambahan = '$stock', total = (stock_awal + '$stock'), sisa = total, satuan = '$satuan' WHERE id_ekstra = '$id' AND id_region = '$region'");
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
							window.location.replace('Ekstra');
						} ,3000);
						document.cookie='status=standby'	
					</script>";
				}
				?>