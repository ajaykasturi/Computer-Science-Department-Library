<?php
session_start();
$showAlert = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $bookid = $_POST['bookid'];
    $booktitle = $_POST['booktitle'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $query = "SELECT * FROM reserve where username='$username';";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    //here 1 specifies no. of books to be reserved by a student 
    if($numRows>=1){
        $row = mysqli_fetch_assoc($result);
        if($row['status']==='0'){
            if($row['reserve_book_id']===$bookid){
                $showAlert = "You have already reserved the book(s), Kindly wait for the librarian to approve.";
            } else {
                $showAlert = "You can't reserve more than one book.";
            }
        } else {
            $showAlert = "You already taken book titled '$row[reserve_book_title]'. If you want to borrow another book please return the book which was taken lastly.";
        }
    } else{
        $query = "INSERT INTO `reserve` (`reserve_book_id`, `reserve_book_title`, `username`, `status`, `request_date`) VALUES ('$bookid', '$booktitle', '$username', '0', current_timestamp());";
        $result = mysqli_query($conn, $query);
        $showAlert = "You have successfully reserved the book, wait for the libraian to accept your  request status";  
    }
    header("Location: ../explore.php?alert=$showAlert");
    exit();
}
header("Location: ../explore.php?alert=$showAlert");
exit();
?>