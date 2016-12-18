<?php

// deprecated Use PlanningController instead

require_once './repository/planningRepository.php';

    /**
     * retrieve the planning from table Planning
     */
    function renderPlanning(){

        $outputData=getAllPlanning();

        include "./views/showPlanningView.php";

    }

    /**
     * get user's role
     * @return string
     */
    function getRole(){
        $role="USER";
        if(isset($_SESSION['login'])){
           $role=getRoleByLogin($_SESSION['login']);
        }
        return $role;
    }




?>
