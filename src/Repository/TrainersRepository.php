<?php

namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Database\DatabaseManager;

class PlanningRepository
{
    public function getAllTrainers()
    {
        $dbh = getDatabaseConnection();

        $results = $dbh->query('SELECT * FROM trainers');

        return $results->fetchAll();
    }

    public function getTrainerById($id)
    {
        $dbh = getDatabaseConnection();

        $results = $dbh->query('SELECT * FROM trainers WHERE ID='.intval($id));

        return $results->fetch();
    }
}
