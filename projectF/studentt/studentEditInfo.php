<?php
 require_once "../controllerUserData.php";
require_once  "../sission.php";
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title><?php echo $fetch_s['SName'];
    $nameid=$fetch_s['s_id'];?> | الصفحة الرئيسية </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body dir="rtl">
    <nav class="navbar">
    <a class="navbar-brand"><img src="haa.png"><br> منصة التأهيل الوظيفي
</a><br>
<a class="navbar-brand">  مرحبا  <?php echo $fetch_s['SName']?> </a>
    <br><button type="button" class="btn btn-light" onclick="location.href='../studentt/studentHome.php'">عودة</button>
     </nav>

    <div class="container mt-5">
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>تعديل البيانات
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php include('../message.php'); ?>
                        <?php
                    
                       
                            $query = "SELECT * FROM student WHERE s_id='$nameid' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form enctype="multipart/form-data" action="../studentt/studentEditInfo.php" method="POST">

                                    <input type="hidden" value="<?=$student['s_id'];?>" name="student_idd">
                                    <div class="mb-3">
                                        <strong>الاسم </strong>
                                        <input type="text" name="name" value="<?=$student['SName'];?>"  class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <strong>البريد الالكتروني </strong>
                                        <input type="email" name="email" value="<?=$student['SEmail'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ادخلي البريد الإلكتروني بشكل صحيح"  
                                        class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <strong>رقم الهاتف </strong>
                                        <input type="text" name="phone" value="0<?=$student['SPhone'];?>" pattern="[0]{1}[5]{1}[0|4|6|7|9|8|5]{1}[0-9]{7}" title="ادخال رقم الهاتف 05-00000000"  class="form-control">
                                    </div>
                                    <input type="submit" value="تحديث" name="update_studentt" class="btn btn-primary"> 

                                    <form enctype="multipart/form-data" action="../studentt/studentEditInfo.php" method="POST">
                                    <div class="mb-3">
                                  <br>
                                  <strong>السيرة الذاتية</strong> <br>
                                  <label> <?=$student['Sfile'];?> </strong><br><br>
                                  <input id="pdf" type="file" name="pdf" value="<?=$student['Sfile'];?>">
                                    <input type="submit" value="تحديث السيرة" name="savee" class="btn btn-primary">                                    </div>
                                    </div>
 
                                </form>
                        
                                    
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




 