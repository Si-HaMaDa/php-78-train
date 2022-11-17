<?php
session_start();

$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_dbname = "php_78";

try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_dbname", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<h1>Connection Error: " . $e->getMessage() . "</h1>";
}

$errors = [];
