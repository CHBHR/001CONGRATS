var delBtn = document.querySelectorAll('#del_btn');
// console.log(delBtn);

delBtn.forEach(e=>{
    e.addEventListener('click', ()=>{
        console.log(e.parentElement);
        var answer = window.confirm("Supprimer ce produit?");
        if(answer){
            e.parentElement.remove();
            
        }else{
            return;
        }
    });
});

function cutCookie(value){
    let resultat = document.cookie
}