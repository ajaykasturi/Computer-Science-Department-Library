<?php
$arr = array();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$arr['flag'] = "false";
if($_SERVER["REQUEST_METHOD"]=='POST'){
    include '../admincomponents/_dbconnect.php';
    $no = $_POST['id'];
    $arr['id'] = $no;
    $query = "SELECT * FROM `reserve` WHERE sno='$no'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $numrows = mysqli_num_rows($result);
    if($numrows>0){
        $row['flag'] = "true";
        $bid = $row['reserve_book_id'];
        $title = $row['reserve_book_title'];
        $user = $row['username'];
        $requestdate = $row['request_date'];
        $approvaldate = $row['approval_date'];
        $query = "INSERT INTO `returned` (`book_id`, `book_title`, `username`, `request_date`, `approval_date`, `return_date`) VALUES ('$bid', '$title', '$user', '$requestdate', '$approvaldate', current_timestamp());";
        $result = mysqli_query($conn, $query);
        if($result){
            $query = "SELECT * FROM `students` WHERE `username`='$user';";
            $result = mysqli_query($conn, $query);
            $row1 = mysqli_fetch_assoc($result);
            $row['email'] = $row1['email'];
            $query = "DELETE FROM reserve WHERE sno=$no";
            $result = mysqli_query($conn, $query);
            echo json_encode($row);
        }
    } else {
        echo json_encode($row);
    }
} else {
    echo json_encode($arr);
}

?>