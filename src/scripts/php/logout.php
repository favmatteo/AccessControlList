<?php

session_start();
$lang = $_SESSION['language'];
session_destroy();
session_start();
$_SESSION['language'] = $lang;