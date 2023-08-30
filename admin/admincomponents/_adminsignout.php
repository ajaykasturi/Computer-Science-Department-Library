<?php
session_start();
if(isset($_SESSION['adminsignin']) && $_SESSION['adminsignin']==true){
    include './_dbconnect.php';
    $id = $_SESSION['id'];
    $query = "UPDATE `admin_history` SET `logout_date` = current_timestamp() WHERE `id` = '$id';";
    $result = mysqli_query($conn, $query);
    echo $result;
    unset($_SESSION['adminsignin']);
    unset($_SESSION['admin']);
} else {
  header("Location: ../pages/signinadmin.php");
  exit();
}
header("Location: ../../index.php");
exit();
?>