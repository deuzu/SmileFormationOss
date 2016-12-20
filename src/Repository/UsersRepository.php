<?php
namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class UserRepository
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
     * 
     * @param string $login
     * @param string $password
     *  
     * @return array
     */
    public function userIsOk($login, $password)
    {
        $statement = $this->databaseManager->prepare('SELECT login, password FROM users WHERE login=:login and password=:password');
        $statement->bindParam(':login', $login);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $result = $statement->fetchAll();

        return count($result) > 0;
    }

    /**
     * @param string $login
     *
     * @return string
     */
    public function getRoleByLogin($login)
    {
        $statement = $this->databaseManager->prepare('SELECT role FROM users where login = :login');
        $statement->bindParam(':login', $login);
        $statement->execute();
        $data = $statement->fetch();

        return $data['role'];
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->databaseManager->query("SELECT * FROM planning")->fetchAll();
    }

    /**
     * 
     * @param int $id
     * 
     * @return array
     */
    public function find($id)
    {
        $statement = $this->databaseManager->prepare("SELECT * FROM users WHERE ID=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch();
    }
}