


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="library/dselect.js"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>بيانات الهيئة الإدارية والتدريسية بالمدرسة الخاصة</title>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</head>

<?php

include 'conn.php';
if(isset($_POST['submit'])) {

   



  $code_school = $_POST['code_school'];
  $name_school = $_POST['name_school'];
  $devicePairs = $_POST["devicePairs"];
  $sql = "INSERT INTO schools_relation_employees(name_school,code_school) VALUES('$name_school','$code_school')";
  $result = $pdo->query($sql);


    foreach ($devicePairs as $pair) {

      $name = $pair['name'];
      $phone = $pair['phone'];
      $position = $pair["position"];
      $national = $pair["national"];
      $date_appointment = $pair["date_appointment"];
      $qualification = $pair["qualification"];
      $classes = $pair["classes"];
      $appointment = $pair["appointment"];

      

        
$sql2 = "INSERT INTO schools_employee_new(`school_code`, `school_name` ,`name`, `phone`, `position`, `national`, `date_appointment`, `qualification`, `classes`, `appointment`) VALUES('$code_school','$name_school','$name','$phone','$position','$national'
,'$date_appointment','$qualification','$classes','$appointment')";
$sql_res = $pdo->query($sql2);

    }
    if($sql_res) {
      echo '<script> alert("تم أرسال البيانات بنجاح"); </script>';
      echo "<script> window.location.href='end.php'</script>";
   }

}

?>
<body>

<header class="container ">
    <img src="a.png">

    <img src="oman_vision.jpg">

</header>


<form action="" method="post" onsubmit="return confirm('هل أنت متأكد من أنك تريد إرسال البيانات؟');">



    <div class="container  main-form">

        <div class="tittle  " >
            <h4 class="text-center mb-3">بيانات الهيئة الإدارية والتدريسية بالمدرسة الخاصة للعام الدراسي 2024 / 2025 م</h4>
            <p class="text-center">
    الرجاء تعبئة الإستمارة باللغة العربية بإستثاء الاسم اذا كان أجنبيا 
    <span class="text-danger">(مع مراعاة مطابقة مجموع الهيئتين الادارية والتدريسية مع الإستمارة الإلكترونية)</span>
</p>
      
            <div class="mb-3 mt-3">
                <label for="pwd">  رمز المدرسة:</label>
                <input type="text" class="form-control" name="code_school"  placeholder="" required>
              </div>
            <div class="mb-3 mt-3">
                <label for="pwd"> أسم المدرسة الخاصة:</label>
                <input type="text" class="form-control" name="name_school"  placeholder="" required>
              </div>

          </div>

          <table class="table table-bordered mt-5">
        <thead>
          <tr class="table-active">
            <td></td>
            <td> الاسم ( ربــــاعيــــاً )</td>
            <td>الهاتف</td>
            <td>الوظيفة حسب قرار التعيين</td>
            <td>الجنسية</td>
            <td>تاريخ التعيين</td>
            <td>المؤهل الدراسي </td>
            <td>الصفوف التي يدرسها</td>

            <td>التعيين</td>

          </tr>
        </thead>
        <tbody id="deviceCount">
          <tr>
            <td>1</td>
            <td>
            <input type="text" name="devicePairs[0][name]" class="form-control" required>
            </td>
            <td><input type="text" name="devicePairs[0][phone]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[0][position]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[0][national]" class="form-control" required></td>
            <td><input type="date" name="devicePairs[0][date_appointment]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[0][qualification]" class="form-control" required></td>

            <td><input type="text" name="devicePairs[0][classes]" class="form-control" required></td>
            <td>
          <select name="devicePairs[0][appointment]" id="" required class="form-control">
            <option></option>
            <option>قرار رسمي </option>
            <option>بدون قرار</option>

          </select>
          </td>



          </tr>
        </tbody>
      </table>
      <button type="button" onclick="addDevicePair()" class="btn btn-success"><ion-icon name="add-outline"></ion-icon></button>
      <input type="submit" name="submit" class="btn btn-success" value="أرسال البيانات">
    </form>
  </div>

  <script>
    let index = 1;
    let numberRow = 2;

    // function checkForDuplicates(selectElement) {
    //   const selectedValue = selectElement.value;
    //   const allSelects = document.querySelectorAll('select[name^="devicePairs["]');

    //   for (const select of allSelects) {
    //     if (select !== selectElement && select.value === selectedValue) {
    //       alert("تنبيه: لقد قمت بتحديد هذه الالة بالفعل في صف آخر");
    //       selectElement.value = ""; // Clear the selected value
    //       return false;
    //     }
    //   }
    //   return true;
    // }

    function addDevicePair() {
      const deviceCountTableBody = document.getElementById("deviceCount");
      const newDeviceRow = document.createElement("tr");
      newDeviceRow.innerHTML = `
<td>${numberRow}</td>
            <td>
            <input type="text" name="devicePairs[${index}][name]" class="form-control" required>
            </td>
            <td><input type="text" name="devicePairs[${index}][phone]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[${index}][position]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[${index}][national]" class="form-control" required></td>
            <td><input type="date" name="devicePairs[${index}][date_appointment]" class="form-control" required></td>
            <td><input type="text" name="devicePairs[${index}][qualification]" class="form-control" required></td>

            <td><input type="text" name="devicePairs[${index}][classes]" class="form-control" required></td>
            <td>
          <select name="devicePairs[${index}][appointment]" id="" required class="form-control">
            <option></option>
            <option>قرار رسمي </option>
            <option>بدون قرار</option>

          </select>
          </td>
        <td><button type="button" onclick="removeDeviceRow(this)" class="btn btn-danger">إزالة</button></td>
      `;
      deviceCountTableBody.appendChild(newDeviceRow);
      index++;
      numberRow++;

    }

    function removeDeviceRow(button) {
      const rowToRemove = button.closest("tr");
      rowToRemove.remove();
      numberRow--;

    }
  </script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
