
<?php
include 'conn.php';

$id = $_POST['buildingNo'];

// $sql="SELECT schools_buldinge.*,building_components.no AS no,building_components.floor,building_componentshall.,building_components.,building_components.,building_components ";
$sql="SELECT * FROM schools_buldinge WHERE number ='$id'";

$result = $pdo->query($sql);
while($row  = $result->fetch(PDO::FETCH_ASSOC)) {

?>
<section class="sec-33">

<!-- Include Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <div class="d-flex justify-content-between m-4 header" >
    <img src="a.png" class="img-fluid" style="width: 112px; height: 112px;">
    
<div class=" text-lg font-medium text-center ">
  <span>(00) يناير 2022 ، نموذج رئيسي(7)</span>
  <br>
  <span>استمارة طلب معاينة مبنى روضة/ مدرسة خاصة</span>
  <br>
  <span>عملية طلب انشاء ترخيص</span>
  <br>
  <span>(المديريات التعليمية بالمحافظات)</span>
  </div>
    <img src="qc.png" class="img-fluid" style="width: 112px; height: 112px;">
</div>

  

<div class="container title">
  <h6 class="text-center">قسم التراخيص</h6>
  <h5 class="text-center">تقرير معاينة مبنى</h5>
        <!-- _____________________________________ -->
         
<form action="buildingForm\edit_submit.php" method="post">

<input type="hidden" name="id" value="<?php echo $row['number']; ?>">
  <table class="table table-bordered">
    <tbody class="thead-light">
      <tr>
        <th >اليوم:</th>
        <td>
            <input type="text" name="day_txt" class="form-control" id="dayOfWeek"  readonly  value="<?php echo $row['day']; ?>">
        </td>
        <th>
          رقم القيد:
        </th>
        <td>
            <input type="text" name="number_register_txt" class="form-control" value="<?php echo $row['number_register']; ?>">
            </td>
      </tr>
      </tbody>
      <tbody  class="thead-light">
        <tr>
          <th>التاريخ:</th>
          <td>
            <input type="date" name="date_txt" id="datevisit" onchange="displayDayOfWeek()" class="form-control" value="<?php echo $row['date']; ?>">
            </td>
          <th>رقم موافقة التأجيل:
          </th>
          <td>
            <input type="text" name="number_accept_txt" class="form-control" value="<?php echo $row['number_accept']; ?>">
           </td>
        </tr>
      </tbody>
      <tbody  class="thead-light">
        <tr>
          <th>نوع الطلب:</th>
          <td>
           

          <select class="form-control" name="request_txt">
    <option <?php if ($row['request'] == "زيارة مبنى جديد") echo "selected"; ?>>زيارة مبنى جديد</option>
    <option <?php if ($row['request'] == "زيارة نقل موقع") echo "selected"; ?>>زيارة نقل موقع</option>
</select>

            </td>
          <th>رقم طلب الاستثناء:</th>
          <td>
            <input type="text" name="number_request_txt" class="form-control" value="<?php echo $row['number_request']; ?>">
         
            </td>
      </tr>
    </tbody>
  </table>

        <!-- _____________________________________ -->
        <h6>البيانات الأساسية:-</h6>
        <table class="table table-bordered">
          <tbody  class="thead-light">
            <tr>
              <th >اسم صاحب الطلب(مالك المدرسة)</th>
              <th>رقم الهاتف</th>
              <th>المسمى المعتمد للروضة / المدرسة</th>
              <th>نوع البرنامج</th>
              <th>تاريخ انتهاء الموافقة المبدئية</th>
            </tr>
            </tbody>
            <tbody>
              <tr>
                <td>
                    <input type="text" name="name_request_txt" class="form-control" value="<?php echo $row['name_request']; ?>">
                   </td>
                <td>
                    <input type="text" name="phone_txt" class="form-control" value="<?php echo $row['phone']; ?>">
                   </td>
                <td><input type="text" name="name_school_txt"  class="form-control" value="<?php echo $row['name_school']; ?>"><br>
                <select class="form-control" name="type_school_txt">
                  <option <?php if( $row['type_school'] == "" ) echo "selected" ?>></option>
                <option <?php if($row['type_school'] == "للتعليم المبكر (روضة)") echo "selected"; ?>>للتعليم المبكر (روضة)</option>
    <option <?php if($row['type_school'] == "للتعليم المبكر (تعليم القرآن الكريم)") echo "selected"; ?>>للتعليم المبكر (تعليم القرآن الكريم)</option>
    <option <?php if ($row['type_school'] == "الدولية الخاصة") echo "selected"; ?>>الدولية الخاصة</option>
    <option <?php if ($row['type_school'] == "بصحار / الطريف") echo "selected";?>>بصحار / الطريف</option>
    <option <?php if ($row['type_school'] == "فرع / للتعليم المبكر (روضة)") echo "selected"; ?>>فرع / للتعليم المبكر (روضة)</option>
    <option <?php if($row['type_school'] == "فرع / للتعليم المبكر (تعليم القرآن الكريم)") echo "selected"; ?>>فرع / للتعليم المبكر (تعليم القرآن الكريم)</option>
                                </select>
              </td>
                <td>

                    <select class="form-control" name="programe_txt">
                    <option <?php if( $row['programe'] == "" ) echo "selected" ?>></option>
                      <option <?php if ($row['programe'] == "احادي اللغة") echo "selected"; ?>>احادي اللغة</option>
                      <option <?php if ($row['programe'] == "ثنائي اللغة") echo "selected"; ?>>ثنائي اللغة</option>
                      <option <?php if ($row['programe'] == "احادي اللغة وثنائي اللغة") echo "selected"; ?>> احادي اللغة وثنائي اللغة</option>
                      <option <?php if ($row['programe'] == "برنامج دولي") echo "selected"; ?>>برنامج دولي</option>

                  </select>

                   </td>
                <td> 
                    <input type="date" name="date_expired_txt" class="form-control" value="<?php echo $row['date_expired']; ?>">
                    </td>

              </tr>
            </tbody>
        
        </table>


        
        <!-- _____________________________________ -->
        <h6> بيانات المبنى:-</h6>

        <table class="table table-bordered">
          <tbody  class="thead-light">
            <tr>
              <th>اسم مالك المبنى </th>
              <th>الولاية</th>
              <th>القرية </th>
              <th>رقم القطعة</th>
              <th>المربع </th>
              <th>مساحة القطعة</th>
              <th>عدد الطوابق</th>
            </tr>
            </tbody>
            <tbody>
              <tr>
                <td><input type="text" name="name_owner_txt" class="form-control"  value="<?php echo $row['name_owner']; ?>"></td>
                <td><input type="text" name="wilaya_txt" class="form-control" style="width: 100px;" value="<?php echo $row['wilaya']; ?>"></td>
                <td> <input type="text" name="quiria_txt" class="form-control" style="width: 100px;" value="<?php echo $row['quiria']; ?>"></td>

                <td> <input type="text" name="number_place_txt" class="form-control" style="width: 70px;" value="<?php echo $row['number_place']; ?>"></td>

                <td><input type="text" name="square_txt" class="form-control" style="width: 70px;" value="<?php echo $row['square']; ?>"></td>
                <td><input type="text" name="space_txt" class="form-control" style="width: 70px;" value="<?php echo $row['space']; ?>"> </td>
                <td><input type="text" name="floor_txt" class="form-control" style="width: 70px;" value="<?php echo $row['floor']; ?>"></td>

              </tr>
            </tbody>
        
        </table>

        
        
        <!-- _____________________________________ -->
        <h6> المستندات المطلوبة:-</h6>

        <table class="table table-bordered">
          <tbody  class="thead-light">
            <tr>
              <th>طلب مالك المدرسة لمعاينة المبنى</th>
              <th>ملكية الأرض</th>
              <th> الكروكي</th>
              <th>رسالة مالك العقار</th>
              <th> رسالة عدم ممانعة الجيران</th>
              <th>نسخة الترخيص/ الموافقة المبدئية</th>
              <th> المخططات المعمارية</th>
              <th>استمارة الدفع</th>

            </tr>
            </tbody>
            <tbody>
              <tr>
                <?php
  function fileSubmit($fileSubmit) {
  
    if ($fileSubmit == 'نعم') {
      echo '<ion-icon name="checkmark-outline"></ion-icon>';
    } 
   
      else {
        echo '<ion-icon name="close-outline"></ion-icon>';
      }
      }

?>
              <td>
                <select class="form-control" name="request_ownerF">
                      <option <?php if ($row['request_ownerF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['request_ownerF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['request_ownerF'] == "-") echo "selected"; ?>>-</option>

                  </select>
              </td>
                <td>
                  <select class="form-control" name="land_ownerF">

                      <option <?php if ($row['land_ownerF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['land_ownerF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['land_ownerF'] == "-") echo "selected"; ?>>-</option>
                  </select>
                </td>
                <td>  
                  <select class="form-control" name="croqueF">

                      <option <?php if ($row['croqueF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['croqueF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['croqueF'] == "-") echo "selected"; ?>>-</option>
                  </select>
                </td>
                <td> 
                  <select class="form-control" name="letter_ownerF">

                      <option <?php if ($row['letter_ownerF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['letter_ownerF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['letter_ownerF'] == "-") echo "selected"; ?>>-</option>
                  </select>
                </td>
                <td><select class="form-control" name="letter_allowedF">

                      <option <?php if ($row['letter_allowedF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['letter_allowedF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['letter_allowedF'] == "-") echo "selected"; ?>>-</option>
                  </select></td>
                <td>  <select class="form-control" name="copy_approveF">

                      <option <?php if ($row['copy_approveF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['copy_approveF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['copy_approveF'] == "-") echo "selected"; ?>>-</option>
                  </select>
                </td>
                <td>
                   <select class="form-control" name="plansF">

                      <option <?php if ($row['plansF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['plansF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['plansF'] == "-") echo "selected"; ?>>-</option>
                  </select>
                </td>
                <td> <select class="form-control" name="paymentF">

                      <option <?php if ($row['paymentF'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row['paymentF'] == "لا") echo "selected"; ?>>لا</option>
                      <option <?php if ($row['paymentF'] == "-") echo "selected"; ?>>-</option>
                  </select></td>


              </tr>
            </tbody>
        
        </table>

        <!-- _____________________________________ -->
        <h6> مكونات المبنى:-</h6>

        <table class="table table-bordered table-hover main-table" >
          <thead class="thead-light">
            <tr>
             <th>م</th>
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
            <?php
$sql_comp="SELECT * FROM building_components WHERE building_number ='$id'";

$result_comp = $pdo->query($sql_comp);
$index = 0;
$listNO = 1;

while($row2  = $result_comp->fetch(PDO::FETCH_ASSOC)) {


?>

<input type="hidden" name="devicePairs[<?php echo $index; ?>][no_components]" value="<?php echo $row2['no']; ?>">


            <tr class="thead-light">
            <th ><?php echo $listNO;  ?></th>
              <td>
              <select name="devicePairs[<?php echo $index; ?>][floor]"   class="form-control" required >
                                    <option></option>

                                          <option <?php if ($row2['floor'] == "أرضي") echo "selected"; ?>>أرضي</option>
                                          <option <?php if ($row2['floor'] == "الأول") echo "selected"; ?>>الأول</option>
                                          <option <?php if ($row2['floor'] == "الثاني") echo "selected"; ?>>الثاني</option>
                                          <option <?php if ($row2['floor'] == "ملحق") echo "selected"; ?>>ملحق</option>
                                        </select>
            </td>
              <!-- <td><input type="text" class="form-control"  name="devicePairs[<?php echo $index; ?>][hall]" style="width: 70px;" value="<?php echo $row2['hall']; ?>"></td> -->
              <td  ><input type="text" name="devicePairs[<?php echo $index; ?>][hall]" style="width: 70px;" class="form-control " readonly value="غرفة <?php echo $listNO; ?>" required></td>
              <td><input type="text" class="form-control height" name="devicePairs[<?php echo $index; ?>][height]" style="width: 70px;" value="<?php echo $row2['height']; ?>"></td>
              <td><input type="text" class="form-control width" name="devicePairs[<?php echo $index; ?>][width]" style="width: 70px;" value="<?php echo $row2['width']; ?>"></td>
              <td><input type="text" class="form-control hallSpace" name="devicePairs[<?php echo $index; ?>][hall_space]" style="width: 70px;" readonly value="<?php echo $row2['hall_space']; ?>"></td>
              <td colspan="2">
              <select class="form-control wc" name="devicePairs[<?php echo $index; ?>][w_c]">
                  

                      <option <?php if ($row2['w_c'] == "نعم") echo "selected"; ?>>نعم</option>
                      <option <?php if ($row2['w_c'] == "لا") echo "selected"; ?>>لا</option>
                  </select>
            </td>
              <td>
              <select name="devicePairs[<?php echo $index; ?>][type_of_use]" class="form-control typeUse" required >
              <option <?php if ($row2['type_of_use'] == "الإدارة المدرسية") echo "selected"; ?>>الإدارة المدرسية</option>
<option <?php if ($row2['type_of_use'] == "الاستقبال") echo "selected"; ?>>الاستقبال</option>
<option <?php if ($row2['type_of_use'] == "مصادر تعلم وحاسب آلي") echo "selected"; ?>>مصادر تعلم وحاسب آلي</option>
<option <?php if ($row2['type_of_use'] == "مصادر تعلم") echo "selected"; ?>>مصادر تعلم</option>
<option <?php if ($row2['type_of_use'] == "حاسب آلي") echo "selected"; ?>>حاسب آلي</option>
<option <?php if ($row2['type_of_use'] == "الصحة المدرسية") echo "selected"; ?>>الصحة المدرسية</option>
<option <?php if ($row2['type_of_use'] == "الصحة المدرسية وقاعة المعلمات") echo "selected"; ?>>الصحة المدرسية وقاعة المعلمات</option>
<option <?php if ($row2['type_of_use'] == "قاعة المعلمات") echo "selected"; ?>>قاعة المعلمات</option>
<option <?php if ($row2['type_of_use'] == "مختبر 1") echo "selected"; ?>>مختبر 1</option>
<option <?php if ($row2['type_of_use'] == "مختبر 2") echo "selected"; ?>>مختبر 2</option>
<option <?php if ($row2['type_of_use'] == "مختبر 3") echo "selected"; ?>>مختبر 3</option>
<option <?php if ($row2['type_of_use'] == "قاعة دراسية") echo "selected"; ?>>قاعة دراسية</option>
<option <?php if ($row2['type_of_use'] == "الجمعية التعاونية") echo "selected"; ?>>الجمعية التعاونية</option>
<option <?php if ($row2['type_of_use'] == "قاعة طعام") echo "selected"; ?>>قاعة طعام</option>
<option <?php if ($row2['type_of_use'] == "مخزن") echo "selected"; ?>>مخزن</option>
<option <?php if ($row2['type_of_use'] == "قاعة متعددة الأغراض") echo "selected"; ?>>قاعة متعددة الأغراض</option>
<option <?php if ($row2['type_of_use'] == "غرفة حارس") echo "selected"; ?>>غرفة حارس</option>
<option <?php if ($row2['type_of_use'] == "قاعة الفنون التشكيلية") echo "selected"; ?>>قاعة الفنون التشكيلية</option>
<option <?php if ($row2['type_of_use'] == "قاعة الموسيقى") echo "selected"; ?>>قاعة الموسيقى</option>
<option <?php if ($row2['type_of_use'] == "قاعة رياضة") echo "selected"; ?>>قاعة رياضة</option>
<option <?php if ($row2['type_of_use'] == "قاعة التنسيق والمتابعة") echo "selected"; ?>>قاعة التنسيق والمتابعة</option>

                    </select>
            
            </td>
              <td><input type="text" class="form-control countStudents" name="devicePairs[<?php echo $index; ?>][hall_capacity]" style="width: 70px;" readonly value="<?php echo $row2['hall_capacity']; ?>"></td>
              <td><input type="text" class="form-control" name="devicePairs[<?php echo $index; ?>][notes]" style="width: 70px;" value="<?php echo $row2['notes']; ?>"></td>

              <!-- <td><button type="button" id="rowDelete" onclick="removeDeviceRow(this)" class="btn btn-danger removeRow1">إزالة</button></td> -->
            </tr>

            <?php
            $index++;
            $listNO++;
}
            ?>
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
      <input type="text" name="countWC" class="form-control countWC" style="width: 70px;" readonly  value="<?php echo $row['countWC']; ?>">
    </td>
    <td  >
    
    </td>
    <td  >     
      <input type="text" name="countStudentsAll" class="form-control countStudentsAll" style="width: 70px;" readonly  value="<?php echo $row['countStudentsAll']; ?>">
    </td>
    <td >طالب</td>
    <td  >     
      <input type="text" name="noteCountStudentsAll" class="form-control " style="width: 70px;"   value="<?php echo $row['noteCountStudentsAll']; ?>">
    </td>
</tr>
</tbody>
      
      </table>

      <button type="button" onclick="addDevicePair()" class="btn btn-success">أضافة </button>

  <!-- هنا الجدول الثاني التابع  -->
  <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th>أبعاد الساحة الخارجية للمبنى(الطولxالعرض)</th>
                                <td> <input type="text" class="form-control heightOut" style="width: 70px;" name="heightOut"  value="<?php echo $row['heightOut']; ?>"></td>
                                <td >
                             <input type="text" class="form-control wdithOut" style="width: 70px;" name="wdithOut"  value="<?php echo $row['wdithOut']; ?>">
                                </td>
                                <td> 
                                  <input type="text" class="form-control hallSpaceOut" name="hallSpaceOut" style="width: 70px;" readonly  value="<?php echo $row['hallSpaceOut']; ?>">
                                </td>
                                <th>
                                 ساحة الألعاب
                                </th>
                                <td>
                                <input type="text" class="form-control heightGame" name="heightGame" style="width: 70px;"  value="<?php echo $row['heightGame']; ?>">  
                                
                              </td>
                                <td >
                                <input type="text" class="form-control wdithGame" name="wdithGame" style="width: 70px;"  value="<?php echo $row['wdithGame']; ?>">  
                             
                                </td>
                                <td> 
                                <input type="text" class="form-control hallSpaceGame" style="width: 70px;" readonly name="hallSpaceGame"  value="<?php echo $row['hallSpaceGame']; ?>">
                                  

                                </td>
                              </tr>

                              <tr>
                                <th>إجمالي القاعات التي تصلح كقاعات صفية</th>
                                <td colspan="8" class="text-center">
                                  <input type="text" class="form-control countClassRoom" readonly name="countClassRoom"  value="<?php echo $row['countClassRoom']; ?>">


                                </td>
                           
                              </tr>

                              
                              <tr>
                                <th>إجمالي عدد دورات المياه</th>
                                <td colspan="8" class="text-center">
                                  
                                  <input type="text" class="form-control countWC" readonly name="countWC"  value="<?php echo $row['countWC']; ?>">


                                </td>
                           
                              </tr>
                            </thead>
</table>


 <!-- _____________________________________ -->
 <h6>رأي اللجنة الزائرة :-</h6>

 <table class="table table-bordered">
    <tbody class="thead-light">
      <tr>
        <th >الموافقة</th>
        <th>
          عدم الموافقة
        </th>
        <!-- <th>الأسباب الرئيسية لعدم الموافقة</th> -->
         <th class="textAccept">
        <?php if($row['accept_visit'] == 'عدم الموافقة') {echo 'الأسباب الرئيسية لعدم الموافقة';} else {
          echo 'ملاحظات'; }?>
        </th>
      </tr>
      </tbody>
      <tbody  class="thead-light">
        <tr class="typeReason">
          <td>
          <select class="form-control" id="visitApprove"  name="accept_visit"  onchange="toggleReasonField('visit')">
            <option <?php if ($row['accept_visit'] == "") echo "selected"; ?>></option>
                                <option <?php if ($row['accept_visit'] == "الموافقة") echo "selected"; ?>>الموافقة</option>
                                <option <?php if ($row['accept_visit'] == "عدم الموافقة") echo "selected"; ?>>عدم الموافقة</option>
                            </select>
        </td>
         
        <td></td>
        <td>
          <input type="text" class="form-control"  name="reasons_not_accept_visit"  value="<?php echo $row['reasons_not_accept_visit']; ?>">
        
        </td>
        </tr>
      </tbody>
      
  </table>

        <!-- _____________________________________ -->
<h6>اللجنة الزائرة:-</h6>
        <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th>م</th>
                                <th>الاسم</th>
                             
                              
                                <th>الوظيفة</th>
                               
                              </tr>
                            </thead>
                            <tbody id="nameVisit">

                            <?php
$sql_visit="SELECT * FROM visit_staff_building WHERE building_number ='$id'";

$result_visit = $pdo->query($sql_visit);
$indexV = 0;
$no_visit = 1;
while($row2  = $result_visit->fetch(PDO::FETCH_ASSOC)) {


?>
<input type="hidden" name="devicePairs2[<?php echo $indexV; ?>][no_visit]" value="<?php echo $row2['no']; ?>">
                              <tr>
                               
                                <td><?php echo $no_visit++;  ?></td>
                                <td><input type="text" class="form-control"  value="<?php echo $row2['name']; ?>" name="devicePairs2[<?php echo $indexV; ?>}][name]"></td>
                                <td><input type="text" class="form-control"  value="<?php echo $row2['position']; ?>" name="devicePairs2[<?php echo $indexV; ?>}][position]"></td>
                               
                              
                            </tr>

                            <?php
                            $indexV++;
}
            ?>
                            </tbody>
                          </table>
                          <button type="button" onclick="addDevicePair2()" class="btn btn-success">أضافة </button>

                                  <!-- _____________________________________ -->

                                  
 <!-- _____________________________________ -->
 <h6>رأي الدائرة :-</h6>

 <table class="table table-bordered">
    <tbody class="thead-light">
      <tr  >
        <th >الموافقة</th>
        <th>
          عدم الموافقة
        </th>
        <th>الأسباب الرئيسية لعدم الموافقة</th>
      </tr>
      </tbody>
      <tbody  class="thead-light">
        <tr class="typeReason">
           <td>
           <select class="form-control"  name="accept_department"  >
            <option <?php if ($row['accept_department'] == "") echo "selected"; ?>></option>
                                <option <?php if ($row['accept_department'] == "الموافقة") echo "selected"; ?>>الموافقة</option>
                                <option <?php if ($row['accept_department'] == "عدم الموافقة") echo "selected"; ?>>عدم الموافقة</option>
                            </select>
          </td>
         <td></td>
           <td><input type="text" class="form-control"  name="reasons_not_accept_dep"  value="<?php echo $row['reasons_not_accept_dep']; ?>"></td>
        </tr>
      </tbody>
      
  </table>

        <!-- _____________________________________ -->
<h6>التوصيات لمالك المدرسة لتنفيذها:- </h6>
        <table class="table table-bordered table-hover main-table" >
          <thead class="thead-light">
            <tr>
              <th>م</th>
              <th class="align-label-end">البيان</th>
           
            
             
            </tr>
          </thead>

          <tbody class="thead-light" id="Recommendations">
            <tr>
             
              <th >1</th>
              <td class="align-label-end">عمل سارية للعلم في الموقع المحدد أثناء الزيارة بارتفاع 12 متر حسب المواصفات والمقاييس</td>
          
          </tr>

          <tr>
             
             <th >2</th>
             <td class="align-label-end">توفير جهاز استشعار الحريق وعمل مخارج ولوحات للطوارئ.</td>
         
         </tr>
         <tr>
             
             <th >3</th>
             <td class="align-label-end">التواصل مع قسم التعليم المبكر بشأن المناهج والتأثيث </td>
         
         </tr>

         <tr>
             
             <th >4</th>
             <td class="align-label-end">عمل مغاسل في دورات المياه تتناسب مع أعمار الطلبة أو وضع أرفف خشبية تتناسب مع أطوال الطلاب</td>
         
         </tr>

         <tr>
             
             <th >5</th>
             <td class="align-label-end">تجهيز الجمعية التعاونية حسب الاشتراطات الصحية</td>
         
         </tr>

         <tr>
             
             <th >6</th>
             <td class="align-label-end">تهئية وتوفير مستلزمات غرفة الصحية المدرسية</td>
         
         </tr>

         <tr>
             
             <th >7</th>
             <td class="align-label-end">عمل مظلة لساحة الطابور وساحة الألعاب وفرش ساحة الألعاب بطبقة آمنة(اسفنج، ترتان...إلخ)</td>
         
         </tr>

         <tr>
             
             <th >8</th>
             <td>زيادة الإضاءة في جميع المرافق بما يتناسب مع مساحة كل مرفق، وضرورة تركيب المصابيح على السقف وليس الجدران الجانبية</td>
         
         </tr>

         <tr>
             
             <th >9</th>
             <td >توفير صور صاحب الجلالة بكل الفصول بحيث تكون أعلى السبورة بنصف متر،وإضافة مصباح أعلى السبورة مع الواقي له مقاس 4 قدم</td>                           
         </tr>

         
         <tr>
             
             <th >10</th>
             <td >ضرورة موافاتنا بتقرير الدفاع المدني (تقرير عن سلامة المنشأة من جهات الاختصاص) وتوفير طفايات حريق.</td>                           
         </tr>


         
         <tr>
             
             <th >11</th>
             <td class="align-label-end">تغطية صناديق توزيع الكهرباء بالألمنيوم أو خشبm d f .</td>                           
         </tr>


           
         <tr>
             
             <th >12</th>
             <td class="align-label-end">توفير صاعقات حشرات عدد (2).</td>
         </tr>

            
         <tr>
             
             <th >13</th>
             <td class="align-label-end">تجهيز غرفة المعلمات بالمكاتب والأرفف لخدمة المعلمات.</td>
         </tr>

         <tr>
             
             <th >14</th>
             <td class="align-label-end">تبطين جزء من قاعات رياض الأطفال بمساحة (2×3)م .</td>
         </tr>

         <tr>
             
             <th >15</th>
             <td class="align-label-end">فتح نوافذ للقاعات الدراسية وعمل حماية للنوافذ</td>
         </tr>

         <tr>
             
             <th >16</th>
             <td class="align-label-end">عمل بلاستيك لحامي الدرج داخل المبنى،  أو تضييق فتحات حامي الدرج الإساسي</td>
         </tr>

         <tr>
             
             <th >17</th>
             <td class="align-label-end">تجهيز غرفة مصادر التعلم بالاجهزة والوسائل التعليمية</td>
         </tr>

         <tr>
             
             <th >18</th>
             <td class="align-label-end">لا يُسمح للمدرسة بعمل أي إضافات بالمبنى المدرسي دون موافقة الوزارة (بناء قاعات دراسية أو غيره).</td>
         </tr>

         <tr>
             
             <th >19</th>
             <td class="align-label-end">لا يقل إرتفاع حامي الدرج  عن متر و 50 سم</td>
         </tr>

         <tr>
             
             <th >20</th>
             <td class="align-label-end">تعيين الهيئة الإدارية والتدريسية بشكل رسمي قبل بدء العام الدراسي 2022/2023 م</td>
         </tr>

         <tr>
             
             <th >21</th>
             <td class="align-label-end"> ** التقيد بما ورد في التعميم الصادر بتاريخ 20/5/2019م برقم قيد 2819153836. بشأن الكثافة العددية والحد الأدنى والأعلى للشعبة الدراسية </td>
         </tr>

         <tr>
             
             <th >22</th>
             <td class="align-label-end">ضرورة توفير مواقف للسيارات والحافلات وتأمين دخول وخروج الطلاب والمعلمين. </td>
         </tr>

         <tr>
             
             <th >23</th>
             <td class="align-label-end">فرش الساحة بالترتان</td>
         </tr>

         <tr>
             
             <th >24</th>
             <td class="align-label-end">تبيطين الدرج الخارجي امام المبنى وخلف المبنى وداخل المبنى</td>
         </tr>

         <tr>
             
             <th >25</th>
             <td class="align-label-end">إغلاق المنطقة تحت الدرج</td>
         </tr>


         <tr>
             
             <th >26</th>
             <td class="align-label-end">عمل حاجز للدرج داخل المبنى بارتفاع 1.8م</td>
         </tr>    
         
         <tr>
             
             <th >27</th>
             <td class="align-label-end">إغلاق الطريق المؤدي إلى السطح</td>
         </tr>

         <tr>
                               
                               <th >28</th>
                               <td class="align-label-end">سارية العلم يكون من نوع فايبرجلاس</td>
                           </tr>

         <tr>
             
             <th >29</th>
             <td class="align-label-end">

             <div class="row">
             <div class="col-md-6">

<h5>ضرورة موافاتنا بالمستندات المتعلقة إصدار ترخيص: </h5>
</div>

<div class="col-md-6">
<div class="form-group">
 

          
<select class="form-control" name="type_school_license">
<option <?php if( $row['type_school_license'] == "" ) echo "selected" ?>></option>
    <option <?php if($row['type_school_license'] == "مدرسة للتعليم المبكر\"روضة\"") echo "selected";  ?>>مدرسة للتعليم المبكر"روضة"</option>
    <option <?php if( $row['type_school_license'] == "مدرسة للتعليم المبكر\"تعليم القرآن الكريم\"") echo "selected";  ?>>مدرسة للتعليم المبكر"تعليم القرآن الكريم"</option>
    <option <?php if( $row['type_school_license'] == "مدرسة خاصة") echo "selected"; ?>>مدرسة خاصة</option>
    <option <?php if($row['type_school_license'] == "مدرسة دولية" ) echo "selected"; ?>>مدرسة دولية</option>
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

<option <?php if ($row['license_fee'] == "") echo "selected"; ?>></option>
<option <?php if ($row['license_fee'] == 'رسوم إصدار ترخيص مدرسة للتعليم المبكر"روضة" (100) ريالا عمانيا') echo "selected";?>>رسوم إصدار ترخيص مدرسة للتعليم المبكر"روضة" (100) ريالا عمانيا</option>
    <option <?php if ($row['license_fee'] == 'رسوم إصدار ترخيص مدرسة للتعليم المبكر"تعليم القرآن الكريم" (100) ريالا عمانيا') echo "selected";?>>رسوم إصدار ترخيص مدرسة للتعليم المبكر"تعليم القرآن الكريم" (100) ريالا عمانيا</option>
    <option <?php if ($row['license_fee'] == 'رسوم إصدار ترخيص مدرسة خاصة (150) ريالا عمانيا') echo "selected"?>>رسوم إصدار ترخيص مدرسة خاصة (150) ريالا عمانيا</option>
    <option <?php if ($row['license_fee'] == 'رسوم إصدار ترخيص مدرسة دولية (000) ريالا عمانيا') echo "selected";?>>رسوم إصدار ترخيص مدرسة دولية (000) ريالا عمانيا</option>
                            </select>



</div>

<div class="mb-3">5- صورة من البطاقة الشخصية للمالك</div>
<div class="mb-3">6-
<select class="form-control" name="secuirtyValue">

            <option <?php if( $row['secuirtyValue'] == "" ) echo "selected"; ?>></option>
    <option <?php if ($row['secuirtyValue'] == "الضمان المصرفي (5000) ريالا عماني") echo "selected"; ?>>الضمان المصرفي (5000) ريالا عماني</option>
    <option <?php if ($row['secuirtyValue'] == "الضمان المصرفي (7000) ريالا عماني") echo "selected"; ?>>الضمان المصرفي (7000) ريالا عماني</option>
    <option <?php if ($row['secuirtyValue'] == "الضمان المصرفي (10000) ريالا عماني") echo "selected"; ?>>الضمان المصرفي (10000) ريالا عماني</option>
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
    <th>30</th>
    <td class="align-label-end">
        <div class="row">
            <div class="col-auto">التكرم باستكمال إجراءات</div>
            <div class="col">
                <select class="form-control" name="compleating_invest">
                    <option  <?php if ($row['compleating_invest'] == "") echo "selected"; ?>> </option>
                    <option <?php if ($row['compleating_invest'] == "إصدار ترخيص") echo "selected"; ?>>إصدار ترخيص</option>
                    <option <?php if ($row['compleating_invest'] == "تجديد ترخيص") echo "selected"; ?>>تجديد ترخيص</option>
                </select>
            </div>
        </div>
     
        المدرسة عبر منصة استثمر بسهولة وموافاتنا:       
        <div class="row">
        <div class="col-md-6">
        <div class="mb-3">

        <?php
$investValues = explode(',', $row['invest_platform']);
        ?>
        <!-- <?php
$investValues = explode(',', $row['invest_platform']); // Assuming the values in the 'media' column are comma-separated

// Define an array of checkbox values
$checkboxValues = array(
  'شهادة الأنشطة التربوية',
  'إيصال دفع الرسوم المقررة',
  'إرفاق لوحة المدرسة الخارجية',
  'إرفاق الضمان البنكي',
  'إستمارة الرسوم الدراسية',
  'الزي المدرسي'
);
?>

<?php foreach ($checkboxValues as $value): ?>
    <?php
    $isChecked = in_array($value, $investValues) ? 'checked' : '';
    // $id = str_replace(' ', '-', $value);
    ?>
    <input type="checkbox" id="<?= $id ?>" name="myCheckbox[]" value="<?= $value ?>" <?= $isChecked ?>>
    <label for="<?= $id ?>"><?= $value ?></label>
    <br>
<?php endforeach; ?> -->

<input type="checkbox" id="certificate" name="myCheckbox[]" <?php if( in_array('شهادة الأنشطة التربوية', $investValues)) echo "checked"; ?> value="شهادة الأنشطة التربوية">
<label for="certificate">شهادة الأنشطة التربوية</label>
<br>
<input type="checkbox" id="pay" name="myCheckbox[]" <?php if( in_array('إيصال دفع الرسوم المقررة', $investValues)) echo "checked"; ?> value="إيصال دفع الرسوم المقررة">
<label for="pay">إيصال دفع الرسوم المقررة</label>
<br>
<input type="checkbox" id="borderr" name="myCheckbox[]" <?php if( in_array('إرفاق لوحة المدرسة الخارجية', $investValues)) echo "checked"; ?> value="إرفاق لوحة المدرسة الخارجية">
<label for="borderr">إرفاق لوحة المدرسة الخارجية</label>
<br>
<input type="checkbox" id="warreny" name="myCheckbox[]" <?php if( in_array('إرفاق الضمان البنكي', $investValues)) echo "checked"; ?> value="إرفاق الضمان البنكي">
<label for="warreny">إرفاق الضمان البنكي</label>
<br>
<input type="checkbox" id="fees" name="myCheckbox[]" <?php if( in_array('إستمارة الرسوم الدراسية', $investValues)) echo "checked"; ?> value="إستمارة الرسوم الدراسية">
<label for="fees">إستمارة الرسوم الدراسية</label>
<br>
<input type="checkbox" id="uniform" name="myCheckbox[]" <?php if( in_array('الزي المدرسي', $investValues)) echo "checked"; ?> value="الزي المدرسي">
<label for="uniform">الزي المدرسي</label>


            </div>
        </div>
    
    </td>
</tr>


         <?php
$sql_recom="SELECT * FROM recommendations_building WHERE building_number ='$id'";

$result_recom = $pdo->query($sql_recom);
$no_recom = 31;
$indexRecomc= 0;

while($row2  = $result_recom->fetch(PDO::FETCH_ASSOC)) {


?>                                 
 <form action="" method="post">

<input type="hidden" class="form-control" name="devicePairs3[<?php echo $indexRecomc; ?>}][no_recommendation]" value="<?php echo $row2['no']; ?>">
                              <tr id="row-<?php echo $row2['no']; ?>">
                               
                                <th><?php echo $no_recom++;  ?></th>
                                <td class="d-flex"><input type="text" class="form-control" name="devicePairs3[<?php echo $indexRecomc; ?>}][recommendation]" value="<?php echo $row2['recommendation']; ?>">
                              <a href="#"  class="delete-reco btn btn-danger"  data-id="<?php echo $row2['no']; ?>" ><ion-icon name="trash-outline"></ion-icon></a>
                              </td>
                             
                              <!-- onclick="return checkdelete()" -->
                            </tr>

                            <?php
                            $indexRecomc++;
}
            ?>

</form>

          </tbody>
        </table>
        <button type="button" onclick="addDevicePair3()" class="btn btn-success">أضافة  </button>

        <div class="d-flex justify-content-center my-4">
    <input type="submit" name="submit" class="btn btn-info" value="تعديل البيانات">

<a href="list_building.php" class="btn btn-danger mr-2" >ألغاء</a>

  </form>
</div>
        <!-- _____________________________________ -->

</div>
<?php

}
?>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
//  For building components
echo "<script>let listNO = '{$listNO}';</script>";

// For Visit building

echo "<script>let no_visit = '{$no_visit}';</script>";

// For Recomindtions building

echo "<script>let no_recom = '{$no_recom}';</script>";
?>

<script>
        let no_room = 2;
        let index = 1;

        function addDevicePair() {
      const deviceCountTableBody = document.getElementById("deviceCount");
      const newDeviceRow = document.createElement("tr");
      newDeviceRow.innerHTML = `

      <th >${listNO}</th>
     <td>
                                    <select name="devicePairsNew[${index}][floor]" class="form-control" required >
                                        <option></option>

                                          <option>أرضي</option>
                                          <option >الأول</option>
                                          <option >الثاني</option>
                                          <option >ملحق</option>
                                        </select>
                                </td>
                                <td  ><input type="text" name="devicePairsNew[${index}][hall]" class="form-control " readonly value="غرفة ${listNO}" required></td>
                                <td><input type="text"  name="devicePairsNew[${index}][height]"  class="form-control height" required></td>
                                <td><input type="text" name="devicePairsNew[${index}][width]" class="form-control width" required></td>
                                <td><input type="text" name="devicePairsNew[${index}][hall_space]" class="form-control hallSpace" ></td>
                                <td colspan="2"><select name="devicePairsNew[${index}][w_c]" class="form-control wc" required >
                                                            <option></option>

                                      <option>نعم</option>
                                      <option >لا</option>
                                   
                                    </select>
                                </td>
                                <td>
                                <select name="devicePairsNew[${index}][type_of_use]" class="form-control typeUse" required >
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
                                <td><input type="text" name="devicePairsNew[${index}][hall_capacity]" class="form-control countStudents" readonly></td>
                                <td><input type="text" name="devicePairsNew[${index}][notes]" class="form-control" ></td>
                                <td><button type="button" onclick="removeDeviceRow(this)" class="btn btn-danger removeRow1">إزالة</button></td>

      `;
      deviceCountTableBody.appendChild(newDeviceRow);
      no_room++;
      index++;
      listNO++; // Increment the value in JavaScript
        }

        function removeDeviceRow(button) {
      const rowToRemove = button.closest("tr");
      rowToRemove.remove();
      no_room--;
      listNO--;
    } 



</script>


<script>
let indexVisit = 0;
   function addDevicePair2() {
    const nameVisitTableBody = document.getElementById("nameVisit");
    const newDeviceRowVisit = document.createElement("tr");
    newDeviceRowVisit.innerHTML=`

    <td contenteditable="true"><input type="text"  name="" value="${no_visit++}" readonly class="form-control width" ></td>
                                <td contenteditable="true" >
                                <select class="form-control" name="devicePairsNew2[${indexVisit}][name]">
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
                                <td contenteditable="true" ><input type="text" name="devicePairsNew2[${indexVisit}][position]" class="form-control " ></td>
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
        
        function addDevicePair3() {
            const RecommendationsTableBody = document.getElementById("Recommendations");
            const newDeviceRowRecom = document.createElement("tr");

            newDeviceRowRecom.innerHTML=`
 <tr>                            
<td >${no_recom}</td>
 <td class="align-label-end"><input type="text" name="devicePairsNew3[${indexRecom}][recommendation]" class="form-control" ></td>
 <td><button type="button" onclick="removeDeviceRow3(this)" class="btn btn-danger removeRow1">إزالة</button></td>                       
 </tr>`;

 RecommendationsTableBody.appendChild(newDeviceRowRecom);
 indexRecom++;
 no_recom++;
        }

        function removeDeviceRow3(button) {
      const rowToRemoveRecom = button.closest("tr");
      rowToRemoveRecom.remove();
      no_recom--;
    }
    </script>


<script>

  function checkdelete()
    {
        return confirm('هل أنت متأكد أنك تريد الحذف   ? ')
    }
  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
      $('.delete-reco').on('click', function() {
          var recommendationId = $(this).data('id');
          var row = $('#row-' + recommendationId);
  
          $.ajax({
              url: 'delete_recommendation.php',
              type: 'POST',
              data: { id: recommendationId },
              success: function(response) {
                  if (response == 'success') {
                      row.remove();
                  } else {
                      alert('Failed to delete the recommendation.');
                  }
              }
          });
      });
  });
  </script>
    

<script src="script.js?v=<?php echo time(); ?>"></script>

<style>
  td, th, h6{
      text-align: start; /* or 'right' if 'end' does not work as expected */
  }

    .main-btn {
        left: 20px;
        top: 30px;
    }

  @media print {
.typeReason {
  height: 65px;
}
  }



</style>
