<?php include 'inc/menu.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<style>
        body {
            background: lavender url("img/system-bg.svg") no-repeat center;
            background-blend-mode: luminosity;
            background-size: cover;
        }

        .td-categorychoice {
            background-color: beige;
            border-radius: 20px;
	        padding: 0;
        }
        .td-categorychoice>a>img{
            border: 1px solid black;
	        border-radius: 20px;
	        mix-blend-mode: darken;
        }
	</style>
</head>
<body>

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

<div style="margin: 160px 40px">
	<table style="margin: auto;">
		<tr>
			<td class="td-categorychoice">
				<a href="view_allstudent.php"><img src="img/student.png" width="300" height="300"/></a>
			</td>
			<td>&emsp;</td>
			<td class="td-categorychoice">
				<a href="view_allteacher.php"><img src="img/teacher.png" width="300" height="300"/></a>
			</td>
		</tr>
	</table>
</div>
<?php include 'inc/footer.php' ?>
</body>
</html>