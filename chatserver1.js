import OPENAI_API_KEY from "./key.js";

let disable = false; //disable is used to hold the user for the query to execute and disables the send btn
let err = false;
let result = "";
const currentDate = new Date();
const hours = currentDate.getHours().toString().padStart(2, '0');
const minutes = currentDate.getMinutes().toString().padStart(2, '0');
const formattedDateTime = `${hours}:${minutes}`;
//function is used to create chat elements for user and bot
function errorDefault(txt){ //used to handle error msgs and successfull msgs
    return '<div class="container1">' +
    '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-robot" viewBox="0 0 16 16">' +
       '<path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>'+
        '<path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>'+
   '</svg>'+
'<pre style="background-color: #f5f5f5;word-wrap: break-word; white-space: pre-line;" >'+`${txt}`+'</pre>'+
'<span class="time-right">'+formattedDateTime+'</span>'+
'</div>';
}
document.getElementById("promptbtn").addEventListener("click", function(event){
    let inputText = document.getElementById("promptarea");
    if(inputText.value===''){
        inputText.placeholder = "Unable to process";
        document.getElementById("promptbtn").disabled="";
    } else {
        userInput(inputText.value);
    }
});

document.getElementById("promptarea").addEventListener("keydown", function(event){
    let inputText = document.getElementById("promptarea");
    if(event.key.toLowerCase()==='enter' && disable==false){
        userInput(inputText.value);
    } else{
        //console.log("KeyError: something went wrong",disable);
    }
});
function userInput(inputtext){
    document.getElementById("promptbtn").disabled="disabled";
    disable = true;
    //this userinput is the input from user with user properties
    let userinput ='<div class="container1 darker">'+
        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">'+
            '<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>'+
            '<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>'+
        '</svg>'+
        '<p>'+`${inputtext}`+'</p>'+
        '<span class="time-left">'+formattedDateTime+'</span>'+
        '</div>';
    $("#msgid").append(userinput);
    scrollToBottom();
    err = false;
    letsGo();
}

function letsGo(){
    let quest = document.getElementById("promptarea").value;
    quest.trim();
    scrollToBottomTextArea();
    //console.log(quest);
    runCompletion(quest);
    document.getElementById("promptarea").setSelectionRange(0, 0);
    document.getElementById("promptarea").value='';
}
function scrollToBottom() {
    document.getElementById("msgid").scrollTop =document.getElementById("msgid").scrollHeight;
}
function scrollToBottomTextArea() {
    document.getElementById("promptarea").scrollBottom =document.getElementById("promptarea").scrollHeight;
}
function runCompletion(query){
    let dataToSend = {};
    dataToSend.prompt=query;
    $.ajax({
        url: "./components/chatserverphp.php", // URL of the PHP file
        type: "POST", // HTTP method
        data: dataToSend,
        dataType: "json", // Data type to expect from the server
        success: function (data) {
            // On success, update the result div with the received data
            let res = JSON.parse(data);
            console.log(res);
            let response = res.choices[0].text.trim();
            $("#msgid").append(errorDefault(response));
            document.getElementById("promptbtn").disabled="";
            disable = false;
            scrollToBottom();
        },
        error: function () {
            // On error, display an error message
            $("#msgid").append(errorDefault("Sorry..Something went Wrong"));
            scrollToBottom();
            disable = false;
            document.getElementById("promptbtn").disabled="";
            //$("#response").val("Error fetching data from PHP.");
        }
    });
}
//the code below is the chatgpt api using javascript 
// async function runCompletion(question){
//     document.getElementById("promptarea").placeholder="Type your question here...";
//     try{
//         const response = await fetch('https://api.openai.com/v1/completions',{
//             method:"POST",
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Authorization': `Bearer ${OPENAI_API_KEY}`,
//                 'OpenAI-Organization': 'org-Wnyvx3sONeZuPGwSQ2ZYvfrs'
//             },
//             body: JSON.stringify({
//                 'model': "text-davinci-003",
//                 'prompt': question,
//                 'max_tokens': 100,
//                 'temperature': 0.2
//             }),
//         });
//         if(response.ok){
//             //console.log("Hello");
//             const data = await response.json();
//             //document.querySelector(".response").value
//             result = (data.choices[0].text.trim());
//             $("#msgid").append(errorDefault(result));
//             document.getElementById("promptbtn").disabled="";
//             disable = false;
//             scrollToBottom();
//             //console.log(result);
//             //console.log(data.choices[0].text);
             
//         } else{
//             err = true;
//             //$("#msgid").append(errorDefault);
//             //document.querySelector(".response").value="Unable to process your request1";
//             //console.log("fail");
//         }
//     }
//     catch(error){
//         err = true;
//         //document.querySelector(".response").value="Unable to process your request2";
//         //$("#msgid").append(errorDefault);
//         //console.log("123");
//         //change the response area unable to process your request
//     }
//     if(err){
//         $("#msgid").append(errorDefault("Sorry..Something went Wrong"));
//         scrollToBottom();
//         disable = false;
//         document.getElementById("promptbtn").disabled="";
//     }
// }