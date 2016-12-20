<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Repository\TrainerRepository;
use SmileOSS\Lab\OOP\Manager\TrainerManager;
use SmileOSS\Lab\OOP\Form\EditTrainerForm;

class TrainerController extends AbstractController
{
    public function listAction()
    {
        $trainersList = $this->container->get('trainer_repository')->findAll();
        
        $this->render('trainer/list.php', ['trainers' => $trainersList]);
    }

    public function editAction()
    {
        if (!isset($_GET['trainerid'])) {
            echo "error on trainer id";
            //TODO display error message
        }

        $id = $_GET['trainerid'];
        
        //Get trainer to edit
        $trainerInfo = $this->container->get('trainer_repository')->find($id);
        
        //check the trainer data if submitted
        if (isset($_POST['edit'])) {

            $trainer = array(
                'ID' => $id,
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );

            //update the trainer data
            $trainer_res = $this->container->get('trainer_manager');
            $trainer_res->update($_POST['ID'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone']);

            var_dump($trainer);
        }

        $this->render('trainer/edit.php', ['trainer' => $trainerInfo]);

    }

    public function deleteAction()
    {
        if (!isset($_GET['trainerid'])) {
            echo "error on trainer id";
            //TODO display error message
        }


        if (isset($_GET['trainerid'])) {

            //get trainer to delete
            $trainerId = getTrainerById($_GET['trainerid']);
            $trainerId = $_GET['trainerid'];
            delete($trainerId);
            header("Location:?action=listTrainers");
        }
    }

    public function createAction()
    {

        $messageInfo = "";

        try {
            if (isset($_POST['createTrainer'])) {

                create($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phone"]);

                $messageInfo = "Formateur créé";

                header("Location:?action=listTrainers");
            }

        } catch (Exception $e) {
            $messageInfo = "Exception " . $e->getMessage();
        }


        include('./views/createTrainerView.php');
    }
}
