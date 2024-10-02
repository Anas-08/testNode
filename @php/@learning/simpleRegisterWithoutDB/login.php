<?php 
    include './Connection.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<center>    
        <h2>Login page</h2>

        <form action="" method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td> <input type="text" name="name" placeholder="enter name" required /></td>
                </tr>
   
                <tr>
                    <td>Password : </td>
                    <td> <input type="password" name="password"  required /></td>
                </tr>   

                <tr>
                    <td> </td>
                    <td> <input type="submit" name="login" value="Login" /></td>
                </tr>  
                
                <tr>
                    <td> </td>
                    <td> Not Register ? <a href="./register.php"> register here</a> </td>
                </tr>  

            </table>
        </form>
    </center>
    <?php 
        if(isset($_POST['login'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $query = "select * from register1 where name = '$name' and password = '$password' ";
            $data = mysqli_query($con, $query);
            $result = mysqli_num_rows($data);
           
            if($result){
                $_SESSION['username'] =  $name;
                header("location:profile.php");
            }else{
                ?>
                    <script>
                        alert('Details Not match');
                    </script>
                <?php
            }
        }
    ?>  
</body>
</html>