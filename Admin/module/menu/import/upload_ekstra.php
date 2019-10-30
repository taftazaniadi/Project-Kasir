<?php
    include "../../../../lib/koneksi.php";
    
    // ------------- Check if file is not empty ------------
    if(!empty($_FILES)) {
        // Allowed mime types
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        // Validate whether selected file is a CSV file
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
            
            // If the file is uploaded
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                
                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                
                // Skip the first line
                fgetcsv($csvFile);
                
                
                // Parse data from CSV file line by line
                while(($line = fgetcsv($csvFile)) !== FALSE){
                    // Get row data
                    $nama  = $line[0];
                    $stock  = $line[1];
                    $tambah = $line[2];
                    $total = $line[3];
                    $sisa = $line[4];
                    $satuan = $line[5];
                    $region = $line[6];

                    // Insert member data in the database
                    $query->query("INSERT INTO ekstra (nama_ekstra, stock_awal, penambahan, total, sisa, satuan, id_region) VALUES ('".$nama."', '".$stock."', '".$tambah."', '".$total."', '".$sisa."', '".$satuan."', '".$region."')");
                    $cari = $query->query("SELECT id_ekstra FROM ekstra WHERE nama_ekstra = '".$nama."' AND satuan = '".$satuan."' AND id_region = '".$region."'");
                    $id = $query->query("SELECT COUNT(id_ekstra) FROM ekstra WHERE nama_ekstra = '".$nama."' AND satuan = '".$satuan."' AND id_region = '".$region."'");

                    $count = $cari->fetch_row();

                    if ($id->num_rows > 0) {
						for ($x = 1; $x <= 6; $x++) {
							$query->query("INSERT INTO detail_ekstra(id_ekstra, id_jenis, pemakaian) VALUES ('$count[0]',$x, 0)");
						}
					}
                }

                // Close opened CSV file
                fclose($csvFile);
                // header('Location: Import');
            }
        }
    }
?>