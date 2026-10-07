<?php
/**
 * Creates hostel database and user table for QA testing.
 * Run: php qa-tests/setup-database.php
 */
$host = 'localhost';
$user = 'root';
$pw = '';

$conn = mysqli_connect($host, $user, $pw);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error() . PHP_EOL);
}

mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS hostel');
mysqli_select_db($conn, 'hostel');

$sql = <<<'SQL'
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    gender VARCHAR(20),
    address TEXT,
    dob DATE,
    password VARCHAR(255) NOT NULL,
    isAdmin TINYINT(1) NOT NULL DEFAULT 0
)
SQL;

if (!mysqli_query($conn, $sql)) {
    die('Failed to create user table: ' . mysqli_error($conn) . PHP_EOL);
}

echo "Database 'hostel' and table 'user' are ready.\n";
