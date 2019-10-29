<?php
    include "../../../lib/koneksi.php";
    // ------------- Check if file is not empty ------------
    if(!empty($_FILES)) {
        // $fileName = $_FILES['file']['name'];
        // $source_path = $_FILES['file']['tmp_name'];
        // $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
 
        // ------ Replacing file name with new file name ---------
        // $targetFile = time()."-".time()."-".strtolower(str_replace(" ","-",$fileName));
        // $target_path = "./uploads/".$targetFile;

        //Test
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
                    
                    // echo "<script>
                    //     alert($jenis);
                    // </script>";

                    // Insert member data in the database
                    $query->query("INSERT INTO powder (id_jenis, nama_powder, stock_awal, penambahan, total, sisa, id_region) VALUES ('".$jenis."', '".$nama."', '".$stock."', '".$tambah."', '".$total."', '".$sisa."', '".$region."')");
                }

                
                // Close opened CSV file
                fclose($csvFile);
                // header('Location: Import');
            }
        }
        //Test
   
    }
?>