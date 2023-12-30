<?php
//include("auth.php");
 require_once('admin/Connections/conn.php');


?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fonetik Tuition Centre &mdash; Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
	      content="Boost your child's education with Fonetik Tuition Center! Fun & effective classes for secondary schoolers, improving the way they learn and thinking. Enroll now!"/>
	<meta name="keywords"
	      content="fonetik, prominent tutor, tuition, fun effective class"/>
	<meta name="author" content="zulfahmi, alen, zafran"/>

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>


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
							<li class="active"><a href="courses.php">Courses</a></li>
							<li><a href="promotion.php">Promotion</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</nav>


	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(userres/images/courses-mainimg.jpg);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1>Demanding courses in your secondary school to be learn</h1>
									<p><a class="btn btn-primary btn-lg" href="#fh5co-course">Join Us Now!</a></p>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li style="background-image: url(userres/images/home2.jpg);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1>The Great Aim of Education is not Knowledge, But Action</h1>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Join Us Now!</a></p>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li style="background-image: url(userres/images/home3.webp);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1>We Help You to Learn New Things</h1>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Join Us Now!</a></p>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>


	<div id="fh5co-course">
		<div class="container">
			<div class="row animate-box box-shadow-or" style="margin-bottom: 30px">
				<div class="text-center margin-top-20">
					<h2>Our Courses</h2>
					<p>SPM</p>
					<p class="margin-8p paddingr-120x text-center">We are providing tuition classes for SPM level for subjects like
						Bahasa Melayu, English, Sejarah,
						Modern Mathematics, Additional Mathematics and Science.</p>
					<br><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/bm.webp);">
						</a>
						<div class="desc">
							<h3><a href="#">Bahasa Melayu</a></h3>
							<p>Learn Malay effectively with our course, focusing on reading, writing, listening, and
								speaking. We emphasize grammar, vocabulary, and comprehension to help you express
								yourself confidently in both written and spoken Malay.</p>
							<span><a href="sub-bm.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/eng.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">English</a></h3>
							<p>Master English skills through our course, covering reading, writing, grammar, and
								speaking. Our interactive teaching methods aim to build a strong foundation, ensuring
								academic success and practical language skills for everyday use..</p>
							<span><a href="sub-eng.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/sc.webp);">
						</a>
						<div class="desc">
							<h3><a href="#">Science</a></h3>
							<p>Explore physics, chemistry, and biology basics in our Science course. We make learning
								fun with hands-on experiments, fostering a deep understanding of scientific principles.
								Get ready for SPM exams and develop critical thinking for real-world applications.</p>
							<span><a href="sub-scs.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/sej.png);">
						</a>
						<div class="desc">
							<h3><a href="#">Sejarah</a></h3>
							<p>Explore physics, chemistry, and biology basics in our Science course. We make learning
								fun with hands-on experiments, fostering a deep understanding of scientific principles.
								Get ready for SPM exams and develop critical thinking for real-world applications.</p>
							<span><a href="sub-sej.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/math.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">Mathematics</a></h3>
							<p>Excel in Math with our courses. Modern Math focuses on practical concepts and
								problem-solving, while Additional Math delves into advanced topics, enhancing analytical
								thinking. Both courses prepare you for SPM exams and future academic challenges.</p>
							<span><a href="sub-math.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(userres/images/addmath.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">Additional Mathematics</a></h3>
							<p>Excel in Math with our courses. Modern Math focuses on practical concepts and
								problem-solving, while Additional Math delves into advanced topics, enhancing analytical
								thinking. Both courses prepare you for SPM exams and future academic challenges.</p>
							<span><a href="sub-addmath.php" class="btn btn-primary btn-sm btn-course">Tell more</a></span>
						</div>
					</div>
				</div>
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

	<footer id="fh5co-footer" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p style="text-align: justify">We, Fonetic tutor, always doing our best to make sure our students
						excel with their study and get
						their target for Sijil Pelajaran Malaysia (SPM)</p>
				</div>
				<div class="col-md-2f col-sm-4 col-xs-6 fh5co-widget">
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
    // Select all elements with the class "btn-scroll"
    const scrollButtons = document.querySelectorAll('.btn-scroll');

    // Add a click event listener to each button
    scrollButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent default link behavior
            event.preventDefault();

            // Get the href of the button (the ID of the target section)
            const targetId = button.getAttribute('href');

            // Get the target element
            const targetElement = document.querySelector(targetId);

            // Smoothly scroll to the target element
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        });
    });

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