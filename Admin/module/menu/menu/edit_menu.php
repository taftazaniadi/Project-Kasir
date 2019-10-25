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
					$kuqeriMenu = mysqli_query($query, "SELECT p.id_powder, j.id_jenis, j.nama_jenis, p.nama_powder, detail_penyajian.harga, detail_penyajian.id_region, p.stock_awal, p.penambahan, p.total, p.sisa, s.id_penyajian, s.nama_penyajian, region.nama_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region ON region.id_region = detail_penyajian.id_region WHERE p.id_powder = '$id' ORDER BY p.id_powder");
					$menu = mysqli_fetch_array($kuqeriMenu, MYSQLI_ASSOC);
					$jenis2 = mysqli_query($query, "SELECT * from detail_penyajian join powder on powder.id_powder = detail_penyajian.id_powder join penyajian on penyajian.id_penyajian = detail_penyajian.id_penyajian where powder.id_powder='$id'");
					$tipe = mysqli_query($query, "SELECT * FROM penyajian WHERE penyajian.id_penyajian NOT IN (SELECT id_penyajian FROM detail_penyajian WHERE id_powder='$id')");
					$tipe2 = mysqli_query($query, "SELECT * FROM jenis_menu WHERE nama_jenis != '$menu[nama_jenis]'");
					?>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<form id="form" action="#" class="form-horizontal" method="get">
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
													<input type="text" name="tambah" class="form-control" placeholder="eg.: 20" value="0" required />
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
													<input type="text" name="basic" class="form-control harga" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-pm" style="display:none;">
											<label class="col-sm-3 control-label">Harga Pure Milk</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="pm" class="form-control harga" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-hot" style="display:none;">
											<label class="col-sm-3 control-label">Harga Hot</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="hot" class="form-control harga" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-yakult" style="display:none;">
											<label class="col-sm-3 control-label">Harga Yakult</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="yakult" class="form-control harga" placeholder="eg.: 50000" value="0" />
												</div>
											</div>
										</div>
										<div class="form-group aktif" id="form-juice" style="display:none;">
											<label class="col-sm-3 control-label">Harga Fresh and Juice</label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon btn-success">Rp </span>
													<input type="text" name="juice" class="form-control harga" placeholder="eg.: 50000" value="0" />
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
												}else if(num==4){
													$('input[name=yakult]').val($hasil[harga]);$('input[name=yakult]').parent().parent().parent().css('display','block')
												}else if(num==5){
													$('input[name=juice]').val($hasil[harga]);$('input[name=juice]').parent().parent().parent().css('display','block')
												}
												</script>";
									}
									?>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="kirim">Submit</button>
												<button type="button" class="btn btn-default" onclick="window.location.href='Menu'">Cancel</button>
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

				<script>
					$('button[name=kirim]').click(() => {
						$("input[not=true]").val("0");
						document.cookie = "id_jenis=" + $('select[name=id_jenis]').find('option[selected]').val();
						document.cookie = "nama_menu=" + $('input[name=nama_menu]').val();
						document.cookie = "tambah=" + $('input[name=tambah]').val();
						document.cookie = "id_region=" + $('select[name=id_region]').find('option[selected]').val();;
						document.cookie = "basic=" + $('input[name=basic]').val();
						document.cookie = "pm=" + $('input[name=pm]').val();
						document.cookie = "hot=" + $('input[name=hot]').val();
						document.cookie = "basic=" + $('input[name=basic]').val();
						document.cookie = "yakult=" + $('input[name=yakult]').val();
						document.cookie = "juice=" + $('input[name=juice]').val();
						document.cookie = "status=ongoing";
						<?php
						if(isset($_COOKIE["status"])){
							if ($_COOKIE["status"] == "ongoing") {
								$jenis = $_COOKIE["id_jenis"];
								$nama = $_COOKIE["nama_menu"];
								$harga = [];
								$stock = $_COOKIE["tambah"];
								$region = $_COOKIE["id_region"];
								$input = mysqli_query($query, "UPDATE powder SET stock_awal = sisa, penambahan = '$stock', total = (stock_awal + '$stock'), sisa = total WHERE id_powder = '$_COOKIE[id_powder]'");
								$result = mysqli_query($query, "SELECT id_powder FROM powder WHERE id_jenis = '$_COOKIE[id_jenis]' AND nama_powder = '$nama' AND penambahan = '$stock'");
								$row = mysqli_fetch_assoc($result);
	
								$harga[1] = $_COOKIE['basic'];
								$harga[2] = $_COOKIE['pm'];
								$harga[3] = $_COOKIE['hot'];
								$harga[4] = $_COOKIE['yakult'];
								$harga[5] = $_COOKIE['juice'];
	
								$arr = [0, 0, 0, 0, 0];
								if ($_COOKIE['basic'] != 0)
									$arr[0] = 1;
								if ($_COOKIE['pm'] != 0)
									$arr[1] = 2;
								if ($_COOKIE['hot'] != 0)
									$arr[2] = 3;
								if ($_COOKIE['yakult'] != 0)
									$arr[3] = 4;
								if ($_COOKIE['juice'] != 0)
									$arr[4] = 5;
	
								echo "<script>console.log('basic = $_COOKIE[basic], pm = $_COOKIE[pm], hot = $_COOKIE[hot]')</script>";
								$del = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$_COOKIE[id_powder]' and id_region=$region");
								foreach ($arr as $hasil) {
									if ($hasil != 0) {
										$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga, id_region) VALUES ('$_COOKIE[id_powder]', $hasil, $harga[$hasil], '$region')");
									} else {
										$del = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$_COOKIE[id_powder]' AND id_penyajian = '$hasil'");
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
										 document.cookie='status=standby';
									} ,300);	
								  </script>";
							}
						}
						
						?>
					})
					$(document).ready(function() {
						$("#adi").multiselect({
							onChange: function(element, checked) {
								var brands = $('#adi option:selected');
								var selected = [];
								$(brands).each(function(index, brand) {
									selected.push([$(this).val()]);
								});
								$(".aktif").css("display", "none");
								$(".harga").attr("not", true);
								document.cookie = "basic=" + $("input[name=basic]").val();
								document.cookie = "pm=" + $("input[name=pm]").val();
								document.cookie = "hot=" + $("input[name=hot]").val();
								document.cookie = "yakult=" + $("input[name=yakult]").val();
								document.cookie = "juice=" + $("input[name=juice]").val();
								localStorage.setItem("basic", $("input[name=basic]").val());
								localStorage.setItem("pm", $("input[name=pm]").val());
								localStorage.setItem("hot", $("input[name=hot]").val());
								localStorage.setItem("yakult", $("input[name=yakult]").val());
								localStorage.setItem("juice", $("input[name=juice]").val());

								$.each(selected, (k, v) => {
									if (v[0] == 1) {
										$("#form-basic").css("display", "block");
										$("input[name=basic]").val(localStorage.getItem("basic"));
										$("input[name=basic]").removeAttr("not");
									} else if (v[0] == 2) {
										$("#form-pm").css("display", "block");
										$("input[name=pm]").val(localStorage.getItem("pm"));
										$("input[name=pm]").removeAttr("not");
									} else if (v[0] == 3) {
										$("#form-hot").css("display", "block");
										$("input[name=hot]").val(localStorage.getItem("hot"));
										$("input[name=hot]").removeAttr("not");
									} else if (v[0] == 4) {
										$("#form-yakult").css("display", "block");
										$("input[name=yakult]").val(localStorage.getItem("yakult"));
										$("input[name=yakult]").removeAttr("not");
									} else if (v[0] == 5) {
										$("#form-juice").css("display", "block");
										$("input[name=juice]").val(localStorage.getItem("juice"));
										$("input[name=juice]").removeAttr("not");
									}
								})
							}
						})
					});
				</script>