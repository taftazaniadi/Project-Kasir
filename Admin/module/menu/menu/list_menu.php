<?php error_reporting(E_ALL ^ E_WARNING); ?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Daftar Menu</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="Dashboard">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Inventaris</span></li>
				<li><span>Daftar Menu</span></li>
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

			<h2 class="panel-title">Daftar Menu</h2>
		</header>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-md">
						<a href="Add_Menu"><button class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
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
									<th>#</th>
									<th>Nama Menu</th>
									<th>Jenis Menu</th>
									<th>Harga</th>
									<th>Stock Awal</th>
									<th>Penambahan</th>
									<th>Total Stock</th>
									<th>Sisa Stock</th>
									<th>Penyajian</th>
									<th width="8%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "../lib/koneksi.php";
									$kueriMenu = mysqli_query($query, "SELECT p.id_powder, j.nama_jenis, p.nama_powder, detail_penyajian.harga, p.stock_awal, p.penambahan, p.total, p.sisa, s.id_penyajian, s.nama_penyajian, r.id_region FROM powder p JOIN jenis_menu j ON p.id_jenis = j.id_jenis JOIN detail_penyajian ON p.id_powder = detail_penyajian.id_powder JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian JOIN region r ON r.id_region = detail_penyajian.id_region WHERE detail_penyajian.id_region = " . $serves['id_region']);
									for ($x = 1; $x <= $menu = mysqli_fetch_assoc($kueriMenu); $x++) {
										?>
									<tr class="gradeX">
										<td><?php echo $x ?></td>
										<td style="display:none;" id="aidi"><?php echo $menu['id_powder'] ?></td>
										<td><?php echo $menu['nama_powder'] ?></td>
										<td><?php echo $menu['nama_jenis'] ?></td>
										<td><?php echo $menu['harga'] ?></td>
										<td><?php echo $menu['stock_awal'] ?></td>
										<td><?php echo $menu['penambahan'] ?></td>
										<td><?php echo $menu['total'] ?></td>
										<td><?php echo $menu['sisa'] ?></td>
										<td style="display:none;" id="region"><?php echo $menu['id_region'] ?></td>
										<td style="display:none;" id="saji"><?php echo $menu['id_penyajian'] ?></td>
										<td><?php echo $menu['nama_penyajian'] ?></td>
										<td>
											<a href="#"><button type="button" class="btn-edit mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a>
											<a href="#"><button type="button" class="btn-hapus mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
										</td>
									</tr>
								<?php
									} ?>
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
			let edit = "Edit_Menu?id_powder=" + id;
			document.cookie = "id_powder=" + id;
			document.cookie = "status=update";
			window.location.replace(edit);
		});
		$('.btn-hapus').click(function() {
			let id = $(this).parent().parent().parent().children("#aidi").html();
			let saji = $(this).parent().parent().parent().children("#saji").html();
			let region = $(this).parent().parent().parent().children("#region").html();
			document.cookie = "id_powder=" + id;
			document.cookie = "id_penyajian=" + saji;
			document.cookie = "id_region=" + region;
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
					// window.location.reload();
					window.location.replace("Hapus_Menu")
				});
		});
	})
</script>

<script>
	$(document).ready(function() {
		$('table.display').DataTable();
	});
</script>