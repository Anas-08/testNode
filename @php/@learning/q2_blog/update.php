<?php 
    include './Connection.php';
    $id = $_GET['id'];
    $query = "select * from blog where id = '$id' ";
    $data = mysqli_query($con,$query);
    $row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <center>
        <h3>Blog (Update Page) </h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Blog Title : </td>
                    <td><input type="text" name="name" placeholder="enter title" value="<?php echo $row['title']?>" required></td>
                </tr>   
                <tr>
                    <td>Blog Description : </td>
                    <td><textarea name="description" id="description" cols="20" rows="2" placeholder="enter description" ><?php echo $row['description']?> </textarea></td>
                </tr>
                <tr>
                    <td>Select Language : </td>
                    <td><select name="type" id="type" value="<?php echo $row['type']?> >
                        <option value="java">Java</option>
                        <option value="javascript">Javascript</option>
                        <option value="c++">C++</option>
                        <option value="python">Python</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update" name="update"></td>
                </tr>
            </table>
        </form>
        
        <table>
            <tr>
                <td><a href="./display.php">Display</a></td>
            </tr>
        </table>
        
    </center>


    <?php 
        if(isset($_POST['update'])){
            $name = $_POST["name"];
        $description = $_POST["description"];
        $type = $_POST["type"];


            $query = "update blog set title = '$name', description='$description', type = '$type' where id = '$id'  ";
            $data = mysqli_query($con, $query);

            if($data){
                // echo "<script>alert()</script>";
                ?>
                    <script>
                        alert("Record Updated")
                        window.open("http://localhost/@learning/q2_blog/display.php","_self")
                    </script>
                    <?php
                // echo "<script>alert('Record Updated')</script>";
            }else{
                ?>
                    
                    <script>alert("Record Not Updated")</script>
                <?php
               
            }
        }
    ?>

</body>
</html>