<?php

session_start();
include ('dbcon.php');

if(isset($_POST['submit-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $user = $auth->getUserByEmail($email);
        $auth->setCustomUserClaims($user->uid, ['confirmedEmail' => 1]);
        echo "Email confirmed";
    }catch(Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
        echo "Wrong email or password";
    }
}