


  
 

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
        <a href="#"  class="btn subRequest  " ><ion-icon name="send-outline"></ion-icon></a>
        <input type="hidden" class="main_subRequest" value="طلب أنشاء مدرسة خاصة">
        <!-- <a href="#" class="btn" onclick="toggleSection('sec-21')">أضافة مدرسة</a> -->
        <!-- <button  id="" class="btn" data-bs-toggle="modal" data-bs-target="#dataSchoolModal"  ><ion-icon name="add-outline"></ion-icon></button> -->


    </div>
        </div>

        <table   class='tableSchool ' >
                    <thead>
                        <tr>

                        <td></td>

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
<td>مالك/ملاك المدرسة</td>
<td>جنسية المالك</td>
<td>تاريخ تجديد الترخيص</td>
<td>تاريخ انتهاء الترخيص</td>
<td>العام الدراسي للافتتاح</td>

                        </tr>
                    </thead>
                    <tbody id="dataSchools">
          
          </tbody>

                </table>
            </div>


             <!--Modal Form-->
             <div class="modal fade"  id="dataSchoolModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>

                    <!-- <h4 class="modal-title ">أضافة صلاحيات ومسئوليات تنظيمية لموظف</h4> -->
                </div>

                <div class="modal-body">

                    <form  id="form-schoolData">

                    <input type="hidden" id="noSchool">

                        <div class="d-flex flex-column  gap-3">

                            <div>
           
                            <div class="mb-3">
    <label for="id">رمز المدرسة</label>
         <input type="text" id="school_id"  class="form-control">
     </div>
     
     <div class="mb-3">
     <label>نوع المدرسة الروضة</label>
         <select id="school_type" class="form-control" required>
             <option value=""></option>
             <option >للتعليم المبكر</option>
             <option value="مدرسة أجنبية">مدرسة أجنبية</option>
             <option value="مدرسة خاصة">مدرسة خاصة</option>
             <option value="مدرسة عالمية">مدرسة عالمية</option>
             <option value="مدرسة دولية">مدرسة دولية</option>
       
         </select>
     </div>
     
     <div class="mb-3">
     <label>أسم المدرسة الخاصة</label>
         <input type="text" id="school_name" required class="form-control">
     </div>
     
     <div class="mb-3">
     <label>الولاية</label>
         <select id="wilaya" required class="form-control">
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
         <input type="text" id="location" required class="form-control">
     </div>

     <div class="mb-3">
     <label>حاله المدرسة</label>
         <select id="school_status" class="form-control">
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
         <input type="text" id="phone" class="form-control">
     </div>

     <div class="mb-3">
     <label>البريد الالكتروني</label>
         <input type="email" id="email" class="form-control">
     </div>



     
    
     
     <div class="mb-3">
     <label>رقم السجل التجاري</label>
         <input type="text" id="commercial_number" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>نوع البرنامج التعليمي المعتمد</label>
         <select id="program_type" class="form-control">
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
         <select id="owner_bulding" class="form-control">
             <option value=""></option>
             <option value="مستأجر">مستأجر</option>
             <option value="ملك">ملك</option>
             <option value="مشيد">مشيد</option>
             <option value="أستثمار">أستثمار</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>نوع نظام التقويم</label>
         <select id="celender" class="form-control">
             <option value=""></option>
             <option value="الوزارة">الوزارة</option>
             <option value="خاص">خاص</option>
         </select>
     </div>
     
     <div class="mb-3">
     <label>أدنى صف</label>
         <select id="low_class" class="form-control" id="classlow-select">
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

       

     </div>
     
     <div class="mb-3">
     <label>أعلى صف مشغل</label>
         <!-- <input type="text" name="classhi_txt" class="form-control"> -->
         <select id="high_class" class="form-control">
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
     
 
     
     <div class="mb-3">
     <label>مالك / ملاك المدرسة</label>
         <input type="text" id="owner_school" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>جنسية المالك</label>
         <input type="text" id="owner_national" class="form-control">
     </div>

     
     <div class="mb-3">
     <label>تاريخ تجديد / اصدار الترخيص</label>
         <input type="date" id="renew_date_approval" class="form-control">
     </div>
     
     <div class="mb-3">
     <label>تاريخ انتهاء الترخيص</label>
         <input type="date" id="expired_date_approval" class="form-control">
     </div>
     
    
   
     
     <div class="mb-3">
     <label>العام الدراسي للافتتاح (التشغيل) سنه التأسيس</label>
         <!-- <input type="text" name="start_txt" class="form-control"> -->

         <select  id="year_start"  class="form-control">

         <option></option>
         </select>

    <script>
        const select = document.getElementById('year_start');
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
                        
                        </div>

                </div>

                <div class="modal-footer d-flex justify-content-start">
                    <button type="submit"  class="btn btn-primary submit">ارسال</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </form>

                </div>
            </div>
        </div>
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




<script>


$(document).ready(function() { 
    loadSchool();

    // إضافة مستخدم جديد أو تعديل مستخدم
    $('#form-schoolData').on('submit', function(e) {
        e.preventDefault();
        let number = $('#noSchool').val();
        let school_id = $('#school_id').val();
        let school_type = $('#school_type').val();
        let school_name = $('#school_name').val();
        let wilaya = $('#wilaya').val();
        let location = $('#location').val();
        let school_status = $('#school_status').val();
        let phone = $('#phone').val();
        let email = $('#email').val();
        let commercial_number = $('#commercial_number').val();
        let program_type = $('#program_type').val();
        let owner_bulding = $('#owner_bulding').val();
        let celender = $('#celender').val();
        let low_class = $('#low_class').val();
        let high_class = $('#high_class').val();
        let owner_school = $('#owner_school').val();
        let owner_national = $('#owner_national').val();
        let renew_date_approval = $('#renew_date_approval').val();
        let expired_date_approval = $('#expired_date_approval').val();
        let year_start = $('#year_start').val();




        let action = number ? 'editSchool' : 'addSchool';
        
        $.ajax({
            url: 'schools_data/crud.php',
            type: 'POST',
            data: { 
                number: number, 
                school_id: school_id, 
                school_type: school_type, 
                school_name: school_name, 
                wilaya: wilaya, 
                location: location, 
                school_status: school_status, 
                phone: phone, 
                email: email, 
                commercial_number: commercial_number, 
                program_type: program_type, 
                owner_bulding: owner_bulding, 
                celender: celender, 
                low_class: low_class, 
                high_class: high_class, 
                owner_school: owner_school, 
                owner_national: owner_national, 
                renew_date_approval: renew_date_approval, 
                expired_date_approval: expired_date_approval, 
                year_start: year_start, 

                [action]: true 
            },
            success: function(response) {
                $('#dataSchoolModal').modal('hide');
                loadSchool();
            },

            error: function(xhr, status, error) {
        console.error("Error:", xhr.responseText);  // Check if there's a specific error from the server
        alert("Failed to insert data. Check console for details.");
    }
        });
    });
});


// تحميل المستخدمين
// تحميل المستخدمين
function loadSchool() {
    $.ajax({
        url: 'schools_data/crud.php',
        type: 'GET',
        data: { getSchools: true },
        success: function(response) {
            let schools = JSON.parse(response);
            let html = '';
            schools.forEach((school, index) => {
                html += `<tr>

                <td class="d-flex">
                        <button class="btn btn-warning btn-sm" 
                            onclick="editSchool(
                               '${school.number}', '${school.school_id}', '${school.school_type}', '${school.school_name.replace(/'/g, "&apos;").replace(/"/g, "&quot;")}', 
'${school.wilaya}', '${school.location}', '${school.school_status}', 
'${school.phone}', '${school.email}', '${school.commercial_number}', 
'${school.program_type}', '${school.owner_bulding}', '${school.celender}', 
'${school.low_class}', '${school.high_class}', '${school.owner_school}', 
'${school.owner_national}', '${school.renew_date_approval}', 
'${school.expired_date_approval}', '${school.year_start}'

                            )">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                        <button class="btn btn-danger btn-sm mr-2" onclick="deleteSchool(${school.number})">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </td>
                    <td>${school.number}</td>
                    <td>${school.school_id}</td>
                    <td>${school.school_type}</td>
                    <td>${school.school_name}</td>
                    <td>${school.wilaya}</td>
                    <td>${school.location}</td>
                    <td>${school.school_status}</td>
                    <td>${school.phone}</td>
                    <td>${school.email}</td>
                    <td>${school.commercial_number}</td>
                    <td>${school.program_type}</td>
                    <td>${school.owner_bulding}</td>
                    <td>${school.celender}</td>
                    <td>${school.low_class}</td>
                    <td>${school.high_class}</td>
                    <td>${school.owner_school}</td>
                    <td>${school.owner_national}</td>
                    <td>${school.renew_date_approval}</td>
                    <td>${school.expired_date_approval}</td>
                    <td>${school.year_start}</td>
                    
                </tr>`;
            });
            $('#dataSchools').html(html);
        }
    });
}

// تعديل مستخدم
function editSchool(
    number, school_id, school_type,school_name, wilaya, location, school_status, 
phone, email, commercial_number, program_type, owner_bulding, celender, low_class, 
high_class, owner_school, owner_national, renew_date_approval, expired_date_approval, 
year_start
) {
    // Populate the form fields with the data received
    $('#noSchool').val(number);              // Matches `school.number`
$('#school_id').val(school_id);
$('#school_type').val(school_type);
$('#school_name').val(school_name);
$('#wilaya').val(wilaya);
$('#location').val(location);
$('#school_status').val(school_status);
$('#phone').val(phone);
$('#email').val(email);
$('#commercial_number').val(commercial_number);
$('#program_type').val(program_type);
$('#owner_bulding').val(owner_bulding);
$('#celender').val(celender);
$('#low_class').val(low_class);
$('#high_class').val(high_class);
$('#owner_school').val(owner_school);
$('#owner_national').val(owner_national);
$('#renew_date_approval').val(renew_date_approval);
$('#expired_date_approval').val(expired_date_approval);
$('#year_start').val(year_start);


    // Show the modal
    $('#dataSchoolModal').modal('show');
}


function deleteSchool(number) {
    if (confirm('هل أنت متأكد أنك تريد الحذف ؟  ')) {
        $.ajax({
            url: 'schools_data/crud.php',
            type: 'POST',
            data: { deleteSchool: true, number: number },
            success: function(response) {
                loadSchool();
            }
        });
    }
}

// إعادة تعيين النموذج
function clearForm() {
    $('#form-schoolData')[0].reset();

}



</script>

