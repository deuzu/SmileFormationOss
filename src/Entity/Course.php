<?php

namespace SmileOSS\Lab\OOP\Entity;

class Course
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $label;

    /**
     * @var User
     */
    private $teacher;

    /**
     * @var User[]
     */
    private $students;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
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
     * @return User
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param User $teacher
     */
    public function setTeacher(User $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @return User[]
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param User $student
     */
    public function addStudent(User $student)
    {
        $this->students = $student;
    }

    /**
     * @param User $student
     */
    public function removeStudent(User $studentToRemove)
    {
        foreach ($this->students as $studentKey => $student) {

            if ($studentToRemove == $student) {
                unset($this->students[$studentKey]);
            }
        }
    }
}
