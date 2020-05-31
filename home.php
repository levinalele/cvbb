<!DOCTYPE html>
<html lang="en">
<style>
    body{
        zoom: 80%;
    }
</style>

<?php

include_once "conn.php";
include_once "function.php";

$nav = FILTER_INPUT(INPUT_GET,'menu');
switch ($nav){
    case 'cat' : include_once 'insertcategory.php';
        break;
    default: include_once 'home.php';
        break;
}
if (!isset($nav)){
    include_once 'home.php';
}
?>


<head>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>CV Bintang Bangunan</title>


    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <style>
        ul.navv {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li.navv {
            float: left;
            /*border-right:1px solid #bbb;*/
        }

        li.navv:last-child {
            border-right: none;
        }

        li.navv a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li.navv a:hover:not(.active) {
            background-color: #111;
        }

        span.navv {
            float: left;
            /*border-right:1px solid #bbb;*/
        }

        span.navv:last-child {
            border-right: none;
        }

        span.navv a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        span.navv a:hover:not(.active) {
            background-color: #111;
        }

        h1.navv{
            color: white;
        }
        p.navv{
            color: lightgray;
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
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

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

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="home.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>

            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=iklan" >Advertisement</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=user">User</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=report">Report</a></li><?php } ?>
                </ul>
            </nav>
            <br><br>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://id.pinterest.com/anssport/toko-bahan-bangunan/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/cv.bintangbangunan/?hl=id"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/bintang.bangunan.7?hc_ref=ARTrk7FZUGrVvfq_6oFUVxUsgYtB2zoHC3ZC0QG0-h76dbhoq9ppno8i5yfX3DEeA5I&fref=nf"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/carolineadjie"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <?php
        $hasil = getAllIklan();
        ?>

        <div class="products-catagories-area clearfix">


            <ul class="navv">
                <?php if ($_SESSION['approved_user'] == FALSE){ ?>
                    <li class="navv" style="float:right"><a href="index.php?menu=login"><img src="images/user.png" height="20" width="20"></a></li>
                    <li class="navv" style="float:right"><a href="index.php?menu=login" >Sign In</a></li>
                <?php } else{ ?>
                    <li class="navv" style="float:right"><a href="index.php?menu=logout"><img src="images/logout.png" height="20" width="20"></a></li>
                    <li class="navv" style="float:right; font-family: 'Comic Sans MS';"><a href="index.php?menu=login" >Welcome, <?php echo $_SESSION['name'] ?></a></li>
                <?php } ?>
                <center><h1 class="navv">CV Bintang Bangunan</h1></center>
                <center><p class="navv">Jl. A.H. Nasution No.51, Karang Pamulang, Kec. Mandalajati, Kota Bandung, Jawa Barat 40293 | (022) 7271612 </p></center>
            </ul>



            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" >
                    <?php
                    if($data = $hasil->fetch() ) {
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100 height-680" src="img/bg-img/<?php echo $data['foto_iklan']; ?>" alt="First slide">
                    </div>

                    <?php

                    while($data = $hasil->fetch()) {
                        ?>
                        <div class="carousel-item">
                            <img class="d-block w-100 height-680" src="img/bg-img/<?php echo $data['foto_iklan']; ?>" alt="First slide">
                        </div>

                        <?php
                    }
                        ?>
                        <?php
                    }
                    ?>
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
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->


    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>