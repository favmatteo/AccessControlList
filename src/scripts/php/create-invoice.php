<?php

require('dbcon.php');
require('mysqlcon.php');

session_start();

if(!$success_connection){
    echo "Error: " . $SQL . "<br>" . $conn->error;
    return;
}

$date = $_POST['invoice_date'];
$amount = $_POST['invoice_import'];
$title = $_POST['invoice_title'];
$typology = $_POST['invoice_type'];
$description = $_POST['invoice_description'];
$invoice_customer = $_POST['invoice_customer'];

$user = $_SESSION['user'];
// Convert data dd-mm-yyyy to mysql date
$date = date("Y-m-d", strtotime($date));

$SQL = "INSERT INTO acl.invoice (date, amount, title, typology, description, id_user, id_customer) VALUES ('$date', '$amount', '$title', '$typology', '$description', '$user->uid', $invoice_customer);";
$result = $conn->query($SQL);
if ($result) {
    echo "Invoice created";
} else {
    echo "Error: " . $SQL . "<br>" . $conn->error;
}
