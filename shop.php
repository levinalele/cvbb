<?php

?>
<!DOCTYPE html>
<html lang="en">

<?php

include_once "conn.php";
include_once "function.php";




if (!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang'] = array();}

$i = 0;



$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'add'){

    $id = FILTER_INPUT(INPUT_GET,'id');
    array_push($_SESSION['keranjang'],$id);

    header('location:index.php?menu=cart');


}





?>

<script>
    $(document).ready(function(){

        $("li").click(function(){

            alert($(this).attr("id"));

        });

    });


</script>
<style>
    div.hai{
        width:100%;
        height:100%;
        background:#fbb710;
    }
</style>



<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>CV Bintang Bangunan</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

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
                    <li ><a href="index.php">Home</a></li>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li class="active"><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=iklan" >Advertisement</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=user">User</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                </ul>
            </nav><br><br>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://id.pinterest.com/anssport/toko-bahan-bangunan/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/cv.bintangbangunan/?hl=id"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/bintang.bangunan.7?hc_ref=ARTrk7FZUGrVvfq_6oFUVxUsgYtB2zoHC3ZC0QG0-h76dbhoq9ppno8i5yfX3DEeA5I&fref=nf"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/carolineadjie"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50" >
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <?php
                $hasil = getAllCategory();
                ?>
                <div class="catagories-menu">
                    <ul>
                        <?php
                        while($data = $hasil->fetch()) {
                            if ($data['status_category']!=0){
                        ?>
                        <li id="<?php echo $data['nama_category']; ?>"><a href="#<?php echo $data['nama_category']; ?>1"><?php echo $data['nama_category']; ?></a></li>
<!--                        <li><a href="#">Beds</a></li>-->
<!--                        <li><a href="#">Accesories</a></li>-->
<!--                        <li><a href="#">Furniture</a></li>-->
<!--                        <li><a href="#">Home Deco</a></li>-->
<!--                        <li><a href="#">Dressings</a></li>-->
<!--                        <li><a href="#">Tables</a></li>-->
                            <?php
                        }
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="amado_product_area section-padding-100" ">
            <div class="container-fluid">
                <?php
                $hsl = getAllCategory();
                while ($dat = $hsl->fetch()) {
                    if ($dat['status_category'] != 0) {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-xl-flex align-items-end justify-content-between"
                                     id="<?php echo $dat['nama_category']; ?>1">
                                    <div class="hai">
                                        <br>
                                        <center><h1 style="color: #FFFFFF"><?php echo $dat['nama_category']; ?> </h1>
                                        </center>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                        $hasil = getAllBarang();
                        ?>

                        <div class="row">
                            <?php while ($data = $hasil->fetch()) {
                                if ($dat['id_category'] == $data['id_category']) {
                                    if ($data['status_barang'] != 0) {
                                        ?>

                                        <!-- Single Product Area -->
                                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    <img src="img/product-img/<?php echo $data['images_barang'] ?>"
                                                         alt="">
                                                    <!-- Hover Thumb -->
                                                    <!--                                <img class="hover-img" src="img/product-img/product2.jpg" alt="">-->
                                                </div>

                                                <!-- Product Description -->
                                                <div
                                                    class="product-description d-flex align-items-center justify-content-between">
                                                    <!-- Product Meta Data -->
                                                    <div class="product-meta-data">
                                                        <div class="line"></div>
                                                        <span class="product-price" style="margin-left: 10px"> <?php echo "Rp ", number_format($data['harga_barang'], 2, ",", ".") ?></span>
                                                        <span style="color: #5a6268"><?php echo " / ", $data['satuan_barang'] ?></span>
                                                        <a href="product-details.php">
                                                            <h5 style="margin-left: 10px; margin-top: 10px" ><?php echo $data['nama_barang'] ?></h5>
                                                        </a>
                                                    </div>
                                                    <!-- Ratings & Cart -->
                                                    <div class="ratings-cart text-right" style="margin-right: 10px">
                                                        <div class="ratings">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="cart">
                                                            <button type="button" data-toggle="tooltip"
                                                                    data-placement="left"
                                                                    title="Add to Cart"
                                                                    onclick="addshop(<?php echo $data['id_barang']; ?>)">
                                                                <img src="img/core-img/cart.png"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                    }
                                }
                            }
                            ?>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
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