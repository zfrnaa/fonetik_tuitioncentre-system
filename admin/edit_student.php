<?php
require_once('Connections/conn.php');

$id_student = $_GET['id_student'];

$sql = "SELECT * FROM tbl_student WHERE id_student='$id_student'";

$recrow = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($recrow, MYSQLI_ASSOC);
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

/*$query_recClass = "SELECT * FROM ref_class WHERE flg_class = '1'";
$recClass = mysqli_query($conn, $query_recClass);
$row_recClass = mysqli_fetch_array($recClass);
$totalRows_recClass = mysqli_num_rows($recClass);*/

$query_recstudent = "SELECT tbl_student.id_student, 
tbl_student.nama,
tbl_student.ic,
ref_jantina.jantinaa, 
tbl_student.umur,
ref_bangsa.bangsaa, 
ref_agama.agamaa, 
tbl_student.tarikh_lahir,
tbl_student.alamat,
tbl_student.subject
FROM tbl_student 
LEFT JOIN ref_jantina ON tbl_student.jantina=ref_jantina.jantina_id 
LEFT JOIN ref_bangsa ON tbl_student.bangsa=ref_bangsa.bangsa_id 
LEFT JOIN ref_agama ON tbl_student.agama=ref_agama.agama_id 
WHERE id_student='$id_student'";
$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);
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
        input[type=submit]{background-color: #007BFF; color: white;}
        button{background-color: #007BFF; color: white;}

        <!--  ----STYLES POPUP------------- >
        #testdiv {width: 600px;margin: 0px auto;border: 1px solid #ccc;padding: 20px 25px 12px;background: #ffffff}
        ul2 {list-style: none;margin-bottom: 12px;padding: 0}
        li2 {font: 14px Georgia, Verdana;margin-bottom: 4px;padding: 8px 10px 9px;border: 0px solid #ccc;background: #ffffff;cursor: pointer}
        li2:hover {border: 1px solid #FF0000;background: #e3e3e3}


	</style>

</head>

<body>
<div class="block-heading">
	<h2 align="center" class="text-info">MAKLUMAT PELAJAR</h2>
</div>
<form method="POST" class="col-lg-10 offset-lg-1" action="edit_student_exec.php">
	<div class="form-group">
		<!--<h4>STUDENT INFORMATION</h4>-->

		<table>
			<tr>
				<td width="150">NAMA</td>
				<td style="width: 4%">:</td>
				<td width="550"><input type="text" class="form-control" name="txtnama" id="txtnama"
				                       value="<?php echo $row['nama']; ?>"
				                       onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>IC</td>
				<td>:</td>
				<td><?php echo $row_recstudent['ic']; ?><input type="hidden" class="form-control" name="txtic"
				                                               value="<?php echo $row['ic']; ?>"></td>
			</tr>

			<tr>
				<td>JANTINA</td>
				<td>:</td>
				<td><select class="form-control" name="ddljantina" id="ddljantina">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recJantina['jantina_id'] ?>"<?php if (!(strcmp($row_recJantina['jantina_id'], $row['jantina']))) {
                                echo "selected=\"selected\"";
                            } ?>><?php echo $row_recJantina['jantinaa'] ?></option>
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
				<td>UMUR</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtumur" id="txtumur"
				           value="<?php echo $row['umur']; ?>" onKeyPress="return /[0-9]/i.test(event.key)"></td>
			</tr>

			<tr>
				<td>BANGSA</td>
				<td>:</td>
				<td><select class="form-control" name="ddlbangsa" id="ddlbangsa">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recBangsa['bangsa_id'] ?>"<?php if (!(strcmp($row_recBangsa['bangsa_id'], $row['bangsa']))) {
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
				<td><select class="form-control" name="ddlagama" id="ddlagama">
                        <?php
                        do {
                            ?>
							<option
								value="<?php echo $row_recAgama['agama_id'] ?>"<?php if (!(strcmp($row_recAgama['agama_id'], $row['agama']))) {
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
				<td>TARIKH LAHIR</td>
				<td>:</td>
				<td><input type="date" class="form-control" name="tarikh_lahir" id="tarikh_lahir"
				           value="<?php echo $row['tarikh_lahir']; ?>"></td>
			</tr>

			<tr>
				<td>ALAMAT</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="txtalamat" id="txtalamat"
				           value="<?php echo $row['alamat']; ?>" onKeyUp="this.value = this.value.toUpperCase();"></td>
			</tr>

			<tr>
				<td>SUBJEK</td>
				<td>:</td>
				<td><?php
                    // Retrieve the subjects associated with the student
                    $selectedSubjects = explode(", ", $row['subject']);

                    $allSubjects = array("Additional Mathematics", "Bahasa Melayu", "English", "Mathematics", "Science", "Sejarah");

                    foreach ($allSubjects as $subject) {
                        $checked = in_array($subject, $selectedSubjects) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='subjects[]' value='$subject' $checked> $subject</label><br>";
                    }
                    ?></td>
			</tr>

			<tr>
				<td>YURAN</td>
				<td>:</td>
				<td>
					<input type="text" class="form-control" name="fee" id="fee" value="RM <?php echo $row['fee']; ?>"
					       disabled>
					<!-- Add a hidden input field to store the fee value -->
					<input type="hidden" name="actual_fee" id="actual_fee" value="<?php echo $fee; ?>">
				</td>
			</tr>
		</table>

	</div>
	<input type="hidden" name="txtid_student" id="txtid_student" class="form-control"
	       value="<?php echo $id_student; ?>">
	<button type="submit" name="send" class="btn btn-primary">Simpan</button>
</form>
<br>
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
        let fee;
        let desc;
        if (selectedSubjectsCount <= 2) {
            fee = 70 * selectedSubjectsCount;
            desc = ' (RM70 per subject)';
        } else if (selectedSubjectsCount >= 3) {
            fee = 65 * selectedSubjectsCount;
            desc = ' (RM65 per subject)';
        }

        // Update the fee input element with the calculated fee
        var formattedFee = 'RM ' + fee + desc;
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