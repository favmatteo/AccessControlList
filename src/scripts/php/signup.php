<?php

use Kreait\Firebase\Auth\UserQuery;
use Kreait\Firebase\Exception\Auth\EmailExists;

session_start();
include('dbcon.php');

if (isset($_POST['submit-btn'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth-date'];
    $phone_number = $_POST['phone-number'];
    $password = $_POST['password'];
    $repeated_password = $_POST['repeatedPassword'];

    // Check if phone number is valid
    $validPhoneNumber = true;
    if($_POST['phone-number'] != 10){ 
        echo "The number is not valid!<br>";
        $validPhoneNumber = false;
    }

    // Check if the password is the same
    $validPassword = true;
    if($_POST['password'] != $_POST['repeatedPassword']){
        echo "Password should be the same!<br>";
        $validPassword = false;
    }

    // Check if email is available
    $validEmail = true;
    $users = $auth->listUsers();
    foreach ($users as $user) {
        if ($user->email == $email) {
            echo "Email is already used!<br>";
            $validEmail = false;
            break;
        }
    }

    if ($validEmail && $validPhoneNumber && $validPassword) {
        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'phoneNumber' => "+39" . $phone_number,
            'password' => $password,
            'displayName' => $name . " " . $surname,
        ];

        $createdUser = $auth->createUser($userProperties);
        if ($createdUser) {
            echo "User created successfully, open the link on the email for confirm the account";
            $auth->sendEmailVerificationLink($email);
        } else {
            echo "User not created successfully";
        }
    }
}
