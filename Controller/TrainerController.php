<?php

namespace SmileOSS\Lab\OOP\Controller;

require_once 'repository/trainersRepository.php';
require_once 'manager/trainerManager.php';
require_once 'form/editTrainerForm.php';

class TrainerController extends ParentController
{
    public function listAction()
    {
        //retrieve the trainers data
        $trainers = getAllTrainers();

        //display it
        parent::render('views/listTrainersView.php',$trainers);
    }

    public function editAction()
    {
        if (!isset($_GET['trainerid'])) {
            echo "error on trainer id";
            //TODO display error message
        }

        //Get trainer to edit
        $trainer = getTrainerById($_GET['trainerid']);

        //check the trainer data if submitted
        if (isset($_POST['edit'])) {

            $trainer = array(
                'ID' => $trainer['ID'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );

            $errors = checkEditTrainerForm($trainer);

            if(!$errors){
                //update the trainer data
                updateTrainer($trainer);

                //redirect to the planning
                //header("listeController.php");
            }
        }
        //call view
        parent::render('views/editTrainerView.php',$trainer);
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
            deleteTrainer($trainerId);
            header("Location:?action=listTrainers");
        }
    }

    public function createAction()
    {
        $messageInfo = "";

        try {
            if (isset($_POST['createTrainer'])) {

                createTrainer($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phone"]);

                $messageInfo = "Formateur créé";

                header("Location:?action=listTrainers");
            }

        } catch (Exception $e) {
            $messageInfo = "Exception " . $e->getMessage();
        }
        parent::render('./views/createTrainerView.php',$messageInfo);
    }
}
