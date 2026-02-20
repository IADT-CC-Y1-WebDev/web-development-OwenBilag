<?php
class Student {
    protected $name;
    protected $number;

    public function __construct($name, $num){
        $this->name = $name;
        $this->number = $num;
    }

    public function getName() {
        echo $this->name;
    }

    public function getNumber() {
        echo $this->number;
    }
}
?>