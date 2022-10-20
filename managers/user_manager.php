<?php

require "abstract_manager.php";

class UserManager extends AbstractManager {
    
    public function getUserByUsername() :array{
        
        //Check if the user exist in the DB
        //Getting the "content" datas from the form, and then send it to the DataBase
        $query = $this->db->prepare('SELECT * FROM players WHERE players.username = :username');
        if(isset($_POST["signUpUsername"])){
            $parameters = [
                ':username' => $_POST["signUpUsername"]
            ];
        }else{
            $parameters = [
                ':username' => $_POST["username"]
            ];
        }
        $query->execute($parameters);
        $dbUser = $query->fetchAll(PDO::FETCH_ASSOC);
        
        if(!empty($dbUser)){
            $dbUser = $dbUser[0];
        }
        
        return $dbUser;
    }
    
    public function createNewUser() :string {
        
        $query = $this->db->prepare('INSERT INTO players (username, password, mail) VALUES (:username, :password, :email)');
        $parameters = [
            ':username' => $_POST["signUpUsername"],
            ':password' => password_hash($_POST["signUpPassword"], PASSWORD_DEFAULT),
            ':email' => $_POST["signUpEmail"]
        ];
        $query->execute($parameters);

        // recuperer l' id de celui créé
        $lastUserId = $this->db->lastInsertId();
        
        //var_dump($lastUserId);
        
        // le renvoyer
        return $lastUserId;
    }
    
    public function updateAccount() {
        
        $query = $this->db->prepare('
            UPDATE players
            SET username = :username, password = :password
            WHERE mail = :email
        ');
        $parameters = [
            ':username' => $_POST["accountUsername"],
            ':password' => password_hash($_POST["accountPassword"], PASSWORD_DEFAULT),
            ':email' => $_SESSION["mail"]
        ];
        $query->execute($parameters);

        // recuperer l' id de celui créé
        $lastUserId = $this->db->lastInsertId();
        
        // le renvoyer
        return $lastUserId;
        
    }
    
    public function deleteAccount() {
        
        $query = $this->db->prepare('
            DELETE FROM players
            WHERE mail = :email
        ');
        $parameters = [
            ':email' => $_SESSION["mail"]
        ];
        $query->execute($parameters);

        // recuperer l' id de celui créé
        $lastUserId = $this->db->lastInsertId();
        
        // le renvoyer
        return $lastUserId;
        
    }
    
    /*
    function getPlayerById(int $id) :Player
    {
        $query = $this->db->prepare('SELECT * FROM players WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $player_data = $query->fetch();
        
        return new Player($player_data["id"], $player_data["username"], $player_data["password"], $player_data["healthpoints"], $player_data["experience"]);
        
    }
    */
    
}

?>