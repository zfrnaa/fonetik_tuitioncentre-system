<?php
include("Connections/conn.php");
//Start session
session_start();
$error = "";


//include 'inc/menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $login = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   $sql = "SELECT * FROM profile WHERE usernm = '$login' and pwd = '$password' and sts = '1'";

   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   //$active = $row['active'];
   //echo  $sql;
   $count = mysqli_num_rows($result);
   //echo "The password entered is incorrect, or you have not registered yet.";
   // If result matched $myusername and $mypassword, table row must be 1 row

   if ($count == 1) {

      $_SESSION['SESS_MEMBER_ID'] = $row['idl'];
      $_SESSION['SESS_USERNAME'] = $row['usernm'];

      session_write_close();


      if ($row['typ'] == 2) {
         header("location: utama.php");

         exit();
      } else {
         $error = "Your Login Name or Password is invalid";
		 echo $error;
      }
   }
}
?>
<html>

<head>
   <link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
   <link rel="stylesheet" href="css/vanilla-zoom.min.css">
	<link rel="stylesheet" href="css/style-login.css">
   <title>FONETIK</title>
</head>


<style>
	.text-info{
		color: #1f3a75;
		font-family: "Mona Sans Bold";
	}
   .staff-form {
       margin: auto;
   }

   label {
      font-weight: bold;
      width: 100px;
      font-size: 14px;
   }

   .box {
      border: #666666 solid 1px;
   }

   main {
      background-color: #fff;
   }
</style>

</head>

<body class="body-login">

   <!--NEW-->
   <main class="page login-page">
      <section class="clean-block clean-form dark">
         <div class="loginbackground box-background--white padding-top--64">
            <div class="loginbackground-gridContainer">
               <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                  <div class="box-root" style="flex-grow: 1;">
                  </div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                  <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                  <div class="box-root box-background--blue800 animationLeftRight tans3s" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                  <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                  <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                  <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                  <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                  <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
               </div>
               <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                  <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
               </div>
            </div>
         </div>
         <div class="container login-admin" style="margin-block: 17vh;">
         <div class="staff-form">
            <div class="block-heading">
               <h2 class="text-info">Akses Pentadbir Fonetik</h2>
               <p>Log masuk ke sistem menggunakan kelayakan yang betul.</p>
            </div>
            <div style="width:500px; border: solid 1px #BEBEBF; background-color: #E9F8FA;">
               <div style="margin:30px">
                  <form method="POST" action="">
                     <div class="mb-3"><label for="nric">ID Log masuk</label><input class="form-control form-label item" type="text" id="username" name="username" required></div>
                     <div class="mb-3"><label for="password">Katalaluan</label><input class="form-control form-label" type="password" id="password" name="password" required></div>
                     <div class="mb-3">
                     </div><button class="btn btn-primary" type="submit">Log Masuk</button>
                  </form>


               </div>

            </div><br>

            <div class="login-admin2" style="width:500px; border: solid 1px #BEBEBF; background-color: #E9F8FA;">
               <p style="margin:1rem;">Pengguna baharu? <a href="register.php">Buat akaun baharu</a></p>
            </div>
            </div>
         </div>
      </section>
   </main>

</body>

</html>