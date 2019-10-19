<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label class="card-title">Nama Pembeli</label>
					<div class="input-group">

						<div class="input-group-prepend">
							<span class="input-group-text bg-primary text-white"><i class="mdi mdi-account"></i></span>
						</div>
						<input type="text" class="form-control" name="pembeli" id="pembeli" placeholder="Pembeli" value="" aria-label="Amount (to the nearest dollar)">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-lg-8 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">Pilihan Menu Basic , Premium , Soklat </label>
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="aqua">
							<th width="40%" class="card-title">Varian Menu</th>
							<th width="20%" class="card-title">Sajian</th>
							<th width="40%" class="card-title">Toping</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-primary">
							<td>
								<select class="form-control" id="menu">
									<option value="0">-- Pilih Menu --</option>
									<optgroup label="Menu Basic">
										<?php
										foreach ($basic as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Menu Premium">
										<?php
										foreach ($premium as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Menu Soklat">
										<?php
										foreach ($soklat as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Choco Premium">
										<?php
											foreach ($choco_pm as $key => $value) {
												?>
												<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
											<?php
											}
										?>
									</optgroup>									

								</select>
							</td>
							<td>
								<select class="form-control" id="sajian">
									<option value="0">-- Pilih --</option>
								</select>
							</td>
							<td>
								<select class="form-control" id="topping">
									<option value="">-- Pilih Topping --</option>
									<optgroup label="All Topping">
										<?php
										foreach ($topping as $key => $value) {
											?>
											<option value="<?= $value->id_topping ?>" nama="<?= $value->nama_topping ?>" harga="<?= $value->harga ?>"><?= $value->nama_topping ?></option>
										<?php
										}
										?>
									</optgroup>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<button type="text" class="btn btn-social-icon-text btn-facebook" style="margin-top: 10px;" id="add_data"><i class="mdi mdi-plus"></i>Tambah List</button>
			</div>
		</div>
	</div>

	<div class="col-lg-4 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">Pilihan Menu Yakult ,  Fresh And Juice</label>
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="aqua">
							<th class="card-title">Varian Menu</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-primary">
							<td>
								<select class="form-control" id="menu2">
									<option value="0">-- Pilih Menu --</option>
									
									<optgroup label="Menu Yakult">
										<?php
											foreach ($yakult as $key => $value) {
												?>
													<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
												<?php
											}
										?>
									</optgroup>

									<optgroup label="menu Juice">
										<?php
										foreach ($juice as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>
								</select>
								<input type="hidden" id="harga_hrg" value="" >
							</td>
						</tr>
					</tbody>
				</table>
				<button type="text" id="add_data2" class="btn btn-social-icon-text btn-facebook" style="margin-top: 10px;"><i class="mdi mdi-plus"></i>Tambah List</button>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">List Pesanan</label>
				<table class="table table-striped" id="data_pesanan">
					<thead>
						<tr bgcolor="aqua">
							<th width="5%" class="card-title">#</th>
							<th width="25%" class="card-title">Menu</th>
							<th width="25%" class="card-title">Sajian</th>
							<th width="25%" class="card-title">Topping</th>
							<th width="20%" class="card-title">Harga</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Total</h4>
			</div>
			<div class="col-md-8">
				<input type="text" name="total" id="total" value="" class="form-control" readonly>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Diskon (%)</h4>
			</div>
			<div class="col-md-8">
				<input type="text" name="diskon" id="diskon" value="" class="form-control" readonly>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Total Bayar</h4>
			</div>
			<div class="col-md-8">
				<input type="text" name="total_akhir" id="total_akhir" value="" class="form-control" readonly>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Uang Bayar</h4>
			</div>
			<div class="col-md-8">
				<input type="number" name="bayar" id="bayar" value="" class="form-control">
				<br>
				<button class="btn btn-social-icon-text btn-facebook" onclick="bayar_cash();"><i class="mdi mdi-cash-multiple"></i>Uang Cash</button>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Kembali</h4>
			</div>
			<div class="col-md-8">
				<input type="text" name="kembali" id="kembali" value="" class="form-control" readonly>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div align="center">
			<button class="btn btn-social-icon-text btn-twitter" id="konfirmasi"><i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i>Konfirrmasi Pesanan</button>
		</div>
	</div>
</div>
<!-- <input type="text" id="id_nota" name="id_nota" value=""> -->

<!-- Java Script -->

<script type="text/javascript">
	// ---------------------------------------- FUNGSI CHANGE SAJIAN DARI PILIHAN MENU ----------------------------------------------------
	$(document).ready(function() {

		$('#menu').change(function() {

			var id = $(this).val();
			$.ajax({
				url: "<?= base_url('index.php/c_barista/get_sajian') ?>",
				type: "post",
				data: {
					id: id
				},
				async: true,
				dataType: "json",
				success: function(data) {
					var html = '';
					var id;
					// html += '<option value="0">-- Pilih --</option>';
					// html += '<optgroup label = "Sajian">';
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_penyajian + ' nama="' + data[i].nama_penyajian + '" harga="' + data[i].harga + '" >' + data[i].nama_penyajian + '</option>';
					}
					// html += '</optgroup>';
					$('#sajian').html(html);
				}
			});

		});
		return false;
	});
	// ---------------------------------------- END FUNGSI  -------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI CHANGE SAJIAN DARI PILIHAN MENU 2 --------------------------------------------------
	$(document).ready(function() {

		$('#menu2').change(function() {

			var id = $(this).val();
			$.ajax({
				url: "<?= base_url('index.php/c_barista/get_sajian') ?>",
				type: "post",
				data: {
					id: id
				},
				async: true,
				dataType: "json",
				success: function(data) {
					var html = '';
					var id;
					for (i = 0; i < data.length; i++) {
						html += data[i].harga;
					}
					// $('#sajian').html(html);
					$('#harga_hrg').val(html);
				}
			});

		});
		return false;
	});

	// ---------------------------------------- END FUNGSI --------------------------------------------------------------------------------


	// ---------------------------------------- FUNGSI SET INPUT DI AWAL RELOAD -----------------------------------------------------------
	$(document).ready(function() {

		$('#total').val(0);
		$('#diskon').val(0);
		$('#total_akhir').val(0);
		// $('#bayar').val(0);
		// $('#kembali').val(0);

	});
	// ---------------------------------------- END FUNGSI  -------------------------------------------------------------------------------


	// ---------------------------------------- FUNGSI MENGHITUNG TOTAL HARGA DARI SEMUA MENU ---------------------------------------------
	var total = 0;

	function set_total() {

		var harga;
		var data = [];

		$('#data_pesanan tr').each(function(row, tr) {

			var x = $(tr).find('td:eq(4)').text();

			data.push(x);

			// console.log(data);

			var i;

			for (i = 0; i < data.length; i++) {
				if (data[i] == '') {
					total = 0;
				} else {
					total += parseInt(data[i]);
				}
			}
			$('#total').val(total);

		})

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGHITUNG DISKON -------------------------------------------------------------------
	function diskon() {

		var disc1 = 10;
		var disc2 = 0;
		var total_diskon;

		var total_harga = parseInt($('#total').val());

		if (total_harga == 0) {
			$('#diskon').val(0);
			$('#total_akhir').val(0);
		} else if (total_harga >= 50000) {
			total_diskon = total_harga - (total_harga * disc1 / 100);
			$('#diskon').val(disc1);
			$('#total_akhir').val(total_diskon);
		} else {
			total_diskon = total_harga - (total_harga * disc2 / 100);
			$('#diskon').val(disc2);
			$('#total_akhir').val(total_diskon);
		}

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MASUKAN BAYAR -----------------------------------------------------------------------
	function bayar_click() {

		var ttl = parseInt($('#total_akhir').val());
		var kembali = 0;

		$('#bayar').on('keyup', function() {
			var bayar = $(this).val();

			if (bayar == '') {
				$('#kembali').val('');
			} else {
				kembali = parseInt(bayar) - ttl;
				$('#kembali').val(kembali);
			}
		});

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI BAYAR CASH --------------------------------------------------------------------------
	function bayar_cash() {

		var harga = $('#total_akhir').val();
		$('#bayar').val(harga);
		$('#kembali').val(0);

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI SISA POWDER --------------------------------------------------------------
	function powder_min(id) {
		$.ajax({
			type: "post",
			url: "<?= base_url('index.php/c_barista/powder_min') ?>",
			data: {
				id: id
			},
			dataType: "json"
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH SISA POWDER ----------------------------------------------------------------
	function powder_plus(id) {
		$.ajax({
			type: "post",
			url: "<?= base_url('index.php/c_barista/powder_plus') ?>",
			data: {
				id: id
			},
			dataType: "json"
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENURANGI SISA TOPPING --------------------------------------------------------------
	function topping_min() {
		var id = $('#topping').val();
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/topping_min') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH SISA TOPPING ---------------------------------------------------------------
	function topping_plus(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/topping_plus') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK SUSU PUTIH ----------------------------------------------------------
	function basic_milk_min(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/basic') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK SUSU PUTIH ----------------------------------------------------------
	function premium_milk_min(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/premium') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log('putih 2x')
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK SUSU COKLAT -----------------------------------------------------------
	function basic_milk_plus(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/basic_plus') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log('coklat')
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK SUSU COKLAT -----------------------------------------------------------
	function premium_milk_plus(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/premium_plus') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log('coklat 2x')
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK SIRUP ---------------------------------------------------------------
	function juice_min(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/sirup_min') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK SIRUP -----------------------------------------------------------------
	function juice_plus(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/sirup_plus') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK CUP -----------------------------------------------------------------
	function cup_min() {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/cup_min') ?>',
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK CUP -------------------------------------------------------------------
	function cup_plus() {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/cup_plus') ?>',
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MEMASUKKAN MENU PILIHAN KE TABEL ----------------------------------------------------
	var data = [];
	$(function() {

		$('#add_data').click(function() {
			$('#bayar').val('');
			$('#kembali').val('');

			var id_menu = $('#menu').val();
			var nama_menu = $('#menu option:selected').attr('nama');
			// var harga_menu = $('#menu option:selected').attr('harga');
			var id_jenis = $('#menu option:selected').attr('id_jenis');

			var id_sajian = $('#sajian').val();
			var nama_sajian = $('#sajian option:selected').attr('nama');
			var harga_menu = $('#sajian option:selected').attr('harga');

			var id_topping = $('#topping').val();
			var nama_topping = $('#topping option:selected').attr('nama');
			var harga_topping = $('#topping option:selected').attr('harga');

			// if(id_sajian != null){
			// 	var id_sajian = $('#sajian').val();
			// }
			// else{
			// 	var id_sajian = null;
			// }
			// -----------------------------------------------------------------
			if(nama_topping != null){
				var nama_topping = $('#topping option:selected').attr('nama');
			}
			else{
				var nama_topping = "--";
			}

			// -----------------------------------------------------------------
			if(harga_topping != null){
				var harga_topping = $('#topping option:selected').attr('harga');
			}
			else{
				var harga_topping = 0;
			}

			var harga = parseInt(harga_menu) + parseInt(harga_topping);

			// -----------------------------------------------------------------
			if (id_menu == 0) {

				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Memilih Menu'
				})

				return false;
			}

			// else if(sajian == 0){

			// 	Swal.fire({
			// 		type: 'warning',
			// 		title: 'Halllooo ...',
			// 		text: 'Harap Memilih Jenis Sajian'
			// 	})

			// 	return false;
			// }

			// else if(id_topping == 0){

			// 	Swal.fire({
			// 		type: 'warning',
			// 		title: 'Halllooo ...',
			// 		text: 'Harap Memilih Topping'
			// 	})

			// 	return false;
			// }
			else {
				powder_min.call(this, id_menu); //fungsi set sisa powder
				topping_min.call();
				cup_min.call();

				var ss_pth = 'Susu Putih';
				var ss_ckt = 'Susu Coklat';

				if (id_jenis == 1 || id_jenis == 2) {
					if (id_sajian == 1) {
						basic_milk_min.call(this, ss_pth);
					} else if (id_sajian == 2) {
						premium_milk_min.call(this, ss_pth);
					}
				} else if (id_jenis == 3 || id_jenis == 4) {
					if (id_sajian == 1) {
						basic_milk_min.call(this, ss_ckt);
					} else if (id_sajian == 2) {
						premium_milk_min.call(this, ss_ckt);
					}
				}

				$('#data_pesanan tbody:last-child').append(
					'<tr>' +
					'<td>' +
					'<input type="hidden" name="id_menu" id="id_menu" value="' + id_menu + '">' +
					'<input type="hidden" name="id_topping" id="id_tp" value="' + id_topping + '">' +
					'<input type="hidden" name="id_jenis" id="id_jenis" value="' + id_jenis + '">' +
					'<input type="hidden" name="id_sajian" id="id_sajian" value="' + id_sajian + '">' +
					'<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="del_data(this)"><i class="mdi mdi-delete-forever"></i></button>' +
					'</td>' +
					'<td>' + nama_menu + '</td>' +
					'<td>' + nama_sajian + '<input type="hidden" id="id_sajian" value="' + id_sajian + '"></td>' +
					'<td>' + nama_topping + '</td>' +
					'<td>' + harga + '</td>' +
					'</tr>'
				);

				set_total.call();
				diskon.call();
				bayar_click.call();

			}


			$('#menu').val(0);
			$('#sajian').val(0);
			$('#topping').val(0);

		});

		$('#add_data2').click(function() {
			$('#bayar').val('');
			$('#kembali').val('');

			var id_menu = $('#menu2').val();
			var nama_menu = $('#menu2 option:selected').attr('nama');			
			var id_jenis = $('#menu2 option:selected').attr('id_jenis');

			var harga_menu = $('#harga_hrg').val();
			

			if (id_menu == 0) {

				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Memilih Menu'
				})

				return false;
			} else {
				var ss_pth = 'Susu Putih';
				var juice = 'Sirup';

				powder_min.call(this, id_menu);
				cup_min.call();

				if (id_jenis == 5) {
					basic_milk_min.call(this, ss_pth);
				}
				else if(id_jenis == 6){
					juice_min.call(this, juice);
				}

				$('#data_pesanan tbody:last-child').append(
					'<tr>' +
					'<td>' +
					'<input type="hidden" name="id_menu" id="id_menu" value="' + id_menu + '">' +
					'<input type="hidden" name="id_jenis" id="id_jenis" value="' + id_jenis + '">' +
					'<input type="hidden" name="id_topping" id="id_tp" value="">' +
					'<input type="hidden" name="id_sajian" id="id_sajian" value="">' +
					'<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="del_data(this)"><i class="mdi mdi-delete-forever"></i></button>' +
					'</td>' +
					'<td>' + nama_menu + '</td>' +
					'<td>--</td>' +
					'<td>--</td>' +
					'<td>' + harga_menu + '</td>' +
					'</tr>'
				);

				set_total.call();
				diskon.call();
				bayar_click.call();

			}


			$('#menu2').val(0);

		});

		$('#konfirmasi').click(function() {
			var bayar = $('#bayar').val();
			var nama = $('#pembeli').val();
			if (nama == '') {
				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Nama Pembeli Diisi'
				});
				// window.setTimeout(function() {
				// 	document.getElementById('pembeli').focus();
				// }, 0);
				document.pembeli.focus();

			} else if (bayar == '') {
				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Mengisi Uang Bayar'
				})

				return false;
			} else {
				konfirmasi.call();
				var tgl_id;
				var wkt_id;

				var pembeli = $('#pembeli').val();
				var sub_total = $('#total').val();
				var dis = $('#diskon').val();
				var total_akhir = $('#total_akhir').val();

				var id_staff = '<?= $this->fungsi->user_login()->id_staff ?>';

				// id untuk menyimpan transaksi {
				var tanggal = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
				var waktu = new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
				// }


				// location.reload(true);


				// membuat nota baru
				$.ajax({

					url: "<?= base_url('index.php/c_barista/new_nota') ?>",
					type: "post",
					dataType: "json",
					data: {
						pembeli: pembeli,
						tanggal: tanggal,
						waktu: waktu,
						sub_total: sub_total,
						dis: dis,
						total_akhir: total_akhir,
						id_staff: id_staff
					},
					success: function(result) {

						// console.log(result.tgl , result.wkt);
						tgl_id = result.tgl;
						wkt_id = result.wkt;

						var id_n;
						$.ajax({

							url: "<?= base_url('index.php/c_barista/get_new_nota') ?>",
							type: "post",
							data: {
								tanggal: tgl_id,
								waktu: wkt_id
							},
							async: true,
							dataType: "json",
							success: function(x) {

								$.each(data, function(id) {
									// $('#id_nota').val(x.id);
									id_n = x.id;
								});


								$.ajax({

									data: {
										data_pesanan: data,
										id_n: id_n
									},
									url: "<?= base_url('index.php/c_barista/save_detail') ?>",
									type: "post",
									crossOrigin: false,
									dataType: "json",
									success: function(result) {

										if (result.status == 'failed') {
											Swal.fire(
												'Konfirmasi Pesanan',
												'Gagal !!',
												'error'
											)
										} else {
											Swal.fire({
												type: 'success',
												title: 'Konfirmasi Pesanan',
												text: 'Success'
											}).then((result) => {
												location.replace("<?= base_url('index.php/c_barista/cek_order') ?>");
											})
										}
									}
								});

							}
						});
					}

				});



			}

		});

	});
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGHAPUS PILIHAN DARI DALAM TABEL --------------------------------------------------
	function del_data(id) {

		var id_m = $('#id_menu').val();
		var id_t = $('#id_tp').val();
		var id_jenis = $('#id_jenis').val();
		var id_sajian = parseInt($('#id_sajian').val());

		var ss_pth = 'Susu Putih';
		var ss_ckt = 'Susu Coklat';
		var juice = 'Sirup';

		if (id_jenis == 1 || id_jenis == 2) {


			if (id_sajian == 1) {
				basic_milk_plus.call(this, ss_pth);
			} else if (id_sajian == 2) {
				premium_milk_plus.call(this, ss_pth);
			}
		} 
		
		else if (id_jenis == 3 || id_jenis == 4) {

			if (id_sajian == 1) {
				basic_milk_plus.call(this, ss_ckt);
			} else if (id_sajian == 2) {
				premium_milk_plus.call(this, ss_ckt);
			}
		} 
		
		else if (id_jenis == 5) {
			basic_milk_plus.call(this, ss_pth);
		}

		else if (id_jenis == 6){
			juice_plus.call(this, juice);
		}

		powder_plus.call(this, id_m);
		topping_plus.call(this, id_t);
		cup_plus.call();


		id.closest('tr').remove();

		set_total.call();
		diskon.call();
		bayar_click.call();

		$('#bayar').val('');
		$('#kembali').val('');

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI KONFIRMASI PESANAN ------------------------------------------------------------------
	function konfirmasi() {


		$('#data_pesanan tr').each(function(row, tr) {
			if ($(tr).find('td:eq(1)').text() == '') {

			} else {
				var x = {
					'id_menu': $(tr).find('#id_menu').val(),
					'menu': $(tr).find('td:eq(1)').text(),
					'id_sajian': $(tr).find('#id_sajian').val(),
					'sajian': $(tr).find('td:eq(2)').text(),
					'id_topping': $(tr).find('#id_tp').val(),
					'topping': $(tr).find('td:eq(3)').text(),
					'harga': $(tr).find('td:eq(4)').text(),
				};

				data.push(x);
			}
		});
		console.log(data);
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------
</script>