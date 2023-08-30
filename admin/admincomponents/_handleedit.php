<?php
$res = "false";

if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $book_id = $_POST['bid'];
    $book_title = $_POST['btitle'];
    $book_desc = $_POST['bdesc'];
    $book_author = $_POST['bauthor'];
    $book_count = $_POST['bcount'];
    $query = "UPDATE `books_db` SET `book_title`='$book_title',`book_desc`='$book_desc',`book_author`='$book_author',`book_count`='$book_count' WHERE `book_id`='$book_id';";
    $result = mysqli_query($conn, $query);
    if($result){
        $res = "true";
    }
    header("Location: ../pages/bookmanagement.php?status=$res");
    exit();
}
header("Location: ../pages/bookmanagement.php?status=$res");
exit();
?>