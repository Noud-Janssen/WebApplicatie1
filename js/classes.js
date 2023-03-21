
class scheduleBlock extends HTMLParagraphElement {
    constructor() {
      // Always call super first in constructor
      super();
      
      
      // Element functionality written in here
      this.style.width = '100px'
      this.style.height = '100px'
      this.style.background = 'red'
    }
  }

customElements.define("scheduleBlock", scheduleBlock);
  