<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/hrhome.css"/>
<script defer src="include/‏‏validationJobs.js"></script>

<?php
 include "..\conn.php";                                                             

session_start();
echo '<div class="welcomMsg"> ';
echo '<p>'.$_SESSION['hrname'].'  '.'مرحبا  </p>';
$hrID=$_SESSION['HrID'];


/////check if there is a company registerd////
$sql1 = "SELECT * FROM `works_on` WHERE `hr_id`= $hrID ";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row= $result1->fetch_assoc()) {
         $rowID = $row['c_id'];
    }


/////print company name////
    $sql = "SELECT * FROM `company` WHERE `CID`='$rowID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
        $rowcompanyname = $row['CName'];
        echo  $rowcompanyname;
        echo '</div>';
        echo '</head>';      
    }
    }

  echo'<body>';
  echo "<a href='hrDetails.php?id=".$hrID."'><button style='position: relative; left:30px;'>بياناتي</button></a>";
    /////print the jobs ////
  echo "<a href='add_jobs.php?id=".$rowID."'><button id='addbutton'>اضافة</button></a>";
  
   echo'<table id="viewTable">';  
   echo '<tr>';
   echo '<th>';
   echo 'المسمى الوظيفي';
   echo '</th>';
   echo '<th>';
   echo 'بداية التقديم';
   echo '</th>';
   echo '<th>';
   echo 'نهاية التقديم';
   echo '</th>';
   echo '<th>';   
   echo '</th>';
   
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
      echo '<div id="actions">';   
      echo '<form action="#" method="post">';
      echo '<input type="submit" value="delete" id="sub" name="delete" />';
      echo '</form>';
      echo' <form action="viewjobDetails.php?id='.$id_job.'" method="post">';
      echo '<input type="submit" value="view Details"  id="sub" name="viewDetails" />';
      echo '</form>';
      echo '<form action="editjob.php?id='.$id_job.'" method="post">';
      echo '<input type="submit" value="edit"  id="sub" name="edit" />';
      echo '</form>';
      echo '</td>';
      echo '</div>';
      echo '</tr>';

///////////////////////the submit form code////////////
if(isset($_POST['delete'])){
    $sql = "DELETE  FROM `job` WHERE `id_job`= $id_job";
     mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql)){
       echo "Records were deleted successfully.";
       header('location: hrHome.php');
   } else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   }
   // Close connection
   mysqli_close($conn);
    }

    if(isset($_POST['viewDetails'])){
        header("location: ./viewjobDetails.php?id=".$id_job."");
    }
    }
   }
   echo'</table>'; 
}else{
    echo 'لا يوجد بيانات الشركة';
    echo'<div id="addCompanyContainer">';
    echo "<a href='add_company.php'><button id='btn'>اضافة شركة</button></a>"; 
    echo'</div>';
}


?>
</body>
</html>