<?php
//include("auth.php");
require_once('Connections/conn.php');

$ids = $_GET['id_student'];

//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

$sql = "SELECT * FROM tbl_student ORDER BY nama ASC";

$query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.ic,
ref_jantina.jantinaa,
tbl_student.umur,
ref_bangsa.bangsaa,
ref_agama.agamaa,
tbl_student.tarikh_lahir,
tbl_student.alamat,
tbl_student.subject,
tbl_student.fee
FROM tbl_student
LEFT JOIN ref_jantina ON tbl_student.jantina=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_student.bangsa=ref_bangsa.bangsa_id
LEFT JOIN ref_agama ON tbl_student.agama=ref_agama.agama_id
WHERE id_student='$ids'";
$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);

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
WHERE tbl_parent.id_student='$ids'";
$recparent = mysqli_query($conn, $query_recparent);
$row_recparent = mysqli_fetch_array($recparent, MYSQLI_ASSOC);
$totalRows_recparent = mysqli_num_rows($recparent);

$query_recwork = "SELECT tbl_work.id_student,
tbl_work.employer_name,
tbl_work.occupation,
tbl_work.work_address
FROM tbl_work
WHERE tbl_work.id_student='$ids'";
$recwork = mysqli_query($conn, $query_recwork);
$row_recwork = mysqli_fetch_array($recwork, MYSQLI_ASSOC);
$totalRows_recwork = mysqli_num_rows($recwork);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<script type="text/javascript" src="jvs/tinybox.js"></script>
	
	<title>FONETIK</title>

	<style>
        @import url('css/style.css');

	</style>
</head>

<body>

<?php
?>
<br>
<div class="btn-backvwt">
	<a style="align:left" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
		<button class="btn-back">Kembali</button>
	</a>
</div>
<br>
<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container vs-cont">
			<div class="block-heading">

				<div style="border: solid 2px #BEBEBF;">
					<div style="padding:30px">

						<table id="t01" style="width: 600px; margin: auto">
							<h4 class="text-info">MAKLUMAT PELAJAR
								<label
									onclick="TINY.box.show({iframe:'edit_student.php?id_student=<?php echo $ids; ?>', boxid:'frameless', top:60, width:750,height:638,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"
									title="Edit Student" role="button"
									class="btn btn-lg btn-primary btn-sm">Sunting</label></h4>

							<tr>
								<td style="width: 40%;"><b>NAMA</b></td>
								<td style="width: 6%;">:</td>
								<td><?php echo $row_recstudent['nama']; ?></td>
							</tr>

							<tr>
								<td><b>IC</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['ic']; ?></td>
							</tr>

							<tr>
								<td><b>JANTINA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['jantinaa']; ?></td>
							</tr>

							<tr>
								<td><b>UMUR</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['umur']; ?></td>
							</tr>

							<tr>
								<td><b>BANGSA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['bangsaa']; ?></td>
							</tr>

							<tr>
								<td><b>AGAMA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['agamaa']; ?></td>
							</tr>

							<tr>
								<td><b>TARIKH LAHIR</b></td>
								<td>:</td>
								<td><?php echo date("d/m/Y", strtotime($row_recstudent ['tarikh_lahir'])); ?></td>
							</tr>

							<tr>
								<td><b>ALAMAT</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['alamat']; ?></td>
							</tr>

							<tr>
								<td><b>SUBJEK</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['subject']; ?></td>
							</tr>

							<tr>
								<td><b>YURAN</b></td>
								<td>:</td>
								<td>RM<?php echo $row_recstudent['fee']; ?></td>
							</tr>
						</table>
						<br>

						<table id="t01" style="width: 600px; margin: auto">
							<h4 class="text-info">MAKLUMAT IBUBAPA
								<label
									onclick="TINY.box.show({iframe:'edit_parent.php?id_student=<?php echo $ids; ?>', boxid:'frameless', top:64, width:788,height:555,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"
									title="Edit Parent" role="button" class="btn btn-lg btn-primary btn-sm">Sunting</label>
							</h4>

							<tr>
								<td style="width: 40%;"><b>NAMA</b></td>
								<td style="width: 6%">:</td>
								<td><?php echo $row_recparent['name']; ?></td>
							</tr>

							<tr>
								<td><b>UMUR</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['age']; ?></td>
							</tr>

							<tr>
								<td><b>BANGSA</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['bangsaa']; ?></td>
							</tr>

							<tr>
								<td><b>AGAMA</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['agamaa']; ?></td>
							</tr>

							<tr>
								<td><b>ALAMAT</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['address']; ?></td>
							</tr>

							<tr>
								<td><b>HUBUNGI</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['contact']; ?></td>
							</tr>

							<tr>
								<td><b>HUBUNGAN</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['relation']; ?></td>
							</tr>

							<tr>
								<td><b>STATUS PEKERJAAN</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['desc_work']; ?></td>
							</tr>

							<tr>
								<td><b>NAMA MAJIKAN</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['employer_name']; ?></td>
							</tr>

							<tr>
								<td><b>PEKERJAAN</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['occupation']; ?></td>
							</tr>

							<tr>
								<td><b>ALAMAT TEMPAT KERJA</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['work_address']; ?></td>
							</tr>
						</table>
						<br>
					</div>
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
<script>
    function goBack() {
        // Use JavaScript to navigate back one step in the browser history
        window.history.back();
    }
</script>