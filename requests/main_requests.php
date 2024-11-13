<section class="sec-4 mt-5" style="display: none;">

<div class ="pr-5 w-25">


<div class="" >

 
              <select name="type_measu_method_txt" id="searchRequestBySel"   class=" form-control  px-3 py-2 ">
                 <option disabled selected value="">البحث بواسطة إسم العملية</option>
<option value="">الكل</option>

<option > أنشاء مدرسة خاصة</option>
<option>عملية التعيينات</option>
<option>إصدار وتجديد ترخيص مدرسة خاصة</option>

              </select>
</div>


        <input type="text"  id="searchRequests"  placeholder="بحث ..."  class=" mt-2 px-3 py-2 form-control">
         
            </div>

  <!-- ================ Order Details List ================= -->
  <div class="details" >
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>قائمة الطلبات</h2>
            <a href="#" class="btn" onclick="toggleSection('sec-41')">أضافة طلب</a>
        </div>

        <table id="requestList">
            <thead>
                <tr>
                    <td>اسم المدرسة / صاحب الطلب</td>
                    <td>رقم المراسلة</td>
                    <td>تاريخ الطلب</td>
                    <td>تاريخ ارسال الطلب الى الوزارة</td>
                    <td>مدة إرسال الطلب بالايام</td>
                    <td>الملاحظات</td>
                    <td>حالة الطلب</td>
                    <td>العملية</td>
                    <td> نوع الطلب</td>
                    <td>مدخل الطلب</td>
                    <td>تاريخ إدخال الطلب</td>

                </tr>
            </thead>
            <?php
$sql="SELECT requests.*,school_private_main.school_name
  FROM requests
 LEFT  JOIN school_private_main ON requests.no_school = school_private_main.number
 ORDER BY no DESC";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {

?>

            <tbody>
                <tr data-id='<?php echo $row['no'] ?>'>
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
                    <td>
                        <?php
                        $status_class = ($row['status_request'] == 'مكتمل') ? 'status delivered' : 'status return';

                        ?>
                        <span class = "<?php  echo $status_class;  ?>"><?php echo $row['status_request']; ?></span>
                        <!-- <span class="status pending">Pending</span>
                        <span class="status return">Return</span>
                        <span class="status inProgress">In Progress</span> -->
                    </td>
                    <td><?php echo $row['main_type']; ?></td>

                    <td><?php echo $row['type_request']; ?></td>
                    <td><?php echo $row['request_write']; ?></td>
                    <td><?php echo $row['time_insert']; ?></td>

                    <td>
        <a  class="edit_data noneditable">
        <ion-icon name="create-outline" style="color: #007bff; font-size: 24px;cursor: pointer;"></ion-icon>
        </a>
        <input type="hidden" class="buildingNo" value="<?php echo $row['number']; ?>">
   
        <a type="submit" class=" editable text-success">
            <ion-icon name="save-outline" style=" font-size: 24px"></ion-icon>
</a>

        <a  class=" text-danger editable delete_request">
        <ion-icon name="trash-outline" style=" font-size: 24px;cursor: pointer;"></ion-icon>
        </a>
        <input type="hidden" class="buildingNo" value="<?php echo $row['number']; ?>">

        <a class="close_input editable text-warning" style=" font-size: 24px;cursor: pointer;" onclick="cancel_button($(this))" ><ion-icon name="close-outline"></ion-icon></a>
    </td>
                </tr>
<?php  }?>
            </tbody>
        </table>
    </div>

  <!-- ================= أحصائيات  ================ -->
  <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>أحصائيات متابعة الطلب</h2>
                    </div>

                    <table>


<?php
try {
    // Assuming $pdo is already defined and connected to your database
    // $sql_writer = "SELECT request_write,status_request, COUNT(*) AS count FROM requests GROUP BY request_write,status_request";
        $sql_writer = "SELECT DISTINCT request_write  FROM requests";
        $stmt = $pdo->prepare($sql_writer);
        $stmt->execute();


 $complete =0;

 $noComplete =0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        $request_write = htmlspecialchars($row['request_write'], ENT_QUOTES, 'UTF-8');
        $sql_wrC = "SELECT  request_write,status_request  FROM requests WHERE request_write= '$request_write'";
        $result = $pdo->query($sql_wrC);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount = count($rows);

        foreach($rows as $row){

        $status_request = htmlspecialchars($row['status_request'], ENT_QUOTES, 'UTF-8');

        if ($status_request === 'مكتمل') {
            $complete++;

        } elseif ($status_request === 'غير مكتمل') {
            $noComplete++;
        }
    }
            
        ?>


        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/user.png" alt=""></div>
                            </td>
                            <td>
                                <h4><?php echo $request_write  ?> <br> <span><?php echo $rowCount  ?></span></h4>
                            </td>
                            <td>
                        


<h4><?php echo 'مكتمل'; ?> <span><?php echo $complete; ?></span></h4>

                          
<h4><?php echo 'غير مكتمل'; ?> <span><?php echo $noComplete; ?></span></h4>
                        
                            </td>
                        </tr>
        

<?php
 $complete =0;

 $noComplete =0;
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

                        
                       
                    </table>
                </div>
            </div>
  <!-- ================= أحصائيات ================ -->

</section>

<script>
        $(document).ready(function(){

            $('#searchRequestBySel').change(function(){
            search_table($(this).val());

        });

        $('#searchRequests').keyup(function(){
            search_table($(this).val());

        });

        function search_table(value){
    $('#requestList tbody').each(function(){
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

        });


        // Delete Row
    $('.delete_request').click(function() {
        var id = $(this).closest('tr').attr('data-id')
        var name = $(this).closest('tr').find("[name='name']").text()
        var _conf = confirm("هل أنت متأكد انك تريد حذف الطلب؟")
        if (_conf == true) {
            $.ajax({
                url: 'requests/api.php?action=delete',
                method: 'POST',
                data: { id: id },
                dataType: 'json',
                error: err => {
                    alert("An error occured while saving the data")
                    console.log(err)
                },
                success: function(resp) {
                    if (resp.status == 'success') {
                        alert(name + 'تم حذفه بنجاح من القائمة.')
                        location.reload()
                    } else {
                        alert(resp.msg)
                        console.log(err)
                    }
                }
            })
        }
    })

</script>