<?php
    include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Page</title>
</head>
<body>
    <center>    
        <h2>Display Data</h2>
        <table border="1" cellpadding="10" cellspacing="0">  
               <tr>
               <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Image</th>
                <th>Course</th>
                <th>Hobbies</th>
                <th colspan="2"> Actions</th> 
               </tr>        
        <?php
            $query = "select * from user";
            // $query = "select * from student2";
            $data = mysqli_query($con, $query);
            $result = mysqli_num_rows($data);
            if($result){
                while($rows = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['name']?></td>
                            <td><?php echo $rows['email']?></td>
                            <td><?php echo $rows['mobile']?></td>
                            <td><?php echo $rows['password']?></td>
                            <td><?php echo $rows['address']?></td>
                            <td><?php echo $rows['gender']?></td>
                            <td><?php echo $rows['date']?></td>
                            <td> <img src="<?php echo $rows['image']?>" width="90px" alt=""> </td>
                            <td><?php echo $rows['course']?></td>
                            <td><?php echo $rows['hobbies']?></td>
                            <td><a href="update.php?id=<?php echo $rows['id']?>">Edit</a></td>
                            <td><a onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?id=<?php echo $rows['id']?>">Delete</a></td>
                        </tr>
                    <?php
                }
            }else{
                ?>
                <tr style="text-align: center;" >
                    <td colspan="4" >No Record Found</td>
                </tr>
                <?php
            }
       ?>
    </table>
        <br>
        <br>
        <a href="./index.php">Home</a>
    </center>
   
</body>
</html>