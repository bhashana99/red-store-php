
// Define constants for elements
const LoginForm = document.getElementById("LoginForm");
const RegForm = document.getElementById("RegForm");
const Indicator = document.getElementById("Indicator");
const mode = document.getElementById("mode");
const cartIcon = document.getElementById("cart-icon");
const menuIcon = document.getElementById("menu-icon");
const menuItem = document.getElementById("menuItem");
const productImg = document.getElementById("product-img");
const smallImg = document.getElementsByClassName("small-img");

// Function to switch between login and registration forms
function register() {
    RegForm.style.transform = "translateX(0px)";
    LoginForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(100px)";
}

function login() {
    RegForm.style.transform = "translateX(300px)";
    LoginForm.style.transform = "translateX(300px)";
    Indicator.style.transform = "translateX(0px)";

}

// Function to toggle dark mode
function toggleDarkMode() {
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        mode.classList.remove("fa-solid", "fa-toggle-off");
        mode.classList.add("fa-solid", "fa-toggle-on");
        mode.style.color = "var(--success-color)";
    } else {
        mode.classList.remove("fa-solid", "fa-toggle-on");
        mode.classList.add("fa-solid", "fa-toggle-off");
        mode.style.color = "var(--dark-color)";
    }
}

// Function to toggle the menu
function toggleMenu() {
    if (menuItem.style.maxHeight == "0px") {
        menuItem.style.maxHeight = "200px";
    } else {
        menuItem.style.maxHeight = "0px";
    }
}

// Attach click event handlers
mode.addEventListener("click", toggleDarkMode);
menuIcon.addEventListener("click", toggleMenu);

// Attach click event handlers to small images for product gallery
for (let i = 0; i < smallImg.length; i++) {
    smallImg[i].addEventListener("click", function () {
        productImg.src = smallImg[i].src;
    });
}
