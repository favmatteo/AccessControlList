<?php

$host = 'db';
$user = 'root';
$pass = 'Capyz0ra@1920';
$conn = new mysqli($host, $user, $pass);
$success_connection = true;
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    $success_connection = false;
}
