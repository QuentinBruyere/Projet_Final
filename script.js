
import GameModule from './modules/game_module.js';
import ArrowsModule from './modules/arrows_module.js';

document.addEventListener('DOMContentLoaded',function(){
    
    //Setting up Arrows which move the Player
    let game = new GameModule();
    let arrowMod = new ArrowsModule();
    
    arrowMod.loadEventListeners();
    game.DisplayGame();
    

});





















/*=============================    GAME TEST    ==============================*/
/*
document.addEventListener('DOMContentLoaded',function(){

/*-------   INITIALISATION   --------*/

//On récupère la div qui va contenir le jeu
//var gameArea = document.querySelector('.game');

//On crée un Canvas dans la div

//On séléctionne le Canvas puis on lui indique le contexte
/*let stageBackground = document.querySelector('.stageBackground');
let ctx = stageBackground.getContext('2d');


/*---------   VARIABLES   -----------*/

//On déclare les objets dont on aura besoin
/*let map = {
    x: 0,
    y: 0,
    width: 400,
    height: 400,
    color: "grey"
};

let player = {
    x: 200,
    y: 200,
    width: 20,
    height: 50,
    color: "red"
};

let moveSpeed = 20;


/*---------   FONCTIONS   -----------*/

/*function DisplayMap() {
    ctx.fillStyle = map.color;
    ctx.fillRect(map.x, map.y, map.width, map.height);
}

function DisplayPlayer() {
    ctx.fillStyle = player.color;
    ctx.fillRect(player.x - (player.width/2), player.y - player.height, player.width, player.height);
}

function DisplayGame() {
    //On clear la zone du jeu
    ctx.clearRect(map.x, map.y, map.width, map.height);
    
    //On réaffiche la map et le player
    DisplayMap();
    DisplayPlayer();
}

function MovePlayer(e) {
    switch(e.code){
            case "ArrowUp":
                if(player.y - player.height > map.y){
                    if(player.y - player.height - moveSpeed < map.y){
                        player.y = map.y + player.height;
                    }else{
                        player.y-=moveSpeed;    
                    }
                }
                DisplayGame();
                break;
            case "ArrowDown":
                if(player.y < map.height){
                    if(player.y + moveSpeed > map.height){
                        player.y = map.height;
                    }else{
                        player.y+=moveSpeed;
                    }
                }
                DisplayGame();
                break;
            case "ArrowLeft":
                if(player.x - (player.width/2) > map.x){
                    if(player.x - (player.width/2) - moveSpeed < map.x){
                        player.x = map.x + 1.5*player.width;
                    }
                    player.x-=moveSpeed;
                }    
                DisplayGame();
                break;
            case "ArrowRight":
                if(player.x + (player.width/2) < map.width){
                    if(player.x + (player.width/2) + moveSpeed > map.width){
                        player.x = map.width - 1.5*player.width;
                    }
                    player.x+=moveSpeed;
                }
                DisplayGame();
                break;
        }
    console.log(e.code);
    console.log("Player X : " + player.x);
    console.log("Player Y : " + player.y);
}

DisplayGame();


/*---------   LISTENERS   -----------*/

//On écoute les événements du clavier
//document.addEventListener("keydown", MovePlayer);

/*===========================    JOYSTICK TEST    ============================*/


/*-------   INITIALISATION   --------*/

/*let pad = document.querySelector(".pad");
let arrowLeft = document.querySelector(".arrowLeft");
let arrowUp = document.querySelector(".arrowUp");
let arrowRight = document.querySelector(".arrowRight");
let arrowBottom = document.querySelector(".arrowBottom");


/*---------   FONCTIONS   -----------*/
/*


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

document.addEventListener("mouseup", e => {
    arrowLeft.style.backgroundColor = arrowLeftSettings.backgroundColor;
    arrowUp.style.backgroundColor = arrowUpSettings.backgroundColor;
    arrowRight.style.backgroundColor = arrowRightSettings.backgroundColor;
    arrowBottom.style.backgroundColor = arrowBottomSettings.backgroundColor;
});

document.addEventListener("touchend", e => {
    arrowLeft.style.backgroundColor = arrowLeftSettings.backgroundColor;
    arrowUp.style.backgroundColor = arrowUpSettings.backgroundColor;
    arrowRight.style.backgroundColor = arrowRightSettings.backgroundColor;
    arrowBottom.style.backgroundColor = arrowBottomSettings.backgroundColor;
});


displayPad();
displayArrows();



fetch('').then(function(response) {
  if(response.ok) {
    response.blob().then(function(myBlob) {
      var objectURL = URL.createObjectURL(myBlob);
      myImage.src = objectURL;
    });
  } else {
    console.log('Mauvaise réponse du réseau');
  }
})
.catch(function(error) {
  console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
});



});
*/
