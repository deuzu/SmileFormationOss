<?php
namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class TrainerRepository
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
     * @return array
     */
    public function findAll()
    {
        return $this->databaseManager->query("SELECT * FROM trainers")->fetchAll();
    }
    
    /**
     * @param int $id
     *
     * @return array
     */
    public function find($id)
    {
        return $this->databaseManager->query("SELECT * FROM trainers WHERE ID=$id")->fetchAll();
    }
}
