<!DOCTYPE html>
<html lang="en">

<?php

include_once "conn.php";
include_once "function.php";


//insert
$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitCat');
if($btnSubmit)
{

    $name = FILTER_INPUT(INPUT_POST, 'catname');
    if ($name!=""){
    $msg = insertCategory($name,1);}
}

//update


$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'update'){
        $id = FILTER_INPUT(INPUT_GET,'id');
        //kalo di vardum idnya dapet
        //salahnya disini mungkin sama di function
        $data = getOneCategory($id);
        $result = $data -> fetch();
        $statusCatLama = $result['status_category'];
        if ($statusCatLama == 1){$statbaru = 0;}
        else{$statbaru=1;}

        updateCategory($statbaru,$id);
        header('location:index.php?menu=cat');

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
                <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=user">User</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li class="active"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                <?php if ($_SESSION['approved_user']==FALSE){ ?><li ><a href="index.php?menu=cart">Cart</a></li><?php } ?>
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

    <!-- Product Details Area Start -->
    <!--        <div class="single-product-area section-padding-100 clearfix">-->

    <div class="cart-table-area ">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-12 col-lg-12" >
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Insert Category</h2>
                        </div>

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <p>Category Name :</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" name="catname" placeholder="" >
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" name="btnSubmitCat" value="Insert"/>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <?php
        $hasil = getAllCategory();
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-lg-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th><center>ID</center></th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($data = $hasil->fetch()) {?>
                            <tr>
                                <td class="price">
                                    <div ><center><?php echo $data['id_category'] ?></center></div>
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?php echo $data['nama_category'] ?></h5>
                                </td>
                                <td class="cart_product_img">
                                    <?php
                                    $ket ="";
                                    if ($data['status_category']==1){
                                        $ket="Active";
                                    }
                                    else{
                                        $ket="Inactive";
                                    }

                                    echo $ket ?>
                                </td>

                                <td class="qty">
                                    <button class="btn btn-outline-danger" name="btnUpdateCat" onclick="updatecat(<?php echo $data['id_category']; ?>)">Active / Inactive</button>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
<!--                            <tr>-->
<!--                                <td class="cart_product_img">-->
<!--                                    <a href="#"><img src="img/category/2.PNG" alt="Product"></a>-->
<!--                                </td>-->
<!--                                <td class="price">-->
<!--                                    <div><center>2</center></div>-->
<!--                                </td>-->
<!--                                <td class="cart_product_desc">-->
<!--                                    <h5>Besi</h5>-->
<!--                                </td>-->
<!---->
<!--                                <td class="qty">-->
<!--                                    <button type="button" class="btn btn-outline-danger">Active / Inactive</button>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="cart_product_img">-->
<!--                                    <a href="#"><img src="img/category/3.png" alt="Product"></a>-->
<!--                                </td>-->
<!--                                <td class="price">-->
<!--                                    <div ><center>3</center></div>-->
<!--                                </td>-->
<!--                                <td class="cart_product_desc">-->
<!--                                    <h5>Paku</h5>-->
<!--                                </td>-->
<!---->
<!--                                <td class="qty">-->
<!--                                    <button type="button" class="btn btn-outline-danger">Active / Inactive</button>-->
<!--                                </td>-->
<!--                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div></div></div></div>

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