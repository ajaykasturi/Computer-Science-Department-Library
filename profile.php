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
  <link id="pagestyle" href="./admin/assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
   <!-- background-color which is seeen has half -->
   <?php define("APP",true);?>
    <?php include'./components/_header1.php';?>
  <div class="min-height-300 bg-success opacity-4 position-absolute w-100"></div>
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
                        <?php echo "Name: ".$row["full_name"];?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        User
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
                <p class="mb-0">Profile</p>
                <button class="btn btn-success btn-sm ms-auto" id="profileEdit">EDIT</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>

              <form action="./components/_profilehandler.php" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Full Name</label>
                    <input class="form-control" type="text" name="fullname" id="sname" value="<?php echo $row['full_name'];?>" readonly required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">User Name</label>
                    <input class="form-control" type="text" name="username" id="susername" value="<?php echo $row['username'];?>" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" name="email" id="semail" value="<?php echo $row['email'];?>" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Created On</label>
                    <input class="form-control" type="text" name="createdon" id="createdOn" value="<?php echo $row['timestamp'];?>" readonly>
                  </div>
                </div>
                <div class="col-md-12 d-none" id="update">
                  <div class="form-group">
                    <button class="btn btn-success ms-auto" type="submit" id="updatebtn" readonly>Update</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="card mb-4 p-3 col-md-8">
            <div class="card-header pb-0">
              <h6>Books Taken</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">ID</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9 ps-2">Title</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Request Date</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include '../admincomponents/_dbconnect.php';
                      $query = "SELECT * FROM reserve WHERE username='$username';";
                      $result = mysqli_query($conn, $query);
                      $numRows = mysqli_num_rows($result);
                      if($numRows>0)
                      {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $status="";
                          if($row['status']=='1'){
                            $status = "approved";
                          } else if($row['status']=='0'){
                            $status = "requested";
                          }
                          echo '<tr>
                          <td>
                          <h6 class="mb-0 text-sm">'.$row["reserve_book_id"].'</h6>
                          </td>
                          <td>
                          <h6 class="mb-0 text-sm">'.$row["reserve_book_title"].'</h6>
                          </td>
                          <td>
                          <h6 class="mb-0 text-sm">'.$row["request_date"].'</h6>
                          </td>
                          <td class="align-middle text-center text">
                            <span class="badge badge-sm bg-gradient-primary">'.$status.'</span>
                          </td>
              
                        </tr>';
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="card mb-4 p-3 col-md-8">
            <div class="card-header pb-0">
              <h6>Books Returned</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="myTable1">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">S.No</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Title</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Request Date</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Approval Date</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">Returned Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include '../admincomponents/_dbconnect.php';
                      $query = "SELECT * FROM returned WHERE username='$username';";
                      $result = mysqli_query($conn, $query);
                      $numRows = mysqli_num_rows($result);
                      if($numRows>0)
                      {
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $counter++;
                          echo '<tr>
                          <td>
                          <h6 class="mb-0 text-sm">'.$counter.'</h6>
                          </td>
                          <td>
                          <h6 class="mb-0 text-sm">'.$row["book_title"].'</h6>
                          </td>
                          <td>
                          <span class="badge badge-sm bg-gradient-primary">'.$row["request_date"].'</span>
                          </td>
                          <td>
                          <span class="badge badge-sm bg-gradient-primary">'.$row["approval_date"].'</span>
                          </td>
                          <td>
                          <span class="badge badge-sm bg-gradient-primary">'.$row["return_date"].'</span>
                          </td>
                        </tr>';
                        }
                      }
                    ?>
                  </tbody>
                </table>
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
  
  <script src="./admin/assets/js/argon-dashboard.min.js"></script>
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