<?php 

    abstract class parentClass{
        public $name= "testing";
        abstract protected function calc($a, $b);
    }
    class childClass extends parentClass{
        function calc($a, $b){
            return $a + $b;
        }
    }

    $test = new childClass();
    echo $test->name;
    echo $test->calc(10,20);
?>