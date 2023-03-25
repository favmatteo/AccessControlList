<?php

require(__DIR__ . "/mysqlcon.php");

if (isset($_POST['invoice_id']) && is_numeric($_POST['invoice_id'])) {
    $idInvoice = $_POST['invoice_id'];

    $idInvoice = mysqli_real_escape_string($conn, $idInvoice);

    $sql = "DELETE FROM acl.invoice WHERE id_invoice = '$idInvoice'";
    $result = $conn->query($sql);

    if ($result == false) {
        $error = mysqli_error($conn);
        echo "Error executing query: $error";
    } else {
        echo "Invoice deleted";
    }
} else {
    echo "Error: invoice id not valid";
}
