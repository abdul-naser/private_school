<script src="library/dselect.js"></script>


<?php
include '../conn.php';

$main_request = $_POST['mainType'];

$reportWriter = $_POST['reportWriter'];
?>
<section class="sec-42 container mt-5 ">
<div class=" p-5 shadow-lg">

<?php

echo "<h5 class=''>عملية ".$main_request."</h5>";

?>
<!-- =================Form Request Type =============================== -->
<form action="requests\request_process.php" method="post">
    <input type="hidden" value="<?php echo $main_request; ?>" name="mainType">
    <input type="hidden" value="<?php echo $reportWriter; ?>" name="reportWriter">

<div class="form-group mt-3">
    <label for="requestType" class="align-label-end">نوع الطلب</label>
    <select class="form-control" name="type_request" id="type_request" required>
        <?php if ($main_request === 'أنشاء مدرسة خاصة') {?>
    <option></option>

    <option class="school-option-create">طلب إنشاء مدرسة خاصة</option>
<option class="school-option-inspect">معاينة مبنى مدرسي</option>
<option class="school-option-approve-map">اعتماد خرائط مبنى مشيد لمدرسة خاصة</option>
<option class="school-option-approve-fees">اعتماد الرسوم الدراسية</option>
<option class="school-option-approve-uniform">اعتماد الزي المدرسي</option>
<option class="school-option-freeze">طلب تجميد مدرسة</option>
<option class="school-option-delay">طلب تأجيل مدرسة</option>
<option class="school-option-other" value="">اخرى</option>
            <?php  }
             elseif ($main_request === 'إصدار وتجديد ترخيص مدرسة خاصة') {?>
    <option></option>
<option>إضافة شريك</option>
<option>طلب تنازل</option>
<option>إصدار ترخيص</option>
<option>تجديد ترخيص</option>
<option>تغيير مسمى مدرسة خاصة</option>
<option>نقل موقع مدرسة خاصة</option>
<option>تغيير / إضافة برنامج تعليمي لمدرسة خاصة</option>
<option>إضافة صفوف دراسية</option>
<option>تعديل الرسوم الدراسية</option>
<option>إقامة برنامج مسائي / صباحي</option>
<option>إقامة برنامج صيفي</option>
<option>اعتماد اعلان ترويجي لمدرسة خاصة</option>

<?php  }

elseif ($main_request === 'عملية التعيينات') {?>
    <option></option>
    <option>تعيين الهيئة الادارية والتدريسية</option>
    <option>إضافة الهيئة الادارية والتدريسية في البوابة التعليمية</option>
    <option>إالغاء طلب تعيين</option>
           <?php  }?> 
    </select>
</div>

<div class="row d-flex mt-3">
    <div class="col-md-4 form-group">
        <label class="align-label-end" id="labelSchool">اسم المدرسة</label>
        <input type="text" class="form-control" id="applicantName" name="applicant_name" placeholder="اسم صاحب الطلب" style="display: none;">

        <select name="no_school" class="selectSchool" id="selectSchool" required >
                <option value="">أختيار المدرسة</option>
                <?php 
                $query = "SELECT  school_name,number FROM school_private_main ";
            
            $result = $pdo->query($query);
                foreach($result as $row)
                {
                    echo '<option value="'.$row["number"].'">'.$row["school_name"].'</option>';
                }
                ?>  
            </select>  

            <!-- <input type="hidden" class="form-control" id="noSchool" name="no_school" > -->


    </div>
    <div class="col-md-4 form-group">
        <label class="align-label-end">رقم المراسلة</label>
        <input type="text" class="form-control" id="" name="number_email" >
    </div>
    <div class="col-md-4 form-group">
        <label class="align-label-end">حالة الطلب</label>
        <!-- <input type="text" class="form-control" id="completionStatus" name="" > -->

        <select class="form-control"  name="status_request"  >
                                <option>مكتمل</option>
                                <option> غير مكتمل</option>
                            </select>
    </div>
</div>


<!-- ================= في حالة عملية التعيينات فقط=============================== -->
<?php if ($main_request === 'عملية التعيينات') {?>
<div class="row d-flex mt-3">
    <div class="col-md-4 form-group">
        <label  class="align-label-end">اسم المعلم / المعلمة</label>
        <input type="text" class="form-control" id="" name="" >
    </div>
    <div class="col-md-4 form-group">
        <label class="align-label-end" >الجنسية</label>
        <input type="text" class="form-control" id="" name="" >
    </div>
    <div class="col-md-4 form-group">
        <label  class="align-label-end">رقم الجواز</label>
        <input type="text" class="form-control" id="" name="" >

       
    </div>
    <div class="row d-flex mt-3">

    <div class="col-md-4 form-group">
        <label  class="align-label-end">الوظيفة المطلوبة</label>
        <input type="text" class="form-control" id="" name="" >
    </div>
</div>

</div>
<?php }?>
<!-- ================================================ -->


<div class="row d-flex mt-3">
    <div class="col-md-4 form-group">
        <label  class="align-label-end">تاريخ الطلب</label>
        <input type="date" class="form-control" id="dataRequest" name="date_request" >
    </div>
    <div class="col-md-4 form-group">
        <label class="align-label-end" id="date_label">تاريخ ارسال الطلب الى الوزارة</label>
        <input type="date" class="form-control" id="dateSend" name="date_send_request" >
    </div>
    <div class="col-md-4 form-group">
        <label  class="align-label-end">ملاحظات</label>
        <input type="text" class="form-control" id="" name="note" >
    </div>
</div>

<div class="col-md-4 form-group mt-3"  style="display: none;" id="feeCollection">
        <label  class="align-label-end">تحصيل الرسوم</label>
        <input type="text" class="form-control" id="" name="fee_collection" >
    </div>

<input type="submit" name="submitRequest" class="btn btn-info px-4 mt-4 w-15 " value="ارسال">
</form>
<!-- =================Form Request Type =============================== -->
</div>
</section>
<script>

let selectSchool = document.querySelector('#selectSchool');

dselect(selectSchool, {
    search: true
});

</script>

<script>
    $('#type_request').on('change', function() { 
        var selectedOption = $(this).find('option:selected').attr('class');
        var label = $('#date_label');
        var feeCollection = $('#feeCollection');
        var selectSchool = $('.selectSchool');
        
        if (selectedOption === "school-option-inspect") {
            label.text('تاريخ الزيارة');
            feeCollection.css('display', 'block');
            $('#labelSchool').text('اسم المدرسة'); 
            $('#applicantName').css('display', 'none');

        } else if (selectedOption === 'school-option-create') {
            feeCollection.css('display', 'block');
            $('#labelSchool').text('إسم الشخص نفسه');
            $('#applicantName').css('display', 'block');
            selectSchool.attr('style', 'display: none !important;');
            selectSchool.removeAttr('required');

        } 
        else if (selectedOption === 'school-option-approve-map') {
            feeCollection.css('display', 'block');
            $('#labelSchool').text('إسم الشخص نفسه');
            $('#applicantName').css('display', 'block');
            label.text('تاريخ ارسال الطلب الى الوزارة');
        } 
        else if (selectedOption === 'school-option-approve-uniform') {
            label.text('تاريخ الرد على المدرسة');
            $('#applicantName').css('display', 'none');
        } else {
            $('#labelSchool').text('اسم المدرسة');
            label.text('تاريخ ارسال الطلب الى الوزارة');
            feeCollection.css('display', 'none');
            $('#applicantName').css('display', 'none');
        }
    });
</script>

<!-- USE IN SEARCH SELECT OPTION -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->


<script>
       $(document).ready(function(){ 

        $("#selectSchool").on("change", function(){ 
  var schoolName = $(this).val();
   

if (schoolName != "") {
            $.ajax({
                url: "fetch_noSchool.php",
                method: "POST",
                data: { schoolName: schoolName },
                success: function(data) {
                    $("#noSchool").val(data);
                }
            });
        } else {
            $("#noSchool").val('ddd'); // Clear the input if no school is selected
        }
    });

// prevent form submission if start date is not less than end date
    const form = $('form'),
   dataRequest = $('#dataRequest'),
 dateSend = $('#dateSend');



  form.on('submit', function(event) {

    if (dataRequest.val() > dateSend.val()) {
      event.preventDefault(); // prevent form submission if start date is not less than end date
      alert('تاريخ الطلب يجب أن يكون أكبر من تاريخ الارسال');
    }


    });

});
    </script>
