<!DOCTYPE html>
<html lang="en">
<style>
    body {
        zoom: 70%;
    }
</style>

<?php

include_once "conn.php";
include_once "function.php";


$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitChoice');
if ($btnSubmit) {

    $choice = FILTER_INPUT(INPUT_POST, 'choice');
    if (isset($_SESSION['fromdate']) AND isset($_SESSION['todate'])) {
        unset($_SESSION["fromdate"]);
        unset($_SESSION["todate"]);
    }
    $_SESSION['choice'] = $choice;
}


$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitDate');
if ($btnSubmit) {


    $fromdate = FILTER_INPUT(INPUT_POST, 'fromdate');
    $todate = FILTER_INPUT(INPUT_POST, 'todate');
    $_SESSION['fromdate'] = $fromdate;
    $_SESSION['todate'] = $todate;

}

$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitMonth');
if ($btnSubmit) {
    $month = FILTER_INPUT(INPUT_POST, 'choicemonth');
    $fromdate = "2020-";
    $fromdate .= $month;
    $fromdate .= "-01";
    $todate = "2020-";
    $todate .= $month;
    $todate .= "-31";
    $_SESSION['month'] = $month;

    $_SESSION['fromdate'] = $fromdate;
    $_SESSION['todate'] = $todate;

}

$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitYear');
if ($btnSubmit) {
    $year = FILTER_INPUT(INPUT_POST, 'choiceyear');
    $fromdate = $year;
    $fromdate .= "-01";
    $fromdate .= "-01";
    $todate = $year;
    $todate .= "-12";
    $todate .= "-31";
    $_SESSION['year'] = $year;

    $_SESSION['fromdate'] = $fromdate;
    $_SESSION['todate'] = $todate;

}


?>


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">

    <script type="text/javascript" src="jquery-3.4.1.js"></script>
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>


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

        h1.navv {
            color: white;
        }

        p.navv {
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
                <li><a href="index.php">Home</a></li>
                <?php if ($_SESSION['approved_user'] == FALSE) { ?>
                    <li><a href="index.php?menu=shop">Shop</a></li> <?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                    <li><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE AND $_SESSION['userid'] == 1) { ?>
                    <li><a href="index.php?menu=user">User</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                    <li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                    <li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == FALSE) { ?>
                    <li><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE) { ?>
                    <li><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE AND $_SESSION['userid'] == 1) { ?>
                    <li class="active"><a href="index.php?menu=report">Report</a></li><?php } ?>
            </ul>
        </nav>
        <br><br>
        <!-- Social Button -->
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

    <!-- Product Catagories Area Start -->

    <div class="products-catagories-area clearfix">
        <div style="width: 30%;margin-left: 20px; margin-top: 50px">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            <p>Filter By :</p>
                        </td>
                        <td width="100">

                            <select name="choice">
                                <option value=""><?php if (isset($_SESSION['choice'])) {
                                        echo $_SESSION['choice'];
                                    } else {
                                        echo 'Select Option';
                                    } ?></option>
                                <option value="All">All</option>
                                <option value="Date">Date</option>
                                <option value="Month">Month</option>
                                <option value="Year">Year</option>
                            </select>
                        </td>
                        <td>
                            <input class="btn btn-dark" type="submit" name="btnSubmitChoice" value="Ok"/>
                        </td>
                    </tr>

                </table>
            </form>
        </div>


        <?php
        if (isset($_SESSION['choice'])) {
            if ($_SESSION['choice'] == 'Date') { ?>
                <div style="width: 50%;margin-left: 20px; margin-top: 20px">
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <p> From :</p>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="fromdate"
                                           placeholder="<?php if (isset($_SESSION['fromdate'])) {
                                               echo substr($_SESSION['fromdate'], 0, 10);
                                           } else {
                                               echo "";
                                           } ?>" value="<?php if (isset($_SESSION['fromdate'])) {
                                        echo substr($_SESSION['fromdate'], 0, 10);
                                    } else {
                                        echo "";
                                    } ?>">
                                </td>
                                <td width="20"></td>
                                <td>
                                    <p> To :</p>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="todate"
                                           placeholder="<?php if (isset($_SESSION['todate'])) {
                                               echo substr($_SESSION['todate'], 0, 10);
                                           } else {
                                               echo "";
                                           } ?>" value="<?php if (isset($_SESSION['todate'])) {
                                        echo substr($_SESSION['todate'], 0, 10);
                                    } else {
                                        echo "";
                                    } ?>">
                                </td>
                                <td width="20"></td>
                                <td>
                                    <input type="submit" class="btn btn-dark" name="btnSubmitDate" value="Filter"/>
                                </td>
                            </tr>


                        </table>
                    </form>
                </div>
                <?php
            }
        } ?>

        <?php
        if (isset($_SESSION['choice'])) {
            if ($_SESSION['choice'] == 'Month') { ?>
                <div style="width: 50%;margin-left: 20px; margin-top: 20px">
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td width="70">
                                    <p> From :</p>
                                </td>
                                <td width="100">
                                    <select name="choicemonth">
                                        <option value="<?php if (isset($_SESSION['month'])) {
                                            echo $_SESSION['month'];
                                        } else {
                                            echo "";
                                        } ?>"><?php if (isset($_SESSION['month'])) {
                                                echo $_SESSION['month'];
                                            } else {
                                                echo "";
                                            } ?></option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-dark" name="btnSubmitMonth" value="Filter"/>
                                </td>
                            </tr>


                        </table>
                    </form>
                </div>
                <?php
            }
        } ?>

        <?php
        if (isset($_SESSION['choice'])) {
            if ($_SESSION['choice'] == 'Year') {
                $nyear = date("Y");
                $yy = 2020 ?>
                <div style="width: 50%;margin-left: 20px; margin-top: 20px">
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td width="70">
                                    <p> From :</p>
                                </td>
                                <td width="100">
                                    <select name="choiceyear">
                                        <option value="<?php if (isset($_SESSION['year'])) {
                                            echo $_SESSION['year'];
                                        } else echo "" ?>"><?php if (isset($_SESSION['year'])) {
                                                echo $_SESSION['year'];
                                            } else echo "" ?></option>
                                        <?php while ($yy <= $nyear) { ?>
                                            <option value="<?php echo $yy ?>"><?php echo $yy ?></option>
                                            <?php $yy += 1;
                                        } ?>

                                    </select>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-dark" name="btnSubmitYear" value="Filter"/>
                                </td>
                            </tr>


                        </table>
                    </form>
                </div>
                <?php
            }
        } ?>

        <?php
        if (isset($_SESSION['choice']) AND $_SESSION['choice'] == 'All') {
            ?>
            <div style="margin-top: 50px">
                <table class="display" id="tableid">
                    <thead>
                    <tr>
                    <th>Tanggal</th>
                    <th>ID Pembelian</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $hasil = getAllReport();
                    $totalsemua = 0;
                    while ($data = $hasil->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo substr($data['date'], 0, 10) ?></td>
                            <td><?php echo $data['id_pembelian'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['harga_barang'] ?></td>
                            <td><?php echo $data['qty_barang'] ?></td>
                            <td><?php $subtotal = $data['harga_barang'] * $data['qty_barang'];
                                echo $subtotal; ?></td>
                        </tr>
                        <?php $totalsemua += $subtotal;
                    } ?>
                    </tbody>

                    <div style="background-color: #0b0b0b;color: #FFFFFF">
                        <br>

                        <h5  style="color: #FFFFFF; margin-left: 10px"> Subtotal :<?php echo " Rp ", number_format($totalsemua,2,",",".") ?>  </h5>

                    </div>

                </table>
            </div>
        <?php } else if (isset($_SESSION['choice'])) {
            if ($_SESSION['choice'] == 'Date' OR $_SESSION['choice'] == 'Month' OR $_SESSION['choice'] == 'Year') { ?>
                <div style="margin-top: 50px">
                <table id="tableid">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>ID Pembelian</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_SESSION['fromdate']) AND isset($_SESSION['todate'])) {

                    $hasil = getAllReportBy($_SESSION['fromdate'], $_SESSION['todate']);
                    $totalsemua = 0;
                    while ($data = $hasil->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo substr($data['date'], 0, 10) ?></td>
                            <td><?php echo $data['id_pembelian'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['harga_barang'] ?></td>
                            <td><?php echo $data['qty_barang'] ?></td>
                            <td><?php $subtotal = $data['harga_barang'] * $data['qty_barang'];
                                echo $subtotal; ?></td>
                        </tr>
                        <?php $totalsemua += $subtotal;
                    } ?>
                    </tbody>
                    <div style="background-color: #0b0b0b;color: #FFFFFF">
                        <br>
                        <h5 style="color:white; margin-left: 10px"> Total :<?php echo " Rp ", number_format($totalsemua,2,",",".") ?>  </h5>

                    </div>
                    </table>



                    </div>
                <?php }
            }
        } ?>

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

<script type="text/javascript" src="jquery-3.4.1.js"></script>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="datatables/datatables.js"></script>
<script type="text/javascript" src="datatables/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="datatables/datatables.css"/>
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tableid').DataTable();
    });
</script>

</body>


</html>






