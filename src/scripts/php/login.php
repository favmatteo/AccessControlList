<?php
session_start();

use Kreait\Firebase\Exception\Auth\FailedToVerifySessionCookie;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;
use Kreait\Firebase\Exception\InvalidArgumentException;

include ('dbcon.php');
include ('exceptions/confirmEmailException.php');


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
    echo "<div class=\"alert alert-danger\" role=\"alert\">
            Wrong email or password
          </div>";
}catch(confirmEmailException  $e) {
    echo "<div class=\"alert alert-info\" role=\"alert\">
            {$e->getMessage()}
          </div>";
}catch(FailedToVerifySessionCookie $e){
    echo "<div class=\"alert alert-warning\" role=\"alert\">
            The Session Cookie is invalid: {$e->getMessage()}
          </div>";
}catch(InvalidArgumentException $e) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">
            {$e->getMessage()}
          </div>";
}
