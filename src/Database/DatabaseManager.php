<?php
namespace SmileOSS\Lab\OOP\Database;

class DatabaseManager
{
    /**
     * @return \PDO
     */
    public function getConnection()
    {
        $user = 'root';
        $pass = 'root';
        $bdd = 'FormationOSS';

        return new \PDO('mysql:host=localhost;dbname='.$bdd, $user, $pass);
    }
}
