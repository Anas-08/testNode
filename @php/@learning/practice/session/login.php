<?php
    require_once "./connection.php";
    session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
        <br>
        <h1>Login</h1>
        <br>
        <br>

        <hr>

        <form method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="Login"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Not register yet ? <a href="#">register here</a></td>
                </tr>
            </table>
        </form>

    </center>    
</body>
</html>

<?php
    if(isset($_POST['login'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $select = "select * from register1 where name = '$name' and password = '$password' ";
        $res = mysqli_query($con, $select);
        $row = mysqli_fetch_assoc($res);    
        if($row){
            $_SESSION['username'] = $name;
            header("location:profile.php");
        }else{
            echo "<script>alert('details not matched')</script>";
        }

    }

?>

