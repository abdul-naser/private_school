<?php


$dsn = "mysql:host=localhost;dbname=p_school_db;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Other PDO configuration options can be set here if needed
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>