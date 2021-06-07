let html = document.querySelector('html');

// TODO Show and hide the navigation bar

let menuShowHideButtons = document.querySelectorAll('.menu-sh-btn');
let navBar = document.querySelector('header nav');
let menuController = false;

if (menuShowHideButtons) {
    menuShowHideButtons.forEach(e => {
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
}
// TODO Show and hide filters

let filterShowHideButtons = document.querySelectorAll('.filter-sh-btn');
let filterSection = document.querySelector('#filters');
let filterControl = false;

if (filterShowHideButtons) {

    filterShowHideButtons.forEach(e => {
        e.addEventListener('click', function (ev) {
            ev.preventDefault();

            if (!filterControl) {
                filterSection.classList.add("is-active");
                html.classList.add("is-clipped");
                filterControl = 1;
            } else {
                filterSection.classList.remove('is-active');
                html.classList.remove('is-clipped');
                filterControl = 0;
            }
        });
    })

    window.addEventListener('resize', function () {
        if (screen.width > 768) {
            filterSection.classList.remove('is-active');
            html.classList.remove('is-clipped');
            filterControl = 0;
        }
    })
}

// TODo Details show and hide tabs

let tabsBtn = document.querySelectorAll('.tab');
let contentTabs = document.getElementsByClassName("content-tab");

tabsBtn.forEach(e => {
    e.firstChild.addEventListener('click', ev => {
        ev.preventDefault()
    })
    e.addEventListener('click', () => {

        for (let i = 0; i < contentTabs.length; i++) {
            contentTabs[i].style.display = "none";
        }

        for (let i = 0; i < tabsBtn.length; i++) {
            tabsBtn[i].className = tabsBtn[i].className.replace(" is-active", "");
        }

        document.getElementById(e.dataset.tabContentId).style.display = "block";
        e.classList.add("is-active");
    })

})
