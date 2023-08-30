import Mail from "./email.js";
let approves = document.getElementsByClassName('approve');
    Array.from(approves).forEach((element)=>{
    element.addEventListener('click',function(e){
    let rid = e.target.id.substr(1,);
    if(confirm("Are you sure, you want to Approve this request!")){
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
            url: "../admincomponents/_approvehandler.php",
            type: "POST",
            data: {id:rid},
            success: function(response) {
                // Process the response from the server
                let res = JSON.parse(response);
                console.log(res);
                let email = res.email;
                let bodycontent = `Your request has been approved.<br><br><b>Book Title:<b> ${res.title}<br><b>Request Date:</b> ${res.requestdate}<br><b>Approved Date:</b> ${res.approvaldate}<br>`;
                console.log(bodycontent); 
                let out = Mail(email,bodycontent).then(function(val){
                    if(res.flag=="true"){
                        console.log(res.flag);
                        window.alert("Book Approved successfully...");
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
