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

function ubah($data) {
    global $koneksi;

    // Sanitize and capture input data, including the mandatory hidden ID field
    $id    = htmlspecialchars($data["id"]);
    $nama  = htmlspecialchars($data["nama"]);
    $nim   = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    // Execute SQL Update query (excluding photo field as per project scope)
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                prodi = '$prodi',
                email = '$email',
                no_hp = '$no_hp'
              WHERE id = '$id'";

    mysqli_query($koneksi,$query);

    // Return affected rows
    return mysqli_affected_rows($koneksi);
}
?>