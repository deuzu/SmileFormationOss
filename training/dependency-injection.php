<?php

namespace Smile;

class PlanningManager
{
    private $database;

    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    public function update($id)
    {
        return $this->database->query('...');
    }
}

// test unit
class PlanningManagerTest extends \PHPUnit_Framework_Test_Case
{
    public function testUpdate()
    {
        $databaseMock = $this->getMock('DatabaseManager');
        // query -> return true

        $planningManager = new PlanningManager($databaseMock);

        $result = $planningManager->update(1);

        $this->assertEquals(true, $result);
    }
}
