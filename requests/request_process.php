<?php

include '../conn.php';


if (isset($_POST['submitRequest'])) {

    $main_request = $_POST['mainType'];

    $type_request = $_POST['type_request'];
    // $no_school = $_POST['no_school'];

    $no_school = !empty($_POST['no_school']) ? $_POST['no_school'] : NULL;

    $applicant_name = $_POST['applicant_name'];

    $number_email = $_POST['number_email'];
    $status_request = $_POST['status_request'];
    $date_request = !empty($_POST['date_request']) ? $_POST['date_request'] : NULL;
    $date_send_request = !empty($_POST['date_send_request']) ? $_POST['date_send_request'] : NULL;
    $note = $_POST['note'];
    $fee_collection = $_POST['fee_collection'];

    $reportWriter = $_POST['reportWriter'];

//     $sql = "INSERT INTO requests (main_type,type_request,school_name,number_email,status_request,date_request,date_send_request,note,request_write) 
// VALUES ('$main_request','$type_request', '$school_name', '$number_email', '$status_request', '$date_request', '$date_send_request', '$note','$reportWriter')";


$sql = "INSERT INTO requests 
    (main_type, type_request, no_school, applicant_name, number_email, status_request, date_request, date_send_request, note, fee_collection, request_write) 
VALUES 
    (
        '$main_request', 
        '$type_request', 
        " . ($no_school ? "'$no_school'" : "NULL") . ", 
        '$applicant_name', 
        '$number_email', 
        '$status_request', 
        " . ($date_request ? "'$date_request'" : "NULL") . ", 
        " . ($date_send_request ? "'$date_send_request'" : "NULL") . ", 
        '$note', 
        '$fee_collection', 
        '$reportWriter'
    )";
    $result = $pdo->query($sql);


    if($result) 
{
    echo "<script>
    alert('تم ارسال البيانات بنجاح');
    window.location='../main.php';
    </script>";

    exit();

}

}

?>