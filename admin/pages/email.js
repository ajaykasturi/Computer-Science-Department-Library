// This is the file containing the output you want to share
const myOutput = "Hello, this is my output!";
const Mail=async function(email,content){
    let out = "noyes"
    await window.Email.send({
        Host : "smtp.elasticemail.com",
        Username : "cse.lib.rguktb@gmail.com",
        Password : "30223900A910252D1770DB138F61A391F743",
        To : email,
        From : "cse.lib.rguktb@gmail.com",
        Subject : "CSE Department Library",
        Body : content
    }).then(
      message => {
        if(message=="OK"){
            console.log(message+"success");
            out = "YES";
        } else {
            console.log(message +" unsuccess");
            out = "NO";
        }
    }
    );
    return out;
    
}
export default Mail;