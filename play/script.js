
import GameModule from './modules/game_module.js';
import ArrowsModule from './modules/arrows_module.js';

document.addEventListener('DOMContentLoaded',function(){
    
    //Setting up Arrows which move the Player
    let game = new GameModule();
    let arrowMod = new ArrowsModule();
    
    arrowMod.loadEventListeners();
    game.DisplayGame();
    

});