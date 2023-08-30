import Mail from "./email.js";
let discards = document.getElementsByClassName('discard');
    Array.from(discards).forEach((element)=>{
    element.addEventListener('click',function(e){
    let did = e.target.id.substr(1,);
    if(confirm("Are you sure, you want to discard this request!")){
        // const form = document.createElement('form');
        // form.method = 'post';
        // form.action = '../admincomponents/_approvehandler.php';
        // const input = document.createElement('input');
        // input.type = 'hidden';
        // input.name = "id";
        // input.value = rid;
        // form.appendChild(input);
        // document.body.appendChild(form);
        // form.submit();
        $.ajax({
            url: "../admincomponents/_discardhandler.php",
            type: "POST",
            data: {id:did},
            success: function(response) {
                // Process the response from the server
                let res = JSON.parse(response);
                //console.log(res);
                let email = res.email;
                let bodycontent = `Your request has been discarded.<br><b>Book Title: ${res.title}<br>Request Date: ${res.requestdate}<br>Discarded Date: ${new Date()}</b><br>`;
                //console.log(bodycontent); 
                let out = Mail(email,bodycontent).then(function(val){
                    if(res.flag=="true"){
                        console.log(res.flag);
                        window.alert("Book discarded successfully...");
                        window.location.href = "./requestreturns.php";
                    }
                });

            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
            }
        });
    }
    });
});
