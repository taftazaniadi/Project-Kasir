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
                    $jenis   = $line[0];
                    $nama  = $line[1];
                    $stock  = $line[2];
                    $tambah = $line[3];
                    $total = $line[4];
                    $sisa = $line[5];
                    $region = $line[6];
                    $saji = explode(";", $line[7]);
                    $harga = explode(";", $line[8]);

                    // Insert member data in the database
                    $query->query("INSERT INTO powder (id_jenis, nama_powder, stock_awal, penambahan, total, sisa, id_region) VALUES ('".$jenis."', '".$nama."', '".$stock."', '".$tambah."', '".$total."', '".$sisa."', '".$region."')");
                    $cari = $query->query("SELECT id_powder FROM powder WHERE id_jenis = '".$jenis."' AND nama_powder = '".$nama."' AND stock_awal = '".$stock."' AND id_region = '".$region."' ORDER BY id_powder DESC LIMIT 1");
                    $data = mysqli_fetch_row($cari);

                    for($z = 0; $z < count($saji, COUNT_NORMAL ); $z++) {
                        $query->query("INSERT INTO detail_penyajian(id_powder, id_penyajian, harga) VALUES('$data[0]', '$saji[$z]', '$harga[$z]')");
                    }
                }

                // Close opened CSV file
                fclose($csvFile);
                // header('Location: Import');
            }
        }
    }
?>