<?php
include("mysqlcon.php");

$newRole = $_POST['newRole'];
$userUID = $_POST['userUID'];

// query modify user role
$sql = "UPDATE acl.user SET id_role = '$newRole' WHERE id_user = '$userUID'";
$conn->query($sql);

?>