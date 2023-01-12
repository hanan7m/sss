<?php
include "../conn.php";
$idhr=$_GET['id'];
echo $idhr;
$sql = "SELECT * FROM `hr` WHERE `HrID` = $idhr";
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowname = $row['HrName'];
  $rowHrEmail= $row['HrEmail'];
  $rowHrPassword = $row['HrPassword'];
  $rowHrPhone= $row['HrPhone'];
}
}
echo $rowname;
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/edit.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<div id="container1">
  <div id="container2">
  <H1 id="title1">تحرير</H1>
  <div id="error"></div>
 
  <form id="editform" action="#" method="POST">

  <div class="input-control">
  <input type="text"  id="Namehr" name="Namehr"  value="<?php echo $rowname; ?>" required >
  <label id="l1">الاسم</label>
  </div>
  <div id="errorjobName"></div>
  <br>
  <div class="input-control">
  <input  id="emailhr" name="emailhr" value="<?php echo $rowHrEmail; ?>" >
  <label id="l3">البريد الالكتروني </label>
  </div>
  <div id="errorexperience"></div>
   <br>
   <div class="input-control">
  <input  id="pwd" name="pwdhr" value="<?php echo  $rowHrPassword; ?>" >

  <label id="l3">كلمة المرور</label>
  </div>
  <div id="errorexperience"></div>
   <br>
  
   <div class="input-control">
  <input  id="phonehr" name="phonehr" value="<?php echo  $rowHrPhone; ?>" >

  <label id="l3">رقم التواصل</label>
  </div>
  <input type="submit"  id="submit" name="submit" value="edit">
  </form>
 
</body>
</html>
<?php

if(isset($_POST['submit'])){

  $Name = $_POST['Namehr'];
  $email = $_POST['emailhr'];
  $pwd = $_POST['pwdhr'];
  $phone = $_POST['phonehr'];
  
  $sql = "UPDATE `hr` SET
       `HrName` ='".$Name."',
       `HrEmail`='".$email."',
       `HrPassword`='".$pwd."',
       `HrPhone`='".$phone."'
        WHERE `hr`.`HrID` =$idhr";


  if (mysqli_query($conn, $sql)) {
    header("location: ./admin_hrs.php");

  } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 mysqli_close($conn);
}
?>