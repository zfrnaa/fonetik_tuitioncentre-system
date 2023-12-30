<?php
require_once('Connections/conn.php');

$id_student = $_GET['id_student'];

$sql = "SELECT * FROM tbl_parent WHERE id_student='$id_student'";
$recrow = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($recrow, MYSQLI_ASSOC);
$totalRows_recrow = mysqli_num_rows($recrow);

$sqla = "SELECT * FROM tbl_work WHERE id_student='$id_student'";
$recrowa = mysqli_query($conn, $sqla);
$rowa = mysqli_fetch_array($recrowa, MYSQLI_ASSOC);
$totalRows_recrowa = mysqli_num_rows($recrowa);

$query_recBangsa = "SELECT * FROM ref_bangsa WHERE bangsa_flg = '1'";
$recBangsa = mysqli_query($conn, $query_recBangsa);
$row_recBangsa = mysqli_fetch_array($recBangsa);
$totalRows_recBangsa = mysqli_num_rows($recBangsa);

$query_recAgama = "SELECT * FROM ref_agama WHERE agama_flg = '1'";
$recAgama = mysqli_query($conn, $query_recAgama);
$row_recAgama = mysqli_fetch_array($recAgama);
$totalRows_recAgama = mysqli_num_rows($recAgama);

$query_recWork = "SELECT * FROM ref_work WHERE work_flg = '1'";
$recWork = mysqli_query($conn, $query_recWork);
$row_recWork = mysqli_fetch_array($recWork);
$totalRows_recWork = mysqli_num_rows($recWork);

$query_recparent = "SELECT tbl_parent.id_student, 
tbl_parent.name, 
tbl_parent.age,
ref_bangsa.bangsaa, 
ref_agama.agamaa, 
tbl_parent.address,
tbl_parent.contact,
tbl_parent.relation,
ref_work.desc_work 
FROM tbl_parent 
LEFT JOIN ref_bangsa ON tbl_parent.nation=ref_bangsa.bangsa_id 
LEFT JOIN ref_agama ON tbl_parent.religion=ref_agama.agama_id 
LEFT JOIN ref_work ON tbl_parent.work=ref_work.work_id 
WHERE tbl_parent.id_student='$id_student'";
$recparent = mysqli_query($conn, $query_recparent);
$row_recparent = mysqli_fetch_array($recparent, MYSQLI_ASSOC);
$totalRows_recparent = mysqli_num_rows($recparent);

$query_recwork = "SELECT tbl_work.id_student, 
tbl_work.employer_name, 
tbl_work.occupation,
tbl_work.work_address
FROM tbl_work
WHERE tbl_work.id_student='$id_student'";
$recwork = mysqli_query($conn, $query_recwork);
$row_recwork = mysqli_fetch_array($recwork, MYSQLI_ASSOC);
$totalRows_recwork = mysqli_num_rows($recwork);
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=1">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="jvs/tinybox.js"></script>

	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>

	<style>
        @import "css/style.css";

        input[type=submit] {
            background-color: #007BFF;
            color: white;
        }

        button {
            background-color: #007BFF;
            color: white;
        }

        <!--
        ----STYLES POPUP------------- >
        #testdiv {
            width: 600px;
            margin: 0px auto;
            border: 1px solid #ccc;
            padding: 20px 25px 12px;
            background: #ffffff
        }

        ul2 {
            list-style: none;
            margin-bottom: 12px;
            padding: 0
        }

        li2 {
            font: 14px Georgia, Verdana;
            margin-bottom: 4px;
            padding: 8px 10px 9px;
            border: 0px solid #ccc;
            background: #ffffff;
            cursor: pointer
        }

        li2:hover {
            border: 1px solid #FF0000;
            background: #e3e3e3
        }

	</style>

</head>
<div class="block-heading">
	<h2 align="center" class="text-info">MAKLUMAT IBUBAPA</h2>
</div>

<form method="POST" class="col-lg-10 offset-lg-5" action="edit_parent_exec.php">
	<div class="form-group">
		<!--<h4>PARENT INFORMATION</h4>-->

		<table>
			<tr>
				<td width="150">NAMA</td>
				<td style="width: 4%">:</td>
				<td width="550"><input type="text" class="form-control" name="txtname" id="txtname"
				                       value="<?php echo $row['name']; ?>"
				                       onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>UMUR</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtage" id="txtage" value="<?php echo $row['age']; ?>"
				           onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>BANGSA</td>
				<td>:</td>
				<td><select class="form-control" name="ddlnation" id="ddlnation">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recBangsa['bangsa_id'] ?>"<?php if (!(strcmp($row_recBangsa['bangsa_id'], $row['nation']))) {
                                echo "selected=\"selected\"";
                            } ?>><?php echo $row_recBangsa['bangsaa'] ?></option>
                            <?php
                        } while ($row_recBangsa = mysqli_fetch_assoc($recBangsa));
                        $rows = mysqli_num_rows($recBangsa);
                        if ($rows > 0) {
                            mysqli_data_seek($recBangsa, 0);
                            $row_recBangsa = mysqli_fetch_assoc($recBangsa);
                        }
                        ?>
					</select></td>
			</tr>

			<tr>
				<td>AGAMA</td>
				<td>:</td>
				<td><select class="form-control" name="ddlreligion" id="ddlreligion">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recAgama['agama_id'] ?>"<?php if (!(strcmp($row_recAgama['agama_id'], $row['religion']))) {
                                echo "selected=\"selected\"";
                            } ?>><?php echo $row_recAgama['agamaa'] ?></option>
                            <?php
                        } while ($row_recAgama = mysqli_fetch_assoc($recAgama));
                        $rows = mysqli_num_rows($recAgama);
                        if ($rows > 0) {
                            mysqli_data_seek($recAgama, 0);
                            $row_recAgama = mysqli_fetch_assoc($recAgama);
                        }
                        ?>
					</select></td>
			</tr>

			<tr>
				<td>ALAMAT</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtaddress" id="txtaddress"
				           value="<?php echo $row['address']; ?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>HUBUNGI</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtcontact" id="txtcontact"
				           value="<?php echo $row['contact']; ?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>HUBUNGAN</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtrelation" id="txtrelation"
				           value="<?php echo $row['relation']; ?>" onKeyUp="this.value = this.value.toUpperCase();">
				</td>
			</tr>

			<tr>
				<td>PEKERJAAN</td>
				<td>:</td>
				<td><select class="form-control" name="ddlwork" id="ddlwork"
				            onChange="getData('edit_findwork.php?wnid='+this.value,'workk')">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recWork['work_id'] ?>"<?php if (!(strcmp($row_recWork['work_id'], $row['work']))) {
                                echo "selected=\"selected\"";
                            } ?>><?php echo $row_recWork['desc_work'] ?></option>
                            <?php
                        } while ($row_recWork = mysqli_fetch_assoc($recWork));
                        $rows = mysqli_num_rows($recWork);
                        if ($rows > 0) {
                            mysqli_data_seek($recWork, 0);
                            $row_recWork = mysqli_fetch_assoc($recWork);
                        }
                        ?>
					</select><span id="working" class="reqError"></span></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<div id="workk">
                        <?php
                        $typ = $row['work'];
                        if ($typ == 1) {
                            ?>

							<tr>
								<td>NAMA MAJIKAN</td>
								<td>:</td>
								<td><input type="text" class="form-control" name="txtemployer_name"
								           id="txtemployer_name" value="<?php echo $rowa['employer_name']; ?>"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>PEKERJAAN</td>
								<td>:</td>
								<td><input type="text" class="form-control" name="txtoccupation" id="txtoccupation"
								           value="<?php echo $rowa['occupation']; ?>"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>ALAMAT TEMPAT KERJA</td>
								<td>:</td>
								<td><input type="text" class="form-control" name="txtwork_address" id="txtwork_address"
								           value="<?php echo $rowa['work_address']; ?>"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>
                        <?php } else {
                        }
                        ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<input type="hidden" name="txtid_student" id="txtid_student" class="form-control"
	       value="<?php echo $id_student; ?>">
	<button type="submit" name="send" class="btn btn-primary">Simpan</button>
</form>
<br>
</html>

<script type="text/javascript">
    function showUser(str) {
        if (str == "") {
            document.getElementById("icid").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("icid").innerHTML = xmlhttp.responseText;
            }
        }
        //var url="getbutir.php";
        //var key = document.getElementById('txtsearch').value;

//var url1=url+"?q="+str"&s="+str1;

//var namevalue=encodeURIComponent(document.getElementById("txtSearch").value);
//var jenisdoc = encodeURIComponent(document.getElementById('ddljid').value);
        var nric = encodeURIComponent(document.getElementById('ic').value);

        xmlhttp.open("GET", "findic.php?i=" + nric + "&typ=" + str, true);
//xmlHttp.send(params); 
        xmlhttp.send();
    }

</script>

<script>

    function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp = false;
        try {
            xmlhttp = new XMLHttpRequest();
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e1) {
                    xmlhttp = false;
                }
            }
        }

        return xmlhttp;
    }


    function getData(strURL, divid) {

        var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById(divid).innerHTML = req.responseText;
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
            document.getElementById("warga").innerHTML = "*Sila Pilih";
            f.ddlwarga.focus();
            return (false);

        }
    }

    function getData(strURL, divid) {

        var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById(divid).innerHTML = req.responseText;
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