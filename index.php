<?php
session_start();
if (!isset($_SESSION['approved_user'])) {
    $_SESSION['approved_user'] = FALSE;
}


include_once "conn.php";
include_once "function.php";


?>

<script type="text/javascript">


    function updatecat(id) {
        window.location="index.php?menu=cat&command=update&id="+id;
    }
    function updatebarang(id) {
        window.location="index.php?menu=barang&command=update&id="+id;
    }
    function deleteiklan(id,$halaman) {
        window.location="index.php?menu=iklan&command=delete&id="+id+"&halaman="+$halaman;
    }
    function resetpassuser(id) {
        window.location="index.php?menu=user&command=reset&id="+id;
    }
    function updateuser(id) {
        window.location="index.php?menu=user&command=update&id="+id;
    }
    function edituser(id) {
        window.location="index.php?menu=user&command=edit&id="+id;
    }
    function addshop(id) {
        window.location="index.php?menu=shop&command=add&id="+id;
    }
    function jumlah(id) {
        window.location="index.php?menu=cart&command=get&id="+id;
    }
    function seedetail(id) {
        window.location="index.php?menu=check&command=detail&id="+id;
    }
    function mines(id,barang,qty) {
        window.location="index.php?menu=check&command=mines&id="+id+"&barang="+barang+"&qty="+qty;
    }
    function plus(id,barang,qty) {
        window.location="index.php?menu=check&command=plus&id="+id+"&barang="+barang+"&qty="+qty;
    }
    function Pay(id) {
        window.location="index.php?menu=check&command=pay&id="+id;
    }
    function DeletePembelian(id) {
        window.location="index.php?menu=check&command=delete&id="+id;
    }
    function Logout(id) {
        window.location="index.php?menu=logout&command=logout&id="+id;
    }


</script>

<?php
$nav = FILTER_INPUT(INPUT_GET,'menu');
switch ($nav){
    case 'cat' :
        include_once 'insertcategory.php';
        break;
    case 'user' :
    {
        $cmd = FILTER_INPUT(INPUT_GET,'command');
        if(isset($cmd) && $cmd == 'edit' ){
            include_once 'updateuser.php';
        }else {
            include_once 'insertuser.php';
        }
        break;
    }
    case 'login' :
        include_once 'login.php';
        break;
    case 'forgetpassword' :
        include_once 'forgetpassword.php';
        break;
    case 'resetpassword' :
        include_once 'resetpassword.php';
        break;
    case 'barang' :
        include_once 'product-details.php';
        break;
    case 'shop' :
        include_once 'shop.php';
        break;
    case 'check' :
        include_once 'checkout.php';
        break;
    case 'cart' :
        include_once 'cart.php';
        break;
    case 'cartorder' :
        include_once 'cartorder.php';
        break;
    case 'thankyou' :
        include_once 'thankyou.php';
        break;
    case 'iklan' :
        include_once 'iklan.php';
        break;
    case 'report' :
        include_once 'report.php';
        break;
    case 'history' :
        include_once 'history.php';
        break;
    case 'logout':
    {

        $_SESSION['approved_user'] = FALSE;
        $_SESSION['userid'] = '';
        $_SESSION['username'] = '';
        $_SESSION['name'] ='';
        session_unset() ;
        session_destroy();
        header('location:index.php');
    }
    default: include_once 'home.php';
        break;
}
if (!isset($nav)){
    include_once 'home.php';
}
?>
