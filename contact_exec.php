<?php
// require_once('admin/Connections/conn.php');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['txtname']);
    $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
    $phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
    $message = mysqli_real_escape_string($conn, $_POST['txtmessage']);

    // Insert into Database
    $insertSQL1 = "INSERT INTO tbl_contact (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result1 = mysqli_query($conn, $insertSQL1);
}

header("location: index.php");
    ?>