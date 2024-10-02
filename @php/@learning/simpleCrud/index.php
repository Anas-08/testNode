<?php 
// first include connection
include 'Connection.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>
<body>
    <center>
    <h2>Insert Data</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>First Name :  </td>
                    <td><input type="text" placeholder="enter firstname" name="firstname" required/> </td>
                </tr>
                <tr>
                    <td>Last Name :  </td>
                    <td><input type="text" placeholder="enter lastname" name="lastname" required/> </td>
                </tr>
                <tr>
                    <td>Age :  </td>
                    <td><input type="text" placeholder="enter age" name="age" required/> </td>
                </tr>
                <tr>
                    <td></td> 
                    <td><input type="submit" name="insert" value="Insert" /> </td>
                </tr> 
                <tr>
                    <td></td> 
                    <td><a href="./view.php">Display</a> </td>
                </tr>
           
            </table>
        
        </form>
    </center>

<?php 
    if(isset($_POST['insert'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $age = $_POST['age'];

        $query = "insert into student1(firstname, lastname, age) values('$fname','$lname','$age')";
        $data = mysqli_query($con,$query);
        if($data){
            // echo "<script>alert()</script>";
            echo "<script>alert('Record Inserted')</script>";
        }else{
            echo "<script>alert('Record Not Inserted')</script>";
        }
    }
?>    
</body>
</html>