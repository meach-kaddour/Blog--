const navbar = document.querySelector('.js-custom-navbar');
const menuIcon = document.querySelector('.js-menu-icon');
const menuIconClose = document.querySelector('.js-menu-icon span');


menuIcon.addEventListener('click', e => {
    e.preventDefault();
    navbar.classList.toggle("open");
    menuIconClose.classList.toggle("fa-times");
});