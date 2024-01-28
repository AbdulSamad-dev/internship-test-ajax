<?php
error_reporting(0);
// ini_set('display_errors', '1');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
