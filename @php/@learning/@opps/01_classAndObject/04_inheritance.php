<?php

use function PHPSTORM_META\type;

    class employee{
        public $name, $age, $salary;

        function __construct($name = "Demo", $age = 00, $salary = 00){
            echo "Employee Class";
            $this->name = $name;
            $this->age = $age;
            $this->salary = $salary;
        }

        function show(){
            echo "<h1>Employee Details</h1>";
            echo "Employee Name : " . $this->name . "<br>";
            echo "Employee Age : " . $this->age . "<br>";
            echo "Employee Salary : " . $this->salary . "<br>";
            echo "<br><br>";
        }
    }

    class manager extends employee{
        public $ta = 1000;
        public  $phoneBill = 800;
        public $totalSalary;
        // function __construct(){
        //     echo "Manager class";
        // }

        function show(){
            $this->totalSalary = $this->salary + $this->ta + $this->phoneBill;
            echo "<h1>Manager Detail</h1>";
            echo "Employee Name : " . $this->name . "<br>";
            echo "Employee Age : " . $this->age . "<br>";
            echo "Employee Salary : " . $this->totalSalary . "<br>";

        }



    }

    // $emp1 = new employee("test 1", 45, 7000);
    // $emp1->show();

    // $emp2 = new employee();
    // $emp2->show();

    $emp1 = new manager("test 1", 35, 50000);
    $emp2 = new employee("test 2", 56, 8000);

    $emp1->show();
    $emp2->show();


?>