<?php error_reporting(E_ALL ^ E_WARNING);?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Data Karyawan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="Dashboard">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Karyawan</span></li>
                <li><span>Data Karyawan</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <?php
        include "../lib/koneksi.php";
        //cari id terakhir ditanggal hari ini
        $query1 = "SELECT MAX(id_staff) as maxID FROM staff";
        $hasil = mysqli_query($query, $query1);
        $data = mysqli_fetch_array($hasil);
        $idMax = $data['maxID'];
        //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
        $NoUrut = (int) substr($idMax, 1, 4); // ambil 4 digit dimulai dari index ke 8
        $NoUrut++; //nomor urut +1
   
        //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
        $NewID = sprintf('S%04s', $NoUrut);
                        
    ?>

    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Karyawan</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                <thead>
                    <tr>
                        <th class='kk' style="opacity:0; width:5%"></th>
                        <th class="col-lg-1">ID Staff</th>
                        <th class="col-lg-2">Nama</th>
                        <th class="col-lg-1">Username</th>
                        <th class="col-lg-1">Password</th>
                        <th class="col-lg-2">Kontak</th>
                        <th class="col-lg-1">Alamat</th>
                        <th class="col-lg-3">Email</th>
                        <th class="col-lg-1">Actions</th>

                    </tr>
                </thead>
                <tbody class='dafuk'>
                    <?php
                        include "../lib/koneksi.php";
                        $kueriStaff= mysqli_query($query, "select * from staff");
                        while ($staff=mysqli_fetch_assoc($kueriStaff)) {
                    ?>
                    <tr class="gradeX">
                        <td class='divcek'><input type="checkbox" class="cek"></td>
                        <td class='aidi'><?php echo $staff['id_staff']?></td>
                        <td><?php echo $staff['Nama']?></td>
                        <td><?php echo $staff['username']?></td>
                        <td><?php echo $staff['password']?></td>
                        <td><?php echo $staff['contact']?></td>
                        <td><?php echo $staff['alamat']?></td>
                        <td><?php echo $staff['email']?></td>
                        <td class="actions">
                            <!-- <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#edit-row" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#remove-row" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end: page -->
</section>
</div>

<aside id="sidebar-right" class="sidebar-right">

    </section>

    <div id="dialog" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Are you sure?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <p class='isinotif'></p>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button id="dialogConfirm" class="btn btn-primary">Confirm</button>
                        <button id="dialogCancel" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <script>
    localStorage.setItem('NewID', '<?php echo $NewID?>');
    </script>