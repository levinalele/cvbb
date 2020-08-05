<?php

require("phpmailer/class.phpmailer.php");
require("phpmailer/language/phpmailer.lang-en.php");


function masuk($username, $password)
{
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM kasir where email_kasir = ? AND password_kasir = MD5(?)";
        //prepare
        $stmt = $link -> prepare($sql);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $password, PDO::PARAM_STR);
        //execute
        $stmt->execute();

    } catch (PDOException $err){
        echo $err -> getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}


//Iklan

//function insertArray($id,$keranjang){
//    $keranjang[sizeof($keranjang)]=$id;
//    return $keranjang;
//}


function getAllIklan(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM iklan";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}



function getAllIklanLimit($awalData,$jumlahDataPerHalaman){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM iklan LIMIT ?,?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $awalData, PDO::PARAM_INT);
        $stmt->bindParam(2, $jumlahDataPerHalaman, PDO::PARAM_INT);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getOneIklan($id){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM iklan WHERE id_iklan =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function insertIklan($foto,$nama,$value)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        //begin transaksi #
        $link->beginTransaction();
        $qry = "INSERT INTO iklan(foto_iklan, nama_iklan,status_iklan) VALUES (?,?,?)";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $foto, PDO::PARAM_STR);
        $stmt->bindParam(2, $nama, PDO::PARAM_STR);
        $stmt->bindParam(3, $value, PDO::PARAM_STR);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}

function deleteIklan($id)
{
$msg = 'Gagal';
$link = get_koneksi();
try{
    //begin transaksi #
    $link->beginTransaction();
    //query
    $qry = "DELETE FROM iklan WHERE id_iklan=?";
    //prepare
    $stmt = $link->prepare($qry);
    //parameter #
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    //execute
    $hapus=$stmt-> execute();
    $msg ='Sukses';
    if ($hapus == FALSE){
        $msg ="Data Tidak Boleh Dihapus";
    }
    else{
        $link->commit();
        $msg = "Data Berhasil Dihapus";
    }}
catch(PDOException $err){
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}






//Category

function insertCategory($nama,$value)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        //begin transaksi #
        $link->beginTransaction();
        $qry = "INSERT INTO category(nama_category,status_category) VALUES (?,?)";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $nama, PDO::PARAM_STR);
        $stmt->bindParam(2, $value, PDO::PARAM_STR);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}

function updateCategory($stat,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE category SET status_category=? WHERE id_category=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $stat, PDO::PARAM_INT);
    $statement->bindValue(2, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=cat');
}



function getAllCategory(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM category";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}



function getAllCategoryLimit($awal, $JDP){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM category LIMIT ?,?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $awal, PDO::PARAM_INT);
        $stmt->bindParam(2, $JDP, PDO::PARAM_INT);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getOneCategory($id){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM category WHERE id_category =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

//insertPembelian
function insertPembelian($nama,$tlp,$email,$totalharga,$status,$idkasir)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        $link->beginTransaction();
        $qry = "INSERT INTO pembelian(nama_pembeli,telepon_pembeli,email_pembeli,totalharga,status_pembayaran,id_kasir) VALUES (?,?,?,?,?,?)";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $nama, PDO::PARAM_STR);
        $stmt->bindParam(2, $tlp, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $totalharga, PDO::PARAM_INT);
        $stmt->bindParam(5, $status, PDO::PARAM_INT);
        $stmt->bindParam(6, $idkasir, PDO::PARAM_INT);
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}


function insertcatBarang($idP,$idB,$qty)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        //begin transaksi #
        $link->beginTransaction();
        $qry = "INSERT INTO cat_barang(id_pembelian, id_barang, qty_barang) VALUES (?,?,?)";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $idP, PDO::PARAM_INT);
        $stmt->bindParam(2, $idB, PDO::PARAM_INT);
        $stmt->bindParam(3, $qty, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}

function getOnePembeli($nama,$tlp,$tgl){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM pembelian WHERE nama_pembeli =? AND telepon_pembeli = ? AND date = ?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $nama, PDO::PARAM_STR);
        $stmt->bindParam(2, $tlp, PDO::PARAM_STR);
        $stmt->bindParam(3, $tgl, PDO::PARAM_STR);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

//Pembayaran
function getAllKeranjangID($id){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT p.*, c.*, b.* FROM pembelian p JOIN cat_barang c ON p.id_pembelian = c.id_pembelian JOIN barang b ON c.id_barang = b.id_barang WHERE c.id_pembelian = ?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getAllPembeli(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM pembelian";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function updateBarangBelian($qty,$idP, $idB)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE cat_barang  SET qty_barang=? WHERE id_pembelian=? AND id_barang = ?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $qty, PDO::PARAM_INT);
    $statement->bindValue(2, $idP, PDO::PARAM_INT);
    $statement->bindValue(3, $idB, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;

}

function updateHargaBelian($harga,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE pembelian  SET totalharga=? WHERE id_pembelian=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $harga, PDO::PARAM_INT);
    $statement->bindValue(2, $id, PDO::PARAM_INT);

    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;

}



function Pay($stat,$idKasir,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE pembelian  SET status_pembayaran=?, id_kasir = ? WHERE id_pembelian=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $stat, PDO::PARAM_INT);
    $statement->bindValue(2, $idKasir, PDO::PARAM_INT);
    $statement->bindValue(3, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=check');
}

function deletePembelian($id)
{
    $msg = 'Gagal';
    $link = get_koneksi();
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $qry = "DELETE FROM pembelian WHERE id_pembelian=?";
        //prepare
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $hapus=$stmt-> execute();
        $msg ='Sukses';
        if ($hapus == FALSE){
            $msg ="Data Tidak Boleh Dihapus";
        }
        else{
            $link->commit();
            $msg = "Data Berhasil Dihapus";
        }}
    catch(PDOException $err){
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}






//User
function insertUser($nama,$tlp,$email,$alamat,$foto,$status,$password)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        //begin transaksi #
        $link->beginTransaction();
        $qry = "INSERT INTO kasir(nama_kasir,telepon_kasir,email_kasir,alamat_kasir,foto_kasir,status_kasir,password_kasir) VALUES (?,?,?,?,?,?,MD5(?))";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $nama, PDO::PARAM_STR);
        $stmt->bindParam(2, $tlp, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $alamat, PDO::PARAM_STR);
        $stmt->bindParam(5, $foto, PDO::PARAM_STR);
        $stmt->bindParam(6, $status, PDO::PARAM_STR);
        $stmt->bindParam(7, $password, PDO::PARAM_STR);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}

function getAllUser(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM kasir";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getAllUserLimit($awal,$JDP){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT * FROM kasir LIMIT ?,? ";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $awal, PDO::PARAM_INT);
        $stmt->bindParam(2, $JDP, PDO::PARAM_INT);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getOneUser($id){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM kasir WHERE id_kasir =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function updateUser($stat,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE kasir SET status_kasir=? WHERE id_kasir=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $stat, PDO::PARAM_INT);
    $statement->bindValue(2, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=user');
}

function editUser($tlp,$email,$alamat,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE kasir SET telepon_kasir =?, email_kasir=? ,alamat_kasir=?  WHERE id_kasir=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $tlp, PDO::PARAM_STR);
    $statement->bindValue(2, $email, PDO::PARAM_STR);
    $statement->bindValue(3, $alamat, PDO::PARAM_STR);
    $statement->bindValue(4,$id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=user');
}

//function updatePassword($stat,$id)
//{
//    $link = get_koneksi();
//    $link->beginTransaction();
//    $query = "UPDATE kasir SET status_kasir=? WHERE id_kasir=?";
//    $statement = $link->prepare($query);
//    $statement->bindValue(1, $stat, PDO::PARAM_INT);
//    $statement->bindValue(2, $id, PDO::PARAM_INT);
//    if ($statement->execute()) {
//        $link->commit();
//    } else {
//        $link->rollBack();
//    }
//    $link = null;
//    header('location:index.php?menu=user');
//}









//Barang

function getAllBarang(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT b.*,c.nama_category FROM barang b JOIN category c ON b.id_category = c.id_category";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getAllBarangLimit($awal, $JDP){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT b.*,c.nama_category FROM barang b JOIN category c ON b.id_category = c.id_category LIMIT ?,?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $awal, PDO::PARAM_INT);
        $stmt->bindParam(2, $JDP, PDO::PARAM_INT);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getOneBarang($id){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT b.*,c.nama_category FROM barang b JOIN category c ON b.id_category = c.id_category WHERE id_barang =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function updateBarang($stat,$id)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE barang SET status_barang=? WHERE id_barang=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $stat, PDO::PARAM_INT);
    $statement->bindValue(2, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=barang');
}

function insertBarang($harga,$nama,$foto,$satuan,$status,$cat)
{
    $link = get_koneksi();
    $msg = 'gagal';
    try {
        $link->beginTransaction();
        $qry = "INSERT INTO barang(harga_barang,nama_barang,images_barang,satuan_barang,status_barang,id_category) VALUES (?,?,?,?,?,?)";
        $stmt = $link->prepare($qry);
        //parameter #
        $stmt->bindParam(1, $harga, PDO::PARAM_INT);
        $stmt->bindParam(2, $nama, PDO::PARAM_STR);
        $stmt->bindParam(3, $foto, PDO::PARAM_STR);
        $stmt->bindParam(4, $satuan, PDO::PARAM_STR);
        $stmt->bindParam(5, $status, PDO::PARAM_STR);
        $stmt->bindParam(6, $cat, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $msg;
}

//Send ForgetPass
    function insertKey($key,$email)
    {
        $link = get_koneksi();
        $link->beginTransaction();
        $query = "UPDATE kasir SET key_kasir=? WHERE email_kasir=?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $key, PDO::PARAM_INT);
        $statement->bindValue(2, $email, PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    function cekEmail($email)
    {
        $link = get_koneksi();
        $link->beginTransaction();
        $query = "SELECT * from kasir WHERE email_kasir=?";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        if ($result==false) {
            return 0;
        } else {
            return 1;
        }

    }

function forgotPassword($email)
    {
        $mailer = new PHPMailer();
        $mailer->SetLanguage('en',dirname(__FILE__) . '/phpmailer/language/');
        $mailer->IsSMTP();
        //$mailer->SMTPSecure = 'ssl';
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = true;
        $mailer->Username = 'cvbintangbangunann@gmail.com';
        // Change this to your gmail password
        $mailer->Password = 'cvbb12345';
        $mailer->From = 'cvbintangbangunann@gmail.com';
        $mailer->FromName = 'CV Bintang Bangunan';
        $key = rand(1,1000000);
        insertKey($key,$email);
        $body = "<h3>CV Bintang Bangunan</h3><p>Salam hangat dari CV Bintang Bangunan,</p>
                 <p>Pastikan anda tidak membagikan link ini untuk menjaga keamanan password anda.</p>
                 <p>untuk mengubah password anda klik pada link di bawah ini.</p><br>
                 <p><a href=\"http://localhost/cvbb/index.php?menu=resetpassword&email=$email&key=$key\">Click Here to reset password</a></p>";
        $mailer->IsHTML(true);
        $mailer->Body = $body;
        $mailer->Subject = 'Reset Password';
        $mailer->AddAddress($email);
        if (!$mailer->Send()) {
           echo "Message was not sent<br/ >";
           echo "Mailer Error: " . $mailer->ErrorInfo;
        } else {
             echo "";
         }
    }

function updatePassword( $pass ,$email)
{
    $link = get_koneksi();
    $link->beginTransaction();
    $query = "UPDATE kasir SET password_kasir=MD5(?) WHERE email_kasir=?";
    $statement = $link->prepare($query);
    $statement->bindValue(1, $pass, PDO::PARAM_STR);
    $statement->bindValue(2, $email, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header('location:index.php?menu=login');
}

function getOneUserEmail($email){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM kasir WHERE email_kasir =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getOneEmail($id){
    $link = get_koneksi();
    $msg = 'gagal';
    try{
        //begin transaksi #
        $link->beginTransaction();
        //query
        $sql = "SELECT * FROM kasir WHERE id_kasir =?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        //execute
        $stmt->execute();
        $link->commit();
        $msg = 'sukses';
    } catch (PDOException $err) {
        $link->rollBack();
        $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

//Report
function getAllReport(){
    $link = get_koneksi();
    try{
        //query
        $sql = "SELECT p.*, c.*, b.* FROM pembelian p JOIN cat_barang c ON p.id_pembelian = c.id_pembelian JOIN barang b ON c.id_barang = b.id_barang WHERE p.status_pembayaran =1";
        //prepare
        $stmt= $link->prepare($sql);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}

function getAllReportBy($fromdate,$todate){
    $link = get_koneksi();
    try{
        //query
//        var_dump($fromdate);
//        var_dump($todate);
//        exit;
        $fromdate.=' 00:00:00';
        $todate.=' 23:59:59';

        $sql = "SELECT p.*, c.*, b.* FROM pembelian p JOIN cat_barang c ON p.id_pembelian = c.id_pembelian JOIN barang b ON c.id_barang = b.id_barang WHERE p.status_pembayaran =1 AND p.date BETWEEN ? AND ?";
        //prepare
        $stmt= $link->prepare($sql);
        $stmt->bindParam(1, $fromdate, PDO::PARAM_STR);
        $stmt->bindParam(2, $todate, PDO::PARAM_STR);
        //execute
        $stmt->execute();
    }catch (PDOException $err){
        echo $err->getMessage();
        die();
    }
    close_koneksi($link);
    return $stmt;
}









?>
