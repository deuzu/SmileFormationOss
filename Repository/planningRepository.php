<?php
    
    /**
     * Return the planning of the date 
     * @param int $date
     * @return Date, label and teacher
     */
    function getPlanningById($id){
        
        $bdh = getDatabaseConnection(); 
        
        $results = $bdh -> query("SELECT * FROM planning WHERE date='.$id.'");
        
        return $results;
    }
    
    
    /**
     * Return all planning
     * @return date, label and teacher
     */
    function getAllPlanning(){
        
        $bdh=getDatabaseConnection();        
        
        $results = $bdh -> query("SELECT * FROM planning");
        
        return $results->fetchAll();
    }