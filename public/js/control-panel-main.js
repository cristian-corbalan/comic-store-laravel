const htmlDom = document.querySelector('html');

document.querySelectorAll('[data-role="toggle"]').forEach(e => {

    e.addEventListener('click', ev => {
        ev.preventDefault();

        let target = e.dataset.target;

        document.querySelectorAll(`[data-name="${target}"]`).forEach(obj => {

            obj.classList.toggle(e.dataset.targetClass);

            if (e.dataset.clip) {
                htmlDom.classList.toggle('is-clipped');
            }
        });
    });
});

window.addEventListener('resize', function () {
    if (screen.width > 768) {
        document.querySelector(`[data-name="control-panel-menu"]`).classList.remove('is-active');
        htmlDom.classList.remove('is-clipped');
    }
})

// TODO Notification

let notificationGeneral = document.querySelector('.notification-general')

if(notificationGeneral){
    setTimeout(()=>{
        notificationGeneral.classList.add('is-hidden')
    }, 10000)
}

