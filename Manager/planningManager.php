<?php

    require_once './services/sqlDriverService.php';

    /**
     * Delete a formation in the database
     * @param int $date
     */
    function deletePlanning($id){

        $bdh = new PDO('mysql:host=localhost; dbname=FormationOSS','root','root');

        $result= $bdh -> query("DELETE FROM planning WHERE ID='.$id.'");

    }


    /**
    * Make an update of the formation ine the database
    * @param int $date
    * @param text $label
    * @param text $teacher
    */
    function updatePlanning($id, $date, $label, $teacher){

    $bdh = new PDO('mysql:host=localhost; dbname=FormationOSS','root','root');

    $result= $bdh->query("UPDATE planning SET Date='.$date.', label='.$label.', teach='.$teacher.' WHERE ID='.$id.'");    
    }


    /**
    * Créer un nouveau planning
    * @param date $date
    * @param string $cours
    * @param string $teacher
    */
    function createPlanning($date, $cours, $teacher) {

        try {
            $dbh = getDatabaseConnection();

            $stmt = $dbh->prepare(" INSERT INTO planning (date, label, teach) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $date);
            $stmt->bindParam(2, $cours);
            $stmt->bindParam(3, $teacher);

            $stmt->execute();
        }

        catch(Exception $e) {
            throw  new Exception("Error create in base ");

        }
    }
