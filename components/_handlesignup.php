<?php

$showAlert = "false";
$showError = "false";

if($_SERVER['REQUEST_METHOD']==='POST'){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //code to check for username is valid or invalid
    echo "hello";
    
    //code to check for email is valid or invalid

    //code to check for passwords are matched or not
    $query1 = "SELECT * FROM `students` where username = '$username';";
    $query2 = "SELECT * FROM `students` where email = '$email';";
    $result1=  mysqli_query($conn, $query1);
    $result2=  mysqli_query($conn, $query2);
    $numrows1 = mysqli_num_rows($result1);
    $numrows2 = mysqli_num_rows($result1);
    if($numrows1>0 || $numrows2>0){
        $showError = "Username or email already exists...";
    } else {
        if($password===$cpassword){
            session_start();
            $data = array();
            $data['username'] = $username;
            $data['email'] = $email;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
            
            $otp = rand(1000,9000);
            $hashOtp = password_hash($otp,PASSWORD_DEFAULT);
            $data['otp'] = $hashOtp;

            $_SESSION['postData'] = $data;
            echo "hello";
            echo $hashOtp;
            exit();
        } else {
            $showError = "Unable to signup: Please make sure that passwords must match";
        }
    }
    header("Location: ../index.php?error=$showError&alert=$showAlert");
    exit();
}
header("Location: ../index.php");
exit();
?>