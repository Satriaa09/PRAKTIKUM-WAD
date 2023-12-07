<?php

require 'connect.php';

// (1) Mulai session
session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = $_POST['email'];
    // b. Ambil nilai input name
    $name = $_POST['name'];
    // c. Ambil nilai input username
    $username = $_POST['username'];
    // d. Ambil nilai input password
    $password = $_POST['password'];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $password = password_hash($password, PASSWORD_DEFAULT);
//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $result = mysqli_query($conn, "SELECT email FROM users where email = '$email'");
//

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if ( mysqli_num_rows( $result ) == 0 ) {
        // a. Buatlah query untuk melakukan insert data ke dalam database
        $result = mysqli_query($conn, "INSERT INTO users VALUE ('', '$name', '$username', '$email', '$password')");
        // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
        //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
        if ( $result ) {
            $_SESSION['message'] = 'Pendaftaran Sukses, Silahkan Login';
            $_SESSION['color'] = 'success' ;
            header("Location: ../views/login.php");
        }else{
            $_SESSION['message'] = 'Pendaftaran Gagal, Silahkan Coba Lagi';
            $_SESSION['color'] = 'danger' ;
        }
    }
//      
// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
    else{
        $_SESSION['message'] = 'Email Sudah Terdaftar';
        $_SESSION['color'] = 'danger' ;
        header("Location: ../views/register.php");
    }
//

?>