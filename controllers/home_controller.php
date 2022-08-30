<?php

require "./managers/home_manager.php";

class HomeController {
    
    public function displayHome(array $post) {
        
        $path = "/home";
        
        require "./templates/layout.phtml";
        
    }
    
}

?>