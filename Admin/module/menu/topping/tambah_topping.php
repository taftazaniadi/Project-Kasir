                <section role="main" class="content-body">
                	<header class="page-header">
                		<h2>Tambah Topping</h2>

                		<div class="right-wrapper pull-right">
                			<ol class="breadcrumbs">
                				<li>
                					<a href="Dashboard">
                						<i class="fa fa-home"></i>
                					</a>
                				</li>
                				<li><span>Inventaris</span></li>
                				<li><span>Topping</span></li>
                				<li><span>Tambah Topping</span></li>
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

                						<h2 class="panel-title">Input Data Topping</h2>
                					</header>
                					<div class="panel-body">
                						<div class="form-group">
                							<label class="col-sm-3 control-label">Nama Topping</label>
                							<div class="col-sm-9">
                								<input type="text" name="nama_topping" class="form-control" placeholder="eg.: Bubble" required />
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
					$region = $_POST['id_region'];
					$queryTambah = mysqli_query($query, "INSERT INTO topping(nama_topping, harga, stock_awal, penambahan, total, sisa, id_region) VALUES ('$nama','$harga','$stock',0,0,'$stock','$region')");
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
							window.location.replace('Topping');
						} ,3000);	
					  </script>";
				}
				?>

                <script>
                	function goBack() {
                		window.history.back();
                	}
                </script>