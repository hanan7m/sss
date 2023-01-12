<?php
 include "..\conn.php";
session_start();
echo '<div class="welcomMsg"> ';
echo '<p>'.$_SESSION['hrname'].'  '.'مرحبا  </p>';

$hrID=$_SESSION['HrID'];


$sql1 = "SELECT * FROM `works_on` WHERE `hr_id`='$hrID'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  while ($row= $result1->fetch_assoc()) {
      $rowID = $row['c_id'];

      $sql = "SELECT * FROM `company` WHERE `CID`='$rowID'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      while ($row= $result->fetch_assoc()) {
          $rowcompanyname = $row['CName'];
          echo'<table>';
          echo'<tr>';
          echo'<td>';
          echo  $rowcompanyname;
          echo'</td>';
          echo'</tr>';
        }//end while
        echo'</table>';
        }//end if

      }//end while
}


echo '</div>';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/hrIndex.css"/>
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
    
<div id="cont">
<a href="add_jobs.php"><button id="button1">إضافة</button></a>
<table id="viewTable">
<th>
    المسمى الوظيفي
</th>
<th>
    بداية التقديم
</th>
<th>
     نهاية التقديم
</th>
<th>    
</th>
<?php
$sql1 = "SELECT * FROM `job` WHERE `id_c`='$rowID'";
$result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
    while ($row= $result1->fetch_assoc()) {
      $id_job = $row['id_job'];
      $jobName = $row['jobName'];
      $S_Date = $row['S_Date'];
      $E_Date = $row['E_Date'];
      $id_c  = $row['id_c'];

      echo '<tr>';
        echo '<td>'.$jobName.'</td>';
        echo '<td>'.$S_Date.'</td>';
        echo '<td>'.$E_Date.'</td>';
        echo '<td>';     
        echo '<form action="#" method="post">';
        echo '<input type="submit" value="delete" name="delete" />';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo' <form action="#" method="post">';
        echo '<input type="submit" value="view Details" name="viewDetails" />';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="#" method="post">';
        echo '<input type="submit" value="edit" name="edit" />';
        echo '</form>';
        echo '</td>';
        echo '</tr>';

    }
}
    ?>
</table>    
</div>
</body>
</html>