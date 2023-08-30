<?php 

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./admin/assets/img/favicon.ico">
  <title>
    CSE Dept Library
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./admin/assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Datatables CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/cse-lib.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
   <!-- background-color which is seeen has half -->
   <?php define("APP",true);?>
   <!-- <div class="container-fluid bg-white d-flex justify-content-center">
    <img src="assets/rgukt.png" class="w-100"/>
   </div> -->
    <?php include'./components/_header1.php';?>
  <div class="min-height-300 bg-info opacity-5 position-absolute w-100"></div>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    
    <!-- End Navbar -->
    <div class="main-content position-relative max-height-vh-100 h-100 mt-4">
    <!-- Navbar -->
    <?php
      include './components/_dbconnect.php';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM `students` WHERE `username`='$username'";
      $result = mysqli_query($conn, $query);
      $numRows = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result)
    ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
          <div class="card p-0 mb-3 mx-4 col-md-8 border border-danger border-5">
              <div class="card-body">
                  <div class="row gx-4 justify-content-center">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                        <img src="./admin/assets/img/logo.png" alt="profile_image" height="80" class="w-100">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                        <h5 class="mb-1 text-center">
                            Welcome to Computer Science and Engineering Department Library - RGUKT Basar
                        </h5>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-8 p-0">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h4 class="mb-0 text-dark">About</h4>
              </div>
            </div>
            <div class="card-body">
              <h6 class="text"><strong>Mission:</strong> Dedicated to supporting the academic excellence of the Computer Science Engineering Department.</h6>
              <h6 class="text"><strong>Resources:</strong> Comprehensive collection including books, journals, e-books, and databases.</h6>
              <h6><strong>Student-Centric: </strong>Prioritizing the needs and success of students through tailored resources to enrich their educational journey.</h6>
              <h6 class="text"><strong>Expert Librarians:</strong> Knowledgeable staff available for research guidance and resource location.</h6>
              <h6 class="text"><strong>Interdisciplinary Support:</strong> Resources connecting computer science engineering with other fields.</h6>
              <h6 class="text"><strong>Continuous Growth:</strong> Evolving collection to match the dynamic field's demands.</h6>
              <h6 class="text"><strong>AI-Powered Chatbot:</strong> Our library is equipped with an AI-powered chatbot that offers instant assistance to students and faculty. This tool provides real-time answers to queries, and helps navigate resources.</h6>
              <h6 class="text"><strong>Library News and Updates:</strong> Stay informed about library news, upcoming events, and new resource additions through regular updates.</h6>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3 mt-5">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                <a href="" class="font-weight-bold" target="_blank">CSE Department RGUKT-Basar</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    
  </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./admin/assets/js/core/popper.min.js"></script>
  <script src="./admin/assets/js/core/bootstrap.min.js"></script>
  <script src="./admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="profile.js"></script>
   <!-- jQuery JS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <!-- Datatables JS -->
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#myTable').DataTable({
          responsive: true
      });
      $('#myTable1').DataTable({
          responsive: true
      });
    });
  </script>
  
  <!-- <script src="./admin/assets/js/cse-lib.min.js"></script> -->
  <?php
   if(isset($_GET['update']) && $_GET['update']=="true"){
    echo "<script>window.alert('Profile Updated')</script>";
   } else if(isset($_GET['update']) && $_GET['update']=="false"){
    echo "<script>window.alert('Something went wrong')</script>";
   }
  ?>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}"></div>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe></body>

</html>