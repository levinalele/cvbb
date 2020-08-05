<!DOCTYPE html>
<html lang="en">


<?php

include_once "conn.php";
include_once "function.php";


$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitBarang');
if($btnSubmit)
{

    $name = FILTER_INPUT(INPUT_POST, 'nama_barang');
    $harga = FILTER_INPUT(INPUT_POST, 'harga_barang');
    $satuan = FILTER_INPUT(INPUT_POST, 'satuan_barang');
    $category = FILTER_INPUT(INPUT_POST, 'category_barang');
    $stat = 1;

    $namafile = $_FILES['images_barang']['name']; //nama file persis dari yang mau di upload
    $tmp = $_FILES['images_barang']['tmp_name']; //menampung file sementara
    $ukuran = $_FILES['images_barang']['size']; //ukuran dari file (dibatesin)
    $ext = pathinfo($namafile, PATHINFO_EXTENSION);

    $app_ext = array('png','jpg','jpeg','gif','svg','bmp');
    $newfile = $name.'.'.$ext;

    if(in_array(strtolower($ext),$app_ext)== TRUE && $ukuran <= 5000*5000*2){
        move_uploaded_file($tmp,'img/product-img/'.$newfile);
        $msg = insertBarang($harga,$name,$newfile,$satuan,$stat,$category);
    }
    else {
        $msg='ext';
    }
}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'update'){
    $id = FILTER_INPUT(INPUT_GET,'id');
    $data = getOneBarang($id);
    $result = $data -> fetch();
    $statusBrgLama = $result['status_barang'];
    if ($statusBrgLama == 1){$statbaru = 0;}
    else{$statbaru=1;}

    updateBarang($statbaru,$id);
    header('location:index.php?menu=barang');
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
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side "><a href="index.php?menu=iklan">Advertisement</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE and $_SESSION['userid'] == 1) { ?><li class="list-group-item side"><a href="index.php?menu=user">User</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side"><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user'] == TRUE) { ?><li class="list-group-item side active"><a href="index.php?menu=barang">Product</a></li><?php } ?>
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
<!--        <div class="single-product-area section-padding-100 clearfix">-->

                                <div class="col-8 col-lg-8" >
                                    <div style="padding-left: 9%" class="checkout_details_area mt-50 clearfix">

                                        <div class="cart-title">
                                            <h2>Insert Item</h2>
                                        </div>

                                        <form action="" method="post"enctype="multipart/form-data" >
                                            <div class="row">
                                                <div class="col-md-11 ">
                                                    <p>Name :</p>
                                                </div>
                                                <div class="col-11 mb-3">
                                                    <input type="text" class="form-control" name="nama_barang" value="">
                                                </div>
                                                <div class="col-md-11 ">
                                                    <p>Price :</p>
                                                </div>
                                                <div class="col-11 mb-3">
                                                    <input type="text" class="form-control" name="harga_barang" placeholder="" value="">
                                                </div>
                                                <div class="col-md-11 ">
                                                    <p>Unit /item :</p>
                                                </div>
                                                <div class="col-11 mb-3">
                                                    <input type="text" class="form-control" name="satuan_barang" placeholder="" value="">
                                                </div>
                                                <div class="col-md-11 ">
                                                    <p>Category :</p>
                                                </div>
                                                <div class="col-11 mb-3" >
                                                    <select class="w-100" name="category_barang">
                                                        <option value="">-Select Category-</option>
                                                        <?php
                                                        $brg = getAllCategory();
                                                        while ($hasil = $brg->fetch()) {
                                                            ?>
                                                            <option value="<?php echo $hasil['id_category']; ?>">
                                                                <?php echo $hasil['nama_category']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                </select>
                                                </div>

                                                <div class="col-md-11 ">
                                                    <p>Photo :</p>
                                                </div>
                                                <div class="col-11 mb-3">
                                                    <input type="file" class="form-control" name="images_barang" placeholder="Images" value="">
                                                </div>
                                                <div class="col-11 mb-3">
                                                    <input type="submit" class="btn amado-btn w-100" value="Insert" name="btnSubmitBarang"/>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div style="margin-left: 70%">
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
                                    </div>

                        <?php

                        $jumlahDataPerHalaman = 5;
                        $hasill = getAllBarang();
                        $jumlahData=0;
                        while ($dataa = $hasill->fetch()){$jumlahData +=1;}
                        $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
                        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"]:1;
                        $awalData = ($jumlahDataPerHalaman * $halamanAktif)- $jumlahDataPerHalaman;

                        $hasil = getAllBarangLimit($awalData,$jumlahDataPerHalaman);

                        ?>

                            <div class="container-fluid">
                        <div class="row">
                            <div class="col-5 col-lg-12">
                        <div class="cart-table clearfix">
                            <table id="myTable" class="table table-responsive">
                                <thead>
                                <tr bgcolor="#f8f8ff">
                                    <th>Product Photo</th>
                                    <th width="35%">Detail Item</th>
                                    <th width="30%">Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($data = $hasil->fetch()) {?>
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img width="150px" height="150px" src="img/product-img/<?php echo $data['images_barang'] ?>" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">

                                        <h5><?php echo $data['nama_barang'] ?></h5>
                                        <p style="margin-left: 30%">(<?php echo $data['id_barang'] ?>)</p>


                                    </td>
                                    <td class="price">
                                        <span><?php echo "Rp ", number_format($data['harga_barang'],2,",",".") ?></span>
                                        <span style="color:gray">/ <?php echo $data['satuan_barang'] ?></span>
                                        <p style="margin-top: 10px">
                                        <?php
                                        $ket ="";
                                        if ($data['status_barang']==1){
                                            $ket="Active";
                                        }
                                        else{
                                            $ket="Inactive";
                                        }

                                        echo $ket ?>
                                        </p>

                                    </td>
                                    <td class="qty">
                                        <?php if ($data['status_barang']==1){ ?>
                                            <button class="btn btn-outline-danger" name="btnUpdateBrg" onclick="updatebarang(<?php echo $data['id_barang']; ?>)">Inactive</button>
                                        <?php } else{ ?>
                                            <button class="btn btn-outline-primary" name="btnUpdateBrg" onclick="updatebarang(<?php echo $data['id_barang']; ?>)">Active</button>
                                        <?php } ?>
                                    </td>
                                </tr>

                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                            <nav aria-label="...">
                                <ul class="pagination">
                                    <?php if ($halamanAktif >1) {?>
                                        <li class="page-item"><a class="page-link" href="index.php?menu=barang&halaman=<?= $halamanAktif-1 ?>"> &laquo; </a></li>

                                    <?php } ?>

                                    <?php for($i=1; $i <= $jumlahHalaman; $i++): ?>
                                        <?php if ($i == $halamanAktif): ?>
                                            <li class="page-item active"><a class="page-link" href="index.php?menu=barang&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                        <?php else: ?>
                                            <li class="page-item"><a class="page-link" href="index.php?menu=barang&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($halamanAktif < $jumlahHalaman) {?>
                                        <li class="page-item"><a class="page-link" href="index.php?menu=barang&halaman=<?= $halamanAktif+1 ?>"> &raquo; </a></li>

                                    <?php } ?>

                                </ul>
                            </nav>

                        </div>
                    </div>
                        </div>
                            </div>
                                </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

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