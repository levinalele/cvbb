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

    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('img/core-img/search.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 180px;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            margin-top: 20px;

        }


    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myUL div.row").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

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

        <div class="row h-50">
            <div class="col-3 pr-0" style="background-color: rgb(250,250,250);">
                <div class="row " style="width: 100%;height: 180px;">
                    <a class="" style="width: 80%;height:80%;margin-top: 5%;margin-left: 17%;" href="index.php"><img width="80%" src="img/core-img/logo.png" alt=""></a>
                </div>
                <div class="row w-100">
                    <ul class="list-group w-100">
                        <li class="list-group-item side"><a href="index.php">Home</a></li>
                        <?php if ($_SESSION['approved_user'] == FALSE) { ?><li class="list-group-item side active"><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=user">User</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=barang">Product</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == FALSE AND isset($_SESSION['keranjang']) AND $_SESSION['keranjang']!=null) { ?><li class="list-group-item side"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == FALSE AND isset($_SESSION['history'])) { ?><li class="list-group-item side"><a href="index.php?menu=history">History</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side "><a href="index.php?menu=report">Report</a></li><?php } ?>
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

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50" >
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <?php

                $jumlahDataPerHalaman = 3;
                $hasill = getAllCategory();
                $jumlahData=0;
                while ($dataa = $hasill->fetch()){
                    if ($dataa['status_category']==1){
                    $jumlahData +=1;}
                }
                $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
                $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"]:1;
                $awalData = ($jumlahDataPerHalaman * $halamanAktif)- $jumlahDataPerHalaman;

//                $hasil = getAllCategory();

                $hasil = getAllCategoryLimit($awalData,$jumlahDataPerHalaman);

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

                    <div >
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
                    </div>

                </div>
            </div>
        </div>

        <div class="amado_product_area "  >

            <div class="container-fluid" id="myUL" >
                <?php
                $hsl = getAllCategoryLimit($awalData,$jumlahDataPerHalaman);
                while ($dat = $hsl->fetch()) {
                    if ($dat['status_category'] != 0) {
                        ?>
                        <div class="row" >
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
                                            <div class="row" style="margin-left: 15px">
                                            <div class="single-product-wrapper">

                                                <!-- Product Image -->
                                                <center><div  style="width: 250px;height: 250px; margin-top: 10px">
                                                    <img style="width: 250px;height: 250px;" src="img/product-img/<?php echo $data['images_barang'] ?>"
                                                         alt="">
                                                    <!-- Hover Thumb -->
                                                    <!--                                <img class="hover-img" src="img/product-img/product2.jpg" alt="">-->
                                                </div></center>

                                                <!-- Product Description -->
                                                <div
                                                    class="product-description d-flex align-items-center justify-content-between">
                                                    <!-- Product Meta Data -->
                                                    <div  class="product-meta-data">
                                                        <div class="line"></div>
                                                        <div class="product-price" style="margin-left: 10px"> <?php echo "Rp ", number_format($data['harga_barang'], 2, ",", ".") ?></div>
                                                        <div style="color: #5a6268; margin-left: 10px"><?php echo "(", $data['satuan_barang'],")" ?></div>
                                                        <a href="product-details.php">
                                                            <h5 style="margin-left: 10px; margin-top: 10px" ><?php echo $data['nama_barang'] ?></h5>
                                                        </a>
                                                    </div>
                                                    <!-- Ratings & Cart -->
                                                    <div class="ratings-cart text-right" style="margin-right: 10px">

                                                        <div class="cart">
                                                            <button style="margin-top: 90%" type="button" data-toggle="tooltip"
                                                                    data-placement="left"
                                                                    title="Add to Cart"
                                                                    onclick="addshop(<?php echo $data['id_barang']; ?>)">
                                                                <img  width="25px" height="25px" src="img/core-img/cart.png"></button>
                                                        </div>
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

        <div style="margin-left: 46%" >
            <nav aria-label="...">
                <ul class="pagination">
                    <?php if ($halamanAktif >1) {?>
                        <li class="page-item"><a class="page-link" href="index.php?menu=shop&halaman=<?= $halamanAktif-1 ?>"> &laquo; </a></li>

                    <?php } ?>

                    <?php for($i=1; $i <= $jumlahHalaman; $i++): ?>
                        <?php if ($i == $halamanAktif): ?>
                            <li class="page-item active"><a class="page-link" href="index.php?menu=shop&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="index.php?menu=shop&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($halamanAktif < $jumlahHalaman) {?>
                        <li class="page-item"><a class="page-link" href="index.php?menu=shop&halaman=<?= $halamanAktif+1 ?>"> &raquo; </a></li>

                    <?php } ?>

                </ul>
            </nav>
        </div>

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

        <script>
            function myFunction() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName("div");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("h5")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
        </script>


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