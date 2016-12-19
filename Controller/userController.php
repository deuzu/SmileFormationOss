<?php
namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Templating\TemplateEngine;

require_once './repository/usersRepository.php';
require_once './manager/userManager.php';
require_once './form/editUserForm.php';

class UserController
{
    public function listAction()
    {
        die('gfdkjhdfkjsd');
        //retrieve the users data
        $users = getAllUsers();

        //call view
        TemplateEngine::render(__DIR__.'/../views/user/list.php', ['users' => $users]);
    }

    public function editAction()
    {
        if(!isset($_GET['userid'])){
            echo "error on user id";
        }

        //Get user to edit
        $user = getUserById($_GET['userid']);

        //check the planning data if submitted
        if(isset($_POST['edit'])){

            $user = array(
                'ID' => $user['ID'],
                'login' => $user['login'],
                'role' => $_POST['role'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );

            $errors = checkEditUserForm($user);

            if(!$errors){
                //update the planning data
                updateUser($user);

                //redirect user to the planning
                //header("listeController.php");
            }
        }
        //call view
        TemplateEngine::render(__DIR__.'/../views/user/edit.php', ['user' => $user]);
    }

    public function deleteAction()
    {
        if(!isset($_GET['userid'])){
            echo "error on user id";
        }

        //get user to delete
        $user = getUserById($_GET['userid']);

        if(isset($_POST['delete'])){

            $user = array(
                'ID' => $user['ID'],
                'login' => $user['login'],
                'role' => $_POST['role'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );

            deleteUser($user);
        }
        //call view
        TemplateEngine::render(__DIR__.'/../views/user/delete.php', ['user' => $user]);
    }
}
