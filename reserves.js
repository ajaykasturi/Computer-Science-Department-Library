reserves = document.getElementsByClassName("reserve");
Array.from(reserves).forEach((element)=>{
    element.addEventListener('click',function(e){
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[2].innerText;
        authors = tr.getElementsByTagName('td')[3].innerText;
        document.getElementById('booktitle').value=title;
        document.getElementById("bookauthor").value=authors;
        document.getElementById("bookid").value=e.target.id;
        document.getElementById("titlereserve").innerHTML=title;
    });
});