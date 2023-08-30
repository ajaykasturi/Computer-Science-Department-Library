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
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php define("APP",true);?>
    <?php include './components/_header1.php'?>
    <?php include './components/_login.php'?>
	  <?php include './components/_signup.php'?>
    <div class="container-fluid" style="height:80vh;">
      <h3 style="background-color: green;  color: white; padding: 20px;text-align: center;">DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</h3>
      <h4 style="color: brown;">&nbsp&nbspWelcome to CSE Department library</h4>
      <p style="margin-left: 10px;">&nbsp         The CSE (Computer Science and Engineering) department library is a specialized library that caters to the needs of students, faculty, and researchers in the field of computer science and engineering.</p>
      <ol>
        <li><span style="font-size: 18px;color: black;">Resources:</span> The library contains a comprehensive collection of books, reference materials, research papers, technical reports, and journals related to various aspects of computer science and engineering. These resources cover a wide range of topics, including programming languages, algorithms, data structures, computer networks, artificial intelligence, software engineering, and more.	</li>
        <li><span style="font-size: 18px; color: black;">Study and Research Space:</span> The library provides a conducive environment for students and researchers to study, conduct research, and collaborate on projects. It typically offers comfortable seating, workstations, and access to computers and internet connectivity.</li>
        <li><span style="font-size: 18px; color: black;" >Digital Resources: </span>In addition to physical resources, many CSE department libraries also provide access to digital resources such as online journals, databases, e-books, and e-learning platforms. These digital resources enhance the availability and accessibility of information for users.</li>
        <li><span style="font-size: 18px; color: black;">Assistance and Guidance: </span>Librarians in the CSE department library are available to assist users in finding relevant resources, navigating databases, and conducting research. They can provide guidance on using library resources effectively and help with citation management.</li>
        <li><span style="font-size: 18px; color: black;">Reserve Materials:</span> The library may have a reserve section where high-demand materials, textbooks, or recommended readings are kept for short-term borrowing. This ensures that essential resources are readily available to all users.</li>
        <li><span style="font-size: 18px; color: black;">Reserve Materials:</span> Reserve Materials:CSE department libraries often organize workshops, training sessions, and seminars on topics related to information literacy, research skills, and emerging trends in computer science and engineering. These events help users enhance their knowledge and stay updated with the latest advancements in the field.</li>
        <li><span style="font-size: 18px; color: black;">Collaboration Spaces:</span> Some CSE department libraries provide dedicated collaboration spaces where students and faculty can work together on group projects, discussions, or brainstorming sessions. These spaces may include whiteboards, projectors, and other resources to facilitate collaborative work.</li>
      </ol>
    </div>
    <?php include './components/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- <script src="darkmode.js"></script> -->
  </body>
</html>