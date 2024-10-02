<?php 

    interface A{
        function calc($a, $b);
    }

    interface B{
        function sub($a, $b);
        function add($a, $b);
    }

    class C implements A, B{
        function calc($num1, $num2){
            return $num1 * $num2;
        }
        function sub($a, $b){
            return $a - $b;
        }
        function add($a, $b){
            return $a + $b;
        }
    }

    $testInterface = new C();
    echo  $testInterface->calc(10,5);
    echo "<br>";
    echo $testInterface->sub(40,5); 
    echo "<br>";
    echo $testInterface->add(40,5);
?>