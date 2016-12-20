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
        $sth = $this->databaseManager->prepare('SELECT login, password FROM users WHERE login="' . $this->login . '" and password="' . $this->password . '"');

        return $sth->execute();
    }

    /**
     * 
     * @return array
     */
    public function getAllUsers()
    {
        $sth = $this->databaseManager->prepare('SELECT * FROM users');

        return $sth->execute();
    }

    /**
     * 
     * @param int $id
     * 
     * @return array
     */
    public function getUserById($id)
    {
        $sth = $this->databaseManager->prepare('SELECT * FROM users WHERE ID=' . intval($this->id));

        return $sth->execute();
    }

    /**
     * @param string $login
     *
     * @return string
     */
    public function getRoleByLogin($login)
    {

        $sth = $this->databaseManager->query("SELECT role FROM users where login = '$this->login'");
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->databaseManager->query("SELECT * FROM planning")->fetchAll();
    }
}
