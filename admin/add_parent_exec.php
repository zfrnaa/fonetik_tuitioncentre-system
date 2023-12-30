<?php
//include("auth.php");
require_once('Connections/conn.php'); 

if(isset($_POST['submit']))
    {
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$createby=1;
		$createdon=date("Y-m-d H:i:s");
	
		$id_student = mysqli_real_escape_string($conn, $_POST['txtid_student']);
	
        /*$nama = mysqli_real_escape_string($conn, $_POST['txtnama']);
        $studentid = mysqli_real_escape_string($conn, $_POST['txtstudentid']);
        $ic = mysqli_real_escape_string($conn, $_POST['txtic']);
        $jantina = mysqli_real_escape_string($conn, $_POST['ddljantina']);
        $umur = mysqli_real_escape_string($conn, $_POST['txtumur']);
		$bangsa = mysqli_real_escape_string($conn, $_POST['ddlbangsa']);
		$agama = mysqli_real_escape_string($conn, $_POST['ddlagama']);
		$tarikh_lahir = mysqli_real_escape_string($conn, $_POST['tarikh_lahir']);
        $alamat = mysqli_real_escape_string($conn, $_POST['txtalamat']);
        $class = mysqli_real_escape_string($conn, $_POST['ddlclass']);*/
    
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
	 	
	// insert student information
	/*$insertSQL1= "INSERT into tbl_student (nama, studentid, ic, jantina, umur, bangsa, agama, tarikh_lahir, alamat, class, createby, createdon) VALUES ('$nama', '$studentid', '$ic', '$jantina', '$umur', '$bangsa', '$agama', '$tarikh_lahir', '$alamat', '$class', '$createby', '$createdon')";
	$result1 = mysqli_query($conn, $insertSQL1);*/
    
    $insertSQL2= "INSERT into tbl_parent (id_student, name, age, nation, religion, address, contact, relation, work, createby, createdon) VALUES ('$id_student', '$name', '$age', '$nation', '$religion', '$address', '$contact', '$relation', '$work', '$createby', '$createdon')";
	$result2 = mysqli_query($conn, $insertSQL2);
    
    $insertSQL3= "INSERT into tbl_work (id_student, employer_name, occupation, work_address,  createby, createdon) VALUES ('$id_student', '$employer_name', '$occupation', '$work_address',  '$createby', '$createdon')";
	$result3 = mysqli_query($conn, $insertSQL3);
    }

header("location: viewall_home.php?id_student=".$id_student);
    ?>