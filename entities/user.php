<?php

abstract class User
{
    protected int $userId;
    
    protected string $username;
    
    protected string $password;
    
    protected string $email;
    
    public function getUserId() :string
    {
        return $this->userId;
    }
    
    public function setUserId(string $userId) 
    {
        $this->userId = $userId;
    }
    
    public function getUsername() :string
    {
        return $this->username;
    }
    
    public function setUsername(string $username) 
    {
        $this->username = $username;
    }
    
    public function getPassword() :string
    {
        return $this->password;
    }
    
    public function setPassword(string $password) 
    {
        $this->password = $password;
    }
    
    public function getEmail() :string
    {
        return $this->email;
    }
    
    public function setEmail(string $email) 
    {
        $this->email = $email;
    }
}

?>