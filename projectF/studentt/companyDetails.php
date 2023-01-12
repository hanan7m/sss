<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/projectF/css/adminstudent.css" />   
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<?php
include "../connection.php";

$id_com=$_GET['id_c'];

$sql = "SELECT * FROM `company` WHERE `CID` = $id_com ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rowcompanyname = $row['CName'];
    $rowcompanycity = $row['CCity'];
  }
}
?> 
  <table id="detailsTable">
      <tr>
      <th>
       company name
      </th>
      <?php  echo '<td>'.$rowcompanyname.'</td>'; ?>
      </tr>

      <tr>
      <th>
       Company city
      </th> 
      <?php echo '<td>'.$rowcompanycity.'</td>';  ?>
      </tr>
</body>
</html>



