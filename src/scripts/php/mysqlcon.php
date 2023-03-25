<?php

$password_file = fopen(__DIR__ . '/.mysql-password', 'r');
$pass = trim(fgets($password_file));
fclose($password_file);

$host = 'db-mysql-fra1-04517-do-user-13540651-0.b.db.ondigitalocean.com';
$user = 'doadmin';
$port = 25060;
$db = 'acl';
$conn = new mysqli($host, $user, $pass, $db, $port);

$success_connection = true;
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    $success_connection = false;
}
