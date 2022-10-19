<?php

class AuthenticateController {
    
    public function displayAuthenticate(array $post) {
        
        $path = "/authenticate";
        
        require "./templates/layout.phtml";
        
    }
    
    public function checkSignUpFields() {
        
        //Check if fields are empty or wrong. If yes, ask for username and password again
        //Did a self made "required" process
        if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){
                if(isset($_POST["email"]) && $_POST["email"] !== ''){
                    
                    $userManager = new UserManager();
                    $dbUser = $userManager->getUserByUsername();
                    
                    if(isset($dbUser["username"])){
                        if($_POST["username"] === $dbUser["username"]){
                            echo "ce Username existe déjà";
                            require "./templates/signupForm_template.phtml";
                        }
                    }else{
                        echo "Félicitations, votre compte vient d'être créé ! ";
                        $userManager->createNewUser();
                    }
                    
                }else{
                    //email missing
                    require "./templates/signupForm_template.phtml";
                }
            }else{
                if(isset($_POST["email"]) && $_POST["email"] !== ''){
                    //password missing
                    require "./templates/signupForm_template.phtml";
                }else{
                    //email and password missing
                    require "./templates/signupForm_template.phtml";
                }
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            if(isset($_POST["email"]) && $_POST["email"] !== ''){
                //username missing
                require "./templates/signupForm_template.phtml";
            }else{
                //username and email missing
                require "./templates/signupForm_template.phtml";
            }
        }else if(isset($_POST["email"]) && $_POST["email"] !== ''){
            if(isset($_POST["username"]) && $_POST["username"] !== ''){
                //password missing
                require "./templates/signupForm_template.phtml";
            }else{
                if(isset($_POST["password"]) && $_POST["password"] !== ''){
                    //username missing
                    require "./templates/signupForm_template.phtml";
                }else{
                    //username and password missing
                    require "./templates/signupForm_template.phtml";
                }
            }
        }else if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){
            if($_POST["username"] === '' && $_POST["password"] === '' && $_POST["email"] === ''){
                //all fields are empty
                require "./templates/signupForm_template.phtml";
            }
        }else{
            require "./templates/signupForm_template.phtml";
        }
        
    }
    
    public function checkSignInFields() {
        
         //Check if fields are empty and if yes, ask for username and password again
        if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){
                
                //Check if the User exist in the DB
                $userManager = new UserManager();
                $user = $userManager->getUserByUsername();
                
                //If we get an empty array, the User doesn't exist
                if(!empty($user)){
                    if($_POST["password"] === $user["password"]){
                        //if the user exist and the password is correct, sign in it and redirect at the homepage
                        
                        session_start();
                        
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["mail"] = $user["mail"];
                        $_SESSION["connected"] = true;
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
                        exit;
                    }else{
                        
                        //Incorrect password
                        
                        session_start();
                        
                        $_SESSION["username"] = $_POST["username"];
                        $_SESSION["password"] = $_POST["password"];
                        $_SESSION["connected"] = false;
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                        exit;
                    }
                //To increase security, I don't tell the user if the User exist in DB
                }else{
                    
                    //Username doesn't exist
                    
                    session_start();
                    
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["connected"] = false;
                    
                    header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                    exit;
                }
                
            }else{
                
                //password missing
                
                session_start();
                
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = false;
                $_SESSION["connected"] = false;
                
                header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
                exit;
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            
            //username missing
            
            session_start();
            
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["username"] = false;
            $_SESSION["connected"] = false;
            
            header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/authenticate');
            exit;
        }else if(isset($_POST["username"]) && isset($_POST["password"])){
            if($_POST["username"] === '' && $_POST["password"] === ''){
                
                //username and password missing
                
                session_start();
                
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
        
        
        
        
        
        
        
        
        // ANCIEN CHECK SIGNINFIELDS
        
        //Check if fields are empty and if yes, ask for username and password again
        /*if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){*/
                
                //On appelle le manager pour savoir si le user existe par son Username
                /*$userManager = new UserManager();
                $user = $userManager->getUserByUsername();*/
                
                //Si SQL nous renvoi un tableau vide, aucun user n'est associé à ce Username
                /*if(!empty($user)){
                    if($_POST["password"] === $user["password"]){*/
                        //Si le user existe dans la DB et que le Password fourni dans le formulaire correspond à celui dans la DB
                        //Le user est alors connecté
                        
                        /*$_SESSION["connected"] = true;
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["mail"] = $user["mail"];
                        
                        header('Location: https://quentinbruyere.sites.3wa.io/Soutenance/Projet_Final/');
                        exit;
                    }else{
                        echo "Your Username or Password is incorrect, please try again (password)";
                        $_SESSION["connected"] = false;
                        require "./templates/signin_template.phtml";
                    }*/
                /*Pour établir un niveau de sécurité en plus je n'indique pas si le user existe ou non dans la DB
                Cela peut-être flou pour l'utilisateur (ne sait plus si il a créé un compte) mais cela empêche aussi
                de vérifier avec n'importe quelle username si quelqu'un à créé un compte sur ce site*/
                /*}else{
                    echo "Your Username or Password is incorrect, please try again (username don't exist)";
                    $_SESSION["connected"] = false;
                    require "./templates/signin_template.phtml";
                }
                
            }else{
                echo "password manquant";
                $_SESSION["connected"] = false;
                require "./templates/signin_template.phtml";
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            echo "username manquant";
            $_SESSION["connected"] = false;
            require "./templates/signin_template.phtml";
        }else if(isset($_POST["username"]) && isset($_POST["password"])){
            if($_POST["username"] === '' && $_POST["password"] === ''){
                echo "username et password manquants";
                $_SESSION["connected"] = false;
                require "./templates/signin_template.phtml";
            }
        }else{
            require "./templates/signin_template.phtml";
        }*/
        
    }
    
}

?>