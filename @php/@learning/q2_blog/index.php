<?php
    include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <center>
        <h3>Blog (insert Page) </h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Blog Title : </td>
                    <td><input type="text" name="name" placeholder="enter title" required></td>
                </tr>   
                <tr>
                    <td>Blog Description : </td>
                    <td><textarea name="description" id="description" cols="20" rows="2" placeholder="enter description" ></textarea></td>
                </tr>
                <tr>
                    <td>Select Language : </td>
                    <td><select name="type" id="type">
                        <option value="java">Java</option>
                        <option value="javascript">Javascript</option>
                        <option value="c++">C++</option>
                        <option value="python">Python</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Insert" name="insertBlog"></td>
                </tr>
            </table>
        </form>
        
        <table>
            <tr>
                <td><a href="./display.php">Display</a></td>
            </tr>
        </table>
        
    </center>
</body>
</html>

<?php
    if(isset($_POST["insertBlog"])){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $type = $_POST["type"];
      
        $query = "insert into blog (title, description, type) values( '$name', '$description', '$type')";
        $data = mysqli_query($con,$query);
        if($data){
            // echo "<script>alert()</script>";
            echo "<script>alert('Record Inserted')</script>";
        }else{
            echo "<script>alert('Record Not Inserted')</script>";
        }

    }
?>