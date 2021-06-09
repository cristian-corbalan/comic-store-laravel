$(document).ready(function() {
    $('.select2').select2();
});

let html = document.querySelector('html');

// TODO Show and hide Menu

let sideNavShownAndHideButtons = document.querySelectorAll('.menu-sh-btn');
let sideNav = document.getElementById('side-nav');
let menuController = false;

// console.log(sideNavShownAndHideButtons)
// console.log(sideNav)

if (sideNavShownAndHideButtons) {
    sideNavShownAndHideButtons.forEach(e => {
        e.addEventListener('click', function (ev) {
            ev.preventDefault();

            if (!menuController) {
                sideNav.classList.add("is-active");
                html.classList.add("is-clipped");
                menuController = true;
            } else {
                sideNav.classList.remove('is-active');
                html.classList.remove('is-clipped');
                menuController = false;
            }
        });
    })

    window.addEventListener('resize', function () {
        if (screen.width > 768) {
            sideNav.classList.remove('is-active');
            html.classList.remove('is-clipped');
            menuController = false;
        }
    })
}

let mainDropdown = document.getElementById('user-dropdown');

mainDropdown.addEventListener('click', ev => {
    if (mainDropdown.classList.contains( 'is-active' )){
        mainDropdown.classList.remove('is-active');
    }else{
        mainDropdown.classList.add('is-active');

    }
})

