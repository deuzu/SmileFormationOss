<?php

namespace SmileOSS\Lab\OOP\Manager;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class PlanningManager
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
    * @param string $date
    * @param string $label
    * @param string $teacher
    */
    public function create($date, $label, $teacher)
    {
        $statement = $this->databaseManager->prepare("INSERT INTO planning (date, label, teach) VALUES (?, ?, ?)");
        $statement->bindParam(1, $date);
        $statement->bindParam(2, $label);
        $statement->bindParam(3, $teacher);

        $statement->execute();
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        $databaseManager->query("DELETE FROM planning WHERE ID='.$id.'");
    }

    /**
    * @param int    $id
    * @param string $date
    * @param string $label
    * @param string $teacher
    */
    function update($id, $date, $label, $teacher)
    {
        $this->databaseManager->query("UPDATE planning SET Date='.$date.', label='.$label.', teach='.$teacher.' WHERE ID='.$id.'");
    }
}
