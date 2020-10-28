<?php
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commers</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/all.css">
    <link rel="shortcut icon" href="asset/images/icon.png" type="image/x-icon">
</head>
<body>
    
    <div class="container mb-3 mt-5">
        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card mx-auto" style="width: 30rem;">
                    <div class="card-body">
                        <h2>input data</h2>
                                <label for="exampleFormControlSelect1">Jenis Barang</label>
                                <select class="form-control" name="jenis_produk">
                                    <option>Elektronik</option>
                                    <option>Perabotan</option>
                                    <option>Aksesoris</option>
                                    <option>Transportasi</option>
                                    <option>Pakaian</option>
                                    <option>Makanan</option>
                                    <option>Minuman</option>
                                    <option>Lainnya</option>
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">nama produk</label>
                                    <input type="text" required name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">harga</label>
                                    <input type="number" required name="harga" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tentang Produk</label>
                                    <textarea class="form-control" required name="deskripsi" rows="3"></textarea>
                                </div>
                                <div>
                                <div>
                                    <label for="exampleInputEmail1">Gambar</label>
                                    <br>
                                    <input type="file" name="gambar">
                                </div>
                                
                                <button type="submit" class="btn btn-danger mt-3" name="kirim"><b>simpan</b></button>

                                <a href="menu.php" class="btn btn-light text-danger ml-5 mt-3"><b>Batal</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
        if(isset($_POST['kirim']))
        {
            $nama = $_POST['nama'];
            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './uploads/';
            $jenis_produk = $_POST['jenis_produk'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];

            move_uploaded_file($source,$folder.$nama_file);
            $insert = mysqli_query($conn, "INSERT INTO tb_gambar VALUES (
                NULL,
                '$nama',
                '$nama_file',
                '$jenis_produk',
                '$harga',
                '$deskripsi')");

            // if($insert)
            // {
            //     echo "Berhasil Upload";
            // }else{
            //     echo "gagal upload";
            // }

            header('location:menu.php');
        }


    ?>


    <!-- <script src="js/jquery-3.5.1.slim.min.js"></script> -->
    <script src="js/jquery-3.5.1.full.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/data.js"></script>

</body>
</html>