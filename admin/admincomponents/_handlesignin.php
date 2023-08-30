<?php

$showError = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $admin = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admins WHERE email='$admin';";
    $query1 = "SELECT * FROM admins WHERE username='$admin';";
    $result = mysqli_query($conn, $query);
    $result1 = mysqli_query($conn, $query1);
    $numRows = mysqli_num_rows($result);
    $numRows1 = mysqli_num_rows($result1);
    if($numRows==1 || $numRows1==1){
        if($numRows==1){
            $row = mysqli_fetch_assoc($result);
        } else if($numRows1==1){
            $row = mysqli_fetch_assoc($result1);
        }
        if($row['password']===$password){
            session_start();
            $user = $row['username'];
            $_SESSION['adminsignin'] = true;
            $_SESSION['admin'] = $user;
            $query3 = "INSERT INTO `admin_history` (`username`, `login_date`) VALUES ('$user', current_timestamp());";
            $result3 = mysqli_query($conn, $query3);
            $last_id = mysqli_insert_id($conn);
            $_SESSION['id'] = $last_id;
            header("Location: ../pages/index.php");
            exit();
        }
    }
    $showError = "false";
    header("Location: ../pages/signinadmin.php?log=$showError");
    exit();
}
header("Location: ../pages/signinadmin.php?log=$showError");
exit();
?>