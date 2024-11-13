<?php

include 'conn.php';
session_start();

if (isset($_SESSION['schoolPrivate'])) {
  header('location: main.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $password = $_POST['password'];
  // $user = $_POST['user'];
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

          $_SESSION['schoolPrivate'] = $password;
          $_SESSION['report_writer'] = $report_writer;
          header('location: main.php');
          exit;
      }
  }
}


?>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!DOCTYPE html>
    <title>تسجيل الدخول</title>

    
</body>
</html>
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
         <form action="" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3"> دائرة المدارس الخاصة
              </p>
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-linkedin-in"></i>
              </button>
            </div>
  
         
  
            <!-- Email input -->
            <!-- <div class="form-outline mb-4 my-4">
              <input type="user" id="form3Example3" name="user" class="form-control form-control-lg"
                placeholder="ضع أسم المستخدم" />
              <label class="form-label" for="form3Example3">إسم المستخدم</label>
            </div> -->
  
            <!-- Password input -->
            <div class="form-outline mb-3 mb-4 my-4">
              <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                placeholder="ضع الرمز السري" />
              <label class="form-label" for="form3Example4">الرمز السري</label>
            </div>


            <div class="form-outline mb-3 mb-4 my-4">
            <select   class="form-control form-control-lg" name="report_writer_txt" required>
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
  <option>نوف البلوشية</option>
  <option>رخية الجابرية</option>
  <option>نجاة البلوشية</option>
  <option>جود السعيدية</option>


                            </select>                
              <label class="form-label" for="form3Example4">دخول بواسطة</label>
            </div>


  
       
            <div class="text-center text-lg mt-4 pt-2">
              <button type="submit" name="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">دخول</button>
            </div>
  
          </form>
        </div>

        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0" id="copyright">
 جميع الحقوق محفوظة لدائرة تقنية المعلومات  <span id="year"></span> 
</div>
      <!-- Copyright -->
  
      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>
</head>
<body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    

    <script>
      // auto print year 
$(document).ready(function(){
  $('#year').text(new Date().getFullYear());
})

    </script>