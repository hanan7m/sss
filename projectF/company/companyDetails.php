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

$cid=$_GET['id'];
$hr=$_GET['id2'];

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
     
     <tr>
     <th>
     company email
     </th> 
    <?php  echo '<td>'.$rowcompanyemail.'</td>'; ?>
     </tr> 
      
     <tr>
      <th>
      company phone
      </th>
      <?php  echo '<td>'.$rowcompanyphone.'</td>'; ?>
      </tr>
      
      
</body>
</html>



