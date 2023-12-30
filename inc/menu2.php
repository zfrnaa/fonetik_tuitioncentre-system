<?php  
date_default_timezone_set("Asia/Kuala_Lumpur");
$time = time();
$dt=date("Y-m-d" , $time);

?>


<nav class="navbar navbar-expand-lg navbar-light bg-info" >
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
   
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
   
      <li class="nav-item">
        <a class="nav-link" href="about_us.php">About <span class="sr-only"></span></a> 
      </li>
    
      <li class="nav-item" >
        <a class="nav-link" href="activity.php">Activity</a>
      </li>

      <li class="nav-item" >
        <a class="nav-link" href="promotion.php">Promotion</a>
      </li>
       
      <li class="nav-item" >
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>

    </ul>
  </div>
</nav>



