<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1 align="center">
        Selamat Datang Di My Website
    </h1>
    <h2>
    <table border="1" align="center" cellspacing="0" cellpadding="100px">
        <tr>
            <td><a href="index.php">Rumah</a></td>
            <td><a href="profil.php">Profil</a></td>
            <td><a href="kontak.php">Kontak</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    <br> <br>
    </h2> Data Mahasiswa </h2>
    <a href="tambahdata.php"><button>Tambah Data</button><a>
    <table border="1" cellspacing="5px">
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
         <tr>
            <th>1</th>
            <th>Rachmadika</th>
            <th>13242520055</th>
            <th>Teknologi Informasi Dan Digital</th>
            <th>rizaqif52@gmail.com</th>
            <th>085801307912</th>
            <th><img src="images.jpeg" width="90px" align="center" ></th>
            <td>
                <a href="editdata.php"><button>edit</button></a> 
                <a href="editdata.php"><button>hapus</button></a>
            </td>
         </tr>
         <tr>
                <td>baris 2, kolom 1</td>
                <td>baris 2, kolom 2</td>
                <!-- <td>baris 2, kolom 3</td> -->
            </tr>
        </table>

        </table>
        <br><br>
        <h2>Data Mahasiswa</h2>
        <table border="1" cellpadding="5px">
            <tr>
                <td>1,1</td>
                <td>1,2</td>
                <td>1,3</td>
                <td>1,4</td>
                <!-- <td>baris 2, kolom 2</td> -->
            </tr>
            <tr>
                <td>2,1</td>
                <td rowspan="2" colspan="2"></td>
                <td>2,4</td>
                <!-- <td>baris 2, kolom 3</td> -->
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
</php>