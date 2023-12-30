<?php
//include("auth.php");
require_once('Connections/conn.php'); 

		date_default_timezone_set("Asia/Kuala_Lumpur");
		$createby=1;
		$createdon=date("Y-m-d H:i:s");
	
		$id_student = mysqli_real_escape_string($conn, $_POST['txtid_student']);
    
        $name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $age = mysqli_real_escape_string($conn, $_POST['txtage']);
		$nation = mysqli_real_escape_string($conn, $_POST['ddlnation']);
		$religion = mysqli_real_escape_string($conn, $_POST['ddlreligion']);
        $address = mysqli_real_escape_string($conn, $_POST['txtaddress']);
        $contact = mysqli_real_escape_string($conn, $_POST['txtcontact']);
        $relation = mysqli_real_escape_string($conn, $_POST['txtrelation']);
    
        $work = mysqli_real_escape_string($conn, $_POST['ddlwork']);
        if ($work==1)
        {
            $employer_name = mysqli_real_escape_string($conn, $_POST['txtemployer_name']);
            $occupation = mysqli_real_escape_string($conn, $_POST['txtoccupation']);
		    $work_address = mysqli_real_escape_string($conn, $_POST['txtwork_address']);
        }
        else
        {
            $employer_name = "";
            $occupation = "";
		    $work_address = "";
        }
	 	
  $sqla = "UPDATE tbl_parent set name='$name', age='$age', nation='$nation', religion='$religion', address='$address', contact='$contact', relation='$relation', work='$work', updateby='$usr' WHERE id_student='$id_student' ";
	
  $conn->query($sqla);

  $sqlb = "UPDATE tbl_work set employer_name='$employer_name', occupation='$occupation', work_address='$work_address', updateby='$usr' WHERE id_student='$id_student' ";

  $conn->query($sqlb);
    
    //header('location: view_all.php?id_staff='.$ids);
?>

<script type="text/javascript">
parent.window.location.reload();
parent.TINY.box.hide();
</script>