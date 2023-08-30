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
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/cse-lib.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
   <!-- background-color which is seeen has half -->
   <?php define("APP",true);?>
    <?php include'./components/_header1.php';?>
  <div class="min-height-300 bg-info opacity-4 position-absolute w-100"></div>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    </nav>
    <!-- End Navbar -->
    <div class="main-content position-relative max-height-vh-100 h-100 mt-4">
    <!-- Navbar -->
    <?php
      include './components/_dbconnect.php';
      $idcode = $_GET['bid'];
      $id = substr($idcode, 4);
      $query = "SELECT * FROM `books_db` WHERE `book_id`='$id'";
      $result = mysqli_query($conn, $query);
      $numRows = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result)
    ?>
    <!-- End Navbar -->
    <!-- <div class="container-fluid py-4">
      <div class="row justify-content-center">
        <div class="card p-0 mb-5 mx-4 col-md-8">
            <div class="card-body">
                <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                    <img src="./assets/bookcover/<?php echo $row["book_id"].".jpg";?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                    <h5 class="mb-1">
                        <u>Book Title:</u> <?php echo $row["book_title"];?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <strong>Author(s):</strong> <?php echo $row["book_author"];?>
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-0">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h5 class="mb-0"><u>Book Description</u></h5>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <p class="mb-0 text-lg text-dark">
                <?php echo $row["book_desc"];?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3 mt-5">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
              <b>© <script>
                  document.write(new Date().getFullYear())
                </script>
                CSE Department RGUKT-Basar</b>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div> -->
    <div class="container-fluid py-1">
      <div class="row justify-content-center">
        <div class="card p-0 mb-4 mx-4 col-md-2">
            <div class="card-body d-flex justify-content-center p-2">
              <img src="./assets/bookcover/<?php echo $row["book_id"].".jpg";?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">  
            </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="card p-0 mb-4 mx-4 col-md-8">
            <div class="card-body ">
                <div class="row gx-4">
                  <div class="col-auto my-auto">
                      <div class="h-100">
                      <h5 class="mb-2">
                          <u>Book Title:</u> <?php echo $row["book_title"];?>
                      </h5>
                      <!-- <br /> -->
                      <p class="mb-0 font-weight-bold text">
                          <strong style="color:black;">Author(s):</strong> <?php echo $row["book_author"];?>
                      </p>
                      <p class="mb-0 font-weight-bold text">
                          <strong style="color:black;">Available Count: </strong> <?php echo $row["book_count"];?>
                      </p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="card p-0 mb-4 mx-4 col-md-8">
            <div class="card-header pb-0 mb">
              <div class="d-flex align-items-center">
                <h5 class="mb-0"><u>Book Description</u></h5>
              </div>
            </div>
            <div class="card-body pt-2">
              <div class="row">
                <p class="mb-0 text-lg text-dark">
                <?php echo $row["book_desc"];?>
                </p>
              </div>
            </div>
        </div>
      </div>
      <footer class="footer pt-3 mt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
              <b>© <script>
                  document.write(new Date().getFullYear())
                </script>
                CSE Department, RGUKT-Basar</b>
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
  <script src="./admin/assets/js/cse-lib.min.js"></script>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}"></div>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe></body>

</html>