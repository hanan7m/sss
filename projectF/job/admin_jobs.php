<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/admin_addjobs.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>

  <table id="viewTable">
    <tr>
      <th>
المسمى الوظيفي     
 </th>
      <th>
      company Name
      </th>
      <th>
     start Date
      </th>
      <th>
      end Date
      </th>
      <th>
     
      </th>
  
</tr>
<?php
include "../conn.php";
////////////////////////////////////////////
$sql1 = "SELECT * FROM `job`";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
      while ($row= $result1->fetch_assoc()) {
        $id_job = $row['id_job'];
        $jobName = $row['jobName'];
        $S_Date = $row['S_Date'];
        $E_Date = $row['E_Date'];
        $id_c  = $row['id_c'];

        ////////////////////////////////////////////
$sql = "SELECT * FROM `company` WHERE `CID` = $id_c";
    
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  while ($row= $result->fetch_assoc()) {
    $rowcompanyname = $row['CName'];
    $rowcity = $row['CCity'];
  }
}
////////////////////////////////////////////
        echo '<tr>';
        echo '<td>'.$jobName.'</td>';
        echo '<td>'. $rowcompanyname.'</td>';
        echo '<td>'.$S_Date.'</td>';
        echo '<td>'.$E_Date.'</td>';
        echo '<td>'; 
        echo '<div id="actions">';     
        echo '<form action="#" method="post">';
        echo '<input type="submit" value="delete" name="delete" />';
        echo '</form>';
        echo' <form action="jobDetailsView.php?id='.$id_job.'&id2='.$rowcompanyname.'&id3='.$rowcity.'" method="post">';
        echo '<input type="submit" value="view Details" name="viewDetails" />';
        echo '</form>';
        echo '<form action="editjobs.php?id='.$id_job.'&id2='.$rowcompanyname.'&id3='.$rowcity.'" method="post">';
        echo '<input type="submit" value="edit" name="edit" />';
        echo '</form>';
        echo '</td>';
        echo '</div>';
        echo '</tr>';

    }//end while 
}///end if 
?>
</table>
<?php

if(isset($_POST['delete'])){

    $sql = "DELETE  FROM `job` WHERE `id_job`= $id_job";
     
    if(mysqli_query($conn, $sql)){
       echo "Records were deleted successfully.";
       header("location: ./admin_jobs.php");
   } else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   }

   // Close connection
   mysqli_close($conn);
    }


    if(isset($_POST['viewDetails'])){
        header("location: ./jobDetailsView.php?id=".$id_job."&id2=".$rowcompanyname."&id3=".$rowcity."");
    }

    if(isset($_POST['edit'])){
      header("location: ./editjobs.php?id=".$id_job."");
     
    }

?>

</body>
</html>
