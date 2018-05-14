<?php
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', "employee_management");
define('ROOT', __DIR__."/");


// Create connection
$conn = new mysqli(servername, username, password, dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>