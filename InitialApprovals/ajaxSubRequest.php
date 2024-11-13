<?php
include '../conn.php';


?>

<section class="sec-71">

    <div class ="pr-5 w-25">

</select>
        </div>
        
        
                <!-- <input type="text"  id="searchAprr"  placeholder="بحث ..."  class=" mt-2 px-3 py-2 form-control"> -->
                 
                    </div>
        
          <!-- ================ Order Details List ================= -->
          <div class="details" >
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>أستكمال بيانات الطلبات الموافق عليها</h2>
                </div>
        
                <table id="approveList">
                    <thead>
                        <tr>
                        <td>اسم المدرسة / صاحب الطلب</td>
                            <td>رقم المراسلة</td>
                            <td>تاريخ الطلب</td>
                            <td>تاريخ ارسال الطلب الى الوزارة</td>
                            <td>مدة إرسال الطلب بالايام</td>
                            <td>الملاحظات</td>
                            <!-- <td>حالة الطلب</td> -->
                            <td>العملية</td>
                            <td> نوع الطلب</td>
                            <td>مدخل الطلب</td>
                            <td>تاريخ إدخال الطلب</td>
        
                        </tr>
                    </thead>
                    <?php
$sql = "
SELECT requests.*, school_private_main.school_name
FROM requests
LEFT JOIN school_private_main 
  ON requests.no_school = school_private_main.number
WHERE requests.consent = 'موافقة' 
  AND school_private_main.school_type IS  NULL 
ORDER BY requests.no DESC;
";


        $result = $pdo->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
        
        ?>
        
                    <tbody>
                        <tr>
                        <td><?php echo $row['school_name']; ?><?php echo $row['applicant_name']; ?></td>
                        <td><?php echo $row['number_email']; ?></td>
                            <td><?php echo $row['date_request']; ?></td>
                            <td><?php echo $row['date_send_request']; ?></td>
                            <td>
                            <?php
        $date_request = new DateTime($row['date_request']);
        $date_send_request = new DateTime($row['date_send_request']);
        $difference = $date_send_request->diff($date_request);
        
        $daysDifference = $difference->days;
        
        for ($i = 0; $i < $daysDifference; $i++) {
            $currentDay = $date_request->format('N');
            if ($currentDay == 5 || $currentDay == 6) {
                $daysDifference -= 1; // تقليل الفرق بيوم واحد لكل يوم عطلة
            }
            $date_request->modify('+1 day');
        }
        
        if ($daysDifference <= 5) {
            echo "<span style='color: green;'>" . $daysDifference . "</span>";
        } else {
            echo "<span style='color: red;'>" . $daysDifference . "</span>";
        }
        ?>
        
        
                            </td>
        
                            <td><?php echo $row['note']; ?></td>
                            <!-- <td>
                                <?php
                                $status_class = ($row['status_request'] == 'مكتمل') ? 'status delivered' : 'status return';
        
                                ?>
                                <span class = "<?php  echo $status_class;  ?>"><?php echo $row['status_request']; ?></span> -->
                                <!-- <span class="status pending">Pending</span>
                                <span class="status return">Return</span>
                                <span class="status inProgress">In Progress</span> -->
                            <!-- </td> -->
                            <td><?php echo $row['main_type']; ?></td>
        
                            <td><?php echo $row['type_request']; ?></td>
                            <td><?php echo $row['request_write']; ?></td>
                            <td><?php echo $row['time_insert']; ?></td>
     


    <td>
    
        <input type="hidden" class="schoolNo" value="<?php echo $row['no_school']; ?>">
        <button type="submit" class="btn btn-warning ApprovCompleate"   >أستكمال</button>
    </td>
        
                        </tr>
        <?php  }?>
                    </tbody>
                </table>
            </div>
     
        
        </section>

        <div id="resultApprovCompleateSchoollData"></div>

        <script>
                $(document).ready(function(){
  

   

$(".ApprovCompleate").click(function(){ 

  var rowschoolNo=  $(this).closest('td');
  var schoolNo =Number(rowschoolNo.find(".schoolNo").val());

//alert(input);
// if(nonMatcNo != ""){
    $.ajax ({
        // url:"schools_data/formSchoolProcess.php",
        url:"schools_data/formSchoolProcessComp.php",
        
        method: "POST",
        data: {schoolNo:schoolNo},

        success: function(data) {
    


        $("#resultApprovCompleateSchoollData").html(data);
        $("#resultApprovCompleateSchoollData").css("display", "block");
        $(".sec-71").css("display", "none");
}

    });

 
});


  
                });
        </script>