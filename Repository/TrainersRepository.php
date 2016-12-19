<?php

require_once "services/sqlDriverService.php";

function getAllTrainers() {

    $dbh = getDatabaseConnection();

    $results = $dbh->query('SELECT * FROM trainers');

    return $results->fetchAll();
}

function getTrainerById($id) {

    $dbh = getDatabaseConnection();

    $results = $dbh->query('SELECT * FROM trainers WHERE ID='.intval($id));

    return $results->fetch();
}

