<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();


//if user signup button
if(isset($_POST['signup'])){
    $ssn = mysqli_real_escape_string($con, $_POST['ssn']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $file = mysqli_real_escape_string($con, $_POST['file']);

    if($password !== $cpassword){
        $errors['password'] = "كلمة المرور غير متطابقة!";
    }

    $email_check = "SELECT * FROM student WHERE SEmail = '$email'";
    $res = mysqli_query($con, $email_check);

    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "البريد الإلكتروني الذي أدخلته موجود بالفعل!";
    }
    $ssn_check = "SELECT * FROM student WHERE SSn = '$ssn'";
    $res = mysqli_query($con, $ssn_check);

    if(mysqli_num_rows($res) > 0){
        $errors['ssn'] = "رقم الهوية الذي أدخلته موجود بالفعل!";
    }

    $phone_check = "SELECT * FROM student WHERE SPhone = '$phone'";
    $res = mysqli_query($con, $phone_check);

    if(mysqli_num_rows($res) > 0){
        $errors['phone'] = " رقم الهاتف الذي أدخلته موجود بالفعل!";
    }

    if(count($errors) == 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "not verified";
        $insert_data =  "INSERT INTO `student`(`SSn`, `SName`, `SEmail`, `SPhone`, `Sfile`, `SPassword`, `a_ID`, `code`, `status`) VALUES 
        ('$ssn','$name','$email','$phone','$file','$encpass','1','$code','$status')";
       $data_check = mysqli_query($con, $insert_data);

        if($data_check){
            $subject = "Account verification code";
            $message = "رمز التحقق الخاص بك هو $code  ";
            $sender = "from :hanan.almimoni@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info =$email;
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "خطأ اثاء ارسال رقم التحقق";
            }
        }else{
            $errors['db-error'] = "خطأ اثناء اضافة البيانات إلى قاعدة البيانات";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM student WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['SEmail'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE student SET code = '$code', status = '$status' WHERE code = '$fetch_code'";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: ../studentt/studrnthome.php');
                exit();
            }else{
                $errors['otp-error'] = "خطأ اثناء تحديث رقم التحقق";
            }
        }else{
            $errors['otp-error'] = "رقم التحقق غير صحيح";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $check_email = "SELECT * FROM student WHERE SEmail = '$email'";
        $res = mysqli_query($con, $check_email);

        $check_email_sys = "SELECT * FROM systemadmin WHERE AEmail = '$email'";
        $res_sys = mysqli_query($con, $check_email_sys);

        $check_email_Hr = "SELECT * FROM hr WHERE HrEmail = '$email'";
        $res_Hr = mysqli_query($con, $check_email_Hr);
        
if(mysqli_num_rows($res_sys) > 0){
    $fetch = mysqli_fetch_assoc($res_sys);
            $fetch_pass = $fetch['APassword'];
            if(  $fetch_pass == $password){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ../home_admin.php');
}else{  $errors['email'] = "البريد أو كلمة مرور غير صحيحة!";}}


elseif(mysqli_num_rows($res_Hr) > 0){
    $fetch = mysqli_fetch_assoc($res_Hr);
    $fetch_pass = $fetch['HrPassword'];
    if( $fetch_pass == $password){
        $_SESSION['email'] = $email;
        $status = $fetch['status'];
        if($status == 'verified'){
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
            header('location: ../viewCompanypage.php');
        }else{
            $info = "لم تقم بتفعيل البريدالإلكتروني  - '$email'";
            $_SESSION['info'] = $info;
            header('location: user-otp.php');
        }
    }else{
        $errors['email'] = "البريد أو كلمة مرور غير صحيحة!";
    }}
        elseif(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['SPassword'];
            if($fetch_pass == $password){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];

                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location:../studenthome.php');
                }else{
                    $info = "لم تقم بتفعيل البريدالإلكتروني  - '$email'";
                    $_SESSION['info'] = $info;
                    header('location: ../user-otp.php');
                }
            }else{
                $errors['email'] = "البريد أو كلمة مرور غير صحيحة!";
            }
        }else{
            $errors['email'] = "يبدو أنك لست عضوًا بعد! انقر على الرابط السفلي للتسجيل";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM student WHERE SEmail='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE student SET code = '$code' WHERE SEmail = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "رمز إعادة تعيين كلمة المرور";
                $message = "رمز إعادة تعيين كلمة المرور الخاصة بك هو $code";
                $sender = "From: hanan.almimoni@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "لقد أرسلنا إعادة تعيين كلمة المرور otp إلى بريدك الإلكتروني - '$email'";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: ../reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "فشل إرسال رقم التحقق";
                }
            }else{
                $errors['db-error'] = "هناك خطأ ما!";
            }
        }else{
            $errors['email'] = "عنوان البريد الإلكتروني هذا غير موجود!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM student WHERE code = '$otp_code'";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['SEmail'];
            $_SESSION['email'] = $email;
            $info = "الرجاء إنشاء كلمة مرور جديدة لا تستخدمها في أي موقع آخر.";
            $_SESSION['info'] = $info;
            header('location: ../new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "لقد أدخلت رمزًا غير صحيح!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "تأكيد كلمة المرور غير متطابقة!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE student SET code = '$code', SPassword = '$encpass' WHERE SEmail = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "تم تغيير كلمة المرور الخاصة بك. الآن يمكنك تسجيل الدخول باستخدام كلمة المرور الجديدة الخاصة بك.";
                $_SESSION['info'] = $info;
                header('Location: ../password-changed.php');
            }else{
                $errors['db-error'] = "فشل في تغيير كلمة المرور الخاصة بك!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: ../index.php');
    }
    //if edit button click

        
    if(isset($_POST['edit'])){
        $ssn = mysqli_real_escape_string($con, $_POST['ssn']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $file = mysqli_real_escape_string($con, $_POST['file']);
        if (isset($_POST['edit'])) {
            $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="uploads/".$pdf;
            move_uploaded_file($pdf_tem_loc,$pdf_store);
            $sql="UPDATE  student set Sfile ='$pdf' where SEmail='$email'";
            $query=mysqli_query($con,$sql);
          }
        $update_pass = "UPDATE student SET SName = '$name',SEmail = '$email', SPhone = '$phone' WHERE SSn = '$ssn'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
echo "تم تحديث بياناتك بنجاح";    
    }}
////////////////////////////////////

if(isset($_POST['insert-student'])){
$ssn = mysqli_real_escape_string($con, $_POST['ssn']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);

$email_check = "SELECT * FROM student WHERE SEmail = '$email'";
$res = mysqli_query($con, $email_check);
if(mysqli_num_rows($res) > 0){
    $errors['email'] = "البريد الإلكتروني الذي أدخلته موجود بالفعل!";
}
$ssn_check = "SELECT * FROM student WHERE SSn = '$ssn'";
$res = mysqli_query($con, $ssn_check);
if(mysqli_num_rows($res) > 0){
    $errors['ssn'] = "رقم الهوية الذي أدخلته موجود بالفعل!";
}
$phone_check = "SELECT * FROM student WHERE SPhone = '$phone'";
$res = mysqli_query($con, $phone_check);
if(mysqli_num_rows($res) > 0){
    $errors['phone'] = " رقم الهاتف الذي أدخلته موجود بالفعل!";
}
    if (count($errors) == 0) {
        $pass = substr(md5(microtime()), rand(0, 26), 5);
        $code = rand(999999, 111111);
        $status = "not verified";
        $insert_data = "INSERT INTO `student`( `SSn`, `SName`, `SEmail`, `SPhone`, `SPassword`, `a_ID`, `code`, `status`) VALUES 
    ('$ssn','$name','$email','$phone','$pass','1','$code','$status')";
    $data_check = mysqli_query($con, $insert_data);
    if ($data_check) {
        $subject = "Password Account ";
        $message = " youre password is  $pass and your $code ";
        $sender = "from :hanan.almimoni@gmail.com";
        if (mail($email, $subject, $message, $sender)) {
            $info = $email;
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
            header('location: ../student/student.php');
            exit(0);
        } else {
            $errors['db-error'] = "خطأ اثناء اضافة البيانات إلى قاعدة البيانات";
        }
    }
}
} 
////////////////////////////////

 
if(isset($_POST['update']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_idd']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
  
    $query = "UPDATE `student` SET
    `SName`='$name',`SEmail`='$email',`SPhone`='$phone'
    WHERE SSn='$student_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: ../student/student.php");
        exit(0);}
    else
    {$_SESSION['message'] = "Student Not Updated";
        header("Location: ../student/student.php");
        exit(0);}}
        /////////////////////////
if (isset($_POST['update_studentt'])) {
    $s_id = mysqli_real_escape_string($con, $_POST['student_idd']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);


    $update_pass = "UPDATE student SET SName = '$name', SEmail = '$email', SPhone = '$phone' WHERE s_id = '$s_id'";
    $run_query = mysqli_query($con, $update_pass);

    if ($run_query) {
        $_SESSION['message'] = " تم تحديث بياناتك";
        header("Location:../studentt/studentEditInfo.php");
        exit(0);}
}

if (isset($_POST['savee'])) {

    $s_id = mysqli_real_escape_string($con, $_POST['student_idd']);
    $pdf = $_FILES['pdf']['name'];
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
    $pdf_store = "uploads/" . $pdf;
    move_uploaded_file($pdf_tem_loc, $pdf_store);

    $update = "UPDATE student SET Sfile ='$pdf' WHERE s_id = '$s_id'";
    $run_query = mysqli_query($con, $update);

    if ($run_query) {
        $_SESSION['message'] = " تم تحديث السيره الذاتية";
        header("Location:../studentt/studentEditInfo.php");
        exit(0);}
}

if (isset($_POST['update_studentt'])) {
    $ssn = mysqli_real_escape_string($con, $_POST['student_idd']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $pdf = $_FILES['pdf']['name'];
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
    $pdf_store = "uploads/" . $pdf;
    move_uploaded_file($pdf_tem_loc, $pdf_store);

    $update_pass = "UPDATE student SET SName = '$name',SEmail = '$email', SPhone = '$phone' , Sfile ='$pdf' WHERE SSn = '$ssn'";
    $run_query = mysqli_query($con, $update_pass);
    if ($run_query) {
        $_SESSION['message'] = " تم تحديث بياناتك";
        header("Location:../studentt/studentEditInfo.php");

    } else {
        $_SESSION['message'] = "لم تقم بتغيير إحدى الخانات  ";
        header("Location:../studentt/studentEditInfo.php");
    }
}

if(isset($_POST['inserttt'])){
    $ssn = mysqli_real_escape_string($con, $_POST['ssn']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$file = mysqli_real_escape_string($con, $_POST['pdf']);
    
$email_check = "SELECT * FROM student WHERE SEmail = '$email'";
$res = mysqli_query($con, $email_check);
if(mysqli_num_rows($res) > 0){
    $errors['email'] = "البريد الإلكتروني الذي أدخلته موجود بالفعل!";
}

$ssn_check = "SELECT * FROM student WHERE SSn = '$ssn'";
$res = mysqli_query($con, $ssn_check);
if(mysqli_num_rows($res) > 0){
    $errors['ssn'] = "رقم الهوية الذي أدخلته موجود بالفعل!";
}

$phone_check = "SELECT * FROM student WHERE SPhone = '$phone'";
$res = mysqli_query($con, $phone_check);
if(mysqli_num_rows($res) > 0){
    $errors['phone'] = " رقم الهاتف الذي أدخلته موجود بالفعل!";
}

    if (count($errors) === 0) {
        $pass = substr(md5(microtime()), rand(0, 26), 5);
        $code = rand(999999, 111111);
        $status = "not verified";
        $insert_data = "INSERT INTO `student`(`SSn`,`SName`,`SEmail`,`SPhone`,`Sfile`,`SPassword`,`a_ID`,`code`,`status`) VALUES
    ('$ssn','$name','$email','$phone','$file','$pass','1','$code','$status')";
        $data_check = mysqli_query($con, $insert_data);
        if ($data_check) {
            $subject = "Password Account ";
            $message = " youre password is  $pass  ";
            $sender = "from :hanan.almimoni@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = $email;
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $pass;
                header('location: .php');
                exit(0);
            } else {
                $errors['db-error'] = "خطأ اثناء اضافة البيانات إلى قاعدة البيانات";
            }
        }
    }
}