<?php
require_once('Connections/conn.php'); 

if (isset($_POST['submit'])) {

    $usernm = mysqli_real_escape_string($conn, $_POST['txtusernm']);
    $pwd = mysqli_real_escape_string($conn, $_POST['txtpwd']);
    $nama = mysqli_real_escape_string($conn, $_POST['txtnama']);

    // Insert into Database
    $insertSQL1 = "INSERT INTO profile (usernm, pwd, nama) VALUES ('$usernm', '$pwd', '$nama')";
    $result1 = mysqli_query($conn, $insertSQL1);

    header("location: utama.php");
} else {
    echo "Tidak sah";
}

    ?>