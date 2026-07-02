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

// ... kode fungsi tampildata yang sudah ada sebelumnya ...

function hapus($id) 
{
    global $koneksi;
    
    // Perintah untuk menghapus data berdasarkan ID
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");
    
    // Mengembalikan angka > 0 jika ada data yang berhasil dihapus
    return mysqli_affected_rows($koneksi);
}

?>