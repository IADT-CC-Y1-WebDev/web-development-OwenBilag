<?php
    require_once 'classes/classes/Student.php';

    class Postgrad extends Student{
        protected $supervisor;
        protected $topic;

        public function __construct($name, $num, $supervisor, $topic){
            parent::__construct($name, $num);
            $this->supervisor = $supervisor;
            $this->topic = $topic;
        }

        public function __toString() {
            $format = "<br> Postgrad: %s, %s, Supervisor: %s,  Topic: %s";
            return sprintf($format, $this->name, $this->number, $this->supervisor, $this->topic);
        }
    
        public function getSupervisor() {
            echo $this->supervisor;
        }

        public function getTopic() {
            echo $this->topic;
        }
    }
?>