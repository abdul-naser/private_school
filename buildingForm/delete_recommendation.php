<?php
include 'conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM recommendations_building WHERE no = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    if ($stmt->rowCount() > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
