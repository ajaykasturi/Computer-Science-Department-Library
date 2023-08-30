import Mail from "./email.js";
let bookreturns = document.getElementsByClassName('bookreturns');
Array.from(bookreturns).forEach((element)=>{
element.addEventListener('click',function(e){
    let sno = e.target.id.substr(1,);
    if(confirm("Are you sure, you want to delete this book!")){
        //console.log(sno);
        // const formdel = document.createElement('form');
        // formdel.method = 'post';
        // formdel.action = '../admincomponents/_returnhandler.php';
        // const input1 = document.createElement('input');
        // input1.type = 'hidden';
        // input1.name = "id";
        // input1.value = sno;
        // formdel.appendChild(input1);
        // document.body.appendChild(formdel);
        // formdel.submit();
        $.ajax({
            url: "../admincomponents/_returnhandler.php",
            type: "POST",
            data: {id:sno},
            success: function(response) {
                // Process the response from the server
                let res = JSON.parse(response);
                //console.log(res);
                let email = res.email;
                let bodycontent = `You returned book<br><b>Titled:<b> ${res.reserve_book_title}<br><b>Request Date:</b> ${res.request_date}<br><b>Approval Date:</b> ${res.approval_date}<br><b>Returned Date:</b>${new Date()};`
                //console.log(bodycontent); 
                let out = Mail(email,bodycontent).then(function(val){
                    if(res.flag=="true"){
                        console.log(res.flag);
                        window.alert("Book returned successfully...");
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