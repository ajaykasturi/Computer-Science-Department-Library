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
        $approvaldate = $row['approval_date'];
        $title = $row['reserve_book_title'];

        $query = "SELECT * FROM `students` WHERE `username`='$user';";
        $result = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_assoc($result);

        $arr["email"] = $row1['email'];
        $arr["flag"] = "true";
        $arr["requestdate"] = $requestdate;
        $arr["approvaldate"] = $approvaldate;
        $arr["title"] = $title;

        $query = "DELETE FROM `reserve` WHERE `sno` = $id;";
        $result = mysqli_query($conn, $query);

        echo json_encode($arr);
    }
}
else{
    echo json_encode($arr);
}
?>