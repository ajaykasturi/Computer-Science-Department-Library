<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  
<>
<div class="container d-flex flex-column justify-content-center  align-items-center mt-5" >
                <div class="rounded-4 shadow">
                    <div class="p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2" id="formlabel">Sign Up</h1>
                    </div>
                <div class="p-5 pt-0 ">
                
                    <form action="" method="post" id="signupForm">
                        
                        <div class="form-floating mb-3 d-none" id="otpblock">
                            <input type="text" name="otp" class="form-control rounded-3" id="otp" placeholder="Enter OTP" autocomplete="off" maxlength="4">
                            <label for="otp">OTP</label>
                            <div class="invalid-feedback">
                                username already exists
                            </div>
                        </div>

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
                            <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3" id="b4">
                            <input type="password" name="cpassword" class="form-control rounded-3" id="cpassword" placeholder="Confirm Password" required>
                            <label for="cpassword">Confirm Password</label>
                            <div class="invalid-feedback">
                                Confirm password mismatch
                            </div>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="signup">Sign Up</button>
                        <small class="text-body-secondary" id="signuplabel">Make sure that you have entered correct email and matched password</small>
                        
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary d-none" id="verify">Verify</button>
                        <small class="text-body-secondary d-none" id="verifylabel" >Enter OTP Correctly</small>
                    </form>
                </div>
        </div></div>
</>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>