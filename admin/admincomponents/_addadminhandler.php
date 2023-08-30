<?php
$flag = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '../admincomponents/_dbconnect.php';
    $option = $_POST['adminuser'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($option=="user"){
        $query = "SELECT * FROM `students` WHERE `username`='$username';";
        $result = mysqli_query($conn, $query);
        $numsRows = mysqli_num_rows($result);
        if($numsRows==1){
            $flag = "false";
        } else{
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO `students` (`full_name`,`username`, `email`, `password`) VALUES ('$fullname','$username', '$email', '$hashpassword');";
            $result = mysqli_query($conn, $query);
            if($result){
                $flag = "true";
            }
        }
    } else if($option=="admin"){
        $query = "SELECT * FROM `admins` WHERE `username`='$username';";
        $result = mysqli_query($conn, $query);
        $numsRows = mysqli_num_rows($result);
        if($numsRows==1){
            $flag = "false";
        } else{
            $query = "INSERT INTO `admins` (`admin_name`,`username`, `email`, `password`) VALUES ('$fullname','$username', '$email', '$password');";
            $result = mysqli_query($conn, $query);
            if($result){
                $flag = "true";
            }
        }
    }
}
header("Location: ../pages/addadmin.php?inserted=$flag");
exit();
?>