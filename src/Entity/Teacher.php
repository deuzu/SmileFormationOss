<?php
namespace SmileOSS\Lab\OOP\Entity;

class Teacher
{    
    private $id; 
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    
    public function setId($id)
    {
        $this->id = $id;       
    }
    
    public function getId()
    {    
        return $this->id;      
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    public function getFirstName()      
    {  
        return $this->firstName;
    }
    
    public function setLastName($lastName)
    { 
        $this->lastName = $lastName;    
    }
    
    public function getLastName()
    { 
        return $this->lastName;     
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {    
        return $this->email;     
    }
       
    public function setPhone($phone)
    {
        $this->phone = $phone;   
    }

    public function getPhone()
    {    
        return $this->phone;
    }                   
}

    
    