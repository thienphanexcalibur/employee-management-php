<?php
header("Content-type: text/html; charset=utf-8");
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', "employee_management");
define('ROOT', __DIR__."/");


// Create connection
$conn = new mysqli(servername, username, password, dbname);

mysqli_set_charset($conn, 'UTF8');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>