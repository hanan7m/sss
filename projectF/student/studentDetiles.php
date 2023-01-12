<?php
require '../connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>عرض بيانات الطالبة </title>
</head>
<body>
<section>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>عرض تفاصيل الطالبة
                            <a href="../student/student.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div dir="rtl" class="card-body">

                        <?php
                        if(isset($_GET['s_id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['s_id']);
                            $query = "SELECT * FROM student WHERE s_id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <input type="hidden" value="<?=$sid=$student['s_id'];?>">
                                 <div class="mb-3">
                                        <label> رقم الهوية</label>
                                        <p class="form-control">
                                           <?=$student['SSn'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> اسم الطالبة</label>
                                        <p class="form-control">
                                            <?=$student['SName'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> البريد الإلكتروني</label>
                                        <p class="form-control">
                                            <?=$student['SEmail'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> رقم الهاتف</label>
                                        <p class="form-control">
                                            0<?=$student['SPhone'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> السيرة الذاتية </label>
                                        <p class="form-control">
                                            
                                            <a type="application/pdf" target="_blank" href="uploads/<?php echo $student['Sfile'] ; ?>" height=300px width=300px><?php echo $student['Sfile'] ; ?></a></p>

                                    </div>

                                    <div class="mb-3">
                                        <label> حالة الوظيفة</label>
                                        <p class="form-control">
                                            <?=$student['status'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>لا توجد بيانات </h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div dir="rtl" class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> الوظائف المُقدم عليها  
                </h4>
            </div>
            <div class="card-body">
                <?php
$query="SELECT jobName, S_Date,E_Date, status
FROM job j
INNER JOIN student_apply_job C ON C.id_j = j.id_job
where  c.id_s='$sid'";
?>
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
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $s_job)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $s_job['jobName']; ?></td>
                                                <td><?= $s_job['S_Date']; ?></td>
                                                <td><?= $s_job['E_Date']; ?></td>
                                                <td><?= $s_job['status']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {  
                                      
                                        ?>
                             <!-- <tbody>  <h5>لاتوجد وظائف تم التقديم عليها</h5></tbody> -->
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <?php
                                   
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
    </section>
</body>
</html>