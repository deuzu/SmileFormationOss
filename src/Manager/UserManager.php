<?php
namespace SmileOSS\Lab\OOP\Manager;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class UserManager
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager->getConnection();
    }
  
    /**
     * @param array $user
     * 
     * @return bool
     */
    public function create(array $user)
    {
        $convertedPassword = sha1($user['password']);

        $sql = "INSERT INTO users (login,role,firstName,lastName,email,password,phone)
                VALUES (:login,:role,:firstName,:lastName,:email,:password,:phone)";

        $stmt = $this->databaseManager->prepare($sql);

        $stmt->bindValue(':login', $user['login'], PDO::PARAM_STR);
        $stmt->bindValue(':role', $user['role'], PDO::PARAM_STR);
        $stmt->bindValue(':firstName', $user['firstName'], PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $user['lastName'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $convertedPassword, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $user['phone'], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function update($user) 
    {
        $sql = "UPDATE users 
                SET 
                    role      = :role, 
                    firstName = :firstName, 
                    lastName  = :lastName,  
                    email     = :email,  
                    phone     = :phone
                WHERE ID = :id ";

        $stmt = $this->databaseManager->prepare($sql);

        $stmt->bindValue(':role', $user['role'], PDO::PARAM_STR);
        $stmt->bindValue(':firstName', $user['firstName'], PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $user['lastName'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':phone', $user['phone'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $user['ID']);

        return $stmt->execute();
    }

    public function delete($user)
    {
        $sql = "DELETE FROM users
                WHERE ID = :id";

        $stmt = $this->databaseManager->prepare($sql);

        $stmt->bindValue(':id', $user['ID']);

        return $stmt->execute();
    }
}
