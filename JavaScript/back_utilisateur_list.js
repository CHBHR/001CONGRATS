var info_clicker = document.querySelectorAll('#info_toggle');

info_clicker.forEach(e => {
    e.addEventListener('click', ()=>{
        console.log(e.parentElement.parentElement.parentElement.nextSibling);
        console.log(e.closest("table").nextSibling);
    });
});