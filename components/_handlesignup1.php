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
            $query = "INSERT INTO `students` (`username`, `email`, `password`,`timestamp`) VALUES ('$username', '$email', '$password',current_timestamp());";
            $result = mysqli_query($conn, $query);
            if($result){
                $showAlert = "You have successfully registered your account, now you can login";
            } else {
                $showError = "Unable to signup: Something went wrong...";
            }
            header("Location: ../index.php?error=$showError&alert=$showAlert");
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