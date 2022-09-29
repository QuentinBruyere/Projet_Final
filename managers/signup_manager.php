<?php

/*require "abstract_manager.php";

class UserManager extends AbstractManager {
    
    function createUser() :string{
    
        //Getting the DataBase
        $db = new PDO(
        'mysql:host=db.3wa.io;port=3306;dbname=quentinbruyere_Game_Test',
        'quentinbruyere',
        'fde1ec0644a19117c0dfa9431a58c26b'
        );
        
        //Getting the "content" datas from the form, and then send it to the DataBase
        $query = $db->prepare('INSERT INTO users (playerX, playerY) VALUES (:playerX, :playerY)');
        $parameters = [
            'playerX' => $_POST["playerX"],
            'playerY' => $_POST["playerY"]
        ];
        $query->execute($parameters);
        $save = $query->fetch();
        
        return $save;
    }
    
}*/



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