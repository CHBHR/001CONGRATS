var modal = document.getElementById("myModal");
var btn = document.getElementById("modal_btn");
// console.log(btn.innerHTML);


// TEMP CLOSING SESSION
var span = document.getElementsByClassName("close")[0];
// span.addEventListener('click', function(){
// })


var toggle_inscription = document.getElementById('modal_insc_btn');
var toggle_connection = document.getElementById('modal_conn_btn');
var inscription_block = document.getElementById('form_inscription_main');
var connection_block = document.getElementById('form_connection_main');

// btn.onclick = function() {
//     modal.style.display = "block";   
//     // btn.innerHTML = '<i class="far fa-eye"></i>';
// }

if(btn){
    btn.addEventListener('click', function(){
        modal.style.display = "block";
        inscription_block.style.display ="block";
        connection_block.style.display ="none";
    })
}


span.onclick = function() {
    modal.style.display = "none";
    // btn.innerHTML = '<i class="fas fa-bookmark"></i>';
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        // btn.innerHTML = '<i class="fas fa-bookmark"></i>';
    }
}

toggle_inscription.addEventListener('click', function() {
    inscription_block.style.display ="block";
    connection_block.style.display ="none";
})
toggle_connection.addEventListener('click', function() {
    inscription_block.style.display ="none";
    connection_block.style.display ="block";
})