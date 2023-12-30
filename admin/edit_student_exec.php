<?php
//include("auth.php");
require_once('Connections/conn.php');

// Assuming you have received the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the subjects array is set in the form submission
    if (isset($_POST['subjects']) && is_array($_POST['subjects'])) {

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $createby = 1;
        $createddt = date("Y-m-d H:i:s");

        $id_student = mysqli_real_escape_string($conn, $_POST['txtid_student']);

        $nama = mysqli_real_escape_string($conn, $_POST['txtnama']);
        $ic = mysqli_real_escape_string($conn, $_POST['txtic']);
        $jantina = mysqli_real_escape_string($conn, $_POST['ddljantina']);
        $umur = mysqli_real_escape_string($conn, $_POST['txtumur']);
        $bangsa = mysqli_real_escape_string($conn, $_POST['ddlbangsa']);
        $agama = mysqli_real_escape_string($conn, $_POST['ddlagama']);
        $tarikh_lahir = mysqli_real_escape_string($conn, $_POST['tarikh_lahir']);
        $alamat = mysqli_real_escape_string($conn, $_POST['txtalamat']);
        $fee = mysqli_real_escape_string($conn, $_POST['actual_fee']);

        // Sanitize and validate other form inputs if needed

        $selectedSubjects = $_POST['subjects'];

        // Convert the array of selected subjects to a comma-separated string
        $subjectString = implode(", ", $selectedSubjects);

        $updateQuery = "UPDATE tbl_student SET 
            nama='$nama', 
            jantina='$jantina', 
            umur='$umur', 
            bangsa='$bangsa', 
            agama='$agama', 
            tarikh_lahir='$tarikh_lahir', 
            alamat='$alamat', 
            subject='$subjectString',
            fee='$fee',
            updateby='$createby' 
            WHERE id_student='$id_student'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "No subjects selected"; // Handle the case where no subjects are selected
    }
}

// Redirect back to the previous page or wherever needed
//header('location: view_all.php?id_student=' . $id_student);
?>
<script type="text/javascript">
parent.window.location.reload();
parent.TINY.box.hide();
</script>
