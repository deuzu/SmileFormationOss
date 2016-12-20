<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Repository\UserRepository;
use SmileOSS\Lab\OOP\Manager\UserManager;

class UserController extends AbstractController
{
    public function listAction()
    {
        //retrieve the users data
        $users = $this->container->get('UsersRepository')->getAllUsers();

        //display it
        $this->render('users/list.php', ['users' => $users]);
    }

    public function editAction()
    {
        if(!isset($_GET['userid'])){
            echo "error on user id";
            return ;
        }

        //Get user to edit
        $user = $this->container->get('UsersRepository')->getUserById();

        //check the planning data if submitted
        if(isset($_POST['edit'])) {
            $user = [
                'ID' => $user['ID'],
                'login' => $user['login'],
                'role' => $_POST['role'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            ];

            $manager = $this->container->get('userManager');
            $manager->updateUser($user);

        }

        //call view
        $this->render('users/edit.php', ['users' => $users]);

    }

    public function deleteAction()
    {
        if(!isset($_GET['userid'])){
            echo "error on user id";
            //TODO display error message
        }

        //get user to delete
        $user = $this->container->get('UsersRepository')->getUserById();

        if(isset($_POST['edit'])) {
            $user = [
                'ID' => $user['ID'],
                'login' => $user['login'],
                'role' => $_POST['role'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            ];

            $manager = $this->container->get('userManager');
            $manager->deleteUser($user);
        }

        //call view
        $this->render('users/delete.php', ['users' => $users]);
    }
}
