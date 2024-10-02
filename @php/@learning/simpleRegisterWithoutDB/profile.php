<?php 
    include './Connection.php';
    session_start();
    $user = $_SESSION['username'];
    if(!$user)
        header('location:login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <center>
        <h2>Profile Page</h2>
        <br>
        <br>
       <div style="padding: 10px ;display: flex;align-items: center; justify-content: space-between;">
            <h4>Welcome, <?php echo $_SESSION['username'] ?></h4>
            <a href="./logout.php">Logout</a>
       </div>
        <br>
        <br>
        <!-- <a href="../simpleCrud/view.php"> Display users</a> -->
    </center>
</body>
</html>