<?php
$arr = array();
$arr['flag']="false";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include './_dbconnect.php';
    $password = $_POST['currpass'];
    session_start();
    $username = $_SESSION['username'];
    $query = "SELECT * FROM `students` WHERE username='$username';";
    $result =  mysqli_query($conn, $query);
    $numrows = mysqli_num_rows($result);
    if($numrows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $arr['flag'] = "true";
        }
    }
}
echo json_encode($arr);
?>