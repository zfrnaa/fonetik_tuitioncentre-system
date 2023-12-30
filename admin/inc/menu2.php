<?php
//require_once('auth.php');
//session_start();
//$utype = $_SESSION['SESS_TYPE'];
//echo $utype;
date_default_timezone_set("Asia/Kuala_Lumpur");
$time = time();
$dt = date("Y-m-d", $time);

?>

<style>
    .dropdown-toggle::after{
        display: none;
    }
</style>
<header>
	<nav class="fh5co-nav">
		<div class="logo-a"><img src="img/alt-logofonetik1.svg" alt="logofonetik"></div>
		<div class="item-menu-cont">
			<div class="item-menu">
				<a href="utama.php">
					<img src="img/home-white.svg" alt="home-icon" width="30px">
				</a>
				<h4><a href="utama.php">Utama</a></h4>
			</div>
			<div class="item-menu">
				<a href="indexic.php">
					<img src="img/search-white.svg" alt="search-icon" width="30px">
				</a>
				<h4><a href="indexic.php">Semak</a></h4>
			</div>
			<div class="item-menu">
				<a href="category.php">
					<img src="img/category-white.svg" alt="category-icon" width="30px">
				</a>
				<h4><a href="category.php">Kategori</a></h4>
			</div>
			<div class="item-menu">
				<a href="contact.php">
					<img src="img/contact-white.svg" alt="contact-icon" width="30px">
				</a>
				<h4><a href="contact.php">Hubungi</a></h4>
			</div>
		</div>
		<div class="btn-action">
			<div class="btn-group">
				<button type="button" class="btn btn-addinfo btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span style="color: black;">+</span>&ensp;TAMBAH
				</button>
				<div class="dropdown-menu" style="min-width: auto">
					<a class="dropdown-item" href="add_student.php" style="color: midnightblue">Pelajar</a>
					<span>|</span>
					<a class="dropdown-item" href="add_teacher.php" style="color: midnightblue">Cikgu</a>
				</div>
			</div>
			<button type="button" name="add" id="add-info" class="btn-profile"><img src="img/zafran.jpg" alt="admin-img">
			</button>
			<h4><a href="">
					<a href="index.php"><button class="btn-logout" type="button" onclick="location.href='admin/index.php'"><img
							src="img/logout.svg" alt="logout-icon"></button></a>
				</a></h4>
		</div>
	</nav>
</header>