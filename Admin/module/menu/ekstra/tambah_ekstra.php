                <section role="main" class="content-body">
                	<header class="page-header">
                		<h2>Tambah Ekstra</h2>

                		<div class="right-wrapper pull-right">
                			<ol class="breadcrumbs">
                				<li>
                					<a href="Dashboard">
                						<i class="fa fa-home"></i>
                					</a>
                				</li>
                				<li><span>Inventaris</span></li>
                				<li><span>Ekstra</span></li>
                				<li><span>Tambah Ekstra</span></li>
                			</ol>

                			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                		</div>
                	</header>

                	<?php
					include "../lib/koneksi.php";
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

                						<h2 class="panel-title">Input Data Ekstra</h2>
                					</header>
                					<div class="panel-body">
                						<div class="form-group">
                							<label class="col-sm-3 control-label">Nama Ekstra</label>
                							<div class="col-sm-9">
                								<input type="text" name="nama_ekstra" class="form-control" placeholder="eg.: Bubble" required />
                							</div>
                						</div>
                						<div class="form-group">
                							<label class="col-sm-3 control-label">Stock</label>
                							<div class="col-sm-5">
                								<input type="text" name="stock" class="form-control" placeholder="eg.: 2000/20" required />
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
					$stock = $_POST['stock'];
					$region = $_POST['id_region'];
					$satuan = $_POST['satuan'];
					$queryTambah = mysqli_query($query, "INSERT INTO ekstra(nama_ekstra, stock_awal, penambahan, total, sisa, satuan, id_region) VALUES ('$nama','$stock', 0, 0, '$stock', '$satuan', '$region')");
					$cari = mysqli_query($query, "SELECT id_ekstra FROM ekstra WHERE nama_ekstra = '$nama' AND satuan = '$satuan' AND id_region = '$region'");
					$count = mysqli_query($query, "SELECT COUNT(id_ekstra) FROM ekstra WHERE nama_ekstra = '$nama' AND satuan = '$satuan' AND id_region = '$region'");

					$find = mysqli_fetch_assoc($cari);

					if ($count->num_rows > 0) {
						for ($x = 1; $x <= 6; $x++) {
							$in = mysqli_query($query, "INSERT INTO detail_ekstra(id_ekstra, id_jenis, pemakaian, id_region) VALUES ('$find[id_ekstra]',$x, 0, '$region')");
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
							window.location.replace('Ekstra');
						} ,3000);	
					</script>";
				}
				?>