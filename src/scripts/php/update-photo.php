<?php
require('mysqlcon.php');

if (isset($_POST['userId']) && isset($_POST['photo'])) {
    $userId = $_POST['userId'];
    $photo = $_POST['photo'];

    $userId = mysqli_real_escape_string($conn, $userId);
    $photo = mysqli_real_escape_string($conn, $photo);

    $sql = "UPDATE acl.user SET photo = '$photo' WHERE id_user = '$userId'";
    $result = $conn->query($sql);

    if ($result == false) {
        $error = mysqli_error($conn);
        echo "Error executing query: $error";
    } else {
        echo "success";
    }
}
