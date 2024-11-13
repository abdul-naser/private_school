<?php

include '../conn.php';


extract($_POST);

$data = '';
$update_data = '';

foreach($_POST as $k => $v) {
    if (empty($data)) {
        $data .= "$k ='$v'";
    } else {
        $data .= ", $k='$v'";
    }
    // Build update data string
    if (!empty($update_data)) {
        $update_data .= ", ";
    }
    $update_data .= "$k='$v'";
}

$sql = "INSERT INTO school_private_main set $data ON DUPLICATE KEY UPDATE $update_data";
$result = $pdo->query($sql);

if($results) {
    echo "Data Submitted Successfully";
} else {
    echo "Data submission has failed, Please Try Again";
}