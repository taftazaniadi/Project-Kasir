<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Ekstra</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="Dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Inventaris</span></li>
				<li><span>Ekstra</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
	<!-- start: page -->
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>

			<h2 class="panel-title">Ekstra</h2>
		</header>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-md">
						<a href="Add_Ekstra"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
					</div>
				</div>
			</div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) { ?>

					<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
						<a href="#tab-<?php echo $serves['id_region'] ?>" aria-controls="#tab-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
					</li>
				<?php } ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) {
					?>
					<div role="tabpanel" <?php if ($count == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab-<?php echo $serves['id_region'] ?>">
						<table id="example1-tab1-dt" class="table table-striped table-condensed display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nama Ekstra</th>
									<th>Stock Awal</th>
									<th>Penambahan</th>
									<th>Total Stock</th>
									<th>Sisa Stock</th>
									<th>Satuan</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "../lib/koneksi.php";
									$ekstra = mysqli_query($query, "SELECT * FROM ekstra WHERE id_region = " . $serves['id_region']);
									while ($hasil = mysqli_fetch_array($ekstra)) {
										?>
									<tr class="gradeX">
										<td style="display:none;" id="aidi"><?php echo $hasil['id_ekstra']; ?></td>
										<td><?php echo $hasil['nama_ekstra']; ?></td>
										<td><?php echo $hasil['stock_awal'] ?></td>
										<td><?php echo $hasil['penambahan'] ?></td>
										<td><?php echo $hasil['total'] ?></td>
										<td><?php echo $hasil['sisa'] ?></td>
										<td><?php echo $hasil['satuan'] ?></td>
										<td style="display:none" id="region"><?php echo $hasil['id_region'] ?></td>
										<td>
											<a href="#"><button type="button" class="btn-edit mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a>
											<a href="#"><button type="button" class="btn-hapus mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>
			<h2 class="panel-title">Detail Penggunaan</h2>
		</header>
		<div class="panel-body">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) { ?>

					<li role="presentation" <?php if ($count == 0) { ?> class="active" <?php } ?>>
						<a href="#tab1-<?php echo $serves['id_region'] ?>" aria-controls="#tab1-<?php echo $serves['id_region'] ?>" role="tab" data-toggle="tab"><?php echo $serves['nama_region'] ?></a>
					</li>
				<?php } ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php
				include "../lib/koneksi.php";
				$list = mysqli_query($query, "SELECT * FROM region");
				foreach ($list as $count => $serves) {
					?>
					<div role="tabpanel" <?php if ($count == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab1-<?php echo $serves['id_region'] ?>">
						<table id="example1-tab1-dt" class="table table-striped table-condensed" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nama Ekstra</th>
									<th>Basic</th>
									<th>Premium</th>
									<th>Soklat</th>
									<th>Yakult</th>
									<th>Fresh and Juice</th>
									<th>Total Pemakaian</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "../lib/koneksi.php";
									$data = mysqli_query($query, "SELECT ekstra.nama_ekstra, 
									IF(id_jenis = 1, pemakaian, 0) AS basic_use,
									IF(id_jenis = 2, pemakaian, 0) AS premium_use,
									IF(id_jenis = 3, pemakaian, 0) AS soklat_use,
									IF(id_jenis = 4, pemakaian, 0) AS yakult_use,
									IF(id_jenis = 5, pemakaian, 0) AS juice_use,
									SUM(pemakaian) AS total
									FROM detail_ekstra dt
									JOIN ekstra ON ekstra.id_ekstra = dt.id_ekstra
									WHERE (dt.id_jenis BETWEEN 1 AND 5) AND dt.id_region = '" . $serves['id_region'] . "'
									GROUP BY ekstra.nama_ekstra");
									while ($tampil = mysqli_fetch_array($data)) {
										?>
									<tr>
										<td><?php echo $tampil['nama_ekstra'] ?></td>
										<td><?php echo $tampil['basic_use'] ?></td>
										<td><?php echo $tampil['premium_use'] ?></td>
										<td><?php echo $tampil['soklat_use'] ?></td>
										<td><?php echo $tampil['yakult_use'] ?></td>
										<td><?php echo $tampil['juice_use'] ?></td>
										<td><?php echo $tampil['total'] ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- end: page -->
</section>
</div>

<script>
	if (localStorage.status == undefined || localStorage.status == 3) {
		localStorage.setItem("status", 2);
	} else {
		localStorage.setItem("status", 3);
		window.location.reload();
	}
	$(document).ready(() => {
		$('.btn-edit').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			let edit = "Edit_Ekstra?id_ekstra=" + id;
			document.cookie = "id_ekstra=" + id;
			window.location.replace(edit);
		});
		$('.btn-hapus').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			document.cookie = "id_ekstra=" + id;
			document.cookie = "status=hapus";
			swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this data!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function() {
					swal("Deleted!", "Your data has been deleted.", "success");
					window.location.replace('Hapus_Ekstra');
				});
		});
	})
</script>

<script>
	$(document).ready(function() {
		$('table.display').DataTable();
	});
</script>