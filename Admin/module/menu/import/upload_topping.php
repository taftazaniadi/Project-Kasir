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
                    $harga = $line[1];
                    $stock  = $line[2];
                    $tambah = $line[3];
                    $total = $line[4];
                    $sisa = $line[5];
                    $region = $line[6];

                    // Insert member data in the database
                    $query->query("INSERT INTO topping (nama_topping, harga, stock_awal, penambahan, total, sisa, id_region) VALUES ('".$nama."', '".$harga."', '".$stock."', '".$tambah."', '".$total."', '".$sisa."', '".$region."')");
                }

                // Close opened CSV file
                fclose($csvFile);
            }
        }   
    }
?>