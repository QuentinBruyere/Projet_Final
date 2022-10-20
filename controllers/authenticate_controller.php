<?php

require "./managers/user_manager.php";

class AuthenticateController {
    
    public function displayAuthenticate(array $post) {
        
        $path = "/authenticate";
        
        require "./templates/layout.phtml";
        
    }
    
    public function checkSignUpFields() {
        
        session_start();
        
        //Check if fields are empty or wrong. If yes, ask for username and password again
        //Did a self made "required" process
        if(isset($_POST["signUpUsername"]) && $_POST["signUpUsername"] !== ''){
            if(isset($_POST["signUpPassword"]) && $_POST["signUpPassword"] !== ''){
                if(isset($_POST["signUpEmail"]) && $_POST["signUpEmail"] !== ''){
                    
                    $userManager = new UserManager();
                    $dbUser = $userManager->getUserByUsername();
                    
                    if(isset($dbUser["username"])){
                        //Username already exist
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                        exit;
                    }else{
                        //User successfully created
                        $userManager->createNewUser();
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
                        exit;
                    }
                    
                }else{
                    //email missing
                    $_SESSION["signUpUsername"] = true;
                    $_SESSION["signUpPassword"] = true;
                    $_SESSION["signUpEmail"] = false;
                    $_SESSION["signUpFormComplete"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }
            }else{
                if(isset($_POST["signUpEmail"]) && $_POST["signUpEmail"] !== ''){
                    //password missing
                    $_SESSION["signUpUsername"] = true;
                    $_SESSION["signUpPassword"] = false;
                    $_SESSION["signUpEmail"] = true;
                    $_SESSION["signUpFormComplete"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }else{
                    //email and password missing
                    $_SESSION["signUpUsername"] = true;
                    $_SESSION["signUpPassword"] = false;
                    $_SESSION["signUpEmail"] = false;
                    $_SESSION["signUpFormComplete"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }
            }
        }else if(isset($_POST["signUpPassword"]) && $_POST["signUpPassword"] !== ''){
            if(isset($_POST["signUpEmail"]) && $_POST["signUpEmail"] !== ''){
                //username missing
                $_SESSION["signUpUsername"] = false;
                $_SESSION["signUpPassword"] = true;
                $_SESSION["signUpEmail"] = true;
                $_SESSION["signUpFormComplete"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }else{
                //username and email missing
                $_SESSION["signUpUsername"] = false;
                $_SESSION["signUpPassword"] = true;
                $_SESSION["signUpEmail"] = false;
                $_SESSION["signUpFormComplete"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }
        }else if(isset($_POST["signUpEmail"]) && $_POST["signUpEmail"] !== ''){
            if(isset($_POST["signUpUsername"]) && $_POST["signUpUsername"] !== ''){
                //password missing
                $_SESSION["signUpUsername"] = true;
                $_SESSION["signUpPassword"] = false;
                $_SESSION["signUpEmail"] = true;
                $_SESSION["signUpFormComplete"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }else{
                if(isset($_POST["signUpPassword"]) && $_POST["signUpPassword"] !== ''){
                    //username missing
                    $_SESSION["signUpUsername"] = false;
                    $_SESSION["signUpPassword"] = true;
                    $_SESSION["signUpEmail"] = true;
                    $_SESSION["signUpFormComplete"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }else{
                    //username and password missing
                    $_SESSION["signUpUsername"] = false;
                    $_SESSION["signUpPassword"] = false;
                    $_SESSION["signUpEmail"] = true;
                    $_SESSION["signUpFormComplete"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }
            }
        }else if(isset($_POST["signUpUsername"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpEmail"])){
            if($_POST["signUpUsername"] === '' && $_POST["signUpPassword"] === '' && $_POST["signUpEmail"] === ''){
                //all fields are empty
                $_SESSION["signUpUsername"] = false;
                $_SESSION["signUpPassword"] = false;
                $_SESSION["signUpEmail"] = false;
                $_SESSION["signUpFormComplete"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }
        }else{
            header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
            exit;
        }
        
    }
    
    public function checkSignInFields() {
        
        session_start();
        
         //Check if fields are empty and if yes, ask for username and password again
        if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){
                
                //Check if the User exist in the DB
                $userManager = new UserManager();
                $user = $userManager->getUserByUsername();
                
                //If we get an empty array, the User doesn't exist
                if(!empty($user)){
                    if(password_verify($_POST["password"], $user["password"])){
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["mail"] = $user["mail"];
                        $_SESSION["connected"] = true;
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
                        exit;
                    }else{
                        //Incorrect password
                        $_SESSION["username"] = $_POST["username"];
                        $_SESSION["password"] = $_POST["password"];
                        $_SESSION["connected"] = false;
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                        exit;
                    }
                //To increase security, I don't tell the user if the User exist in DB
                }else{
                    //Username doesn't exist
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["connected"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }
                
            }else{
                //password missing
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = false;
                $_SESSION["connected"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            //username missing
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["username"] = false;
            $_SESSION["connected"] = false;
            
            header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
            exit;
        }else if(isset($_POST["username"]) && isset($_POST["password"])){
            if($_POST["username"] === '' && $_POST["password"] === ''){
                //username and password missing
                $_SESSION["username"] = false;
                $_SESSION["password"] = false;
                $_SESSION["connected"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }
        }else{
            header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
            exit;
        }
    }
}

?>