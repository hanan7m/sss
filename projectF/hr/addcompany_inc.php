<?php
    include "..\conn.php";
    session_start();
    
    $_SESSION['HrID'];

    if(isset($_POST['submit'])){

       $name = $_POST['company_name'];
       $city = $_POST['city'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];


       $sql = "INSERT INTO `company`(CName,CCity,CEmail,CPhone,a_ID)
       VALUES ('$name','$city','$email','$phone',1);";
       if (mysqli_query($conn, $sql)) {
             echo "New record created successfully";

       } else {

             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }


       $sql = "SELECT * FROM `company` WHERE `CEmail`='$email'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while ($row= $result->fetch_assoc()) {
         $rowID = $row['CID'];
         }//end while
         }//end if

         $hrId =$_SESSION['HrID'];

       $sql = "INSERT INTO `works_on`(c_id,hr_id)
       VALUES ('$rowID','$hrId')";
       
       
       if (mysqli_query($conn, $sql)) {
             echo "New record created successfully";
             header("location: ./add_company.php");
       } else {

             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }

       mysqli_close($conn);
     }


     


?>
