<?php
require('mysqlcon.php');

session_start();

$invoice_id = $_POST['invoice_id'];
$invoice_title = $_POST['invoice_title'];
$invoice_amount = $_POST['invoice_amount'];
$invoice_typology = $_POST['invoice_typology'];
$invoice_description = $_POST['invoice_description'];

if (isset($invoice_title) && isset($invoice_amount) && isset($invoice_typology) && isset($invoice_description)) {
    $query = "UPDATE acl.invoice SET title = '$invoice_title', amount = '$invoice_amount', typology = '$invoice_typology', description = '$invoice_description' WHERE id_invoice = '$invoice_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Invoice updated successfully";
    } else {
        echo "Error updating invoice";
    }
}
