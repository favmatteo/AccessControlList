<?php
include("mysqlcon.php");

$invoice_id = $_POST['invoice_id'];


// get invoice with invoice_id
$sql = "SELECT * FROM acl.invoice WHERE id_invoice = '$invoice_id'";
$result = mysqli_query($conn, $sql);
// print only the first row
$row = mysqli_fetch_assoc($result);
$json = json_encode($row);
echo $json;
