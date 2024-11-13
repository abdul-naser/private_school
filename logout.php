<?php
session_start();
unset($_SESSION['schoolPrivate']);



header('location:index.php');

exit;


?>