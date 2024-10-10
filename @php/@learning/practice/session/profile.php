<?php
    require_once "./connection.php";
    session_start();

    $user = $_SESSION['username'];
    // echo $user;
    if(!$user){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile page</title>
</head>
<body>
<center>
    <h1>Profile</h1>

    <br>
    <br>
    <h4>welcome, <?php echo $_SESSION['username']; ?></h4>

    <br>
    <br>
    <br>

    <a href="./disp.php">Display User</a>
    <br>
    <br>
    <a onclick="return confirm('want to logout ?');" href="logout.php">Logout</a>
</center>    

</body>
</html>