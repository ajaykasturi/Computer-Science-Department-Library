<?php
$arr = array();
$arr['flag'] = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    //retriving the post data
    $currpassword = $_POST['currpassword'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password!=$cpassword){
        $arr['flag'] = "false";
    } else{
    session_start();
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $query = "SELECT * FROM students WHERE username='$username';";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($currpassword, $row['password'])){
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE `students` SET `password` = '$hashpassword' WHERE `username` = '$username';";
            $result = mysqli_query($conn, $query);
            if($result){
                $arr['flag'] ="true";
                $arr['username'] = $username;
                $arr['email'] = $email;
            }
        } else {
            $arr['flag'] = "false";
        }
    }}
}
echo json_encode($arr);
?>