<?php
require 'addcompany_inc.php';
?>
<!DOCTYPE html>
<html>
 <meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/addcompany.css"/>
<script defer src="include/‏‏validationCompany.js"></script>
</head>

<body>
  <div id="error"></div>
  <div id="container1">
  
  <div id="container2">
  <H1 id="title1">Add company</H1>
  <form id="addform" action="addCompany_inc.php" method="POST">

  <div class="input-control">
  <input type="text"  id="company_name" name="company_name" placeholder="Company Name" required >
  </div>
  <div id="errorcompany_name"></div>
  <br>

  <div class="input-control">
  <select name="city" id="city" required>
  <option value=""></option>
  <option value="Riyadh">Riyadh</option>
  <option value="Dammam">Dammam</option>
  <option value="Jeddah">Jeddah</option>
  <option value="Khobar">khobar</option>
  <option value="Jubail">Jubail</option>
  <option value="Alahsa">Alahsa</option>
  <option value="Qatif">Qatif</option>
  </select>
  </div>
  <br>

  <div class="input-control">
  <input type="email" id="email" name="email" placeholder="email" required>
  </div>
  <br>

  <div class="input-control">
  <input type="text"  id="phone" name="phone" placeholder="050-000-0000" required>
  </div>
  <br>
   <div id="errorphone"></div>
  <input type="submit"  id="submit" name="submit" value="add">
  </form>
</div>
</div>
</body>
</html>