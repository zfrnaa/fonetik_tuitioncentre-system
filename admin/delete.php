<?php
include("auth.php");
require_once('connections/conn.php'); 

$id_student=$_GET['id_student'];

$sql="DELETE FROM tbl_student WHERE id_student = '$id_student'";

$val= $conn->query($sql);
if($val){
header('location: view_allstudent.php');

};

/*$sqlupdate="update tbl_student set tbl_student.flg_student='0' where tbl_student.id_student='$id_student'";
$conn->query($sqlupdate); 

header('location: view_allstudent.php');*/
?>