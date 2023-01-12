<?php
   include "../conn.php";
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/jobdetails.css"/>
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
  <table id="detailsTable">
    
<?php

$hid=$_GET['id'];



$sql = "SELECT * FROM `hr` WHERE `HrID` = $hid";
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowHrID = $row['HrID'];
  $rowhrName = $row['HrName'];
  $rowEmail = $row['HrEmail'];
  $rowpassword = $row['HrPassword'];
  $rowHrPhone = $row['HrPhone'];
 
}
}

echo '<tr>';
echo '<td>'.$rowhrName.'</td>';
echo '<th>'; 
echo 'الاسم';    
echo '</th>';
echo '</tr>';

echo '<tr>';
echo '<td>'.$rowEmail.'</td>'; 
echo '<th>';
echo 'البريد الالكتروني';     
echo '</th>';
echo '</tr>';

echo '<tr>';
echo '<td>'.$rowpassword.'</td>';  
echo '<th>';
echo 'كلمة السر'; 
echo '</th>';
echo '</tr>';
      
echo '<tr>';
echo '<td>'.$rowHrPhone.'</td>';   
echo '<th>';
echo 'رقم الهاتف';
echo '</th>';  
echo '</tr>';
      

echo '<form action="editHR.php?id='.$rowHrID.'" method="post">';
    echo '<input type="submit" name="edit" value="edit" />';
    ?>
</form>
</body>
</html>
