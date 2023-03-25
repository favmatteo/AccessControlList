<?php

session_start();

if(isset($_POST['language'])){
    $_SESSION['language'] = $_POST['language'];
}