<?php
$host = 'localhost';
$user = 'root';
$password = 'root'; // From my.ini file
$database = 'bdnote';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
echo 'Connected successfully';
$conn->close();
?>