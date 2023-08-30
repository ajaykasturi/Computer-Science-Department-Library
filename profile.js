
let pid = document.getElementById("profileEdit");

pid.addEventListener('click',function(e){
    document.getElementById("sname").removeAttribute("readonly");
    // document.getElementById("susername").removeAttribute("readonly");
    // document.getElementById("semail").removeAttribute("readonly");
    document.getElementById("updatebtn").removeAttribute("readonly");
    pid.classList.add("d-none");
    document.getElementById("update").classList.remove("d-none");
});