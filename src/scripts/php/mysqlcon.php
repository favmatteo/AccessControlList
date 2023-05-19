<?php

$password_file = fopen(__DIR__ . '/.mysql-password', 'r');
$pass = trim(fgets($password_file));
fclose($password_file);

$host = 'dev.favmatteo.me';
$user = 'root';
$port = 9906;
$db = 'acl';
$conn = new mysqli($host, $user, $pass, $db, $port);

$success_connection = true;
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    $success_connection = false;
}
