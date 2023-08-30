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
   <!-- Datatables CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
   <!-- background-color which is seeen has half -->
   <?php
   if(isset($_GET['updated']) && $_GET['updated']=="true"){
    echo '<div class="alert alert-success alert-sm alert-dismissible fade show col-sm" role="alert" id="editupdated">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>
                <strong>Your password Updated Successfully</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
   } else if(isset($_GET['updated']) && $_GET['updated']=="false"){
    echo '<div class="alert alert-danger alert-sm alert-dismissible fade show" role="alert" id="editupdated">
      <strong>Something went wrong...Try again!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
  ?>
   <?php define("APP",true);?>
    <?php include'./components/_header1.php';?>
  <div class="min-height-300 bg-info opacity-6 position-absolute w-100"></div>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    </nav>
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
        <div class="card p-0 mb-5 mx-4 col-md-8">
            <div class="card-body">
                <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                    <img src="./admin/assets/img/std.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                    <h5 class="mb-1">
                        <?php echo "Hello, ".$row["full_name"];?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        Customize your settings
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-0 mb-5">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Change your password</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Password Information </p>
              <p class="text-sm text-danger"><b>Note:</b> Password must be 8 characters long</p>
              <form id="changepass" method="post" action="./components/_passchanger.php">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Current password</label>
                    <input class="form-control" type="text" name="currpassword" id="currentpassword" value="" required>
                    <span class="text-sm text-danger d-none" id="alertmsg1"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" type="text" name="password" id="password" value="" maxlength="8" pattern=".{8}" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Confirm password</label>
                    <input class="form-control" type="text" name="cpassword" id="cpassword" value="" maxlength="8" pattern=".{8}" required>
                    <span class="text-sm text-danger d-none" id="alertmsg"></span>
                  </div>
                </div>
                <div class="col-md-12" id="passupdate">
                  <div class="form-group">
                    <button class="btn btn-success ms-auto" type="submit" id="passupdatebtn">Update</button><br>
                    <span class="text-sm text-danger" id="alertmsg">Click update and wait few seconds to update the records</span>
                  </div>
                </div>
              </div>
              </form>
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
  <script src="passcheck.js"></script>
  <script src="./admin/assets/js/argon-dashboard.min.js"></script>
  <script>
    const alert = bootstrap.Alert.getOrCreateInstance('#editupdated')
    setTimeout(function(){alert.close()},3000);
  </script>
<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}"></div>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe></body>

</html>