<?php
	if (isset($_COOKIE["status"]) ) {
		$id = $_COOKIE["id_powder"];
		$saji = $_COOKIE["id_penyajian"];
		include "../lib/koneksi.php";
		$detail = mysqli_query($query, "SELECT COUNT(*) FROM detail_penyajian WHERE id_powder = '$id'");
		$arr_detail = mysqli_fetch_array($detail);
		$hitungDetail = $arr_detail[0];		

		if ($hitungDetail == 1) {
			$hapus = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$id' AND id_penyajian = '$saji'");
			// $hapus1 = mysqli_query($query, "DELETE FROM powder WHERE id_powder = '$id'");
		} else {
			$hapus = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$id' AND id_penyajian = '$saji'");
        }
        echo "<script>window.location.replace('Detail_Menu?id_powder=$id')</script>";
	}
