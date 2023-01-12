<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/vCompany.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
  <table id="viewTable">
    <tr>
      <th>
        company name
      </th>
      <th>
        HR name
      </th>
      <th style="width:40%;">
        
      </th>
     
</tr>

<?php
include "../conn.php";

$sql1 = "SELECT * FROM `works_on`";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
      while ($row= $result1->fetch_assoc()) {
        $row_c_ID = $row['c_id'];
        $row_hr_ID = $row['hr_id'];
 
///////////////////////////////////////////////////////////////
 
 
  $sql = "SELECT * FROM `company` WHERE `CID` = $row_c_ID ";
    
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  while ($row= $result->fetch_assoc()) {
    $rowID = $row['CID'];
    $rowcompanyname = $row['CName'];
    
    echo '<tr>';///first tr
     echo '<td>'.$rowcompanyname.'</td>';
    }//end while
    }//end if


  ///////////////////////////////////////////////////////////////
    
 $sql2 = "SELECT * FROM `hr` where `HrID`= $row_hr_ID ";
           $result2 = $conn->query($sql2);

           if ($result2->num_rows > 0) {
           while ($row= $result2->fetch_assoc()) {
            
            $row_HrName= $row['HrName'];
            echo '<td>'.$row_HrName.'</td>'; 
            echo'<td>';
            echo '<div id="actions">';
            echo '<form  action="#" method="post">';
            echo '<input type="submit" value="delete" name="delete" />';
            echo '</form>';
           
            echo' <form  action="#" method="post">';
            echo '<input type="submit" value="view Details" name="viewDetails" />';
            echo '</form>';
            
            echo '<form  action="#" method="post">';
            echo '<input type="submit" value="edit" name="edit" />';
            echo '</form>';
            echo '</div>';
            echo'</td>';
            echo '</tr>';
               }
           
          }//end if for company data check
          else {
                 $row_HrName="";
                 $rowcompanyname="";
         }
           }//end if WORKED ON 
           }//end whileFOR WORKED ON 

///////////////////////////////////////////////////////////////

           if(isset($_POST['delete'])){

            $sql = "DELETE  FROM `company` WHERE `CID`= $rowID";
             mysqli_query($conn, $sql);
  
             $sql1 = "DELETE  FROM `works_on` WHERE `c_id`= $rowID";
             
            if(mysqli_query($conn, $sql1)){
              header("location: ./ViewCompany.php");
           } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
           }
  
           // Close connection
           mysqli_close($conn);
            }

            if(isset($_POST['viewDetails'])){
              header("location: ./CompanyDetails.php?id=".$rowID."&id2=".$row_HrName."");
          }

          if(isset($_POST['edit'])){
            header("location: ./editCompanypage.php?id=".$rowID."");
        }
           
?>
</table>
<!--<a href="addCompany.php"><button id="button1">Add Company</button></a>-->
</body>
</html>
