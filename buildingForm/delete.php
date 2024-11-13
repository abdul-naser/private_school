<?php

include 'conn.php';


$id=$_POST['buildingNo'];

if(isset($_POST['buildingNo'])){
   $query ="DELETE FROM schools_buldinge WHERE number='$id'";
   $result = $pdo->query($query);


   if($result)
   {
      echo '<script>
     
          alert("تم الحذف بنجاح");
          window.location.href = "main.php";  </script>';
      } else {
        echo '<script> alert("لم يتم الحذف "); </script>';
      }
 

    }



?>