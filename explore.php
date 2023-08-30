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
  <style>
    .dataTables_wrapper table.dataTable tbody td {
      white-space: normal; /* Set the white-space property to "normal" to enable text wrapping */
    }
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <title>Search Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    <?php define("APP",true);?>
    <?php include './components/_header1.php';?>
    <?php include './components/_login.php';?>
	  <?php include './components/_signup.php';?>
    <?php include './components/_confirm.php';?>
    <?php 
      if(isset($_GET['alert']) && $_GET['alert']!=="false"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="signupError">
                      <strong>Status: </strong>'.$_GET['alert'].'
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
      }
	  ?>
    <div class="container-fluid table-responsive" style="height:100vh;">
        <table class="table  table-borderless align-items-center text-center" id="querytable">
            <thead >
                <tr>
                <th scope="col" class="">S.NO</th>
                <th scope="col" class="">Cover</th>
                <th scope="col" class="">Title</th>
                <th scope="col" class="">Author</th>
                <th scope="col" class="">Count</th>
                <th scope="col" class="">Actions/Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include './components/_dbconnect.php';
                    $query = "SELECT * FROM `books_db`;";
                    $result = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($result);
                    $counter = 0;
                    if($numrows>0){
                        while($row = mysqli_fetch_assoc($result)) {
                            $counter++;
                            echo '<tr>
                                        <td>'.$counter.'</td>
                                        <td><img src="./assets/bookcover/'.$row["book_id"].'.jpg" alt="cover image of book height="55" width="55"></td>
                                        <td>'.$row["book_title"].'</td>
                                        <td>'.$row["book_author"].'</td>
                                        <td>'.$row['book_count'].'</td><td>';
                                        echo '<a type="button" href="viewbook.php?bid=book'.$row['book_id'].'" class="btn btn-success btn-sm mb-2">View</a>&nbsp;';
                                        if($row['book_count']>0){
                                          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
                                            $user = $_SESSION['username'];
                                            $bid = $row['book_id'];
                                            $query1 = "SELECT * FROM reserve where username='$user' AND reserve_book_id='$bid';";
                                            $result1 = mysqli_query($conn, $query1);
                                            $numRows1 = mysqli_num_rows($result1);
                                            if($numRows1>=1){
                                              $row1 = mysqli_fetch_assoc($result1);
                                              if($row1['status']==='0'){
                                                echo '<button type="button" class="reserve btn btn-primary btn-sm mb-2" id='.$row["book_id"].' >Pending</button>';
                                              } elseif($row1['status']==='1'){
                                                echo '<button type="button" class="reserve btn btn-primary btn-sm mb-2" id='.$row["book_id"].' >Approved</button>';
                                              } 
                                            }
                                             else {
                                              echo '<button type="button" class="reserve btn btn-primary btn-sm mb-2" id='.$row["book_id"].' data-bs-toggle="modal" data-bs-target="#reserveConfirm">Reserve</button>'; 
                                            }
                                          }
                                        } else{
                                          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
                                            echo '<button type="button" class="btn btn-primary btn-sm mb-2" disabled>Reserve</button>'; 
                                          }
                                        }
                                    echo '</td></tr>';
                        }
                    } else {
                        echo '<tr>
                            <td>empty</td>
                            <td>empty</td>
                            <td>empty</td>
                            <td>empty</td>
                            <td>empty</td>';
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
                            echo '<td>empty</td>';
                            }
                         echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php include './components/_footer.php';?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- Datatables JS -->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      //let table = new DataTable('#notestable');
      $(document).ready( function () {
        $('#querytable').DataTable({
            //scrollY: 400
            responsive: true
    //         responsive: {
    //     details: false
    // }
        });
      });
    </script>
    <!-- <script src="darkmode.js"></script> -->
    <script src="reserves.js"></script>
  </body>
</html>