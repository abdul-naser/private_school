



    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



<section class="sec-5" style="display: none;">
<?php

include 'conn.php';

      

$sql="SELECT * FROM schools_employee_new ";
$result = $pdo->query($sql);


$rows = $result->fetchAll(PDO::FETCH_ASSOC);



?>

        










    <div class="container  main-form">

        <div class="tittle  " >
            <h4 class="text-center mb-3 mt-4">بيانات الهيئة الإدارية والتدريسية بالمدرسة الخاصة للعام الدراسي 2024 / 2025 م</h4>
           
      
          

          </div>

          <input type="text" class=" w-25  px-3 py-2 form-control " id="searchEmployee" name="" placeholder="بحث..">


          <table class="table table-bordered mt-5" id="tableEmployee">
        <thead>
          <tr class="table-active">
            <td></td>
            <td>رمز المدرسة</td>
            <td>اسم المدرسة</td>

            <td> الاسم ( ربــــاعيــــاً )</td>
            <td>الهاتف</td>
            <td>الوظيفة حسب قرار التعيين</td>
            <td>الجنسية</td>
            <td>تاريخ التعيين</td>
            <td>المؤهل الدراسي </td>
            <td>الصفوف التي يدرسها</td>

            <td>التعيين</td>

          </tr>
        </thead>
        <tbody >
            <?php
            $index =1;
        foreach ($rows as $row) { ?>

          <tr>
            <td><?php echo $index++;  ?></td>
            <td>
          <?php echo $row['school_code']; ?>
            </td>

            <td>
          <?php echo $row['school_name']; ?>
            </td>

            <td>
          <?php echo $row['name']; ?>
            </td>

            <td>
          <?php echo $row['phone']; ?>
            </td>

            <td>
          <?php echo $row['position']; ?>
            </td>

            <td>
          <?php echo $row['national']; ?>
            </td>

            <td>
          <?php echo $row['date_appointment']; ?>
            </td>

            <td>
          <?php echo $row['qualification']; ?>
            </td>

            <td>
          <?php echo $row['classes']; ?>
            </td>

            <td>
          <?php echo $row['appointment']; ?>
            </td>
       
          </td>



          </tr>
          <?php } ?>
        </tbody>
      </table>

  </div>

 
</section>



<script type="text/javascript">
    $(document).ready(function(){
        
        $('#searchEmployee').keyup(function(){
            search_table($(this).val());

        });
function search_table(value){
    $('#tableEmployee tbody tr').each(function(){
        let found ='false';
        $(this).each(function(){
            if($(this).text().toLocaleLowerCase().indexOf(value.toLocaleLowerCase())>=0)
            {
                found='true';
            }

        });
        if(found=='true'){
            $(this).show();
        } else {
            $(this).hide();
        }
    })
}








    })
</script>

