let menuToggler = document.querySelector(".nav_button");
let navLink = document.querySelectorAll(".nav-link");
let navlist = document.querySelector(".nav_list ");
let body = document.querySelector("body");

menuToggler.addEventListener("click", () => {
    navlist.classList.toggle("fille");
});
navLink.forEach(link => {
    link.addEventListener("click", () => {
        body.classList.toggle("open");
    });
});