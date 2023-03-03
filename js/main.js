document.querySelector("#login").style.display = "none";
function toggleLogin() {
    if (document.querySelector("#login").style.display == "none") {
        document.querySelector("#login").style.display = "flex";
    } else {
        document.querySelector("#login").style.display = "none";
    }
    
}