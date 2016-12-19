<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Templating\TemplateEngine;
use SmileOSS\Lab\OOP\manager;

require_once './manager/PlanningManager.php';
require_once './form/createPlanningForm.php';
require_once './form/editPlanningForm.php';
//require_once './repository/PlanningRepository.php';

class PlanningController
{
    public function listAction()
    {
        $plannings = getAllPlanning();

        TemplateEngine::render(__DIR__.'/../views/planning/list.php', ['role' => 'ADMIN', 'plannings' => $plannings]);
    }

    public function editAction()
    {
        if (!isset($_GET['id'])) {
            echo "error on planning id";
        }

        $planning = getPlaningById($_GET['ID']);

        if (isset($_POST['edit'])) {
            $planning = array(
                'ID' => $_GET['id'],
                'Date' => $_POST['Date'],
                'Label' => $_POST['Label'],
                'Teacher' => $_POST['Teacher']
            );

            $error = checkEditPlanningForm($planning);

            if (!$error) {
                updatePlanning($_GET["id"], $_POST["Date"], $_POST["Label"], $_POST["Teacher"]);
            }

            include './views/editPlanningView.php';
        }
    }

    public function createAction()
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
        } catch (Exception $e) {
            $messageInfo = "Exception " . $e->getMessage();
        }

        include('./views/createPlanningView.php');
    }
}
