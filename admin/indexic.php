<?php
require_once('Connections/conn.php');

// Start session
session_start();

include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

<script type="text/javascript">
    // Validation starts here

    function validate(f) {


        var lenic = f.txtic.value.trim().length;

        if (lenic !== 12) {
            document.getElementById("reqtxtic").innerHTML = "*  Sila masukkan 12 digit No K/P tanpa (-)";
            f.txtic.focus();
            return false;
        }
    }
</script>

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


<div class="container indexic-cont">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="img/Aa.jpg" alt="pictureA">
			</div>

			<div class="item">
				<img src="img/Bb.jpg" alt="pictureB">
			</div>

			<div class="item">
				<img src="img/Cc.jpg" alt="pictureC">
			</div>

			<div class="item">
				<img src="img/Dd.jpg" alt="pictureD">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Kembali</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Seterusnya</span>
		</a>
	</div>
</div>


<br>

<div>
	<div class="indexic-input-cont">
		<div style="margin:30px">
			<div class="style1">Masukkan IC tanpa tanda (-)</div>
			<p>Semak sebelum mendaftar</p>
			<div style="display: flex; margin-inline: 4vw;">
				<form name="form1" autocomplete="off" method="post" action="ic_search_exec.php"
				      onSubmit="return validate(this)">
					<br><input name="txtic" type="text" id="txtic" size="30" maxlength="100" placeholder="Nombor IC"
					           autocomplete="off" onKeyPress="return /[0-9]/i.test(event.key)"/>
					<input name="Submit" type="submit" class="btn-primary " value="Semak"/>
					<br><span id="reqtxtic" class="reqError"> </span>
				</form>
			</div>
		</div>
	</div>
</div>
<br><br>

<?php
include 'inc/footer.php';
?>
</body>
</html>