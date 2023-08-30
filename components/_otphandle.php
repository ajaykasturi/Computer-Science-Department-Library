<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    session_start();
    echo $_SESSION['username'];
    echo <br>;
    echo $_SESSION['email'];
    echo <br>;
    echo $_SESSION['password'];
    echo <br>;
    echo $_SESSION['otp'];
    echo <br>;
} else {
    echo "failed";
}
?>