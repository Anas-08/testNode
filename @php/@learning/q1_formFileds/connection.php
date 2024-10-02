<?php
    $con = mysqli_connect("localhost","root", "Thispc@123","myphp");
    if($con){
        echo "Connected...";
    }else{
        echo "Not Connected...";
    }
?>