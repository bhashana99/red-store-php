const mode = document.getElementById("mode");
const cartIcon = document.getElementById("cart-icon");

mode.onclick = function(){
    document.body.classList.toggle("dark-theme");{
        if(document.body.classList.contains("dark-theme")){
            mode.classList.remove("fa-solid","fa-toggle-off");
            mode.classList.add("fa-solid","fa-toggle-on");
            mode.title = "Light Mode";
            mode.style.color = "var(--success-color)";
            
        }else{
            mode.classList.remove("fa-solid","fa-toggle-on");
            mode.classList.add("fa-solid","fa-toggle-off");
            mode.title = "Dark Mode";
            mode.style.color = "var(--dark-color)";
           
        }
    }
}