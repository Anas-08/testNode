<?php
    require_once "./connection.php";
    
    $id =  $_GET['id'];

    $delete = "delete from test1 where id = ". $id;
    $res = mysqli_query($con, $delete);
    if($res){
        echo "<script>alert('record deleted')</script>";
        header("location:view.php");
    }else{
        echo "<script>alert('record not deleted')</script>";
    }
?>