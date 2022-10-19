//THE GAME SCRIPT

//Import the modules
import GameModule from './modules/game_module.js';
import ArrowsModule from './modules/arrows_module.js';

//Load the modules when the DOM once the page is loaded
document.addEventListener('DOMContentLoaded',function(){
    
    //Setting up Arrows which move the Player
    let game = new GameModule();
    let arrowMod = new ArrowsModule();
    
    arrowMod.loadEventListeners();
    game.DisplayGame();

});