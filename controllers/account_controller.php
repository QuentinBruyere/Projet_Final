<?php

class AccountController {
    
    public function displayAccount(array $post) {
        
        $path = "/account";
        
        require "./templates/layout.phtml";
        
    }
    
    public function sessionDestroy() {
        
        session_start();
        
        $_SESSION = array();
        
        // S/O La Doc de PHP, set un nouveau cookie est une sécurité en plus j'imagine?!
        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        };
        
        // Finalement, on détruit la session.
        session_destroy();
        
        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
        exit;
        
    }
    
    public function updateAccount() {
        
        session_start();
        
        $userManager = new UserManager();
        $dbUser = $userManager->updateAccount();
        
        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/account');
        exit;
        
    }
    
    public function deleteAccount() {
        
        session_start();
        
        $userManager = new UserManager();
        $dbUser = $userManager->deleteAccount();
        
        $_SESSION = array();
        
        // S/O La Doc de PHP, set un nouveau cookie est une sécurité en plus j'imagine?!
        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        };
        
        // Finalement, on détruit la session.
        session_destroy();
        
        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
        exit;
        
    }
    
}

?>