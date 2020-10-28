<?php
    include 'db.php';
    include 'connection.php';

    $data = mysqli_query($conn, "SELECT * FROM tb_gambar WHERE id_gambar = '".$_GET['id']."'");
    $r = mysqli_fetch_array($data);
    $n = $r['nama'];
    $f = $r['file'];
    $j = $r['jenis_produk'];
    $h = $r['harga'];
    $d = $r['deskripsi'];
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
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card mx-auto" style="width: 30rem;">
                    <div class="card-body">
                        <h2>input data</h2>
                                <label for="exampleFormControlSelect1">Jenis Barang</label>
                                <select class="form-control" name="jenis_produk">
                                    <option><?php echo $j; ?></option>
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
                                    <input type="text" name="nama" class="form-control" required value="<?php echo $n; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">harga</label>
                                    <input type="number" name="harga" class="form-control" required value="<?php echo $h; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tentang Produk</label>
                                    <textarea class="form-control" required name="deskripsi" rows="3"><?php echo $d; ?>"</textarea>
                                </div>
                                
                                <div>
                                    <label for="exampleInputEmail1">Gambar</label>
                                    <br>
                                    <input type="hidden" name="img" value="<?php echo $f?>">
                                    <input type="file" name="gambar">
                                </div>
                                <div>
                                <div>
                                    <img src="uploads/<?php echo $f; ?>" width="100px" height="100px">
                                </div>
                                
                                <button type="submit" class="btn btn-danger mt-3" name="kirim">Update</button>

                                <a href="delete.php" class="btn btn-light text-danger ml-5 mt-3"><b>Batal</b></a>
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

            if($nama_file !='')
            {
                move_uploaded_file($source, $folder.$nama_file);
                $update = mysqli_query($conn, "UPDATE tb_gambar Set
                    nama = '".$nama."',
                    file ='".$nama_file."',
                    jenis_produk ='".$jenis_produk."',
                    harga ='".$harga."',
                    deskripsi ='".$deskripsi."'
                    WHERE id_gambar = '".$_GET['id']."'
                    ");    
                    
            }else{
                $update = mysqli_query($conn, "UPDATE tb_gambar Set
                    nama = '".$nama."',
                    jenis_produk ='".$jenis_produk."',
                    harga ='".$harga."',
                    deskripsi ='".$deskripsi."'
                    WHERE id_gambar = '".$_GET['id']."'
                    ");    

                // $update=$db->prepare("UPDATE tb_gambar  SET nama =?, jenis_produk =?, harga =?, deskripsi =? WHERE id_gambar = ?");
                // $update->bindValue(1, $nama,PDO::PARAM_STR);
                // $update->bindValue(2,$jenis_produk,PDO::PARAM_STR);
                // $update->bindValue(3,$harga,PDO::PARAM_INT);
                // $update->bindValue(4,$deskripsi,PDO::PARAM_STR);
                // $update->bindValue(5,$_POST['id_gambar'],PDO::PARAM_STR);
                // $update->execute();
            }

            header('location:delete.php');
            
        }


    ?>


    <!-- <script src="js/jquery-3.5.1.slim.min.js"></script> -->
    <script src="js/jquery-3.5.1.full.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/data.js"></script>

</body>
</html>