<?php

$errorAlert = false;
$alertMsg = false;
$signup = false;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //code to check for username is valid or invalid

    //code to check for email is valid or invalid

    //code to check for passwords are matched or not
    if($password===$cpassword){
        $query1 = "SELECT * FROM `students` where username = '$username';";
        $query2 = "SELECT * FROM `students` where email = '$eamil';";
        $result1=  mysqli_query($conn, $query1);
        $result2=  mysqli_query($conn, $query2);
        $numrows1 = mysqli_num_rows($result1);
        $numrows2 = mysqli_num_rows($result1);
        if($numrows1===0 && $numrows2===0){
            $query = "INSERT INTO `students` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
            $result = mysqli_query($conn, $query);
            if($result){
                $alertMsg = "You have successfully registered your account.";
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="signupError">
                    <strong>Success! </strong>'.$alertMsg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $errorAlert = "Something went wrong...";
            } 
        } else {
            $errorAlert = "Username or email already exists...";
        }
    } else {
        $errorAlert = "Please make sure that passwords must match";
    }
}
if($errorAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="signupError">
    <strong>Sorry! Unable to signup </strong>'.$errorAlert.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>