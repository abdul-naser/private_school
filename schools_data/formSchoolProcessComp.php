<?php
      

            $schoolNo = isset($_POST['schoolNo']) ? $_POST['schoolNo'] : null;

        
    ?>
   

<section class="container sec-21">

    <div class="text-center mt-5">
        <h4>تسجيل بيانات مدرسة</h4>
    </div>

    <div class="container border rounded p-4">
        <form action="schools_data/proceessCompSchool.php" method="post"> 

        <!-- <form action="" method="post">  -->
        <input type="hidden" name="schoolNo" value="<?php echo $schoolNo; ?>" class="form-control" required>
            <div class="mb-3">
                <label>رمز المدرسة</label>
                <input type="text" name="id_txt"  class="form-control" >
            </div>
            
            <div class="mb-3">
                <label>نوع المدرسة</label>
                <select name="type_school_txt" class="form-control" required>
                    <option value=""></option>
                    <option value="للتعليم المبكر">للتعليم المبكر</option>
                    <option value="مدرسة أجنبية">مدرسة أجنبية</option>
                    <option value="مدرسة خاصة">مدرسة خاصة</option>
                    <option value="مدرسة عالمية">مدرسة عالمية</option>
                    <option value="مدرسة دولية">مدرسة دولية</option>
                </select>
            </div>

            
     <div class="mb-3">
     <label>أسم المدرسة الخاصة</label>
         <input type="text" name="name_txt" required class="form-control">
     </div>
     
     <div class="mb-3">
     <label>الولاية</label>
         <select name="wilayat_txt" required class="form-control">
             <option value=""></option>
             <option value="صحار">صحار</option>
             <option value="شناص">شناص</option>
             <option value="لوى">لوى</option>
             <option value="صحم">صحم</option>
             <option value="الخابورة">الخابورة</option>
             <option value="السويق">السويق</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>الموقع(القرية)</label>
         <input type="text" name="location_txt" required class="form-control">
     </div>

     <div class="mb-3">
     <label>حاله المدرسة</label>
         <select name="school_status_txt" class="form-control">
             <option value=""></option>
             <option value="مشغلة">مشغلة</option>
             <option value="مجمدة">مجمدة</option>
             <option value="مغلقة">مغلقة</option>
             <!-- <option value="غير محدد">غير محدد</option> -->
             <option >مؤجلة</option>
             <option >موافقة مبدئية</option>
             <option >انتهت الموافقة</option>
             <option >نقل خارج المحافظة</option>

         </select>
     </div>

     <div class="mb-3">
     <label>هاتف المدرسة/المالك</label>
         <input type="text" name="phone_txt" class="form-control">
     </div>

     <div class="mb-3">
     <label>البريد الالكتروني</label>
         <input type="email" name="email_txt" class="form-control">
     </div>



     
    
     
     <div class="mb-3">
     <label>رقم السجل التجاري</label>
         <input type="text" name="sjel_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>نوع البرنامج التعليمي المعتمد</label>
         <select name="type2_txt" class="form-control">
         <option value=""></option>
             <option value="أحادي اللغة">أحادي اللغة</option>
             <option value="ثنائي اللغة">ثنائي اللغة</option>
             <option value="ثنائية اللغة / أحادية اللغة">ثنائية اللغة / أحادية اللغة</option>

             <option value="دولي">دولي</option>
             <option value="تعليم القرآن الكريم">تعليم القرآن الكريم</option>
             <option value="رياض أطفال">رياض أطفال</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>نوع المبنى</label>
         <select name="statue_bulding_txt" class="form-control">
             <option value=""></option>
             <option value="مستأجر">مستأجر</option>
             <option value="ملك">ملك</option>
             <option value="مشيد">مشيد</option>
             <option value="أستثمار">أستثمار</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>نوع نظام التقويم</label>
         <select name="celender_txt" class="form-control">
             <option value=""></option>
             <option value="الوزارة">الوزارة</option>
             <option value="خاص">خاص</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>أدنى صف</label>
         <!-- <input type="text" name="classlow_txt" class="form-control"> -->
         <select name="classlow_txt" class="form-control" id="classlow-select">
             <option value=""></option>
             <option >روضة</option>
             <option>تمهيدي</option>
             <option>الأول</option>
            <option>الثاني</option>
            <option>الثالث</option>
            <option>الرابع</option>
            <option>الخامس</option>
            <option>السادس</option>
            <option>السابع</option>
            <option>الثامن</option>
            <option>التاسع</option>
            <option>العاشر</option>
            <option>الحادي عشر</option>

         </select>

         <!-- <input type="text" name="classlow_txt" id="classlow-input" class="form-control mt-3" placeholder="ضع أدنى صف" style="display: none;"> -->

         <script>
            // $(document).ready(function() { 
            //     // عند تغيير الخيار في القائمة المنسدلة
            //     $('#classlow-select').change(function() {
            //         // إذا كان الخيار المحدد هو "أخرى"
            //         if ($(this).val() === 'أخرى') {
            //             // عرض حقل الإدخال
            //             $('#classlow-input').show();
            //         } else {
            //             // إخفاء حقل الإدخال
            //             $('#classlow-input').hide();
            //         }
            //     });
            // });
        </script>

     </div>
     
     <div class="mb-3">
     <label>أعلى صف مشغل</label>
         <!-- <input type="text" name="classhi_txt" class="form-control"> -->
         <select name="classhi_txt" class="form-control">
            <option></option>
            <option>تمهيدي</option>
            <option>الأول</option>
            <option>الثاني</option>
            <option>الثالث</option>
            <option>الرابع</option>
            <option>الخامس</option>
            <option>السادس</option>
            <option>السابع</option>
            <option>الثامن</option>
            <option>التاسع</option>
            <option>العاشر</option>
            <option>الحادي عشر</option>
        </select>
        
     </div>
     
     <!-- <div class="mb-3">
     <label>أعلى صف (مرخص)</label>
         <input type="text" name="classhi2_txt" class="form-control">
     </div> -->
     
     <div class="mb-3">
     <label>مالك / ملاك المدرسة</label>
         <input type="text" name="owner_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>جنسية المالك</label>
         <input type="text" name="national_txt" class="form-control">
     </div>
<!--      
     <div class="mb-3">
     <label>أسم المدير/المديرة</label>
         <input type="text" name="name_manager_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>أسم المساعد/المساعدة</label>
         <input type="text" name="name_manager2_txt" class="form-control">
     </div> -->
     
     <!-- <div class="mb-3">
     <label>تاريخ الاصدار الاول للترخيص</label>
         <input type="date" name="first_date_approval_txt" class="form-control">
     </div> -->
     
     <div class="mb-3">
     <label>تاريخ تجديد / اصدار الترخيص</label>
         <input type="date" name="renew_date_approval_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>تاريخ انتهاء الترخيص</label>
         <input type="date" name="expired_date_approval_txt" class="form-control">
     </div>
     
     <!-- <div class="mb-3">
     <label>الترخيص (ساري/منتهي)</label>
         <select name="type_approval_txt" class="form-control">
             <option value=""></option>
             <option value="ساري">ساري</option>
             <option value="منتهي">منتهي</option>
         </select>
     </div> -->
     

<!--      
     <div class="mb-3">
     <label>العام الدراسي للتجميد</label>
         <input type="text" name="date_freezing_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>رقم قيد المراسلة</label>
         <input type="text" name="number_message_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>العام الدراسي لفك التجميد والتشغيل</label>
         <input type="text" name="date_cancel_freezing_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>رقم قيد المراسلة</label>
         <input type="text" name="number_message2_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>عدد مرات التجميد</label>
         <input type="text" name="total_freezing_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>العام الدراسي لايقاف التشغيل بدون تجميد</label>
         <input type="text" name="date_stop_outfreezing_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>عدد الانذارات</label>
         <input type="text" name="number_alert_txt" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>الملاحظات</label>
         <textarea name="commant_txt" rows="8" class="form-control"></textarea>
     </div> -->

   
     
     <div class="mb-3">
     <label>العام الدراسي للافتتاح (التشغيل) سنه التأسيس</label>
         <!-- <input type="text" name="start_txt" class="form-control"> -->

         <select id="academic-year" name="start_txt"  class="form-control">   <option value=""></option></select>
      

    <script>
        const select = document.getElementById('academic-year');
        const startYear = 1980;
        const currentYear = new Date().getFullYear() + 1; // السنة القادمة

        for (let year = startYear; year < currentYear; year++) {
            const option = document.createElement('option');
            option.value = `${year}/${year + 1}`;
            option.textContent = `${year}/${year + 1}`;
            select.appendChild(option);
        }
    </script>
     </div>
     
   
            
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" name="submitNewSchool"  class="btn btn-info">تسجيل المدرسة</button>
            </div>
        </form>
    </div>
</section>
