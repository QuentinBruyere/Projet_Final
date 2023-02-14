<?php

class AboutController {
    
    public function displayAbout(array $post) {
        
        $path = "/about";
        
        require "./templates/layout.phtml";
        
    }
}
?>