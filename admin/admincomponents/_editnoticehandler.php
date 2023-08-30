<?php
$alert = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $url = $_POST['url'];
    $id = $_POST['id'];
    $query = "UPDATE `enotice` SET `heading` = '$heading', `content` = '$content', `url` = '$url', `dt` = current_timestamp() WHERE `enotice`.`id` = '$id';";
    $result = mysqli_query($conn, $query);
    if($result){
        $alert="true";
    }
}
header("Location: ../pages/postnotice.php?updated=$alert");
exit();
?>