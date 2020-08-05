<!DOCTYPE html>
<html lang="en">


<?php

include_once "conn.php";
include_once "function.php";


if (!isset($_SESSION['choice'])){$_SESSION['choice'] = 'All';}

$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitChoice');
if ($btnSubmit) {

    $choice = FILTER_INPUT(INPUT_POST, 'choice');
    if (isset($_SESSION['fromdate']) AND isset($_SESSION['todate'])) {
        unset($_SESSION["fromdate"]);
        unset($_SESSION["todate"]);
    }
    if(isset($_SESSION['month'])){
        unset($_SESSION['month']);
    }
    if(isset($_SESSION['year'])){
        unset($_SESSION['year']);
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
<div class="main-content-wrapper d-flex clearfix" style="max-width: 1250px">

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
                    <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=user">User</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=barang">Product</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == FALSE) { ?><li class="list-group-item side"><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side active"><a href="index.php?menu=report">Report</a></li><?php } ?>
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

    <!-- Product Catagories Area Start -->

    <div class="products-catagories-area clearfix" style="max-width: 100%">
        <div style="width: 30%;margin-left: 20px; margin-top: 50px">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            <p style="margin-right: 8px">Filter By </p>
                        </td>
                        <td width="100">

                            <select name="choice">
                                <option value="<?php if (isset($_SESSION['choice'])) {
                                    echo $_SESSION['choice'];
                                } else {
                                    echo 'All';
                                } ?>"><?php if (isset($_SESSION['choice'])) {
                                        echo $_SESSION['choice'];
                                    } else {
                                        echo 'All';
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
                                    <p style="margin-right: 8px"> From </p>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="fromdate" id="fromdate"
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
                                    <p style="margin-left: 10px;margin-right: 8px"> To </p>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="todate" id="todate"
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
                                    <input style="margin-left: 10px" type="submit" class="btn btn-dark" name="btnSubmitDate" value="Filter"/>
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
                                    <select name="choicemonth" id="choicemonth">
                                        <option value="<?php if (isset($_SESSION['month'])) {

                                            echo $_SESSION['month'];
                                        } else {
                                            echo date('m');
                                        } ?>"><?php if (isset($_SESSION['month'])) {
                                                if($_SESSION['month'] == 01){
                                                    echo 'January';
                                                }
                                                if($_SESSION['month'] == 02){
                                                    echo 'February';
                                                }
                                                if($_SESSION['month'] == 03){
                                                    echo 'March';
                                                }
                                                if($_SESSION['month'] == 04){
                                                    echo 'April';
                                                }
                                                if($_SESSION['month'] == 05){
                                                    echo 'May';
                                                }
                                                if($_SESSION['month'] == 06){
                                                    echo 'June';
                                                }
                                                if($_SESSION['month'] == 07){
                                                    echo 'July';
                                                }
                                                if($_SESSION['month'] == '08'){
                                                    echo 'August';
                                                }
                                                if($_SESSION['month'] == '09'){
                                                    echo 'September';
                                                }
                                                if($_SESSION['month'] == 10){
                                                    echo 'October';
                                                }
                                                if($_SESSION['month'] == 11){
                                                    echo 'November';
                                                }
                                                if($_SESSION['month'] == 12){
                                                    echo 'December';
                                                }
                                            } else {
                                                echo date('F');
                                            } ?></option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
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
                $yy = 2018 ?>
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
                                        } else echo $nyear ?>"><?php if (isset($_SESSION['year'])) {
                                                echo $_SESSION['year'];
                                            } else echo $nyear ?></option>
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
            <div style="margin-top: 50px; margin-left: 10px; margin-right: 10px">
                <table class="display" id="tableid">
                    <thead>
                    <tr>
                    <th>Tanggal</th>
                    <th>ID</th>
                    <th>Nama Pembeli</th>
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
                            <td><?php echo substr($data['date'], 0, 16) ?></td>
                            <td><?php echo $data['id_pembelian'] ?></td>
                            <td><?php echo $data['nama_pembeli'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo 'Rp ', number_format($data['harga_barang'],2,',','.') ?></td>
                            <td><?php echo $data['qty_barang'] ?></td>
                            <td><?php $subtotal = $data['harga_barang'] * $data['qty_barang'];
                                echo 'Rp ', number_format($subtotal,2,',','.'); ?></td>
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
                <div style="margin-top: 50px; margin-left: 10px; margin-right: 10px">
                <table id="tableid">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>ID</th>
                    <th>Nama Pembeli</th>
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
                            <td><?php echo substr($data['date'], 0, 16) ?></td>
                            <td><?php echo $data['id_pembelian'] ?></td>
                            <td><?php echo $data['nama_pembeli'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo 'Rp ',number_format($data['harga_barang'],2,',','.') ?></td>
                            <td><?php echo $data['qty_barang'] ?></td>
                            <td><?php $subtotal = $data['harga_barang'] * $data['qty_barang'];
                                echo 'Rp ', number_format($subtotal,2,',','.'); ?></td>
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



<script type="text/javascript" src="datatables/datatables.js"></script>
<script type="text/javascript" src="datatables/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="datatables/datatables.css"/>
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tableid').DataTable({
            order: [[ 0, 'desc' ]]
        });
    });

    <?php if (!isset($_SESSION['fromdate']) OR !isset($_SESSION['todate'])) {?>
    $(document).ready( function() {
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


        $('#fromdate').val(today);
        $('#todate').val(today);
    });
    <?php } ?>

<!--    --><?php //if (!isset($_SESSION['month'])) {?>
//    $(document).ready( function() {
//        var now = new Date();
//
//        var day = ("0" + now.getDate()).slice(-2);
//        var month = ("0" + (now.getMonth() + 1)).slice(-2);
//
//        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
//
//
//        $('#choicemonth').val(month);
//    });
//    <?php //} ?>

</script>


</body>


</html>






