<?php
session_start();
if(!defined("APP")){
    header("Location: ../index.php");
    exit();
} else {
echo '
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2" id="loginModalLabel">Log in</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <form class="" action="./components/_handlelogin.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" name="loginemail" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="loginpass" class="form-control rounded-3" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Log in</button>
                    <small class="text-body-secondary">Make sure that you have entered correct email and password</small>
                </form>
            </div>
        </div>
    </div>
</div>';
}
?>