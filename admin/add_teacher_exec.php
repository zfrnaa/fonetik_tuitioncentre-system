<?php
//include("auth.php");
/*require_once('Connections/conn.php'); 

if(isset($_POST['submit']))
    {
		date_default_timezone_set("Asia/Kuala_Lumpur");
		//$createby=1;
		//$createdon=date("Y-m-d H:i:s");

        $id_teacher = mysqli_real_escape_string($conn, $_POST['txtid_teacher']);

                $name = mysqli_real_escape_string($conn, $_POST['txtname']);
                $kp = mysqli_real_escape_string($conn, $_POST['txtic']);
                $gender = mysqli_real_escape_string($conn, $_POST['ddlgender']);
                $nation = mysqli_real_escape_string($conn, $_POST['ddlnation']);
                $religion = mysqli_real_escape_string($conn, $_POST['ddlreligion']);
                $dob = mysqli_real_escape_string($conn, $_POST['dtdob']);
                $address = mysqli_real_escape_string($conn, $_POST['txtaddress']);
                $contact = mysqli_real_escape_string($conn, $_POST['txtcontact']);
                $subject = mysqli_real_escape_string($conn, $_POST['txtsubject']);

				// Insert into Database
				$insertSQL2= "INSERT into tbl_teacher (id_teacher, name, kp, gender, nation, religion, dob, address, contact, subject) VALUES ('$id_teacher', '$name', '$kp', '$gender', '$nation', '$religion', '$dob', '$address', '$contact', '$subject')";
	            $result2 = mysqli_query($conn, $insertSQL2);
    
    }

header("location: view_allteacher.php?id_teacher=".$id_teacher);*/


if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "Connections/conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1250000) {
			$em = "Maaf, fail anda terlalu besar.";
		    header("Location: view_allteacher.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				
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

				// Insert into Database
				$insertSQL2= "INSERT into tbl_teacher (id_teacher, name, kp, gender, nation, religion, dob, address, contact, subject, image) VALUES ('$id_teacher', '$name', '$kp', '$gender', '$nation', '$religion', '$dob', '$address', '$contact', '$subject', '$new_img_name')";
	            $result2 = mysqli_query($conn, $insertSQL2);
				//echo $insertSQL2;
				// Insert into Database
				//$sql = "INSERT INTO images(image_url, id_teacher) VALUES('$new_img_name', '$id_teacher')";
				//mysqli_query($conn, $sql);
				header("Location: view_allteacher.php?id_teacher=".$id_teacher);
			}else {
				$em = "Anda tidak boleh memuat naik fail jenis ini";
		        header("Location: view_allteacher.php?error=$em");
			}
		}
	}else {
		$em = "Ralat tidak diketahui berlaku!";
		header("Location: view_allteacher.php?error=$em");
	}

}else {
	header("Location: view_allteacher.php");
}
    ?>