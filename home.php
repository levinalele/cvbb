<!DOCTYPE html>
<html lang="en">
<?php

include_once "conn.php";
include_once "function.php";

$nav = FILTER_INPUT(INPUT_GET, 'menu');
switch ($nav) {
    case 'cat':
        include_once 'insertcategory.php';
        break;
    default:
        include_once 'home.php';
        break;
}
if (!isset($nav)) {
    include_once 'home.php';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>CV Bintang Bangunan</title>
    <link rel="icon" href="img/core-img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            overflow-x: hidden;
        }

        ul.list-group {
            margin-top: 10%;

        }

        .list-group-item {
            border: 0 none;
        }

        li.list-group-item {
            background-color: rgb(250, 250, 250);
            margin-top: 2px;
            margin-bottom: 1px;
            padding-left: 17%;
            padding-right: 17%;
        }
        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #ffeeba;
            border-color: beige;
        }

        .list-group-item a {
            font-style: normal;
            font-size: 15px;
            animation-duration: 1s;
        }
        .side a:hover {
            margin-left: 20px;
        }
        .form-inline li a {
            font-size: 15px;
        }


    </style>
</head>

<body>
<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type your keyword...">
                        <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="home.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>
<?php
$hasil = getAllIklan();
?>
<div class="row h-100">
    <!-- INI SIDEBAR -->
    <div class="col-3 pr-0" style="background-color: rgb(250,250,250);">
        <div class="row " style="width: 100%;height: 180px;">
            <a class="" style="width: 80%;height:80%;margin-top: 5%;margin-left: 17%;" href="index.php"><img width="80%" src="img/core-img/logo.png" alt=""></a>
        </div>
        <div class="row w-100">
            <ul class="list-group w-100">
                <li class="list-group-item side active"><a href="index.php">Home</a></li>
                <?php if ($_SESSION['approved_user'] == FALSE) { ?><li class="list-group-item side"><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=user">User</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=barang">Product</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == FALSE AND isset($_SESSION['keranjang']) AND $_SESSION['keranjang']!=null) { ?><li class="list-group-item side"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=report">Report</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == FALSE AND isset($_SESSION['history'])) { ?><li class="list-group-item side"><a href="index.php?menu=history">History</a></li><?php } ?>
                <li class=" d-flex justify-content-between list-group-item"><a href="https://id.pinterest.com/anssport/toko-bahan-bangunan/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/cv.bintangbangunan/?hl=id"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/bintang.bangunan.7?hc_ref=ARTrk7FZUGrVvfq_6oFUVxUsgYtB2zoHC3ZC0QG0-h76dbhoq9ppno8i5yfX3DEeA5I&fref=nf"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/carolineadjie"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>

        <!-- <div class="social-info d-flex justify-content-between">

        </div> -->
    </div>
    <div class="col-9 px-0 bg-white">
        <!-- INI HEADER -->
        <div class="row w-100">
            <nav class="navbar navbar-light " style="background-color: #333;">
                <div class="navbar col-10 justify-content-center">
                    <div class="navbar-header">
                        <h1 class="navbar-text text-white">CV Bintang Bangunan</h1>
                    </div>
                </div>
                <div class="navbar col-2 justify-content-center">
                    <ul class="form-inline my-2 my-lg-0">
                        <?php if ($_SESSION['approved_user'] == FALSE) { ?>
                            <li><a style="font-size: 11px"  class="text-white mr-4 " href="index.php?menu=login">Sign In</a></li>
                            <li class=""><a href="index.php?menu=login"><img src="images/user.png" height="30" width="30"></a></li>
                        <?php } else { ?>
                            <li class="" style="float:right; font-family: 'Comic Sans MS';"><a class="text-white" style="font-size: 11px" href="index.php?menu=login"><?php echo $_SESSION['name'] ?></a></li>
                            <li class=""><a href="index.php?menu=logout"><img style="margin-left: 10px" src="images/logout.png" height="25" width="25"></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="row w-100">
                    <p class="text-white w-100" style="font-size: 12px; margin-left: 11%">Jl. A.H. Nasution No.51, Karang Pamulang, Kec. Mandalajati, Kota Bandung, Jawa Barat 40293 | (022) 7271612 </p>
                </div>
            </nav>
        </div>
        <!-- INI BODY -->
        <div class="row w-100">
            <div class="products-catagories-area clearfix">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        if ($data = $hasil->fetch()) {
                            ?>
                            <div class="carousel-item active">
                                <img class="" src="img/bg-img/<?php echo $data['foto_iklan']; ?>" alt="First slide">
                            </div>

                            <?php

                            while ($data = $hasil->fetch()) {
                                ?>
                                <div class="carousel-item">
                                    <img class="" src="img/bg-img/<?php echo $data['foto_iklan']; ?>" alt="First slide">
                                </div>

                            <?php } ?>
                        <?php } else{ ?>
                            <div class="carousel-item active">
                                <img class="" src="images/bb.png" alt="First slide">
                            </div>


                        <?php } ?>

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
        </div>
    </div>
</div>

<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>

</body>

</html>