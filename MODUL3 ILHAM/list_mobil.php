<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $ambildata = query("SELECT * FROM showroom_mobil");
            ?>

            <!-- // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel' -->

            <!--  **********************  1  **************************     -->
            <table class="table table-striped" border="1">

                <tr class="table-info">
                    <th class="text-center">Aksi</th>
                    <th class="text-center">No</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama Mobil</th>
                    <th class="text-center">Brand Mobil</th>
                    <th class="text-center">Warna Mobil</th>
                    <th class="text-center">Tipe Mobil</th>
                    <th class="text-center">Harga Mobil</th>
                </tr>

                <?php
                $i = 1;
                if ($ambildata) : ?> 
                    <?php foreach ($ambildata as $row) : ?>
                        <tr>
                            <td class="text-center">
                                <a href="form_detail_mobil.php?id=<?= $row["id"]; ?>">Detail</a>
                            </td>
                            <td class="text-center"><?= $i; ?></td>
                            <td class="text-center"><?= $row["id"]; ?> </td>
                            <td class="text-center"><?= $row["nama_mobil"]; ?> </td>
                            <td class="text-center"><?= $row["brand_mobil"]; ?></td>
                            <td class="text-center"><?= $row["warna_mobil"]; ?></td>
                            <td class="text-center"><?= $row["tipe_mobil"]; ?></td>
                            <td class="text-center"><?= $row["harga_mobil"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>                
            <!--  **********************  1  **************************     -->

            <!--  **********************  2  **************************     -->
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </table>          
            <!--  **********************  2  **************************     -->
        </div>
    </center>
</body>
</html>
