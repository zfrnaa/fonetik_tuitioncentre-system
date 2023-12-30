<?php
//include("auth.php");
 require_once('admin/Connections/conn.php');

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fonetik Tuition Centre &mdash; Teacher</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
	      content="Boost your child's education with Fonetik Tuition Center! Fun & effective classes for secondary schoolers, improving the way they learn and thinking. Enroll now!"/>
	<meta name="keywords"
	      content="fonetik, prominent tutor, tuition, fun effective class"/>
	<meta name="author" content="zulfahmi, alen, zafran"/>


	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Fonetic Tuition Center, we lead your way"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content="A tuition where the prominent tutor is based"/>

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="userres/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="userres/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="userres/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="userres/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="userres/css/owl.carousel.min.css">
	<link rel="stylesheet" href="userres/css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="userres/css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="userres/css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="userres/css/style.css">

	<!-- Modernizr JS -->
	<script src="userres/js/modernizr-2.6.2.min.js"></script>
	<script src="userres/js/respond.min.js"></script>

</head>
<body>

<div class="fh5co-loader"></div>

<div class="about">
	<a class="bg_links social portfolio"
	   href="https://www.facebook.com/profile.php?id=100063540133382&mibextid=ZbWKwL"
	   target="_blank">
		<span class="icon" style="background-image: url(userres/images/wfb.png);"></span>
	</a>
	<a class="bg_links social dribbble" href="tadikafonetik2002@hotmail.com"
	   target="_blank">
		<span class="icon" style="background-image: url(userres/images/wgmail.png);"></span>
	</a>
	<a class="bg_links social linkedin" href="http://www.wasap.my/60167014774"
	   target="_blank">
		<span class="icon" style="background-image: url(userres/images/wtwasap.png);"></span>
	</a>
	<a class="bg_links logo"></a>
</div>

<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">Together We Embrace The Knowledge!</p>
						<p class="num">Call: +06-543008</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>Fonetik<span>.</span></a>
						</div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="activity.php">Activities</a></li>
							<li><a href="teacher.php">Teacher</a></li>
							<li><a href="courses.php">Courses</a></li>
							<li class="active"><a href="promotion.php">Promotion</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</nav>

	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides promo">
				<li style="background-image: url(userres/images/promo-banner1.png);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1 class="heading-section">Promotion</h1>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li style="background-image: url(userres/images/promo-banner2.png);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li style="background-image: url(userres/images/promo-banner3.png);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Join Us Now!</a></p>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>
	<br>
	<div id="fh5co-course">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Our Promotion </h2>
					<p>SPM</p>
					<p>Attention Parents! Invest in Your Child's Future with Our Unmatched Secondary School Tuition Solutions!.</p>
					<br><br>
				</div>
			</div>

			<div class="desc">
				<center><span><a href="courses.php" class="btn btn-primary btn-sm btn-course">View More</a></span><center>
			</div>
		</div>
	</div>

	<div id="fh5co-register" style="background-image: url(userres/images/counterspm.avif);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Counting Days before SPM</h2>
					<h3>By Kementerian Pelajaran Malaysia (KPM)</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>You get the chance do your bright future, Hurry Up!</strong></p>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p>We, Fonetic tutor, always doing our best to make sure our students excel with their study and get
						their target for Sijil Pelajaran Malaysia (SPM)</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Explore Us Fonetik</h3>
					<ul class="fh5co-footer-links">
						<li><a href="index.php">Home</a></li>
						<li><a href="teacher.php">Our Teacher</a></li>
						<li><a href="#">Pricing</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
				</div>

				<div class="col-md-2f col-sm-4 fh5co-widget">
					<h3>Learn & Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="activity.php">Activity</a></li>
						<li><a href="#">Events</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="courses.php">Courses</a></li>
					</ul>
				</div>
				<div class="col-md-2f col-sm-4 fh5co-widget">
					<h3>Connect & Discover</h3>
					<ul class="fh5co-footer-links">
						<li><a href="promotion.php">Promotion</a></li>
						<li><a href="about.php">About Us</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2023 Fonetik Tuition Centre . All Rights Reserved.</small>
						<small class="block">Designed by <a href="#">Fonetik</a></small>
				</div>
			</div>

		</div>
	</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="userres/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="userres/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="userres/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="userres/js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="userres/js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="userres/js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="userres/js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="userres/js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="userres/js/jquery.magnific-popup.min.js"></script>
<script src="userres/js/magnific-popup-options.js"></script>
<!-- Count Down -->
<script src="userres/js/simplyCountdown.js"></script>
<!-- Main -->
<script src="userres/js/main.js"></script>
<script>
    const targetDate = new Date(2024, 0, 30);
    // Month is zero-based, so January = 0

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1,
        day: targetDate.getDate(),
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1,
        day: targetDate.getDate(),
        enableUtc: false
    });
</script>
</body>
</html>




