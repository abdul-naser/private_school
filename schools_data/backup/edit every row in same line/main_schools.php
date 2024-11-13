<?php

$sql="SELECT * FROM school_private_main WHERE school_type IS  NOT NULL";
$result = $pdo->query($sql);


$rows = $result->fetchAll(PDO::FETCH_ASSOC);

// Count the total number of rows
$rowCount = count($rows);


?>



 
<section class="sec-2" style="display: none;" >




                            </style>
<div class="mr-3 mt-5">
<input type="text" class=" w-25  px-3 py-2 form-control " id="searchSchool" name="" placeholder="بحث..">
</div>
    <!-- ================ Order Details List ================= -->
  <div class="details" id="detailsBuilding">
    <div class="recentOrders">
        <div class="cardHeader">

            <div>
        <h2>بيانات المدارس</h2>
        <a href="#" id="" class="btn subRequest  " ><ion-icon name="send-outline"></ion-icon></a>
        <input type="hidden" class="main_subRequest" value="طلب أنشاء مدرسة خاصة">
        <a href="#" class="btn" onclick="toggleSection('sec-21')">أضافة مدرسة</a>

    </div>
        </div>

        <table   class='tableSchool ' >
                    <thead>
                        <tr>
<td>رقم المدرسة (على النظام)</td>
<td>رمز المدرسة</td>
<td>نوع المدرسة/الروضة</td>
<td>أسم المدرسة الخاصة</td>
<td>الولاية</td>
<td>الموقع(القرية)</td>
<td>حاله المدرسة</td>

<td>هاتف المدرسة/المالك</td>
<td>البريد الالكتروني</td>
<td>رقم السجل التجاري</td>
<td>نوع البرنامج التعليمي المعتمد</td>
<td>نوع المبنى</td>

<td>نوع نظام التقويم</td>
<td>أدنى صف</td>
<td>أعلى صف مشغل</td>
<!-- <td>أعلى صف (مرخص)</td> -->
<td>مالك/ملاك المدرسة</td>
<td>جنسية المالك</td>
<!-- <td>أسم المدير/المديرة</td>
<td>أسم المساعد/المساعدة</td>
<td>تاريخ الاصدار الاول للترخيص</td> -->
<td>تاريخ تجديد الترخيص</td>
<td>تاريخ انتهاء الترخيص</td>
<!-- <td>الترخيص(ساري/منتهي)</td>
<td>العام الدراسي للتجميد</td>
<td>رقم قيد المراسلة</td>
<td>العام الدراسي لفك التجميد والتشغيل</td>
<td>رقم قيد المراسلة</td>
<td>عدد مرات التجميد</td>
<td>العام الدراسي لايقاف التشغيل بدون تجميد</td>
<td>عدد الانذارات</td>
<td>الملاحظات</td>
<td>تاريخ أضافة المدرسة</td> -->
<!-- <td>أخر أضافة او تحديث تم عن طريق</td> -->

<td>العام الدراسي للافتتاح</td>
<td></td>
<td ></td>

                        </tr>
                    </thead>
                    <tbody>

                        
<?php


foreach ($rows as $row) {


?>
<form action="#" method="post" class="formEditSchool">
                        <tr>
                        <input 
type="hidden" 
name="number" 
value="<?php echo $row['number']; ?>" >  

    <td><?php echo $row['number']; ?></td>                            
<td>
    <?php echo '<span class="noneditable">' .$row['school_id']. '</span>'; ?>
<input 
type="text" 
name="school_id" 
value="<?php echo $row['school_id']; ?>" 
class="form-control editable" 
style="display: none; width: 80px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>

<td>
<?php echo '<span class="noneditable">' .$row['school_type']. '</span>'; ?>
<!-- <input 
type="text" 
name="school_type" 
value="<?php echo $row['school_type']; ?>" 
class="form-control editable" 
style="display: none; width: 80px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';"> -->

<select name="school_type" class="form-control editable" style="display: none; width: 80px; min-width: 100px; max-width: 100%;" >
    <option value=""></option>
    <option >للتعليم المبكر</option>
    <option value="مدرسة خاصة">مدرسة أجنبية</option>
    <option value="مدرسة خاصة">مدرسة خاصة</option>
    <option value="مدرسة عالمية">مدرسة عالمية</option>
    <option value="مدرسة دولية">مدرسة دولية</option>
    <!-- <option value="روضة خاصة">روضة خاصة</option>
    <option value="تعليم قرآن">تعليم قرآن</option>
    <option value="بيوت تعليم مبكر">بيوت تعليم مبكر</option> -->
</select>
</td>


<td>
<?php echo '<span class="noneditable">' .$row['school_name']. '</span>'; ?>

<input 
type="text" 
name="school_name" 
value="<?php echo $row['school_name']; ?>" 
class="form-control editable" 
style="display: none; width: auto; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">


</td>

<td>
<?php echo '<span class="noneditable">' .$row['wilaya']. '</span>'; ?>

<!-- <input 
type="text" 
name="wilaya" 
value="<?php echo $row['wilaya']; ?>" 
class="form-control editable" 
style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';"> -->

<select name="wilayat"  class="form-control editable" style="display: none; width: 50px; min-width: 100px; max-width: 100%;">
    <option value=""></option>
    <option value="صحار">صحار</option>
    <option value="شناص">شناص</option>
    <option value="لوى">لوى</option>
    <option value="صحم">صحم</option>
    <option value="الخابورة">الخابورة</option>
    <option value="السويق">السويق</option>
</select>

</td>
<td>
  
    <?php echo '<span class="noneditable">' .$row['location']. '</span>'; ?>

<input 
type="text" 
name="location" 
value="<?php echo $row['location']; ?>" 
class="form-control editable" 
style="display: none; width: 80px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td>
<?php echo '<span class="noneditable">' .$row['school_status']. '</span>'; ?>

<input 
type="text" 
name="school_status" 
value="<?php echo $row['school_status']; ?>" 
class="form-control editable" 
style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td>
<?php echo '<span class="noneditable">' .$row['phone']. '</span>'; ?>
<input 
type="text" 
name="phone" 
value="<?php echo $row['phone']; ?>" 
class="form-control editable" 
style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['email']. '</span>'; ?>

    <input 
type="text" 
name="email" 
value="<?php echo $row['email']; ?>" 
class="form-control editable" 
style="display: none; width: auto; min-width: 100px; max-width: 100%;" 
oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">

</td>
<td><?php echo '<span class="noneditable">' .$row['commercial_number']. '</span>'; ?>
    <input 
    type="text" 
    name="commercial_number" 
    value="<?php echo $row['commercial_number']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['program_type']. '</span>'; ?>
    <input 
    type="text" 
    name="program_type" 
    value="<?php echo $row['program_type']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['owner_bulding']. '</span>'; ?>
    <input 
    type="text" 
    name="owner_bulding" 
    value="<?php echo $row['owner_bulding']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['celender']. '</span>'; ?>
    <input 
    type="text" 
    name="celender" 
    value="<?php echo $row['celender']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['low_class']. '</span>'; ?>
    <input 
    type="text" 
    name="low_class" 
    value="<?php echo $row['low_class']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['high_class']. '</span>'; ?>
    <input 
    type="text" 
    name="high_class_work" 
    value="<?php echo $row['high_class']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<!-- <td><?php echo $row['high_class_approv']; ?></td> -->
<td><?php echo '<span class="noneditable">' .$row['owner_school']. '</span>'; ?>
    <input 
    type="text" 
    name="owner_school" 
    value="<?php echo $row['owner_school']; ?>" 
    class="form-control editable" 
    style="display: none; width: auto; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['owner_national']. '</span>'; ?>
    <input 
    type="text" 
    name="owner_national" 
    value="<?php echo $row['owner_national']; ?>" 
    class="form-control editable" 
    style="display: none; width: 50px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
    
</td>
<!-- 
<td><?php echo $row['manager_name']; ?></td> -->
<!-- <td><?php echo $row['assistant_manager_name']; ?></td>
<td><?php echo $row['first_date_approval']; ?></td> -->
<td><?php echo '<span class="noneditable">' .$row['renew_date_approval']. '</span>'; ?>
    <input 
    type="date" 
    name="renew_date_approval" 
    value="<?php echo $row['renew_date_approval']; ?>" 
    class="form-control editable" 
    style="display: none; width: 120px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<td><?php echo '<span class="noneditable">' .$row['expired_date_approval']. '</span>'; ?>
    <input 
    type="date" 
    name="expired_date_approval" 
    value="<?php echo $row['expired_date_approval']; ?>" 
    class="form-control editable" 
    style="display: none; width: 120px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">
</td>
<!-- 
<td><?php echo $row['type_approval']; ?></td>

<td><?php echo $row['date_freezing']; ?></td>
<td><?php echo $row['number_message']; ?></td>
<td><?php echo $row['date_cancel_freezing']; ?></td>
<td><?php echo $row['number_message2']; ?></td>
<td><?php echo $row['total_freezing']; ?></td>
<td><?php echo $row['date_stop_outfreezing']; ?></td>
<td><?php echo $row['number_alert']; ?></td>
<td><?php echo $row['commant']; ?></td>
<td><?php echo $row['record_time']; ?></td>
<td><?php echo $row['add_by']; ?></td> -->
<td><?php echo '<span class="noneditable">' .$row['year_start']. '</span>'; ?>
    <input 
    type="text" 
    name="year_start" 
    value="<?php echo $row['year_start']; ?>" 
    class="form-control editable" 
    style="display: none; width: 120px; min-width: 100px; max-width: 100%;" 
    oninput="this.style.width = ((this.value.length + 1) * 8) + 'px';">

</td>

<td>
        <a  class="edit_data noneditable">
        <ion-icon name="create-outline" style="color: #007bff; font-size: 24px;cursor: pointer;"></ion-icon>
        </a>
        <input type="hidden" class="buildingNo" value="<?php echo $row['number']; ?>">
   
        <button type="submit" class=" editable text-success " style="border: none; background: none;">
            <ion-icon name="save-outline" style=" font-size: 24px"></ion-icon>
</button>

        <a  class=" text-danger editable">
        <ion-icon name="trash-outline" style=" font-size: 24px;cursor: pointer;"></ion-icon>
        </a>
        <input type="hidden" class="buildingNo" value="<?php echo $row['number']; ?>">

        <a class="close_input editable text-warning" style=" font-size: 24px;cursor: pointer;" onclick="cancel_button($(this))" ><ion-icon name="close-outline"></ion-icon></a>
    </td>
                        </tr>
                        </form>
                    <?php 
            }; 
                ?>
                </tbody>

                </table>
            </div>

   
</section>


<div id="resultSubRequest">

</div>

    <script type="text/javascript">
    $(document).ready(function(){
        
        $('#searchSchool').keyup(function(){
            search_table($(this).val());

        });
function search_table(value){
    $('.tableSchool tbody tr').each(function(){
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


//     $('.edit_data').click(function(){ 
//  $(this).closest('tr').find('.editable').show('slow')
//  $(this).closest('tr').find('.noneditable').hide('slow')

// })

// $('.close_input').click(function(){
//  $(this).closest('tr').find('.editable').hide('fast')
//  $(this).closest('tr').find('.noneditable').show('fast')

// })

</script>


<script>
        $(document).ready(function(){

    $(".subRequest").click(function(){
    var $divMainType =  $(this).closest('form');
    var mainType =$divMainType.find(".main_subRequest").val();

    $.ajax ({
        url:"InitialApprovals/ajaxSubRequest.php",
        method: "POST",
        data: {mainType:mainType},

        success:function(data){
            $("#resultSubRequest").html(data);
            $("#resultSubRequest").css("display", "block");
            $(".sec-2").css("display", "none");
            // $(".sec-7").css("display", "block");

        }
    });

 
});


$('.formEditSchool').submit(function(e) { 
        // e.preventDefault()
            $.ajax({
            url: 'schools_data/editSchool_process.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg').html(resp);
            }
        })
    })

        }) 
</script>

