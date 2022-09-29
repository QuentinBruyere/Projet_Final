let player = null;
let map = null;
let movespeed = null;
let $this = null;

class GameModule {

/*-------   INITIALISATION   --------*/

    //We're setting the variables the class needs
    constructor(gameArea, stageBackground, ctx, saveButton) {
        this.gameArea = document.querySelector('.game');
        this.stageBackground = document.querySelector('.stageBackground');
        this.ctx = this.stageBackground.getContext('2d');
        this.saveButton = document.querySelector('.saveButton');
        
        this.map = {
            x: 0,
            y: 0,
            width: 400,
            height: 400,
            color: "grey"
        };
        /*global map*/
        map = this.map;
        
        this.player = {
            x: 200,
            y: 200,
            width: 20,
            height: 50,
            color: "red"
        };
        /*global player*/
        player = this.player;
        
        this.movespeed = 20;
        /*global movespeed*/
        movespeed = this.movespeed;
        
        /*global $this*/
        $this = this;
        
        document.addEventListener("keydown", this.MovePlayer);
        this.saveButton.addEventListener("click", this.Save);
    }

    // REDEFINIR this pour avant l'eventListener pour péter son scope
    
/*---------   PROCESSING   ----------*/
    
    //Creating the background of the stage
    DisplayMap() {
        this.ctx.fillStyle = map.color;
        this.ctx.fillRect(map.x, map.y, map.width, map.height);
    }
    
    //Creating the player
    DisplayPlayer() {
        this.ctx.fillStyle = player.color;
        this.ctx.fillRect(player.x - (player.width/2), player.y - player.height, player.width, player.height);
    }
    
    //Running the Map and Player display
    DisplayGame(DisplayMap, DisplayPlayer, MoveListener, MovePlayer) {
        //Clear the canvas
        this.ctx.clearRect(map.x, map.y, map.width, map.height);
        
        //Display again the new canvas
        this.DisplayMap();
        this.DisplayPlayer();
    }
    
    MovePlayer(event) {
        console.log(event.code);
        switch(event.code){
                case "ArrowUp":
                    if(player.y - player.height > map.y){
                        if(player.y - player.height - movespeed < map.y){
                            player.y = map.y + player.height;
                        }else{
                            player.y -= movespeed;    
                        }
                    }
                    $this.DisplayGame();
                    break;
                case "ArrowDown":
                    if(player.y < map.height){
                        if(player.y + movespeed > map.height){
                            player.y = map.height;
                        }else{
                            player.y += movespeed;
                        }
                    }
                    $this.DisplayGame();
                    break;
                case "ArrowLeft":
                    if(player.x - (player.width/2) > map.x){
                        if(player.x - (player.width/2) - movespeed < map.x){
                            player.x = map.x + 1.5*player.width;
                        }
                        player.x -= movespeed;
                    }    
                    $this.DisplayGame();
                    break;
                case "ArrowRight":
                    if(player.x + (player.width/2) < map.width){
                        if(player.x + (player.width/2) + movespeed > map.width){
                            player.x = map.width - 1.5*player.width;
                        }
                        player.x += movespeed;
                    }
                    $this.DisplayGame();
                    break;
                default :
                    break;
            }
        console.log("Player X : " + player.x);
        console.log("Player Y : " + player.y);
        
    }
    
    Save(){
        let formData = new FormData();
        
        formData.append('playerX', player.x);
        formData.append('playerY', player.y);
        
        const options = {
            method: 'POST',
            body: formData
        };
        
        fetch('https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/save-game', options)
            .then(console.log("done"));
        
    }
    
}

export default GameModule;






















    /*LoadKeyboardListener() {
        document.addEventListener("keydown", MovePlayer);
    }*/
    
    /*---------   LISTENERS   -----------*/
    
    //On écoute les événements du clavier
    //document.addEventListener("keydown", MovePlayer);


    
/*    
    let padSettings = {
        x: 0,
        y: 0,
        diameter: "200px",
        border: "2px solid black",
        position: "relative",
        bottom: "10px",
        left: "10px"
    
    ---------   FONCTIONS   -----------
    
    arrowLeft.addEventListener("mousedown", e => {
        arrowLeft.style.backgroundColor = `red`;
        if(player.x - (player.width/2) > map.x){
            if(player.x - (player.width/2) - moveSpeed < map.x){
                player.x = map.x + 1.5*player.width;
            }
            player.x-=moveSpeed;
        }    
        DisplayGame();
    });
    
    arrowLeft.addEventListener("touchstart", e => {
        arrowLeft.style.backgroundColor = `red`;
        arrowLeft.style.backgroundColor = `red`;
        if(player.x - (player.width/2) > map.x){
            if(player.x - (player.width/2) - moveSpeed < map.x){
                player.x = map.x + 1.5*player.width;
            }
            player.x-=moveSpeed;
        }    
        DisplayGame();
    });
    
    arrowUp.addEventListener("mousedown", e => {
        arrowUp.style.backgroundColor = `red`;
        if(player.y - player.height > map.y){
            if(player.y - player.height - moveSpeed < map.y){
                player.y = map.y + player.height;
            }else{
                player.y-=moveSpeed;    
            }
        }
        DisplayGame();
    });
    
    arrowUp.addEventListener("touchstart", e => {
        arrowUp.style.backgroundColor = `red`;
        if(player.y - player.height > map.y){
            if(player.y - player.height - moveSpeed < map.y){
                player.y = map.y + player.height;
            }else{
                player.y-=moveSpeed;    
            }
        }
        DisplayGame();
    });
    
    arrowRight.addEventListener("mousedown", e => {
        arrowRight.style.backgroundColor = `red`;
        if(player.x + (player.width/2) < map.width){
            if(player.x + (player.width/2) + moveSpeed > map.width){
                player.x = map.width - 1.5*player.width;
            }
            player.x+=moveSpeed;
        }
        DisplayGame();
    });
    
    arrowRight.addEventListener("touchstart", e => {
        arrowRight.style.backgroundColor = `red`;
        if(player.x + (player.width/2) < map.width){
            if(player.x + (player.width/2) + moveSpeed > map.width){
                player.x = map.width - 1.5*player.width;
            }
            player.x+=moveSpeed;
        }
        DisplayGame();
    });
    
    arrowBottom.addEventListener("mousedown", e => {
        arrowBottom.style.backgroundColor = `red`;
        if(player.y < map.height){
            if(player.y + moveSpeed > map.height){
                player.y = map.height;
            }else{
                player.y+=moveSpeed;
            }
        }
        DisplayGame();
    });
    
    arrowBottom.addEventListener("touchstart", e => {
        arrowBottom.style.backgroundColor = `red`;
        if(player.y < map.height){
            if(player.y + moveSpeed > map.height){
                player.y = map.height;
            }else{
                player.y+=moveSpeed;
            }
        }
        DisplayGame();
    });
    
    });
    

}

export default ArrowsModule;

*/