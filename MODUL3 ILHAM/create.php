<!-- Pada file ini kalian membuat coding untuk logika create / menambahkan mobil pada showroom -->

<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
require "connect.php";
// 

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
if(isset($_POST["create"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if(buat($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'list_mobil.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'list_mobil.php';
        </script>
        ";
    }
}
else {
    echo "Hanya metode POST yang diizinkan.";
}
// 

// (3) Jika sudah coba deh kalian ambil data dari form (CLUE : pakai POST)
function buat($data){
    global $conn;
    // a. Ambil data nama mobil
    $nama = htmlspecialchars($data["nama_mobil"]);
    // b. Ambil data brand mobil
    $brand = htmlspecialchars($data["brand_mobil"]);
    // c. Ambil data warna mobil
    $warna = htmlspecialchars($data["warna_mobil"]);
    // d. Ambil data tipe mobil
    $tipe = htmlspecialchars($data["tipe_mobil"]);
    // e. Ambil data harga mobil
    $harga = htmlspecialchars($data["harga_mobil"]);
    // (4) Kalau sudah, kita lanjut Query / Menambahkan data pada SQL (Disini ada perintah untuk SQL), Masukkan ke tabel showroom_mobil (include setiap nama column)
    $query = "INSERT INTO showroom_mobil
            VALUES
            ('', '$nama', '$brand', '$warna', '$tipe', '$harga')
        ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // (5) Buatkan kondisi jika eksekusi query berhasil

    // (6) Jika terdapat kesalahan, buatkan eksekusi query gagalnya 

// (7) Tutup koneksi ke database setelah selesai menggunakan database
    mysqli_close($conn);
}
?>