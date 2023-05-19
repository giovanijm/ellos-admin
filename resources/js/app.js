import Alpine from 'alpinejs';
import jQuery from 'jquery';
import('preline');

window.Alpine = Alpine;
window.$ = jQuery;

Alpine.start();

$("#btnThemeClear").on("click", function (e){
    if (localStorage.getItem('color-theme')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    }
});

$("#btnThemeDark").on("click", function (e){
    if (localStorage.getItem('color-theme')) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    }
});
