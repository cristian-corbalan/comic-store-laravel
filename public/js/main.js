let html = document.querySelector('html');

// TODO Show and hide the navigation bar

let menuShowHideBtns = document.querySelectorAll('.menu-sh-btn');
let navBar = document.querySelector('header nav');
let menuController = false;

menuShowHideBtns.forEach(e => {
    e.addEventListener('click', function (ev) {
        ev.preventDefault();

        if (!menuController) {
            navBar.classList.add("active");
            html.classList.add("is-clipped");
            menuController = 1;
        } else {
            navBar.classList.remove('active');
            html.classList.remove('is-clipped');
            menuController = 0;
        }
    });
})

window.addEventListener('resize', function () {
    if (screen.width > 768) {
        navBar.classList.remove('active');
        html.classList.remove('is-clipped');
        menuController = 0;
    }
})

// TODO Show and hide filters

let filterShowHideBtns = document.querySelectorAll('.filter-sh-btn');
let filterSection = document.querySelector('#filters');
let filterControl = false;

filterShowHideBtns.forEach(e => {
    e.addEventListener('click', function (ev) {
        ev.preventDefault();

        if (!menuController) {
            filterSection.classList.add("is-active");
            html.classList.add("is-clipped");
            menuController = 1;
        } else {
            filterSection.classList.remove('is-active');
            html.classList.remove('is-clipped');
            menuController = 0;
        }
    });
})

window.addEventListener('resize', function () {
    if (screen.width > 768) {
        filterSection.classList.remove('is-active');
        html.classList.remove('is-clipped');
        menuController = 0;
    }
})
