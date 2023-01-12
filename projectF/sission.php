<?php 

$email = $_SESSION['email'];
$password = $_SESSION['password'];

if ($email != false && $password != false) {
    $sql1 = "SELECT * FROM systemadmin WHERE AEmail = '$email'";
    $run_Sql1 = mysqli_query($con, $sql1);
    $fetch_info = mysqli_fetch_assoc($run_Sql1);

    $sql2 = "SELECT * FROM student WHERE SEmail = '$email'";
    $run_Sql2 = mysqli_query($con, $sql2);
    $fetch_s = mysqli_fetch_assoc($run_Sql2);

    $sql3 = "SELECT * FROM hr WHERE HrEmail = '$email'";
    $run_Sql3 = mysqli_query($con, $sql3);
    $fetch_r = mysqli_fetch_assoc($run_Sql3);
}
