<?php 
    include "./connection.php";

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
        <h2>Login</h2>
        <br>
        <br>
        <br>

       <form action="" method="post">
       <table>
            <tr>
                <td>Name : </td>
                <td><input type="name" name="name"></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
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
        $data = mysqli_query($con, $select);
        $res = mysqli_fetch_assoc($data);

        if($res){
            $_SESSION['username'] = $name;
            header("location:profile.php");
        }else{
            echo "detail unmatched";
        }
    
    }
?>