<?php 
include './components/_dbconnect.php';
session_start();
// Check if the session start time is older than the desired expiration time (e.g., 30 minutes)
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
<html lang="en" id="main" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
	<link rel="stylesheet" href="./chat2.css" class="stylesheet">
	<link rel="stylesheet" href="./msg.css" class="stylesheet">
	<link rel="stylesheet" href="./topbook.css" class="stylesheet">
    <title>CSE Dept. Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
		.hover:hover {
			background-color:rgb(211, 248, 248);
		}
	</style>
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/cse-lib.css" rel="stylesheet" />
</head>
  <body>
	<!-- Header file for navigation, logo and title -->
	<?php define("APP",true);?>
	<?php include './components/_header1.php';?>
	<?php
    if(isset($_GET['log']) && $_GET['log']=="true"){
      echo '<div class="alert alert-success alert-sm alert-dismissible fade show col-sm" role="alert" id="signupError">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
      </svg>
      <strong>Authentication Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
   else if (isset($_GET['log']) && $_GET['log']=="false"){
      echo '<div class="alert alert-danger alert-sm alert-dismissible fade show" role="alert" id="signupError">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg>
      <strong>Authentication Failed!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
	<?php 
		if(isset($_GET['alert']) && $_GET['alert']!=="false"){
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="signupError">
                    <strong>Success! </strong>'.$_GET['alert'].'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
		}
		if(isset($_GET['error']) && $_GET['error']!=="false"){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="signupError">
			<strong>Sorry! </strong>'.$_GET['error'].'
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
		}
	?>
	<!-- carousel to slideshow the images -->
	<?php include './components/_carousel.php'?>
	<!-- Top books will be shown here -->
	<?php include './components/_topbooks.php'?>

	<!-- explore and some info about references -->
	<?php include './components/_explorehero.php'?>
	<!-- chat bot -->
	<div class="open-button" onclick="openForm()">
	<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#04AA6D" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
		<path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
	</svg>
	</div>
	<!-- <button class="open-button" onclick="openForm()" style="border-radius:50%;">Chat</button> -->
	<?php include './components/_chatbot.php'?>
	<!-- footer -->
	<?php include './components/_footer.php'?>
	<!-- bootstrap js cdn -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<!-- Datatables JS -->
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script>
		function openForm() {
  			document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
  			document.getElementById("myForm").style.display = "none";
		}
	</script>
	
	<!-- <script src="head.js"></script> -->
	<script src="alertclose.js"></script>
	<script src="chatserver1.js" type="module"></script>
	
	<!-- <script src="darkmode.js"></script> -->
  </body>
</html>