var menuActive = false;
var navbar = document.querySelector("#nav");
console.log(navbar);
var toggle = () => {
    navbar.classList.toggle("active");
    console.log(navbar.classList);
};