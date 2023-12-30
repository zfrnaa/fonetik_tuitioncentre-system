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

	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>

</head>

<body>

<?php
?>
<br>
<div class="btn-backvwt">
<a style="align-content: center" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<button class="btn-back">Kembali</button>
</a></div><br>

<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="vwh-cont">
			<div class="block-heading">

				<div style="border: solid 2px #BEBEBF; ">
					<div style="margin:30px">

						<table id="t01" style="width: 60%; margin: auto">
							<h4 class="text-info">MAKLUMAT PELAJAR</h4>

							<tr>
								<td class="vwh-18" style="width: 45%">&emsp; <b>NAMA</b></td>
								<td class="vwh-6">:</td>
								<td class="vwh-60"><?php echo $row_recstudent['nama']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>IC</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['ic']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>JANTINA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['jantinaa']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>UMUR</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['umur']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>BANGSA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['bangsaa']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>AGAMA</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['agamaa']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>TARIKH LAHIR</b></td>
								<td>:</td>
								<td><?php echo date("d/m/Y", strtotime($row_recstudent ['tarikh_lahir'])); ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>ALAMAT</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['alamat']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>SUBJEK</b></td>
								<td>:</td>
								<td><?php echo $row_recstudent['subject']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>YURAN BULANAN</b></td>
								<td>:</td>
								<td>RM<?php echo $row_recstudent['fee']; ?></td>
							</tr>
						</table>
					</div>
					<div style="margin:30px">
						<table id="t01" style="width: 60%; margin: auto;">
							<h4 class="text-info">MAKLUMAT IBUBAPA</h4>

							<tr>
								<td class="vwh-18" style="width: 45%">&emsp; <b>NAMA</b></td>
								<td class="vwh-6">:</td>
								<td class="vwh-60"><?php echo $row_recparent['name']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>UMUR</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['age']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>BANGSA</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['bangsaa']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>AGAMA</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['agamaa']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>ALAMAT</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['address']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>HUBUNGI</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['contact']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>HUBUNGAN</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['relation']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>STATUS PEKERJAAN</b></td>
								<td>:</td>
								<td><?php echo $row_recparent['desc_work']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>NAMA MAJIKAN</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['employer_name']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>PEKERJAAN</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['occupation']; ?></td>
							</tr>

							<tr>
								<td>&emsp; <b>ALAMAT TEMPAT KERJA</b></td>
								<td>:</td>
								<td><?php echo $row_recwork['work_address']; ?></td>
							</tr>
						</table>
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
<script>
    function goBack() {
        // Use JavaScript to navigate back one step in the browser history
        window.history.back();
    }
</script>