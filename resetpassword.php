<!DOCTYPE html>
<html lang="en">

<?php
include_once "conn.php";
include_once "function.php";



$btnReset = FILTER_INPUT(INPUT_POST, 'btnResetPassword');
if($btnReset)
{
    $email = FILTER_INPUT(INPUT_GET,'email');
    $kei = FILTER_INPUT(INPUT_GET,'key');
    $data = getOneUserEmail($email);
    $result = $data -> fetch();
    $key = $result['key_kasir'];
    $pass1 = FILTER_INPUT(INPUT_POST, 'password');
    $pass2 = FILTER_INPUT(INPUT_POST, 'repassword');
    if ($pass1 == null OR $pass2 == null){
        $msg = "fill your password";
    }
    else if($kei!=$key){$msg="please re-check your newest email";}
    else if($pass1 == $pass2 AND $kei==$key){
        updatePassword($pass2,$email);
        header("location:index.php?menu=login");
    }
    else{$msg = "Password doesn't match";}





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

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Reset Password</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" placeholder="New Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="repassword"  placeholder="Repeat your password"/>
                        </div>
                        <div>
                            <?php
                            if ($pass1 = FILTER_INPUT(INPUT_POST, 'password') != null OR $pass1 = FILTER_INPUT(INPUT_POST, 'repassword')){
                                echo $msg;
                            }
                            ?>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="btnResetPassword" class="form-submit" value="Reset"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
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