<?php 
    class person1{
        public $name = "Demo", $age = 0;

        function show(){
            echo "--without constructor--";
            echo "<br>";
            echo "Name is : " . $this->name  . " and age is : " . $this->age;
            echo "<br>";
            echo "<br>";
        }
    }

    class person2{
        public $name , $age ;

        function __construct($name = "testing", $age = 00 ){
            $this->name = $name;
            $this->age = $age;
        }

        function show(){
            echo "--with constructor--";
            echo "<br>";
            echo "Name is : " . $this->name ." and age is : ". $this->age;
            echo "<br>";
            echo "<br>";
        }
    }

    // without constructor
    $p1 = new person1();
    $p1->name = "test 1";
    $p1->age = 30;
    $p1->show();

    $p11 = new person1();
    $p11->show();

    // with constructor
    $p1 = new person2("test 2", 45);
    $p1->show();
    
    $p2 = new person2("test 3", 30);
    $p2->show();

    $p3 = new person2();
    $p3->show();

    $p1->name = "test 10";
    $p1->age = 300;
    $p1->show();

    
?>