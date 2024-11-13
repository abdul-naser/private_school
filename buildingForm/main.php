<?php
session_start();
if(!isset($_SESSION['buildingForm']))
{
	header('location:index.php');
	exit;

}



?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<!-- icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

   
    <title>الرئيسية</title>
</head>
<body class="m-5">

<div class="d-flex justify-content-between">
    <img src="a.png" class="img-fluid" style="width: 112px; height: 112px;">
    

    <img src="qc.png" class="img-fluid" style="width: 112px; height: 112px;">
</div> 
<a href="logout.php"  class="main-btn btn btn-danger btn-lg position-relative "><ion-icon name="log-out-outline"></ion-icon></a>
<style>
    .main-btn {
        right: 20px;
        top: 30px;
    }
</style>

<h6 class="text-center">قسم التراخيص</h6>
  <h5 class="text-center">تقرير معاينة مبنى</h5>
     <section class="card-requesthome">

    <div class="content">
        <div class="box">
            <a href="list_building.php">
             <div class="inner">
                 <div class="icon"><i class="fa-solid fa-list-check fa-beat"></i></div>
                  <h3>القائمة</h3>
                  
             </div>
            </a>
        </div>
   
       


        <div class="box">
            <a href="form_building.php">
             <div class="inner">
                 <div class="icon"><i class="fa-regular fa-building fa-beat"></i></div>
                  <h3>معاينة مبنى</h3>
            
             </div>
            </a>
        </div>
   </div>
    </section>


      
</body>
</html>