<?php
    include "./connection.php";

    $select = "select products.product_id, products.product_name, products.product_price, 
    categories.category_name 
    from products
    inner join categories on products.cateory_id = categories.cateory_id";

    $res = mysqli_query($con, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
    
<center>
    <h2>Display Data</h2>

    <br>
    <br>
    <br>

    <table cellpadding="12" cellspacing="0" border="1">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product price</th>
            <th>Category</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
            if($res){
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                        <tr>
                            <td><?= $row['product_id'] ?></td>
                            <td><?= $row['product_name'] ?></td>
                            <td><?= $row['product_price'] ?></td>
                            <td><?= $row['category_name'] ?></td>
                            <td><a href="edit.php?id=<?= $row['product_id']?>">Edit</a></td>
                            <td><a onclick="return confirm('Are you sure, you want to delete ?');" href="delete.php?id=<?= $row['product_id']?>">Delete</a></td>
                        </tr>
                    <?php
                }
            }else{
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
        ?>
    </table>
</center>
</body>
</html>