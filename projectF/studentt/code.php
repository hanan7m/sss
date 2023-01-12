<?php
require '../connection.php';
require '../message.php';


if (isset($_POST['apply'])) {
    $SID = mysqli_real_escape_string($con, $_POST['sid']);
    $jobID = mysqli_real_escape_string($con, $_POST['jid']);
    $jobName = mysqli_real_escape_string($con, $_POST['jname']);
    $email = mysqli_real_escape_string($con, $_POST['Semail']);

    $sql = "INSERT INTO `student_apply_job`(`id_s`, `id_j`, `status`) VALUES ('$SID','$jobID','بالإنتظار')";
    $res = mysqli_query($con, $sql);
        if (($res)) {
            $_SESSION['message'] = " $jobName تم التقديم في الوظيفة ";
            $subject = " job apply ";
            $message = "you have been apply at $jobName ";
            $sender = "from :hanan.almimoni@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = $email;
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header("Location:../studentt/studentViewJob.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "سبق وان تم التقديم";
            header("Location:../studentt/studentViewJob.php");
            exit(0);
        }
    }
 

    
//delete student
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
    $query = "DELETE FROM `student` WHERE  s_id='$student_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "تم حذف الطالبة";
        header("Location: ../student/student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "لم يتم الحذف";
        header("Location: ../student/student.php");
        exit(0);
    }
}

//edit info of student
if(isset($_POST['update_student']))
{
   $student_id = mysqli_real_escape_string($con, $_POST['s_id']);
    $ssn = mysqli_real_escape_string($con, $_POST['ssn']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
  
    $query = "UPDATE `student` SET
    `SName`='$name',`SEmail`='$email',`SPhone`='$phone'
    WHERE s_id='$student_id'";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo "Student  Updated";
        header("Location:../student/student.php");
        exit(0);
    }
    else
    {$_SESSION['message'] = "Student Not Updated";
        header("Location:../student/student.php");
        exit(0);}}

    
//insert new student
if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['SName']);
    $email = mysqli_real_escape_string($con, $_POST['SEmail']);
    $phone = mysqli_real_escape_string($con, $_POST['SPhone']);
    $resume = mysqli_real_escape_string($con, $_POST['Sfile']);

    $query = "INSERT INTO students (SName,SEmail,SPhone,Sfile) VALUES ('$name','$email','$phone','$resume')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../student/student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: ../student/student-create.php");
        exit(0);
    }
}


if(isset($_POST['search']))
{
   $student_id = mysqli_real_escape_string($con, $_POST['s_id']);
    $ssn = mysqli_real_escape_string($con, $_POST['ssn']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
  
    $query = "UPDATE `student` SET
    `SName`='$name',`SEmail`='$email',`SPhone`='$phone'
    WHERE s_id='$student_id'";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo "Student  Updated";
        header("Location:../student/student.php");
        exit(0);
    }
    else
    {$_SESSION['message'] = "Student Not Updated";
        header("Location:../student/student.php");
        exit(0);}}

?>


