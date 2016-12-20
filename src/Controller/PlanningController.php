<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Templating\TemplateEngine;

class PlanningController extends AbstractController
{
    public function listAction()
    {
        $plannings = $this->container->get('planning_repository')->findAll();

        $this->render('planning/list.php', ['role' => 'ADMIN', 'plannings' => $plannings]);
    }

    public function editAction()
    {
        if (!isset($_GET['id'])) {
            echo "error on planning id";

            return;
        }

        $repository = $this->container->get('planning_repository');
        $planning = $repository->find($_GET['id']);

        // check if planning found. If not throw exception

        if (isset($_POST['edit'])) {
            $planning = [
                'ID' => $_GET['id'],
                'Date' => $_POST['Date'],
                'Label' => $_POST['Label'],
                'Teacher' => $_POST['Teacher']
            ];

            $error = checkEditPlanningForm($planning);

            if (!$error) {
                $manager = $this->container->get('planning_manager');
                $manager->update($_GET['id'], $_POST['date'], $_POST['label'], $_POST['teacher']);
            }

            $this->render('planning/edit.php');
        }
    }

    public function createAction()
    {
        $messageInfo = '';

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
