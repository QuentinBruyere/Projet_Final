<?php

class ContactController {
    
    public function displayContact(array $post) {
        
        $path = $post["path"];
        
        require "./templates/layout.phtml";
        
    }
    
    public function sendEmail() {
        
        /*I know that this function is the simpliest way to do it and that is quite
        vulnerable. I searched for some solutions and found PHPMailer which could do the job
        but I'm not shure that I can install it in this closed environment.
        For the amount of search and work for a tiny feature, i decided to give it up*/
        
        if($_POST["message"]) {
            
            mail("quentin.bruyere@3wa.io", $_POST["subject"], $_POST["message"]);
            
        }
        
        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
        exit;
        
    }
    
}

?>