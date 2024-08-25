

// select toggle btn
let togglebtn = document.getElementById('navbar-toggler');
let dropDownMenu = document.querySelector('.collapse');



// // listen for when button is clicked.
togglebtn.addEventListener('click',()=>{
// when button is clicked check state of dropdown.

let style = getComputedStyle(dropDownMenu);
if(style.display === 'none'){
    dropDownMenu.style.display = 'block'
}else if(style.display === 'block'){
    dropDownMenu.style.display = 'none'
}
    
    
})




