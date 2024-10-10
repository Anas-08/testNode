<?php
    require_once "./connection.php";

    $select = "select * from test1";
    $res = mysqli_query($con, $select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <center>
        <br>
        <hr>
        <br>
        <h1>Dispaly</h1>
        <br>

        <table border="1" cellpadding="14" cellspacing="0">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Date</th>
                <th>Image</th>
                <th>Hobbies</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
                if($res){
                    while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['password']; ?></td>
                                <td><?= $row['address']; ?></td>
                                <td><?= $row['gender']; ?></td>
                                <td><?= $row['course']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td> <img src="<?= $row['img']; ?>" width="100px" alt=""> </td>
                                <td><?= $row['hobby']; ?></td>
                                <td> <a href="edit.php?id=<?= $row['id']; ?>">Edit</a></td>
                                <td> <a onclick="return confirm('Are you sure, you want to delete ?');" href="delete.php?id=<?= $row['id']; ?> ">Delete</a></td>
                            </tr>
                        <?php
                    }
                }
            ?>

        </table>
    </center>
</body>
</html>