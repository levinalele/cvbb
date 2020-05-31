<!DOCTYPE html>
<html lang="en">

<?php

include_once "conn.php";
include_once "function.php";

$array = array_unique($_SESSION['keranjang'], SORT_REGULAR);
$x = array_intersect($array, $array);
$y = array_diff($array, $array);
$farray = array_merge($x, $y);


$totalharga = 0;

$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnBuy');
if($btnSubmit)
{
    $name = FILTER_INPUT(INPUT_POST, 'nama_pelanggan');
    $tlp = FILTER_INPUT(INPUT_POST, 'telepon_pelanggan');
    $email = FILTER_INPUT(INPUT_POST, 'email_pelanggan');
    $total = (int)$_SESSION['totalharga'];
    $stat = 0;
    $rand = random_int(0,100000000);
    $idkasir =1;

    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $timestamp = $dt->format('Y-m-d G:i:s');

    insertPembelian($name,$tlp,$email,$total,$stat,$idkasir);

    $userpembeli = getOnePembeli($name,$tlp,$timestamp);
    $resultpembeli = $userpembeli->fetch();

    $e = 0;
    while ($e < sizeof($farray)) {
        if ($_SESSION['arrayqty'][$e] != 0){
            insertcatBarang($resultpembeli['id_pembelian'],$farray[$e],$_SESSION['arrayqty'][$e]);
            $e += 1;
        }
        else
        {$e +=1;}
    }
    session_destroy();
    header("location:index.php?menu=thankyou");

}

?>
<style>
    body{
        zoom: 70%;
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

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
<form method="post">

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
                <a href="home.php"><img src="img/core-img/logo.png" height="300" alt=""></a>
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
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li ><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=iklan" >Advertisement</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=user">User</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li class="active"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=report">Report</a></li><?php } ?>
                </ul>
            </nav>
            <br><br>
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
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Your Order</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <form method="post">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 0;
                                    while ($i < sizeof($farray)) {
                                        $data = getOneBarang($farray[$i]);
                                        $result = $data->fetch();
                                        if ($_SESSION['arrayqty'][$i] != 0) {

                                            ?>
                                            <tr>
                                                <td class="cart_product_img">
                                                    <a href="#"><img
                                                            src="img/product-img/<?php echo $result['images_barang'] ?>"
                                                            alt="Product"></a>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <h5><?php echo $result['nama_barang'] ?></h5>
                                                </td>
                                                <td class="price">
                                                    <span><?php echo "Rp ", number_format($result['harga_barang'], 2, ",", ".") ?></span>
                                                    <span style="color: #5a6268"><?php echo " / ", $result['satuan_barang']; ?></span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <span
                                                            style="margin-left: 20px"><?php echo $_SESSION['arrayqty'][$i] ?></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $totalharga += $_SESSION['arrayqty'][$i] * $result['harga_barang'];

                                            $i += 1;
                                        }
                                        else{$i += 1;}
                                    }
                                    $_SESSION['totalharga'] = $totalharga;
                                    ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Please Fill This Form</h5><br>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <p>Full Name :</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="text" class="form-control" name="nama_pelanggan" value=""
                                               placeholder="" required>
                                    </div>
                                    <div class="col-md-12 ">
                                        <p>Phone Number :</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="telepon_pelanggan" placeholder=""
                                               value="">
                                    </div>
                                    <div class="col-md-12 ">
                                        <p>Email :</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="email_pelanggan" placeholder=""
                                               value="">
                                    </div>
                                </div>

                            <br>
                            <h5>Cart Total</h5>
                            <ul class="summary-table">

                                <br>
                                <li><span>subtotal:</span> <span><?php echo "Rp ", number_format($_SESSION['totalharga'],2,",",".");?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <input type="submit" class="btn amado-btn w-100" name="btnBuy" value="Buy"/>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</form>

</body>

</html>