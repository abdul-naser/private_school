<?php

$sql="SELECT * FROM schools_buldinge ORDER BY date DESC";
$result = $pdo->query($sql);


$rows = $result->fetchAll(PDO::FETCH_ASSOC);

// Count the total number of rows
$rowCount = count($rows);


?>



 
<section class="sec-3" style="display: none;" >







                          
                            <!-- <div class="start"><?php echo "المجموع الكلي للتقارير: " . $rowCount . "<br>";  ?> </div> -->


<div class="mr-3">
<input type="text" class=" w-25  px-3 py-2 form-control " id="searchBuilding" name="" placeholder="بحث..">
</div>
    <!-- ================ Order Details List ================= -->
  <div class="details" id="detailsBuild">
    <div class="recentOrders" id="detailsBuilding">
        <div class="cardHeader">
        <h2>تقرير معاينة مبنى</h2>
        <div>
        <a href="#" id="chartView" class="  btn   " ><ion-icon name="stats-chart-outline"></ion-icon></a>
        <a href="#" id="" class="  btn  " ><ion-icon name="send-outline"></ion-icon></a>

            <a href="#" class="btn" onclick="toggleSection('sec-31')">أضافة تقرير</a>
            </div>
        </div>

        <table   class='tableBuilding'>
                    <thead>
                        <tr>
                            <!-- <th>المسمى المعتمد للروضة / المدرسة</th> -->
<td>المسمى المعتمد المدرسة</td>
<td>التاريخ</td>
<td>نوع الطلب</td>
<td>الولاية</td>
<td>القرية</td>
<td>معد التقرير</td>
<td></td>


                        </tr>
                    </thead>
                    <tbody>

                        
<?php


foreach ($rows as $row) {


?>

                        <tr>
                        <td><?php echo $row['name_school'] . " - " . $row['type_school']; ?> </td>

                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['request']; ?></td>
                            <td><?php echo $row['wilaya']; ?></td>
                            <td><?php echo $row['quiria']; ?></td>
                            <td><?php echo $row['report_writer']; ?></td>
                            <td>
                            <form action="" method="post">
                                <a  class=" viewReportBuilding">
                                <ion-icon name="reader-outline" style="color: #007bff; font-size: 24px;cursor: pointer;"></ion-icon>

                                </a>
                                <input type="hidden" class="buildingNo" value="<?php echo $row['number']; ?>">
                                </form>
                            </td>
                        </tr>

                    <?php }; ?>
                </tbody>

                </table>
            </div>
        </div>
   
</section>

<div id="resultReportBuilding">

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script> -->
    <script src="buildingForm/script.js?v=<?php echo time(); ?>"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    -->



    <script type="text/javascript">
    $(document).ready(function(){
        
        $('#searchBuilding').keyup(function(){
            search_table($(this).val());

        });
function search_table(value){
    $('.tableBuilding tbody tr').each(function(){
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




$(".viewReportBuilding").click(function(){
    var $rowBuildingNo =  $(this).closest('td');
    var buildingNo =Number($rowBuildingNo.find(".buildingNo").val());

//alert(input);
// if(nonMatcNo != ""){
    $.ajax ({
        url:"buildingForm/report_building.php",
        method: "POST",
        data: {buildingNo:buildingNo},

        success:function(data){
            $("#resultReportBuilding").html(data);
            $("#resultReportBuilding").css("display", "block");
            $(".sec-3").css("display", "none");

        }
    });
// } else {
//     $("#resultNonMatch").css("display", "none");
// }
 
});





    })
</script>


<style>
    .main-btn {
        right: 20px;
        top: 30px;
    }

    /* ====================== Popup Chart Form Style  ========================== */
.popup-outer {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
    width: 100%;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  pointer-events: none;
  box-shadow: 0 10px 15px rgba(0,0,0,0.1);
transform: scale(1.2);
transition: all 0.3s ease-in-out;

}
.popup-box {
  
  padding: 30px;
  max-width: 600px;
  width: 100%;
  background: #fff;
  border-radius: 12px;
}

.popup-box .close {
  font-size: 24px;
  color: #b4b4b4;
  cursor: pointer;
  transition: all 0.2s ease;
}

.popup-box .close:hover{
  color: red;
}

.show{
  opacity: 10;
      pointer-events: auto;

}


</style>
