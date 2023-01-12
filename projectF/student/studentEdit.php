<?php
require '../connection.php';
require '../studentt/code.php';
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>تعديل بيانات الطالبة </title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('../message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> تعديل بيانات الطالبة 
                            <a href="../student/student.php" class="btn btn-danger float-end">خلف</a>
                        </h4>
                    </div>
                    <div class="card-body">
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
                                <form action="../student/studentEdit.php" method="POST">
                        <input type="hidden" name="s_id" value="<?=$student['s_id'];?>"
>
                                <div class="mb-3">
                                <label> رقم الهوية</label>
                                    <input type="text" name="ssn" value="<?=$student['SSn'];?>"  class="form-control">

                                </div>
                                    <div class="mb-3">
                                        <label> اسم الطالبة</label>
                                        <input type="text" name="name" value="<?=$student['SName'];?>"  class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label> البريد الإلكتروني</label>
                                        <input type="email" name="email" value="<?=$student['SEmail'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ادخلي البريد الإلكتروني بشكل صحيح"  
                                        class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label> رقم الهاتف</label>
                                        <input type="text" name="phone" value="0<?=$student['SPhone'];?>" pattern="[0]{1}[5]{1}[0|4|6|7|9|8|5]{1}[0-9]{7}" title="ادخال رقم الهاتف 05-00000000"  class="form-control">
                                    </div>
     
                                    
                                    <div class="mb-3">
                                        <input type="submit" value="تحديث" name="update_student" class="btn btn-primary">


                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
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