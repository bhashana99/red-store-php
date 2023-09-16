const mode = document.getElementById("mode");
const cartIcon = document.getElementById("cart-icon");

mode.onclick = function(){
    document.body.classList.toggle("dark-theme");{
        if(document.body.classList.contains("dark-theme")){
            mode.classList.remove("fa-solid","fa-toggle-off");
            mode.classList.add("fa-solid","fa-toggle-on");
            // mode.title = "Back to Light Mode";
            mode.style.color = "var(--success-color)";
            
        }else{
            mode.classList.remove("fa-solid","fa-toggle-on");
            mode.classList.add("fa-solid","fa-toggle-off");
            // mode.title = "Dark Mode";
            mode.style.color = "var(--dark-color)";
           
        }
    }
}

const menuItem = document.getElementById("menuItem");

menuItem.style.maxHeight = "0px";

function menutoggle(){
    if(menuItem.style.maxHeight == "0px"){
        menuItem.style.maxHeight = "200px";
    }else{
        menuItem.style.maxHeight = "0px";
    }
}

// product gallery
const productImg = document.getElementById("product-img");
let smallImg = document.getElementsByClassName("small-img");

smallImg[0].onclick = function(){
    productImg.src = smallImg[0].src;
}
smallImg[1].onclick = function(){
    productImg.src = smallImg[1].src;
}
smallImg[2].onclick = function(){
    productImg.src = smallImg[2].src;
}
smallImg[3].onclick = function(){
    productImg.src = smallImg[3].src;
}