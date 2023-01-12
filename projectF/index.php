<?php 
require_once "login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" type="text/css" href="css/mainindex.css" />
</head>
<body>
<div class="intro">
    <h1 class="logo-header">
    <span class="logo">
    <a class="navbar-brand"><img src="img/logo.png" width="120" height="120"></span>

<span class="logo1"> منصة التأهيل الوظيفي </span>
    </h1></div>

    
<script src="app.js"></script>



    
    <div class="cont">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form dir="rtl" action="index.php" method="POST" autocomplete="on">
                    <h2 class="textTitle">منصة التأهيل الوظيفي</h2>
                    <p class="textTitle2">تسجيل الدخول</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div id="errormsg" class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني" required >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="كلمة المرور" required>
                    </div>
                    <div id="forgotpassword" class="link forget-pass text-left"><a href="forgot-password.php">نسيان  كلمة المرور</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="دخول">
                    </div>
                    <div class="notreg">لست مسجلَا بعد؟ <a href="choose-user.php">تسجيل جديد</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>