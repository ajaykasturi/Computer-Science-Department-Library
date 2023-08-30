
let pid = document.getElementById("userEdit");

pid.addEventListener('click',function(e){
    document.getElementById("afname").removeAttribute("readonly");
    // document.getElementById("auname").removeAttribute("readonly");
    document.getElementById("aemail").removeAttribute("readonly");
    document.getElementById("apass").removeAttribute("readonly");
    pid.classList.add("d-none");
    document.getElementById("aupdate").classList.remove("d-none");
});