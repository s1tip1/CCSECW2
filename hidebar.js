// Script to hide navigation bar on scroll. Just include it in page to activate

var scrollPos = window.pageYOffset;
var navbar = document.querySelector("#navbar-top");

window.onscroll = () => {
    let currentScroll = window.pageYOffset;

    if (currentScroll > scrollPos) {   // User is scrolling down
        navbar.style.top = "-50px";   // Hide navbar
    }
    else {
        navbar.style.top = "0px";   // Show navbar, scrolling up
    }

    scrollPos = currentScroll;   // Update previous position
};