


// let likeIcons = document.getElementsByClassName('blog-post__icon--likes');

const _ = require("lodash");

// for(let i=0; i < likeIcons.length; i++){
//     likeIcons[i].addEventListener('click', function(){
//         likeIcons[i].classList.toggle('active');
//     });
// }

let headerMenuBtn = document.getElementById('header__menu-btn');
let sideMenu = document.getElementById('sidemenu');

headerMenuBtn.addEventListener('click', function(e){
    e.stopPropagation();

    sideMenu.classList.toggle('opened');
});

document.addEventListener('click', e =>{
    let target = e.target;
    let isSideMenu = target == sideMenu || sideMenu.contains(target);
    let isMenuOpened = sideMenu.classList.contains('opened');

    if(isMenuOpened && !isSideMenu){
        sideMenu.classList.toggle('opened');
    }
});