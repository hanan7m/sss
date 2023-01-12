<?php
//include 'addCompany_inc.php';
session_start();
echo $_SESSION['name'];
$_SESSION['Aid'];
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="css/systemadmin.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
  <div class="content">
<table>
  <tr>

       <td>
       <a href="job/admin_jobs.php">
        <img width="110" height="110" src="image/jobb.png" class="back" />
       </a>
       <label id="labeljob"> الوظائف </label>
       </td>
       
       <td>
       <a href="hr_admin/admin_hrs.php"> 
       <img width="110" height="110" src="image/hrr.png" class="front"  />
       </a>
       <label id="labelHR"> موارد بشرية </label>
       </td>
   
       <td>
       <a href="company/viewCompany.php"><img width="110" height="110" src="image/enterprise.png" />
       </a>
       <label id="labelCOMPANY"> الشركات </label>
       </td>

       <td>
       <a href="student/student.php"><img width="110" height="110" src="image/headhunting.png" />
       </a>
       <label id="labelSTUDENTS"> الطلاب </label>
       </td>

  </tr>
</table>
</div>
</body>
</html>
