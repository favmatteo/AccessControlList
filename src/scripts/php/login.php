<?php
session_start();

use Kreait\Firebase\Exception\Auth\FailedToVerifySessionCookie;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;

include ('dbcon.php');
include ('exceptions/confirmEmailException.php');


if(isset($_POST['submit-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $user = $auth->getUserByEmail($email);
        $emailVerified = $user->emailVerified;
        
        // Check if email is confirmed
        if(!$emailVerified){
            throw new confirmEmailException();
        }

        // if it is confirmed
        // start cookie session (valid for 7 days)
        $oneWeek = new DateInterval('P7D');
        $token = $signInResult->asTokenResponse()['id_token'];
        //print_r($token);
        $sessionCookieString = $auth->createSessionCookie($token, $oneWeek);
        $verifiedSessionCookie = $auth->verifySessionCookie($sessionCookieString);

    }catch(FailedToSignIn $e) {
        echo "Wrong email or password";
    }catch(confirmEmailException  $e) {
        echo $e;
    }catch(FailedToVerifySessionCookie $e){
        echo 'The Session Cookie is invalid: '.$e->getMessage(); 
    }
}