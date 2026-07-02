<?php

$koneksi = mysqli_connect("localhost", "root", "", "rachweekly");

function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    // Perbaikan 1: Gunakan [] untuk array kosong, bukan {}
    $rows = []; 

    while($row = mysqli_fetch_assoc($result))
    {
        // Perbaikan 2: Gunakan tanda =, bukan +
        $rows[] = $row; 
    }

    return $rows;
}

?>