<?php
include "../conn.php";
$idjob=$_GET['id'];
$sql = "SELECT * FROM `job` WHERE `id_job` = $idjob";
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row= $result->fetch_assoc()) {
  $rowjobname = $row['jobName'];
  $rowjobqualification = $row['qualification'];
  $rowjobexperience = $row['experience'];
  $rowS_Date = $row['S_Date'];
  $rowE_Date = $row['E_Date'];
}
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
  
<link rel="stylesheet" type="text/css" href="/eqc/css/editjobb.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<div id="container1">
  <div id="container2">
  <H1 id="title1">edit job</H1>
  <div id="error"></div>
 
  <form id="editform" action="#" method="POST">

  <div class="input-control">
  <input type="text"  id="jobName" name="jobName" placeholder="job name" value="<?php echo $rowjobname; ?>" required >
  <label id="l1">المسمى الوظيفي</label>
  </div>
  <div id="errorjobName"></div>
  <br>

  <div class="input-control">
  <select name="qualification" id="qualification"  required>
  <option value=""><?php echo $rowjobqualification; ?></option>
  <option value="Masters">Master's</option>
  <option value="Bachelor">Bachelor</option>
  <option value="Diploma">Diploma</option>
  </select>
  <label id="l2">المؤهل</label>
  </div>
  <br>

  <div class="input-control">
  <textarea  id="experience" name="experience" value="<?php echo $rowjobexperience; ?>" >
  </textarea>
  <label id="l3">الخبرات </label>
  </div>
  <div id="errorexperience"></div>
   <br>

  <div class="input-control">
  <input type="date"  id="sdate" name="sdate" placeholder="start date" value="<?php echo $rowS_Date; ?>" >
  </div>
  <br>
   <div id="errorsdate"></div>

   <div class="input-control">
   <input type="date"  id="edate" name="edate" placeholder="end date" value="<?php echo $rowE_Date; ?>" >
   </div>
   <br>
    <div id="erroredate"></div>

  <input type="submit"  id="submit" name="submit" value="edit">
  </form>

</body>
</html>
<?php

if(isset($_POST['submit'])){

$jobName = $_POST['jobName'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];

$sql = "UPDATE `job` SET
       `jobName` ='".$jobName."',
       `qualification`='".$qualification."',
       `experience`='".$experience."',
       `S_Date`='".$sdate."',
       `E_Date`='".$edate."'
        WHERE `job`.`id_job` =$idjob";

  if (mysqli_query($conn, $sql)) {
    header("location: ./admin_jobs.php");

  } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 mysqli_close($conn);
}
?>