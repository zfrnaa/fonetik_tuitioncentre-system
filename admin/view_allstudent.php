<?php
//include("auth.php");
require_once('Connections/conn.php');

//$ids=$_GET['id_staff'];
//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

$sql = "SELECT * FROM tbl_student ORDER BY nama ASC";

$query_recstudent = "SELECT tbl_student.id_student,
tbl_student.nama,
tbl_student.subject,
tbl_student.ic
FROM tbl_student
WHERE tbl_student.id_student and tbl_student.flg_student='1'
ORDER BY tbl_student.nama ASC";
$recstudent = mysqli_query($conn, $query_recstudent);
$row_recstudent = mysqli_fetch_array($recstudent, MYSQLI_ASSOC);
$totalRows_recstudent = mysqli_num_rows($recstudent);
//echo $recstudent;

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

?>

<!DOCTYPE html>
<html lang="ms">
<head>

	<title>Lihat Senarai Pelajar</title>
</head>

<body>
<style>@import "css/style.css";</style>
<br>

<div class="about">
	<a class="bg_links social portfolio"
	   href="https://www.facebook.com/profile.php?id=100063540133382&mibextid=ZbWKwL"
	   target="_blank">
		<span class="icon"></span>
	</a>
	<a class="bg_links social dribbble" href="tadikafonetik2002@hotmail.com"
	   target="_blank">
		<span class="icon"></span>
	</a>
	<a class="bg_links social linkedin" href="http://www.wasap.my/60167014774"
	   target="_blank">
		<span class="icon"></span>
	</a>
	<a class="bg_links logo"></a>
</div>

<h2 class="text-info" style="text-align: center">SENARAI PELAJAR</h2>
<br>

<div>
	<div class="select-std">
		<input name="txtSearch" type="text" id="txtSearch" autocomplete="off" placeholder="Cari"
		       onKeyUp="this.value = this.value.toUpperCase();"/>
		<select id="filter-search" name="select" value="Sila Pilih" onclick="showUser(this.value)">
			<option value="0">Susun Mengikut</option>
			<option value="1">Nama</option>
			<option value="2">IC</option>
		</select>
	</div>
</div>

<div class="vw-addbutton">
	<a type="button" href="add_student.php" class="btn btn-primary">Tambah</a>
</div>

<div id="txtTable"><br>

    <?php
    if ($totalRows_recstudent == 0) {
        ?>

		<br>
		<table class="table table-hover">
			<tr>
				<td> -- Tiada dalam data --</td>
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
					<td>
						<a href="#" class="btn btn-danger student-delete-button"
						   data-student-id="<?php echo $row_recstudent['id_student']; ?>"
						   aria-label="Delete student"
						   onclick="showDeleteModal('<?php echo $row_recstudent['id_student']; ?>')">Padam</a>
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
<footer class="ft-vwstd" style="">
	<main>
		<div class="mainlogo ml2">
			<img src="img/logo.png" alt="logo">
			<p><strong>E-FONETIK SYSTEM FONETIK TUITION CENTER</strong></p>
		</div>
	</main>
</footer>

<script type="text/javascript">
    function showUser(str, str1) {
        if (str == "") {
            document.getElementById("txtTable").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtTable").innerHTML = xmlhttp.responseText;
            }
        }
        //var url="getbutir.php";
        //var key = document.getElementById('txtsearch').value;

        //var url1=url+"?q="+str"&s="+str1;

        var namevalue = encodeURIComponent(document.getElementById("txtSearch").value);

        xmlhttp.open("GET", "get_student.php?s=" + namevalue + "&q=" + str, true);
        //xmlHttp.send(params);
        xmlhttp.send();
    }

    //DELETE
    function showDeleteModal(id) {
        var modal = document.getElementById('deleteConfirmationModal');
        var confirmBtn = document.getElementById('confirmDeleteBtn');
        var cancelBtn = document.getElementById('cancelDeleteBtn');

        // Set the student ID in the modal for reference during deletion
        modal.dataset.studentId = id;

        // Display the modal
        modal.style.display = 'block';

        // Handle the "Yes" button click
        confirmBtn.onclick = function () {
            var studentId = modal.dataset.studentId;
            window.location.href = 'delete.php?id_student=' + studentId;
        };

        // Handle the "No" button click
        cancelBtn.onclick = function () {
            modal.style.display = 'none';
        };

        // Close the modal if the user clicks outside of it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    }

    const selectElement = document.getElementById('filter-search');
    const tableHeader = document.querySelector('th.col');
    const tableColumn = document.querySelector('td.col');

    selectElement.addEventListener('change', () => {
        tableHeader.classList.add('');
        tableColumn.classList.add('');
    });
</script>

</body>

</html>