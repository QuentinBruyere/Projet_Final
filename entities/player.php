<?php

class Player extends User
{
    
    private int $healthpoints;
    
    private int $attackpoints;

    
    function __construct(int $userId, string $username, string $password, string $email, string $healthpoints, string $attackpoints) 
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->healthpoints = $healthpoints;
        $this->experience = $attackpoints;
    }
    
    public function getHealthpoints() :string
    {
        return $this->healthpoints;
    }
    
    public function sethealthpoints(string $healthpoints) 
    {
        $this->healthpoints = $healthpoints;
    }
    
    public function getAttackPoints() :string
    {
        return $this->attackpoints;
    }
    
    public function setAttackPoints(string $attackpoints) 
    {
        $this->attackpoints = $attackpoints;
    }
}

?>