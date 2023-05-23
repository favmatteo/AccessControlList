<?php
include("mysqlcon.php");

$newZone = $_POST['newZone'];
$userUID = $_POST['userUID'];

// query modify user role
$sql = "UPDATE acl.user SET zone = '$newZone' WHERE id_user = '$userUID'";
$conn->query($sql);
