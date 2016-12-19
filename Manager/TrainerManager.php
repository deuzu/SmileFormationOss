<?php
namespace SmileOSS\Lab\OOP\Manager;

use SmileOSS\Lab\OOP\Services\SqlDriver;

class TrainerManager
{
    public function updateTrainer($trainer)
    {
        $dbh = new SqlDriver();
        $dbh->getDatabaseConnection();

        $sql = "UPDATE trainers 
                SET 
                    firstName = :firstName, 
                    lastName = :lastName,  
                    email = :email,  
                    phone = :phone

                WHERE ID = :id ";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':firstName', $trainer['firstName'],PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $trainer['lastName'],PDO::PARAM_STR);
        $stmt->bindValue(':email', $trainer['email'],PDO::PARAM_STR);
        $stmt->bindValue(':phone', $trainer['phone'],PDO::PARAM_STR);
        $stmt->bindParam(':id', $trainer['ID']);

        return $stmt->execute();
    }

    public function deleteTrainer($trainerId)
    {

        $dbh = new SqlDriver();
        $dbh->getDatabaseConnection();

        $sql = "DELETE FROM trainers
                WHERE ID = $trainerId";

        $stmt = $dbh->prepare($sql);

        return $stmt->execute();

    }

    /**
    * Créer un nouveau formateur
    */
    function createTrainer($firstName, $lastName, $email, $phone)
    {

        try {
            $dbh = new SqlDriver();
            $dbh->getDatabaseConnection();

            $stmt = $dbh->prepare(" INSERT INTO trainers (firstName, lastName, email, phone) VALUES (:firstName, :lastName, :email, :phone)");
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);

            $stmt->execute();
        } catch(Exception $e) {
            throw  new Exception("Error create in base ");

        }
    }
}
