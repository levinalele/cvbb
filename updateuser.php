<!DOCTYPE html>
<html lang="en">
<style>
    body{
        zoom: 70%;
    }
</style>

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


$btnReset = FILTER_INPUT(INPUT_POST, 'btnForgetPassword');
if($btnReset)
{

    $email = FILTER_INPUT(INPUT_POST, 'email_kasir');
    forgotPassword($email);
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
                <?php if ($_SESSION['approved_user']==FALSE){ ?><li><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=iklan" >Advertisement</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li class="active"><a href="index.php?menu=user">User</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li ><a href="index.php?menu=barang">Product</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==FALSE){ ?><li ><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=report">Report</a></li><?php } ?>
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

    <div class="cart-table-area ">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-12 col-lg-12" >
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Insert User</h2>
                        </div>

                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <p>Full Name :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" name="nama_kasir" placeholder="" value="<?php echo $namaUserLama; ?>" disabled="disabled">
                                </div>
                                <div class="col-md-12 ">
                                    <p>Phone Number :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" name="telepon_kasir" placeholder="" value="<?php echo $tlpUserLama; ?>">
                                </div>
                                <div class="col-md-12 ">
                                    <p>Email :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" name="email_kasir" placeholder="" value="<?php echo $emailUserLama; ?>">
                                </div>
                                <div class="col-md-12 ">
                                    <p>Address :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" name="alamat_kasir" placeholder="" value="<?php echo $alamatUserLama; ?>">
                                </div>

                                <div class="col-md-12 ">
                                    <p>Password :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="submit" class="btn btn-outline-success" value="Reset Password" name="btnForgetPassword" />
                                </div><br>

                                <div class="col-12 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" value="Update" name="btnEditUser"/>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
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