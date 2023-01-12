
<?php 
require_once "../controllerUserData.php";
require_once "../sission.php";
require_once "../connection.php";

$output = '';
include('../message.php');

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM student 
  WHERE 	SName LIKE '%".$search."%'
  OR SSn LIKE '%".$search."%' 
  OR SEmail LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM student ORDER BY s_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>#</th>
     <th>رقم الهوية</th>
     <th>اسم الطالبة</th>
     <th>البريد الالكتروني </th>
     <th> </th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   $s_id= $row['s_id'];
   $ssn = $row['SSn'];
   $sname = $row['SName'];
   $semail = $row['SEmail'];
   $output .= '
   <tr>
    <td>'.$s_id.'</td>
    <td>'. $ssn.'</td>
    <td>'. $sname.'</td>
    <td>'. $semail .'</td>
    <td><div><form  action="../studentt/code.php" method="post">
    <a href="../student/studentDetiles.php?s_id='.$s_id.'">عرض</a>
    <a href="../student/studentEdit.php?s_id='.$s_id.'">تعديل</a>
   <button type="submit" name="delete_student" value="$s_id" onclick="myFunction()";>حذف</button>
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
<script>
function myFunction() {
  confirm("متأكدة من حذف الطالبة؟");
}
</script>

