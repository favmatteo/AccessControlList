<?php

use Kreait\Firebase\Exception\Auth\FailedToVerifySessionCookie;
include ('dbcon.php');

session_start();

if(!isset($_SESSION['session-cookie'])){
    echo json_encode(array("logged" => false));
} else {
    $sessionCookieString = $_SESSION['session-cookie'];
    try {
        $verifiedSessionCookie = $auth->verifySessionCookie($sessionCookieString);
        echo json_encode(array("logged" => true));
    } catch (FailedToVerifySessionCookie $e) {
        die(header("location: login.html"));
        echo json_encode(array("logged" => false));
    }
}