<?php
require_once('Connections/conn.php');

//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

$icstudent = $_GET['ic'];

$query_recstudent = "SELECT tbl_student.id_student, 
tbl_student.nama, 
tbl_student.ic
FROM tbl_student 
WHERE tbl_student.ic='$icstudent'";
$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);

$ids = $row_recstudent['id_student'];

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

$query_recWork = "SELECT * FROM ref_work WHERE work_flg = '1'";
$recWork = mysqli_query($conn, $query_recWork);
$row_recWork = mysqli_fetch_array($recWork);
$totalRows_recWork = mysqli_num_rows($recWork);

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>
</head>
<body class="body-addp">
<style>
    td {
        height: 60px;
    }

    .backdrop-blur {
        background-color: rgb(255 255 255 / 0.3);
    }

    .input-std {
        font-family: "Mona Sans Semibold";
        background-color: silver;
        transition: all 0.2s linear;
    }

    .input-std:focus {
        color: darkblue;
        border: 2px solid black;
    }
</style>

<a align="left" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<button class="btn-back" style="margin: 40px 47vw 0 47vw">Kembali</button>
</a>
<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container add-parent">
			<div class="block-heading">
				<h2 class="text-info">Pendaftaran</h2>
				<p>Daftar ibubapa baharu di sini</p>
			</div>

			<div class="table-stdcont backdrop-blur">
				<div style="margin:30px">

					<form action="add_parent_exec.php" method="post">
						<table class="center">
							<h4>&emsp; Maklumat Ibubapa</h4>

							<tr>
								<td width="225">&emsp;&emsp; Nama Penuh</td>
								<td width="25">:</td>
								<td width="800"><input type="text" class="form-control input-std" name="txtname"
								                       onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Umur</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtage"
								           onKeyPress="return /[0-9]/i.test(event.key)"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Bangsa</td>
								<td>:</td>
								<td>

									<select name="ddlnation" id="ddlnation" class="form-control input-std">
										<option value="">Choose Race</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recBangsa['bangsa_id'] ?>"><?php echo $row_recBangsa['bangsaa'] ?></option>
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
								<td>&emsp;&emsp; Agama</td>
								<td>:</td>
								<td>

									<select name="ddlreligion" id="ddlreligion" class="form-control input-std">
										<option value="">Choose Religion</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recAgama['agama_id'] ?>"><?php echo $row_recAgama['agamaa'] ?></option>
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
								<td>&emsp;&emsp; Alamat Rumah</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtaddress"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Nombor Telefon</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtcontact"
								           onKeyPress="return /[0-9]/i.test(event.key)"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Hubungan</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtrelation"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Maklumat Pekerjaan</td>
								<td>:</td>
								<td><select name="ddlwork" id="ddlwork" class="form-control input-std"
								            onChange="getData('findwork.php?wid='+this.value,'workid')">
										<option value="0" <?php if (!(strcmp(0, 0))) {
                                            echo "selected=\"selected\"";
                                        } ?>>Sila Pilih
										</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recWork['work_id'] ?>"<?php if (!(strcmp($row_recWork['work_id'], 0))) {
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
									</select> <span id="work" class="reqError">*</span></td>
							</tr>
							<td></td>
							<td></td>
								<td>
									<div id="workid"></div>
								</td>
						</table>
						<input type="hidden" class="form-control input-std" name="txtid_student"
						       value="<?php echo $ids; ?>">
						<input type="submit" class="btn btn-submitform" value="Add" name="submit"
						       style="margin-block: 20px; margin-left: 16vw;">
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
<br><br>
<?php include 'inc/footer.php' ?>
</body>
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
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
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
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }

    }
</script>