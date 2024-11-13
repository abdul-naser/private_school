<section class="sec-41" style="display: none;">
    <div class="container mt-5">

    <!-- <div class="form-group selectContainter"> -->
        <!-- <label for="requestType" class="align-label-end">نوع الطلب</label> -->
        <!-- <select class="selectBox " name="programe_txt">
        <option disabled selected>أختر نوع الطلب</option>
            <option > أنشاء مدرسة خاصة</option>
            <option>عملية التعيينات</option>
            <option>إصدار وتجديد ترخيص مدرسة خاصة</option>

        </select>
        <div class="iconSelectBox"> 
            <ion-icon name="caret-down-outline"></ion-icon>
        </div>
    </div> -->

   <!-- ======================= Cards ================== -->
   <div class="cardBox" >

    <div class="card cardRequest">
        <div>
            <div class="numbers">1,504</div>
            <div class="cardName"> عملية أنشاء مدرسة خاصة</div>
        </div>
<input type="hidden" class="main_type_request" value="أنشاء مدرسة خاصة">
        <div class="iconBx">
            <ion-icon name="business-outline"></ion-icon>
        </div>
    </div>

    <div class="card cardRequest">
        <div>
            <div class="numbers">80</div>
            <div class="cardName">عملية التعيينات</div>
        </div>
        <input type="hidden" class="main_type_request" value="عملية التعيينات">

        <div class="iconBx">
            <ion-icon name="person-add-outline"></ion-icon>
        </div>
    </div>

    <div class="card cardRequest">
        <div>
            <div class="numbers">80</div>
            <div class="cardName"> عملية إصدار وتجديد ترخيص مدرسة خاصة</div>
        </div>
        <input type="hidden" class="main_type_request" value="إصدار وتجديد ترخيص مدرسة خاصة">

        <div class="iconBx">
            <ion-icon name="key-outline"></ion-icon>
        </div>
    </div>


   
</div>



</div>

</section>

<div id="resultFormRequest">

</div>

<script>
        $(document).ready(function(){

    $(".cardRequest").click(function(){
    var $divMainType =  $(this).closest('.cardRequest');
    var mainType =$divMainType.find(".main_type_request").val();
    var reportWriter = "<?php echo $report_writer; ?>";

    $.ajax ({
        url:"requests/ajax_formRequest.php",
        method: "POST",
        data: {mainType:mainType,reportWriter:reportWriter},

        success:function(data){
            $("#resultFormRequest").html(data);
            $("#resultFormRequest").css("display", "block");
            $(".sec-41").css("display", "none");

        }
    });

 
});
        }) 
</script>