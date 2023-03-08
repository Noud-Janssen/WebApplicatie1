console.log("1")
function toggleLogin() {
    document.querySelector('#login').classList.toggle('alive')
}

function select(id) {
    items = document.querySelectorAll(".item");
    for (i = 0; i < items.length; i++) {
        items[i].classList.remove("selected")
    }
    
    document.querySelector("#" + id).classList.add("selected")

    document.querySelector("#name-of-pizza").value = document.querySelector("#" + id).dataset.title
    document.querySelector("#description-of-pizza").value = document.querySelector("#" + id).dataset.description
    document.querySelector("#price-of-pizza").value = document.querySelector("#" + id).dataset.price
    document.querySelector("#id-view").innerHTML = id
    if (document.querySelector("#" + id).dataset.vegan == 1) {
        document.querySelector("#vegan-of-pizza").checked = true
    } else {
        document.querySelector("#vegan-of-pizza").checked = false
    }

    document.querySelector("#edit").style.display = "flex"
    
}

