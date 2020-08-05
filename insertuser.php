<!DOCTYPE html>
<html lang="en">


<?php

include_once "conn.php";
include_once "function.php";




//insert
$btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmitUser');
if($btnSubmit)
{
    $name = FILTER_INPUT(INPUT_POST, 'kName');
    $tlp = FILTER_INPUT(INPUT_POST, 'kTlp');
    $email = FILTER_INPUT(INPUT_POST, 'kEmail');
    $address = FILTER_INPUT(INPUT_POST, 'kAlamat');
    $pass = FILTER_INPUT(INPUT_POST, 'kPass');
    $stat = 1;

    $namafile = $_FILES['kFoto']['name']; //nama file persis dari yang mau di upload
    $tmp = $_FILES['kFoto']['tmp_name']; //menampung file sementara
    $ukuran = $_FILES['kFoto']['size']; //ukuran dari file (dibatesin)
    $ext = pathinfo($namafile, PATHINFO_EXTENSION);

    $app_ext = array('png','jpg','jpeg','gif','svg','bmp');
    $newfile = $name.'.'.$ext;

    if(in_array(strtolower($ext),$app_ext)== TRUE && $ukuran <= 5000*5000*2){
        move_uploaded_file($tmp,'img/profil/'.$newfile);
        $msg = insertUser($name, $tlp, $email, $address,$newfile,$stat, $pass );
    }
    else {
        $msg='ext';
    }
}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'update'){
    $id = FILTER_INPUT(INPUT_GET,'id');
    //kalo di vardum idnya dapet
    //salahnya disini mungkin sama di function
    $data = getOneUser($id);
    $result = $data -> fetch();
    $statusCatLama = $result['status_kasir'];
    if ($statusCatLama == 1){$statbaru = 0;}
    else{$statbaru=1;}

    updateUser($statbaru,$id);
    header('location:index.php?menu=user');

}

$btnReset = FILTER_INPUT(INPUT_GET, 'command');
if($btnReset =='reset')
{
    $id = FILTER_INPUT(INPUT_GET,'id');
    $hasill = getOneEmail($id);
    $dataa = $hasill->fetch();
    $emaill = $dataa['email_kasir'];
    forgotPassword($emaill);
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

    <!-- Product Details Area Start -->
    <!--        <div class="single-product-area section-padding-100 clearfix">-->

                <div class="col-8 col-lg-8" >
                    <div style="padding-left: 9%" class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Insert User</h2>
                        </div>

                        <form action="" method="post" enctype= multipart/form-data>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <p>Full Name :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="kName" placeholder="" value="" required>
                                </div>
                                <div class="col-md-11 ">
                                    <p>Phone Number :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="kTlp" placeholder="" value="" required>
                                </div>
                                <div class="col-md-11 ">
                                    <p>Email :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="email" class="form-control" name="kEmail" placeholder="" value="" required>
                                </div>
                                <div class="col-md-11 ">
                                    <p>Address :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="text" class="form-control" name="kAlamat" placeholder="" value="" required>
                                </div>

                                <div class="col-md-11 ">
                                    <p>Password :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="password" class="form-control" name="kPass" placeholder="" value="" required>
                                </div>
                                <div class="col-md-11 ">
                                    <p>Photo :</p>
                                </div>
                                <div class="col-11 mb-3">
                                    <input type="file" class="form-control" name="kFoto" required/>
                                </div>


                                <div class="col-11 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" value="Insert" name="btnSubmitUser"/>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div style="margin-left: 70%">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
                    </div>


        <?php
        $jumlahDataPerHalaman = 3;
        $hasill = getAllUser();
        $jumlahData = 0;
        while ($dataa = $hasill->fetch()) {
            $jumlahData += 1;
        }
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

        $hasil = getAllUserLimit($awalData, $jumlahDataPerHalaman);


        ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-lg-12">
                    <div class="cart-table clearfix">
                        <table id="myTable" class="table table-responsive">
                            <thead style="background-color: #FFFFFF">
                            <tr>
                                <th>User Photo</th>
                                <th>Detail Profil</th>
                                <th>Email & Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($data = $hasil->fetch()) {?>
                            <tr>
                                <td class="cart_product_img">
                                    <img width="150px" height="150px" src="img/profil/<?php echo $data['foto_kasir'] ?>" alt="Product">
                                </td>
                                <td class="cart_product_desc">
                                    <h5><?php echo $data['nama_kasir'] ?></h5>
                                    <div style="color:gray; margin-top: 10px"><?php echo $data['telepon_kasir'] ?></div>
                                    <div style="color:darkgrey;margin-top: 10px"><?php echo $data['alamat_kasir'] ?></div>


                                </td>
                                <td class="price">
                                    <div><?php echo $data['email_kasir'] ?> </div>

                                            <button style="margin-top: 20px;"  class="btn btn-outline-warning" onclick="resetpassuser(<?php echo $data['id_kasir']; ?>)" name="btnForgetPassword">Reset Password</button>

                                </td>
                                <td class="qty">
                                    <button class="btn btn-outline-success" name="btnEditUser" onclick="edituser(<?php echo $data['id_kasir']; ?>)" > <span style="color:green">Update</span></button>

                                    <?php if ($data['status_kasir']==1 AND $data['id_kasir']!=1){ ?>
                                    <button style="margin-top: 10px" class="btn btn-outline-danger" name="btnUpdateUser" onclick="updateuser(<?php echo $data['id_kasir']; ?>)">Inactive</button>
                                    <?php } else if($data['id_kasir']!=1){ ?>
                                        <button style="margin-top: 10px" class="btn btn-outline-primary" name="btnUpdateUser" onclick="updateuser(<?php echo $data['id_kasir']; ?>)">Active</button>
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
                                    <li class="page-item"><a class="page-link" href="index.php?menu=user&halaman=<?= $halamanAktif-1 ?>"> &laquo; </a></li>

                                <?php } ?>

                                <?php for($i=1; $i <= $jumlahHalaman; $i++): ?>
                                    <?php if ($i == $halamanAktif): ?>
                                        <li class="page-item active"><a class="page-link" href="index.php?menu=user&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                    <?php else: ?>
                                        <li class="page-item"><a class="page-link" href="index.php?menu=user&halaman=<?= $i ?>"><?php echo $i ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($halamanAktif < $jumlahHalaman) {?>
                                    <li class="page-item"><a class="page-link" href="index.php?menu=user&halaman=<?= $halamanAktif+1 ?>"> &raquo; </a></li>

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