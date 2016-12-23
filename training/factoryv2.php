<?php

namespace Smile;

class DatabaseFactory
{
    public function getMysqlConnection()
    {
        $user = 'root';
        $pass = 'root';
        $bdd = 'FormationOSS';

        return new \PDO('mysql:host=localhost;dbname='.$bdd, $user, $pass);
    }

    public function getPostgresConnection()
    {
        $user = 'root';
        $pass = 'root';
        $bdd = 'FormationOSS';

        return new \PDO('pgsql:host=localhost;dbname='.$bdd, $user, $pass);
    }
}

$databaseFactory = new DatabaseFactory();
$databaseConnection = $databaseFactory->getMysqlConnection();

var_dump($databaseConnection);
