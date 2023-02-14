<?php

require "abstract_manager.php";

class UserManager extends AbstractManager {
    
    public function getArgonauts() :array{
        
        //Récupérer les "name" de l'ensemble de la base de donnée
        $query = $this->db->prepare('SELECT name FROM users');
        $query->execute();
        $dbUser = $query->fetchAll(PDO::FETCH_ASSOC);
        
        if(empty($dbUser)){
            echo "Aucun Argonaut n'est encore engagé !";
        }
        
        return $dbUser;

    }
    
    public function createNewArgonaut(string $name) :string {
        
        // insérer dans la DB la valeur du champ "name" du formulaire
        $query = $this->db->prepare('INSERT INTO users (name) VALUES (:name)');
        $parameters = [
            ':name' => $name
        ];
        $query->execute($parameters);

        $lastUserId = $this->db->lastInsertId();
        
        return $lastUserId;
    }
}

?>