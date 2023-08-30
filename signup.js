import Mail from "./email.js";
$(document).ready(function() {
    $("#signupForm").submit(function(event){
    event.preventDefault();
    let username = $("#username").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let cpassword = $("#cpassword").val();
    if(password!=cpassword){
        $("#cpassword").addClass("is-invalid");
    } else {
        let result;
        $("#password").addClass("is-valid");
        $("#cpassword").addClass("is-valid");
        let min = 1000;
        let max = 9999;
        let range = max - min + 1;
        let OTP = (Math.floor(Math.random()*range)+min)+"";
        let dataToSend= {};
        dataToSend.username=username;
        dataToSend.email=email;
        dataToSend.password=password;
        dataToSend.otp = OTP;
        console.log(dataToSend);
        $.ajax({
            type: "POST",
            url: "./components/_checksignup.php",
            data: dataToSend,
            success: function(response) {
                result = JSON.parse(response);
                console.log(result);
                console.log(result.usernamestatus);
                console.log(result.emailstatus);
                if(result.usernamestatus=="1" && result.emailstatus=="0"){
                    alert("Username already exists");
                    $("#username").addClass("is-invalid");
                    $("#email").removeClass("is-invalid");
                    $("#email").addClass("is-valid");
                } 
                if(result.usernamestatus=="0" && result.emailstatus=="1"){
                    alert("email already exists");
                    $("#username").removeClass("is-invalid");
                    $("#username").addClass("is-valid");
                    $("#email").addClass("is-invalid");
                } 
                if(result.usernamestatus=="1" && result.emailstatus=="1"){
                    alert("username and email already exists");
                    $("#username").addClass("is-invalid");
                    $("#email").addClass("is-invalid");
                } 
                if(result.usernamestatus=="0" && result.emailstatus=="0" && result.confirm=="true"){
                    console.log("01 console");
                    $("#username").removeClass("is-invalid");
                    $("#email").removeClass("is-invalid");
                    $("#username").addClass("is-valid");
                    $("#email").addClass("is-valid");
                    let output = Mail(email,OTP).then(function(val){console.log(val)});

                    alert("OTP Sent Check your mail or spam folder");
                    $("#formlabel").text("Enter OTP");
                    $("#signupForm").addClass("d-none");
                    $("#otpform").removeClass("d-none");
                    $("#hiddenusername").val(username);
                }
            },
            error: function() {
                alert("Failed to submit data.");
            },
        });
    }
});
});
document.getElementById("verify").addEventListener("click",function(){
    event.preventDefault();
    let inputOTP = (document.getElementById("otp").value).trim();
    console.log(inputOTP);
    console.log($("#hiddenusername").val());
    if(inputOTP.length === 4){
        console.log(inputOTP);
        let username = $("#hiddenusername").val();
        $.ajax({
            url: "./components/_verifyOTP.php",
            type: "POST",
            data: {OTP:inputOTP,user:username},
            success: function(response) {
                // Process the response from the server
                let res = JSON.parse(response);
                console.log(res);
                if(res.verify==="true"){
                    alert("Your OTP Verified Successfully, You can Login Now");
                    window.location.href = "./index.php";
                }
                if(res.verify==="false"){
                    
                    alert("Your OTP Entered Wrong");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
            }
        });

    } else {
        alert("Enter OTP Correctly");
    }
});
