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
					$jenis = $query->query("SELECT * FROM jenis_menu");
					$saji = $query->query("SELECT * FROM penyajian");
					$region = $query->query("SELECT * FROM region");
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
											<label class="col-sm-3 control-label">Pemakaian Powder</label>
											<div class="col-sm-9">
												<select class="form-control" name="pemakaian_powder" id="pemakaian_powder" required>
													<option value="">-- Silahkan Pilih --</option>
													<option value="stock">Powder Baru</option>
													<option value="powder">Powder yang ada</option>
												</select>
											</div>
										</div>
										<div class="form-group form stock" id="stock" style="display:none;">
											<label class="col-sm-3 control-label">Stock</label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" name="stock" id="stock" class="form-control" placeholder="eg.: 15" />
													<span class="input-group-addon btn-warning">Pcs</span>
												</div>
											</div>
										</div>
										<div class="form-group form powder" id="powder" style="display:none;">
											<label class="col-sm-3 control-label">Powder yang digunakan</label>
											<div class="col-sm-9">
												<select class="form-control" name="id_powder" id="powder">
													<option>-- Pilih Powder --</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Penyajian</label>
											<div class="col-md-6 coba">
												<select class="form-control" id="adi" multiple="multiple" data-plugin-multiselect id="ms_example0" name="penyajian[]" required>
													<?php
													while ($p = mysqli_fetch_array($saji, MYSQLI_ASSOC)) {
														echo "<option value='" . $p['id_penyajian'] . "' id='" . $p['id_penyajian'] . "'>" .
															$p['nama_penyajian']
															. "</option>";
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group aktif" id="form-basic" style="display:none;">
											<label class="col-sm-3 control-label">Harga Basic</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="basic" class="form-control" placeholder="eg.: 50000" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-pm" style="display:none;">
											<label class="col-sm-3 control-label">Harga Pure Milk</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="pm" class="form-control" placeholder="eg.: 50000" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-hot" style="display:none;">
											<label class="col-sm-3 control-label">Harga Hot</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="hot" class="form-control" placeholder="eg.: 50000" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-yakult" style="display:none;">
											<label class="col-sm-3 control-label">Harga Yakult</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="yakult" class="form-control" placeholder="eg.: 50000" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-juice" style="display:none;">
											<label class="col-sm-3 control-label">Harga Fresh and Juice</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="juice" class="form-control" placeholder="eg.: 50000" />
												</div>
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
				if (isset($_POST["kirim"])) 
				{
					$idJenis = $_POST['id_jenis'];
					$namaMenu = $_POST['nama_menu'];
					$region = $_POST['id_region'];
					$powder = $_POST['pemakaian_powder'];
					$varian = $_POST['id_powder'];

					if ($powder == 'stock') {
						$stock = $_POST['stock'];
						$tambah = $query->query("INSERT INTO varian_powder(nama_varian, stok_awal, penambahan, total, sisa, id_region) VALUES ('$namaMenu', '$stock', 0, 0, '$stock', '$region')");
						$data = $query->query("SELECT id_varian FROM varian_powder WHERE nama_varian = '$namaMenu' AND stok_awal = '$stock' AND id_region = '$region' ORDER BY id_varian DESC");
						$out = mysqli_fetch_array($data);
						$id_varian = $out[0];
						$queryTambah = $query->query("INSERT INTO powder(id_jenis, nama_powder, id_varian) VALUES ('$idJenis', '$namaMenu', '$id_varian');");
						$result = $query->query("SELECT id_powder FROM powder WHERE id_jenis = '$idJenis' AND nama_powder = '$namaMenu' AND id_varian = '$id_varian' ORDER BY id_powder DESC");

						$row = mysqli_fetch_assoc($result);

						if (isset($_POST['penyajian'])) {
							$arr = $_POST['penyajian'];
							$harga = [];
							if (isset($_POST['basic']))
								$harga[1] = $_POST['basic'];
							if (isset($_POST['pm']))
								$harga[2] = $_POST['pm'];
							if (isset($_POST['hot']))
								$harga[3] = $_POST['hot'];
							if (isset($_POST['yakult']))
								$harga[4] = $_POST['yakult'];
							if (isset($_POST['juice']))
								$harga[5] = $_POST['juice'];

							foreach ($arr as $cel) {
								$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga) VALUES('$row[id_powder]', '$cel', '$harga[$cel]')");
							}
						}
					} 
					else  
					{
						$queryTambah = $query->query("INSERT INTO powder(id_jenis, nama_powder, id_varian) VALUES ('$idJenis', '$namaMenu', '$varian');");
						$result = $query->query("SELECT id_powder FROM powder WHERE id_jenis = '$idJenis' AND nama_powder = '$namaMenu' AND id_varian = '$varian' ORDER BY id_powder DESC");

						$row = mysqli_fetch_assoc($result);

						if (isset($_POST['penyajian'])) 
						{
							$arr = $_POST['penyajian'];
							$harga = [];
							if (isset($_POST['basic']))
								$harga[1] = $_POST['basic'];
							if (isset($_POST['pm']))
								$harga[2] = $_POST['pm'];
							if (isset($_POST['hot']))
								$harga[3] = $_POST['hot'];
							if (isset($_POST['yakult']))
								$harga[4] = $_POST['yakult'];
							if (isset($_POST['juice']))
								$harga[5] = $_POST['juice'];

							foreach ($arr as $cel) 
							{
								$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga) VALUES('$row[id_powder]', '$cel', '$harga[$cel]')");
							}
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
					$(document).ready(function() {
						$("#adi").multiselect({
							onChange: function(element, checked) {
								var brands = $('#adi option:selected');
								var selected = [];
								$(brands).each(function(index, brand) {
									selected.push([$(this).val()]);
								});
								$(".aktif").css("display", "none");
								$.each(selected, (k, v) => {
									console.log(v[0]);
									if (v[0] == 1)
										$("#form-basic").css("display", "block");
									else if (v[0] == 2)
										$("#form-pm").css("display", "block");
									else if (v[0] == 3)
										$("#form-hot").css("display", "block");
									else if (v[0] == 4)
										$("#form-yakult").css("display", "block");
									else if (v[0] == 5)
										$("#form-juice").css("display", "block");
								})
							}
						});
						$(function() {
							$('#pemakaian_powder').change(function() {
								$('.form').hide();
								$('#' + $(this).val()).show();
								$('#' + $(this)).required = true;
							});
						});
					});
					<?php
					include "../lib/koneksi.php";
					$data = $query->query("SELECT id_varian, nama_varian, id_region FROM varian_powder");
					$result = [];
					while ($d = $output = mysqli_fetch_array($data)) {
						array_push($result, [$d["id_varian"], $d["nama_varian"], $d["id_region"]]);
					};
					$encode = json_encode($result);
					// print_r($encode);

					echo "var temp=JSON.parse('$encode');console.log(temp);";
					// echo $data;
					?>
					$('select[name=id_region]').on('change', function() {
						// alert(this.value);
						let id_region = this.value;
						$('select[name=id_powder]').html("");

						$('select[name=id_powder]').append("<option>-- Pilih Powder --</option>");
						$.each(temp, (k, v) => {
							if (v[2] == id_region)
								// console.log(v);
								$('select[name=id_powder]').append("<option value='" + v[0] + "'>" + v[1] + "</option>");

						})
					});
				</script>