<?php
require_once('Connections/conn.php');

//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

$sql = "SELECT * FROM tbl_student ORDER BY nama ASC";

$query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.ic
FROM tbl_student
WHERE tbl_student.id_student and tbl_student.flg_student='1'
ORDER BY tbl_student.nama ASC";
$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);

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

/*$query_recClass = "SELECT * FROM ref_class WHERE flg_class = '1'";
$recClass = mysqli_query($conn, $query_recClass);
$row_recClass = mysqli_fetch_array($recClass);
$totalRows_recClass = mysqli_num_rows($recClass);*/

$query_recWork = "SELECT * FROM ref_work WHERE work_flg = '1'";
$recWork = mysqli_query($conn, $query_recWork);
$row_recWork = mysqli_fetch_array($recWork);
$totalRows_recWork = mysqli_num_rows($recWork);

?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div style="margin-block:20px 0; margin-inline:auto; width: fit-content">
	<a align="center" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
		<button>Back</button>
	</a>
</div>
<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container vs-cont">
			<div class="block-heading">
				<h2 class="text-info">Pendaftaran</h2>
				<p style="text-align: center">Daftar pelajar baharu di sini</p>
			</div>

			<div style="border: solid 2px #BEBEBF; width: 80%; margin: auto">
				<div style="margin:30px">

					<form action="add_student_exec.php" method="post">
						<table class="center">
							<h4>&emsp; Maklumat Pelajar</h4>

							<tr>
								<td>&emsp;&emsp; IC</td>
								<td>:</td>
								<td><?php echo $ic ?><input type="hidden" name="txtic" value="<?php echo $ic ?>"
								                            required></td>
							</tr>

							<tr>
								<td width="225">&emsp;&emsp; Nama Penuh</td>
								<td width="25">:</td>
								<td width="800"><input type="text" class="form-control" placeholder="Nama penuh pelajar" name="txtnama"
								                       onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<!--<tr>
                            <td>&emsp;&emsp; Student ID</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="txtstudentid" onKeyUp="this.value = this.value.toUpperCase();"></td>
                            </tr>-->

							<tr>
								<td>&emsp;&emsp; Jantina</td>
								<td>:</td>
								<td>

									<select name="ddljantina" id="ddljantina" class="form-control">
										<option value="">Jantina anda</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recJantina['jantina_id'] ?>"><?php echo $row_recJantina['jantinaa'] ?></option>
                                            <?php
                                        } while ($row_recJantina = mysqli_fetch_assoc($recJantina));
                                        $rows = mysqli_num_rows($recJantina);
                                        if ($rows > 0) {
                                            mysqli_data_seek($recJantina, 0);
                                            $row_recJantina = mysqli_fetch_assoc($recJantina);
                                        }
                                        ?>
									</select></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Umur</td>
								<td>:</td>
								<td><input type="number" class="form-control" name="txtumur" min="13" max="17"
								           onKeyPress="return /[0-9]/i.test(event.key)"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Bangsa</td>
								<td>:</td>
								<td>

									<select name="ddlbangsa" id="ddlbangsa" class="form-control">
										<option value="">Bangsa anda</option>
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

									<select name="ddlagama" id="ddlagama" class="form-control">
										<option value="">Agama</option>
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
								<td>&emsp;&emsp; Tarikh Lahir</td>
								<td>:</td>
								<td><input type="date" class="form-control" name="tarikh_lahir" required></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Alamat Rumah</td>
								<td>:</td>
								<td><input type="text" class="form-control" name="txtalamat"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Mata pelajaran</td>
								<td>:</td>
								<td>
									<input type="checkbox" id="addmath" name="subjects[]" value="AdditionalMathematics"
									       onchange="calculateFee()"> Matematik Tambahan<br>
									<input type="checkbox" id="bm" name="subjects[]" value="BahasaMelayu"
									       onchange="calculateFee()"> Bahasa Melayu<br>
									<input type="checkbox" id="bi" name="subjects[]" value="English"
									       onchange="calculateFee()"> Bahasa Inggeris<br>
									<input type="checkbox" id="math" name="subjects[]" value="Mathematics"
									       onchange="calculateFee()"> Matematik<br>
									<input type="checkbox" id="sc" name="subjects[]" value="Science"
									       onchange="calculateFee()"> Sains<br>
									<input type="checkbox" id="sj" name="subjects[]" value="Sejarah"
									       onchange="calculateFee()"> Sejarah
								</td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Yuran</td>
								<td>:</td>
								<td><input type="text" class="form-control" name="fee" id="fee" disabled></td>
								<!-- Add a hidden input field to store the fee value -->
								<input type="hidden" name="actual_fee" id="actual_fee">
						</table>
						<input type="hidden" class="form-control" name="txtid_student"
						       value="<?php echo $id_student; ?>">
						<input type="submit" class="btn btn-primary" value="Add" name="submit"
						       style="margin-block: 20px;margin-left: 12vw;"></td>
					</form>

				</div>
			</div>
		</div>
	</section>
</main>
<br><br>

<?php include 'inc/footer.php'; ?>

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

    //FEE
    function calculateFee() {
        // Get all checkbox elements with the name 'subjects'
        var checkboxes = document.getElementsByName('subjects[]');

        // Count the number of selected checkboxes
        var selectedSubjectsCount = 0;

        // Loop through each checkbox
        for (var i = 0; i < checkboxes.length; i++) {
            // If the checkbox is checked, increment the count
            if (checkboxes[i].checked) {
                selectedSubjectsCount++;
            }
        }

        // Calculate the fee based on the count of selected subjects
        var fee;
        if (selectedSubjectsCount <= 2) {
            fee = 70 * selectedSubjectsCount;
            desc = ' (RM70 per subject)';
        } else if (selectedSubjectsCount >= 3) {
            fee = 65 * selectedSubjectsCount;
            desc = ' (RM65 per subject)';
        }

        // Update the fee input element with the calculated fee
        var formattedFee = 'RM ' + fee + desc; // Concatenate "RM" with the fee
        document.getElementById('fee').value = formattedFee;

        // Set the value of the hidden input field with the actual fee
        document.getElementById('actual_fee').value = fee;
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