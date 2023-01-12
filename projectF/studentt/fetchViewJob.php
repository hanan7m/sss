<?php
require  "../controllerUserData.php";
require "../connection.php";
require "../sission.php"; ?>

<html>

<head>
<nav class="navbar">
    <a class="navbar-brand"><img src="haa.png"><br> منصة التأهيل الوظيفي
</a><br>
<a class="navbar-brand">  مرحبا  <?php echo $fetch_s['SName'];?> </a>
    <br><button type="button" class="btn btn-light" onclick="location.href='../index.php'">تسجيل خروج</button>
     </nav>


</head>



</html>

<?php 
include('../message.php');


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM job 
  WHERE 	jobName LIKE '%".$search."%'
  OR qualification LIKE '%".$search."%' 
  OR experience LIKE '%".$search."%' 
  OR S_Date LIKE '%".$search."%' 
  OR E_Date LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM job ORDER BY id_job 
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>عنوان الوظيفة</th>
     <th>المؤهل</th>
     <th>الخبرة</th>
     <th>بداية العقد </th>
     <th>نهاية العقد</th>
     <th> </th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   $id_com = $row['id_c'];
   $id_job = $row['id_job'];
   $jobName = $row['jobName'];
   $qualification = $row['qualification'];
   $experience = $row['experience'];
   $S_Date = $row['S_Date'];
   $E_Date = $row['E_Date'];
   $output .= '
   <tr>
    <td>'.$jobName.'</td>
    <td>'. $qualification.'</td>
    <td>'. $experience.'</td>
    <td>'. $S_Date .'</td>
    <td>'. $E_Date.'</td>
    <td><div>  <form  action="../studentt/code.php" method="post">
    <a href="../studentt/companyDetails.php?id_c='.$id_com.'">التفاصيل</a>
    <input name="jid" type="hidden" value='.$id_job.'>
   <input name="jname" type="hidden" value='.$jobName.'>
   <input name="sid" type="hidden" value='.$fetch_s['s_id'].'>
   <input name="Semail" type="hidden" value='.$fetch_s['SEmail'].'>
   <input type="submit" value="التقديم"  name="apply">
    </form>
    </td></div></tr>';

 }
 echo $output;
}
else
{
 echo 'لاتوجد وظائف';
}

?>