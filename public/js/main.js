const htmlDom = document.querySelector('html');

document.querySelectorAll('[data-role="toggle"]').forEach(e => {

    e.addEventListener('click', ev => {
        ev.preventDefault();

        console.log(ev);
        let target = e.dataset.target;

        document.querySelectorAll(`[data-name="${target}"]`).forEach(obj => {
            console.log(obj);

            obj.classList.toggle(e.dataset.targetClass);

            if (e.dataset.clip) {
                htmlDom.classList.toggle('is-clipped');
            }
        });
    });
});

window.addEventListener('resize', function () {
    if (screen.width > 768) {
        document.querySelector(`[data-name="website-menu"]`).classList.remove('active');
        document.querySelector(`[data-name="filters-modal"]`).classList.remove('is-active');
        htmlDom.classList.remove('is-clipped');
    }
})

// TODO Details show and hide tabs

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

// TODO Notification

let notificationGeneral = document.querySelector('.notification-general')

if(notificationGeneral){
    setTimeout(()=>{
        notificationGeneral.classList.add('is-hidden')
    }, 10000)
}
