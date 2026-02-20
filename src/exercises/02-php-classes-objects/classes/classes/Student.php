<?php
class Student {
    protected $name;
    protected $number;
    
    public function __construct($name, $num){
        $this->name = $name;
        echo "Creating student: " . $name . "<br>";
        $this->number = $num;

        if(empty($name)) {
            throw new Exception ('Name cannot be empty!');
        } else if (empty($num)) {
            throw new Exception ('Number cannot be empty!');
        }
    }

    public function __toString() {
        $format = "<br> Student: %s, (%f)";
        return sprintf($format, $this->name, $this->number);
    }

    public function __destruct() {
        echo "Student " . $this->name . " has left the system.";
    }

    public function getName() {
        echo $this->name;
    }

    public function getNumber() {
        echo $this->number;
    }
}
?>