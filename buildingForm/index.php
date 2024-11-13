<?php
include 'conn.php';

session_start();

if (isset($_SESSION['buildingForm'])) {
    header('location: main.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password_txt'];
    $report_writer = $_POST['report_writer_txt'];

    
    $sql = "SELECT * FROM login_admin WHERE password = :password";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Execute the statement
        $stmt->execute();

        // Check the number of rows returned
        if ($stmt->rowCount() == 1) {
            // Fetch the row from the result set
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['buildingForm'] = $password;
            $_SESSION['report_writer'] = $report_writer;
            header('location: main.php');
            exit;
        }
    }
}


?>




<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> تسجيل الدخول</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Bootstrap RTL version if available -->
</head>
<body class="m-5">

<div class="d-flex justify-content-between">
    <img src="a.png" class="img-fluid" style="width: 112px; height: 112px;">
    

    <img src="qc.png" class="img-fluid" style="width: 112px; height: 112px;">
</div> 

<h6 class="text-center">قسم التراخيص</h6>
  <h5 class="text-center">تقرير معاينة مبنى</h5>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header text-right">تسجيل الدخول</h5>
                    <div class="card-body">
                        <form action="" method="post">
                            
                            <div class="form-group text-right">
                                <label for="inputPassword">كلمة المرور</label>
                                <input type="password" class="form-control" id="inputPassword" name="password_txt" placeholder="كلمة المرور">
                            </div>

                            <div class="form-group text-right">
                                <label for="inputPassword">معد التقرير</label>
                                <select class="form-control" name="report_writer_txt" required>
                                <option></option>
                                <option>حمد بن سالم المعمري</option>
  <option>احمد بن مبارك البلوشي</option>
  <option>عبدالله المعمري</option>
  <option>المهندس سالم الشيدي</option>
  <option>علي عبدالحسين العجمي</option>
  <option>ناصر سعيد ال عبدالسلام</option>
  <option>محمد ناصر الشبلي</option>
  <option>عبدالباقي يوسف الخوري</option>
  <option>محمد راشد القريني</option>
  <option>سعيد علي الريسي</option>
  <option>احمد العجمي</option>
  <option>هلال حمد المنصوري</option>
  <option>احمد الحوسني</option>
  <option>نايف المعمري</option>
  <option>عفراء سالم المعمري</option>
  <option>المهندس أمجد الكندي</option>
  <option>المهندس أحمد الخروصي</option>
  <option>المهندس عمار عيسى</option>
  <option>المهندس صالح حسين صالح علي</option>
  <option>صالح سليم البادي</option>
  <option>ياسر أحمد يوسف رابح</option>
  <option>زيانة الإسماعيلية</option>

                            </select>
                            </div>
                           
                            <button type="submit" class="btn btn-primary mt-2 ">دخول</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
