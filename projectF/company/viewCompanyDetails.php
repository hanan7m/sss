<?php
   include "../conn.php";
  
  ?> 
   <!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
  <table>
    <tr>
      <th>
        company name
      </th>
      <th>
       HR name
      </th>
      <th>
      Company City
      </th>
      <th>
      Company Email
      </th>
      <th>
      Company Phone
      </th>  
</tr>

<?php

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

            echo'<tr>';
            echo '<td>'.$rowcompanyname.'</td>';
            echo '<td>'.$hr.'</td>'; 
            echo '<td>'.$rowcompanycity.'</td>';
            echo '<td>'.$rowcompanyemail.'</td>';
            echo '<td>'.$rowcompanyphone.'</td>';
            echo '</tr>';
               
?>
</body>
</html>



