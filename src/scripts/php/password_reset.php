<?php

session_start();
include ('dbcon.php');

$email = $_POST['email'];

$auth->sendPasswordResetLink($email);
echo "Check your email inbox to reset your password";