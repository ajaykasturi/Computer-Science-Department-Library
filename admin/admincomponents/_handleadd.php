<?php
$imageExists = "false";
$fakeImg ="false";
$fileSize = "false";
$upload = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include './_dbconnect.php';
    $book_title = $_POST['btitle'];
    $book_desc = $_POST['bdesc'];
    $book_author = $_POST['bauthor'];
    $book_count = $_POST['bcount'];
    $query = "INSERT INTO `books_db` (`book_title`, `book_desc`, `book_author`, `book_count`, `dt`) VALUES ('$book_title', '$book_desc', '$book_author', '$book_count', current_timestamp());";
    $result = mysqli_query($conn, $query);
    if($result){
        $last_id = mysqli_insert_id($conn);
        $target_dir = "../../assets/bookcover/";
        $target_file = $target_dir .$last_id.".jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(true) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $fakeImg = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
        $imageExists =  "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
        $fileSize = "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $formatErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $upload = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            
        }
        }
    }
}
echo $imageExists;
echo $fakeImg;
echo $fileSize;
echo $upload;
$final = "false";
if($imageExists=="false" && $fakeImg!="false" && $fileSize=="false" && $upload!="false"){
    $final = "true";
}
header("Location: ../pages/addbook.php?result=$final");
exit();
?>