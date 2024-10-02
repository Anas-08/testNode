<?php
    // first include connection
    include './Connection.php';
    // include "./Connection.php";
    // include('./Connection.php');
    // include("./Connection.php");
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
                <th>FirstName</th>
                <th>LastName</th>
                <th>Age</th> 
                <th colspan="2"> Actions</th> 
               </tr>        
        <?php
            $query = "select * from student1";
            // $query = "select * from student2";
            $data = mysqli_query($con, $query);
            $result = mysqli_num_rows($data);

            if($result){
                while($rows = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['firstname']?></td>
                            <td><?php echo $rows['lastname']?></td>
                            <td><?php echo $rows['age']?></td>
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