<?php
$alert = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $url = $_POST['url'];
    $query = "INSERT INTO `enotice` (`heading`, `content`, `url`,`dt`) VALUES ('$heading', '$content', '$url',current_timestamp());";
    $result = mysqli_query($conn, $query);
    if($result){
        $alert="true";
    }
}
header("Location: ../pages/postnotice.php?posted=$alert");
exit();
?>