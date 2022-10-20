<?php

class GameManager extends AbstractManager {
    
    function updateGame() :string{
    
        //Getting the datas from the Saveform, and send it to the DB
        $query = $this->db->prepare('INSERT INTO saves (player_id, playerX, playerY) VALUES (:player_id, :playerX, :playerY)');
        $parameters = [
            'player_id' => $_SESSION["player_id"],
            'playerX' => $_POST["playerX"],
            'playerY' => $_POST["playerY"]
        ];
        $query->execute($parameters);
        $save = $query->fetch();
        
        return $save;
    }
    
}

?>