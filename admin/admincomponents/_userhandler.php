<?php
$out = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //write code here to encode the password with encrpt technique
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE `students` SET `full_name` = '$fullname', `email` = '$email',`password` = '$hashpassword'  WHERE `username` = '$username';";
    $result = mysqli_query($conn, $query);
    if($result){
        $out = "true";
    }
}
header("Location: ../pages/usermanager.php?update=$out");
exit();
?>