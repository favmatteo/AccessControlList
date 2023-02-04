<?php

$host = 'db';
$user = 'root';
$pass = 'root';
$conn = new mysqli($host, $user, $pass);
$success_connection = true;
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    $success_connection = false;
}