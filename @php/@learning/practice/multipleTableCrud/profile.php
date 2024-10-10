<?php
    include "./connection.php";
    session_start();

    $user = $_SESSION['username'];
    if(!$user){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <center>
        <br>
        <br>
        <h1>Profile Page</h1>
        <br>
        <br>

        <h2>welcome , <?= $user; ?></h2>

        <br>
        <br>
        <br>
        <a href="./display.php">Display</a>

        <br>
        <br>
        <a href="./logout.php">Logout</a>
        <br>

    </center>    

</body>
</html>