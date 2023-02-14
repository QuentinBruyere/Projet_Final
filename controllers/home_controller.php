<?php

class HomeController {
    
    public function displayHome(array $post) {
        
        $path = "/home";
        
        require "./templates/home.phtml";
        
    }
    
}

?>