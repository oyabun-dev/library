const navLinks = document.querySelectorAll('.nav-link');
const navLinksArray = Array.from(navLinks);

navLinksArray.forEach((link) => {
    if (link.href === location.href) {
        link.classList.add('active');
    } else {
        link.classList.remove('active');
    }
});