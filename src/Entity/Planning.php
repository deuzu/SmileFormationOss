<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 23/12/16
 * Time: 13:58
 */

class User
{
    private $ID;

    private $date;

    private $label;

    private $teach;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getTeach()
    {
        return $this->teach;
    }

    /**
     * @param mixed $teach
     */
    public function setTeach($teach)
    {
        $this->teach = $teach;
    }


    // getters
    // setters
}
