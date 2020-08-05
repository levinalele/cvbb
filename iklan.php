<!DOCTYPE html>
<html lang="en">

<?php

$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitIklan');
if($btnSubmit)
{
$name = FILTER_INPUT(INPUT_POST, 'nama_iklan');

$namafile = $_FILES['foto_iklan']['name']; //nama file persis dari yang mau di upload
$tmp = $_FILES['foto_iklan']['tmp_name']; //menampung file sementara
$ukuran = $_FILES['foto_iklan']['size']; //ukuran dari file (dibatesin)
$ext = pathinfo($namafile, PATHINFO_EXTENSION);

$app_ext = array('png','jpg','jpeg','gif','svg','bmp');
$newfile = $name.'.'.$ext;

if(in_array(strtolower($ext),$app_ext)== TRUE && $ukuran <= 1024*1024*2){
    move_uploaded_file($tmp,'img/bg-img/'.$newfile);
    $msg = insertIklan($newfile,$name,1);
}
else {
    $msg='ext';
}
}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'delete'){
    $id = FILTER_INPUT(INPUT_GET,'id');
    $halamanaktiff = FILTER_INPUT(INPUT_GET,'halaman');
    deleteIklan($id);
    $hal = (string) $halamanaktiff;


}

?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, shrink-to-fit=no">
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
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('img/core-img/search.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 200px;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            margin-top: 20px;

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
                <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side active"><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=user">User</a></li><?php } ?>
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

    <!-- Product Details Area Start -->

                <div class="col-8 col-lg-8" >
                    <div style="padding-left: 9%" class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Insert Advertisement</h2>
                        </div>

                        <form action="#" method="post" enctype= multipart/form-data>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <p>Advertisement Name :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="nama_iklan" placeholder="" value="">
                                </div>
                                <div class="col-md-11 ">
                                    <p>Advertisement Photo :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="file" class="form-control" name="foto_iklan" placeholder="" value="">
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" value="Insert" name="btnSubmitIklan"/>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div style="margin-left: 70%">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
                    </div>


        <?php
        $jumlahDataPerHalaman = 2;
        $hasill = getAllIklan();
        $jumlahData=0;
        while ($dataa = $hasill->fetch()){$jumlahData +=1;}
        $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"]:1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif)- $jumlahDataPerHalaman;

        $hasil = getAllIklanLimit($awalData,$jumlahDataPerHalaman);
        ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-lg-12">
                    <div class="cart-table clearfix">
                        <table id="myTable" class="table table-responsive">
                            <thead>
                            <tr style="background-color: white">
                                <th  width="40%">Advertisement Photo</th>
                                <th  width="30%" style="padding-left: 8%">Name</th>
<!--                                <th width="30%"><center>Status</center></th>-->
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($data = $hasil->fetch()) {
                            ?>
                            <tr>
                                <td >
                                    <a href="#"><img  src="img/bg-img/<?php echo $data['foto_iklan']; ?>" alt="Product"></a>
                                </td>
                                <td >
                                    <div style="margin-top: 25%; padding-left: 25%"><h5><?php echo $data['nama_iklan']; ?></h5></div>
                                </td>
<!--                                <td class="cart_product_desc">-->
<!--                                    <div style="margin-top: 25%; color:gray">-->
<!--                                        <center>-->
<!--                                        --><?php
//                                        $ket ="";
//                                        if ($data['status_iklan']==1){
//                                            $ket="Active";
//                                        }
//                                        else{
//                                            $ket="Inactive";
//                                        }
//
//                                        echo $ket ?>
<!--                                        </center>-->
<!--                                    </div>-->
<!--                                </td>-->

                                <td class="qty" >
                                    <button style="margin-top: 20%; margin-left: 25%" class="btn btn-outline-danger" name="btnUpdateIklan" onclick="deleteiklan(<?php echo $data['id_iklan']; ?>,<?=$halamanAktif?>)">Delete</button>
                                </td>
                            </tr>
<!--                            <tr>-->
<!--                                <td class="cart_product_img">-->
<!--                                    <a href="#"><img src="img/bg-img/sale3.png" alt="Product"></a>-->
<!--                                </td>-->
<!--                                <td class="price">-->
<!--                                    <div><center><h5>Restock Besi</h5></center></div>-->
<!--                                </td>-->
<!--                                <td class="cart_product_desc">-->
<!--                                    <div style="color:gray">Active</div>-->
<!--                                </td>-->
<!---->
<!--                                <td class="qty">-->
<!--                                    <button type="button" class="btn btn-outline-danger">Active / Inactive</button>-->
<!--                                </td>-->
<!--                            </tr>-->
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>



                        <nav aria-label="...">
                            <ul class="pagination">
                                <?php if ($halamanAktif >1) {?>
                                    <li class="page-item"><a class="page-link" href="index.php?menu=iklan&halaman=<?= $halamanAktif-1 ?>"> &laquo; </a></li>

                                <?php } ?>

                                <?php for($i=1; $i <= $jumlahHalaman; $i++): ?>
                                <?php if ($i == $halamanAktif): ?>
                                    <li class="page-item active"><a class="page-link" href="index.php?menu=iklan&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                <?php else: ?>
                                        <li class="page-item"><a class="page-link" href="index.php?menu=iklan&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($halamanAktif < $jumlahHalaman) {?>
                                    <li class="page-item"><a class="page-link" href="index.php?menu=iklan&halaman=<?= $halamanAktif+1 ?>"> &raquo; </a></li>

                                <?php } ?>

                            </ul>
                        </nav>



                    </div>
                </div>
                </div>
            </div>

                    <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
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