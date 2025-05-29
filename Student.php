<?php

require_once 'Human.php';

class Student extends Human {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    public function getUniversity() { return $this->university; }
    public function getCourse() { return $this->course; }

    public function setUniversity($university) { $this->university = $university; }
    public function setCourse($course) { $this->course = $course; }

    public function nextCourse() { $this->course++; }

    protected function birthMessage() {
        return "Студент народив дитину<br>";
    }

    public function cleanRoom() {
        echo "Студент прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню<br>";
    }
}
