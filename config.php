<?php
$host = "localhost"; // usually 'localhost'
$user = "root";      // your DB username
$pass = "";          // your DB password
$dbname = "sk_auto"; // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
