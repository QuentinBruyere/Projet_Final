<?php

abstract class AbstractManager {
    
    protected PDO $db;
    
    public function __construct() 
    {
    
        //Getting the DataBase
        $this->db = new PDO(
        'mysql:host=db.3wa.io;port=3306;dbname=quentinbruyere_WorldWasteWar',
        'quentinbruyere',
        'fde1ec0644a19117c0dfa9431a58c26b'
        );
        
    }
    
}

?>