<?php
require_once 'classes/classes/Student.php';

class Undergrad extends Student {
    protected $course;
    protected $year;

    public function __construct($name, $num, $course, $year){
        parent::__construct($name, $num);
        $this->course = $course;
        $this->year = $year;
    }

    public function __toString(){
        $format = "<br> Student: %s, %s, Course: %s,  Year: %s";
        return sprintf($format, $this->name, $this->number, $this->course, $this->year);
    }

    public function getCourse() {
        echo $this->course;
    }

    public function getYear() {
        echo $this->year;
    }
}
?>