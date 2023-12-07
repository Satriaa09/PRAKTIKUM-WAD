<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$conn = mysqli_connect('localhost', 'root', '', 'modul4');
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
};
// 

?>