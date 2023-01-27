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

    if ($_POST['phone-number'] == 10) {
        echo "the number is correct";

        if ($_POST['password'] == $_POST['repeatedPassword']) {
            $userProperties = [
                'email' => $email,
                'emailVerified' => false,
                'phoneNumber' => "+39" . $phone_number,
                'password' => $password,
                'displayName' => $name . " " . $surname,
            ];

            $users = $auth->listUsers();

            $exist = false;
            foreach ($users as $user) {
                if ($user->email == $email) {
                    $exist = true;
                }
            }


            if (!$exist) {
                $createdUser = $auth->createUser($userProperties);
                if ($createdUser) {
                    echo "User created successfully, open the link on the email for confirm the account";
                    $auth->sendEmailVerificationLink($email);
                } else {
                    echo "User not created successfully";
                }
            } else {
                echo "Email already used";
            }
        } else {
            echo "the phone number isn't 10 characters";
        }
    } else {
        echo ("the passwords not match! re-enter the correct password.");
    }
}
