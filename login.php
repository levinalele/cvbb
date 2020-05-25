<!DOCTYPE html>
<style>
    body{
        zoom: 70%;
    }
</style>
<html lang="en">
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
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
<!--                    <a href="signup.html" class="signup-image-link">Create an Account</a>-->
<!--                    <center>or</center>-->
                    <a href="index.php" class="signup-image-link">Back to Home</a>
                </div>

                <?php



                if($_SESSION['approved_user'] == FALSE) {
                $btnLogin = FILTER_INPUT(INPUT_POST,'btnLogin');
                if(isset($btnLogin)) {

                    $username = FILTER_INPUT(INPUT_POST, 'uname');
                    $password = FILTER_INPUT(INPUT_POST, 'pwd');


                    $data = masuk($username, $password);
                    $result = $data->fetch();
                    if(isset($result) && $result['id_kasir'] > 0 && $result['status_kasir']==1) {
                        $_SESSION['approved_user'] = TRUE;
                        $_SESSION['userid'] = $result['id_kasir'];
                        $_SESSION['username'] = $result['email_kasir'];
                        $_SESSION['name'] = $result['nama_kasir'];
                        header('location:index.php');

                    }
                    else{
                        $_SESSION['approved_user'] = FALSE;
                        $_SESSION['msg']='user has been deactive';
                    }

                }
                ?>

                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="uname" id="your_name" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pwd" id="your_pass" placeholder="Password"/>
                        </div>
                        <div><a href="index.php?menu=forgetpassword" ><span style="color: #0b0b0b">Forget Password</span> </a></div>
                        <div><?php if (isset($_SESSION['msg'])){echo  $_SESSION['msg']; unset($_SESSION['msg']);} ?></div>

                        <div class="form-group form-button">
                            <input type="submit" name="btnLogin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>

                </div>
                    <?php
                } else {
                    ?>
                    <div align="center">
                    <H2 style="font-family: 'Comic Sans MS';margin-top: 130px;margin-bottom: 10px">Hello </H2>
                    <span style="color: #5a6268; font-size: 20px;font-family: 'Courier New';"><?php echo $_SESSION['name']?></span>
                    <div style="margin-left: 10px">
                <button class="form-submit" name="btnLogout" onclick="Logout(<?php echo $_SESSION['userid']?>)">Log Out</button>
                        </div>
                        </div>


                    <?php
                }

                ?>

            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>