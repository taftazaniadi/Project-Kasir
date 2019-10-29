<?php
    // Database Connection
    include "../../../../lib/koneksi.php";

    // get Users
    $data = "SELECT * FROM ekstra ORDER BY id_ekstra";
    if (!$result = mysqli_query($query, $data)) {
        exit(mysqli_error($query));
    }

    $users = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Ekstra.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID Ekstra', 'Nama Ekstra', 'Stock Awal', 'Penambahan', 'Total Stock', 'Sisa', 'Satuan', 'ID Region'));

    if (count($users) > 0) {
        foreach ($users as $row) {
            fputcsv($output, $row);
        }
    }
?>