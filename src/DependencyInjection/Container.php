<?php

namespace SmileOSS\Lab\OOP\DependencyInjection;

use SmileOSS\Lab\OOP\Database\DatabaseManager;
use SmileOSS\Lab\OOP\Manager\PlanningManager;
use SmileOSS\Lab\OOP\Repository\PlanningRepository;
use SmileOSS\Lab\OOP\Repository\TrainersRepository;
use SmileOSS\Lab\OOP\Repository\UserRepository;
use SmileOSS\Lab\OOP\Validator\LoginValidator;

class Container
{
    /**
     * @var array
     */
    private $services;

    public function __construct()
    {
        $this->initializeServices();
    }

    /**
     * @param $key
     *
     * @return object
     */
    public function get($key)
    {
        if (!isset($this->services[$key])) {
            throw new \LogicException(sprintf('The service %s cannot be found in the container', $key));
        }

        return $this->services[$key];
    }

    private function initializeServices()
    {
        $this->services['database_manager'] = new DatabaseManager();
        $this->services['planning_repository'] = new PlanningRepository($this->services['database_manager']);
        $this->services['planning_manager'] = new PlanningManager($this->services['database_manager']);
        $this->services['trainers_repository'] = new TrainersRepository($this->services['database_manager']);
        $this->services['user_repository'] = new UserRepository($this->services['database_manager']);
        $this->services['login_validator'] = new LoginValidator($this->services['user_repository']);
    }
}
