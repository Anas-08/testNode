<?php  
    class car{
        public $name, $color, $price;

        function show(){
            echo $this->name . "<br>";
            echo $this->color . "<br>";
            echo $this->price . "<br>";
            echo "<br>";
        }

    }

    $car1 = new car();
    // $c1 = new calculation();

    $car1->name = "car 1";
    $car1->color = "red";
    $car1->price = 112333;

    $car1->show();

    $car2 = new car();
    $car2->name = "car 2";
    $car2->color = "white";
    $car2->price = 560000;
    $car2->show();

?>