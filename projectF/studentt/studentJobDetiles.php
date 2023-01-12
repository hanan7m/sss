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

    <title>job View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>عرض تفاصيل الوظيفة
                            <a href="../studentt/studentViewJob.php" class="btn btn-danger float-end">خلف</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_job']))
                        {
                            $job_id = mysqli_real_escape_string($con, $_GET['id_job']);
                            $query = "SELECT * FROM job WHERE id_job='$job_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $job = mysqli_fetch_array($query_run);
                                ?>
                           

                                    <div class="mb-3">
                                        <label> عنوان الوظيفة</label>
                                        <p class="form-control">
                                            <?=$job['jobName'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> المؤهلات</label>
                                        <p class="form-control">
                                            <?=$job['qualification'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label> الخبرات</label>
                                        <p class="form-control">
                                            <?=$job['experience'];?>
                                        </p>
                                    </div>


                                    <div class="mb-3">
                                        <label>  بداية العقد </label>
                                        <p class="form-control">
                                            <?=$job['S_Date'];?>
                                        </p>
                                    </div>


                                    <div class="mb-3">
                                        <label> نهاية العقد</label>
                                        <p class="form-control">
                                            <?=$job['E_Date'];?>
                                        </p>
                                    </div>
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