<?php 
    class calculation{
        public $a, $b, $c;

        function sum(){
            $this->c = $this->a + $this->b;
            return $this->c;
        }

        function sub(){
            $this->c = $this->a - $this->b;
            return $this->c;
        }
    }

    $c1 = new calculation();
    $c1->a = 10;
    $c1->b = 30;

    $c2 = new calculation();
    $c2->a = 50;
    $c2->b = 40;

    echo "sum is : " . $c1->sum() . " <br> ";
    echo "sub is : " . $c2->sub() . " \n ";

?>