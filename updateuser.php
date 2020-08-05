<!DOCTYPE html>
<html lang="en">


<?php

include_once "conn.php";
include_once "function.php";


$id = FILTER_INPUT(INPUT_GET,'id');
if(isset($id)){
    $data = getOneUser($id);
    $result = $data -> fetch();
    $namaUserLama = $result['nama_kasir'];
    $tlpUserLama = $result['telepon_kasir'];
    $emailUserLama = $result['email_kasir'];
    $alamatUserLama = $result['alamat_kasir'];
}
$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnEditUser');
if($btnSubmit)
{
    $id = FILTER_INPUT(INPUT_GET,'id');
    $tlp = FILTER_INPUT(INPUT_POST, 'telepon_kasir');
    $email = FILTER_INPUT(INPUT_POST, 'email_kasir');
    $alamat = FILTER_INPUT(INPUT_POST, 'alamat_kasir');
    editUser($tlp,$email,$alamat,$id);
    header("location:index.php?menu=user");
}





?>

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

<div class="row h-100">
    <div class="col-3 pr-0" style="background-color: rgb(250,250,250);">
        <div class="row " style="width: 100%;height: 180px;">
            <a class="" style="width: 80%;height:80%;margin-top: 5%;margin-left: 17%;" href="index.php"><img width="80%" src="img/core-img/logo.png" alt=""></a>
        </div>
        <div class="row w-100">
            <ul class="list-group w-100">
                <li class="list-group-item side"><a href="index.php">Home</a></li>
                <?php if ($_SESSION['approved_user'] == FALSE) { ?><li class="list-group-item side"><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side active"><a href="index.php?menu=user">User</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=barang">Product</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == FALSE) { ?><li class="list-group-item side"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=report">Report</a></li><?php } ?>
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


                <div class="col-8 col-lg-8" >
                    <div  style="padding-left: 9%" class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Update User</h2>
                        </div>

                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-11 ">
                                    <p>Full Name :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="nama_kasir" placeholder="" value="<?php echo $namaUserLama; ?>" disabled="disabled">
                                </div>
                                <div class="col-md-11 ">
                                    <p>Phone Number :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="telepon_kasir" placeholder="" value="<?php echo $tlpUserLama; ?>">
                                </div>
                                <div class="col-md-11 ">
                                    <p>Email :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="email" class="form-control" name="email_kasir" placeholder="" value="<?php echo $emailUserLama; ?>">
                                </div>
                                <div class="col-md-11 ">
                                    <p>Address :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="alamat_kasir" placeholder="" value="<?php echo $alamatUserLama; ?>">
                                </div>


                                <div class="col-11 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" value="Update" name="btnEditUser"/>
                                </div>

                            </div>
                        </form>
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