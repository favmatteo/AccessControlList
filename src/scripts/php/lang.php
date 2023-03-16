<?php

session_start();


    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['language'])){
    $language = 'en_US.utf8';
}else{
    $language = $_SESSION['language'];
}

$_SESSION['language'] = $language;
# echo $_SESSION['language'];

putenv("LANG=" . $language); 
setlocale(LC_ALL, $language);

$domain = "messages";
bindtextdomain($domain, "locale"); 
bind_textdomain_codeset($domain, 'UTF-8');
textdomain($domain);

# echo _('HELLO_WORLD');
 
