// TODO Show and hide the navigation bar

let menuShowHideBtns = document.querySelectorAll('.menu-sh-btn');
let navBar = document.querySelector('header nav');
let menuController = false;

menuShowHideBtns.forEach(e => {
    e.addEventListener('click', function (ev){
       ev.preventDefault();
       console.log(navBar);
        if (!menuController) {
            navBar.classList.add("active");
            menuController = 1;
        } else {
            navBar.classList.remove('active');
            menuController = 0;
        }
    });
})

window.addEventListener('resize',function (){
    if(screen.width > 768){
        navBar.classList.remove('active');
        menuController = 0;
    }
})

