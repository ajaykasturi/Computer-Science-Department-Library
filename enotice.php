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
    <style>
    /* Custom CSS for text wrapping */
    table.dataTable tbody td{
        white-space: normal;
    }
    .custom-height {
      height: 37px; /* Adjust the height as needed */
    }
    .accordion-button::after {
		  display: none;
	  }
    
    </style>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
  <!-- Datatables CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/cse-lib.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
   <!-- background-color which is seeen has half -->
   <?php define("APP",true);?>
    <?php include'./components/_header1.php';?>
    <?php include './components/_login.php'?>
  <div class="min-height-300 bg-success opacity-6 position-absolute w-100"></div>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="main-content position-relative max-height-vh-100 h-100 mt-4">
    <!-- Navbar -->
    <?php
      include './components/_dbconnect.php';
      $query = "SELECT * FROM `enotice` ORDER BY `dt` DESC;";
      $result = mysqli_query($conn, $query);
      $numrows = mysqli_num_rows($result);
    ?>
    <!-- End Navbar -->
    
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="card p-0 mb-5 mx-4 col-md-10">
            <div class="card-body">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar position-relative">
                          <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/></svg>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                        <h5 class="mb-1">
                            e-Notice
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                        The paperless bulletin board.
                        <!-- Digital waves of information." -->
                        </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center border-none rounded-4" style="border-bottom-width: 0px;" id="myTable">
                  <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-dark">News & Updates</th>
                    </tr>
                  </thead>
                  <tbody class="accordion" id="accordionExample">
                    <?php
                      $counter = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $formattedDate = date("d, M Y", strtotime($row['dt']));
                        $img = '';
                        if($counter<3){
                          $counter++;
                          $img = ' <img src="./assets/new.gif"/>';
                        }
                        echo '<tr class="accordion-item p-2 border-0">
                        <td class="" style="border-bottom-width: 0px;">
                          <h2 class="accordion-header border rounded pe-3 d-flex justify-content-between align-items-center">
                            <button class="accordion-button" style="background-color:white; box-shadow: none;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row["id"].'" aria-expanded="true" aria-controls="collapseOne">
                            <span style=" display: inline-block;white-space: normal;" class="text-primary font-weight-bold">
                            <font color="#810404">
                            '.$formattedDate.': 
                            </font>&nbsp;'.$row["heading"].$img.'</span>
                            </button>
                            <span class="accordion-icon text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row["id"].'" aria-expanded="true" aria-controls="collapseOne">+</span>
                          </h2>
                          <div id="collapse'.$row["id"].'" class="accordion-collapse rounded collapse border" data-bs-parent="#accordionExample">
                          <div class="card-body accordion-body pb-3">
                          <pre class="border rounded p-2" style="background-color: #f5f5f5;word-wrap: break-word; white-space: pre-line;">
                            <code style="color:black;">'.$row["content"].'</code>
                          </pre>';
                          if($row["url"]){
                            echo '<p>
                             <b style="color:red">URL:</b> <a href="'.$row["url"].'" class="text-decoration-none" target="_blank" style="color:blue;">Click Here</a>
                            </p>';
                          }
                          echo 
                          '<p>
                             <b style="color:red">Published by:</b> <a style="color:blue;">'.$row["publisher"].'</a>
                          </p>
                       </div>
                          </div>
                        </td>
                      </tr>';
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <!-- jQuery JS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <!-- Datatables JS -->
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#myTable').DataTable({
          responsive: true,
          ordering:false,
          "search": {
            "regex": true,
          },
          lengthChange:false,
          pageLength: 15,  
      });
      $('#myTable_filter input').attr("placeholder","");
      const items = ['Welcome to CSE Department Library','Search Notice Here'];
      const hey = "Search e-Notice"
      function typeWriter(items, currentItemIndex, currentCharIndex) {
          if (currentItemIndex < items.length) {
              const currentText = items[currentItemIndex];
              if (currentCharIndex < currentText.length) {
                  let val = $('#myTable_filter input').attr("placeholder") + currentText.charAt(currentCharIndex);
                  $('#myTable_filter input').attr("placeholder", val);
                  currentCharIndex++;
                  setTimeout(() => typeWriter(items, currentItemIndex, currentCharIndex), 120);
              } else {
                  currentItemIndex++;
                  setTimeout(() => {
                    $('#myTable_filter input').attr("placeholder", "");
                      typeWriter(items, currentItemIndex%items.length, 0);
                  }, 1000); // Pause for 1 second between items
              }
          }
      }

      // List of items to type out
      let itemList = ['Welcome to CSE Department Library','Search Notice Here'];

      // Call the typewriter function
      typeWriter(itemList, 0, 0);

      $('#myTable_filter').addClass('w-100 d-flex justify-content-center');
      $('.dataTables_filter label').addClass('h6 w-70 m-0 d-flex justify-content-center align-items-center custom-height');
      $('.dataTables_filter input').addClass('w-100 h-100 form-control');
    });
  </script>
  
  <!-- <script src="./admin/assets/js/cse-lib.min.js"></script> -->

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" style="display: none;" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}"></div>

<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe></body>

</html>