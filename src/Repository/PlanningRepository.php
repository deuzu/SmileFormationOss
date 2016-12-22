<?php

namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class PlanningRepository
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
     * @param int $id
     *
     * @return array
     */
    public function find($id)
    {
        $statement = $this->databaseManager->prepare("SELECT * FROM planning WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->databaseManager->query("SELECT * FROM planning")->fetchAll();
    }
}
