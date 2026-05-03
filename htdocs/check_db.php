<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'bdnote';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$result = $conn->query('DESCRIBE users');
if ($result) {
    echo 'Users table structure:<br>';
    while ($row = $result->fetch_assoc()) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
} else {
    echo 'Error describing table: ' . $conn->error;
}
$conn->close();
?>