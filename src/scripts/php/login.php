<?php
session_start();
include ('dbcon.php');

if(isset($_POST['submit-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    try{
        // TODO: check if user confirm email
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        //print_r($signInResult->data());
        echo "Successfully login";
    }catch(Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
        echo "Wrong email or password";
    }
}