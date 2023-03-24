<?php

session_start();

if(isset($_POST['language'])){
    $_SESSION['language'] = $_POST['language'];
}else if(isset($_POST['user_per_page'])){
    $_SESSION['user-per-page'] = $_POST['user_per_page'];
}