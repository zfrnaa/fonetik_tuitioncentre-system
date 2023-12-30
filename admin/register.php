<!DOCTYPE html>
<html lang="en">

<head>
   <meta name-"viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>FONETIK</title>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
      <link rel="stylesheet" href="css/vanilla-zoom.min.css">
      <link rel="stylesheet" href="css/style-login.css">
   </head>


   <style>

      body {
         font-family: "Mona Sans", Helvetica, sans-serif;
         font-size: 14px;
      }

      .text-info{
	 color: #1f3a75;
         font-family: "Mona Sans Bold";
      }
      label {
         font-weight: bold;
         width: 100px;
         font-size: 14px;
      }


      main {
         background-color: #fff;
      }
   </style>

</head>

<body>

   <!--NEW-->
   <br><br><br><br>
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
         <div class="container">

            <div class="staff-form">
               <div class="block-heading">
                  <h2 class="text-info">Akses Kakitangan Baharu</h2>
                  <p>Daftar profil untuk kakitangan baharu.</p>
               </div>
               <div style="width:500px; border: solid 1px #BEBEBF; background-color: #E9F8FA;">
                  <div style="margin:30px">
                     <form method="get" class="person-animation-register">
                        <figure aria-hidden="true">
                           <div class="person-body"></div>
                           <div class="neck skin"></div>
                           <div class="head skin">
                              <div class="eyes"></div>
                              <div class="mouth"></div>
                           </div>
                           <div class="hair"></div>
                           <div class="ears"></div>
                           <div class="shirt-1"></div>
                           <div class="shirt-2"></div>
                        </figure>
                     </form>
                     <div class="input">
                        <form action="register_exec.php" method="post">
                           <div class="mb-3"><label class="form-label input-label">Nama</label>
                              <input class="form-control item input-field" type="text" id="txtnama" name="txtnama" required>
                           </div>
                           <div class="mb-3"><label class="form-label input-label">ID Log masuk</label>
                              <input class="form-control item input-field" type="text" id="txtusernm" name="txtusernm" required>
                           </div>
                           <div class="mb-3"><label class="form-label input-label">Katalaluan</label>
                              <input class="form-control input-field" type="password" id="txtpwd" class="show-password" name="txtpwd" required>
                           </div>
                           <div class="mb-3">
                           </div><input type="submit" class="btn btn-primary" value="Daftar" name="submit">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>

</body>

</html>