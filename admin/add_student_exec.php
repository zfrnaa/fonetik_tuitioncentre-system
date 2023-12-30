<?php
require_once('Connections/conn.php'); 

if (isset($_POST['submit']) && isset($_POST['subjects'])) {
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $createby = 1;
    $createdon = date("Y-m-d H:i:s");

    $nama = mysqli_real_escape_string($conn, $_POST['txtnama']);
    $ic = mysqli_real_escape_string($conn, $_POST['txtic']);
    $jantina = mysqli_real_escape_string($conn, $_POST['ddljantina']);
    $umur = mysqli_real_escape_string($conn, $_POST['txtumur']);
    $bangsa = mysqli_real_escape_string($conn, $_POST['ddlbangsa']);
    $agama = mysqli_real_escape_string($conn, $_POST['ddlagama']);
    $tarikh_lahir = mysqli_real_escape_string($conn, $_POST['tarikh_lahir']);
    $alamat = mysqli_real_escape_string($conn, $_POST['txtalamat']);
    //$fee = mysqli_real_escape_string($conn, $_POST['fee']);
    $fee = mysqli_real_escape_string($conn, $_POST['actual_fee']);


    $subject = implode(", ", $_POST['subjects']);

    $insertSQL1 = "INSERT INTO tbl_student (nama, ic, jantina, umur, bangsa, agama, tarikh_lahir, alamat, subject, fee, createby, createdon) VALUES ('$nama', '$ic', '$jantina', '$umur', '$bangsa', '$agama', '$tarikh_lahir', '$alamat', '$subject', '$fee', '$createby', '$createdon')";

    $result1 = mysqli_query($conn, $insertSQL1);

    if ($result1) {
        echo "Data pelajar dan subjek dipilih berjaya dimuat naik.";
        header("location: add_parent.php?ic=".$ic);
    } else {
        $em = "Ralat menyimpan data pelajar dan subjek terpilih dalam pangkalan data: " . mysqli_error($conn);
        echo $em;
    }
} else {
    echo "Borang tidak dihantar atau subjek tidak dipilih.";
}

header("location: add_parent.php?ic=".$ic);
?>
