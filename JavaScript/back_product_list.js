var info_clicker = document.querySelectorAll('#info_img');

info_clicker.forEach(e => {
    e.addEventListener('click', ()=>{
        var sibling = e.nextElementSibling;
        var parent = e.parentElement;
        if(sibling.style.display == "block"){
            sibling.style.display = "none";
            parent.style.border = "none";
        }else{
            sibling.style.display = "block";
            parent.style.border = "2px solid green";
        }
    });
});

var modif_btn = document.querySelectorAll('button[name=btn_modif]');

modif_btn.forEach(e =>{
    e.addEventListener('click', ()=>{
        var modale = e.parentElement.parentElement.nextElementSibling;
        if(modale.style.display = "none"){
            modale.style.display = "block";
        };
        var cancel = modale.querySelector('button[name=cancel_modif]');
        cancel.onclick = function() {
        modale.style.display = "none";
        };
    });
});

var del_btn = document.querySelectorAll('#delete');
console.log(del_btn);

del_btn.forEach(e =>{
    e.addEventListener('submit', (e)=>{
        var answer = window.confirm("Are you sure you want to delete?")
    if (answer) {
        console.log('deleted');
    }
    else {
        e.preventDefault();
        return;
    };
    });   
});