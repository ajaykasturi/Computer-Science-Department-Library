<?php
$arr = array();
$arr['emailstatus'] = "0";
$arr['usernamestatus'] = "0";
$arr['otp'] = "";
$arr['confirm'] = "false";
// header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include './_dbconnect.php';
    $username= $_POST['username'];
    $email = $_POST['email'];
    //$hashPassword = $_POST['password'];
    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //$hashOTP = $_POST['otp'];
    $hashOTP = password_hash($_POST['otp'], PASSWORD_DEFAULT);
    $query1 = "SELECT * FROM `students` WHERE username='$username';";
    $query2 = "SELECT * FROM `students` WHERE email='$email';";
    $result1=  mysqli_query($conn, $query1);
    $result2=  mysqli_query($conn, $query2);
    $numrows1 = mysqli_num_rows($result1);
    $numrows2 = mysqli_num_rows($result2);
    if($numrows1>0 && $numrows2>0){
        $arr['emailstatus'] = "1";
        $arr['usernamestatus'] = "1";
    } elseif($numrows1>0){
        $arr['usernamestatus'] = "1";
    } elseif($numrows2>0){
        $arr['emailstatus'] = "1";
    } elseif($numrows1===0 && $numrows2===0) {
        $arr['emailstatus'] = "0";
        $arr['usernamestatus'] = "0";
        $query = "INSERT INTO `OTP` (`username`, `email`, `password`, `otp`) VALUES ('$username', '$email', '$hashPassword', '$hashOTP');";
        $result = mysqli_query($conn, $query);
        if($result){
            $arr['confirm'] ="true";
        } else {
            $arr['confirm'] = "false";
        }
    }
    echo json_encode($arr);

} else{
    echo json_encode($arr);
}
?>