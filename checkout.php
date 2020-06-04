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

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'detail'){
    $id = FILTER_INPUT(INPUT_GET,'id');

}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'mines'){
    $idP = FILTER_INPUT(INPUT_GET,'id');
    $idB = FILTER_INPUT(INPUT_GET,'barang');
    $qtyy = FILTER_INPUT(INPUT_GET,'qty');
    updateBarangBelian($qtyy,$idP,$idB);
    $hasilll = getAllKeranjangID($idP);
    $totall =0;
    while ($dataaa = $hasilll->fetch()) {
        $totall += $dataaa['harga_barang'] * $dataaa['qty_barang'];
    }
    updateHargaBelian($totall,$idP);

}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'plus'){
    $idP = FILTER_INPUT(INPUT_GET,'id');
    $idB = FILTER_INPUT(INPUT_GET,'barang');
    $qtyy = FILTER_INPUT(INPUT_GET,'qty');
    updateBarangBelian($qtyy,$idP,$idB);
    $hasilll = getAllKeranjangID($idP);
    $total =0;
    while ($dataaa = $hasilll->fetch()) {
        $total += $dataaa['harga_barang'] * $dataaa['qty_barang'];
    }
    updateHargaBelian($total,$idP);

}
$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'pay'){
    $id = FILTER_INPUT(INPUT_GET,'id');
    $stat = 1;
    $idKasir = $_SESSION['userid'];
    Pay($stat,$idKasir,$id);
}

$btnCommand = FILTER_INPUT(INPUT_GET,'command');
if($btnCommand == 'delete'){
    $id = FILTER_INPUT(INPUT_GET,'id');
    deletePembelian($id);
    header('location:index.php?menu=check');

}

$submit = filter_input(INPUT_POST, 'submitfix');
if (isset($submit)) {
//    var_dump($_SESSION['idfix']);
//    var_dump($_SESSION['brgfix']);
//    var_dump($_SESSION['afix']);exit;
    $i = 0;
    while ($i < sizeof($_SESSION['afix'])) {
        $name = 'quantity' . $i;
        $_SESSION['arrayfixqty'][$i] = filter_input(INPUT_POST, $name);
        $i++;
    }
    $e = 0;
    while ($e < sizeof($_SESSION['afix'])) {
        updateBarangBelian($_SESSION['arrayfixqty'][$e],$_SESSION['idfix'],$_SESSION['brgfix'][$e]);
        $e++;
    }
    $hasilll = getAllKeranjangID($_SESSION['idfix']);
    $total =0;
    while ($dataaa = $hasilll->fetch()) {
        $total += $dataaa['harga_barang'] * $dataaa['qty_barang'];
    }
    updateHargaBelian($total,$_SESSION['idfix']);

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
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=cat">Category</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li><a href="index.php?menu=barang">Product</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==FALSE){ ?><li ><a href="index.php?menu=cart">Cart</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE){ ?><li class="active"><a href="index.php?menu=check">Checkout</a></li><?php } ?>
                    <?php if ($_SESSION['approved_user']==TRUE AND $_SESSION['userid']==1){ ?><li><a href="index.php?menu=report">Report</a></li><?php } ?>
                </ul>
            </nav>
            <br><br>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://id.pinterest.com/anssport/toko-bahan-bangunan/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/cv.bintangbangunan/?hl=id"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/bintang.bangunan.7?hc_ref=ARTrk7FZUGrVvfq_6oFUVxUsgYtB2zoHC3ZC0QG0-h76dbhoq9ppno8i5yfX3DEeA5I&fref=nf"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/carolineadjie"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <?php
        $hasil = getAllPembeli();
        ?>

        <div class="cart-table-area">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 col-lg-4">

                        <div class="cart-summaryy">
                            <h5>Order</h5>
                            <table class="table table-responsive">

                                <tbody>
                                <?php while ($data = $hasil->fetch()) {
                                    if ($data['status_pembayaran']==0) {
                                        ?>

                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="#"><img src="images/userrr.png" alt="Product"></a>
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5><?php echo $data['nama_pembeli'] ?></h5>
                                            </td>
                                            <td class="price">
                                                <button class="btn btn-outline-success" name="btnDetail"
                                                        onclick="seedetail(<?php echo $data['id_pembelian'] ?>)">Detail
                                                </button>
                                            </td>
                                            <td class="qty">
                                                <button type="button" name="btnDelete"
                                                        onclick="DeletePembelian(<?php echo $data['id_pembelian'] ?>)"
                                                        class="btn btn-outline-danger">Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-12 col-lg-8">


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
                                $id = FILTER_INPUT(INPUT_GET,'id');
                                $hasill = getAllKeranjangID($id);
                                $i=0;
                                while ($dataa = $hasill->fetch()) {
                                    ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/product-img/<?php echo $dataa['images_barang'] ?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $dataa['nama_barang'] ?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo "Rp ", number_format($dataa['harga_barang'],2,",",".") ?></span>
                                            <span style="color: #5a6268"><?php echo " / ", $dataa['satuan_barang']; ?></span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <?php $_SESSION['idfix']=$id ?>
                                                    <?php $_SESSION['brgfix'][$i]=$dataa['id_barang'] ?>
                                                    <?php $_SESSION['afix'][$i]=$dataa['qty_barang'] ?>
<!--                                                    buat kalo mau + atau - nya langsung update-->
<!--                                                    mines(--><?php //echo $id ?><!--,--><?php //echo $dataa['id_barang']?><!--,--><?php //if ($dataa['qty_barang'] != 0){echo  $dataa['qty_barang']-1;}else{echo 0;} ?><!--);-->
<!--                                                    plus(--><?php //echo $id ?><!--,--><?php //echo $dataa['id_barang']?><!--,--><?php //echo  $dataa['qty_barang']+1;?><!--);-->
                                                    <span class="qty-minus"
                                                          onclick="var effect = document.getElementById('qty<?php echo $dataa['id_barang'] ?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) effect.value--; return false;"><i
                                                            class="fa fa-minus" aria-hidden="true" style="margin-top: 15px"></i></span>
                                                    <input type="number" class="qty-text" id="qty<?php echo $dataa['id_barang']?>" step="1" min="0"
                                                           max="1000" name="quantity<?php echo $i ?>" value="<?php echo $dataa['qty_barang'] ?>">
                                                    <span class="qty-plus"
                                                          onclick="var effect = document.getElementById('qty<?php echo $dataa['id_barang'] ?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                            class="fa fa-plus" aria-hidden="true" style="margin-top: 15px"></i>  </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                    $i+=1;
                                }

                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>
                                        <input type="submit" name="submitfix" value="FIX ORDER" class="btn amado-btn w-100"/>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                            </form>


                            <table class="table table-responsive">
                                <tbody>
                                <tr bgcolor="#f8f8ff" style="margin-top: 20px">
                                    <td >
                                        <h6>Name        </h6>
                                        <h6>Total Price </h6>
                                    </td>
                                    <?php
                                        $hasill = getAllKeranjangID($id);
                                        $dataa = $hasill->fetch()
                                    ?>
                                    <td>
                                        <h6>: <?php if ($id != null){echo $dataa['nama_pembeli'];} ?></h6>
                                        <h6>: <?php if ($id != null){echo "Rp ", number_format($dataa['totalharga'],2,",",".");} ?></h6>
                                    </td>
                                    <td>
                                        <center>
                                        <button name="btnPay" onclick="Pay(<?php echo $id?>)" class="btn btn-outline-success">Order Paid</button>
                                        </center>
                                    </td>
                                    <td>

                                        <button name="btnCancel" onclick="DeletePembelian(<?php echo $id?>)" class="btn btn-outline-danger">Cancel Order</button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>



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