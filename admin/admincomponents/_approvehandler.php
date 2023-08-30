<?php
$arr = array();
$arr["flag"] = "false";
if($_SERVER["REQUEST_METHOD"]=='POST'){
    include '../admincomponents/_dbconnect.php';
    $id = $_POST['id'];
    if(true){
        $query = "SELECT * FROM `reserve` WHERE `sno` = '$id';";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $user = $row['username'];
        $requestdate = $row['request_date'];
        
        $title = $row['reserve_book_title'];

        $query = "SELECT * FROM `students` WHERE `username`='$user';";
        $result = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_assoc($result);

        $arr["email"] = $row1['email'];
        $arr["flag"] = "true";
        $arr["requestdate"] = $requestdate;
        $arr["title"] = $title;

        $query = "UPDATE `reserve` SET `status` = '1', `approval_date` = current_timestamp() WHERE `sno` = '$id';";
        $result = mysqli_query($conn, $query);

        $query = "SELECT * FROM `reserve` WHERE `sno` = '$id';";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $arr["approvaldate"] = $row["approval_date"];
        echo json_encode($arr);
    }
}
else{
    echo json_encode($arr);
}
?>