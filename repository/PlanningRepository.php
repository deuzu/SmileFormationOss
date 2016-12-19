<?php

namespace SmileOSS\Lab\OOP\repository;


class PlanningRepository
{
    /**
     * Return the planning of the date
     * @param int $date
     * @return Date, label and teacher
     */
    public function getPlanningById($id)
    {

        $bdh = getDatabaseConnection();

        $results = $bdh->query("SELECT * FROM planning WHERE date='.$id.'");

        return $results;
    }


    /**
     * Return all planning
     * @return date, label and teacher
     */
    public function getAllPlanning()
    {

        $bdh = getDatabaseConnection();

        $results = $bdh->query("SELECT * FROM planning");



        return $results->fetchAll();
    }
}