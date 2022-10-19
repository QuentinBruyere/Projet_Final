<?php

class CodexController {
    
    public function displayCodex(array $post) {
        
        $path = $post["path"];
        
        require "./templates/layout.phtml";
        
    }
    
}

?>