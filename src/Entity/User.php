<?php

namespace SmileOSS\Lab\OOP\Entity;

class User
{
    private $login;

    private $password;

    private $role;
    
    private $firstName;

    private $lastName;
    
    private $email;

    private $phone;

    // getters
    public function getLogin()
    {
        return $this->login;
    }
    
    public function getPassword()
    {
        return $this->password;        
    }
    
    public function getRole()
    {
        return $this->role;        
    }
    
    public function getFirstName()
    {
        return $this->firstName;        
    }
    
    public function getLastName()
    {
        return $this->lastName;        
    }
    
    public function getEmail()
    {
        return $this->email;        
    }
    
    public function getPhone()
    {
        return $this->phone;        
    }
    
    // setters
    
    public function setLogin($login)
    {
        $this->login = $login;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
