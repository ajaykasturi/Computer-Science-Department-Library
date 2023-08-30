
let pid = document.getElementById("noticeEdit");

pid.addEventListener('click',function(e){
    document.getElementById("heading").removeAttribute("readonly");
    // document.getElementById("auname").removeAttribute("readonly");
    document.getElementById("content").removeAttribute("readonly");
    document.getElementById("url").removeAttribute("readonly");
    pid.classList.add("d-none");
    document.getElementById("aupdate").classList.remove("d-none");
});