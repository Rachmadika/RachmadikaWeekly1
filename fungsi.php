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

function tambah($data) {
    global $koneksi;

    // Ambil data dari tiap elemen dalam form
    // htmlspecialchars digunakan agar jika user iseng memasukkan elemen HTML/Script, tidak akan dieksekusi sebagai sistem (keamanan)
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    // Query insert data ke dalam tabel mahasiswa
    // Perhatikan urutan kolomnya. Karena foto belum difungsikan, kita lewati kolom foto.
    $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp) 
              VALUES 
              ('$nama', '$nim', '$prodi', '$email', '$no_hp')";

    // Jalankan query-nya
    mysqli_query($koneksi, $query);

    // Kembalikan angka jumlah baris yang terpengaruh (jika sukses = 1, jika gagal = -1 / 0)
    return mysqli_affected_rows($koneksi);
}
?>