<?php
$arr = array();
$arr['verify'] = "false";
$arr['state'] = "out";
// header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include './_dbconnect.php';
    $user= $_POST['user'];
    $OTP = $_POST['OTP'];
    $arr['user'] = $user;
    $arr['otp'] = $OTP;
    $query = "SELECT * FROM OTP WHERE username='$user';";
    $result=  mysqli_query($conn, $query);
    $numrows = mysqli_num_rows($result);
    $arr['rows'] = $numrows;
    if($numrows>0){
        $row = mysqli_fetch_assoc($result);
        //if($row['otp']===$OTP){
        if(password_verify($OTP, $row['otp'])){
            $arr['verify'] = "true";
            $arr['state'] = "innermost";
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `students` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
            $result = mysqli_query($conn, $query);
            if($result){
                $arr['recorded'] = "1";
                $query1 = "UPDATE `OTP` SET `verify_status` = '1' WHERE `username` = '$username';";
                $result1 = mysqli_query($conn, $query1);
            } else {
                $arr['recorded'] = "0";
            }
        }
    }
    echo json_encode($arr);

} else{
    echo json_encode($arr);
}
?>