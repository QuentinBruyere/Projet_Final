<?php

require "./managers/codex_manager.php";

class CodexController {
    
    public function displayCodex(array $post) {
        
        $path = $post["path"];
        
        require "./templates/layout.phtml";
        
    }
    
}

?>