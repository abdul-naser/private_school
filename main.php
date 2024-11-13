<?php
include 'conn.php';

session_start();
if(!isset($_SESSION['schoolPrivate']))
{
	header('location:index.php');
	exit;

}

$report_writer = $_SESSION['report_writer'];

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

<!-- Link For Boostrap and Jquery and Icons or others link .... -->


<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- JQuery -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- ======= Charts JS ====== -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- --------------------------------------------- -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دائرة المدارس الخاصة</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="mainContainer">
        <div class="navigation">
            <ul>
                <li style="margin-right: 40px;  font-size: 18px;">
                    <a href="#">
                        <!-- <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span> -->
                        <span class="title">دائرة المدارس الخاصة</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="toggleSection('sec-1')">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">الرئيسية</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="toggleSection('sec-2')">
                        <span class="icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </span>
                        <span class="title">بيانات المدارس الخاصة</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="toggleSection('sec-3')">
                        <span class="icon">
                            <ion-icon name="business-outline"></ion-icon>
                        </span>
                        <span class="title">معاينة المبنى</span>
                    </a>
                </li>


                <li>
                    <a href="#" onclick="toggleSection('sec-4')">
                        <span class="icon">
                        <ion-icon name="send-outline"></ion-icon>
                        </span>
                        <span class="title">طلبات المراسلات</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="toggleSection('sec-7')">
                        <span class="icon">
                            <ion-icon name="checkmark-done-outline"></ion-icon>
                        </span>
                        <span class="title">الموافقات المبدئية</span>
                    </a>
                </li>


                <li>
                    <a href="#" onclick="toggleSection('sec-5')">
                        <span class="icon">
                        <ion-icon name="man-outline"></ion-icon>
                        </span>
                        <!-- <span class="title">بيانات العاملين</span> -->
                        <span class="title">التعيينات</span>

                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">أضافة صفوف/ برنامج</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="school-outline"></ion-icon>
                        </span>
                        <span class="title">أقامة برنامج مسائي/صيفي</span>
                    </a>
                </li>

             

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="pin-outline"></ion-icon>
                        </span>
                        <span class="title">نقل الموقع</span>
                    </a>
                </li>

              
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="expand-outline"></ion-icon>
                        </span>
                        <span class="title">طلب تأجيل/تمديد</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="share-social-outline"></ion-icon>
                        </span>
                        <span class="title">نشر إعلان</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">الرسوم الدراسية</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="repeat-outline"></ion-icon> </span>
                        <span class="title">تغيير مسمى المدرسة</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">إضافة شريك / تنازل</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="close-outline"></ion-icon>
                        </span>
                        <span class="title">المخالفات</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="alert-outline"></ion-icon>
                        </span>
                        <span class="title">إنذارات</span>
                    </a>
                </li>

            </ul>
        </div>

        
       
        <!-- ========================= Main ==================== -->
        <div class="main " >
            <div class="topbar elemNoPrint">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
             

                <div class="user">
                <img src="a.png" alt="">

                </div>

                <div class="" style="display: flex; align-items: end;">
                    <span style="margin-left: 2px;"><?php echo  $_SESSION['report_writer'] ?></span>
                    <a href="logout.php"><img src="check-out.png?v=<?php echo time(); ?>"></a>
                    </div>
            </div>



    
    
    <?php  ?>
          <?php 
          
        //    sec-1

      include 'home.php';

include 'buildingForm/popup_chart.php';

      //    sec-2
      include 'schools_data/main_schools.php';

      //    sec-21
    //   formSchoolProcessComp.php
    
           //    sec-3
        include 'buildingForm/list_building.php';

      //    sec-4
      include 'requests/main_requests.php';
 //    sec-41
 include 'requests/add_request.php';

       //    sec-31
       include 'buildingForm/form_building.php';

     //    sec-5
     include 'staff_private_school/list.php';
       
       //    sec-7
       include 'InitialApprovals/main_approval.php';
            ?>

<?php 
?>

            <!-- ======================= Cards ================== -->
            <div class="cardBox" style="display: none;">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Add Charts JS ================= -->
            <div class="chartsBx" style="display: none;">
                <div class="chart"> <canvas id="chart-1"></canvas> </div>
                <div class="chart"> <canvas id="chart-2"></canvas> </div>
            </div>

        
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>

    <!-- ======= Charts JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="assets/js/chartsJS.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">

</body>

</html>

<script>


</script>


