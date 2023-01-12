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

$idjob=$_GET['id'];
$companyName=$_GET['id2'];
$city=$_GET['id3'];

$sql = "SELECT * FROM `job` WHERE `id_job` = $idjob";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $jobName = $row['jobName'];
  $qualification = $row['qualification'];
  $experience = $row['experience'];
  $S_Date = $row['S_Date'];
  $E_Date = $row['E_Date'];
}
}
?> 
  <table id="detailsTable">
      <tr>
      <th>
       job name
      </th>
      <?php  echo '<td>'.$jobName.'</td>'; ?>
      </tr>

      <tr>
      <th>
       Company name
      </th> 
      <?php echo '<td>'.$companyName.'</td>';  ?>
      </tr>
     
     <tr>
     <th>
     city
     </th> 
    <?php  echo '<td>'.$city.'</td>'; ?>
     </tr> 
      
     <tr>
      <th>
      qualification
      </th>
      <?php  echo '<td>'.$qualification.'</td>'; ?>
      </tr>
      
      <tr>
      <th>
      experience
      </th>
      <?php   echo '<td>'.$experience.'</td>'; ?>
      </tr>
      
      <tr>
      <th>
      S_Date
      </th>
      <?php   echo '<td>'.$S_Date.'</td>'; ?>
      </tr>

      <tr>
      <th>
      E_Date
      </th> 
      <?php  echo '<td>'.$E_Date.'</td>'; ?>
      </tr>

</body>
</html>



