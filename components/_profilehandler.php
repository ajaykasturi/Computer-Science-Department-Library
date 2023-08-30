<?php
$out = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $query = "UPDATE `students` SET `full_name` = '$fullname' WHERE `username` = '$username';";
    $result = mysqli_query($conn, $query);
    if($result){
        $out = "true";
    }
}
header("Location: ../profile.php?update=$out");
exit();
?>