<?php
require_once('Connections/conn.php'); 
$_SESSION['SESS_TYPE']=0;
//include 'menu.php'; 

//$id_staff=$_GET['txtic'];
//$ids=$_GET['id_staff'];

$today = date("d-m-Y");
$tarikh1 = date("Y-m-d");

$time = time();
$tarikh = date("Y-m-d" , $time);

$ic = mysqli_real_escape_string($conn,$_POST['txtic']);
?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-size: x-large;
}
.style3 {font-size: large}
-->
</style>
</head>
<body>
<br>
<br>
<?php

/*if ($tarikh >'2022-02-06')

{*/
?>

<?php
/*}
else
{*/
?>



<?php
	$ic = mysqli_real_escape_string($conn,$_POST['txtic']);
	
$query_reckp = "SELECT * FROM tbl_student WHERE ic='$ic' and flg_student='1'";
$reckp = mysqli_query($conn,$query_reckp);
$row_reckp = mysqli_fetch_array($reckp,MYSQLI_ASSOC);
$totalRows_reckp = mysqli_num_rows($reckp);
//echo  $query_reckp;
	//$ids=$row_reckp['id_staff'];

if ($totalRows_reckp>0)
{ 
    //echo "The student already exist";
	
		$id_student=$row_reckp['id_student'];
		
	header("location: viewall_home.php?id_student=".$id_student);
}
else
{
include "add_student2.php";
?>

<?php
}
//}
?>

		
</body>
  </html>      