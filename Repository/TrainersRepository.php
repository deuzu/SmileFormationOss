<?php
namespace SmileOSS\Lab\OOP\Repository;

use SmileOSS\Lab\OOP\Services\SqlDriver;

class TrainersRepository
{
    
    public function getAllTrainers()
    {
        
        $dbh = new SqlDriver();
        $dbh_con = $dbh->getDatabaseConnection();

        $results = $dbh_con->prepare("SELECT * FROM trainers");
        $results->execute();


        return $results->fetchAll();
    }

    public function getTrainerById($id)
    {

        $dbh = new SqlDriver();
        $dbh_con = $dbh->getDatabaseConnection();

        $results = $dbh_con->query('SELECT * FROM trainers WHERE ID='.intval($id));

        return $results->fetch();
    }
}
