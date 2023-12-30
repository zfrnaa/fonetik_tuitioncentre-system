<?php
//include("auth.php");
require_once('Connections/conn.php');

$ids = $_GET['id_student'];

//Start session
session_start();

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
tbl_student.alamat
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

include 'inc/menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>FONETIK</title>

	<style>
        @import url('css/style.css');


        h4 {
            text-align: center;
        }

        table {
            margin: auto;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(219, 232, 255, 0.94);
        }


        b {
            margin: auto;
        }

        .has-error {
            color: black;
            margin-inline: 47.35vw;
        }

        .has-error:hover {
            text-decoration: none;
            color: red;
        }
	</style>

</head>

<body>

<?php
?>
<br><a class="has-error" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">&emsp;<button>Kembali</button>
</a><br>


<div style="margin:30px"></div>
<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="vwh-cont">
			<div class="block-heading">
				<div class="table-cont-check backdrop-blur">
					<h4 class="text-info">MAKLUMAT PELAJAR</h4>
					<table id="t01" align="center">

						<tr>
							<td class="vwh-30">&emsp; <p>NAMA</p></td>
							<td class="vwh-10">:</td>
							<td class="vwh-60"><?php echo $row_recstudent['nama']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>IC</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['ic']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>JANTINA</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['jantinaa']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>UMUR</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['umur']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>BANGSA</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['bangsaa']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>AGAMA</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['agamaa']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>TARIKH LAHIR</p></td>
							<td>:</td>
							<td><?php echo date("d/m/Y", strtotime($row_recstudent ['tarikh_lahir'])); ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>ALAMAT</p></td>
							<td>:</td>
							<td><?php echo $row_recstudent['alamat']; ?></td>
						</tr>

						<!--<tr>
                                        <td>&emsp; <b>CLASS</b></td>
										<td>:</td>
                                        <td><?php //echo $row_recstudent['class_name']; ?></td>
										</tr>-->

						<tr>
							<td>&emsp; <p>YURAN BULANAN</p></td>
							<td>:</td>
							<td><?php echo "RM350" ?></td>
						</tr>
					</table>
					<br>

					<h4 class="text-info">MAKLUMAT PELAJAR</h4>
					<table id="t01" align="center">

						<tr>
							<td class="vwh-30">&emsp; <p>NAME</p></td>
							<td class="vwh-10">:</td>
							<td class="vwh-60"><?php echo $row_recparent['name']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>UMUR</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['age']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>BANGSA</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['bangsaa']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>AGAMA</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['agamaa']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>ALAMAT</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['address']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>HUBUNGI</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['contact']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>HUBUNGAN</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['relation']; ?></td>
						</tr>

						<tr>
							<td>&emsp; <p>BIDANG KERJA</p></td>
							<td>:</td>
							<td><?php echo $row_recparent['desc_work']; ?></td>
						</tr>

						<tr>
							<td>&emsp;&emsp; <p>NAMA MAJIKAN</p></td>
							<td>:</td>
							<td><?php echo $row_recwork['employer_name']; ?></td>
						</tr>

						<tr>
							<td>&emsp;&emsp; <p>PEKERJAAN</p></td>
							<td>:</td>
							<td><?php echo $row_recwork['occupation']; ?></td>
						</tr>

						<tr>
							<td>&emsp;&emsp; <p>ALAMAT PEKERJAAN</p></td>
							<td>:</td>
							<td><?php echo $row_recwork['work_address']; ?></td>
						</tr>
					</table>
					<br>
				</div>
			</div>
		</div>
	</section>
</main>
<br><br>

</body>
</html>
<script>
    function goBack() {
        // Use JavaScript to navigate back one step in the browser history
        window.history.back();
    }
</script>