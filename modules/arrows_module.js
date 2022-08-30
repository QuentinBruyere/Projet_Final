let $this = null;
let arrows = [];

class ArrowsModule {

/*-------   INITIALISATION   --------*/

    //We're setting the variables the class needs
    constructor(body, pad, arrowUp, arrowDown, arrowLeft, arrowRight) {
        this.body = document.querySelector("body");
        this.pad = document.querySelector(".pad");
        
        this.arrowUp = document.querySelector(".arrowUp");
        this.arrowDown = document.querySelector(".arrowDown");
        this.arrowLeft = document.querySelector(".arrowLeft");
        this.arrowRight = document.querySelector(".arrowRight");
        
        //making on object with the 4 arrows
        /*global arrows*/
        arrows = [
            this.arrowUp,
            this.arrowDown,
            this.arrowLeft,
            this.arrowRight
        ];
        
        /*global $this*/
        $this = this;
        
        //Add EventListener on arrows
        this.arrowUp.addEventListener("click", this.ArrowUpEvent);
        this.arrowDown.addEventListener("click", this.ArrowDownEvent);
        this.arrowLeft.addEventListener("click", this.ArrowLeftEvent);
        this.arrowRight.addEventListener("click", this.ArrowRightEvent);
        
    }

/*---------   PROCESSING   ----------*/
    
    /*
    I've chose to create a fake event when cliking on the arrows
    When clicking on one, a fake Keyboard event make MovePlayer React
    and acting like a keytouch was pressed
    
    By this solution, I make a more more complex logic code but for me
    it's a more readable one
    */
    
    ArrowUpEvent(event) {
        //$this.arrowUp.style.backgroundColor = "red";
        //creating a fake Arrow Up Keytouch Event
        let fakeUpArrow = new KeyboardEvent('keydown', {"code": 'ArrowUp'});
        //send it to the document to make MovePlayer method react
        document.dispatchEvent(fakeUpArrow);
    }
    
    ArrowDownEvent(event) {
        let fakeDownArrow = new KeyboardEvent('keydown', {"code": 'ArrowDown'});
        document.dispatchEvent(fakeDownArrow);
    }
    
    ArrowLeftEvent(event) {
        let fakeLeftArrow = new KeyboardEvent('keydown', {"code": 'ArrowLeft'});
        document.dispatchEvent(fakeLeftArrow);
    }
    
    ArrowRightEvent(event) {
        let fakeRightArrow = new KeyboardEvent('keydown', {"code": 'ArrowRight'});
        document.dispatchEvent(fakeRightArrow);
    }

    
    //This method will add an E.Listener on each arrow and fill it in red when clicked/touched
    loadEventListeners() {
        
        //add a Listener who fill the background in red when clicked/touched
        function addEvent(arrow) {
            arrow.addEventListener("mousedown", e => {
                arrow.style.backgroundColor = "red";
            });
            arrow.addEventListener("touchstart", e => {
                arrow.style.backgroundColor = "red";
            });
        }
        
        //add the previous Listener function to each element of the object arrows
        arrows.forEach(arrow => addEvent(arrow));
        
        //BGC go back to initial when the mouse click is up or the finger's touch is released
        document.addEventListener("mouseup", e => {
            this.arrowLeft.style.backgroundColor = "#ddd";
            this.arrowUp.style.backgroundColor = "#ddd";
            this.arrowRight.style.backgroundColor = "#ddd";
            this.arrowDown.style.backgroundColor = "#ddd";
        });
        
        document.addEventListener("touchend", e => {
            this.arrowLeft.style.backgroundColor = "#ddd";
            this.arrowUp.style.backgroundColor = "#ddd";
            this.arrowRight.style.backgroundColor = "#ddd";
            this.arrowDown.style.backgroundColor = "#ddd";
        });
    }
}

export default ArrowsModule;