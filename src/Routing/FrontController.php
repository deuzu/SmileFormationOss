<?php

namespace SmileOSS\Lab\OOP\Routing;

use SmileOSS\Lab\OOP\Controller\MenuController;

class FrontController
{
    public function render()
    {
        $controllerName = sprintf('SmileOSS\Lab\OOP\Controller\%sController', ucfirst($_GET['controller']));
        $controller = new $controllerName();
        $methodName = $_GET['action'].'Action';

        return $controller->$methodName();
    }

    /**
     * @deprecated
     */
    public function renderOld()
    {
        //Anonymous controller
        if(!isUserLoggedIn()){

            if(isset($_GET['action']) && $_GET['action']=='signup'){

                //Sign up form
                return renderSignUpForm();
            }else{

                //Login form
                return renderLoginForm();
            }
        }

        //Secured routes
        if(isUserLoggedIn() && isset($_GET['action'])) {

            renderMenu();

            switch ($_GET['action']) {
                case 'createPlanning':
                    renderCreatePlanning();
                    break;
                case 'createTrainer':
                    renderCreateTrainer();
                    break;
                case 'listPlanning':

                    renderPlanning();

                    break;
                case 'editPlanning':
                    renderEditPlanning();
                    break;
                case 'listUsers':
                    // List users
                    renderListUsers();
                    break;
                case 'listTrainers':
                    // List users
                    renderListTrainers();
                    break;
                case 'editTrainer':
                    // Edit trainer
                    renderEditTrainer();
                    break;
                case 'editUser':
                    // Edit user
                    renderEditUser();
                    break;
                case 'deleteTrainer':
                    //Delete trainer
                    renderDeleteTrainer();
                    break;
                case 'deleteUser':
                    //Delete user
                    renderDeleteUser();
                    break;
                case 'logout':
                    //Delete user
                    executeLogout();
                    break;
            }
        }else{
            return "nothing to display";
        }
    }
}
