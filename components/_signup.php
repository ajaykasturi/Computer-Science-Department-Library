
<?php
if(!defined("APP")){
    header("Location: ../index.php");
    exit();
  } else {
echo '
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2" id="signupModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <form action="./components/_handlesignup.php" method="post" class="">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control rounded-3" id="username" placeholder="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="cpassword" class="form-control rounded-3" id="cpassword" placeholder="Confirm Password" required>
                        <label for="cpassword">Confirm Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign Up</button>
                    <small class="text-body-secondary">Make sure that you have entered correct email and matched password</small>
                </form>
            </div>
        </div>
    </div>
</div>';}
?>