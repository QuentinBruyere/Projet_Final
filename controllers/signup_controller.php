<?php

//require "./managers/signup_manager.php";

class SignUpController {
    
    public function displaySignUp(array $post) {
        
        $path = "/signup";
        
        require "./templates/layout.phtml";
        
    }
    
    public function checkSignUpFields() {
        
        //Check if fields are empty and if yes, ask for username and password again
        //L'attribut required ne suffit pas ? Est-ce que le faire soit même c'est le seul moyen de pouvoir
        //configurer le style d'un form pas bien rempli ? 
        if(isset($_POST["username"]) && $_POST["username"] !== ''){
            if(isset($_POST["password"]) && $_POST["password"] !== ''){
                if(isset($_POST["email"]) && $_POST["email"] !== ''){
                    echo "Tout les champs sont remplis | ";
                    
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
                    echo "email manquant";
                    require "./templates/signupForm_template.phtml";
                }
            }else{
                if(isset($_POST["email"]) && $_POST["email"] !== ''){
                    echo "password manquant";
                    require "./templates/signupForm_template.phtml";
                }else{
                    echo "password et email manquants";
                    require "./templates/signupForm_template.phtml";
                }
            }
        }else if(isset($_POST["password"]) && $_POST["password"] !== ''){
            if(isset($_POST["email"]) && $_POST["email"] !== ''){
                echo "username manquant";
                require "./templates/signupForm_template.phtml";
            }else{
                echo "username et email manquants";
                require "./templates/signupForm_template.phtml";
            }
        }else if(isset($_POST["email"]) && $_POST["email"] !== ''){
            if(isset($_POST["username"]) && $_POST["username"] !== ''){
                echo "password manquant";
                require "./templates/signupForm_template.phtml";
            }else{
                if(isset($_POST["password"]) && $_POST["password"] !== ''){
                    echo "username manquant";
                    require "./templates/signupForm_template.phtml";
                }else{
                    echo "username et password manquants";
                    require "./templates/signupForm_template.phtml";
                }
            }
        }else if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){
            if($_POST["username"] === '' && $_POST["password"] === '' && $_POST["email"] === ''){
                echo "aucuns champs remplis";
                require "./templates/signupForm_template.phtml";
            }
        }else{
            require "./templates/signupForm_template.phtml";
        }
        
    }
    
}

?>