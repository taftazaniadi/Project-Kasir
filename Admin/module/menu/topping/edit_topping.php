				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Topping</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inventaris</span></li>
								<li><span>Topping</span></li>
								<li><span>Edit Topping</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<?php
					include "../lib/koneksi.php";
					$id = $_COOKIE["id_topping"];
					$region = mysqli_query($query, "SELECT topping.*, region.* FROM topping JOIN region ON region.id_region = topping.id_region WHERE id_topping = $id");
					$kueriTopping = mysqli_query($query, "SELECT topping.*, region.* FROM topping JOIN region ON region.id_region = topping.id_region WHERE id_topping = $id");
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

										<h2 class="panel-title">Edit Data Topping</h2>
									</header>
									<div class="panel-body">
										<input type="hidden" name="id_topping" value="<?php echo $topping['id_topping']; ?>">
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Topping</label>
											<div class="col-sm-9">
												<input type="text" name="nama_topping" class="form-control" value="<?php echo $topping['nama_topping'] ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Harga</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="harga" class="form-control" value="<?php echo $topping['harga'] ?>" />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Stock</label>
											<div class="col-sm-9">
												<input type="text" name="stock" class="form-control" value="<?php echo $topping['stock_awal'] ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Cabang</label>
											<div class="col-md-6">
												<select class="form-control" id="exampleFormControlSelect1" name="id_region" readonly>
													<?php
													while ($p = mysqli_fetch_array($region, MYSQLI_ASSOC)) {
														echo "<option value='" . $p['id_region'] . "' selected>" .
															$p['nama_region']
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
					$nama = $_POST['nama_topping'];
					$harga = $_POST['harga'];
					$stock = $_POST['stock'];
					$queryTambah = mysqli_query($query, "UPDATE topping SET nama_topping = '$nama', harga = '$harga', stock_awal = '$stock' WHERE id_topping = '$id'");
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
							window.location.replace('Topping');
						} ,3000);
						document.cookie='status=standby'	
					  </script>";
				}
				?>

				<script>
					function goBack() {
						window.history.back();
					}
				</script>