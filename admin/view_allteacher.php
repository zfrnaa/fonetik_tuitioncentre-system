<?php
//include("auth.php");
require_once('Connections/conn.php');

//Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

//$tarikh = date("Y/m/d");

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
ORDER BY name ASC";
$recteacher = mysqli_query($conn, $query_recteacher);
$row_recteacher = mysqli_fetch_array($recteacher, MYSQLI_ASSOC);
$totalRows_recteacher = mysqli_num_rows($recteacher);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-FONETIK SYSTEM FONETIK TUITION CENTER</title>


	<style>
        .vwt-cont {
            width: 1000px;
            margin: auto;
        }

        .teacher-cont {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .teacher-item {
            display: flex;
            width: 290px;
        }

        .teacher {
            flex-grow: 1;
        }

        .flex-teacher {
            display: flex;
            flex-direction: column;
        }

        .teacher-overlays {
            line-height: 0;
            margin: auto;
            margin-block: 20px 0;
        }

        .teacher-image {
            margin: auto;
        }

        .teacher-image img {
            object-fit: contain;
        }

        .teacher-name {
            text-align: center;
            margin-bottom: 20px;
        }
	</style>

</head>
<body>
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

<h2 class="text-info">SENARAI CIKGU</h2>
<br>

<!--SEARCH-->
<div>
	<div class="select-teacher">
		<input name="txtSearch" type="text" id="txtSearchCikgu" autocomplete="off" placeholder="Cari"
		       onKeyUp="this.value = this.value.toUpperCase();"/>
		<select name="select" value="Sila Pilih" onclick="showUser(this.value)">
			<option value="0">Sila Pilih</option>
			<option value="1">Nama</option>
			<option value="2">IC</option>
		</select>
	</div>
</div>

<div class="vw-addbutton">
	<a type="button" href="add_teacher.php" class="btn btn-primary" style="">Tambah</a>
</div>

<div id="txtHint"><br>

    <?php
    if ($totalRows_recteacher == 0) {
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
										     style="border: 2px solid #000;">
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
												<h2 class="teacher-name"
												    style=""><?php echo $row_recteacher['name']; ?></h2>
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
<?php include 'inc/footer.php' ?>
</body>

</html>


<script>
    function showUser(str, str1) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        //var url="getbutir.php";
        //var key = document.getElementById('txtsearch').value;

        //var url1=url+"?q="+str"&s="+str1;

        var namevalue = encodeURIComponent(document.getElementById("txtSearchCikgu").value);

        xmlhttp.open("GET", "get_teacher.php?s=" + namevalue + "&q=" + str, true);
        //xmlHttp.send(params);
        xmlhttp.send();
    }
</script>