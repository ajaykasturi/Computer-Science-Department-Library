<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
        header("Location: ./index.php");
        exit();
    } else {
        session_start();
        define("APP",true);
        include './components/_header1.php';
        include './components/_login.php';
    echo '<div class="container d-flex flex-column justify-content-center  align-items-center mt-5" >
    <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2" id="signupModalLabel">Enter OTP</h1>
                </div>
                <div class="modal-body p-5 pt-0 ">
                    <form action="./components/_otphandle.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="otp" class="form-control rounded-3" id="otpcode" placeholder="OTP" required>
                            <label for="otpcode">OTP</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Verify</button>
                        <small class="text-body-secondary">Make sure that you have entered correct OTP</small>
                    </form>
                </div>
        </div>';}
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="otp.js" type="module"></script>
</body>
</html>