<?php
//include("auth.php");
require_once('Connections/conn.php'); 

		date_default_timezone_set("Asia/Kuala_Lumpur");
		//$createby=1;
		//$createdon=date("Y-m-d H:i:s");
	
		$id_teacher = mysqli_real_escape_string($conn, $_POST['txtid_teacher']);
    
        $name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $kp = mysqli_real_escape_string($conn, $_POST['txtkp']);
        $gender = mysqli_real_escape_string($conn, $_POST['ddlgender']);
        $nation = mysqli_real_escape_string($conn, $_POST['ddlnation']);
        $religion = mysqli_real_escape_string($conn, $_POST['ddlreligion']);
        $dob = mysqli_real_escape_string($conn, $_POST['dtdob']);
        $address = mysqli_real_escape_string($conn, $_POST['txtaddress']);
        $contact = mysqli_real_escape_string($conn, $_POST['txtcontact']);
        $subject = mysqli_real_escape_string($conn, $_POST['ddlsubject']);
    
  $sqla = "UPDATE tbl_teacher set name='$name', kp='$kp', gender='$gender', nation='$nation', religion='$religion', dob='$dob', address='$address', contact='$contact', subject='$subject' WHERE id_teacher='$id_teacher'";
	
  $conn->query($sqla);
    
    //header('location: view_all.php?id_staff='.$ids);
?>

<script type="text/javascript">
parent.window.location.reload();
parent.TINY.box.hide();
</script>