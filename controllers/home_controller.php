<?php

require "./managers/home_manager.php";

class HomeController {
    
    public function displayHome(array $post) {
        
        $path = $post["path"];
        
        require "./templates/layout.phtml";
        
    }
    
}

?>