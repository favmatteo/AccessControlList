<?php

use Kreait\Firebase\Auth\UserQuery;
use Kreait\Firebase\Exception\Auth\EmailExists;

include('dbcon.php');
include('mysqlcon.php');
session_start();


$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$birth_date = $_POST['birthDate'];
$phone_number = $_POST['phoneNumber'];
$password = $_POST['password'];
$repeated_password = $_POST['repeatedPassword'];

// Check if phone number is valid
$validPhoneNumber = true;
if(strlen($phone_number) != 10){ 
    echo "<div class=\"alert alert-danger\" role=\"alert\">
            The number is not valid!
          </div>";
    $validPhoneNumber = false;
}

// Check if the password is the same
$validPassword = true;
if($_POST['password'] != $_POST['repeatedPassword']){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
            Password should be the same!
          </div>";
    $validPassword = false;
}

// Check if email is available
$validEmail = true;
$users = $auth->listUsers();
foreach ($users as $user) {
    if ($user->email == $email) {
        echo "<div class=\"alert alert-warning\" role=\"alert\">
                Email is already used!
              </div>";
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
        $user = $auth->getUserByEmail($email);
        $defaultProfilePhoto = 'https://cdn-icons-png.flaticon.com/512/149/149071.png';

        // Add user to the database
        $SQL = "INSERT INTO acl.user (id_user, name, surname, email, photo, id_role) VALUES ('$user->uid', '$name', '$surname', '$email', '$defaultProfilePhoto', 1);";
        // Execute the query
        $result = $conn->query($SQL);
        if ($result) {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                    User created successfully, open the link on the email for confirm the account
                  </div>";
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\">
                    User not created successfully try again
                  </div>";
        }

        $auth->sendEmailVerificationLink($email);
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\">
                User not created successfully try again
              </div>";
    }
}

