<?php require  "../controllerUserData.php";
 require "../sission.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title><?php echo $fetch_s['SName'] ?> | الصفحة الرئيسية </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: darkblue;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: white;
        font-size: 30px!important;
        font-weight: 500;
    }
    .button {
  background-color: #4CAF50;
  height: 50px;
  width: 200px;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}



.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid lightblue;
}

.button2:hover {
  background-color: lightblue;
  color: white;
}
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        direction: rtl;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        color: aliceblue;
        font-weight: 600;
    }
body{
    text-align: center;
}

input {
text-align: center;

}   
nav{
padding-left: 100px!important;
padding-right: 100px!important;
background: darkblue;
font-family: 'Poppins', sans-serif;

} 
nav a.navbar-brand{
color: white;
font-size: 30px!important;
font-weight: 500;
}
h1{
position: absolute;
top: 50%;
left: 50%;
width: 100%;
direction: rtl;
text-align: center;
transform: translate(-50%, -50%);
font-size: 50px;
color: aliceblue;
font-weight: 600;
}
aside {
 width: 20%;
 height: 640px;
  padding-left: 15px;
  padding-top: 110px;
  margin-left: 15px;
  float: right;
  font-style: italic;
  background-color:darkblue;
}

    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand"><img src="../img/logo.png" height="100" width="100"><br> منصة التأهيل الوظيفي
</a><br>
<a class="navbar-brand">  مرحبا  <?php echo $fetch_s['SName'];
$sid = $fetch_s['s_id'];?> </a>
    <br><button type="button" class="btn btn-light" onclick="location.href='../index.php'">تسجيل خروج</button>
     </nav>
<aside>
    <ul><button name="h11" class='button button2' type="button" onclick="location.href='../studentt/studentEditInfo.php'"><a>بياناتي الشخصية</a></button></ul> 
    <ul> <button  class='button button2' type="button" onclick="location.href='../studentt/studentViewJob.php'"><a>الوظائف</a></button></ul>
    <ul> <button  class='button button2' type="button" onclick="location.href=''"><a>الدورات</a></button></ul>
    <ul> <button  class='button button2' type="button" onclick="location.href=''"><a>التدريب التعاوني</a></button></ul>
    </aside>
    <section>
<div class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>عرض الوظائف التي تم التقدم عليها
                    
                </h4>
            </div>
            <div class="card-body">
                <?php
        
                    $student_id = mysqli_real_escape_string($con,$sid);
$query="SELECT jobName, S_Date,E_Date, status
FROM job j
INNER JOIN student_apply_job C ON C.id_j  = j.id_job
where  c.id_s='$sid'";
?>
</body>
    </html>
    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>عنوان الوظيفه</th>
                                    <th>بداية تاريخ الوظيفة</th>
									<th>نهاية تاريخ الوظيفة</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 
                                    $query_run = mysqli_query($con, $query);

                                    if($query_run)
                                    {
                                        foreach($query_run as $s_job)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $s_job['jobName']; ?></td>
                                                <td><?= $s_job['S_Date']; ?></td>
                                                <td><?= $s_job['E_Date']; ?></td>
                                                <td ><?= $s_job['status']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                echo "<tr>No Such Id Found</tr>";
                                    
                              } ?>
                                
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
    
    </section>
    


    </body>
</html>

