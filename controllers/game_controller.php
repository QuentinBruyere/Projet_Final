<?php

require "./managers/game_manager.php";

class GameController {
    
    public function displayGame(array $post) {
        
        $path = $post["path"];
        
        require "./templates/layout.phtml";
        
    }
    
    public function save() {
        
        $gameManager = new GameManager();
        
        $gameManager->updateGame($_POST["playerX"], $_POST["playerY"]);
        
        return json_encode("game saved");
        
    }
    
}

?>