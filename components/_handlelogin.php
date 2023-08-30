<?php

$showError = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM students WHERE email='$email';";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        // if($row['password']===$password){
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['session_start_time'] = time();
            header("Location: ../index.php?log=true");
            exit();
        }
    }
    $showError = "false";
    header("Location: ../login.php?log=$showError");
    exit();
}
header("Location: ../login.php?log=$showError");
exit();
?>