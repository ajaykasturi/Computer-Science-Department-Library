<?php
session_start();
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
} else {
    header("Location: ../index.php");
  exit();
}
header("Location: ../index.php");
exit();
?>