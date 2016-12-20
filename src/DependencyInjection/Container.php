<?php

namespace SmileOSS\Lab\OOP\DependencyInjection;

use SmileOSS\Lab\OOP\Database\DatabaseManager;
use SmileOSS\Lab\OOP\Manager\PlanningManager;
use SmileOSS\Lab\OOP\Repository\PlanningRepository;

class Container
{
    /**
     * @var array
     */
    private $services;

    public function __construct()
    {
        $this->initializeServices();
        // var_dump($this->services);die();
    }

    /**
     * @param $key
     *
     * @return mixed
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
        $this->services['user_repository'] = new UserRepository();
        $this->services['user_manager'] = new UserManager();
    }
}
