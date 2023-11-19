<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
require "connect.php";
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET["id"];
$ambildata = query("SELECT * FROM showroom_mobil WHERE id=$id")[0];
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM showroom_mobil  WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    // (4) Buatkan perkondisi jika eksekusi query berhasil
    if(hapus($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'list_mobil.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'list_mobil.php';
            </script>
            ";
    }
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>