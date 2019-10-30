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
                    
                    // echo "<script>
                    //     alert($jenis);
                    // </script>";

                    // Insert member data in the database
                    $query->query("INSERT INTO ekstra (nama_ekstra, stock_awal, penambahan, total, sisa, satuan, id_region) VALUES ('".$nama."', '".$stock."', '".$tambah."', '".$total."', '".$sisa."', '".$satuan."', '".$region."')");
                }

                // Close opened CSV file
                fclose($csvFile);
                // header('Location: Import');
            }
        }
    }
?>