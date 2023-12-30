<?php
//include("auth.php");
require_once('Connections/conn.php');

$sql = "SELECT * FROM tbl_contact ORDER BY name ASC";

$query_reccontact = "SELECT tbl_contact.id_contact,
tbl_contact.fname,
tbl_contact.lname,
tbl_contact.email,
tbl_contact.subject,
tbl_contact.message
FROM tbl_contact
WHERE tbl_contact.id_contact
ORDER BY tbl_contact.fname ASC";
$reccontact = mysqli_query($conn, $query_reccontact);
$row_reccontact = mysqli_fetch_array($reccontact, MYSQLI_ASSOC);
$totalRows_reccontact = mysqli_num_rows($reccontact);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include 'inc/menu.php' ?>

</head>

<body>
<br>
<h2 class="text-info" style="text-align:center; color: navy !important;">SENARAI MAKLUM BALAS PELANGGAN</h2><br>

<table class="table table-hover">
	<thead>
	<tr>
		<th scope="col">NO</th>
		<th scope="col">NAMA</th>
		<th scope="col">EMEL</th>
		<th scope="col col-16p">SUBJEK</th>
		<th scope="col">KOMEN</th>
	</tr>
	</thead>
	<tbody>

    <?php
    $bil = 1;
    do {
        $bil = $bil++;
        ?>

		<tr>
			<th><?php echo $bil++; ?></th>
			<td class="col-md-3"><?php echo $row_reccontact['fname'] . ' ' . $row_reccontact['lname']; ?></td>
			<td class="col-md-3"><?php echo $row_reccontact['email']; ?></td>
			<td class="col-md-3 col-16p"><?php echo $row_reccontact['subject']; ?></td>
			<td class="col-md-10"><?php echo $row_reccontact['message']; ?></td>
		</tr>

        <?php
    } while ($row_reccontact = mysqli_fetch_assoc($reccontact));
    $rows = mysqli_num_rows($reccontact);
    if ($rows > 0) {
        mysqli_data_seek($reccontact, 0);
        $row_reccontact = mysqli_fetch_assoc($reccontact);
    }
    ?>
	</tbody>
</table>

<footer style="position: absolute; bottom: 0">
	<main>
		<div class="mainlogo ml2">
			<img src="img/logo.png" alt="logo">
			<p><strong>E-FONETIK SYSTEM FONETIK TUITION CENTER</strong></p>
		</div>
	</main>
</footer>
</body>
</html>