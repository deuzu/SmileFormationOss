<?php
namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class TrainersRepository
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
    public function getAllTrainers()
    {
        return $this->databaseManager->query("SELECT * FROM trainers")->fetchAll();
    }
    
    /**
     * @param int $id
     *
     * @return array
     */
    public function getTrainerById($id)
    {
        return $this->databaseManager->prepare("SELECT * FROM trainers WHERE date='.$id.'");
    }
}
