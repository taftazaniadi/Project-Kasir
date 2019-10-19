<?php
	if (isset($_COOKIE['id_topping']) && isset($_COOKIE['status'])) {
		$id = $_COOKIE["id_topping"];
		$status = $_COOKIE["status"];
		if ($status == "hapus") {
			$hapus = mysqli_query($query, "DELETE FROM topping WHERE id_topping = '$id'");
			echo "document.cookie='status=standby';";
        }
        echo "<script>window.location.replace('Topping')</script>";
	}
