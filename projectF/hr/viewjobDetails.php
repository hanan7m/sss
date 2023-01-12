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

$jid=$_GET['id'];

echo $jid;

$sql = "SELECT * FROM `job` WHERE `id_job` = $jid";
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowjobName = $row['jobName'];
  $rowqualification = $row['qualification'];
  $rowexperience = $row['experience'];
  $rowS_Date = $row['S_Date'];
  $E_Date = $row['E_Date'];
}
}

echo '<tr>';
echo '<td>'.$rowjobName.'</td>';
echo '<th>'; 
echo 'المسمى الوظيفي';    
echo '</th>';
echo '</tr>';

echo '<tr>';
echo '<td>'.$rowqualification.'</td>'; 
echo '<th>';
echo 'المؤهل';     
echo '</th>';
echo '</tr>';

echo '<tr>';
echo '<td>'.$rowexperience.'</td>';  
echo '<th>';
echo 'الخبرات'; 
echo '</th>';
echo '</tr>';
      
echo '<tr>';
echo '<td>'.$rowS_Date.'</td>';   
echo '<th>';
echo 'بداية التقديم';
echo '</th>';  
echo '</tr>';
      
echo '<tr>';
echo '<td>'.$E_Date.'</td>';
echo '<th>';
echo 'نهاية التقديم';
echo '</th>';  
echo '</tr>';
    
?>
</body>
</html>
