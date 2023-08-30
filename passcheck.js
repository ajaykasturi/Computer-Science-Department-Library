$(document).ready(function() {
    $("#changepass").submit(function(event){
        event.preventDefault();
        
        let currpassword = $("#currentpassword").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
        $("#alertmsg").removeClass("d-none");
        
        if(password==cpassword){
            if(password==currpassword){
                $("#alertmsg").text("Old password and new password should not be same");
            } else {
                $("#alertmsg").text("Password matched");
                //actual code goes here
                let passData = {};
                passData.currpass = currpassword;
                $.ajax({
                    type: "POST",
                    url: "./components/_passmatch.php",
                    data: passData,
                    success: function(response) {
                        let result = JSON.parse(response);
                        console.log(result);
                        $("#alertmsg1").removeClass("d-none");
                        if(result.flag=="true"){
                            $("#alertmsg1").text("Correct password");
                            //submiting the data with form
                            // $("#changepass").off("submit").submit();
                            const dataJson={};
                            dataJson.currpassword = currpassword;
                            dataJson.password = password;
                            dataJson.cpassword = cpassword;
                            console.log(dataJson);
                            $.ajax({
                                type: "POST",
                                url: "./components/_passchanger.php",
                                data: dataJson,
                                success: function(res) {
                                    let out = JSON.parse(res);
                                    console.log(out);
                                    if(out.flag=="true"){
                                        let mailData = {};
                                        mailData.email = out.email;
                                        mailData.name = out.username;
                                        mailData.subject = "Security Alert";
                                        mailData.message = "Your password changed successfully"; 
                                        $.ajax({
                                            type: "POST",
                                            url: "./admin/sendmail/send_email.php",
                                            data: mailData,
                                            success: function(res) {
                                                // let resp1 = JSON.parse(res);
                                                console.log(res);
                                                console.log(res.flag);
                                                if(res.flag=="true"){
                                                    window.location.href = "./settings.php?updated=true";
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                // console.log(xhr,status,error);
                                                // window.alert("Failed to submit data to email provider");
                                                window.location.href = "./settings.php?updated=true";
                                            },
                                        });
                                    } else {
                                        //redirect to settings with update=false;
                                        window.location.href = "./settings.php?updated=false";
                                    }

                                },
                                error: function() {
                                    window.alert("Failed to submit data.1");
                                },
                            });
                        } else {
                            $("#alertmsg1").text("Enter correct password");
                        }
                    },
                    error: function() {
                        alert("Failed to submit data.2");
                    },
                });
            }
        } else if(password!=cpassword){
            $("#alertmsg").text("Password do not matched");
        }
    });
});