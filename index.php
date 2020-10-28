<?php
    include 'connection.php';
    include 'function.php';
    include 'db.php';

    $tampung=[];
    if(isset($_POST['cari']))
    {
        $tampung=searching($_POST['search']);
        if(!empty($tampung)){
            $data_barang=$tampung;
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

    </style>
</head>
<body>

    <header> 
        <!-- first header -->
        <div class="container-fluid" id="cari" >
            <div class="row mt-0 ml-5">
                <!-- logo -->
                <div class="mt-4 col-lg-2 col-12 col-md-2 mb-2">
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
                                <a class="ml-3" href="delete.php"><i style="font-size: 3rem; color: white;" i class="fas fa-bars"></i></a>
                            </div>
                            <!--icon registration  -->
                        </div>
                    </div>
                </div>
            </div>
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
            
        
        <div class="container-fluid ml-4 mr-4 mt-3">
            <div class="row ml-5">
                <div class="col-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                            <img src="asset/images/iklan6.jpg"class="d-block w-100"  alt="..." width="300px" height="200px">
                            </div>
                            <div class="carousel-item active">
                            <img src="asset/images/iklan3.jpg" class="d-block w-100"  alt="..." width="300px" height="200px">
                            </div>
                            <div class="carousel-item">
                            <img src="asset/images/iklan4.jpg"class="d-block w-100"  alt="..." width="300px" height="200px">
                            </div>
                            <div class="carousel-item">
                            <img src="asset/images/iklan5.jpeg"class="d-block w-100"  alt="..." width="300px" height="200px">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="row">
                        <div class="col-12 ml-1">
                            <img src="asset/images/iklan1.jpg" alt="" width="300px" height="100px">
                        </div>
                        <div class="col-12 mt-1 ml-1">
                            <img src="asset/images/iklan2.jpg" alt="" width="300px" height="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <a href="menu.php" class="btn btn-danger text-light ml-3 mt-3"><b>Klik untuk lihat lebih banyak</b></a>
        </div>

        <div class="container mt-3">
            <h3 class="text-danger">Produk Kami</h3>
        </div>
        
    <div class="container d-flex" id="tabel">
        <div class="row">
            <div class="col ml-5">
                <?php foreach($data_barang as $key):?>
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

    <div  id="tabel">

    </div>
    <!-- Partner Saction -->

    <section class="container mt-3">
<h3 class="text-danger">Ini mitra Kami</h3>
<div class="row mt-3" id="tabel">
<div class="col-lg-2 col-4 col-md-2  mt-2">
    <figure class="figure">
        <a href="https://shopee.co.id/"><img src="asset/images/logo1.png" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">Shopee</figcaption>
      </figure>
</div>
<div class="col-lg-2 col-4 col-md-2  mt-2">
    <figure class="figure">
        <a href="https://www.bukalapak.com/"><img src="asset/images/logo2.png" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">Buka Lapak</figcaption>
      </figure>
</div>
<div class="col-lg-2 col-4 col-md-2 mt-2">
    <figure class="figure">
        <a href="https://www.tokopedia.com/"><img src="asset/images/logo3.jpg" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">TokoPedia</figcaption>
      </figure>
</div>
<div class="col-lg-2 col-4 col-md-2 mt-2">
    <figure class="figure">
        <a href="https://www.lazada.co.id/"><img src="asset/images/logo4.jpg" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">Lazada</figcaption>
      </figure>
</div>
<div class="col-lg-2 col-4 col-md-2 mt-2">
    <figure class="figure">
        <a href="https://www.mi.co.id/"><img src="asset/images/logo5.jpg" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">MI Store</figcaption>
      </figure>
</div>
<div class="col-lg-2 col-4 col-md-2 mt-2">
    <figure class="figure">
        <a href="https://buyee.jp/"><img src="asset/images/logo22.png" class="figure-img img-thumbnail rounded" alt="..." width="70px" height="70px"></a>
        <figcaption class="figure-caption text-center text-uppercase">Amazone</figcaption>
      </figure>
</div>
</div>
</section>



<!-- app Section -->

<section class="container mt-3">
<h3 class="text-danger">Download App</h3>
<div class="row">
<div class="col-12 p-2">
    <a href="#"><img src="asset/images/logo20.png" alt="Google Play" height="40"></a>
    <a href="#"><img src="asset/images/logo21.png" alt="Google Play" height="40"></a>
</div>
</div>
</section>

<!-- Footer Section -->

<section class="container mt-3">
<div class="row">
<div class="col-lg-3 col-sm-4 col-md-3">
    <h5 class="text-danger">Perusahaan</h5>
    <ul class="list-unstyled">
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Karir</a></li>
        <li><a href="#">Syarat &amp; Ketentuan</a></li>
    </ul>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <h5 class="text-danger">Bantuan</h5>
    <ul class="list-unstyled">
        <li><a href="#">Kontak Kami</a></li>
        <li><a href="#">Klaim Asuransi</a></li>
        <li><a href="#">Info Kredit</a></li>
    </ul>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <h5 class="text-danger">Akun</h5>
    <ul class="list-unstyled">
        <li><a href="#">Akun Pengguna</a></li>
        <li><a href="#">Daftar</a></li>
        <li><a href="#">Pengaturan Akun</a></li>
    </ul>
</div>
    
            <div class="col-lg-3 col-sm-4 col-md-3">
                <h5 class="text-danger">Sosial Media</h5>
                <ul class="list-unstyled">
                    <li><a href="https://www.facebook.com/reza.p.98837"><i class="fab fa-facebook text-danger"></i>Facebook</a></li>
                    <li><a href="https://www.instagram.com/rezaa_adittya/?hl=id"><i class="fab fa-instagram-square text-danger"></i>Instagram</a></li>
                    <li><a href="https://twitter.com/login?lang=id"><i class="fab fa-twitter-square text-danger"></i>Twittwer</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container mt-0">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-12">
                <p>&copy;2020 Toko gadget</p>
            </div>
            <div class="col-lg-8 col-md-12 col-10">
                <ul class="list-inline list-unstyled">
                    <li class="list-inline-item">Info@Magang.com</li>
                    <li class="list-inline-item">+6289667103117</li>
                    <li class="list-inline-item">Green Like City M 59,Cipondoh,Tangerang </li>
                </ul>
            </div>

            <div class="col-lg-2 col-2">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-cc-mastercard"></i>
            </div>

        </div>
    </section>
                


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