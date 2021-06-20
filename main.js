'use strict';

//Make navbar transparent when it is on the top
const navbar = document.querySelector('#navbar');
const navbarHeight = navbar.getBoundingClientRect().height;
document.addEventListener('scroll', () => {
    if (window.scrollY > navbarHeight) {
        navbar.classList.add('navbar_short');
    } else {
        navbar.classList.remove('navbar_short');
    }
});

//Make home slowlu fade to transparent as the window scrolls down.
window.addEventListener('scroll', scrollingFadeIn);

function scrollingFadeIn() {
    document.querySelectorAll('.section').forEach((item) => {
        let bottom = item.getBoundingClientRect().bottom;
        console.log(bottom);
        if (bottom <= window.innerHeight / 2) {
            item.style.opacity = bottom / (window.innerHeight / 2);
        } else {
            item.style.opacity = 1;
        }
    });
}
