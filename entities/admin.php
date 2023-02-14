<?php

class Admin extends User
{
    private bool $adminRights;
    
    function __construct(int $userId, string $username, string $password, string $email, bool $adminRights)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->adminRights = $adminRights;
    }
    
    public function getAdminRights() :string
    {
        return $this->adminRights;
    }
    
    public function setActivatedCheatcodes(string $adminRights) 
    {
        $this->adminRights = $adminRights;
    }
}

?>