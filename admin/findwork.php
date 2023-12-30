<?php
//include("auth.php");
require_once('Connections/conn.php'); 

$ins= $_REQUEST['wid'];

if ($ins==1)
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css"
<table>
    <tr>
    <td>&emsp;Nama Majikan</td>
	<td>:</td>
    <td width="650"><input type="text" class="form-control" name="txtemployer_name" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
    
    <tr>
    <td>&emsp;Pekerjaan</td>
	<td>:</td>
    <td><input type="text" class="form-control" name="txtoccupation" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
    
    <tr>
    <td>&emsp;Alamat Tempat Kerja</td>
	<td>:</td>
    <td><input type="text" class="form-control" name="txtwork_address" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
</table>

<?php } 
else
{
}
?>
    </head>
</html>