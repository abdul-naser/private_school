<?php
include 'conn.php';

if (isset($_POST['schoolName'])) {
    $schoolName = $_POST['schoolName'];

    // Using a prepared statement to prevent SQL injection
    $sql_city = "SELECT school_name, number FROM school_private_main WHERE school_name = :schoolName";
    $stmt = $pdo->prepare($sql_city);
    $stmt->bindParam(':schoolName', $schoolName, PDO::PARAM_STR); // Binding the parameter

    try {
        $stmt->execute(); // Execute the prepared statement
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result

        if ($row) {
            echo $row["number"]; // Output the 'number' if found
        } else {
            echo "No results found."; // Handle case where no matching record exists
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Display error message in case of failure
    }
}
?>
