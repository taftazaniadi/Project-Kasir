<?php
if (isset($_COOKIE['id_staff']) && isset($_COOKIE['status'])) {
    $id = $_COOKIE["id_staff"];
    $status = $_COOKIE["status"];
    if ($status == "hapus") {
        $hapus = mysqli_query($query, "DELETE FROM staff WHERE id_staff = '$id'");
        echo "document.cookie='status=standby';";
    }
    echo "<script>window.location.replace('Data_Karyawan')</script>";
}
