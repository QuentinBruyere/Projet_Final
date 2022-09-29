<?php
/*
require "abstract_manager.php";

class UserManager extends AbstractManager {
    
    function checkUser() :string{
        
        //JE VEUX CHERCHER DANS MA DB LE USER SI IL EXISTE
        
        //Getting the "content" datas from the form, and then send it to the DataBase
        $query = $this->db->prepare('SELECT * FROM players WHERE players.username = :username');
        $parameters = [
            ':username' => $_POST["username"]
        ];
        $query->execute($parameters);
        $dbPlayers = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $dbPlayers;
    }
    
}

*/

/*
function categoriesList() :array{
    
    $db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=quentinbruyere_distorsion-realProject',
    'quentinbruyere',
    'fde1ec0644a19117c0dfa9431a58c26b'
    );
    
    $query = $db->prepare('SELECT id, name FROM categories');
    $query->execute();
    $categoriesList = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $categoriesList;
    
}
*/
?>