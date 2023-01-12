<?php
include "../conn.php";
$cid=$_GET['id'];
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


?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/eqc/css/editcompany.css" />
<script defer src="include/‏‏validationJobs.js"></script>
</head>
<body>
<H1>edit company</H1>
  <div id="error"></div>
  <form id="form" id="editform" action="editCompany_inc.php" method="POST">

  <div class="input-control">
  <input type="text"  id="company_name" name="company_name"  value="<?php echo $rowcompanyname; ?>" placeholder="Company Name" required >
  </div>
  <div id="errorcompany_name"></div>
  <br>

  <div class="input-control">
  <select name="city" id="city" required>
  <option value=""><?php echo $rowcompanycity;?></option>
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
  <input type="email" id="email" name="email" value="<?php echo $rowcompanyemail;?>" placeholder="email" required>
  </div>
  <br>

  <div class="input-control">
  <input type="text"  id="phone" name="phone" value="<?php echo $rowcompanyphone;?>" placeholder="050-000-0000" required>
  </div>
  <br>
   <div id="errorphone"></div>
  <input type="submit"  id="submit" name="edit1" value="edit">
  </form>
</body>
</html>
