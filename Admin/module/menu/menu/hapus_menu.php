<?php
					if (isset($_COOKIE["status"]) ) {
						$id = $_COOKIE["id_powder"];
						$saji = $_COOKIE["id_penyajian"];
						$region = $_COOKIE["id_region"];
						include "../lib/koneksi.php";
						$detail = mysqli_query($query, "SELECT COUNT(*) FROM detail_penyajian WHERE id_powder = '$id' AND id_region = '$region'");
						$arr_detail = mysqli_fetch_array($detail);
						$hitungDetail = $arr_detail[0];

						if ($hitungDetail == 1) {
							$hapus = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$id' AND id_penyajian = '$saji' AND id_region = '$region'");
							$hapus1 = mysqli_query($query, "DELETE FROM powder WHERE id_powder = '$id' AND id_region = '$region'");
						} else {
							$hapus = mysqli_query($query, "DELETE FROM detail_penyajian WHERE id_powder = '$id' AND id_penyajian = '$saji' AND id_region = '$region'");
                        }
                        echo "<script>window.location.replace('Menu')</script>";
					}
                	?>