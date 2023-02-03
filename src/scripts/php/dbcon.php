<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
        ->withServiceAccount(__DIR__ . '/.credentials.json')
        ->withDatabaseUri('https://accesscontrollist-acl-default-rtdb.europe-west1.firebasedatabase.app/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();