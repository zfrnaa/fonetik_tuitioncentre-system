<?php
require_once('Connections/conn.php');

//Start session
session_start();

$_SESSION['SESS_TYPE'] = 0;

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

$query_recteacher = "SELECT * FROM tbl_teacher ORDER BY name ASC";
$recteacher = mysqli_query($conn, $query_recteacher);
$row_recteacher = mysqli_fetch_array($recteacher, MYSQLI_ASSOC);
$totalRows_recteacher = mysqli_num_rows($recteacher);

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

$query_recSubject = "SELECT * FROM ref_subject WHERE flg_subject = '1' ORDER BY subject_name ASC";
$recSubject = mysqli_query($conn, $query_recSubject);
$row_recSubject = mysqli_fetch_array($recSubject);
$totalRows_recSubject = mysqli_num_rows($recSubject);
?>

<!DOCTYPE html>
<html lang="ms">

<head>


	<title>FONETIK</title>
</head>

<body class="body-addt">
<style>
	@import url("css/style.css");
    td {
        height: 60px;
    }

    .backdrop-blur {
        background-color: rgb(255 255 255 / 0.3);
    }

    .input-std {
        font-family: "Mona Sans Semibold";
        background-color: silver;
        transition: all 0.2s linear;
    }

    .input-std:focus {
        color: darkblue;
        border: 2px solid black;
    }
</style>

<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">&emsp;<button class="btn-back" style="margin: 16px 47vw 0 47vw">Kembali</button>
</a>

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

<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container addt-cont">
			<div class="fh5co-heading">
				<h2 class="text-info">Pendaftaran</h2>
				<p style="text-align: center">Daftarkan cikgu baru di sini</p>
			</div>

			<div class="table-stdcont backdrop-blur">
				<div style = "margin:30px">
					<form action="add_teacher_exec.php" method="post" enctype="multipart/form-data">
						<table class="center">
							<div class="center-addt">
								<h4>Maklumat Cikgu</h4>

                                <?php if (isset($_GET['error'])) : ?>
									<p><?php echo $_GET['error']; ?></p>
                                <?php endif ?>
								<a>TAMBAH GAMBAR CIKGU:</a>
								<input type="file" name="my_image" style="margin: auto 26vw auto;">
							</div>
							<br>


							<tr>
								<td width="225">&emsp;&emsp;Nama Penuh</td>
								<td width="25">:</td>
								<td width="800"><input type="text" class="form-control input-std" name="txtname"
								                       onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; IC</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtkp"
								           oninput="this.value = this.value.replace(/[^0-9]/g, '');"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Jantina</td>
								<td>:</td>
								<td>

									<select name="ddlgender" id="ddlgender" class="form-control input-std">
										<option value="">Jantina</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recJantina['jantina_id'] ?>"><?php echo $row_recJantina['jantinaa'] ?></option>
                                            <?php
                                        } while ($row_recJantina = mysqli_fetch_assoc($recJantina));
                                        $rows = mysqli_num_rows($recJantina);
                                        if ($rows > 0) {
                                            mysqli_data_seek($recJantina, 0);
                                            $row_recJantina = mysqli_fetch_assoc($recJantina);
                                        }
                                        ?>
									</select>
								</td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Bangsa</td>
								<td>:</td>
								<td>

									<select name="ddlnation" id="ddlnation" class="form-control input-std">
										<option value="">Bangsa anda</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recBangsa['bangsa_id'] ?>"><?php echo $row_recBangsa['bangsaa'] ?></option>
                                            <?php
                                        } while ($row_recBangsa = mysqli_fetch_assoc($recBangsa));
                                        $rows = mysqli_num_rows($recBangsa);
                                        if ($rows > 0) {
                                            mysqli_data_seek($recBangsa, 0);
                                            $row_recBangsa = mysqli_fetch_assoc($recBangsa);
                                        }
                                        ?>
									</select>
								</td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Agama</td>
								<td>:</td>
								<td>

									<select name="ddlreligion" id="ddlreligion" class="form-control input-std">
										<option value="">Agama anda</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recAgama['agama_id'] ?>"><?php echo $row_recAgama['agamaa'] ?></option>
                                            <?php
                                        } while ($row_recAgama = mysqli_fetch_assoc($recAgama));
                                        $rows = mysqli_num_rows($recAgama);
                                        if ($rows > 0) {
                                            mysqli_data_seek($recAgama, 0);
                                            $row_recAgama = mysqli_fetch_assoc($recAgama);
                                        }
                                        ?>
									</select>
								</td>
							</tr>

							<tr>
								<td>&emsp;&emsp;Tarikh Lahir</td>
								<td>:</td>
								<td><input type="date" class="form-control input-std" name="dtdob" required></td>
							</tr>

							<tr>
								<td>&emsp;&emsp;Alamat Rumah</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtaddress"
								           onKeyUp="this.value = this.value.toUpperCase();"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Nombor Telefon</td>
								<td>:</td>
								<td><input type="text" class="form-control input-std" name="txtcontact"
								           oninput="this.value = this.value.replace(/[^0-9]/g, '');"></td>
							</tr>

							<tr>
								<td>&emsp;&emsp; Subjek</td>
								<td>:</td>
								<td>

									<select name="ddlsubject" id="ddlsubject" class="form-control input-std">
										<option value="">Pilih Subjek</option>
                                        <?php
                                        do {
                                            ?>
											<option
												value="<?php echo $row_recSubject['subject_id'] ?>"><?php echo $row_recSubject['subject_name'] ?></option>
                                            <?php
                                        } while ($row_recSubject = mysqli_fetch_assoc($recSubject));
                                        $rows = mysqli_num_rows($recSubject);
                                        if ($rows > 0) {
                                            mysqli_data_seek($recSubject, 0);
                                            $row_recSubject = mysqli_fetch_assoc($recSubject);
                                        }
                                        ?>
									</select>
								</td>
							</tr>
						</table>
						<input type="hidden" class="form-control input-std" name="txtid_teacher"
						       value="<?php echo $id_teacher; ?>">
						<input type="submit" class="btn btn-submitform" value="Tambah" name="submit">
					</form>
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