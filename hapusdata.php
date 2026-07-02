<?php
// Hubungkan dengan file fungsi
require 'fungsi.php';

// Ambil data id yang dikirimkan melalui URL
$id = $_GET["id"];

// Cek apakah fungsi hapus berhasil (menghasilkan angka lebih dari 0)
if (hapus($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
}
?>