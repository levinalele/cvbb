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


$btnReset = FILTER_INPUT(INPUT_POST, 'btnForgetPassword');
if($btnReset)
{
    $email = FILTER_INPUT(INPUT_POST, 'email');
    if (cekEmail($email)==0){
        $msg="email tidak ditemukan";}
    else if (cekEmail($email)==1){
        $msg="check your email";
        forgotPassword($email);}
    else{
        $msg=" ";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title  -->
    <title>CV Bintang Bangunan</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/logo.png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/forgetpass.jpg" alt="sing up image"></figure>
                    <a href="index.php?menu=login" class="signup-image-link">Sign In</a>
                    <center>or</center>
                    <a href="index.php" class="signup-image-link">Back to Home</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Forgot Passsword</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email"  placeholder="Your Email" required/>
                        </div>
                        <div><?php
                            if (FILTER_INPUT(INPUT_POST, 'email') != null){
                            echo $msg;}?></div>

                        <div class="form-group form-button">
                            <input type="submit" name="btnForgetPassword" class="form-submit" value="Send Email"/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>