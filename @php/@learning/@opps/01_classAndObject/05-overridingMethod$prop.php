<?php 
    class base{
        public $name = "Parent Class";
        function show(){
            echo $this->name;
            echo "<br><br>";
        }
        function calc($number1, $number2){
            return $number1 * $number2;
        }
    }

    class derived extends base{
        public $name = "Child Class";
        function show(){
            echo $this->name;
            echo "<br><br>";
        }
        // function calc($number1, $number2){
        //     return $number1 + $number2;
        // }
    }

    $a1 = new base();
    $a1->show();
    echo  $a1->calc(5,5);

    $d1 = new derived();
    $d1->show();
    echo $d1->calc(4,9);
?>