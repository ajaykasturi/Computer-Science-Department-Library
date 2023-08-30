<?php 
session_start(); 
$expirationTime = 1800; // 30 minutes in seconds
if (isset($_SESSION['session_start_time']) && (time() - $_SESSION['session_start_time']) > $expirationTime) {
    // Destroy the session
  unset($_SESSION['loggedin']);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['session_start_time']);
	header("Location: ./index.php");
}
?>
<!doctype html>
<html lang="en" id="main">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php define("APP",true);?>
    <?php include './components/_header1.php'?>
    <?php include './components/_login.php'?>
    <div class="container" style="height:100vh;">
    <div class="d-flex flex-row">
  <div style="padding: 10px;">
    <div class="card" style="width: 60rem;margin-right: 10px;">
     <div class="card-body" style="margin-right: 0px;">
        <h3 class="heading">Contact</h3><hr>
       <p style="margin-left: 0px;font-size: 14px;">HoD Computer Science and Engineering<br>
                                                    RGUKT Basar<br>
                                                    Nirmal, Telangana<br>
                                                    Pin: 504107<br>
                                                    email: hod.cse@rgukt.ac.in<br>
          <br>
              P Laxmi Narayana<br>
              M. Tech<br>
              Assistant Professor<br>
              Email: laxminarayana123@gmail.com<br> 

          <br>CSE Department Library<br>
          1st floor ,Lab Complex.<br>
          Rajiv Gandhi University of Knowledge Technologies Basar<br>
          Nirmal District,<br>
          Telangana State - 504107<br>
          <br>
          Digital library<br>
          First floor Administrative Building (AB-III)<br>
          Rajiv Gandhi University of Knowledge Technologies Basar<br>
          Nirmal District,<br>
          Telangana State - 504107<br>
       </p>
     </div>
   </div>
  </div>
  <div style="margin-left:2px; padding: 10px;">
  <div class="card work" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color: brown;">Working Hours</h5><br>
      <p class="card-text paragraph">Reference Library opens 24 hours.<br>
                          
                          <br>Ciculation section timings: 9 am to 5 pm<br>
      </p>
    </div>
  </div>
  </div>
</div>
    </div>
    <?php include './components/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- <script src="darkmode.js"></script> -->
  </body>
</html>