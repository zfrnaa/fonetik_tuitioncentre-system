<?php
require_once('Connections/conn.php'); 

$id_teacher=$_GET['id_teacher'];

$sql = "SELECT * FROM tbl_teacher WHERE id_teacher='$id_teacher'";
$recrow= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($recrow,MYSQLI_ASSOC);
$totalRows_recrow = mysqli_num_rows($recrow);

$query_recJantina = "SELECT * FROM ref_jantina WHERE jantina_flg = '1' ORDER BY jantinaa ASC";
$recJantina = mysqli_query($conn, $query_recJantina);
$row_recJantina = mysqli_fetch_array($recJantina);
$totalRows_recJantina = mysqli_num_rows($recJantina);

$query_recBangsa = "SELECT * FROM ref_bangsa WHERE bangsa_flg = '1'";
$recBangsa = mysqli_query($conn, $query_recBangsa);
$row_recBangsa = mysqli_fetch_array($recBangsa);
$totalRows_recBangsa = mysqli_num_rows($recBangsa);

$query_recAgama = "SELECT * FROM ref_agama WHERE agama_flg = '1'";
$recAgama = mysqli_query($conn, $query_recAgama);
$row_recAgama = mysqli_fetch_array($recAgama);
$totalRows_recAgama = mysqli_num_rows($recAgama);

$query_recSubject = "SELECT * FROM ref_subject WHERE flg_subject = '1' ORDER BY subject_name ASC";
$recSubject = mysqli_query($conn,$query_recSubject);
$row_recSubject = mysqli_fetch_array($recSubject,MYSQLI_ASSOC);
$totalRows_recSubject = mysqli_num_rows($recSubject);

$query_recteacher = "SELECT tbl_teacher.id_teacher, 
tbl_teacher.name, 
tbl_teacher.kp,
ref_jantina.jantinaa,
ref_bangsa.bangsaa, 
ref_agama.agamaa, 
tbl_teacher.dob,
tbl_teacher.address,
tbl_teacher.contact,
tbl_teacher.subject
FROM tbl_teacher 
LEFT JOIN ref_jantina ON tbl_teacher.gender=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_teacher.nation=ref_bangsa.bangsa_id 
LEFT JOIN ref_agama ON tbl_teacher.religion=ref_agama.agama_id
WHERE tbl_teacher.id_teacher='$id_teacher'"; 
$recteacher = mysqli_query($conn,$query_recteacher);
$row_recteacher = mysqli_fetch_array($recteacher,MYSQLI_ASSOC);
$totalRows_recteacher = mysqli_num_rows($recteacher);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=1">

    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="jvs/tinybox.js"></script>

    <title>FONETIK</title>
	
	<style>

		@import "css/style.css";
		input[type=submit]{background-color: #007BFF; color: white;}
		button{background-color: #007BFF; color: white;}
		
		<!------STYLES POPUP------------->
		#testdiv {width:600px; margin:0px auto; border:1px solid #ccc; padding:20px 25px 12px; background:#ffffff}
		ul2 {list-style:none; margin-bottom:12px; padding:0}
		li2 {font:14px Georgia,Verdana; margin-bottom:4px; padding:8px 10px 9px; border:0px solid #ccc; background:#ffffff; cursor:pointer}
		li2:hover {border:1px solid #FF0000; background:#e3e3e3}
		
	</style>
	
</head>
                <div class="block-heading">
                    <h2 style="align:center" class="text-info">MAKLUMAT CIKGU</h2>
                </div>
                
<form method="POST" class="col-lg-10 offset-lg-5" action="edit_teacher_exec.php">
                    <div class="form-group">
						
						<table>
						<tr>
						<td width="150">NAMA</td>
                        <td style="width: 4%">:</td>
                        <td width="550"><input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $row['name'];?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
                        </tr>
                            
                        <tr>
						<td>IC</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="txtkp" id="txtkp" value="<?php echo $row['kp'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');"></td>
                        </tr>

						<tr>
						<td>JANTINA</td>
                        <td>:</td>
                        <td><select class="form-control" name="ddlgender" id="ddlgender">
						<?php
						do {  
						?>
						  <option value="<?php echo $row_recJantina['jantina_id']?>"<?php if (!(strcmp($row_recJantina['jantina_id'], $row['gender']))) {echo "selected=\"selected\"";} ?>><?php echo $row_recJantina['jantinaa']?></option>
						  <?php
						} while ($row_recJantina = mysqli_fetch_assoc($recJantina));
					  		$rows = mysqli_num_rows($recJantina);
					  		if($rows > 0) {
						  	mysqli_data_seek($recJantina, 0);
						  	$row_recJantina = mysqli_fetch_assoc($recJantina);
					  	}
						?>
						</select></td></tr>
							
						<tr>
						<td>BANGSA</td>
                        <td>:</td>
                        <td><select class="form-control" name="ddlnation" id="ddlnation">
						<?php
						do {  
						?>
						  <option value="<?php echo $row_recBangsa['bangsa_id']?>"<?php if (!(strcmp($row_recBangsa['bangsa_id'], $row['nation']))) {echo "selected=\"selected\"";} ?>><?php echo $row_recBangsa['bangsaa']?></option>
						  <?php
						} while ($row_recBangsa = mysqli_fetch_assoc($recBangsa));
					  		$rows = mysqli_num_rows($recBangsa);
					  		if($rows > 0) {
						  	mysqli_data_seek($recBangsa, 0);
						  	$row_recBangsa = mysqli_fetch_assoc($recBangsa);
					  	}
						?>
						</select></td></tr>
							
						<tr>
						<td>AGAMA</td>
                        <td>:</td>
                        <td><select class="form-control" name="ddlreligion" id="ddlreligion">
						<?php
						do {  
						?>
						  <option value="<?php echo $row_recAgama['agama_id']?>"<?php if (!(strcmp($row_recAgama['agama_id'], $row['religion']))) {echo "selected=\"selected\"";} ?>><?php echo $row_recAgama['agamaa']?></option>
						  <?php
						} while ($row_recAgama = mysqli_fetch_assoc($recAgama));
					  		$rows = mysqli_num_rows($recAgama);
					  		if($rows > 0) {
						  	mysqli_data_seek($recAgama, 0);
						  	$row_recAgama = mysqli_fetch_assoc($recAgama);
					  	}
						?>
						</select></td></tr>

						<tr>
						<td>TARIKH LAHIR</td>
                        <td>:</td>
                        <td><input type="date" class="form-control" name="dtdob" id="dtdob" value="<?php echo $row['dob'];?>"></td>
                        </tr>
						
                        <tr>
						<td>ALAMAT</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="txtaddress" id="txtaddress" value="<?php echo $row['address'];?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
                        </tr>
                            
						<tr>
						<td>HUBUNGI</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $row['contact'];?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
                        </tr>
                            
                        <!--<tr>
						<td>SUBJECT</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" name="txtsubject" id="txtsubject" value="<?php echo $row['subject'];?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
                        </tr>-->

						<tr>
						<td>SUBJEK</td>
                        <td>:</td>
                        <td><select class="form-control" name="ddlsubject" id="ddlsubject">
						<?php
						do {  
						?>
						  <option value="<?php echo $row_recSubject['subject_id']?>"<?php if (!(strcmp($row_recSubject['subject_id'], $row['subject']))) {echo "selected=\"selected\"";} ?>><?php echo $row_recSubject['subject_name']?></option>
						  <?php
						} while ($row_recSubject = mysqli_fetch_assoc($recSubject));
					  		$rows = mysqli_num_rows($recSubject);
					  		if($rows > 0) {
						  	mysqli_data_seek($recSubject, 0);
						  	$row_recSubject = mysqli_fetch_assoc($recSubject);
					  	}
						?>
						</select></td></tr>

						</table>
                    </div>
					<input type="hidden" name="txtid_teacher" id="txtid_teacher" class="form-control" value="<?php echo $id_teacher;?>">
                    <button type="submit" name="send" class="btn btn-primary" style="margin-left: 24vw">Simpan</button>
                </form><br>
</html>

<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("icid").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("icid").innerHTML=xmlhttp.responseText;
    }
  }
  //var url="getbutir.php";
 //var key = document.getElementById('txtsearch').value;

//var url1=url+"?q="+str"&s="+str1;

//var namevalue=encodeURIComponent(document.getElementById("txtSearch").value);
//var jenisdoc = encodeURIComponent(document.getElementById('ddljid').value);
	var nric = encodeURIComponent(document.getElementById('ic').value);

xmlhttp.open("GET","findic.php?i="+nric+"&typ="+str,true);
//xmlHttp.send(params); 
xmlhttp.send();
}

</script>											
												
<script>
  
  function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getData(strURL,divid) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById(divid).innerHTML=req.responseText;						
					} else {
						alert("Terdapat masalah semasa menggunakan XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
</script>  
<script>

	function validate(f) {
	if (f.ddlwarga.value == "0") {
				document.getElementById("warga").innerHTML="*Sila Pilih";
				f.ddlwarga.focus();
				return(false);

			}
	}
	
	function getData(strURL,divid) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById(divid).innerHTML=req.responseText;						
					} else {
						alert("Terdapat masalah semasa menggunakan XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>