<?php
    // Memanggil file fungsi
    require 'fungsi.php';

    // Mengambil data dari database
    $query = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata($query); // wadah isi data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1 align="center">Selamat Datang Di My Website</h1>
    
    <table border="1" align="center" cellspacing="0" cellpadding="10px">
        <tr>
            <td><a href="index.php">Rumah</a></td>
            <td><a href="profil.php">Profil</a></td>
            <td><a href="kontak.php">Kontak</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    
    <br><br>
    
    <h2 align="center">Data Mahasiswa</h2>
    <a href="tambahdata.php"><button>Tambah Data</button></a>
    <br><br>

    <table border="1" cellspacing="0" cellpadding="5px" width="75%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Nomor Whatsapp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
            $no = 1;
            foreach($mahasiswas as $mhs) {
        ?>
        <tr>
            <td align="center"><?= $no ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["nim"] ?></td>
            <td><?= $mhs["prodi"] ?></td>
            <td><?= $mhs["email"] ?></td>
            <td><?= $mhs["no_hp"] ?></td>
            <td align="center"><img src="images.jpeg" width="90px"></td>
            <td align="center">
    <a href="editdata.php"><button>edit</button></a> 
    
    <a href="hapusdata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
        <button>hapus</button>
    </a>
</td>
        </tr>
        <?php
                $no++;
            } // penutup foreach
        ?>
    </table>

    <br><br>

    <h2 align="center">Latihan Tabel HTML</h2>
    <table border="1" align="center" cellpadding="20px" cellspacing="0">
        <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td rowspan="2" colspan="2" align="center">Gabungan Baris & Kolom</td>
            <td>2,4</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,4</td>
        </tr>
        <tr>
            <td>4,1</td>
            <td>4,2</td>
            <td>4,3</td>
            <td>4,4</td>
        </tr>
    </table>
    
</body>
</html>