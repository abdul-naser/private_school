

<section class="sec-7" style="display: none;">

    <div class ="pr-5 w-25">


        <!-- <div class="" >
        
         
                      <select name="type_measu_method_txt" id="searchRequestBySel"   class=" form-control  px-3 py-2 ">
                         <option disabled selected value="">البحث بواسطة إسم العملية</option>
        <option value="">الكل</option>
        
        <option > أنشاء مدرسة خاصة</option>
        <option>عملية التعيينات</option>
        <option>إصدار وتجديد ترخيص مدرسة خاصة</option>
        
                      </select>
        </div> -->
        
        
                <input type="text"  id="searchAprr"  placeholder="بحث ..."  class=" mt-2 px-3 py-2 form-control">
                 
                    </div>
        
          <!-- ================ Order Details List ================= -->
          <div class="details" >
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>الموافقات المبدئية</h2>
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
                            <td>موافقة/مرفوضة</td>
        
                        </tr>
                    </thead>
                    <?php
        $sql="SELECT requests.*,school_private_main.school_name
  FROM requests
 LEFT JOIN school_private_main ON requests.no_school = school_private_main.number
        
         WHERE status_request = 'مكتمل' ORDER BY no DESC";
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
                            <form action="" method="post">

                            <td>
                                <?php
                                
                                // echo '<span class="noneditableAppr">' .$row['consent']. '</span>';
                                // عرض الأيقونة بناءً على قيمة consent
    if ($row['consent'] == "موافقة") {
        echo '<ion-icon name="checkmark-outline" class="text-success " style="font-size: 25px;"></ion-icon>';
    } else  if ($row['consent'] == "مرفوضة") {
        echo '<ion-icon name="close-outline" class="text-danger" style="font-size: 25px;"></ion-icon>';
    }
                                
                                ?>
<div class="col-md-4 form-group">
        <!-- <input type="text" class="form-control" id="completionStatus" name="" > -->
        <select class="form-control editableAppr"  name="consent" style="display: none; width: auto; min-width: 100px; max-width: 100%;" 
        >
        <option <?php if ($row['consent'] == "") echo "selected"; ?>></option>
        <option <?php if ($row['consent'] == "موافقة") echo "selected"; ?>>موافقة</option>
        <option <?php if ($row['consent'] == "مرفوضة") echo "selected"; ?>>مرفوضة</option>
                            </select>
    </div>

    </td>

    <td>
        <input type="hidden" value="<?php echo $row['type_request'];?>" class="typeRequest">
        <input type="hidden" value="<?php echo $row['no_school'];?>" class="schoolNo">
            
    <a  class="editApprove noneditableAppr">
        <ion-icon name="create-outline" style="color: #007bff; font-size: 24px;cursor: pointer;"></ion-icon>
        </a>
        <input type="hidden" class="apprId" value="<?php echo $row['no']; ?>">
        <button type="submit" class=" editableAppr text-success saveApproval" style="border: none; background: none;" >
            <ion-icon name="save-outline" style=" font-size: 24px"></ion-icon>
</button>
        <a class="closeAprrove editableAppr text-danger" style=" font-size: 24px;cursor: pointer;" onclick="cancel_button($(this))" ><ion-icon name="close-outline"></ion-icon></a>
    </form>              
    </td>
        
                        </tr>
        <?php  }?>
                    </tbody>
                </table>
            </div>
     
        
        </section>

        <script>
                $(document).ready(function(){
        
                //     $('#searchRequestBySel').change(function(){
                //     search_table($(this).val());
        
                // });
        
                $('#searchAprr').keyup(function(){
                    search_table($(this).val());
        
                }); 
        
                function search_table(value){
            $('#approveList tbody').each(function(){
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



        $('.saveApproval').click(function () { 
            // Get the selected value and the row ID
            var selectedAprr = $(this).closest('td').prev().find('select').val();


            var apprId = $(this).closest('td').find('.apprId').val();
            var typeRequest = $(this).closest('td').find('.typeRequest').val();
            var schoolNo = $(this).closest('td').find('.schoolNo').val();


            $.ajax({
                url: 'InitialApprovals/update_consent.php', 
                type: 'POST',
                data: {
                    consent: selectedAprr,
                    id: apprId,
                    typeRequest:typeRequest,
                    schoolNo:schoolNo
                },
                success: function (response) {
                    alert('تم التحديث بنجاح');
                },
                error: function (xhr, status, error) {
                    alert('Error updating consent');
                }
            });
        });
                });
        </script>