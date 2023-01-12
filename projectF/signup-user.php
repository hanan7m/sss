<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تسجيل جديد</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
 
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form dir="rtl" action="signup-user.php" method="POST" autocomplete="" direction= "rtl" text-align="right">
                    <h2 class="text-center">منصة التأهيل الوظيفي</h2>
                    <p class="text-center">تسجيل جديد</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                     <div class="form-group">
                     <input class="form-control" type="text"  name="ssn" placeholder="رقم الهوية" required    pattern="[0-9]{10}" title="ادخل رقم الهوية الذي يحتوي على 10 ارقام بشكل صحيح" value="<?php if(isset($ssn)){ $ssn;} ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="الاسم الكامل " required >
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="phone"  inputmode="numeric" name="phone" placeholder="رقم الهاتف" required  pattern="[0]{1}[5]{1}[0|4|6|7|9|8|5]{1}[0-9]{7}" title="ادخال رقم الهاتف 05-00000000" value="<?php if(isset($phone)){echo $phone ;} ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="email" inputmode="email" name="email" placeholder="البريد الإلكتروني" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ادخلي البريد الإلكتروني بشكل صحيح" value="<?php  $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="الرقم السري" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="يجب أن يحتوي على رقم واحد على الأقل وحرف واحد كبير وصغير و 8 أحرف على الأقل أو أكثر">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="تأكيد الرقم السري" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="file" placeholder="السيرة الذاتية" required value="<?php  $file ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="تسجيل جديد">
                    </div>
                    <div class="link login-link text-center">عضو سابق? <a href="index.php">سجل دخول </a></div>
                </form>
            </div>
        </div>
    </div>



    <!-- <script>  
function validateemail()  
{  
var x=document.form.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("الرجاء ادخال البريد الالكتروني بشكل صحيح");  
  return false;  
  }  
}    </script>
     -->

  <!-- <script type="text/javascript">    
  function checkForm(form)  
  {  
    if(form.password.value != "" && form.password.value == form.cpassword.value) {  
      if(form.password.value.length < 6) {  
        alert("Error: Password must contain at least six characters!");  
        form.password.focus();  
        return false;  
      }  
      if(form.password.value == form.username.value) {  
        alert("Error: Password must be different from Username!");  
        form.password.focus();  
        return false;  
      }  
    re = /[0-9]/;  
      if(!re.test(form.password.value)) {  
        alert("Error: password must contain at least one number (0-9)!");  
        form.password.focus();  
        return false;  
      }  
      re = /[a-z]/;  
      if(!re.test(form.password.value)) {  
        alert("Error: password must contain at least one lowercase letter (a-z)!");  
        form.password.focus();  
        return false;  
      }  
      re = /[A-Z]/;  
      if(!re.test(form.password.value)) {  
        alert("Error: password must contain at least one uppercase letter (A-Z)!");  
        form.password.focus();  
        return false;  
      }  
    } else {  
      alert("Error: Please check that you've entered and confirmed your password!");  
      form.password.focus();  
      return false;  
    }  
    return true;  
  }  
  </script>  -->

</body>
</html>
