<?php require_once "../controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
</head>

<body >
<div class="container mt-5">

<?php include('../message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>اضافة طالبة
                    <a href="../student/student.php"  class="btn btn-danger float-end">بالخلف</a>
                </h4>
            </div>
            <div class="card-body">

        
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                     <div class="mb-3">
                     <form  action="student-create.php" method="POST" text-align="right">
                    <label>رقم الهوية </label>
                        <input class="form-control" type="text"  name="ssn" required    pattern="[0-9]{10}" title="ادخل رقم الهوية الذي يحتوي على 10 ارقام بشكل صحيح">
                        </div>

                    <div class="mb-3">
                    <label>اسم الطالبة</label>
                        <input class="form-control" type="text" name="name" required >
                    </div>

                    <div class="mb-3">
                    <label>رقم الهاتف </label>
                        <input class="form-control" type="phone"  inputmode="numeric" name="phone" required  pattern="[0]{1}[5]{1}[0|4|6|7|9|8|5]{1}[0-9]{7}" title="ادخال رقم الهاتف 05-00000000" >
                    </div>

                    <div class="mb-3">
                    <label>البريد الإلكتروني</label>
                        <input class="form-control" type="email" inputmode="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ادخلي البريد الإلكتروني بشكل صحيح" >
                    </div>
                
                 

                    <div class="mb-3">
                        <input class="form-control button" type="submit" name="insert-student" value="اضافة الطالبة ">
                    </div> </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
