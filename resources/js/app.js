import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    const notification = document.getElementById('notification');

    if (notification) {
        setTimeout(function () {
            notification.classList.remove('opacity-100');
            notification.classList.add('opacity-0');

            setTimeout(function () {
                notification.remove();
            }, 500)
        }, 5000)
    }
})
