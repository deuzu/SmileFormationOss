<?php


/**
 * Make an update of the formation ine the database
 * @param int $date
 * @param text $label
 * @param text $teacher
 */
function updatePlanning($date, $label, $teacher){
    
    $bdh = new PDO('mysql:host=localhost; dbname=FormationOSS','root','root');
    
    $result= $bdh -> query("UPDATE planning SET label='.$label.', teach='.$teacher.' WHERE date='.$date.'");    
}


/**
 * Delete a formation in the database
 * @param int $date
 */
function deletePlanning($date){
    
    $bdh = new PDO('mysql:host=localhost; dbname=FormationOSS','root','root');
    
    $result= $bdh -> query("DELETE FROM planning WHERE date='.$date.'");
}


/**
 * Créer un nouveau planning
 * @param date $date
 * @param string $cours
 * @param string $nameTeacher
 */
function createPlanning($date, $cours, $nameTeacher) {
    echo "debut createPlanning DB ";
    try {
        $dsn = 'mysql:host=localhost;dbname=FormationOSS';
        $user = 'root';
        $pass = 'root';
        $dbh = new PDO($dsn, $user, $pass);
        $query = $dbh->prepare(""
            . " INSERT INTO PLANNING "
            . " VALUES ( " . $date . ", " . $cours . ", " . $nameTeacher . ");");
        echo $query;

        //$query->execute();


    }


    catch(Exception $e) {
        //excep
        echo "base pas encore présente ";
    }

}


