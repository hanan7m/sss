<?php
include "../conn.php";
$idhr=$_GET['id'];

echo $idhr;

$sql = "SELECT * FROM `hr` WHERE `HrID` = $idhr";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowHrName = $row['HrName'];
  $rowHrEmail = $row['HrEmail'];
  $rowHrPassword = $row['HrPassword'];
  $rowHrPhone = $row['HrPhone'];
}
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/editJobs.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<div id="container1">
  <div id="container2">
  <H1 id="title1">تحرير</H1>
  <div id="error"></div>
 
  <form id="editform" action="#" method="POST">

  <div class="input-control">
  <input type="text"  id="Name" name="Name" placeholder="name" value="<?php echo  $rowHrName; ?>" required >
  <label id="l1">الاسم</label>
  </div>
  <div id="errorjobName"></div>
  <br>

  <div class="input-control">
  <input type="text"  id="HrEmail" name="HrEmail" placeholder="HrEmail" value="<?php echo $rowHrEmail; ?>" required >
  <label id="l1">البريد الالكتروني</label>
  </div>
  <br>
  <div class="input-control">
  <input type="text"  id="HrPassword" name="HrPassword" placeholder="HrPassword" value="<?php echo $rowHrPassword; ?>" required >
  <label id="l1"> كلمة السر</label>
  </div>
  <br>
  <div class="input-control">
  <input type="text"  id="HrPhone" name="HrPhone" placeholder="HrPhone" value="<?php echo $rowHrPhone; ?>" required >
  <label id="l1">رقم الجوال</label>
  </div>
  <br>
  
    <div id="erroredate"></div>

  <input type="submit"  id="submit" name="submit" value="edit">
  </form>

</body>
</html>
<?php

if(isset($_POST['submit'])){

$Name = $_POST['Name'];
$HrEmail = $_POST['HrEmail'];
$HrPassword = $_POST['HrPassword'];
$HrPhone = $_POST['HrPhone'];


$sql = "UPDATE `hr` SET
       `HrName` ='".$Name."',
       `HrEmail`='".$HrEmail."',
       `HrPassword`='".$HrPassword."',
       `HrPhone`='".$HrPhone."'
        WHERE `hr`.`HrID` =$idhr";

  if (mysqli_query($conn, $sql)) {
    header("location: ./hrHome.php");

  } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 mysqli_close($conn);
}
?>