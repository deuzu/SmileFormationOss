<?php

require_once './manager/planningManager.php';
require_once './form/createPlanningForm.php';
require_once './form/editPlanningForm.php';
require_once './repository/planningRepository.php';

class PlanningController
{
    public function renderList()
    {
        $outputData = getAllPlanning();

        include "./views/showPlanningView.php";
    }

    public function renderEdit(){

        if(!isset($_GET['id'])){
            echo "error on planning id";
        }

        $planning = getPlaningById($_GET['ID']);

        if(isset($_POST['edit'])){

            $planning = array(
                'ID' => $_GET['id'],
                'Date' => $_POST['Date'],
                'Label' => $_POST['Label'],
                'Teacher' => $_POST['Teacher']
            );

            $error = checkEditPlanningForm($planning);

            if(!$error){

                updatePlanning($_GET["id"], $_POST["Date"], $_POST["Label"], $_POST["Teacher"]);
            }

            include './views/editPlanningView.php';

        }
    }

    public function renderCreate()
    {
        $messageInfo = "";
        try {
            if (isset($_POST['createPlanning'])) {
                if (validateCreateForm()) {

                    createPlanning($_POST["Date"], $_POST["Label"], $_POST["Teacher"]);

                    $messageInfo = "Planning créé";
                    //a confirmer
                    header("Location: ?action=listPlanning");
                }
            }
        }
        catch (Exception $e) {
            $messageInfo = "Exception " . $e->getMessage();
        }

        include('./views/createPlanningView.php');
    }
}
