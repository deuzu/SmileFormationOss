<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Form\PlanningForm;

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

        if (isset($_POST['edit'])) {
            $planning = [
                'ID' => $_GET['id'],
                'date' => $_POST['date'],
                'label' => $_POST['label'],
                'teach' => $_POST['teach']
            ];

            $form = new PlanningForm();
            $form->validate($planning);

            $manager = $this->container->get('planning_manager');
            $update = $manager->update($_GET['id'], $_POST['date'], $_POST['label'], $_POST['teach']);

            if ($update) {
                header('location:index.php?controller=planning&action=list');
            }
        }

        $this->render('planning/edit.php', ['planning' => $planning]);
    }

    public function createAction()
    {
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

        include('planning/create.php');
    }
}
