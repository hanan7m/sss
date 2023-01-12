<?php
include "../conn.php";
$cid=$_GET['id'];
$sql = "SELECT * FROM `company` WHERE `CID` = $cid";
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowcompanyname = $row['CName'];
  $rowcompanycity = $row['CCity'];
  $rowcompanyemail = $row['CEmail'];
  $rowcompanyphone = $row['CPhone'];
}
}


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
  <input type="text"  id="CompanyName" name="CompanyName"  value="<?php echo $rowcompanyname; ?>" required >
  <label id="l1">اسم الشركة</label>
  </div>
  <div id="errorjobName"></div>
  <br>
  <div class="input-control">
  <select name="city" id="city" required>
  <option value=""><?php echo $rowcompanycity;?></option>
  <option value="Riyadh">Riyadh</option>
  <option value="Dammam">Dammam</option>
  <option value="Jeddah">Jeddah</option>
  <option value="Khobar">khobar</option>
  <option value="Jubail">Jubail</option>
  <option value="Alahsa">Alahsa</option>
  <option value="Qatif">Qatif</option>
  </select>
  <label id="l3"> المدينة</label>
  </div>
  <div id="errorexperience"></div>
   <br>
   <div class="input-control">
  <input  id="CompanyEmail" name="CompanyEmail" value="<?php echo  $rowcompanyemail; ?>" >

  <label id="l3">البريد الإلكتروني </label>
  </div>
  <div id="errorexperience"></div>
   <br>
  
   <div class="input-control">
  <input  id="CompanyPhone" name="CompanyPhone" value="<?php echo  $rowcompanyphone; ?>" >

  <label id="l3">رقم التواصل</label>
  </div>
  <input type="submit"  id="submit" name="submit" value="edit">
  </form>
 
</body>
</html>
<?php

if(isset($_POST['submit'])){

  $CompanyName = $_POST['CompanyName'];
  $city = $_POST['city'];
  $CompanyEmail = $_POST['CompanyEmail'];
  $CompanyPhone = $_POST['CompanyPhone'];
 
  $sql = "UPDATE `company` SET
       `CName` ='".$CompanyName."',
       `CCity`='".$city."',
       `CEmail`='".$CompanyEmail."',
       `CPhone`='".$CompanyPhone."'
        WHERE `company`.`CID` =$cid";

    if (mysqli_query($conn, $sql)) {
      header("location: ./ViewCompany.php");

  } else {

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>