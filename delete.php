<?php

include 'connection.php';
include 'function.php';

if(isset($_GET['delete'])){
    deleteSiswa($_GET);
    header('Location:delete.php');
}
$tampung=[];
if(isset($_POST['cari']))
{
    $tampung=searching($_POST['search']);
    if(!empty($tampung)){
        $data_siswa=$tampung;
    }elseif(empty($tampung)){
        $eror = "Maaf, Input ".$_POST['search']."Tidak Ditemukan";
    }
}

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
    <style>
        a{
            color: gray;
        }
        a:hover{
            color: rgb(223, 48, 48);
        }

        h4{
            color: rgb(223, 48, 48);
        }

        #tabel{
            color: white;
        }
        
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex mx-auto">
                    <h1 class="d-flex mx-auto">Daftar Edit dan Hapus Data</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-2 p-3">
            <!-- logo -->
            <div class="mt-4 col-lg-3 col-12 col-md-2 ml-4">
                <img  src="asset/images/logo00.jpg" alt="logo" width="75" height="50">
            </div>
            <!-- search bar -->
            <div class="ml-5 mt-4 col-lg-6 col-12 col-md-10 ">
                <form class="form-inline my-2 my-lg-0" method="POST" action="">
                    <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" name="search" autocomplete="off">
                    <button class="btn btn-danger my-2 my-sm-0"  name="cari" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="mt-4 col-lg-2 col-12 col-md-12">
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3">
    
            </div>
             <div class="col-6 mt-2">
                <?php if(isset($eror)) : ?>
                    <div role="alert" class="alert alert-danger">
                        <?php echo $eror; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div> 
            <div class="col-3">
    
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row">
            <div class="col-3">
                <a href="menu.php" class="btn btn-light text-danger ml-3 mt-3"><b>Back Menu</b></a>
            </div>
            <div class="col-3">
                <a href="index.php" class="btn btn-light text-danger ml-3 mt-3"><b>Back Home</b></a>
            </div>
        </div>
    </div>

    <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr id="tabel">
                                <th scope="col">ID Produk</th>
                                <th scope="col">gambar</th>
                                <th scope="col">jenis produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tentang Produk</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_siswa as $key):?>
                                <tr action="index.php" method="POST">
                                    <td><?php echo $key["id_gambar"]; ?></td>
                                    <td><img src="uploads/<?php echo $key['file']  ?>" alt="" width="100px" height="100px"></td>
                                    <td><?php echo $key["jenis_produk"]; ?></td>
                                    <td><?php echo $key["nama"]; ?></td>
                                    <td><?php echo "Rp.".number_format($key["harga"]); ?></td>
                                    <td><?php echo $key["deskripsi"]; ?></td>
                                    <td><a href="delete.php?delete=&id_gambar=<?php echo $key['id_gambar']; ?>" class="btn btn-secondary">Delete</a> 
                                    <td><a href="edit.php?id=<?php echo $key["id_gambar"]; ?>" class="btn btn-danger">Edit</a></td></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-3">
        <div class="row mt-2">
            <div class="col bg-danger">
                <div class="container">
                    <div class="row">
                        <div class="col text-white">
                            <p class="mt-3" style="text-align: center;">&copy;CoppyRight by : Reza Aditya Pratama</p>
                            <hr width="63%" class="border-light">
                            <p style="text-align: center;"><a style="text-decoration: none;" class="text-white" href="https://www.facebook.com/reza.p.98837">Facebook : Reza Aditya P </a>|<a style="text-decoration: none;" class="text-white" href="https://www.instagram.com/rezaa_adittya/?hl=id"> Instagram : Reza Aditya P </a>|<a style="text-decoration: none;" class="text-white" href="https://twitter.com/login?lang=id"> Twitter : Reza Aditya</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- <script src="js/jquery-3.5.1.slim.min.js"></script> -->
    <script src="js/jquery-3.5.1.full.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/data.js"></script>
    
</body>
</html>