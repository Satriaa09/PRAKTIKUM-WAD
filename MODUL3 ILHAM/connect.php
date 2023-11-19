<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->
<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$conn = mysqli_connect("localhost:8080", "root", "", "db_wad_m0dul3");


// 

// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// 
?>