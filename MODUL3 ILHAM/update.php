<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
require "connect.php";
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET["id"];
$ambildata = query("SELECT * FROM showroom_mobil WHERE id=$id")[0];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function ubah($data){
        global $conn;
        global $id;
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $nama = $data["nama_mobil"];
        $brand = $data["brand_mobil"];
        $warna = $data["warna_mobil"];
        $tipe = $data["tipe_mobil"];
        $harga = $data["harga_mobil"];
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $query = "UPDATE showroom_mobil SET
                nama_mobil = '$nama',
                brand_mobil = '$brand',
                warna_mobil = '$warna',
                tipe_mobil = '$tipe',
                harga_mobil = '$harga'
            WHERE id = $id
                ";
        // Eksekusi perintah SQL
        mysqli_query($conn, $query);
        // Buatkan kondisi jika eksekusi query berhasil
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        return mysqli_affected_rows($conn);
}
    // Panggil fungsi update dengan data yang sesuai
    if(isset($_POST["update"])) {

        //cek apakah data berhasil diuabh atau tidak
        if(ubah($_POST) > 0 ) {
            echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'list_mobil.php';
            </script>
            ";
        }else {
            echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'list_mobil.php';
            </script>
            ";
        }
    
    }
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>