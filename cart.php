<!DOCTYPE html>
<html lang="en">




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
                        <li><a href="index.php">Home</a></li>
                        <?php if ($_SESSION['approved_user'] == FALSE) { ?>
                            <li><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                            <li><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                            <li><a href="index.php?menu=user">User</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                            <li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                            <li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == FALSE) { ?>
                            <li class="active"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                        <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                            <li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                    </ul>
                </nav>
                <br><br>
                <div class="social-info d-flex justify-content-between">
                    <a href="https://id.pinterest.com/anssport/toko-bahan-bangunan/"><i class="fa fa-pinterest"
                                                                                        aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/cv.bintangbangunan/?hl=id"><i class="fa fa-instagram"
                                                                                     aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/bintang.bangunan.7?hc_ref=ARTrk7FZUGrVvfq_6oFUVxUsgYtB2zoHC3ZC0QG0-h76dbhoq9ppno8i5yfX3DEeA5I&fref=nf"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/carolineadjie"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            </header>
            <!-- Header Area End -->

            <?php

            include_once "conn.php";
            include_once "function.php";
            if (isset($_SESSION['keranjang'])) {
            $arrayqty = array();

            $array = array_unique($_SESSION['keranjang'], SORT_REGULAR);
            $x = array_intersect($array, $array);
            $y = array_diff($array, $array);
            $farray = array_merge($x, $y);
            $_SESSION['arrayqty'] = array();


            $e = (int)0;
            if ($_SESSION['arrayqty'] == null) {
                while ($e < sizeof($farray)) {
                    $arrayqty[$e] = 1;
                    $e++;
                }
                $_SESSION['arrayqty'] = $arrayqty;
            }


            $submit = filter_input(INPUT_POST, 'submitbarang');
            if (isset($submit)) {
                $i = 0;
                while ($i < sizeof($farray)) {
                    $name = 'quantity' . $i;
                    $_SESSION['arrayqty'][$i] = filter_input(INPUT_POST, $name);
                    $i++;
                }


                header('location:index.php?menu=cartorder');

            }
            //var_dump($_SESSION['arrayqty']);exit;


            ?>

            <div class="cart-table-area ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="cart-title mt-50">
                                <h2>Shopping Cart</h2>
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
                                        $p = 0;
                                        while ($p < sizeof($farray)) {
                                            array_push($arrayqty, 0);
                                            $p += 1;
                                        }
                                        while ($i < sizeof($farray)) {
                                            $data = getOneBarang($farray[$i]);
                                            $result = $data->fetch();

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
                                                    <span style="color: #5a6268"><?php echo " / ", $result['satuan_barang'] ?></span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <p>Qty</p>
                                                        <div class="quantity">
                                                            <script>var cart = [1, 2, 3]</script>
                                                            <span class="qty-minus"
                                                                  onclick="var effect = document.getElementById('qty<?php echo $i ?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0) effect.value--; return false;"><i
                                                                        class="fa fa-minus" aria-hidden="true"
                                                                        style="margin-top: 15px"></i></span>

                                                            <input type="number" class="qty-text"
                                                                   id="qty<?php echo $i ?>"
                                                                   step="1" min="0" max="300" name="quantity<?= $i; ?>"
                                                                   value="<?php echo $_SESSION['arrayqty'][$i] ?>"/>

                                                            <span class="qty-plus"
                                                                  onclick="var effect = document.getElementById('qty<?php echo $i ?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                                        class="fa fa-plus" aria-hidden="true"
                                                                        style="margin-top: 15px"></i> </span>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php
                                            $i += 1;
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    <table>
                                        <tr>
                                            <?php if ($farray != null) { ?>
                                                <input type="submit" name="submitbarang" value="ORDER"
                                                       class="btn amado-btn w-100"/>
                                            <?php } else { ?>
                                                <input type="submit" value="ORDER" class="btn amado-btn w-100"/>
                                            <?php } ?>
                                        </tr>
                                    </table>
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
    <?php
}
?>

</html>