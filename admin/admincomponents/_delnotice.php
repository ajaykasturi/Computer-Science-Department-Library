<?php
$del = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
  include '../admincomponents/_dbconnect.php';
  $sno = $_POST['id'];
  $query = "DELETE FROM `enotice` WHERE `id`='$sno';";
  $result = mysqli_query($conn,$query);
  if($result){
    $del = "true";
  }
}
header("Location: ../pages/postnotice.php?del=$del");
exit();
?>