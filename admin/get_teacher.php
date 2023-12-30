<?php
//include("auth.php");
require_once('connections/conn.php');

$cat = $_GET["q"];
$key = $_GET["s"];

if ($cat == 0) {
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
    WHERE tbl_teacher.id_teacher
    ORDER BY tbl_teacher.name ASC";
} else if ($cat == 1) {
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
WHERE tbl_teacher.name like '%$key%'
ORDER BY tbl_teacher.name ASC";
} else if ($cat == 2) {
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
WHERE tbl_teacher.kp like '%$key%'
ORDER BY tbl_teacher.name ASC";
}
$recteacher = mysqli_query($conn, $query_recteacher);
$row_recteacher = mysqli_fetch_array($recteacher, MYSQLI_ASSOC);
$totalRows_recteacher = mysqli_num_rows($recteacher);

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<style>
	@import "css/style.css";
</style>
<div id="txtHint"><br>

    <?php
    if ($totalRows_recteacher == 0){
        ?>

		<br>
		<table class="table table-hover">
			<tr>
				<td> -- Tiada dalam Data --</td>
			</tr>
		</table>

        <?php
    }
    else{
    ?>

	<!-- VIEW CONTENT -->
	<section id="page">

		<div class="content-cikgu">
			<div class="vwt-cont">
				<div class="">
					<div class="">
						<div class="">
							<div id="container-teacher" class="teacher-cont">

                                <?php

                                do {
                                    ?>
									<div class="teacher-item">
										<div class="teacher"
										     style="border: 2px solid #000; background-color: #fff;">
											<div class="flex-teacher">
												<div class="teacher-image">
													<img src="uploads/<?php echo $row_recteacher['image']; ?>"
													     class="img-responsive" width="250px" alt="">
												</div>
												<div class="teacher-overlays"><br>
													<span>
                                        <a class='btn btn-primary displaybtn'
                                           href="view_teacher.php?id_teacher=<?php echo $row_recteacher['id_teacher']; ?>">Butiran</a>
                                        </span>
												</div>
												<h2 class="teacher-name"><?php echo $row_recteacher['name']; ?></a></h2>
												<!--<a href="view_student.php?id_teacher=<?php //echo $row_recSubject['subject_name'];
                                                ?>" class="btn btn-warning"></a>-->
												<div
													class="teacher-subject"><?php echo $row_recteacher['subject_name']; ?>
													<span></span></div>
												<h6 class="teacher-name"><?php echo $row_recteacher['kp']; ?></a></h6>
											</div>
										</div>
									</div><br>
                                    <?php
                                } while ($row_recteacher = mysqli_fetch_assoc($recteacher));
                                $rows = mysqli_num_rows($recteacher);
                                if ($rows > 0) {
                                    mysqli_data_seek($recteacher, 0);
                                    $row_recteacher = mysqli_fetch_assoc($recteacher);
                                }
                                ?>

							</div>
						</div>
						<div class="clearfix"></div>

					</div>
				</div>
	</section>
</div>
<?php
}
?>

<br>
</body>
</html>