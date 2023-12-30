<?php
//include("auth.php");
require_once('connections/conn.php');

$cat = $_GET["q"];
$key = $_GET["s"];

if ($cat == 0) {
    $query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.ic,
ref_jantina.jantinaa,
ref_bangsa.bangsaa,
ref_agama.agamaa,
tbl_student.tarikh_lahir,
tbl_student.subject
FROM tbl_student
LEFT JOIN ref_jantina ON tbl_student.jantina=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_student.bangsa=ref_bangsa.bangsa_id
LEFT JOIN ref_agama ON tbl_student.agama=ref_agama.agama_id
WHERE tbl_student.id_student
ORDER BY tbl_student.nama ASC";
} else if ($cat == 1) {
    $query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.ic,
ref_jantina.jantinaa,
ref_bangsa.bangsaa,
ref_agama.agamaa,
tbl_student.tarikh_lahir,
tbl_student.subject
FROM tbl_student
LEFT JOIN ref_jantina ON tbl_student.jantina=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_student.bangsa=ref_bangsa.bangsa_id
LEFT JOIN ref_agama ON tbl_student.agama=ref_agama.agama_id
WHERE tbl_student.nama like '%$key%'
ORDER BY tbl_student.nama ASC";
} else if ($cat == 2) {
    $query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.ic,
ref_jantina.jantinaa,
ref_bangsa.bangsaa,
ref_agama.agamaa,
tbl_student.tarikh_lahir,
tbl_student.subject
FROM tbl_student
LEFT JOIN ref_jantina ON tbl_student.jantina=ref_jantina.jantina_id
LEFT JOIN ref_bangsa ON tbl_student.bangsa=ref_bangsa.bangsa_id
LEFT JOIN ref_agama ON tbl_student.agama=ref_agama.agama_id
WHERE tbl_student.ic like '%$key%'
ORDER BY tbl_student.nama ASC";
}

$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);

?>


<!DOCTYPE html>
<html>
<head>

	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>

</head>
<body>
<div id="txtTable"><br>

    <?php
    if ($totalRows_recstudent == 0) {
        ?>

		<br>
		<table class="table table-hover">
			<tr>
				<td> -- Tiada dalam Data --</td>
			</tr>
		</table>

        <?php
    } else {
        ?>

		<!-- Item table -->

		<table class="" style="margin: auto; margin-block: 60px; width: 1070px">
			<thead>
			<tr>
				<th style="width: 4%;">NO</th>
				<th>NAMA</th>
				<th>IC</th>
				<th style="width: max-content;">SUBJEK</th>
				<th style="width: 122px">KEMASKINI</th>
				<th>PADAM</th>
			</tr>
			</thead>
			<tbody>

            <?php
            $bil = 1;

            do {
                $bil = $bil++;
                ?>

				<!-- Add a modal (popup) structure -->
				<div id="deleteConfirmationModal" class="modal">
					<div class="modal-content">
						<p>Adakah anda pasti mahu memadamkan data pelajar ini?</p>
						<button id="confirmDeleteBtn">Ya</button>
						<button id="cancelDeleteBtn">Tidak</button>
					</div>
				</div>

				<tr>
					<th><?php echo $bil++; ?></th>
					<td class="stdname" style="width: 26%; padding-block: 20px;"><?php echo $row_recstudent['nama']; ?></td>
					<td class="stdic"><?php echo $row_recstudent['ic']; ?></td>
					<td class="stdsub" style="width: max-content;"><?php echo $row_recstudent['subject']; ?></td>
					<td><a href="view_student.php?id_student=<?php echo $row_recstudent['id_student']; ?>"
					       class="btn btn-warning">Kemaskini</a></td>
					<td><!--<a href="delete.php?id_student=<?php //echo $row_recstudent['id_student'];
                        ?>" class="btn btn-danger">Delete</a>-->
						<a href="#" class="btn btn-danger student-delete-button"
						   data-student-id="<?php echo $row_recstudent['id_student']; ?>"
						   aria-label="Delete student"
						   onclick="showDeleteModal('<?php echo $row_recstudent['id_student']; ?>');">Padam</a>
					</td>
				</tr>

                <?php
            } while ($row_recstudent = mysqli_fetch_assoc($recstudent));
            $rows = mysqli_num_rows($recstudent);
            if ($rows > 0) {
                mysqli_data_seek($recstudent, 0);
                $row_recstudent = mysqli_fetch_assoc($recstudent);
            }
            ?>
			</tbody>
		</table>
        <?php
    }
    ?>
</div>
</body>
</html>