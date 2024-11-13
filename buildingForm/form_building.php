<?php




if(isset($_POST['submit']))

{
    $date=$_POST['date_txt'];
$day=$_POST['day_txt'];
$request=$_POST['request_txt'];
$number_register=$_POST['number_register_txt'];
$number_accept=$_POST['number_accept_txt'];
$number_request=$_POST['number_request_txt'];
$name_request=$_POST['name_request_txt'];
$phone=$_POST['phone_txt'];
$programe=$_POST['programe_txt'];
$name_school=$_POST['name_school_txt'];

$type_school=$_POST['type_school_txt'];
if(!empty($_POST['date_expired_txt']))
{
$date_expired=$_POST['date_expired_txt'];

} 
else{
    $date_expired = null; // or set a default date

}

$name_owner=$_POST['name_owner_txt'];
$wilaya=$_POST['wilaya_txt'];
$quiria=$_POST['quiria_txt'];
$number_place=$_POST['number_place_txt'];
$square=$_POST['square_txt'];
$space=$_POST['space_txt'];
$floorCount=$_POST['floor_txt'];

// File Request 
$request_ownerF=$_POST['request_ownerF'];
$land_ownerF=$_POST['land_ownerF'];
$croqueF=$_POST['croqueF'];
$letter_ownerF=$_POST['letter_ownerF'];
$letter_allowedF=$_POST['letter_allowedF'];
$copy_approveF=$_POST['copy_approveF'];
$plansF=$_POST['plansF'];
$paymentF=$_POST['paymentF'];

// Total Room 
$countWC=$_POST['countWC'];
$countStudentsAll=$_POST['countStudentsAll'];
$noteCountStudentsAll=$_POST['noteCountStudentsAll'];
$heightOut=$_POST['heightOut'];
$wdithOut=$_POST['wdithOut'];
$hallSpaceOut=$_POST['hallSpaceOut'];
$heightGame=$_POST['heightGame'];
$wdithGame=$_POST['wdithGame'];
$hallSpaceGame=$_POST['hallSpaceGame'];
$countClassRoom=$_POST['countClassRoom'];
// ---------

$accept_visit=$_POST['accept_visit'];


$reasons_not_accept_visit=$_POST['reasons_not_accept_visit'];

// if (isset($_POST['reasons_not_accept_visit'])) {
//     echo $reasons_not_accept_visit;
// } else {
//     echo "";
// }

$accept_department=$_POST['accept_department'];
$reasons_not_accept_dep=$_POST['reasons_not_accept_dep'];

// if (isset($_POST['reasons_not_accept_dep'])) {
//     echo $reasons_not_accept_dep;
// } else {
//     echo "";
// }
//--------
$type_school_license=$_POST['type_school_license'];
$license_fee=$_POST['license_fee'];
$secuirtyValue=$_POST['secuirtyValue'];
$compleating_invest=$_POST['compleating_invest'];
$selectedValues = $_POST['myCheckbox'];
$valuesString = implode(",", $selectedValues);
// -------------------------//

$devicePairs = $_POST["devicePairs"];
$devicePairs2 = $_POST["devicePairs2"];
$devicePairs3 = $_POST["devicePairs3"];



$sql="insert into schools_buldinge(day,date,request,number_register,number_accept,number_request,name_request,phone,programe,name_school,type_school,date_expired,name_owner,wilaya,quiria,number_place,square,space,floor,request_ownerF,land_ownerF,croqueF,letter_ownerF,letter_allowedF,copy_approveF,plansF,paymentF,countWC,countStudentsAll,noteCountStudentsAll,heightOut,wdithOut,hallSpaceOut,heightGame,wdithGame,hallSpaceGame,countClassRoom,accept_visit,reasons_not_accept_visit,accept_department,reasons_not_accept_dep,type_school_license,license_fee,secuirtyValue,compleating_invest,invest_platform,report_writer) values('$day','$date','$request','$number_register','$number_accept','$number_request','$name_request','$phone','$programe','$name_school','$type_school','$date_expired','$name_owner','$wilaya','$quiria','$number_place','$square','$space','$floorCount','$request_ownerF','$land_ownerF','$croqueF','$letter_ownerF','$letter_allowedF','$copy_approveF','$plansF','$paymentF','$countWC','$countStudentsAll','$noteCountStudentsAll','$heightOut','$wdithOut','$hallSpaceOut','$heightGame','$wdithGame','$hallSpaceGame','$countClassRoom','$accept_visit','$reasons_not_accept_visit','$accept_department','$reasons_not_accept_dep','$type_school_license','$license_fee','$secuirtyValue','$compleating_invest','$valuesString','$report_writer')";
$result = $pdo->query($sql);
$lastInsertId = $pdo->lastInsertId();


foreach ($devicePairs as $pair) {

    $floor = $pair["floor"];
    $hall = $pair["hall"];
    $height = $pair["height"];

    $width = $pair["width"];
    $hall_space = $pair["hall_space"];
    $wc = $pair["w_c"];

    $type_of_use = $pair["type_of_use"];
    $hall_capacity = $pair["hall_capacity"];
    $notes = $pair["notes"];

  

    
$sql_comp = "INSERT INTO building_components(floor,hall,height,width,hall_space,w_c,type_of_use,hall_capacity,notes,building_number) VALUES('$floor','$hall','$height','$width','$hall_space','$wc','$type_of_use','$hall_capacity','$notes','$lastInsertId')";


$sql_res = $pdo->query($sql_comp);

}

foreach ($devicePairs2 as $pair2) {

    $name = $pair2["name"];
    $position = $pair2["position"];
 


  

    
$sql_visit = "INSERT INTO visit_staff_building(building_number,name,position) VALUES('$lastInsertId','$name','$position')";
$sql_resV = $pdo->query($sql_visit);

}


foreach ($devicePairs3 as $pair3) {

    $recommendation = $pair3["recommendation"];
 

$sql_recom= "INSERT INTO recommendations_building(building_number,recommendation) VALUES('$lastInsertId','$recommendation')";
$sql_res_recom = $pdo->query($sql_recom);

}

if($result) 
{
    echo "<script>
    alert('تم تسجيل البيانات بنجاح');
    window.location='main.php';
    </script>";

    exit();

}



}
?>



    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Icons-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<section class="sec-31" style="display: none;">
    
<div class="text-center mt-">
    <h6>قسم التراخيص</h6>
    <h6>تقرير معاينة مبنى</h6>
</div>
<!-- <a href="main.php" class="main-btn btn btn-info btn-lg  " ><ion-icon name="home-outline"></ion-icon></a> -->

<form method="post" action="">

<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span></span>
                    </div>
                </div>

                <div id="collapseOne" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->


                        <!-- Date -->
                        <div class="form-group">
                            <label for="date" class="align-label-end">التاريخ</label>
                            <input type="date" class="form-control" name="date_txt"  id="datevisit" onchange="displayDayOfWeek()">
                        </div>

                        <div class="form-group ">
                            <label for="day" class="align-label-end">اليوم</label>
                            <input type="text" class="form-control" id="dayOfWeek" name="day_txt" readonly>
                        </div>
                
                        
                        <!-- Type of Request -->
                       <div class="form-group">
    <label for="requestType" class="align-label-end">نوع الطلب</label>
    <select class="form-control"  name="request_txt">
        <option></option>
        <option >زيارة مبنى جديد</option>
        <option >زيارة نقل موقع</option>
    </select>
</div>

                        <!-- Registration Number -->
                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">رقم القيد</label>
                            <input type="text" class="form-control" name="number_register_txt">
                        </div>
                        <!-- Delay Approval Number -->
                        <div class="form-group">
                            <label for="delayApprovalNumber" class="align-label-end">رقم موافقة التأجيل</label>
                            <input type="text" class="form-control"  name="number_accept_txt">
                        </div>
                        <!-- Exemption Request Number -->
                        <div class="form-group">
                            <label for="exemptionRequestNumber" class="align-label-end">رقم طلب الاستثناء</label>
                            <input type="text" class="form-control"  name="number_request_txt">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        
</div>





<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse2" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>البيانات الأساسية</span>
                    </div>
                </div>

                <div id="collapse2" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->


                        <!-- Date -->
                        <div class="form-group">
                            <label for="date" class="align-label-end">اسم صاحب الطلب(مالك المدرسة)</label>
                            <input type="text" class="form-control" required name="name_request_txt">
                        </div>

                        <div class="form-group ">
                            <label for="day" class="align-label-end">رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone_txt" >
                        </div>
                
                        
  

                        <!-- Registration Number -->
                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end"> لمسمى المعتمد للروضة / المدرسة </label>
                            <input type="text" required class="form-control" name="name_school_txt">
                            <select class="form-control"  name="type_school_txt">
                            <option></option>

                                <option>للتعليم المبكر (روضة) </option>
                                <option>للتعليم المبكر (تعليم القرآن الكريم)</option>
                                <option>الدولية الخاصة</option>
                                <option>بصحار / الطريف</option>
                                <option>فرع / للتعليم المبكر (روضة)</option>
                                <option>فرع / للتعليم المبكر (تعليم القرآن الكريم) </option>
                                </select>
                     
                        </div>

                                              <!-- Type of Request -->
                       <div class="form-group">
                        <label for="requestType" class="align-label-end">نوع البرنامج</label>
                        <select class="form-control" name="programe_txt">
                        <option></option>

                            <option >احادي اللغة</option>
                            <option >ثنائي اللغة</option>
                            <option >احادي اللغة وثنائي اللغة</option>
                            <option >برنامج دولي</option>
                        </select>
                    </div>
                        <!-- Delay Approval Number -->
                        <div class="form-group">
                            <label for="delayApprovalNumber" class="align-label-end">تاريخ انتهاء الموافقة المبدئية</label>
                            <input type="date" class="form-control" name="date_expired_txt">
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>



<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse3" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>بيانات المبنى</span>
                    </div>
                </div>

                <div id="collapse3" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->


                        <!-- Date -->
                        <div class="form-group">
                            <label for="date" class="align-label-end">اسم مالك المبنى</label>
                            <input type="text" class="form-control" name="name_owner_txt">
                        </div>

                        <div class="form-group">
                            <label for="requestType" class="align-label-end">الولاية</label>
                            <select class="form-control" name="wilaya_txt">
                                <option></option>
                                <option>صحار</option>
                                <option>شناص</option>
                                <option>لوى</option>
                                <option>صحم</option>
                                <option>الخابورة</option>
                                <option>السويق</option>
                            </select>
                        </div>
                
                        
  

                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">القرية</label>
                            <input type="text" class="form-control" name="quiria_txt">
                        </div>

                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">رقم القطعة</label>
                            <input type="text" class="form-control" name="number_place_txt">
                        </div>


                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">المربع</label>
                            <input type="text" class="form-control" name="square_txt">
                        </div>

                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">مساحة القطعة</label>
                            <input type="text" class="form-control" name="space_txt">
                        </div>

                        <div class="form-group">
                            <label for="registrationNumber" class="align-label-end">عدد الطوابق</label>
                            <input type="text" class="form-control" name="floor_txt">
                        </div>

                    
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>



<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse4" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>المستندات المطلوبة</span>
                    </div>
                </div>

                <div id="collapse4" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->


                    

                        <div class="form-group">
                            <label for="requestType" class="align-label-end">طلب مالك المدرسة لمعاينة المبنى</label>
                            <select class="form-control" name="request_ownerF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>
                
                        
  

                        <div class="form-group">
                            <label for="requestType" class="align-label-end">ملكية الأرض</label>
                            <select class="form-control" name="land_ownerF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="requestType" class="align-label-end">الكروكي</label>
                            <select class="form-control" name="croqueF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="requestType" class="align-label-end">رسالة مالك العقار</label>
                            <select class="form-control" name="letter_ownerF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>

                      <div class="form-group">
                            <label for="requestType" class="align-label-end">رسالة عدم ممانعة الجيران</label>
                            <select class="form-control" name="letter_allowedF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>


                         <div class="form-group">
                            <label for="requestType" class="align-label-end">نسخة الترخيص/ الموافقة المبدئية</label>
                            <select class="form-control" name="copy_approveF" >
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="requestType" class="align-label-end">المخططات المعمارية</label>
                            <select class="form-control" name="plansF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="requestType" class="align-label-end">استمارة الدفع</label>
                            <select class="form-control" name="paymentF">
                            <option></option>

                                <option>نعم</option>
                                <option>لا</option>
                                <option>-</option>
                            </select>
                        </div>
                    
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>


<!-- ------------------------------------------------------------------------ -->


<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse5" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>مكونات المبنى</span>
                    </div>
                </div>

                <div id="collapse5" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->
                        <table class="table table-bordered table-hover main-table tbl-comp" >
                            <thead class="thead-light">
                              <tr>
                                <th>الطابق</th>
                                <th>القاعة</th>
                                <th colspan="2" class="text-center">
                                  أبعاد القاعة
                                  <div class="row">
                                    <div class="col">
                                      <span>الطول</span>
                                    </div>
                                    <div class="col">
                                      <span>العرض</span>
                                    </div>
                                  </div>
                                </th>
                                <th>مساحة القاعة</th>
                                <th colspan="2" class="text-center">
                                  مع دورة مياه خاصة
                                  <div class="row">
                                    <div class="col">
                                      <span>نعم</span>
                                    </div>
                                    <div class="col">
                                      <span>لا</span>
                                    </div>
                                  </div>
                                </th>
                                <th>نوع الأستخدام</th>
                                <th>سعة القاعة</th>
                                <th>ملاحظات</th>
                              </tr>
                            </thead>
                            <tbody id="deviceCount">
                              <tr>
                                <td>
                                    <select name="devicePairs[0][floor]" class="form-control"  >
                                    <option></option>

                                          <option>أرضي</option>
                                          <option >الأول</option>
                                          <option >الثاني</option>
                                          <option >ملحق</option>
                                        </select>
                                </td>
                                <td  ><input type="text" name="devicePairs[0][hall]" class="form-control" readonly  value="غرفة 1"></td>
                                <td ><input type="text"  name="devicePairs[0][height]" class="form-control  height"  ></td>
                                <td  ><input type="text" name="devicePairs[0][width]" class="form-control width" ></td>
                                <td  ><input type="text" name="devicePairs[0][hall_space]" class="form-control hallSpace" readonly></td>
                                <td   colspan="2">
                                    <select name="devicePairs[0][w_c]" class="form-control wc"  >
                                                                                  <option></option>

                                      <option>نعم</option>
                                      <option >لا</option>
                                   
                                    </select>
                                </td>
                                <td  >
                                <select name="devicePairs[0][type_of_use]" class="form-control typeUse"  >
                                <option></option>

                                <option>الإدارة المدرسية</option>
  <option>الاستقبال</option>
  <option>مصادر تعلم وحاسب آلي</option>
  <option>مصادر تعلم</option>
  <option>حاسب آلي</option>
  <option>الصحة المدرسية</option>
  <option>الصحة المدرسية وقاعة المعلمات</option>
  <option>قاعة المعلمات</option>
  <option>مختبر 1</option>
  <option>مختبر 2</option>
  <option>مختبر 3</option>
  <option>قاعة دراسية</option>
  <option>الجمعية التعاونية</option>
  <option>قاعة طعام</option>
  <option>مخزن</option>
  <option>قاعة متعددة الأغراض</option>
  <option>غرفة حارس</option>
  <option>قاعة الفنون التشكيلية</option>
  <option>قاعة الموسيقى</option>
  <option>قاعة رياضة</option>
  <option>قاعة التنسيق والمتابعة</option>


                   
                    </select>
                                </td>
                                <td  ><input type="text" name="devicePairs[0][hall_capacity]" class="form-control countStudents" readonly></td>
                                <td  ><input type="text" name="devicePairs[0][notes]" class="form-control" ></td>
                              
                            </tr>
                              <!-- Add more rows as needed -->
                            </tbody>


<!-- this last row in table start -->
                            <tbody class="bg-light">
                              <tr>
                                <td >
                                    المجموع
                                </td>
                                <td  ></td>
                                <td ></td>
                                <td  ></td>
                                <td  ></td>
                                <td   colspan="2">
                                <input type="text" name="countWC" class="form-control countWC" readonly>
                                </td>
                                <td  >
                                
                                </td >
                                <td class="d-flex" ><input type="text" name="countStudentsAll" readonly class="form-control countStudentsAll" ><span class="mr-1">طالب</span></td>
                                <td ><input type="text" name="noteCountStudentsAll"  class="form-control "  ></td>
                              
                            </tr>
                            </tbody>

                            <!-- this last row in table end -->

                          </table>
                          <button type="button" onclick="addDevicePair()" class="btn btn-success">أضافة </button>


                        
                    </div>
                    <!-- هنا الجدول الثاني التابع  -->
                    <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th>أبعاد الساحة الخارجية للمبنى(الطولxالعرض)</th>
                                <th><input type="text" name="heightOut" class="form-control heightOut" ></th>
                                <th >
                                <input type="text" name="wdithOut" class="form-control wdithOut" >
                                </th>
                                <th> <input type="text" name="hallSpaceOut" readonly class="form-control hallSpaceOut" ></th>
                            </tr>
                            <tr>

                                <th>
                                 ساحة الألعاب
                                </th>
                                <th><input type="text" name="heightGame" class="form-control heightGame" ></th>
                                <th >
                                <input type="text" name="wdithGame" class="form-control wdithGame" >
                                </th>
                                <th> <input type="text" readonly name="hallSpaceGame" class="form-control hallSpaceGame" ></th>
                                <th>
                                </tr>

                              <tr>
                                <th>إجمالي القاعات التي تصلح كقاعات صفية</th>
                                <th colspan="8"><input type="text" name="countClassRoom" readonly class="form-control countClassRoom" ></th>
                           
                              </tr>

                              
                              <tr>
                                <th>إجمالي عدد دورات المياه</th>
                                <th colspan="8"><input type="text" name="" readonly class="form-control countWC" ></th>
                           
                              </tr>
                            </thead>
</table>
                </div>
            </div>

        </div>

        
</div>


<!-- ------------------------------------------------------------------------ -->


<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse6" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>رأي اللجنة الزائرة</span>
                    </div>
                </div>

                <div id="collapse6" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->



                         <div class="form-group">
                            <label for="requestType" class="align-label-end">رأي اللجنة الزائرة </label>
                            <select class="form-control" id="visitApprove" name="accept_visit"  onchange="toggleReasonField('visit')">
                            <option></option>   
                            <option>الموافقة</option>
                                <option>عدم الموافقة</option>
                            </select>
                        </div>


                        <div class="form-group notAcceptVisit" style="display: none;">
                            <label for="day" class="align-label-end textAccept">الأسباب الرئيسية لعدم الموافقة</label>
                         <textarea name="reasons_not_accept_visit"  cols="20" rows="5" class="form-control" ></textarea>
                        </div>
                     
                    
                        <!-- <div class="form-group acceptVisit" style="display: none;">
                            <label for="day" class="align-label-end">ملاحظات</label>
                         <textarea name="note_accept_visit"  cols="20" rows="5" class="form-control" ></textarea>
                        </div> -->
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>

<!-- ------------------------------------------------------------------------ -->

<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse7" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>اللجنة الزائرة</span>
                    </div>
                </div>

                <div id="collapse7" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->
                        <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th>م</th>
                                <th>الاسم</th>
                             
                              
                                <th>الوظيفة</th>
                               
                              </tr>
                            </thead>
                            <tbody id="nameVisit">
                              <!-- <tr>
                               
                                <td contenteditable="true"><input type="text"  name="" value="1" readonly class="form-control " ></td>
                                <td>
                                <select class="form-control" name="devicePairs2[0][name]">
                                <option></option>
                                <option>حمد بن سالم المعمري</option>
  <option>احمد بن مبارك البلوشي</option>
  <option>عبدالله المعمري</option>
  <option>المهندس سالم الشيدي</option>
  <option>علي عبدالحسين العجمي</option>
  <option>ناصر عبدالله ال عبدالسلام</option>
  <option>محمد ناصر الشبلي</option>
  <option>عبدالباقي يوسف الخوري</option>
  <option>محمد راشد القريني</option>
  <option>سعيد علي الريسي</option>
  <option>احمد العجمي</option>
  <option>هلال حمد المنصوري</option>
  <option>احمد الحوسني</option>
  <option>نايف المعمري</option>
  <option>عفراء سالم المعمري</option>
  <option>المهندس أمجد الكندي</option>
  <option>المهندس أحمد الخروصي</option>
  <option>المهندس عمار عيسى</option>
  <option>المهندس صالح حسين صالح علي</option>
  <option>صالح سليم البادي</option>

                            </select>
                            </td>
                                <td contenteditable="true" ><input type="text" name="devicePairs2[0][position]" class="form-control " ></td>
                               
                              
                            </tr> -->
                              <!-- Add more rows as needed -->
                            </tbody>
                          </table>
                          <button type="button" onclick="addDevicePair2()" class="btn btn-success">أضافة </button>


                        
                    </div>
                
                </div>
            </div>

        </div>

        
</div>

<!-- ------------------------------------------------------------------------ -->


<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse8" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>رأي الدائرة</span>
                    </div>
                </div>

                <div id="collapse8" class="collapse">
                    <div class="card-body">
                        <!-- Inputs for Container 1 -->



                         <div class="form-group">
                            <select class="form-control" id="departmentApprove" name="accept_department"  onchange="toggleReasonField('department')">
                                <option>الموافقة</option>
                                <option>عدم الموافقة</option>
                            </select>
                        </div>


                        <div class="form-group notAcceptDepartment" style="display: none;">
                            <label for="day" class="align-label-end">الأسباب الرئيسية لعدم الموافقة</label>
                         <textarea name="reasons_not_accept_dep"  cols="20" rows="5" class="form-control" ></textarea>
                        </div>
                     
                    
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>



<!-- ------------------------------------------------------------------------ -->




<!-- ------------------------------------------------------------------------ -->


<div class="container mt-5">
        <!-- Each card is a container -->
        <div id="accordion">
            <!-- Container 1 -->
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <!-- Left Spacer -->
                    <div class=" ml-4">
                        <a href="#collapse10" data-toggle="collapse" data-parent="#accordion">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                
                    <!-- Center Text -->
                    <div class=" ">
                        <span>التوصيات لمالك المدرسة لتنفيذها </span>
                    </div>
                </div>

                <div id="collapse10" class="collapse">
                    <div class="card-body">
                    <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th>م</th>
                                <th class="align-label-end">البيان</th>
                             
                              
                               
                              </tr>
                            </thead>
                            <tbody id="Recommendations">
                              <tr>
                               
                                <td >1</td>
                                <td class="align-label-end">عمل سارية للعلم في الموقع المحدد أثناء الزيارة بارتفاع 12 متر حسب المواصفات والمقاييس</td>
                            
                            </tr>

                            <tr>
                               
                               <td >2</td>
                               <td class="align-label-end">توفير جهاز استشعار الحريق وعمل مخارج ولوحات للطوارئ.</td>
                           
                           </tr>
                           <tr>
                               
                               <td >3</td>
                               <td class="align-label-end">التواصل مع قسم التعليم المبكر بشأن المناهج والتأثيث </td>
                           
                           </tr>

                           <tr>
                               
                               <td >4</td>
                               <td class="align-label-end">عمل مغاسل في دورات المياه تتناسب مع أعمار الطلبة أو وضع أرفف خشبية تتناسب مع أطوال الطلاب</td>
                           
                           </tr>

                           <tr>
                               
                               <td >5</td>
                               <td class="align-label-end">تجهيز الجمعية التعاونية حسب الاشتراطات الصحية</td>
                           
                           </tr>

                           <tr>
                               
                               <td >6</td>
                               <td class="align-label-end">تهئية وتوفير مستلزمات غرفة الصحية المدرسية</td>
                           
                           </tr>

                           <tr>
                               
                               <td >7</td>
                               <td class="align-label-end">عمل مظلة لساحة الطابور وساحة الألعاب وفرش ساحة الألعاب بطبقة آمنة(اسفنج، ترتان...إلخ)</td>
                           
                           </tr>

                           <tr>
                               
                               <td >8</td>
                               <td class="align-label-end">زيادة الإضاءة في جميع المرافق بما يتناسب مع مساحة كل مرفق، وضرورة تركيب المصابيح على السقف وليس الجدران الجانبية</td>
                           
                           </tr>

                           <tr>
                               
                               <td >9</td>
                               <td class="align-label-end">توفير صور صاحب الجلالة بكل الفصول بحيث تكون أعلى السبورة بنصف متر،وإضافة مصباح أعلى السبورة مع الواقي له مقاس 4 قدم</td>                           
                           </tr>

                           
                           <tr>
                               
                               <td >10</td>
                               <td class="align-label-end">ضرورة موافاتنا بتقرير الدفاع المدني (تقرير عن سلامة المنشأة من جهات الاختصاص) وتوفير طفايات حريق.</td>                           
                           </tr>


                           
                           <tr>
                               
                               <td >11</td>
                               <td class="align-label-end">تغطية صناديق توزيع الكهرباء بالألمنيوم أو خشبm d f .</td>                           
                           </tr>


                             
                           <tr>
                               
                               <td >12</td>
                               <td class="align-label-end">توفير صاعقات حشرات عدد (2).</td>
                           </tr>

                              
                           <tr>
                               
                               <td >13</td>
                               <td class="align-label-end">تجهيز غرفة المعلمات بالمكاتب والأرفف لخدمة المعلمات.</td>
                           </tr>
   
                           <tr>
                               
                               <td >14</td>
                               <td class="align-label-end">تبطين جزء من قاعات رياض الأطفال بمساحة (2×3)م .</td>
                           </tr>
   
                           <tr>
                               
                               <td >15</td>
                               <td class="align-label-end">فتح نوافذ للقاعات الدراسية وعمل حماية للنوافذ</td>
                           </tr>
   
                           <tr>
                               
                               <td >16</td>
                               <td class="align-label-end">عمل بلاستيك لحامي الدرج داخل المبنى،  أو تضييق فتحات حامي الدرج الإساسي</td>
                           </tr>
   
                           <tr>
                               
                               <td >17</td>
                               <td class="align-label-end">تجهيز غرفة مصادر التعلم بالاجهزة والوسائل التعليمية</td>
                           </tr>
   
                           <tr>
                               
                               <td >18</td>
                               <td class="align-label-end">لا يُسمح للمدرسة بعمل أي إضافات بالمبنى المدرسي دون موافقة الوزارة (بناء قاعات دراسية أو غيره).</td>
                           </tr>
   
                           <tr>
                               
                               <td >19</td>
                               <td class="align-label-end">لا يقل إرتفاع حامي الدرج  عن متر و 50 سم</td>
                           </tr>
   
                           <tr>
                               
                               <td >20</td>
                               <td class="align-label-end">تعيين الهيئة الإدارية والتدريسية بشكل رسمي قبل بدء العام الدراسي 2022/2023 م</td>
                           </tr>
   
                           <tr>
                               
                               <td >21</td>
                               <td class="align-label-end"> ** التقيد بما ورد في التعميم الصادر بتاريخ 20/5/2019م برقم قيد 2819153836. بشأن الكثافة العددية والحد الأدنى والأعلى للشعبة الدراسية </td>
                           </tr>
   
                           <tr>
                               
                               <td >22</td>
                               <td class="align-label-end">ضرورة توفير مواقف للسيارات والحافلات وتأمين دخول وخروج الطلاب والمعلمين. </td>
                           </tr>
   
                           <tr>
                               
                               <td >23</td>
                               <td class="align-label-end">فرش الساحة بالترتان</td>
                           </tr>
   
                           <tr>
                               
                               <td >24</td>
                               <td class="align-label-end">تبيطين الدرج الخارجي امام المبنى وخلف المبنى وداخل المبنى</td>
                           </tr>

                           <tr>
                               
                               <td >25</td>
                               <td class="align-label-end">إغلاق المنطقة تحت الدرج</td>
                           </tr>


                           <tr>
                               
                               <td >26</td>
                               <td class="align-label-end">عمل حاجز للدرج داخل المبنى بارتفاع 1.8م</td>
                           </tr>    
                           
                           <tr>
                               
                               <td >27</td>
                               <td class="align-label-end">إغلاق الطريق المؤدي إلى السطح</td>
                           </tr>


                           <tr>
                               
                               <td >28</td>
                               <td class="align-label-end">سارية العلم يكون من نوع فايبرجلاس</td>
                           </tr>

                           <tr>

                    
                               
                               <td >29</td>
                               <td class="align-label-end">

                               <div class="row">
                               <div class="col-md-6">

<h5>ضرورة موافاتنا بالمستندات المتعلقة إصدار ترخيص: </h5>
</div>

<div class="col-md-6">
<div class="form-group">
                            <select class="form-control" name="type_school_license">
                                <option></option>
                            <option>مدرسة للتعليم المبكر"روضة"</option>
  <option>مدرسة للتعليم المبكر"تعليم القرآن الكريم"</option>
  <option>مدرسة خاصة</option>
  <option>مدرسة دولية</option>
                            </select>
                        </div>
</div>

</div>

                               <div class="row">
        <div class="col-md-6">
            <div class="mb-3">1- رسالة طلب من مالك المدرسة بطلب إصدار ترخيص</div>
            <div class="mb-3">2- تعبئة استمارة طلب إصدار ترخيص</div>
            <div class="mb-3">3- نسخة من الموافقة المبدئية</div>
            <div class="mb-3">4-

<select class="form-control" name="license_fee">
<option></option>

<option>رسوم إصدار ترخيص مدرسة للتعليم المبكر"روضة" (100) ريالا عمانيا</option>
  <option>رسوم إصدار ترخيص مدرسة للتعليم المبكر"تعليم القرآن الكريم" (100) ريالا عمانيا</option>
  <option>رسوم إصدار ترخيص مدرسة خاصة (150) ريالا عمانيا</option>
  <option>رسوم إصدار ترخيص مدرسة دولية (000) ريالا عمانيا</option>
                            </select>


            </div>

            <div class="mb-3">5- صورة من البطاقة الشخصية للمالك</div>
            <div class="mb-3">6-
            <select class="form-control" name="secuirtyValue">
            <option></option>

            <option>الضمان المصرفي (5000) ريالا عماني</option>
  <option>الضمان المصرفي (7000) ريالا عماني</option>
  <option>الضمان المصرفي (10000) ريالا عماني</option>
                            </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">6- صورة فوتوغرافية لوحة المدرسة</div>
            <div class="mb-3">7- أوراق السجل التجاري كاملة</div>
            <div class="mb-3">8- صورة من الترخيص البلدي</div>
            <div class="mb-3">9- صورة من عقد الإيجار (إذا كان المبنى مستأجر)</div>
            <div class="mb-3">10- صورة من الحماية المدنية للمنشأة</div>
            <div class="mb-3">11- صورة من ملكية الأرض</div>
        </div>
    </div>
                               </td>
                           </tr>


                           <tr>
    <td>30</td>
    <td class="align-label-end">
        <div class="row">
            <div class="col-auto">التكرم باستكمال إجراءات</div>
            <div class="col">
                <select class="form-control" name="compleating_invest">
                    <option> </option>
                    <option>إصدار ترخيص</option>
                    <option>تجديد ترخيص</option>
                </select>
            </div>
        </div>
     
        المدرسة عبر منصة استثمر بسهولة وموافاتنا:       
        <div class="row">
        <div class="col-md-6">
        <div class="mb-3">

        <input type="checkbox" id="certificate" name="myCheckbox[]" value="شهادة الأنشطة التربوية">
<label for="certificate">شهادة الأنشطة التربوية</label>
<br>
<input type="checkbox" id="pay" name="myCheckbox[]" value="إيصال دفع الرسوم المقررة">

<label for="pay">إيصال دفع الرسوم المقررة</label>
<br>
<input type="checkbox" id="borderr" name="myCheckbox[]" value="إرفاق لوحة المدرسة الخارجية">

<label for="borderr">إرفاق لوحة المدرسة الخارجية</label>
<br>
<input type="checkbox" id="warreny" name="myCheckbox[]" value="إرفاق الضمان البنكي">

<label for="warreny">إرفاق الضمان البنكي</label>
<br>
<input type="checkbox" id="fees" name="myCheckbox[]" value="إستمارة الرسوم الدراسية">

<label for="fees">إستمارة الرسوم الدراسية</label>
<br>
<input type="checkbox" id="uniform" name="myCheckbox[]" value="الزي المدرسي">

<label for="uniform">الزي المدرسي</label>

            </div>
        </div>
    
    </td>
</tr>



                            </tbody>
                          </table>

                          <button type="button" onclick="addDevicePair3()" class="btn btn-success">أضافة  </button>
                    
                     
                    
                        
                    </div>
                </div>
            </div>

        </div>

        
</div>



<!-- ------------------------------------------------------------------------ -->




<div class="d-flex justify-content-center mt-4">
    <input type="submit" name="submit" class="btn btn-info" value="أرسال البيانات">
</div>

</form>

</section>
<!-- jQuery and Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
    .align-label-end {
        text-align: start; /* or 'right' if 'end' does not work as expected */
        display: block; /* to ensure the label takes the full width for proper alignment */
    }
</style>

<script>
        let no_room = 2;
        let index = 1;

        function addDevicePair() {
      const deviceCountTableBody = document.getElementById("deviceCount");
      const newDeviceRow = document.createElement("tr");
      newDeviceRow.innerHTML = `
     <td>
                                    <select name="devicePairs[${index}][floor]" class="form-control" required >
                                        <option></option>

                                          <option>أرضي</option>
                                          <option >الأول</option>
                                          <option >الثاني</option>
                                          <option >ملحق</option>
                                        </select>
                                </td>
                                <td  ><input type="text" name="devicePairs[${index}][hall]" class="form-control " readonly value="غرفة ${no_room}" required></td>
                                <td><input type="text"  name="devicePairs[${index}][height]"  class="form-control height" required></td>
                                <td><input type="text" name="devicePairs[${index}][width]" class="form-control width" required></td>
                                <td><input type="text" name="devicePairs[${index}][hall_space]" class="form-control hallSpace" ></td>
                                <td colspan="2"><select name="devicePairs[${index}][w_c]" class="form-control wc" required >
                                                            <option></option>

                                      <option>نعم</option>
                                      <option >لا</option>
                                   
                                    </select>
                                </td>
                                <td>
                                <select name="devicePairs[${index}][type_of_use]" class="form-control typeUse" required >
                                <option></option>

                      <option>الإدارة المدرسية</option>
<option>الاستقبال</option>
<option>مصادر تعلم وحاسب آلي</option>
<option>مصادر تعلم</option>
<option>حاسب آلي</option>
<option>الصحة المدرسية</option>
<option>الصحة المدرسية وقاعة المعلمات</option>
<option>قاعة المعلمات</option>
<option>مختبر 1</option>
<option>مختبر 2</option>
<option>مختبر 3</option>
<option>قاعة دراسية</option>
<option>الجمعية التعاونية</option>
<option>قاعة طعام</option>
<option>مخزن</option>
<option>قاعة متعددة الأغراض</option>
  <option>غرفة حارس</option>
  <option>قاعة الفنون التشكيلية</option>
  <option>قاعة الموسيقى</option>
  <option>قاعة رياضة</option>
  <option>قاعة التنسيق والمتابعة</option>
         
          </select>
                                </td>
                                <td><input type="text" name="devicePairs[${index}][hall_capacity]" class="form-control countStudents" readonly></td>
                                <td><input type="text" name="devicePairs[${index}][notes]" class="form-control" ></td>
                                <td><button type="button" onclick="removeDeviceRow(this)" class="btn btn-danger removeRow1">إزالة</button></td>

      `;
      deviceCountTableBody.appendChild(newDeviceRow);
      no_room++;
      index++;
        }

        function removeDeviceRow(button) {
      const rowToRemove = button.closest("tr");
      rowToRemove.remove();
      no_room--;

    }
</script>


<script>
//    let no_visit = 2;
// let indexVisit = 1;

let no_visit = 1;
let indexVisit = 0;
   function addDevicePair2() {
    const nameVisitTableBody = document.getElementById("nameVisit");
    const newDeviceRowVisit = document.createElement("tr");
    newDeviceRowVisit.innerHTML=`

    <td contenteditable="true"><input type="text"  name="" value="${no_visit++}" readonly class="form-control width" ></td>
                                <td contenteditable="true" >
                                <select class="form-control" name="devicePairs2[${indexVisit}][name]">
                                <option></option>
                                <option>حمد بن سالم المعمري</option>
  <option>احمد بن مبارك البلوشي</option>
  <option>عبدالله المعمري</option>
  <option>المهندس سالم الشيدي</option>
  <option>علي عبدالحسين العجمي</option>
  <option>ناصر سعيد ال عبدالسلام</option>
  <option>محمد ناصر الشبلي</option>
  <option>عبدالباقي يوسف الخوري</option>
  <option>محمد راشد القريني</option>
  <option>سعيد علي الريسي</option>
  <option>احمد العجمي</option>
  <option>هلال حمد المنصوري</option>
  <option>احمد الحوسني</option>
  <option>نايف المعمري</option>
  <option>عفراء سالم المعمري</option>
  <option>المهندس أمجد الكندي</option>
  <option>المهندس أحمد الخروصي</option>
  <option>المهندس عمار عيسى</option>
  <option>المهندس صالح حسين صالح علي</option>
  <option>صالح سليم البادي</option>
  <option>ياسر أحمد يوسف رابح</option>
  <option>زيانة الإسماعيلية</option>
  <option>المهندس هيثم سعيد المزيني</option>


                            </select>
                            </td>
                                <td contenteditable="true" ><input type="text" name="devicePairs2[${indexVisit}][position]" class="form-control " ></td>
                                <td><button type="button" onclick="removeDeviceRow2(this)" id="removeRow2" class="btn btn-danger ">إزالة</button></td>


    `;
    nameVisitTableBody.appendChild(newDeviceRowVisit);

    indexVisit++;
   }

   function removeDeviceRow2(button) {
      const rowToRemove = button.closest("tr");
      rowToRemove.remove();
      no_visit--;
    }
  
    </script>

    <script>
        let indexRecom =0;
        let no_recom = 31;
        function addDevicePair3() {
            const RecommendationsTableBody = document.getElementById("Recommendations");
            const newDeviceRowRecom = document.createElement("tr");

            newDeviceRowRecom.innerHTML=`
 <tr>                            
<td >${no_recom++}</td>
 <td class="align-label-end"><input type="text" name="devicePairs3[${indexRecom}][recommendation]" class="form-control" ></td>
 <td><button type="button" onclick="removeDeviceRow3(this)" class="btn btn-danger removeRow1">إزالة</button></td>                       
 </tr>`;

 RecommendationsTableBody.appendChild(newDeviceRowRecom);
 indexRecom++;
        }

        function removeDeviceRow3(button) {
      const rowToRemoveRecom = button.closest("tr");
      rowToRemoveRecom.remove();
      no_recom--;
    }
    </script>
    
    <script src="script.js?v=<?php echo time(); ?>"></script>

    <style>
      @media (max-width:1000px) {

        
            .tbl-comp {
                width: 1200px;
            }
        
      }
    </style>

  