<?php 
    include "./connection.php";
    if(isset($_GET['id'])){
        $prdId = $_GET['id'];
    
        $delete = "delete from products where product_id = '$prdId' ";
        $res = mysqli_query($con, $delete);

        if($res){
            header("location:display.php");
        }
    
    }

?>