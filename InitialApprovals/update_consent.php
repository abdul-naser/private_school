<?php
include '../conn.php';



// Get POST data
$consent = $_POST['consent'];
$id = $_POST['id'];
$typeRequest = $_POST['typeRequest'];
$schoolNo = $_POST['schoolNo']; 



if ($typeRequest === 'طلب إنشاء مدرسة خاصة') {


   if ($consent ==='موافقة' && empty($schoolNo)) {
    $sqlNewSch = "INSERT INTO school_private_main() VALUES()";
    $pdo->query($sqlNewSch);

       // Get the newly inserted id
       $schoolNoNew = $pdo->lastInsertId();

       // Update the requests table with the new school number
       $sql = "UPDATE requests SET consent = '$consent', no_school = $schoolNoNew WHERE no = $id";
       $result = $pdo->query($sql);

   }

   if ($consent ==='مرفوضة' && !empty($schoolNo)) {

    $sql = "DELETE FROM school_private_main WHERE number  = $schoolNo";
    $result = $pdo->query($sql);

    $sql = "UPDATE requests SET consent = '$consent', no_school = NULL WHERE no = $id";
    $result = $pdo->query($sql);
}

else {

    $sql = "UPDATE requests SET consent = '$consent' WHERE no = $id";
    $result = $pdo->query($sql);
}

}



if ($result->execute()) {
    echo "Consent updated successfully";
} else {
    echo "Error updating record: " . $pdo->error;
}

$stmt->close();
$pdo->close();

?>