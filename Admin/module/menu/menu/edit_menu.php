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
					$kuqeriMenu = mysqli_query($query, "SELECT p.id_powder, j.id_jenis, j.nama_jenis, p.nama_powder, detail_penyajian.harga, p.stock_awal, p.penambahan, p.total, p.sisa, s.id_penyajian, s.nama_penyajian, region.nama_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region ON region.id_region = detail_penyajian.id_region WHERE p.id_powder = '$id' ORDER BY p.id_powder");
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
											<label class="col-sm-3 control-label">Penambahan</label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" name="tambah" class="form-control" placeholder="eg.: 20" required />
													<span class="input-group-addon btn-success">Pcs</span>
												</div>
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
										<div class="form-group" style="height:34px">
											<label class="col-md-3 control-label">Penyajian</label>
											<div class="col-md-6">
												<select class="form-control" id="adi" multiple="multiple" data-plugin-multiselect id="ms_example0" name="penyajian[]">
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

										<div class="form-group aktif" id="form-basic" style="display:none;">
											<label class="col-sm-3 control-label">Harga Basic</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="basic" class="form-control" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-pm" style="display:none;">
											<label class="col-sm-3 control-label">Harga Pure Milk</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="pm" class="form-control" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-hot" style="display:none;">
											<label class="col-sm-3 control-label">Harga Hot</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="hot" class="form-control" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
									</div>
									<?php
									$mbuh = mysqli_query($query, "SELECT * from detail_penyajian join powder on powder.id_powder = detail_penyajian.id_powder join penyajian on penyajian.id_penyajian = detail_penyajian.id_penyajian where powder.id_powder='$id'");
									while ($hasil = mysqli_fetch_array($mbuh)) {
										echo "<script>
											num = $hasil[id_penyajian];
											if(num==1){
												$('input[name=basic]').val($hasil[harga]);$('input[name=basic]').parent().parent().parent().css('display','block')
											}else if(num==2){
												$('input[name=pm]').val($hasil[harga]);$('input[name=pm]').parent().parent().parent().css('display','block')
											}else if(num==3){
												$('input[name=hot]').val($hasil[harga]);$('input[name=hot]').parent().parent().parent().css('display','block')
											}

											</script>";
									}

									?>
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
					$harga = [];
					$stock = $_POST["tambah"];
					$region = $_POST["id_region"];
					$input = mysqli_query($query, "UPDATE powder SET penambahan = '$stock', total = (stock_awal + '$stock'), sisa = total, stock_awal = sisa WHERE id_powder = '$_POST[id_powder]'");
					$result = mysqli_query($query, "SELECT id_powder FROM powder WHERE id_jenis = '$_POST[id_jenis]' AND nama_powder = '$nama' AND penambahan = '$stock'");
					$row = mysqli_fetch_assoc($result);

					$harga[1] = $_POST['basic'];
					$harga[2] = $_POST['pm'];
					$harga[3] = $_POST['hot'];

					$arr = [0, 0, 0];
					if ($_POST['basic'] != 0)
						$arr[0] = 1;
					if ($_POST['pm'] != 0)
						$arr[1] = 2;
					if ($_POST['hot'] != 0)
						$arr[2] = 3;

					echo "<script>console.log('basic = $_POST[basic], pm = $_POST[pm], hot = $_POST[hot]')</script>";
					$del = mysqli_query($query, "DELETE FROM powder WHERE id_powder = '$_POST[id_powder]'");
					foreach ($arr as $hasil) {
						if ($hasil != 0) {
							echo "<script>alert('update $hasil')</script>";
							$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga, id_region) VALUES ('$_POST[id_powder]', $hasil, $harga[$hasil], '$region')");
						} else {
							echo "<script>alert('delete')</script>";
							$del = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$_POST[id_powder]' AND id_penyajian = '$hasil'");
						}
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
								$("input[name=basic]").val("0");
								$("input[name=pm]").val("0");
								$("input[name=hot]").val("0");
								$.each(selected, (k, v) => {
									if (v[0] == 1) {
										$("#form-basic").css("display", "block");
									} else if (v[0] == 2) {
										$("#form-pm").css("display", "block");
									} else if (v[0] == 3) {
										$("#form-hot").css("display", "block");
									}

								})

							}
						})
					});
				</script>