<?php

namespace SmileOSS\Lab\OOP\Manager; 

class TrainerManager
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
     * @param array $trainer
     */
    public function update(array $trainer)
    {
        list($id, $firstName, $lastName, $email, $phone) = $trainer;
        
        $this->databaseManager->query("UPDATE planning SET firstName='.$firstName.', lastName='.$lastName.', email='.$email.', phone='.$phone.' WHERE ID='.$id.'");
    }

    /**
     * @param type $trainerId
     */
    public function delete($trainerId)
    {
        $sql = "DELETE FROM trainers WHERE ID = $trainerId";

        $stmt = $this->databaseManager->prepare($sql);

        return $stmt->execute();
    }

    /**
     * @param array $trainer
     */
    public function create(array $trainer) 
    {
        list($id, $firstName, $lastName, $email, $phone) = $trainer;

        $stmt = $this->databaseManager->prepare(" INSERT INTO trainers (firstName, lastName, email, phone) VALUES (:firstName, :lastName, :email, :phone)");
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();
    }
}

