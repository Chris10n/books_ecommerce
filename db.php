<?php
$host = "localhost";
$user = "root";    // default user for XAMPP
$pass = "";        // leave blank unless you set a MySQL password
$dbname = "books_db";  // ✅ correct database

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}
?>
