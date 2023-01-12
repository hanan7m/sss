<?php
include 'addjobs_inc.php';
$_SESSION['cid']=$_GET['id']; 

?>
<!DOCTYPE html>
<html>
 <meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/addJob.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>


<body>

  <div id="error"></div>
  <div id="container1">
  <div id="container2">
  <H1 id="title1">Add Job</H1>

  <form id="addform" action="addjobs_inc.php" method="POST">

  <div class="inputName">
  <input  type="text"  id="jobName" name="jobName" placeholder="job name" required >
  <label id="l1">المسمى الوظيفي</label>
  </div>
  <div id="errorjobName"></div>
  <br>

  <div  class="inputqualification">
  <select name="qualification" id="qualification" required>
  <option value=""></option>
  <option value="Master">Master's</option>
  <option value="Bachelor">Bachelor</option>
  <option value="Diploma">Diploma</option>
  </select>
  <label id="l2">المؤهل</label>
  </div>
  <br>

  <div class="input-control">
  <textarea  id="experience" name="experience" required>
  </textarea>
  <label id="l3">الخبرات </label>
  </div>
  <div id="errorexperience"></div>
   <br>

  <div class="input-control">
  <input type="date"  id="sdate" name="sdate" placeholder="start date" required>
  </div>
  <br>
   <div id="errorsdate"></div>

   <div class="input-control">
   <input type="date"  id="edate" name="edate" placeholder="end date" required>
   </div>
   <br>
    <div id="erroredate"></div>

  <input type="submit"  id="submit" name="submit" value="إضافة">
  </form>
</div>
</div>
</body>
</html>
