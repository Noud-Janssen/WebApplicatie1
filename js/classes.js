
class adminItem extends HTMLElement {
    constructor() {
      // Always call super first in constructor
      super();
      // Element functionality written in here
      this.addEventListener("click", function() {

        //loading form
        document.querySelector("#edit").style.display = "flex";
        document.querySelector("#name-of-pizza").value = this.dataset.title
        document.querySelector("#description-of-pizza").value = this.dataset.description
        document.querySelector("#price-of-pizza").value = this.dataset.price
        document.querySelector("#id-view").innerHTML = this.id
        document.querySelector("#id-value").value = this.id.split("-").pop();
        console.log(document.querySelector("#id-value").value)
        if (this.dataset.vegan == 1) {
            document.querySelector("#vegan-of-pizza").checked = true
        } else {
            document.querySelector("#vegan-of-pizza").checked = false
        }
      })
    }
  }

class adminItemAccount extends HTMLElement {
    constructor() {
      super();
      this.addEventListener("click", function() {

        document.querySelector("#name-of-pizza").value = this.dataset.name
        document.querySelector("#description-of-pizza").value = this.dataset.password
        document.querySelector("#id-view").innerHTML = this.id
        document.querySelector("#id-value").value = this.id.split("-").pop();
        console.log(document.querySelector("#id-value").value)

        document.querySelector("#edit").style.display = "flex"
      })
    }
}
  
customElements.define("admin-item", adminItem);
customElements.define("admin-item-account", adminItemAccount);