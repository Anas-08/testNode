<?php 
    require_once "./connection.php";

    $select = "select * from student1";        
    $res = mysqli_query($con, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispaly</title>
</head>
<body>

    <form action="" method="post">
        <table cellpadding="14" cellspacing="0" border="1">
            <tr>
                <th>Id</th>
                <th>firstName</th>
                <th>lastName</th>
                <th>Age</th>
            </tr>
            <?php 
                if($res){
                    while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td> <?= $row['id']; ?> </td>
                                <td> <?= $row['firstname']; ?> </td>
                                <td> <?= $row['lastname']; ?> </td>
                                <td> <?= $row['age']; ?> </td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </form>
    
</body>
</html>