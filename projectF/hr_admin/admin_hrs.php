
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/hrview.css" />
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
      <th>
      Hr Email
      </th>
      <th>
      
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
    
    echo '<tr>';
     echo '<td>'.$rowcompanyname.'</td>';
    }//end while
    }//end if


  ///////////////////////////////////////////////////////////////
    
 $sql2 = "SELECT * FROM `hr` where `HrID`= $row_hr_ID ";
           $result2 = $conn->query($sql2);

           if ($result2->num_rows > 0) {
           while ($row= $result2->fetch_assoc()) {
            
            $row_HrName= $row['HrName'];
            $row_HrEmail= $row['HrEmail'];
            $row_HrPassword= $row['HrPassword'];
            $row_HrPhone= $row['HrPhone'];

            echo '<td>'.$row_HrName.'</td>'; 
            echo '<td>'.$row_HrEmail.'</td>'; 
        
            echo '<td>';   
            echo '<div id="actions">';  
            echo '<form id="f" action="#" method="post">';
            echo '<input type="submit" value="delete" name="delete" />';
            echo '</form>';
      
            echo' <form  id="f" action="#" method="post">';
            echo '<input type="submit" value="view Details" name="viewDetails" />';
            echo '</form>';

            echo '<form id="f" action="#" method="post">';
            echo '<input type="submit" value="edit" name="edit" />';
            echo '</form>';
            echo '</div>';
            echo '</td>';
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

            $sql = "DELETE  FROM `hr` WHERE `HrID`= $row_hr_ID ";
             mysqli_query($conn, $sql);
  
             $sql1 = "DELETE  FROM `works_on` WHERE hr_id= $row_hr_ID ";
             
            if(mysqli_query($conn, $sql1)){
              header("location: ./admin_hrs.php");
           } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
           }
  
           // Close connection
           mysqli_close($conn);
            }

            if(isset($_POST['viewDetails'])){
              header("location: ./hrdetailspage.php?id=".$row_hr_ID."");
          }

          if(isset($_POST['edit'])){
            header("location: ./edithrs.php?id=".$row_hr_ID."");
        }
    
          
?>

</body>
</html>
