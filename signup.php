<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="./admin/assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- CSS Files -->
  <link id="pagestyle" href="./admin/assets/css/cse-lib.css" rel="stylesheet" />
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
        header("Location: ./index.php");
        exit();
    } else { define("APP",true);include './components/_header1.php';include './components/_login.php';
    echo '
    <div class="container d-flex flex-column justify-content-center  align-items-center mt-5" >
        <div class="rounded-4 shadow">
            <div class="p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2" id="formlabel">Sign Up</h1>
            </div>
        <div class="p-5 pt-0 ">
            <form method="post" id="otpform" class="d-none">
            
                <input type="hidden" name="username" id="hiddenusername" class="form-control rounded-3">
                <div class="form-floating mb-3">
                    <input type="text" name="otp" class="form-control rounded-3" id="otp" placeholder="OTP" autocomplete="off" maxlength="4" required>
                    <label for="otp">OTP</label>
                    <div class="invalid-feedback">
                        OTP Invalid
                    </div>
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="verify" type="submit">Verify</button>
                <small class="text-body-secondary" id="otplabel">Enter correct OTP. Check your spam folder or try again if not received</small>  
                
            </form>

            <form method="post" id="signupForm" class="">
                <div class="form-floating mb-3" id="b1">
                    <input type="text" name="username" class="form-control rounded-3" id="username" placeholder="username" autocomplete="off" required>
                    <label for="username">Username</label>
                    <div class="invalid-feedback">
                        username already exists
                    </div>
                </div>
                
                <div class="form-floating mb-3" id="b2">
                    <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" autocomplete="off" required>
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">
                        email already exists
                    </div>
                </div>
                <div class="form-floating mb-3" id="b3">
                    <input type="password" name="password" class="form-control rounded-3" id="password" pattern=".{8,}" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3" id="b4">
                    <input type="password" name="cpassword" class="form-control rounded-3" id="cpassword" pattern=".{8,}" placeholder="Confirm Password" required>
                    <label for="cpassword">Confirm Password</label>
                    <div class="invalid-feedback">
                        Confirm password mismatch
                    </div>
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="signup">Sign Up</button>
                <small class="text-body-secondary" id="signuplabel">Make sure that you have entered correct email and matched password</small>   
            </form>
        </div>
        </div>
    </div>
    ';}
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="signup.js" type="module"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    
</body>
</html>