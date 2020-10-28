<?php
    include 'connection.php';
    include 'function.php';
    include 'db.php';

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

        #tabel{
            background-color: rgb(255, 255, 255);
        }

        body{
            background-color: rgb(240, 240, 240);
        }
        
        .rating ul li{
            color: orange;
        }
        #cari{
            background-color: rgb(223, 48, 48);
        }
        a{
            color: grey;
        }
        a:hover{
            color: rgb(223, 48, 48);
        }
        /* @media(max-width: 575.98px;){
            p.{
                font-size: 50em;
            }
        } */
    </style>
</head>
<body>

    <header> 
        <!-- first header -->
        <div class="container-fluid" id="cari" >
            <div class="row mt-0">
                <!-- logo -->
                <div class="mt-4 col-lg-2 col-12 col-md-2">
                    <img src="asset/images/icon.png" alt="logo" width="150" height="65">
                </div>
                <!-- search bar -->
                <div class="mt-4 col-lg-7 col-12 col-md-10">
                    <form class="form-inline my-2 my-lg-0" method="POST" action="">
                        <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" name="search" autocomplete="off">
                        <button class="btn btn-outline-danger  my-2 my-sm-0"  name="cari" type="submit"><i style="color: white;" class="fas fa-search"></i></button>
                    </form>
                </div>

                <!-- account -->
                <div class="mt-4 col-lg-3 col-12 col-md-12">
                    <div class="container">
                        <div class="row">
                            <!-- user icon -->
                            <div class="col-lg-6 col-7 col-md-3" >
                                <a href="tambah.php"><i style="font-size: 3rem; color: white;" class="fas fa-folder-plus"></i></a>
                                <a class="ml-4" href="delete.php"><i style="font-size: 3rem; color: white;" i class="fas fa-bars"></i></a>
                            </div>
                            <!--icon registration  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <a href="index.php" class="btn btn-danger text-light ml-3 mt-3"><b>Klik untuk kembali ke Home</b></a>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-2">
                 
                </div>
                <div class="col-5 mt-4">
                    <?php if(isset($eror)) : ?>
                        <div role="alert" class="alert alert-danger">
                            <?php echo $eror; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-5">
                            
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <h3 class="text-danger">Produk Kami</h3>
        </div>
        
    <div class="container d-flex" id="tabel">
        <div class="row">
            <div class="col ml-5">
                <?php foreach($data_siswa as $key):?>
                    <div class="card m-3"  style="width: 14rem; float:left;">

                        <img class="card-img-top p-2" src="uploads/<?php echo $key['file']  ?>" alt="" width="285px" height="250px">
                        
                        <div class="card-body">

                            <h6 class="card-title"><?php echo $key['nama']  ?></h6>

                            <p class="card-text "><?php echo "Rp.".number_format($key["harga"]); ?></p>

                            <p><?php echo $key['deskripsi']  ?></p>
                                        
                        </div>
                        <div class="card-footer text-muted p-1 mb-0 bg-danger text-white">
                            <p class="ml-5 mt-2 mb-1" style="color: white;"><?php echo $key['jenis_produk']  ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
    <script>
    if ($(window).width() > 992) {
      $(window).scroll(function(){  
        if ($(this).scrollTop() > 40) {
            $('#cari').addClass("fixed-top");
            $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
          }else{
            $('#cari').removeClass("fixed-top");
            $('body').css('padding-top', '0');
          }   
      });
    }
  </script>
</body>
</html>