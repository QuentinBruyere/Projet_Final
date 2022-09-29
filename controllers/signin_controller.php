<?php

//require "./managers/user_manager.php"; 

class SignInController {
    
    public function checkSignInFields() {
        
        //Check if fields are empty and if yes, ask for username and password again
        if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){
                
                //On appelle le manager pour savoir si le user existe par son Username
                $userManager = new UserManager();
                $user = $userManager->getUserByUsername();
                
                //Si SQL nous renvoi un tableau vide, aucun user n'est associé à ce Username
                if(!empty($user)){
                    if($_POST["password"] === $user["password"]){
                        //Si le user existe dans la DB et que le Password fourni dans le formulaire correspond à celui dans la DB
                        //Le user est alors connecté
                        echo "You are connected";
                        echo "Bonjour " . $user["username"] . " !";
                    }else{
                        echo "Your Username or Password is incorrect, please try again (password)";
                        require "./templates/signin_template.phtml";
                    }
                /*Pour établir un niveau de sécurité en plus je n'indique pas si le user existe ou non dans la DB
                Cela peut-être flou pour l'utilisateur (ne sait plus si il a créé un compte) mais cela empêche aussi
                de vérifier avec n'importe quelle username si quelqu'un à créé un compte sur ce site*/
                }else{
                    echo "Your Username or Password is incorrect, please try again (username don't exist)";
                    require "./templates/signin_template.phtml";
                }
                
            }else{
                echo "password manquant";
                require "./templates/signin_template.phtml";
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            echo "username manquant";
            require "./templates/signin_template.phtml";
        }else if(isset($_POST["username"]) && isset($_POST["password"])){
            if($_POST["username"] === '' && $_POST["password"] === ''){
                echo "username et password manquants";
                require "./templates/signin_template.phtml";
            }
        }else{
            require "./templates/signin_template.phtml";
        }
        
    }
    
}

?>