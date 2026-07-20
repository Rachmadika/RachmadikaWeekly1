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

function upload() {
    $namaFile   =$_FILES['foto']['name'];
    $ukuranFile =$_FILES['foto']['size'];
    $error      =$_FILES['foto']['error'];
    $tmpName    =$_FILES['foto']['tmp_name'];

    // 1. Check if no image was uploaded (Error code 4)
    if ($error === 4) {
        echo "<script>alert('Harap pilih berkas foto profil terlebih dahulu!');</script>";
        return false;
    }

    // 2. Security Validation: Allowed file extensions
    $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar,$ekstensiValid)) {
        echo "<script>alert('Format berkas tidak valid! Harap unggah berkas bertipe .jpg, .jpeg, .png, atau .webp.');</script>";
        return false;
    }

    // 3. Security Validation: Maximum file size (2 MB = 2,000,000 bytes)
    if ($ukuranFile > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar! Batas maksimal kapasitas berkas adalah 2 MB.');</script>";
        return false;
    }

    // 4. Prevent File Name Collision: Generate unique file ID
    $namaFileBaru = uniqid() . '.' .$ekstensiGambar;

    // 5. Move physical file to target directory
    move_uploaded_file($tmpName, 'img/' .$namaFileBaru);

    return $namaFileBaru;
}

function tambah($data) {
    global $koneksi;

    // Ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    // Upload foto
    $foto = upload();
    if (!$foto) {
        return false;
    }

    // Query insert data ke dalam tabel mahasiswa
    $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
              VALUES 
              ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$foto')";

    // Jalankan query-nya
    mysqli_query($koneksi, $query);

    // Kembalikan angka jumlah baris yang terpengaruh
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
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    // Cek apakah user mengunggah foto baru
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
        if (!$foto) {
            return false;
        }
        // Hapus foto lama dari directory fisik jika ada dan bukan gambar bawaan
        if (!empty($fotoLama) && $fotoLama !== 'images.jpeg' && file_exists('img/' . $fotoLama)) {
            unlink('img/' . $fotoLama);
        }
    }

    // Execute SQL Update query
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                prodi = '$prodi',
                email = '$email',
                no_hp = '$no_hp',
                foto = '$foto'
              WHERE id = '$id'";

    mysqli_query($koneksi,$query);

    // Return affected rows
    return mysqli_affected_rows($koneksi);
}
?>