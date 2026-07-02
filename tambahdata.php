<?php
// Hubungkan dengan file fungsi
require 'fungsi.php';

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // Cek apakah data berhasil ditambahkan atau tidak menggunakan fungsi tambah()
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1 align="center">Tambah Data Mahasiswa</h1>
    
    <table border="0" align="center">
        <tr>
            <td><a href="mahasiswa.php">⬅ Kembali ke Data Mahasiswa</a></td>
        </tr>
    </table>
    <br>

    <form action="" method="post">
        <table border="1" cellpadding="10px" cellspacing="0" align="center">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="no_hp">Nomor Whatsapp</label></td>
                <td>:</td>
                <td><input type="text" name="no_hp" id="no_hp" required autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <button type="submit" name="submit" onclick="return confirm('Apakah Anda yakin data yang diisi sudah benar?');">Tambah Data</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>