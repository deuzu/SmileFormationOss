<?php

namespace SmileOSS\Lab\OOP\Entity;

class Course
{
    private $id;

    private $date;

    private $label;

    private $teach;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->$id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getTeach()
    {
        return $this->teach;
    }

    /**
     * @param string $teach
     */
    public function setTeach($teach)
    {
        $this->teach = $teach;
    }
}

