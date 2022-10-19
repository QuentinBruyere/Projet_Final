<?php

require "abstract_manager.php";

class GameManager extends AbstractManager {
    
    function updateGame() :string{
    
        //Getting the datas from the Saveform, and send it to the DB
        $query = $this->db->prepare('INSERT INTO Saves (playerX, playerY) VALUES (:playerX, :playerY)');
        $parameters = [
            'playerX' => $_POST["playerX"],
            'playerY' => $_POST["playerY"]
        ];
        $query->execute($parameters);
        $save = $query->fetch();
        
        return $save;
    }
    
}

?>