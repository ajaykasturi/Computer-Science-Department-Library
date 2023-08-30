<?php
$del = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
  include '../admincomponents/_dbconnect.php';
  $sno = $_POST['id'];
  $query = "DELETE FROM books_db WHERE book_id=$sno";
  $result = mysqli_query($conn,$query);
  if($result){
    $target_dir = "../../assets/bookcover/";
    $target_file = $target_dir .$sno.".jpg";
    if (file_exists($target_file)) {
        if (unlink($target_file)) {
            $del = "true";
        } else {
            $del = "false";
        }
    } else {
        $del = "false";
    }
  }
  header("Location: ../pages/bookmanagement.php?redcode=$del");
  exit();
}
?>