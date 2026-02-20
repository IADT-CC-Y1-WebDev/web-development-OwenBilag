<?php
class Student {
    protected $name;
    protected $number;
    
    public function __construct($name, $num){
        $this->name = $name;
        $this->number = $num;

        if(empty($name)) {
            throw new Exception ('Name cannot be empty!');
        } else if (empty($num)) {
            throw new Exception ('Number cannot be empty!');
        }
    }

    public function getName() {
        echo $this->name;
    }

    public function getNumber() {
        echo $this->number;
    }
}
?>