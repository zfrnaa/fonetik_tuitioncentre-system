<?php
//include("auth.php");
require_once('Connections/conn.php'); 

$wn= $_REQUEST['wnid'];
if ($wn==1)
{
?>
<table>
    <tr>
	<td>NAMA MAJIKAN</td>
    <td>:</td>
    <td><input type="text" name="txtemployer_name" id="txtemployer_name" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
    
    <tr>
	<td>PEKERJAAN</td>
    <td>:</td>
    <td><input type="text" name="txtoccupation" id="txtoccupation" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
    
    <tr>
	<td>ALAMAT TEMPAT KERJA</td>
    <td>:</td>
    <td><input type="text" name="txtwork_address" id="txtwork_address" onKeyUp="this.value = this.value.toUpperCase();"></td>
	</tr>
</table>

<?php } 
else
{

}
?>