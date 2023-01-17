<?php
session_start();
include ('dbcon.php');

if(isset($_POST['submit-btn'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth-date'];
    $phone_number = $_POST['phone-number'];
    $password = $_POST['password'];
    $repeated_password = $_POST['repeatedPassword'];

    // TODO: Check if the password is the same

    $userProperties = [
        'email' => $email,
        'phoneNumber' => "+39" . $phone_number,
        'password' => $password,
        'displayName' => $name . $surname,
    ];
    
    $createdUser = $auth->createUser($userProperties);
    if($createdUser) {
        echo "User created successfully";
        //$link = $auth->getEmailVerificationLink($email);
        //$auth->sendEmailVerificationLink($email);
    }else{
        echo "User not created successfully";
    }
}