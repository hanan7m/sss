<?php
require "conn.php";
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

  <form id="addform" action="#" method="POST">

  <div class="inputName">
  <input  type="text"  id="name" name="name"  required >
  <label id="l1">الاسم</label>
  </div>
  <div id="errorjobName"></div>
  <br>
  <div class="inputName">
  <input  type="text"  id="email" name="email"  required >
  <label id="l1">البريدالإلكتروني</label>
  </div>
  <div id="errorjobName"></div>
  <br>
  <div class="inputName">
  <input  type="text"  id="pwd" name="pwd"  required >
  <label id="l1">كلمة السر</label>
  </div>
  <div id="errorjobName"></div>
  <br>
  <div class="inputName">
  <input  type="text"  id="phone" name="phone"  required >
  <label id="l1">رقم الجوال</label>
  </div>
  <div id="errorjobName"></div>
  <br>

  <input type="submit"  id="submit" name="submit" value="إضافة">
  </form>
</div>
</div>
</body>
</html>
