<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'bdnote';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$result = $conn->query("SHOW COLUMNS FROM users LIKE 'password'");
if ($result->num_rows == 0) {
    echo 'Password column does not exist. Adding it now...<br>';
    if ($conn->query("ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL")) {
        echo 'Password column added successfully.';
    } else {
        echo 'Error adding password column: ' . $conn->error;
    }
} else {
    echo 'Password column already exists.';
}
$conn->close();
?>