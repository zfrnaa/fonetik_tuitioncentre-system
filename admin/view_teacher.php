<?php
//include("auth.php");
require_once('Connections/conn.php');

$idt = $_GET['id_teacher'];

//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

//$sql = "SELECT * FROM tbl_teacher ORDER BY name ASC";

$query_recteacher = "SELECT tbl_teacher.id_teacher,
tbl_teacher.name,
tbl_teacher.kp,
ref_jantina.jantinaa,
ref_bangsa.bangsaa,
ref_agama.agamaa,
tbl_teacher.dob,
tbl_teacher.address,
tbl_teacher.contact,
ref_subject.subject_name,
tbl_teacher.image
FROM tbl_teacher
LEFT JOIN ref_jantina ON tbl_teacher.gender=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_teacher.nation=ref_bangsa.bangsa_id
LEFT JOIN ref_agama ON tbl_teacher.religion=ref_agama.agama_id
LEFT JOIN ref_subject ON tbl_teacher.subject=ref_subject.subject_id
WHERE id_teacher ='$idt'";
$recteacher = mysqli_query($conn, $query_recteacher);
$row_recteacher = mysqli_fetch_array($recteacher, MYSQLI_ASSOC);
$totalRows_recteacher = mysqli_num_rows($recteacher);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>

</head>

<body>

<?php
?>
<br>
<div class="btn-backvwt">
<a style="align-content: center" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<button>Kembali</button>
</a>
</div>
<br>
<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container vt-cont">
			<div class="block-heading">

				<div style="border: solid 2px #BEBEBF; ">
					<div style="padding:30px">


					<table id="t01" class="t01">
						<h4 class="text-info">MAKLUMAT CIKGU
							<label
								onclick="TINY.box.show({iframe:'edit_teacher.php?id_teacher=<?php echo $idt; ?>', boxid:'frameless',width:750,height:566,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){closeJS()}})"
								title="Edit Student" role="button" class="btn btn-lg btn-primary btn-sm">SUNTING</label>
						</h4>


						<div class="alb">
							<img src="uploads/<?php echo $row_recteacher['image']; ?>" class="img-responsive"
							     width="250px" alt="">
						</div>
						<br>


						<tr>
							<td style="width: 20%"><b>NAMA</b></td>
							<td style="width:8%">:</td>
							<td><?php echo $row_recteacher['name']; ?></td>
						</tr>

						<tr>
							<td><b>IC</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['kp']; ?></td>
						</tr>

						<tr>
							<td><b>JANTINA</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['jantinaa']; ?></td>
						</tr>

						<tr>
							<td><b>BANGSA</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['bangsaa']; ?></td>
						</tr>

						<tr>
							<td><b>AGAMA</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['agamaa']; ?></td>
						</tr>

						<tr>
							<td><b>TARIKH LAHIR</b></td>
							<td>:</td>
							<td><?php echo date("d/m/Y", strtotime($row_recteacher['dob'])); ?></td>
						</tr>

						<tr>
							<td><b>ALAMAT</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['address']; ?></td>
						</tr>

						<tr>
							<td><b>NOMBOR TELEFON</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['contact']; ?></td>
						</tr>

						<tr>
							<td><b>SUBJEK</b></td>
							<td>:</td>
							<td><?php echo $row_recteacher['subject_name']; ?></td>
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