<?php
	if (isset($_COOKIE['id_ekstra']) && isset($_COOKIE['status'])) {
		$id = $_COOKIE["id_ekstra"];
		$status = $_COOKIE["status"];
		if ($status == "hapus") {
			$hapus = mysqli_query($query, "DELETE FROM ekstra WHERE id_ekstra = '$id'");
			echo "document.cookie='status=standby';";
        }
        echo "<script>window.location.replace('Ekstra')</script>";
	}
?>