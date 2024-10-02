<?php 

    class parentClass{
        public static $name = "testing";
        public static function show(){
            echo self::$name;
            echo "<br>";
        }
    }
    class childClass extends parentClass{
        static function show(){
            echo parent::$name;
            echo "<br>";
        }
    }

    // $test = new parentClass();
    // $test->show();

    childClass::$name = "Demo 1";
    childClass::show();

?>