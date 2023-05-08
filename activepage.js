// A script to highlight the active page in the navbar

var navLinks = document.querySelectorAll("#navbar-top > li a");
var currentPage  = window.location.pathname.split("/").pop();  // Split pathname to get current page file

for (let i = 0; i < navLinks.length; i++) {   // Find href to current page
    if (navLinks[i].attributes.href.value === currentPage) {
        navLinks[i].classList.add("nav-active");
        break;
    }
}