


<?php
include 'conn.php';
if(isset($_POST['buildingNo']))
{
$id = $_POST['buildingNo'];

// $sql="SELECT schools_buldinge.*,building_components.no AS no,building_components.floor,building_componentshall.,building_components.,building_components.,building_components ";
$sql="SELECT * FROM schools_buldinge WHERE number ='$id'";

$result = $pdo->query($sql);
while($row  = $result->fetch(PDO::FETCH_ASSOC)) {

?>

<section class="sec-32" >


<title>تقرير معاينة مبنى</title>



    <!-- Include Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  <div    class="title-print justify-content-between m-4 header " >
    <img src="a.png" class="img-fluid" style="width: 112px; height: 112px;">
    
<div class=" text-lg font-medium text-center "  >
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
<form action="" method="post" class="elemNoPrint">

<a class="editReportBuilding main-btn btn btn-info btn-lg position-relative " ><ion-icon name="create-outline"></ion-icon></a>
<input type="hidden" class="buildingNoEdit" value="<?php echo $row['number']; ?>">

<button  id="btnDeleteBui" onclick="return checkdelete()" class="main-btn btn btn-danger btn-lg position-relative "><ion-icon name="trash-outline"></ion-icon></button>

</form>

<!-- delete.php?id=<?php echo $row['number'];?> -->

<div class="container title elemNoPrint">
  <h6 class="text-center">قسم التراخيص</h6>
  <h5 class="text-center">تقرير معاينة مبنى</h5>
</div>

        <!-- _____________________________________ -->

        <style>
          
        </style>
  <table class="table table-bordered">
    <tbody >
      <tr>
        <th class="table-active">اليوم:</th>
        <td><?php echo $row['day']; ?></td>
        <th  class="table-active">
          رقم القيد:
        </th>
        <td><?php echo $row['number_register']; ?></td>
      </tr>
      </tbody>
      <tbody >
        <tr>
          <th  class="table-active">التاريخ:</th>
          <td><?php echo $row['date']; ?></td>
          <th  class="table-active">رقم موافقة التأجيل:
          </th>
          <td><?php echo $row['number_accept']; ?></td>
        </tr>
      </tbody>
      <tbody >
        <tr>
          <th  class="table-active">نوع الطلب:</th>
          <td><?php echo $row['request']; ?></td>
          <th  class="table-active">رقم طلب الاستثناء:</th>
          <td>
          
          <?php echo $row['number_request']; ?>
            </td>
      </tr>
    </tbody>
  </table>

        <!-- _____________________________________ -->
        <h6>البيانات الأساسية:-</h6>
        <table class="table table-bordered">
          <tbody   class="table-active">
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
                <td><?php echo $row['name_request']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['name_school'].'<br>'. $row['type_school'];?></td>
                <td><?php echo $row['programe']; ?></td>
                <td> <?php echo $row['date_expired']; ?></td>

              </tr>
            </tbody>
        
        </table>


        
        <!-- _____________________________________ -->
        <h6> بيانات المبنى:-</h6>

        <table class="table table-bordered">
          <tbody   class="table-active">
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
                <td><?php echo $row['name_owner']; ?></td>
                <td><?php echo $row['wilaya']; ?></td>
                <td> <?php echo $row['quiria']; ?></td>

                <td><?php echo $row['number_place']; ?> </td>

                <td><?php echo $row['square']; ?></td>
                <td><?php echo $row['space']; ?> </td>
                <td><?php echo $row['floor']; ?></td>

              </tr>
            </tbody>
        
        </table>

        
        
        <!-- _____________________________________ -->
        <h6> المستندات المطلوبة:-</h6>

        <table class="table table-bordered">
          <tbody   class="table-active">
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
   
      elseif($fileSubmit == 'لا') {
        echo '<ion-icon name="close-outline"></ion-icon>';
      }

      else {
        echo "___";
      }
      }

?>
              <td><?php fileSubmit($row['request_ownerF']);?></td>
                <td><?php    fileSubmit($row['land_ownerF']);  ?></td>
                <td> <?php  fileSubmit($row['croqueF']); ?></td>
                <td><?php  fileSubmit($row['letter_ownerF']);?> </td>
                <td><?php fileSubmit($row['letter_allowedF']); ?></td>
                <td><?php fileSubmit($row['copy_approveF']); ?> </td>
                <td><?php fileSubmit($row['plansF']); ?></td>
                <td><?php fileSubmit($row['paymentF']); ?></td>


              </tr>
            </tbody>
        
        </table>

        <!-- _____________________________________ -->
        <h6> مكونات المبنى:-</h6>

        <table class="table table-bordered table-hover main-table" >
          <thead  class="table-active">
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

          <tbody>
            <?php
$sql_comp="SELECT * FROM building_components WHERE building_number ='$id'";

$result_comp = $pdo->query($sql_comp);
$index = 1;

while($row2  = $result_comp->fetch(PDO::FETCH_ASSOC)) {


?>
            <tr  >
            <th class="table-active"><?php echo $index++;  ?></th>
              <td><?php echo $row2['floor'];  ?></td>
              <td><?php echo $row2['hall'];  ?></td>
              <td><?php echo $row2['height'];  ?></td>
              <td><?php echo $row2['width'];  ?></td>
              <td><?php echo $row2['hall_space'];  ?></td>
              <td colspan="2"><?php echo $row2['w_c'];  ?></td>
              <td><?php echo $row2['type_of_use'];  ?></td>
              <td><?php echo $row2['hall_capacity'];  ?></td>
              <td><?php echo $row2['notes'];  ?></td>


            </tr>

            <?php
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
      <?php echo $row['countWC']; ?>
    </td>
    <td  >
    
    </td>
    <td  >     
       <?php echo $row['countStudentsAll']; ?>
    </td>
    <td >طالب</td>
    <td ><?php echo $row['noteCountStudentsAll']; ?></td>
</tr>
</tbody>
      
      </table>
  <!-- هنا الجدول الثاني التابع  -->
  <table class="table table-bordered table-hover main-table" >
                            <thead class="thead-light">
                              <tr>
                                <th class="table-active">أبعاد الساحة الخارجية للمبنى(الطولxالعرض)</th>
                                <td> <?php echo $row['heightOut']; ?></td>
                                <td >
                                <?php echo $row['wdithOut']; ?>
                                </td>
                                <td> 
                                  <?php echo $row['hallSpaceOut']; ?>

                                </td>
                                <th class="table-active">
                                 ساحة الألعاب
                                </th>
                                <td><?php echo $row['heightGame']; ?></td>
                                <td >
                                <?php echo $row['wdithGame']; ?>
                                </td>
                                <td> 
                                  <?php echo $row['hallSpaceGame']; ?>

                                </td>
                              </tr>

                              <tr>
                                <th class="table-active">إجمالي القاعات التي تصلح كقاعات صفية</th>
                                <td colspan="8" class="text-center">
                                  <?php echo $row['countClassRoom']; ?>

                                </td>
                           
                              </tr>

                              
                              <tr>
                                <th class="table-active">إجمالي عدد دورات المياه</th>
                                <td colspan="8" class="text-center">
                                  <?php echo $row['countWC']; ?>

                                </td>
                           
                              </tr>
                            </thead>
</table>


 <!-- _____________________________________ -->
 <h6>رأي اللجنة الزائرة :-</h6>

 <table class="table table-bordered">
    <tbody class="table-active">
      <tr>
        <th >الموافقة</th>
        <th>
          عدم الموافقة
        </th>
        <!-- <th>الأسباب الرئيسية لعدم الموافقة</th> -->
        <th><?php if($row['accept_visit'] == 'عدم الموافقة') {echo 'الأسباب الرئيسية لعدم الموافقة';} else {
          echo 'ملاحظات'; }?></th>
      </tr>
      </tbody>
      <tbody  class="thead-light">
        <tr class="typeReason">
          <td><?php if($row['accept_visit'] == 'الموافقة') {echo '<ion-icon name="checkmark-outline"></ion-icon>'; }?></td>
         
          <td><?php if($row['accept_visit'] == 'عدم الموافقة') {echo '<ion-icon name="checkmark-outline"></ion-icon>'; }?></td>
          <td><?php  echo $row['reasons_not_accept_visit'] ?></td>
       
        </tr>
      </tbody>
      
  </table>

        <!-- _____________________________________ -->
<h6>اللجنة الزائرة:-</h6>
        <table class="table table-bordered table-hover main-table" >
                            <thead class="table-active">
                              <tr>
                                <th>م</th>
                                <th>الاسم</th>
                             
                              
                                <th>الوظيفة</th>
                               
                              </tr>
                            </thead>
                            <tbody>

                            <?php
$sql_visit="SELECT * FROM visit_staff_building WHERE building_number ='$id'";

$result_visit = $pdo->query($sql_visit);
$indexV = 1;

while($row2  = $result_visit->fetch(PDO::FETCH_ASSOC)) {


?>
                              <tr>
                               
                                <td><?php echo $indexV++;  ?></td>
                                <td><?php echo $row2['name'];  ?></td>
                                <td><?php echo $row2['position'];  ?></td>
                               
                              
                            </tr>

                            <?php
}
            ?>
                            </tbody>
                          </table>

                                  <!-- _____________________________________ -->

                                  
 <!-- _____________________________________ -->
 <h6>رأي الدائرة :-</h6>

 <table class="table table-bordered">
    <tbody class="table-active">
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
        <td><?php if($row['accept_department'] == 'الموافقة') {echo '<ion-icon name="checkmark-outline"></ion-icon>'; }?></td>
         
          <td><?php if($row['accept_department'] == 'عدم الموافقة') {echo '<ion-icon name="checkmark-outline"></ion-icon>'; }?></td>
          <td><?php  echo $row['reasons_not_accept_dep'] ?></td>
        </tr>
      </tbody>
      
  </table>

        <!-- _____________________________________ -->
<h6>التوصيات لمالك المدرسة لتنفيذها:- </h6>
        <table class="table table-bordered table-hover main-table" >
          <thead class="thead-light">
            <tr>
              <th class="table-active">م</th>
              <th class="align-label-end table-active">البيان</th>
           
            
             
            </tr>
          </thead>
          <tbody class="thead-light">
            <tr>
             
              <th class="table-active" >1</th>
              <td class="align-label-end">عمل سارية للعلم في الموقع المحدد أثناء الزيارة بارتفاع 12 متر حسب المواصفات والمقاييس</td>
          
          </tr>

          <tr>
             
             <th class="table-active" >2</th>
             <td class="align-label-end">توفير جهاز استشعار الحريق وعمل مخارج ولوحات للطوارئ.</td>
         
         </tr>
         <tr>
             
             <th class="table-active">3</th>
             <td class="align-label-end">التواصل مع قسم التعليم المبكر بشأن المناهج والتأثيث </td>
         
         </tr>

         <tr>
             
             <th class="table-active">4</th>
             <td class="align-label-end">عمل مغاسل في دورات المياه تتناسب مع أعمار الطلبة أو وضع أرفف خشبية تتناسب مع أطوال الطلاب</td>
         
         </tr>

         <tr>
             
             <th class="table-active">5</th>
             <td class="align-label-end">تجهيز الجمعية التعاونية حسب الاشتراطات الصحية</td>
         
         </tr>

         <tr>
             
             <th class="table-active">6</th>
             <td class="align-label-end">تهئية وتوفير مستلزمات غرفة الصحية المدرسية</td>
         
         </tr>

         <tr>
             
             <th class="table-active">7</th>
             <td class="align-label-end">عمل مظلة لساحة الطابور وساحة الألعاب وفرش ساحة الألعاب بطبقة آمنة(اسفنج، ترتان...إلخ)</td>
         
         </tr>

         <tr>
             
             <th class="table-active">8</th>
             <td>زيادة الإضاءة في جميع المرافق بما يتناسب مع مساحة كل مرفق، وضرورة تركيب المصابيح على السقف وليس الجدران الجانبية</td>
         
         </tr>

         <tr>
             
             <th class="table-active">9</th>
             <td >توفير صور صاحب الجلالة بكل الفصول بحيث تكون أعلى السبورة بنصف متر،وإضافة مصباح أعلى السبورة مع الواقي له مقاس 4 قدم</td>                           
         </tr>

         
         <tr>
             
             <th class="table-active">10</th>
             <td >ضرورة موافاتنا بتقرير الدفاع المدني (تقرير عن سلامة المنشأة من جهات الاختصاص) وتوفير طفايات حريق.</td>                           
         </tr>


         
         <tr>
             
             <th class="table-active">11</th>
             <td class="align-label-end">تغطية صناديق توزيع الكهرباء بالألمنيوم أو خشبm d f .</td>                           
         </tr>


           
         <tr>
             
             <th class="table-active">12</th>
             <td class="align-label-end">توفير صاعقات حشرات عدد (2).</td>
         </tr>

            
         <tr>
             
             <th class="table-active">13</th>
             <td class="align-label-end">تجهيز غرفة المعلمات بالمكاتب والأرفف لخدمة المعلمات.</td>
         </tr>

         <tr>
             
             <th class="table-active">14</th>
             <td class="align-label-end">تبطين جزء من قاعات رياض الأطفال بمساحة (2×3)م .</td>
         </tr>

         <tr>
             
             <th class="table-active">15</th>
             <td class="align-label-end">فتح نوافذ للقاعات الدراسية وعمل حماية للنوافذ</td>
         </tr>

         <tr>
             
             <th class="table-active">16</th>
             <td class="align-label-end">عمل بلاستيك لحامي الدرج داخل المبنى،  أو تضييق فتحات حامي الدرج الإساسي</td>
         </tr>

         <tr>
             
             <th class="table-active">17</th>
             <td class="align-label-end">تجهيز غرفة مصادر التعلم بالاجهزة والوسائل التعليمية</td>
         </tr>

         <tr>
             
             <th class="table-active">18</th>
             <td class="align-label-end">لا يُسمح للمدرسة بعمل أي إضافات بالمبنى المدرسي دون موافقة الوزارة (بناء قاعات دراسية أو غيره).</td>
         </tr>

         <tr>
             
             <th class="table-active">19</th>
             <td class="align-label-end">لا يقل إرتفاع حامي الدرج  عن متر و 50 سم</td>
         </tr>

         <tr>
             
             <th class="table-active">20</th>
             <td class="align-label-end">تعيين الهيئة الإدارية والتدريسية بشكل رسمي قبل بدء العام الدراسي 2022/2023 م</td>
         </tr>

         <tr>
             
             <th class="table-active">21</th>
             <td class="align-label-end"> ** التقيد بما ورد في التعميم الصادر بتاريخ 20/5/2019م برقم قيد 2819153836. بشأن الكثافة العددية والحد الأدنى والأعلى للشعبة الدراسية </td>
         </tr>

         <tr>
             
             <th class="table-active">22</th>
             <td class="align-label-end">ضرورة توفير مواقف للسيارات والحافلات وتأمين دخول وخروج الطلاب والمعلمين. </td>
         </tr>

         <tr>
             
             <th class="table-active">23</th>
             <td class="align-label-end">فرش الساحة بالترتان</td>
         </tr>

         <tr>
             
             <th class="table-active">24</th>
             <td class="align-label-end">تبيطين الدرج الخارجي امام المبنى وخلف المبنى وداخل المبنى</td>
         </tr>

         <tr>
             
             <th class="table-active">25</th>
             <td class="align-label-end">إغلاق المنطقة تحت الدرج</td>
         </tr>


         <tr>
             
             <th class="table-active">26</th>
             <td class="align-label-end">عمل حاجز للدرج داخل المبنى بارتفاع 1.8م</td>
         </tr>    
         
         <tr>
             
             <th class="table-active">27</th>
             <td class="align-label-end">إغلاق الطريق المؤدي إلى السطح</td>
         </tr>

         <tr>
                               
                               <th class="table-active">28</th>
                               <td class="align-label-end">سارية العلم يكون من نوع فايبرجلاس</td>
                           </tr>

         <tr>
             
             <th class="table-active">29</th>
             <td class="align-label-end">

             <div class="row">
             <div class="col-md-6">

<h5>ضرورة موافاتنا بالمستندات المتعلقة إصدار ترخيص: </h5>
</div>

<div class="col-md-6">
<div class="form-group">
 

          <?php  echo $row['type_school_license']; ?>
      </div>
</div>

</div>

             <div class="row">
<div class="col-md-6">
<div class="mb-3">1- رسالة طلب من مالك المدرسة بطلب إصدار ترخيص</div>
<div class="mb-3">2- تعبئة استمارة طلب إصدار ترخيص</div>
<div class="mb-3">3- نسخة من الموافقة المبدئية</div>
<div class="mb-3">4-

<?php  echo $row['license_fee']; ?>



</div>

<div class="mb-3">5- صورة من البطاقة الشخصية للمالك</div>
<div class="mb-3">6-
<?php  echo $row['secuirtyValue']; ?>
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
    <th class="table-active">30</th>
    <td class="align-label-end">التكرم باستكمال إجراءات  <?php echo $row['compleating_invest'];  ?> المدرسة عبر منصة استثمر بسهولة وموافاتنا: 
 <br>
 <?php
$valuesString = $row['invest_platform'];
$selectedValues = explode(",", $valuesString);
// Loop through each value and echo it on a new line
foreach ($selectedValues as $value) {
   echo $value . "<br>"; 
}
?>

  
  </td>
</tr>



         <?php
$sql_recom="SELECT * FROM recommendations_building WHERE building_number ='$id'";

$result_recom = $pdo->query($sql_recom);
$index_recom = 31;

while($row2  = $result_recom->fetch(PDO::FETCH_ASSOC)) {


?>
                              <tr>
                               
                                <th class="table-active"><?php echo $index_recom++;  ?></th>
                                <td><?php echo $row2['recommendation'];  ?></td>
                             
                              
                            </tr>

                            <?php
}
            ?>


          </tbody>
        </table>

        <!-- _____________________________________ -->

</div>

<?php

}
}
?>
</section>



<div id="resultEditReportBuilding">
</div>

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

.main-btn {
  display:none;
}
  }



</style>



<script type="text/javascript">
    $(document).ready(function(){

$(".editReportBuilding").click(function(){
  var buildingNo = Number($(".buildingNoEdit").val());

//alert(input);
// if(nonMatcNo != ""){
    $.ajax ({
        url:"buildingForm/edit_report.php",
        method: "POST",
        data: {buildingNo:buildingNo},

        success:function(data){
                      $(".sec-32").css("display", "none");

            $("#resultEditReportBuilding").html(data);
            $("#resultEditReportBuilding").css("display", "block");

        }
    });

 
});


$("#btnDeleteBui").click(function(){
  var buildingNo = Number($(".buildingNoEdit").val());

//alert(input);
// if(nonMatcNo != ""){
    $.ajax ({
        url:"buildingForm/delete.php",
        method: "POST",
        data: {buildingNo:buildingNo},

        success:function(data){
         
            $(".sec-32").css("display", "none");

        }
    });

 
});



})

function checkdelete()
  {
      return confirm('هل أنت متأكد أنك تريد الحذف   ? ')
  }
</script>
