<?php
require_once('admin/Connections/conn.php');

//Start session
session_start();

// include 'inc/menu.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FONETIK</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="css/untitled.css">
    <link rel="stylesheet" href="css/vanilla-zoom.min.css">

    <!--hsa-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="jvs/jquery.min.js"></script>
    <script src="jvs/popper.min.js"></script>
    <script src="jvs/bootstrap.min.js"></script>
    <link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />

    <!--W3school-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('styleuser1.css');

        body {
            /* background-image: url("admin/img/lego2.png"); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .mainNav2 {
            width: 100%;
            height: 80px;
            display: flex;
            position: absolute;
            z-index: 1;
            justify-content: space-between;
            align-items: center;
            color: #666f92;
            text-transform: uppercase;
            padding: 0 40px;
        }

        .more-left {
            position: relative;
            left: 35%;
            width: max-content;
        }
    </style>
</head>

<body>
    <nav class="mainNav2">
        <div class="mainNav__logo"><img src="admin/img/logo.png" alt="" srcset=""></div>
        <div class="mainNav__links">
            <a href="index.html" class="mainNav__link">Home</a>
            <a href="activity.php" class="mainNav__link">Activities</a>
            <a href="promotion.php" class="mainNav__link">Promotion</a>
            <a href="contact.php" class="mainNav__link">Contact</a>
        </div>
        <div class="mainNav__icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g data-name="Layer 2" fill="#9197AE">
                    <g data-name="menu-2">
                        <rect width="24" height="24" transform="rotate(180 12 12)" opacity="0" />
                        <circle cx="4" cy="12" r="1" />
                        <rect x="7" y="11" width="14" height="2" rx=".94" ry=".94" />
                        <rect x="3" y="16" width="18" height="2" rx=".94" ry=".94" />
                        <rect x="3" y="6" width="18" height="2" rx=".94" ry=".94" />
                    </g>
                </g>
            </svg>
        </div>
    </nav>
    <div class="mainHeading">
        <div class="mainHeading__content">

        </div>
    </div>
    <div class="page landing-page">

        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading"><br><br><br><br>
                    <div>
                        <h2 class="text-info">Tadika Fonetik Background</h2>
                        <p>Tadika Fonetik, founded by Mrs. Chan Len Teh and Mrs. Alice Lye Chou Ngo in 2002, is a preschool and kindergarten situated in Johor, Malaysia. The school is dedicated to providing children with a nurturing and secure environment where they can develop their social, emotional, cognitive, and physical skills. Along with phonics, the school focuses on providing a comprehensive range of educational and developmental activities, which includes teaching languages like Mandarin, English, and Bahasa Melayu.
                            Mrs. Chan Len Teh has a background in teaching and education, having previously worked as a teacher and principal at several schools in Malaysia. She has a passion for early childhood education and believes that every child deserves a strong foundation in reading and writing skills.
                            Mrs. Alice Lye Chou Ngo, on the other hand, has a background in business and management. She has a strong interest in education and child development, and together with Mrs. Chan, they established Tadika Fonetik to provide a high-quality phonetics-based education to young children.<br></p>
                    </div><br>

                    <div>
                        <h2 class="text-info">Vision and Mission</h2>
                        <p>The Vision and Mission of Tadika Fonetik is quite different from other kindergartens，Mrs. Alice said that Fonetik is a meaningful word, and each letter has its own meaning when it is spelled out.<br></p>
                        <p align="left" class="more-left"><b>F</b>oundation of love and interest in learning<br>
                            <b>O</b>pportunity of studying in multicultural<br>
                            <b>N</b>urture of positive and attitude<br>
                            <b>E</b>nhancement in total development<br>
                            <b>T</b>hematic,integrated, ICT and learn-through<br>
                            <b>I</b>nteresting and interactive multimedia teaching<br>
                            <b>K</b>eep upgrading teaching and learning
                        </p>
                    </div><br>

                    <div>
                        <h2 class="text-info">Tadika Fonetik Product and Services</h2>
                        <p align="left"><b>Preschool programs: </b>These are designed for young children, typically ages 4-6, and focus on basic skills like language development.<br>
                            <b>Outdoor activity: </b>Growing vegetables, sports, small games suitable for children, and so on.<br>
                            <b>Art classes for children: </b>Provides instruction and guidance in various art forms to kids.<br>
                            <b>Tuition for children in English phonics: </b>helps children develop their phonemic awareness, which is the ability to recognize and manipulate individual sounds in words.<br>
                            <b>Childcare services: </b>Kindergartens may also offer daycare services for children whose parents work during the day. This may include before and after school care.<br>
                            <b>Parents day: </b>Parents are invited to visit their child's kindergarten and spend some time there with their child and their child's teacher<br>
                            <b>Education trip: </b>Taking students out of the classroom and into a real-world setting, such as a museum, zoo, park, or historical site, to enhance their learning experience.<br>
                            <b>Concert: </b>An event where children showcase their talents and skills in singing, dancing, and performing for an audience.
                        </p><br><br><br><br>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block about-us"></section>
    </div>


    <?php include 'inc/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="js/vanilla-zoom.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>