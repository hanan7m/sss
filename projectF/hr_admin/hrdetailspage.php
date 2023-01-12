<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/jobdetails.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<?php
include "../conn.php";

$hid=$_GET['id'];

$sql = "SELECT * FROM `hr` where `HrID`= $hid "; 
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
    $row_HrName= $row['HrName'];
    $row_HrEmail= $row['HrEmail'];
    $row_HrPassword= $row['HrPassword'];
    $row_HrPhone= $row['HrPhone'];
}
}
?> 
  <table id="detailsTable">
      <tr>
      <th>
       name
      </th>
      <?php  echo '<td>'.$row_HrName.'</td>'; ?>
      </tr>

      <tr>
      <th>
      email
      </th> 
      <?php echo '<td>'.$row_HrEmail.'</td>';  ?>
      </tr>
     
     <tr>
     <th>
     password
     </th> 
    <?php  echo '<td>'.$row_HrPassword.'</td>'; ?>
     </tr> 
      
     <tr>
      <th>
      phone
      </th>
      <?php  echo '<td>'.$row_HrPhone.'</td>'; ?>
      </tr>
      
      

</body>
</html>



