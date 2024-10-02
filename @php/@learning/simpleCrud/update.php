<?php 
    include './Connection.php';
    $id = $_GET['id'];
    $query = "select * from student1 where id = '$id' ";
    $data = mysqli_query($con,$query);
    $row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
    <center>
    <h2>Edit Data</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>First Name :  </td>
                    <td><input type="text" value="<?php echo $row['firstname']?>" placeholder="enter firstname" name="firstname" required/> </td>
                </tr>
                <tr>
                    <td>Last Name :  </td>
                    <td><input type="text" value="<?php echo $row['lastname']?>" placeholder="enter lastname" name="lastname" required/> </td>
                </tr>
                <tr>
                    <td>Age :  </td>
                    <td><input type="text" value="<?php echo $row['age']?>" placeholder="enter age" name="age" required/> </td>
                </tr>
                <tr>
                    <td></td> 
                    <td><input type="submit" name="update" value="Edit" /> </td>
                </tr> 
                <tr>
                    <td></td> 
                    <td><a href="./view.php">Back</a> </td>
                </tr>           
            </table>       
        </form>
    </center>

    <?php 
        if(isset($_POST['update'])){
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $age = $_POST['age'];
            $query = "update student1 set firstname = '$fname', lastname='$lname', age = '$age' where id = '$id'  ";
            $data = mysqli_query($con, $query);

            if($data){
                // echo "<script>alert()</script>";
                ?>
                    <script>
                        alert("Record Updated")
                        window.open("http://localhost/@learning/simpleCrud/view.php","_self")
                    </script>
                    <?php
                // echo "<script>alert('Record Updated')</script>";
            }else{
                ?>
                    
                    <script>alert("Record Not Updated")</script>
                <?php
                echo "<script>alert('Record Not Updated')</script>";
            }
        }
    ?>
</body>
</html>